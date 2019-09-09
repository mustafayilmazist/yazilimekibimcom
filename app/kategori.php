<?php 
require 'inc/ust.php';
require 'inc/header.php';
?>
<main  style="background-color: #f2f2f2;">
	<div class="container-fluid">
		<div class="container" id="icerik">
			<div class="col-md-8" id="sol">
				<?php 
				if (!get("id")) {
					header("location:index.php");exit();
				}
				$id = (int)get("id");

				$db->sql = "select * from icerik where icerik_kategori_id=? order by icerik_id desc";
				$db->veri = array( $id );
				$kategori_icerikler = $db->select();
				if ( $kategori_icerikler==false ) {
					?>
					<div class="kutu"><p>İçerik bulunamadı.</p></div>
					<?php
				}else{
					?>
					<h1>KATEGORİ SAYFASI</h1>
					<?php 
					foreach ($kategori_icerikler as $key => $value) {
						?>
						<div class="kutu">
							<a href="index.php?url=icerik&id=<?=$value->icerik_id; ?>">
							<h3><?=$value->icerik_baslik; ?></h3>
							</a>
							<p class="tarih"> <?php echo $value->tarih; ?></p>
							<p class="icerik"><?=$value->icerik_aciklama; ?></p>
							<p class="okunma">Görüntülenme <?=$value->hit; ?></p>
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