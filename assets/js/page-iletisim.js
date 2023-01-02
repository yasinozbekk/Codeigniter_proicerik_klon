document.addEventListener('DOMContentLoaded', function () {
    const frmIletisim = document.getElementById('frmIletisim');
    if (frmIletisim) {
        frmIletisim.addEventListener("submit", function (e) {
            e.preventDefault();
            let Data = new FormData(frmIletisim);
            Post(frmIletisim.getAttribute('action'), Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
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
            }, frmIletisim);
        });
    }
});