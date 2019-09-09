<?php 
require 'inc/ust.php';
require 'inc/header.php';
?>
<main  style="background-color: #f2f2f2;">
	<div class="container-fluid">
		<div class="container" id="icerik">
			<div class="col-md-8" id="sol">
				<div class="kutu">
				<h3>Bana Ulaşın</h3>
				<p>
					Telefon: 0212 111 2233
				</p>
				<p>
					E-Mail: mustafayilmazbilgisayar@gmail.com
				</p>
				<p>
					Adres: www.vikuba.com
				</p>
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