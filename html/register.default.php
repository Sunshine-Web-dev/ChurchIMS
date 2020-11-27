<?php include_once(ACTION_PATH . 'register.php');?>
<script>
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if( !emailReg.test( $email ) ) {
    return false;
  } else {
    return true;
  }
}
$(document).ready(function(){
$("#emailregistreation").blur(function()
	{
		
		var emailaddress;
		emailaddress = $(this).val();
		
		if(emailaddress != '' && validateEmail(emailaddress)){
		$("#msgbox_email").removeClass().addClass('messagebox').text('Checking...').fadeIn("slow");
		$.post("<?php echo SITE_URL;?>useravailability.php?st=2&",{ email_r:$(this).val() } ,function(data)
        {
		  if(data=='no') {
			 // alert(emailaddress);
		  	$("#msgbox_email").fadeTo(200,0.1,function() { 
			  $(this).html('This Email Already exists <input name="emailchecker" id="emailchecker" type="hidden" value="no">').addClass('messageboxerror').fadeTo(900,1);
			});		
          } else {
		  	$("#msgbox_email").fadeTo(200,0.1,function() { 
			  $(this).html('Email available to register <input name="emailchecker" id="emailchecker" type="hidden" value="yes">').addClass('messageboxok').fadeTo(900,1);	
			});
		  }
        });
	}
	});

var val_holder_reg;
$("#registerbtn").click(function() { // triggred click 
		/************** form validation **************/
		val_holder_reg 		= 0;
		var firstname 		= jQuery.trim($("form input[name='first_name']").val()); // first name field
		var lastname 		= jQuery.trim($("form input[name='lastname']").val()); // last name field
		var customer_email	= jQuery.trim($("form input[name='customer_email']").val()); // Mobile Number field
		var user_password	= jQuery.trim($("form input[name='user_password']").val()); // Email Address field
		var confirmpassword	= jQuery.trim($("form input[name='confirmpassword']").val()); // Password field
		var emailcheckValue	= jQuery.trim($("form input[name='emailvalue_check'").val());
		var email_regex 	= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // reg ex email check	
		//alert(emailcheckValue);
		if(firstname == "") {
			$("#DivFirstName").html("This field is empty.");
		val_holder_reg = 1;
		} else {
			$("#DivFirstName").html("");
		}
		if(lastname == "") {
			$("#DivLastName").html("This field is empty.");
		val_holder_reg = 1;
		}  else {
			$("#DivLastName").html("");
		}
		if(customer_email == "") {
			$("#msgbox_email").html("This field is empty.");
		val_holder_reg = 1;
		}  else {
			$("#msgbox_email").html("");
		}
		if(user_password == "") {
			$("#DivPassword").html("This field is empty.");
		val_holder_reg = 1;
		}  else {
			$("#DivPassword").html("");
		}
		if(confirmpassword == "") {
			$("#DivConfirmPassword").html("This field is empty.");
		val_holder_reg = 1;
		}  else {
			$("#DivConfirmPassword").html("");
		}
		if(user_password != "" && confirmpassword != "") {
		if(user_password != confirmpassword) {
			$("#DivConfirmPassword").html("Confirmed password does not match.");
		val_holder_reg = 1;
		} else {
			$("#DivConfirmPassword").html("");
		}
		}
		if(customer_email != "") {
			if(!email_regex.test(customer_email)){ // if invalid email
				$("#msgbox_email").html("Your email is invalid.");
				val_holder_reg = 1;
			} 
		}
		
		
		
		
		if(val_holder_reg == 1) {
			return false;
		}  
		val_holder_reg = 0;

	}); // click end

});
</script>
       		<!-- BEGIN .main-navigation -->
			<section class="main-navigation clearfix">
				<nav>
					<div class="navigation">
						<a href="<?php echo SITE_URL;?>">Home</a>
						<a href="javascript:void(0);">Account</a>
					</div>
					<div class="title">
						Create An Account
					</div>
				</nav>
			<!-- END .main-navigation -->
			</section>
			
			<!-- BEGIN .main-content-wrapper -->
			<section class="main-content-wrapper clearfix">
				
				<!-- BEGIN .single-full-width -->
				<section class="single-full-width clearfix">
					
					<!-- BEGIN .main-login -->
					<div class="main-login">
                   <form action="#" method="post" name="frmregistration" id="frmregistration">
                         <?php if($vResult['invalid_login']!=''){?>
							<p class="input-error-wrapper"><span><?php echo $vResult['invalid_login'];?></span></p>
                         <?php } ?>
                         <?php if($_GET['error']==1){?>
                         <p class="input-error-wrapper"><span><?php echo _REG_EMAIL_ALREADY_EXISTS;?></span></p>
                         <?php } ?>
							<p class="input-error-wrapper">
								<label>First Name:</label>
                                <input id="firstname" name="first_name" tabindex="1" type="text" />
								<span id="DivFirstName"></span>
							</p>
                            <p class="input-error-wrapper">
								<label>Last Name:</label>
                                <input id="lastname" name="lastname" tabindex="2" type="text" value="" />
								<span id="DivLastName"></span>
							</p>
                            <p class="input-error-wrapper">
								<label>Email:</label>
                                <input id="emailregistreation" tabindex="3" name="customer_email" type="text" value="" />
                                <input name="emailvalue_check" id="emailchecker" type="hidden" value="1">
                                <span id="msgbox_email"></span>
							</p>
                            <p class="input-error-wrapper">
								<label>Password:</label>
                                <input id="user_password" name="user_password" tabindex="4" type="password" value="" />
								<span id="DivPassword"></span>
							</p>
                            <p class="input-error-wrapper">
								<label>Confirm Password:</label>
                                <input id="confirmpassword" name="confirmpassword" tabindex="5" type="password" value="" />
								<span id="DivConfirmPassword"></span>
							</p>
                            <!--<p class="input-error-wrapper">
								<label>Security Code:</label>
                                <?php //$UniqCode = uniqid();?>
                                 <input id="security_code" name="security_code" tabindex="5" type="text" value="" />
                                 <input id="hidcd" name="hidcd" type="text" value="<?php //echo $UniqCode;?>" />
                                <span><img src="<?php //echo SECURITY_URL;?>captcha.php?random=<?php //echo $UniqCode;?>" width="150" height="35" /></span>
                               
								<span id="DivConfirmPassword"></span>
							</p>-->
							<p class="sign-in">
								<label></label>
								<!--<button name="log_in" type="submit">Sign in</button>-->
                                 <button tabindex="6" id="registerbtn" name="registerbtn">Register</button>
								<b>or <a href="<?php echo Route::_('show=login');?>">Return to Sign In</a></b>
							</p>
						</form>
					<!-- END .main-login -->
					</div>
					
					<!-- BEGIN .guest-login -->
					<div class="guest-login">
						<h3>Log in with Facebook</h3>
                        <a href="<?php echo Route::_('show=facebook');?>"><img src="<?php echo SITE_URL;?>images/login_facebook.png" /></a>
						<!--<button>Continue as guest</button>-->
					<!-- END .guest-login -->
					</div>
				
				<!-- END .single-full-width -->
				</section>

			<!-- END .main-content-wrapper -->
			</section>