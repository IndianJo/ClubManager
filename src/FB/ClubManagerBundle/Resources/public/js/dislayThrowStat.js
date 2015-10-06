// On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
var index = 0;

$(document).ready(function() {
    var $container = $('div#player_throw_distances');
    var $addLinkContainer = $('div#player_throw_distances');

    // On ajoute un lien pour ajouter une nouvelle distance
    var $addLink = $('<a href="#" id="add_team" class="btn btn-sm btn-default">Ajouter un élément</a>');
    $addLinkContainer.append($addLink);

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $addLink.click(function(e) {
        addThrowDistance($container);
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });
    index = $container.find(':input').length;
    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un.
    if (index == 0) {
        addThrowDistance($container);
    } else {
        // Pour chaque distance déjà existante, on ajoute un lien de suppression
        $addLinkContainer.children('div').each(function() {
            addDeleteLink($(this));
        });
    }

    // La fonction qui ajoute un formulaire
    function addThrowDistance($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var $autoContainer = $('div#fb_playermanagerbundle_player_throwDistances');
        var $prototype = $($autoContainer.attr('data-prototype').replace(/__name__label__/g, '')
            .replace(/__name__/g, index));

        // On ajoute au prototype un lien pour pouvoir supprimer un élément
        addDeleteLink($prototype);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index++;
    }

    // La fonction qui ajoute un lien de suppression d'une distance
    function addDeleteLink($addLinkContainer) {
        // Création du lien
        $deleteLink = $('<a href="#" class="btn btn-sm btn-danger" type="button" title="Supprimer l\'élément" data-toggle="tooltip" onclick="return confirm(\'Etes-vous sûr de vouloir supprimer cet élément ?\')">Supprimer</a>');
        // Ajout du lien
        $addLinkContainer.append($deleteLink);

        // Ajout du listener sur le clic du lien
        $deleteLink.click(function(e) {
            $addLinkContainer.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});