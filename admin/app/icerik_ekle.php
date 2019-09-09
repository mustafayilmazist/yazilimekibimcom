<?php 
require 'inc/ust.php'; 
?>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php 
        require 'inc/ust_nav.php'; 
        require 'inc/sol_nav.php';
        ?>                
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">İçerik Ekle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                            if (pisset()) {
                                // yıl - ay - gün
                                $tarih = date("Y-m-d");
                                $icerik_kategori = post("icerik_kategori");
                                $icerik_baslik = post("icerik_baslik");
                                $icerik_aciklama = post("icerik_aciklama");
                                $icerik_detay = post("icerik_detay");
                                if ( $icerik_kategori=="" and $icerik_baslik=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli <a href="#" class="alert-link">Yeni ekle</a></div>';
                                }else{
                                    $db->sql = "insert into icerik set icerik_baslik=?,icerik_aciklama=?,icerik_detay=?,icerik_kategori_id=?,tarih=?";
                                    $db->veri = array($icerik_baslik,$icerik_aciklama,$icerik_detay,$icerik_kategori,$tarih);
                                    $ekle = $db->insert();
                                    if ( $ekle ) {
                                        echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Bilgiler Eklendi <a href="#" class="alert-link">Yeni ekle</a></div>';
                                    }else{
                                        echo '<div class="alert alert-danger"><strong>Başarısız </strong><br> Bilgiler Eklenemedi <a href="#" class="alert-link">Yeni ekle</a></div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    İçerik bilgileri
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" name="icerik_kategori">
                                                        <option value="">Seçiniz</option>
                                                        <?php 
                                                        $db->sql = " select * from kategori ";
                                                        $kategoriler = $db->select();
                                                        if ( $kategoriler != false ) {

                                                            foreach ($kategoriler as $key => $value) {
                                                                echo '<option value="'. $value->kategori_id .'">'. $value->kategori_baslik .'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik başlık</label>
                                                    <input class="form-control" name="icerik_baslik">
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Açıklama</label>
                                                    <textarea name="icerik_aciklama" id=""  rows="3" class="form-control" ></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Detay</label>
                                                    <textarea name="icerik_detay" id=""  rows="3" class="form-control ckeditor" ></textarea>
                                                </div>
                                                <input type="submit" value="Ekle" class="btn btn-info">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require 'inc/alt.php';
?>
