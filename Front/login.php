<?php
require_once "header.php";
?>

<div>
<div class="navbarLogin" id="bw-login-button">
                            <!-- Display for non-logged in users -->
                            <a href="#" class="loginButton loginLink bntsLoginLinkNew" role="button">
                                <span class="loginUserIcon"></span>
                                <p class="loginLinkLabel">ACCOUNT</p>
                            <div class="bntsNewContent" style="visibility: hidden;"><img src="/content/dam/best-western/rewards/earn/best-western-rewards-450.jpg"><a role="button" type="button" id="btn-view" class="btn cmBtn cmBtnPrimary btn-view" data-toggle="modal" data-target="#login-modal">LOG-IN</a><div class="lastElm"><p class="bntsContent"> Not a member? </p><a id="log-in-link" href="/en_US/rewards/join.html">JOIN</a></div></div></a>
                            <!-- Display for logged in users-->
                            <a href="#" class="dropdown-toggle accountNavLink loginButton" role="button" data-toggle="collapse" data-target="">
                                <div class="loggedInBtnTextContainer">
                                    <div id="nav-logged-in-salutation" class="loggedInSalutation">
                                        <span id="nav-logged-in-greeting">Hello</span><span id="nav-logged-in-user-name"></span>
                                    </div>
                                    <div class="loggedInBtnExpanderLabel" id="nav-logged-in-expander-label">
                                        <span id="nav-logged-in-expander-points-amount"></span> <span id="nav-logged-in-expander-points-text">Points</span>
                                        <span class="navArrow down">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.64 8.45" class="svgNavArrow down">
                                                <path d="M310.73,392.09l-0.55.48c-4.23,3.71-4.23,3.71-8.37.08l-0.43-.38-0.77,1.17,5.35,7.09,5.3-7Z" transform="translate(-300.61 -392.09)"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
</div>
<div class="ModalTest">
<div class="guestLogin modal fade in" id="login-modal" role="dialog" aria-labelledby="dialog-description" aria-modal="true" style="display: block; padding-right: 17px;">
    <p id="dialog-description" class="sr-only">Account Log-In</p>
    <form id="guest-login-form" class="bwForm" autocomplete="off" novalidate="novalidate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loginHeader modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Account Log-In</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="hidden" id="credentials-failed-error-msg">
                                <div class="alert errorInfo">
                                    <span class="defaultMessage">Your username or password is incorrect. Please re-type the username and password</span>
                                </div>
                            </div>
                            <div class="formInput" id="login-credentials-container">
                                <div class="form-group">
                                    <label for="guest-user-id-1">User Name</label>
                                    <input type="text" class="form-control valid" placeholder="" data-msg="Email or Member #" name="guest-user-id-1" id="guest-user-id-1" autocomplete="off" required="" aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="guest-password-1">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" data-msg="Password" id="guest-password-1" autocomplete="off" required="" aria-required="true">
                                </div>
                                <div class="loginLinksContainer">
                                    <div>
                                        <a id="create-account-link" href="/en_US/rewards/join.html">Create Account</a>
                                    </div>
                                    
                                    <div>
                                        <a id="password-help-link" href="#" data-url="/content/best-western/en_US/popup/passwordhelp.popups.html">Password Help</a>
                                    </div>
                                </div>
                            </div>
                            <!--/* captcha errors /*-->
                            
                            <div class="hidden" id="recaptcha-error-msg">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="alert errorInfo">
                                            <span class="defaultMessage">The captcha is required and can't be empty.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden" id="recaptcha-validation-error-msg">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="alert errorInfo">
                                            <span class="defaultMessage">Please re-enter captcha</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--/* GeeTest errors /*-->
                            <div class="hidden" id="gt-error-msg">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="alert errorInfo">
                                            <span class="defaultMessage">The gee test is required and can't be empty</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden" id="gt-validation-error-msg">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="alert errorInfo">
                                            <span class="defaultMessage">Please re-enter information </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div id="gt-policy-checkbox-container" class="svgCheckbox light hidden">
                                <input type="checkbox" id="policy-agree-login-china" name="policy-agree-login-china" tabindex="0">
                                <label for="policy-agree-login-china" id="policy-agree-label">
                                    <span></span>
                                    <span>I agree that information on my browser and device will be transferred to a third party</span>
                                </label>
                            </div>
                            <div id="recaptcha-container" class="recaptchaContainer">

<div class="row">
	<div class="col-xs-12 recaptcha-container">
	   <div class="form-group">
	       <div id="recaptcha" data-sitekey="6LcwliQUAAAAACi1Kt2NFNzO7i6JHZIpEGNFfqqV" data-type="invisible"></div>
	   </div>
	</div>
</div></div>
                            <div id="geeTest-container" class="geeTestContainer" data-page="/content/best-western/en_US"><div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <div id="geetest-captcha"></div>
        </div>
    </div>
</div></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <button id="login-button-modal-recaptcha" type="button" class="btn btn-primary btnLogin" onclick="BestWestern.GuestLogin.loginBtnHandler(event,$('#guest-user-id-1').val() ,$('#guest-password-1').val(), $('#guest-login-form'))">Log In</button>
                        </div>
                        
                        <div class="row">
                            <button id="gt-login-modal" type="button" class="hidden btn btn-primary btnLogin" disabled="">Log In</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<?php
require_once "footer.php";
?>