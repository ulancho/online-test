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

    $('.add-result').on('click',function () {
        $('#main20').val('');
        $('#dop20').val('');
        $('#main50').val('');
        $('#dop50').val('');
        $('#main90').val('');
        $('#dop90').val('');
        let url = $('#url').val();
        let id  = $(this).data('id');
         $('body').addClass("loading");
        $.ajax({
            method:"POST",
            dataType:'JSON',
            url:url+"admin/MainAdmin/getResult",
            data:{id:id}
        }).done(function(data){
             $('body').removeClass("loading");
            if (data['succes'] == 1){
                $('#main20').val(data.row[0].main20);
                $('#dop20').val(data.row[0].dop20);
                $('#main50').val(data.row[0].main50);
                $('#dop50').val(data.row[0].dop50);
                $('#main90').val(data.row[0].main90);
                $('#dop90').val(data.row[0].dop90);
            }else if(data['succes'] == 0){
                $('#main20').val('');
                $('#dop20').val('');
                $('#main50').val('');
                $('#dop50').val('');
                $('#main90').val('');
                $('#dop90').val('');
            }


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
            $("#addResult .close").click();
        });
    });


});