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
                    <?php 
                    if ($_SESSION["uye_yetki"]=="admin") 
                    {
                        ?>
                        <h1 class="page-header">AYARLAR</h1>


                        <?php 
                    }
                    else
                    {
                        echo '<h1 class="page-header">UYARI</h1>';
                        echo '<p>Bu Sayfayı Editörler Göremez.</p>';
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
