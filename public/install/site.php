<?php require_once('./lib/config.php'); ?><?php
validateDb();
if(isset($_POST['submit'])){

    unset($_POST['submit']);
    foreach($_POST as $key=>$value)
    {
        $sql = "UPDATE settings SET settings.value='$value' WHERE settings.key='$key'";
        $conn->exec($sql);
    }
    //set homepage title
    $value=$_POST['general_site_name'];
    $sql = "UPDATE settings SET settings.value='$value' WHERE settings.key='general_homepage_title'";
    $conn->exec($sql);
    header('Location: complete.php');

}

/*$stmt = $conn->prepare("SELECT * FROM country");
$stmt->execute();

// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$countries = $stmt->fetchAll();*/

?>
<?php require('./lib/header.php'); ?>
    <h2>Site Settings</h2>

<?php if(isset($message)):?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $message; ?>
    </div>
<?php endif; ?>

    <form action="site.php" method="post" class="form">

        <div class="form-group">
            <label for="general_site_name">Site Name</label>
            <input required="required" class="form-control" type="text" name="general_site_name"  value="<?php echo (isset($_POST['general_site_name'])? $_POST['general_site_name']:@$_SESSION['site']['general_site_name'])?>"/>
        </div>

        <div class="form-group">
            <label for="general_admin_email">Website Email</label>
            <input placeholder="e.g. info@yourcompany.com" required="required" class="form-control" type="text" name="general_admin_email"  value="<?php echo (isset($_POST['general_admin_email'])? $_POST['general_admin_email']:@$_SESSION['site']['general_admin_email'])?>"/>
        </div>




        
        
        
  
        <div class="form-footer">
            <button class="btn btn-primary pull-right btn-lg" type="submit" name="submit">Submit</button>
        </div>
    </form>

<?php require('./lib/footer.php'); ?>