// On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
var index = 0;

$(document).ready(function() {
    var $container = $('div#fb_sessionmanagerbundle_session_teams');

    // On ajoute un lien pour ajouter une nouvelle équipe
    var $addLink = $('<a href="#" id="add_team" class="btn btn-sm btn-default">Ajouter une équipe</a>');
    $container.append($addLink);

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $addLink.click(function(e) {
        addTeam($container);
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });
    index = $container.find(':input').length;
    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un.
    if (index == 0) {
        //addTeam($container);
    } else {
        // Pour chaque équipe déjà existante, on ajoute un lien de suppression
        $container.children('div').each(function() {
            addDeleteLink($(this));
        });
    }

    // La fonction qui ajoute un formulaire équipe
    function addTeam($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, '')
            .replace(/__name__/g, index));
        
        // On ajoute au prototype un lien pour pouvoir supprimer l'équipe
        addDeleteLink($prototype);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index++;
    }

    // La fonction qui ajoute un lien de suppression d'une équipe
    function addDeleteLink($prototype) {
        // Création du lien
        $deleteLink = $('<a href="#" class="btn btn-sm btn-danger" type="button" title="Supprimer l\'élément" data-toggle="tooltip" onclick="return confirm(\'Etes-vous sûr de vouloir supprimer cet élément ?\')">Supprimer</a>');
        // Ajout du lien
        $prototype.append($deleteLink);

        // Ajout du listener sur le clic du lien
        $deleteLink.click(function(e) {
            $prototype.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});