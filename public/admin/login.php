<?php require_once __DIR__ . '/admin_ini/header.php'; ?>
<?php

use App\login\Login;

$login = new Login();
if (isset($_POST['loginBtn'])) {
    if (!empty($_POST['userid'])) {
        $loginResult =  $login->loginUser();
    }
    if (!empty($_POST['userid'])) {
        $loginResult =  $login->loginUser();
    }
    if (!empty($_POST['userid'])) {
        $loginResult =  $login->loginUser();
    }
}

?>
<div class="page-wraper">
    <nav class="navbar">
        <a href="register.php" class="navbar-brand"><strong>Register</strong></a>
    </nav>
    <div class="account-form">
        <div class="account-form-inner">
            <div class="account-container">
                <div class="heading-bx left">
                    <h2 class="title-head">Login to your <span>Account</span></h2>
                   
                    <?php if (!empty($loginResult)) { ?>
                        <div class="error-msg"><?php echo $loginResult; ?></div>
                    <?php } ?>
                </div>
                <form class="contact-bx" id="login__form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="row placeani">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <label>ID: (1139329481)</label>
                                    <input name="userid" id="userid" type="text" class="form-control" autocapitalize="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <label>Your Password</label>
                                    <input name="password" id="password" type="password" class="form-control" autocapitalize="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group form-forget">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                                <a href="forget-password.html" class="ml-auto">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="col-lg-12 m-b30">
                            <button type="submit" name="loginBtn" id="loginBtn" value="Submit" class="btn button-md">Login</button>
                        </div>
                        <div class="col-lg-12">
                            <h6>Login with Social media</h6>
                            <div class="d-flex">
                                <a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                <a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- External JavaScripts -->
<?php require_once __DIR__ . '/admin_ini/footer.php'; ?>