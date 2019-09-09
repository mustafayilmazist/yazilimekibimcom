<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>admin:giriş</title>
    <link href="<?php echo URL; ?>public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/admin/css/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/admin/css/startmin.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" style="margin-top:150px">
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
                            // $sifre = "qwertyeren";
                            // echo 'şifreniz :: '. $sifre ."<br>";
                            // $ysifre = md5($sifre);
                            // echo 'güvenli şifreniz :: '. $ysifre ."<br>";

                            if (pisset()) {
                                $kullanici = post("kullanici");
                                $sifre = post("sifre");
                                // echo 'girdiğiniz şifre :: '.$sifre ."<br>";
                                $ysifre = md5($sifre);
                                // echo 'girdiğiniz şifre (güvenli) :: '.$ysifre ."<br>";
                                if ($kullanici=="" or $sifre=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı</strong>Kullanıcı Bilgileri Girilmedi</div>';
                                }else{

                                    $db->sql = " select * from uye where uye_kullanici = ? and uye_sifre = ? and uye_onay = ? and (uye_yetki = ? or uye_yetki = ?) ";
                                    $db->veri = array( $kullanici, $ysifre, 1 ,"admin","uye");
                                    $uye = $db->select(1);

                                    if ( $uye !=false ) {
                                        echo '<div class="alert alert-success"><strong>Başarılı</strong>Kullanıcı Bilgileri Doğru</div>';
                                        $_SESSION["admin"]=true;
                                        $_SESSION["uye_adsoyad"] = $uye->uye_adsoyad;
                                        $_SESSION["uye_yetki"] = $uye->uye_yetki;
                                        header("location:index.php");
                                        exit();
                                    }else{
                                        echo '<div class="alert alert-danger"><strong>Başarısız</strong>Kullanıcı Bilgileri Yanlış</div>';
                                    }
                                }
                            }
                            ?>                            
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">&nbsp</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" action="index.php?url=login">
                                        <div class="form-group">
                                            <label>Kullanıcı</label>
                                            <input class="form-control" type="text" name="kullanici" placeholder="Kullanıcı Adınız">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Şifre</label>
                                            <input class="form-control" type="password" name="sifre" placeholder="Şifreniz">
                                        </div>    
                                        <button type="submit" class="btn btn-info">Giriş</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?php echo URL; ?>public/admin/js/jquery.min.js"></script>
        <script src="<?php echo URL; ?>public/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo URL; ?>public/admin/js/metisMenu.min.js"></script>
        <script src="<?php echo URL; ?>public/admin/js/startmin.js"></script>
    </body>
    </html>
