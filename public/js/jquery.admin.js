$(document).ready(function() {
    $('.edit-profession, .delete-profession').on('click', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('.name-prof').val(name);
        $('.id-prof').val(id);
    });



});