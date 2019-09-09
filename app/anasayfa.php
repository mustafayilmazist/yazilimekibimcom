<?php 
require 'inc/ust.php';
require 'inc/header.php';
?>
<main  style="background-color: #f2f2f2;">
	<div class="container-fluid">
		<div class="container" id="icerik">
			<div class="col-md-8" id="sol">
				<?php 
				$db->sql = "select * from icerik order by icerik_id desc limit 10";
				$anasayfa_icerikler = $db->select();
				if ( $anasayfa_icerikler == false) {
					?>
					<div class="kutu"><p>İçerik bulunamadı.</p></div>
					<?php
				}else{
					foreach ($anasayfa_icerikler as $key => $value) {
						$db->sql = "select * from kategori where kategori_id=?";
						$db->veri = array( $value->icerik_kategori_id );
						$kategori = $db->select(1);
						$kategori_baslik = $kategori->kategori_baslik;
						?>
						<div class="kutu">
							<a href="index.php?url=icerik&id=<?=$value->icerik_id; ?>">
								<h3><?=$value->icerik_baslik; ?></h3>
							</a>
							<p class="tarih"> <?php echo $value->tarih; ?></p>
							<p class="icerik"><?=$value->icerik_aciklama; ?></p>
							<p class="okunma"><span style="float:left;">Görüntülenme <?=$value->hit; ?></span> <span style="float:right"><a href="index.php?url=kategori&id=<?php echo $value->icerik_kategori_id; ?>" style="color:#524E4E"><?=$kategori_baslik; ?></a></span></p>
						</div>
						<?php
					}
				}
				?>			
			</div>
			<div class="col-md-4" id="sag">
				<?php 
				require 'inc/icerik_sag.php';
				?>
			</div>
		</div>
	</div>
</main>
<?php 
require 'inc/footer.php';
require 'inc/alt.php';
?>