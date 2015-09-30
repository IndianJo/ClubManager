<?php
// src\FB\TournamentBundle\EventListener\CalendarEventListener.php

/* source https://github.com/adesigns/calendar-bundle */

namespace FB\TournamentBundle\EventListener;

use ADesigns\CalendarBundle\Event\CalendarEvent;
use ADesigns\CalendarBundle\Entity\EventEntity;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CalendarEventListener
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function loadEvents(CalendarEvent $calendarEvent)
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

        // $companyEvents and $companyEvent in this example
        // represent entities from your database, NOT instances of EventEntity
        // within this bundle.
        //
        // Create EventEntity instances and populate it's properties with data
        // from your own entities/database values.

        foreach($tournamentEvents as $tournamentEvent) {

            // create an event with a start/end time, or an all day event

            if ($tournamentEvent->getStartDate() != $tournamentEvent->getEndDate()) {
                $end = $tournamentEvent->getEndDate();
                $end->setTime(00, 00, 01);
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

            $eventEntity->setUrl('update/'.$tournamentEvent->getId()); // url to send user when event label is clicked

            //finally, add the event to the CalendarEvent for displaying on the calendar
            $calendarEvent->addEvent($eventEntity);
        }
    }
}