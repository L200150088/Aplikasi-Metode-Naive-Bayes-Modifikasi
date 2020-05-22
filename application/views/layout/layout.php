<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>
<!--  sidebar-xs -->

	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<?php $this->load->view('layout/sidebar'); ?>

			<!-- Main content -->
			

				<!-- Page header -->
				
				<!-- /page header -->

			<?php $this->load->view($content); ?>

			<!-- Footer -->
			
			<!-- /footer -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
