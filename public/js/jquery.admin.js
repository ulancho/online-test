$(document).ready(function() {
    $('.edit-profession, .delete-profession').on('click', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('.name-prof').val(name);
        $('.id-prof').val(id);
    });

    $('.stat').on('change',function () {
         let id = $(this).data('id');
         let url = $('#url').val();
        $.ajax({
            method:"POST",
            dataType:'JSON',
            url:url+"admin/MainAdmin/upStatus",
            data:{id:id}

        }).done(function(){
            alert('Статус изменен');
        });
    });



});