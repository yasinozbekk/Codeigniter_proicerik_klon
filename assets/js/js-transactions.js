
function Post(Url, Data, Success = null, FormItem = null) {
    AddLoader();
    if (FormItem != null) {
        FormItem.querySelectorAll('button').forEach(Item => {
            Item.disabled = true;
        });
    }
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', Url);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            RemoveLoader();
            if (FormItem != null) {
                FormItem.querySelectorAll('button').forEach(Item => {
                    Item.disabled = false;
                });
            }
        }
        if (xhr.readyState > 3 && xhr.status == 200) {
            if (Success != null) {
                Success(JSON.parse(xhr.responseText));
            } else {
                Result = JSON.parse(xhr.responseText);
                SuccessMessage(Result['Result']['title'], Result['Result']['message']);
            }
        } else if (xhr.readyState > 3 && xhr.status != 200) {

            // SuccessMessage("asdasd", "asdasd");
            //ErrorMessage('HATA OLUŞTU!', 'Beklenmeyen bir hata oluştu. Lütfen internet bağlantınızı kontrol ederek yada sayfayı yenileyerek tekrar deneyiniz...');
        }
    };
    xhr.send(Data);
}

function AddLoader() {
    let Style = document.createElement('style');
    Style.innerHTML = '.loading{width:100%;top:0px;height:100%;z-index:99999999999999999;background:rgba(0,0,0,.5);position:fixed;display:block}.loading-inner{width:200px;height:200px;margin:20% auto;top:0px;left:0;right:0;justify-content:center;align-content:center;flex-wrap:wrap;display:flex;position:fixed}.loading-inner>span{width:fit-content;font-size:20px;margin-top:10px;color:#fff;display:block}.btn-loader-container{width:100px;justify-content:center;display:flex;}.btn-loader-container>.btn-loader{border:3px solid #f3f3f3;border-radius:50%;border-top:3px solid #f26600;width:100px;height:100px;-webkit-animation:1s linear infinite spin;animation:1s linear infinite spin;display:block;}.loader{border:10px solid #f3f3f3;border-radius:50%;border-top:10px solid var(--color2);width:100px;height:100px;-webkit-animation:1s linear infinite spin;animation:1s linear infinite spin}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}';
    Style.setAttribute('id', 'loader-style');
    Style.setAttribute('type', 'text/css');
    document.head.appendChild(Style);
    let LoadingDiv = document.createElement('div');
    LoadingDiv.innerHTML = '<div class="loading-inner"><div class="loader"></div><span>Lütfen Bekleyiniz...</span></div>';
    LoadingDiv.setAttribute('class', 'loading');
    document.body.appendChild(LoadingDiv);
}

function RemoveLoader() {
    document.querySelector('.loading').remove();
    document.getElementById('loader-style').remove();
}

function ErrorMessage(Title, Message, Url = null) {
    Swal.fire({
        icon: 'error',
        title: Title,
        html: Message,
        confirmButtonColor: '#0095e8',
        confirmButtonText: 'TAMAM'
    }).then((result) => {
        if (result.isConfirmed && Url != null) {
            window.location = Url;
        }
    });
}

function SuccessMessage(Title, Message, Url = null) {
    Swal.fire({
        icon: 'success',
        title: Title,
        html: Message,
        confirmButtonColor: '#0095e8',
        confirmButtonText: 'TAMAM'
    }).then((result) => {
        if (result.isConfirmed && Url != null) {
            window.location = Url;
        }
    });
}

function QuestionMessage(Title, Message, Url, Data, Success, BtnOk = 'SİL', BtnCancel = 'VAZGEÇ') {
    Swal.fire({
        title: Title,
        html: Message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: BtnOk,
        cancelButtonText: BtnCancel
    }).then((result) => {
        if (result.isConfirmed) {
            Post(Url, Data, Success);
        }
    });
}