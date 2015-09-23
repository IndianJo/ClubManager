/**
 * Created by Joseph on 10/09/2015.
 */
//Collapse accordion
$('.panel-collapse').collapse({toggle: false});
$('body').on('click', '[data-toggle=collapse-next]', function (e) {
    e.preventDefault();

    // Try to close all of the collapse areas first
    var parent_id = $(this).data('parent');
    $(parent_id+'.panel-collapse').collapse('hide');

    // ...then open just the one we want
    var $target = $(this).parents('.panel').find('.panel-collapse');
    $target.collapse('toggle');
});
$(document).ready( function () {
    $('#filteredTable').DataTable({
    })
} );
$('select[multiple=multiple]').tokenize({
    displayDropdownOnFocus: true,
    newElements: false,
    nbDropdownElements: 100,
    placeholder: 'Sélectionner un joueur'
});