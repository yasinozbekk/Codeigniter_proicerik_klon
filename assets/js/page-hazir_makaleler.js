document.addEventListener('DOMContentLoaded', function () {
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
            Data.append('MakaleId', event.target.getAttribute('data-id'));
            Data.append('_token', document.getElementsByName('_token')[0].value);
            Post(Url, Data, function (Result) {
                if (Result['Result']['Status'] == 'success') {
                    Swal.fire({
                        title: Result['Result']['Baslik'], 
                        html: Result['Result']['DemoIcerik'],  
                        confirmButtonText: "KAPAT", 
                        customClass: {
                            container: 'demo-content',
                            confirmButton: 'bg-color2 color4'
                          }
                      });
                }
            });
        }
    });
});