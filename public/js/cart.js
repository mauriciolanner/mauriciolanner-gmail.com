//Carrinho de compras para laravel com ajax e popup
itensCarrinho()

function compra(id, clas) {
    $.ajax({
        url: "carrinho/add",
        type: 'post',
        data: {
            travels_id: id,
            clas: clas,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            //$("#resultado").html("ENVIANDO...");
        }
    })
        .done(function (msg) {
            itensCarrinho()
            //$("#resultado").html(msg);
        })
        .fail(function (jqXHR, textStatus, msg) {
            //alert(msg);
        });
}

function itensCarrinho() {
    $.ajax({
        url: "carrinho/all",
        type: 'get',
        beforeSend: function () {
            //$("#resultado").html("ENVIANDO...");
        }
    })
        .done(function (msg) {
            document.getElementById("itens").innerHTML = '';
            itens = []
            document.getElementById('carrinho').style.display = 'block';
            if (msg == false) {
                console.log(msg)
            } else {
                $.each(msg, function (i, val) {
                    console.log(msg)
                    itens.push(`
                    <div class="carrinho-item fundo-laranja">
                        <span class="flaticon-acupuncture mr-2"></span>
                        `+ val.flightsCode + ` ` + val.airportFrom + ` -> ` + val.airportTo + ` | ` + val.Class + `
                    </div>
                    `);
                })

                itens.forEach(preencheItens);
                function preencheItens(item, index) {
                    document.getElementById("itens").innerHTML += item;
                }
            }


        })
        .fail(function (jqXHR, textStatus, msg) {
            //alert(msg);
        });
}

