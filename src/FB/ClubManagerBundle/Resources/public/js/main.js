/**
 * Created by Joseph on 10/09/2015.
 */
//Collapse accordion
$('.panel-collapse').collapse({toggle: false});
$('body').on('click', '[data-toggle=collapse-next]', function (e) {
    e.preventDefault();

    // Try to close all of the collapse areas first
    var parent_id = $(this).data('parent');
    $(parent_id+' .panel-collapse').collapse('hide');

    // ...then open just the one we want
    var $target = $(this).parents('.panel').find('.panel-collapse');
    $target.collapse('toggle');
});

//Display varibale info in modal
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
});