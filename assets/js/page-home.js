document.addEventListener('DOMContentLoaded', function () {
    var IsHomeReferansSlider = document.querySelectorAll('.home-referans');
    if (IsHomeReferansSlider.length>0) {
        var HomeReferans = new Splide('.home-referans', {
            type: 'loop',
            drag: 'free',
            snap: true,
            perPage: 10,
            autoplay: true,
            interval: 1500,
            arrows: false,
            pagination: false,
            breakpoints: {
                650: {
                    perPage: 3
                },
                1000: {
                    perPage: 7
                },
            }
        });
        HomeReferans.mount();   
    }

    var IsCategorySlider = document.querySelectorAll('.home-category-list');
    if (IsCategorySlider.length>0) {
        var CategorySlider = new Splide('.home-category-list', {
            drag: 'free',
            snap: true,
            perPage: 8,
            arrows: true,
            gap: 10,
            pagination: false,
            breakpoints: {
                650: {
                    perPage: 2
                },
                1000: {
                    perPage: 5
                },
            },
            classes: {
                arrows: 'category-slider-arrow'
            }
        });
        CategorySlider.mount();   
    }

    document.addEventListener('click', function (event) {
        if (event.target.closest('.btn-hazir-makale-demo')) {
            let Url = document.getElementById('hazir-makale-demo-url').value;
            let Data = new FormData();

            var datacontent = event.target.getAttribute('data-content');
            var datatitle = event.target.getAttribute('data-title');

            SuccessMessage(datatitle, datacontent);
            return false;
            Post(Url, Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    Swal.fire({
                        title: datacontent, 
                        html: datatitle,  
                        confirmButtonText: "KAPAT", 
                        customClass: {
                            container: 'demo-content',
                            confirmButton: 'bg-color2 color4'
                          }
                      });
                }
            });
        }
        if (event.target.closest('.btn-category-select')) {
            let Url = document.getElementById('hazir-makale-listele-url').value;
            var catId = event.target.getAttribute('data-category-id');

            $.ajax({
                url: Url+"/"+catId,
                type: "POST",
                dataType: 'json',
                success:function(data) {
                    Url+"/"+catId
                    if(data.length>0){
                        $(".defaultArticle").html("");
                        data.forEach(function(data,index){
                            var article =   ''+
                                            '<tr class="defaultArticle">'+
                                                '<td data-label="Makale Kategorisi">'+
                                                    '<span class="badge bg-sheer-color2 color2">Genel</span>'+
                                                '</td>'+
                                                '<td class="mt-title">'+
                                                    '<span>'+data.readyarticlesdetail_title+'</span>'+
                                                '</td>'+
                                                '<td data-label="Kelime Say&#305;s&#305;">'+
                                                    '<span>326</span>'+
                                                '</td>'+
                                                '<td data-label="Fiyat">'+
                                                    '<span>13,04 TL</span>'+
                                                '</td>'+
                                                '<td>'+
                                                    '<button type="button" data-id="'+data.readyarticlesdetail_id+'" data-content="'+data.readyarticlesdetail_content+'" data-title="'+data.readyarticlesdetail_title+'" class="btn btn-sm w-fit bg-sheer-color2 color2 br-5 w-m-100 btn-hazir-makale-demo">DEMO</button>'+
                                                    '<button type="button" data-id="'+data.readyarticlesdetail_id+'" class="btn btn-sm w-fit br-5 w-m-100 btn-add-cart">SEPETE EKLE</button>'+
                                                '</td>'+
                                            '</tr>';
                            $(".printAfterArticle").after(article);
                           
                        });
                    }else{
                        $(".defaultArticle").html("");
                        var article =   ''+
                                        '<tr>'+
                                            '<td data-label="Makale Kategorisi">'+
                                                '<span>İçerik Yok</span>'+
                                            '</td>'+
                                        '</tr>';
                        $(".printAfterArticle").after(article);
                    }
                },
                async: false
            });


        }
    });
});