<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <title><?php echo get_website_title('Sign Up'); ?></title>
   
    <?php echo global_load_styles(); ?>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login be-signup">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container sign-up">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading"><img src="/public/img/logo-xx.png" alt="logo" height="50" class="logo-img"><span class="splash-description">Please enter your user information.</span></div>
              <div class="panel-body">
               <form action="#" data-parsley-validate=""><span class="splash-title xs-pb-20">Sign Up</span>
				<?php echo validation_errors('<div>', '</div>'); ?>
                  <div class="form-group">
                    <input type="text" name="name" placeholder="Name" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" required="required" placeholder="E-mail" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group row signup-password">
                    <div class="col-xs-6">
                      <input id="pass1" type="password"  placeholder="Password" class="form-control">
                    </div>
                    <div class="col-xs-6">
                      <input placeholder="Confirm" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="tel" name="phone" placeholder="Phone" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group xs-pt-10">
                    <div class="be-checkbox">
                      <input type="checkbox" id="remember">
                      <label for="remember">By creating an account, you agree the <a href="#">terms and conditions</a>.</label>
                    </div>
                  </div>
                  <div class="form-group xs-pt-10">
                    <button type="submit" class="btn btn-block btn-primary btn-xl">Sign Up</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="splash-footer">&copy; <?php echo date('Y'); ?> <strong>MyPrintPanel</strong>. Some rights reserved.</div>
          </div>
        </div>
      </div>
    </div>
    <?php echo global_load_scripts(); ?>
	
	<script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	$('form').parsley();
      });
    </script>
    <!-- <script type="text/javascript">
      // $(document).ready(function(){
      	initialize the javascript
      	// App.init();
      	// $('form').parsley();
      	
		// var App = (function () {

  // App.moduleName = function( ){
    // 'use strict'

   // alert('register');
    
  // };

  // return App;
// })(App || {});
      // });
    // </script>-->
  </body>
</html>