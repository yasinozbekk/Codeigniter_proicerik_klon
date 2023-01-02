document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (event) {
        if (event.target.closest('.btn-odeme-kotrol')) {
            let Data = new FormData();
            Data.append('SatisSozlesmesi', document.querySelector('#SatisSozlesmesi').checked);
            Data.append('_token', document.getElementsByName('_token')[0].value);
            Post(event.target.getAttribute('data-url'), Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    if (Result['Result']['PageUrl']) {
                        window.location = Result['Result']['PageUrl'];
                    }
                } else if (Result['Result']['Status'] == 'form_error') {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['FormData']);
                } else {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['Message']);
                }
            });
        }
        if (event.target.closest('.btn-delete-cart')) {
            let AddCartUrl = document.getElementById('cart').getAttribute('href');
            let Data = new FormData();
            Data.append('UrunId', event.target.getAttribute('data-id'));
            Data.append('_token', document.getElementsByName('_token')[0].value);
            QuestionMessage('ÜRÜN SİLİNSİN Mİ?', 'Sepetinize eklemiş olduğunuz ürün silinsin mi?', AddCartUrl, Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    if (Result['Result']['PageUrl']) {
                        SuccessMessage(Result['Result']['Title'], Result['Result']['Message'], Result['Result']['PageUrl']);
                    } else {
                        SuccessMessage(Result['Result']['Title'], Result['Result']['Message']);
                    }
                    document.getElementById('cart').querySelectorAll('.cart-total')[0].innerHTML = Result['Result']['ToplamUrunSayisi'];
                } else if (Result['Result']['Status'] == 'form_error') {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['FormData']);
                } else {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['Message']);
                }
            });
        }
        if (event.target.closest('.btn-bakiye-odemesi-yap')) {
            let Url = event.target.getAttribute('data-url');
            let Data = new FormData();
            Data.append('_token', document.getElementsByName('_token')[0].value);
            Post(Url, Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    if (Result['Result']['PageUrl']) {
                        window.location = Result['Result']['PageUrl'];
                    }
                } else if (Result['Result']['Status'] == 'form_error') {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['FormData']);
                } else {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['Message']);
                }
            });
        }
    });
    document.addEventListener('change', function (event) {
        if (event.target.closest('[name=MakaleTuru]')) {
            let Url = document.getElementById('OdemeTipiUrl').value;
            let Data = new FormData();
            Data.append('OdemeTipi', event.target.value);
            Data.append('_token', document.getElementsByName('_token')[0].value);
            Post(Url, Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    document.getElementById('OdemeMetodu').innerHTML = Result['Result']['OdemeSayfasi'];
                } else if (Result['Result']['Status'] == 'form_error') {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['FormData']);
                } else {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['Message']);
                }
            });
        }
    });
});