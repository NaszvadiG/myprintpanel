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
          <div class="row wizard-row">
            <div class="col-md-12 fuelux">
              <div class="block-wizard panel panel-default">
                <div id="wizard1" class="wizard wizard-ux">
                  <ul class="steps">
                    <li data-step="1" class="active">Account info<span class="chevron"></span></li>
                    <li data-step="2">Company info<span class="chevron"></span></li>
                    <li data-step="3">Notifications<span class="chevron"></span></li>
                    <li data-step="4">Finish<span class="chevron"></span></li>
                  </ul>
                  <div class="actions">
                    <button type="button" class="btn btn-xs btn-prev btn-default"><i class="icon mdi mdi-chevron-left"></i>Prev</button>
                    <button type="button" data-last="Finish" class="btn btn-xs btn-next btn-default">Next<i class="icon mdi mdi-chevron-right"></i></button>
                  </div>
                  <div class="step-content">
				  <form id="add_client" class="form-horizontal group-border-dashed">
                        
                    <div data-step="1" class="step-pane active">
                      <div class="form-group no-padding">
                          <div class="col-sm-7">
                            <h3 class="wizard-title">Account info</h3>
                          </div>
                        </div>
						<div class="form-group">
							<div class="col-sm-7">
								<label>Email address <span class="mandatory">*</span></label>
								<input name="account_email" id="account_email" type="email" placeholder="account@package7.com" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-7">
								<label>Phone number <span class="mandatory">*</span></label>
								<input name="account_phone" id="account_phone" type="text" placeholder="07841582659" class="form-control">
							</div>
						</div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <button class="btn btn-default btn-space">Cancel</button>
                            <button data-wizard="#wizard1" class="btn btn-primary btn-space wizard-next">Next step</button>
                          </div>
                        </div>
                    </div>
                    <div data-step="2" class="step-pane">
                      <div class="form-group no-padding">
                          <div class="col-sm-7">
                            <h3 class="wizard-title">Company information</h3>
                          </div>
                        </div>
						<div class="form-group">
							<div class="col-sm-7">
								<label>Company name <span class="mandatory">*</span></label>
								<input name="account_email" id="account_email" type="email" placeholder="account@package7.com" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-7">
								<label>Company registration number <span class="mandatory">*</span></label>
								<input name="account_email" id="account_email" type="email" placeholder="account@package7.com" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-7">
								<label>Address <span class="mandatory">*</span></label>
								<textarea name="account_email" id="account_email" class="form-control" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-7">
								<label>Website <span class="mandatory">*</span></label>
								<input name="account_email" id="account_email" type="text" class="form-control">
							</div>
						</div>
                    </div>
                    <div data-step="3" class="step-pane">
                        <div class="form-group no-padding">
                          <div class="col-sm-7">
                            <h3 class="wizard-title">Configuration</h3>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6">
                            <label class="control-label">Buy Credits: <span id="credits">$30</span></label>
                            <p>This option allow you to buy an amount of credits.</p>
                            <input id="credit_slider" type="text" value="30" class="bslider form-control">
                          </div>
                          <div class="col-sm-6">
                            <label class="control-label">Change Plan</label>
                            <p>Change your plan many times as you want.</p>
                            <select class="select2">
                              <optgroup label="Personal">
                                <option value="p1">Basic</option>
                                <option value="p2">Medium</option>
                              </optgroup>
                              <optgroup label="Company">
                                <option value="p3">Standard</option>
                                <option value="p4">Silver</option>
                                <option value="p5">Gold</option>
                              </optgroup>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6">
                            <label class="control-label">Payment Rate: <span id="rate">5%</span></label>
                            <p>Choose your payment rate to calculate how much money you will recieve.</p>
                            <input id="rate_slider" data-slider-min="0" data-slider-max="100" type="text" value="5" class="bslider form-control">
                          </div>
                          <div class="col-sm-6">
                            <label class="control-label">Keywords</label>
                            <p>Write your keywords to do a successful SEO with web search engines.</p>
                            <select multiple="" class="tags">
                              <option value="1">Twitter</option>
                              <option value="2">Google</option>
                              <option value="3">Facebook</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <button data-wizard="#wizard1" class="btn btn-default btn-space wizard-previous">Previous</button>
                            <button data-wizard="#wizard1" class="btn btn-primary btn-space wizard-next">Next Step</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div data-step="4" class="step-pane">
                      <form action="#" data-parsley-namespace="data-parsley-" data-parsley-validate="" novalidate="" class="form-horizontal group-border-dashed">
                        <div class="form-group no-padding">
                          <div class="col-sm-7">
                            <h3 class="wizard-title">Configuration</h3>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6">
                            <label class="control-label">Buy Credits: <span id="credits">$30</span></label>
                            <p>This option allow you to buy an amount of credits.</p>
                            <input id="credit_slider" type="text" value="30" class="bslider form-control">
                          </div>
                          <div class="col-sm-6">
                            <label class="control-label">Change Plan</label>
                            <p>Change your plan many times as you want.</p>
                            <select class="select2">
                              <optgroup label="Personal">
                                <option value="p1">Basic</option>
                                <option value="p2">Medium</option>
                              </optgroup>
                              <optgroup label="Company">
                                <option value="p3">Standard</option>
                                <option value="p4">Silver</option>
                                <option value="p5">Gold</option>
                              </optgroup>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6">
                            <label class="control-label">Payment Rate: <span id="rate">5%</span></label>
                            <p>Choose your payment rate to calculate how much money you will recieve.</p>
                            <input id="rate_slider" data-slider-min="0" data-slider-max="100" type="text" value="5" class="bslider form-control">
                          </div>
                          <div class="col-sm-6">
                            <label class="control-label">Keywords</label>
                            <p>Write your keywords to do a successful SEO with web search engines.</p>
                            <select multiple="" class="tags">
                              <option value="1">Twitter</option>
                              <option value="2">Google</option>
                              <option value="3">Facebook</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12">
                            <button data-wizard="#wizard1" class="btn btn-default btn-space wizard-previous">Previous</button>
                            <button data-wizard="#wizard1" class="btn btn-success btn-space wizard-next">Complete</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- pana aici -->
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