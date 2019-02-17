$(document).ready(function() {
    $('.edit-profession, .delete-profession').on('click', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('.name-prof').val(name);
        $('.id-prof').val(id);
    });
    $('.add-result').on('click', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('.profession-name').html(name);
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

    $('#formAddResult').on('submit',function () {
        var form = new FormData($(this)[0]);
        let url = $('#url').val();
        $.ajax({
            method:"POST",
            dataType:'JSON',
            url:url+"admin/MainAdmin/addResult",
            data:form,
            contentType:false,
            processData:false

        }).done(function(data){
            if (data['succes'] == 1) {
                alert('Результат добавлен');
            }
            else{
                alert('Произошла ошибка');
            }

        });
    });


});