<?php 
$template->startHead();
$template->endHead();
$template->startBody();
?>

<!-- Starting Body of page -->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron bg-dark" style="padding-top: 5px;">
				<div class="col-md-2">
					<img src="<?php echo BASE_URI ?>assets/images/geeky_logo.jpg" alt="Logo" width="100" height="100" class="img rounded-circle mx-auto d-block">	
				</div>
				<div class="col-md-10">
					<h2 class="text-success">This is about page for Geeky MVC Framework !</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $template->endBody(); ?>

