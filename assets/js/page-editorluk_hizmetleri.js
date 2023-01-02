document.addEventListener('DOMContentLoaded', function () {
    let Basliklar = '';
    document.addEventListener('change', function (event) {
        if (event.target.closest('#BaslikBelirle')) {
            var isChecked = event.target.checked;
            if (isChecked) {
                Basliklar = document.getElementById('Basliklar').value;
                document.getElementById('Basliklar').value = '';
                document.getElementById('Basliklar').disabled = true;
            }else{
                document.getElementById('Basliklar').value = Basliklar;
                document.getElementById('Basliklar').disabled = false;
            }
        }
    });
    document.addEventListener('click', function (event) {
        if (event.target.closest('#btnAddCart')) {
            event.target.disabled = true;
            let AddCartUrl = document.getElementById('cart').getAttribute('href');
            let frmEditorlukHizmeti = document.getElementById('frmEditorlukHizmeti');
            let Data = new FormData(frmEditorlukHizmeti);
            Data.append('UrunId', event.target.getAttribute('data-id'));
            Post(AddCartUrl, Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    document.getElementById('cart').querySelectorAll('.cart-total')[0].innerHTML = Result['Result']['ToplamUrunSayisi'];
                    if (Result['Result']['PageUrl']) {
                        SuccessMessage(Result['Result']['Title'], Result['Result']['Message'], Result['Result']['PageUrl']);
                    } else {
                        SuccessMessage(Result['Result']['Title'], Result['Result']['Message']);
                    }
                } else if (Result['Result']['Status'] == 'form_error') {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['FormData']);
                } else {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['Message']);
                }
                event.target.disabled = false;
            });
        }
    });
});