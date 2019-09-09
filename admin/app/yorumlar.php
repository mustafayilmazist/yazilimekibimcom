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
                    <h1 class="page-header">Yorumlar</h1>
                    <?php 
                    $db->sql = "select * from yorum";
                    $yorumlar = $db->select();
                    if ( $yorumlar==false) {
                        echo '<p>Yorum Bulunamadı</p>';
                    }else{
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tüm Yorumlar
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <th></th>
                                                <th>Yorum</th>
                                                <th>Ad Soyad</th>
                                                <th>E-Mail</th>
                                                <th>Web</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($yorumlar as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?=$no++; ?></td>
                                                    <td><?php echo $value->yorum_icerik; ?></td>
                                                    <td><?php echo $value->yorum_adsoyad; ?></td>
                                                    <td><?php echo $value->yorum_email; ?></td>
                                                    <td><?php echo $value->yorum_web; ?></td>
                                                    <td>
                                                    <?php 
                                                    if ( $value->yorum_onay==0) {
                                                        echo '<a href="index.php?url=yorum_onayla&id='. $value->yorum_id .'" class="btn btn-success">Onayla</a>';
                                                    }elseif( $value->yorum_onay==1){
                                                        echo '<a href="index.php?url=yorum_onayla_iptal&id='. $value->yorum_id .'" class="btn btn-danger">Onayı Kaldır</a>';
                                                    }
                                                    ?>  
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
