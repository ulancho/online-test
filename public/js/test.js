function addLocal(con) {
    var cart = [];
    var quesyion_id  =  cart = con.getAttribute('data-id');
    var answer_num = con.getAttribute('data-ans');
    cart.push(quesyion_id);
    console.log(cart);
}