<div class="kutu">
	<div>
		<h2>KATEGORİLER</h2>
		<ul class="sag_kategoriler">
			<?php 
			$db->sql = "select * from kategori";
			$sag_kategoriler = $db->select();
			if ($sag_kategoriler!=false) {
				foreach ($sag_kategoriler as $key => $value) {
					?>
					<li><a href="index.php?url=kategori&id=<?=$value->kategori_id; ?>"><?=$value->kategori_baslik; ?></a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>
	<div>
		<h2>SON YORUMLANANLAR</h2>
		<ul class="sag_son_yorumlananlar">
			<?php 
			$db->sql = "select * from yorum where yorum_onay=1 order by yorum_id desc limit 5";
			$son_yorumlananlar = $db->select();
			if ( $son_yorumlananlar) {
				foreach ($son_yorumlananlar as $key => $value) {
					$icerik_id = $value->yorum_icerik_id;
					$db->sql = "select * from icerik where icerik_id=?";
					$db->veri = array($icerik_id);
					$icerik = $db->select(1);
					?>
					<li><a href="index.php?url=icerik&id=<?php echo $icerik->icerik_id;?>"><?php echo $icerik->icerik_baslik; ?> için <?php echo $value->yorum_adsoyad; ?></a></li>
					<?php
				}
			}
			?>
		</ul>						
	</div>
	<div>
		<h2>EN ÇOK GÖRÜNTÜLENENLER</h2>
		<ul class="sag_en_cok_gorunenler">
			<?php 
			$db->sql = "select * from icerik order by hit desc limit 5";
			$en_cok_gorunenler = $db->select();
			if ( $en_cok_gorunenler != false ) {
				foreach ($en_cok_gorunenler as $key => $value) {
					?>
					<li><a href="index.php?url=icerik&id=<?php echo $value->icerik_id; ?>"><?php echo $value->icerik_baslik; ?> (<?php echo $value->hit; ?>)</a></li>
					<?php
				}
			}
			?>
		</ul>
	</div>				
</div>