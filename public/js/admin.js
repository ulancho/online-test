function checkboxQ(context) {

    var elements = context.parentElement.parentElement.previousElementSibling.childNodes;

    var code_answer = context.getAttribute('data-code_answer');

    if (context.checked === true) {
        for (var i = 0; i < elements.length; i++) {
            if (elements[i].className === 'form-control') {
                elements[i].setAttribute('name', 'name-' + code_answer);
                elements[i].style.border = '2px solid black';
                elements[i].removeAttribute('readonly');
            }
        }
    } else {
        for (var i = 0; i < elements.length; i++) {
            if (elements[i].className === 'form-control') {
                elements[i].removeAttribute('name');
                elements[i].style.border = '1px solid #ccc';
                elements[i].setAttribute('readonly', 'readonly');
                elements[i].value = '';
            }
        }
    }
}

function fileNone(cont) {
    var elems = document.getElementsByClassName('file');
    var str =  document.getElementsByClassName('str');
    if (cont.checked === true) {
    for (var i=0;i<elems.length;i+=1){
        elems[i].style.display = 'block';
    }
        for (var i=0;i<str.length;i+=1){
            str[i].style.display = 'none';
        }
    }
    else{
        for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
        }
        for (var i=0;i<str.length;i+=1){
            str[i].style.display = 'block';
        }
    }

}

function checkboxFile(context) {
    var elements = context.parentElement.parentElement.previousElementSibling.childNodes;


    var code_answer = context.getAttribute('data-code_answer');

    if (context.checked === true) {
        for (var i = 0; i < elements.length; i++) {
            if (elements[i].className === 'form-control') {
                elements[i].setAttribute('name', 'name-' + code_answer);
                elements[i].style.border = '2px solid black';
                elements[i].removeAttribute('disabled');
            }
        }
    } else {
        for (var i = 0; i < elements.length; i++) {
            if (elements[i].className === 'form-control') {
                elements[i].removeAttribute('name');
                elements[i].style.border = '1px solid #ccc';
                elements[i].setAttribute('disabled', 'disabled');
                elements[i].value = '';
            }
        }
    }
}