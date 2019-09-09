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
                    <h1 class="page-header">İçerik Güncelle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 

                            if (!get("id")) {
                                header("location:index.php");exit();
                            }

                            $id = (int)get("id");

                            $db->sql = "select * from icerik where icerik_id=?";
                            $db->veri = array( $id );

                            $icerik = $db->select(1);

                            if ( $icerik == false ) {
                                header("location:index.php");exit();
                            }

                            $icerik_baslik = $icerik->icerik_baslik;
                            $icerik_aciklama = $icerik->icerik_aciklama;
                            $icerik_detay = $icerik->icerik_detay;
                            $icerik_kategori_id = $icerik->icerik_kategori_id;

                            if (pisset()) {
                                $tarih = date("Y-m-d");
                                $icerik_kategori = post("icerik_kategori");
                                $icerik_baslik = post("icerik_baslik");
                                $icerik_aciklama = post("icerik_aciklama");
                                $icerik_detay = post("icerik_detay");
                                if ( $icerik_kategori=="" and $icerik_baslik=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> İçerik Kategori veya İçerik Başlık Gerekli</div>';
                                }else{
                                    $db->sql = "update icerik set icerik_baslik=?,icerik_aciklama=?,icerik_detay=?,icerik_kategori_id=?,tarih=? where icerik_id=?";
                                    $db->veri = array($icerik_baslik,$icerik_aciklama,$icerik_detay,$icerik_kategori,$tarih,$id);
                                    $guncelle = $db->update();
                                    if ( $guncelle ) {
                                        echo '<div class="alert alert-success"><strong>Başarılı </strong><br> Değişiklikler Eklendi</div>';
                                    }else{
                                        echo '<div class="alert alert-danger"><strong>Başarısız </strong><br> Değişiklikler Eklenemedi</div>';
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
                                                                if( $icerik_kategori_id == $value->kategori_id){
                                                                    $selected = "selected";
                                                                }else{
                                                                    $selected ="";
                                                                }
                                                                echo '<option value="'. $value->kategori_id .'"'.$selected.'>'. $value->kategori_baslik .'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik başlık</label>
                                                    <input class="form-control" name="icerik_baslik" value="<?=$icerik_baslik; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Açıklama</label>
                                                    <textarea name="icerik_aciklama" id=""  rows="3" class="form-control" ><?=$icerik_aciklama; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>İçerik Detay</label>
                                                    <textarea name="icerik_detay" id=""  rows="3" class="form-control ckeditor" ><?=$icerik_detay; ?></textarea>
                                                </div>
                                                <input type="submit" value="Güncelle" class="btn btn-info">
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
