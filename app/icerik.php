<?php 
require 'inc/ust.php';
require 'inc/header.php';
?>
<main  style="background-color: #f2f2f2;">
	<div class="container-fluid">
		<div class="container" id="icerik">
			<div class="col-md-8" id="sol">
				<?php  
				if ( !get("id") ) {
					header("location:index.php");exit();
				}

				$id = (int)get("id");

				$db->sql = "select * from  icerik where icerik_id=?";
				$db->veri = array( $id );
				$icerik = $db->select(1);

				if ( $icerik== false) {
					header("location:index.php");exit();
				}

				$hit = $icerik->hit;
				$hit++;
				$db->sql = "update icerik set hit=? where icerik_id=?";
				$db->veri = array($hit,$id);
				$db->insert();
				?>
				<h1>iÇERİK SAYFASI</h1>
				<div class="kutu">
					<a href="">
						<h3><?=$icerik->icerik_baslik; ?></h3>
					</a>
					<p class="tarih"> <?php echo $icerik->tarih; ?></p>
					<p class="icerik"><?=$icerik->icerik_aciklama; ?><br><br><?=$icerik->icerik_detay; ?></p>
					<p class="okunma">Görüntülenme <?=$hit; ?></p>
				</div>	
				<?php 
				if (pisset()) {
					$yorum = post("yorum");
					$adsoyad = post("isim");
					$eposta = post("eposta");
					$web = post("web");
					if ( $adsoyad == "" or $eposta == "" ) {
						$yorum_kaydet = '<div class="alert alert-warning"><strong>Uyarı </strong>Gerekli Alanları Doldurun.</div>';
					}else{
						$db->sql = "insert into yorum set yorum_adsoyad=?,yorum_icerik=?,yorum_email=?,yorum_web=?,yorum_icerik_id=?";
						$db->veri = array($adsoyad,$yorum,$eposta,$web,$id);
						$ekle = $db->insert();
						if ( $ekle ) {
							$yorum_kaydet = '<div class="alert alert-success"><strong>Başarılı </strong>Yorumunuz Kaydedildi.</div>';
						}else{
							$yorum_kaydet = '<div class="alert alert-danger"><strong>Başarısız </strong>Yorumunuz Kaydedilemedi.</div>';
						}
					}
				}
				$db->sql = "select * from yorum where yorum_icerik_id=? and yorum_onay=? order by yorum_id desc";
				$db->veri = array($id,1);
				$yorumlar = $db->select();
				$adet = $db->adet();
				if ( $yorumlar != false ) {
					echo '“'. $icerik->icerik_baslik .'” hakkında '. $adet .' yorum';
					foreach ($yorumlar as $key => $value) {
						?>
						<div class="kutu">
							<strong><?php echo $value->yorum_adsoyad; ?></strong>
							<p><?=$value->yorum_icerik; ?></p>
						</div>
						<?php
					}
				}
				?>
				<div class="kutu">
					<?php 
					if (isset($yorum_kaydet)) { echo $yorum_kaydet;}
					?>
					<h3>BİR CEVAP YAZIN</h3>
					<p>E-posta hesabınız yayımlanmayacak. Gerekli alanlar * ile işaretlenmişlerdir</p>
					<form action="" method="post">
						<div class="form-group">
							<label for="">Yorum</label>
							<textarea name="yorum" id="" rows="5" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="">İsim *</label>
							<input type="text" name="isim" class="form-control">
						</div>
						<div class="form-group">
							<label for="">E-posta *</label>
							<input type="text" name="eposta" class="form-control">
						</div>
						<div class="form-group">
							<label for="">İnternet sitesi</label>
							<input type="text" name="web" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" value="YORUM GÖNDER" class="btn btn-danger">
						</div>
					</form>
				</div>
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