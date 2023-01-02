<?php $this->load->view("header.php"); ?>

    <div class="content">
        <div class="w-100 bg-color2">
            <div class="container ozel-icerik-title-bg page-title">
                <div class="d-block">
                    <h1 class="page-title-title">Kurumsal 1</h1>
                </div>
            </div>
        </div>
        <div class="container mt-40">
            <div class="editor-right-sidebar col-m-1 row-gap-m-20">
                <div class="w-100">
                    <div class="box br-5 p-30">
                        <form id="frmEditorlukHizmeti">
                            <h3 class="box-title text-left color2">Sipari&#351; Detaylar&#305;</h3>
                            <div class="form-group mt-20">
                                <label for="SiteAdresi" class="form-group-label">Site Adresi</label>
                                <input type="text" class="form-group-input br-5" name="SiteAdresi" id="SiteAdresi" placeholder="Site adresi giriniz..." value="">
                            </div>
                            <div class="form-group mt-20">
                                <label for="PanelAdresi" class="form-group-label">Y&ouml;netim Paneli Adresi</label>
                                <input type="text" class="form-group-input br-5" name="PanelAdresi" id="PanelAdresi" placeholder="Panel adresi giriniz..." value="">
                            </div>
                            <div class="col-2 col-m-1">
                                <div class="form-group mt-20">
                                    <label for="KullaniciAdi" class="form-group-label">Kullan&#305;c&#305; Ad&#305;</label>
                                    <input type="text" class="form-group-input br-5" name="KullaniciAdi" id="KullaniciAdi" placeholder="Kullan&#305;c&#305; ad&#305; giriniz..." value="">
                                </div>
                                <div class="form-group mt-20">
                                    <label for="Sifre" class="form-group-label">&#350;ifre</label>
                                    <input type="text" class="form-group-input br-5" name="Sifre" id="Sifre" placeholder="&#350;ifre giriniz..." value="">
                                </div>
                            </div>
                            <div class="form-group mt-20">
                                <label for="Basliklar" class="form-group-label">Ba&#351;l&#305;klar</label>
                                <textarea name="Basliklar" id="Basliklar" class="form-group-textarea br-5" cols="30" rows="5" placeholder="Ba&#351;l&#305;k 1
                                Ba&#351;l&#305;k 2
                                Ba&#351;l&#305;k 3
                                Her sat&#305;ra 1 ba&#351;l&#305;k gelecek &#351;ekilde giriniz..."></textarea>
                            </div>
                            <div class="custom-checkbox mt-20">
                                <input type="checkbox" id="BaslikBelirle" class="item" name="BaslikBelirle">
                                <label for="BaslikBelirle" class="custom-checkbox-item br-5">
                                    <div class="custom-checkbox-content">
                                       <span>Ba&#351;l&#305;klar Bizim Taraf&#305;m&#305;zdan Belirlensin Mi?</span>
                                       <span>Se&ccedil;ti&#287;iniz takdirde ba&#351;l&#305;klar&#305; biz belirleriz...</span>
                                   </div>
                                   <span class="checkmark br-5"></span>
                               </label>
                           </div>
                           <div class="custom-checkbox mt-20">
                            <input type="checkbox" id="TaslakOlarakEkle" class="item" name="TaslakOlarakEkle">
                            <label for="TaslakOlarakEkle" class="custom-checkbox-item br-5">
                                <div class="custom-checkbox-content">
                                    <span>&#304;&ccedil;erikler taslak olarak eklesin mi?</span>
                                    <span>Se&ccedil;ti&#287;iniz takdirde i&ccedil;erikler sitenize taslak olarak eklenecektir...</span>
                                </div>
                                <span class="checkmark br-5"></span>
                            </label>
                        </div>
                        <div class="form-group mt-20">
                            <label for="SiparisNotu" class="form-group-label">Sipari&#351; Notu</label>
                            <textarea name="SiparisNotu" id="SiparisNotu" class="form-group-textarea br-5" cols="30" rows="5" placeholder="Sipari&#351; Notu..."></textarea>
                        </div>
                        <button type="button" class="btn br-5 mt-20 justify-content-center" data-id="eyJpdiI6IktxM3FwUEk1aU5wZVZ2WUtTMlBLelE9PSIsInZhbHVlIjoibVBuRU5Pem9JZjlNbjI4SG1Ed1ZhZ1lhR0o3ZnFwTURxcUFBSmlpRTVNZmxEanh0RkVycHY2L3A3MSs0YVVxZzNMazlIUFNvUEJPbHBZRXVLM3FTRGRBK2tBR0o5U05iRkowTTJLc2VrS0VtbWdDbjVSYzZYdGwzMzF1T0ZFbnoiLCJtYWMiOiJhZjFjMzkxZDBlZjAxMzdkNTNkNjExOTEyZWY5ZGJmMjAxNTlmOTQ4MjhhZjgwMWJmMzJjODBjN2Y0ZmFhMzVmIiwidGFnIjoiIn0=" id="btnAddCart"><span class="icon-cart mr-10"></span>SEPETE EKLE</button>
                        <input type="hidden" name="_token" value="K4ksjBu69OTgW4JBRmRgE7hKS319lbojbH7kcr8g"> </form>
                    </div>
                </div>
                <div class="w-100">
                    <div class="w-100 position-sticky">
                        <div class="box br-5 p-30">
                            <div class="box-circle-icon mt-10">
                                <img src="images/image-frame-5.webp" alt="">
                            </div>
                            <h4 class="box-title color1 mt-10"><?php echo $servicedetail->editorservices_title; ?></h4>
                            <p class="text-center"><?php echo $servicedetail->editorservices_desc; ?></p>
                            <ul class="service-detail-list mt-20">
                                <?php echo $servicedetail->editorservices_items; ?>    
                            </ul>
                        <span class="box-price mt-20">
                            <?php echo $servicedetail->editorservices_price; ?> TL
                        </span>
                        <span class="box-price-desc">
                            <?php echo $servicedetail->editorservices_days; ?> Günlük Hizmet
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("footer.php"); ?>
