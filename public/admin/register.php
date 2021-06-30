<?php

use App\database\Database;
use App\guest\Register;

require_once __DIR__ . '/../../vendor/autoload.php';
$db = Database::getInstance();
$db->getConnection();
$guest_email = "";
$guest_name = "";
$guest_lastname = "";
$guest_mainid = "";
$guest_password = "";
if (count($_POST) > 0) {
    $register = new Register();
    $errors = $register->signup($_POST);
    extract($_POST);
}
?>
<?php require_once __DIR__ . '/admin_ini/header.php'; ?>
    <nav class="navbar">
        <a href="login.php" class="navbar-brand"><strong>Login</strong></a>
    </nav>
<div class="page-wraper">
    <div class="account-form ">
        <div class="account-form-inner" style="margin-top:5rem;">
            <div class="account-container ">
                <div class="heading-bx left">
                    <h3 class="title-head">Register New Account</h3>
                </div>
              
                <!-- display error -->
                <?php if (isset($errors) && is_array($errors) && count($errors) > 0) : ?>
                    <div class="alert alert-danger" role="alert">
                      
                        <?php foreach ($errors as $error) : ?>
                            <small>
                                <?php echo $error; ?><br>
                            </small>
                        <?php endforeach; ?>
                       
                    </div>
                <?php endif; ?>
                <form class="contact-bx" id="register__form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="row placeani">
                        <!-- email -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="guest_email" id="guest_email" value="<?php echo isset($_POST["guest_email"]) ? $_POST["guest_email"] : ''; ?>" class="form-control" placeholder="Enter Your Email" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- name -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="guest_name" id="guest_name" type="text" value="<?php echo isset($_POST["guest_name"]) ? $_POST["guest_name"] : ''; ?>" class="form-control" placeholder="Enter Your Name" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- lastname -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="guest_lastname" id="guest_lastname" value="<?php echo isset($_POST["guest_lastname"]) ? $_POST["guest_lastname"] : ''; ?>" class="form-control" placeholder="Enter Your Last Name" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- guest id -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="guest_mainid" id="guest_mainid"  class="form-control" placeholder="Your Main ID" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <!-- Password-->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" name="guest_password" id="guest_password"  class="form-control" placeholder="Enter Your Password" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 m-b30">
                            <button type="submit" name="registerBtn" id="registerBtn" class="btn button-md">Registrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function uniqueid(len) {
        var randomNumber;
        var n = '';
        for (var count = 0; count < len; count++) {
            randomNumber = Math.floor(Math.random() * 10);
            n += randomNumber.toString();
        }
        document.getElementById("guest_mainid").value = n;
        return n;

    }
    uniqueid(9);
</script>
<!-- External JavaScripts -->
<?php require_once __DIR__ . '/admin_ini/footer.php'; ?>