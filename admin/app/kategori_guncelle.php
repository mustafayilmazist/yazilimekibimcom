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
                    <h1 class="page-header">Kategori Güncelle</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 

                            if (!get("id")) {
                                header("location:index.php");exit();
                            }

                            $id = (int)get("id");

                            $db->sql = "select * from kategori where kategori_id=?";
                            $db->veri = array( $id );

                            $kategori = $db->select(1);

                            if ( $kategori == false ) {
                                header("location:index.php");exit();
                            }
                            $kategori_baslik = $kategori->kategori_baslik;

                            if (pisset()) {                                
                                $kategori_baslik = post("kategori_baslik");
                                if ( $kategori_baslik == "") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı </strong><br> Kategori Başlık Gerekli</div>';
                                }else{
                                    $db->sql = " update kategori set kategori_baslik=? where kategori_id=? ";
                                    $db->veri = array($kategori_baslik,$id);
                                    $guncelle = $db->insert();
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
                                    Kategori bilgileri
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Kategoriler</label>
                                                    <select class="form-control">
                                                        <?php 
                                                        $db->sql = " select * from kategori ";
                                                        $kategoriler = $db->select();
                                                        if ( $kategoriler != false ) {

                                                            foreach ($kategoriler as $key => $value) {
                                                                if ($id==$value->kategori_id) {
                                                                    $selected ="selected";
                                                                }else{
                                                                     $selected ="";
                                                                }
                                                                echo '<option value="" '. $selected .'>'. $value->kategori_baslik .'</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kategori başlık</label>
                                                    <input class="form-control" name="kategori_baslik" value="<?php echo $kategori_baslik; ?>">
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
