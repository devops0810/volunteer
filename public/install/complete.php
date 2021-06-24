<?php require_once('./lib/config.php'); ?><?php
validateDb();
//get base url
$url = "http".(!empty($_SERVER['HTTPS'])?"s":"").
    "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$baseUrl = str_replace('/install/complete.php','',$url);
touch('complete.txt');
?>
<?php require('./lib/header.php'); ?>
    <h2>Setup Complete!</h2>

<p>You can now login to your account with the email you created in the second step and use <strong>password</strong> as your password</p>
 <div class="row">
     <div class="col-md-6">
         <h3>Login to the Site</h3>
         <p>You can login  by using this url: <?php echo $baseUrl ?>/ </p>
         <p>Please use the password <strong>password</strong> to login</p>
         <a target="_blank" class="btn btn-lg btn-primary" href="<?php echo $baseUrl ?>/">Login</a>
     </div>

 </div>

<?php
session_destroy();
?>
<?php require('./lib/footer.php'); ?>