//Carrinho de compras para laravel com ajax e popup
function compra(id, clas) {
    console.log(clas)
    $.ajax({
        url: "carrinho/add",
        type: 'post',
        data: {
            travels_id: id,
            clas: clas,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $("#resultado").html("ENVIANDO...");
        }
    })
        .done(function (msg) {
            $("#resultado").html(msg);
        })
        .fail(function (jqXHR, textStatus, msg) {
            alert(msg);
        });
}