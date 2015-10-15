<?php
// src\FB\TournamentBundle\EventListener\CalendarEventListener.php

/* source https://github.com/adesigns/calendar-bundle */

namespace FB\TournamentBundle\EventListener;

use ADesigns\CalendarBundle\Event\CalendarEvent;
use ADesigns\CalendarBundle\Entity\EventEntity;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;

class CalendarEventListener
{
    private $entityManager;

    private $router;

    public function __construct(EntityManager $entityManager, Router $router)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function loadEvents(CalendarEvent $calendarEvent)
    {
        $this->loadTournamentEvent($calendarEvent);
        $this->loadSessionEvent($calendarEvent);
    }

    public function loadTournamentEvent(CalendarEvent $calendarEvent)
    {
        $startDate = $calendarEvent->getStartDatetime();
        $endDate = $calendarEvent->getEndDatetime();

        // load events
        $tournamentEvents = $this->entityManager->getRepository('FBTournamentBundle:Tournament')
            ->createQueryBuilder('tournament')
            ->where('tournament.startDate BETWEEN :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
            ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'))
            ->getQuery()->getResult();

        foreach($tournamentEvents as $tournamentEvent) {

            // create an event with a start/end time, or an all day event

            if ($tournamentEvent->getStartDate() != $tournamentEvent->getEndDate()) {
                $end = $tournamentEvent->getEndDate();
                $eventEntity = new EventEntity($tournamentEvent->getName(), $tournamentEvent->getStartDate(), $end);
            } else {
                $eventEntity = new EventEntity($tournamentEvent->getName(), $tournamentEvent->getStartDate(), null, true);
            }

            //optional calendar event settings
            $eventEntity->setAllDay(true); // default is false, set to true if this is an all day event

            if ($tournamentEvent->getDivision() == "Amical")
                $eventEntity->setBgColor('#FF0000'); //set the background color of the event's label
            else
                $eventEntity->setBgColor('#0000FF');

            $eventEntity->setFgColor('#FFFFFF'); //set the foreground color of the event's label

            $eventEntity->setUrl($this->router->generate('fb_tournament_update', array('id' => $tournamentEvent->getId()))); // url to send user when event label is clicked

            //finally, add the event to the CalendarEvent for displaying on the calendar
            $calendarEvent->addEvent($eventEntity);
        }
    }

    public function loadSessionEvent(CalendarEvent $calendarEvent)
    {
        $startDate = $calendarEvent->getStartDatetime();
        $endDate = $calendarEvent->getEndDatetime();

        // load events
        $SessionEvents = $this->entityManager->getRepository('FBSessionManagerBundle:Session')
            ->createQueryBuilder('session')
            ->where('session.trainingStart BETWEEN :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
            ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'))
            ->getQuery()->getResult();

        foreach($SessionEvents as $sessionEvent) {

            // create an event with a start/end time, or an all day event

            if ($sessionEvent->getTrainingStart() != $sessionEvent->getTrainingEnd()) {
                $end = $sessionEvent->getTrainingEnd();
                $eventEntity = new EventEntity('Entrainement', $sessionEvent->getTrainingStart(), $end);
            } else {
                $eventEntity = new EventEntity('Entrainement', $sessionEvent->getTrainingStart(), null, true);
            }

            //optional calendar event settings
            $eventEntity->setAllDay(false); // default is false, set to true if this is an all day event

            if ($sessionEvent->getSurface() == "Indoor")
                $eventEntity->setBgColor('#FFFF00'); //set the background color of the event's label
            else
                $eventEntity->setBgColor('#009933');

            $eventEntity->setFgColor('#FFFFFF'); //set the foreground color of the event's label

            $eventEntity->setUrl($this->router->generate('fb_session_detail', array('id' => $sessionEvent->getId()))); // url to send user when event label is clicked

            //finally, add the event to the CalendarEvent for displaying on the calendar
            $calendarEvent->addEvent($eventEntity);
        }
    }
}
