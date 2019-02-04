function showend() {
    let lastpage = document.getElementById('last').value;
    let endbutton = document.getElementById('end_button');
    if (lastpage == 2) {
        endbutton.style.display = "block";
    }
}

showend();

function go() {
    var checkboxes = document.getElementsByName('check[]');
    var checkboxesChecked = [];
    for (var index = 0; index < checkboxes.length; index++) {
        if (checkboxes[index].checked) {
            checkboxesChecked.push(checkboxes[index].value);
        }
    }
    return checkboxesChecked;
}

$(document).ready(function () {
    let url = $('#url').val();
    $('.go').on('click', function () {
        let id = $('#id').val();
         let go1 = go();
        $.ajax({
            method: "POST",
            dataType: 'JSON',
            url: url + "Welcome/balls",
            data: {ans: go1, id: id}
        }).done(function () {
            alert('done');
        });
    });

    $('#end_button').on('click', function () {
        let finish = 1;
        let id = $('#id').val();
        let go2 = go();
        $.ajax({
            method: "POST",
            dataType: 'JSON',
            url: url + "Welcome/balls",
            data: {ans: go2, id: id, finish: finish}
        }).done(function (data) {
            if (data['finish'] == 1){
                let finishUrl = url + "Welcome/finish";
                window.location.replace(finishUrl);
            }
        });
    });

});
