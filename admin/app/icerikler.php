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
                    <h1 class="page-header">İçerikler</h1>
                    <?php 
                    $db->sql = " select * from icerik order by icerik_id desc ";
                    $icerikler = $db->select();
                    if ( $icerikler == false ) {
                        echo '<p>İçerik Bulunamadı</p>';
                    }else{
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tüm İçerikler
                            </div>
                            <div class="panel-body">
                                <?php 
                                if (get("islem")=="silindi") {
                                    echo '<div class="alert alert-success"><strong>Başarılı</strong> Bilgiler Silindi</div>';
                                }elseif (get("islem")=="silinemedi") {
                                    echo '<div class="alert alert-danger"><strong>Başarısız</strong> Bilgiler Silinemedi</div>';
                                }
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>İçerik Başlık</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($icerikler as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?=$no++; ?></td>
                                                    <td><?php echo $value->icerik_baslik; ?></td>
                                                    <td>
                                                        <a href="index.php?url=icerik_guncelle&id=<?=$value->icerik_id; ?>" class="btn btn-info">Düzelt</a>
                                                        <a href="index.php?url=icerik_sil&id=<?=$value->icerik_id; ?>" class="btn btn-danger"onclick="return confirm('Silinecek Eminmisiniz ?');">Sil</a>
                                                    </td>
                                                </tr>
                                                <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
require 'inc/alt.php';
?>
