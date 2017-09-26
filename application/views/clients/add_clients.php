<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="<?php echo base_url('public/img'); ?>/logo-fav.png">
		<title><?= get_website_title('Clients'); ?></title>
		<?= global_load_styles(); ?>
	</head>
	<body>
		<div class="be-wrapper">
			<?php echo $header; ?>
			<?php echo $sidebar; ?>
			<div class="be-content">
				<div class="main-content container-fluid">
					<div class="row">
						<div class="col-sm-6">
						  <div class="panel panel-default panel-border-color panel-border-color-default">
							<div class="panel-heading panel-heading-divider">Account info<span class="panel-subtitle">This is the default bootstrap form layout</span></div>
							<div class="panel-body">
							  <form id="add_client">
								<div class="form-group xs-pt-10">
								  <label>Email address</label>
								  <input type="email" placeholder="Enter email" class="form-control">
								</div>
								<div class="form-group">
								  <label>Password</label>
								  <input type="password" placeholder="Password" class="form-control">
								</div>
								<div class="form-group">
								  <label>Confirm password</label>
								  <input type="password" placeholder="Confirm password" class="form-control">
								</div>
								<div class="form-group">
								  <label>Mobile number</label>
								  <input type="password" placeholder="Confirm password" class="form-control">
								</div>
								<div class="form-group">
								  <label>Main contact</label>
								  <input type="password" placeholder="Confirm password" class="form-control">
								</div>
								<div class="form-group">
								  <label>Company name</label>
								  <input type="password" placeholder="Confirm password" class="form-control">
								</div>
								<div class="form-group">
								  <label>Address</label>
								  <input type="password" placeholder="Confirm password" class="form-control">
								</div>
								<div class="row xs-pt-15">
								  <div class="col-xs-6">
									<div class="be-checkbox">
									  <input id="check1" type="checkbox">
									  <label for="check1">I let the customer know about our terms and condition</label>
									</div>
								  </div>
								  <div class="col-xs-6">
									<p class="text-right">
									  <button type="submit" class="btn btn-space btn-primary">Submit</button>
									  <button class="btn btn-space btn-default">Cancel</button>
									</p>
								  </div>
								</div>
							  </form>
							</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<?php echo $sidebar_right; ?>
		</div>
		<?= global_load_scripts(); ?>
    <script src="/public/lib/fuelux/js/wizard.js" type="text/javascript"></script>
    <script src="/public/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="/public/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/public/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="/public/js/app-form-wizard.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				App.init();
				App.wizard();
			});
		</script>
	</body>
</html>