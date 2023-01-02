document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('click', function (event) {
        if (event.target.closest('.mobile-popup-box-btn')) {
            let PopupItem = event.target.getAttribute('data-id');
            let PopupBoxItem = document.querySelector('#'+PopupItem);
            PopupBoxItem.classList.forEach(function (item, index) {
                if (item == 'active-mobile-popup-box') {
                    document.body.classList.remove('mobile-popup-box-open');
                    PopupBoxItem.classList.remove('active-mobile-popup-box');
                } else {
                    document.body.classList.add('mobile-popup-box-open');
                    PopupBoxItem.classList.add('active-mobile-popup-box');
                }
            });
        }
        if (event.target.closest('.btn-add-cart')) {
            let AddCartUrl = document.getElementById('cart').getAttribute('href');
            let Data = new FormData();
            Data.append('UrunId', event.target.getAttribute('data-id'));
            Data.append('_token', document.getElementsByName('_token')[0].value);
            Post(AddCartUrl, Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    if (Result['Result']['PageUrl']) {
                        SuccessMessage(Result['Result']['Title'], Result['Result']['Message'], Result['Result']['PageUrl']);
                    } else {
                        SuccessMessage(Result['Result']['Title'], Result['Result']['Message']);
                    }
                    document.getElementById('cart').querySelectorAll('.cart-total')[0].innerHTML=Result['Result']['ToplamUrunSayisi'];
                    document.querySelectorAll('.mobile-cart-count')[0].innerHTML=Result['Result']['ToplamUrunSayisi'];
                } else if (Result['Result']['Status'] == 'form_error') {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['FormData']);
                } else {
                    ErrorMessage(Result['Result']['Title'], Result['Result']['Message']);
                }
            });
        } 
    });
});