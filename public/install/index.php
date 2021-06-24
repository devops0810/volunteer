<?php require_once('./lib/config.php');?><?php
//check if .env file exists
$file = 'complete.txt';
if(file_exists($file)){
    exit('Installation already run. Delete complete.txt file in public/install directory to start again');
}
if(isset($_POST['submit'])){
    //try to connect with credentials
    foreach($_POST as $key=>$value){
        $_POST[$key]=trim($value);
    }

    try {
        $conn = new PDO("mysql:host=".$_POST['host'].";dbname=".$_POST['database'], $_POST['username'], $_POST['password']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $_SESSION['db']=$_POST;

        //create config file
        $file = '../../.env';
        if(file_exists($file)) {
            unlink($file);
        }

            $template= file_get_contents('./config/env_stub');
            $template= str_replace('[DBNAME]',trim($_SESSION['db']['database']),$template);
            $template= str_replace('[DBUSERNAME]',trim($_SESSION['db']['username']),$template);
            $template= str_replace('[DBPASSWORD]',trim($_SESSION['db']['password']),$template);
            $template= str_replace('[DBHOST]',trim($_SESSION['db']['host']),$template);
            touch($file);
            file_put_contents($file,$template);
            //execute sql dump

        // Temporary variable, used to store current query
        $templine = '';
// Read in entire file
/*        $lines = file('./sql/db.sql');
// Loop through each line
        foreach ($lines as $line)
        {
// Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

// Add this line to the current segment
            $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';')
            {
                // Perform the query
                $conn->exec($templine);
                // Reset temp variable to empty
                $templine = '';
            }
        }*/

       // chdir('./sql/');
        $username = trim($_POST['username']);
        $dbname = trim($_POST['database']);
        $password= trim($_POST['password']);
        $host = trim($_POST['host']);

        $mysqlImport = new MySQLImporter($host, $username, $password);
        $mysqlImport->doImport("./sql/db.sql",$dbname);


/*
        $val = shell_exec("mysql -u {$username} -p{$password} {$dbname} < db.sql");
       */
        header('Location: account.php');
    }
    catch(PDOException $e)
    {
        $message='Connection failed! Please check the details and try again: '.$e->getMessage();
    }

}
else{
    $message=  'WARNING: Ensure you are using a blank database as any existing tables will be deleted!';
}
?>
<?php require('./lib/header.php'); ?>
        <h2>Database Setup</h2>

<?php if(isset($message)):?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $message; ?>
    </div>
    <?php endif; ?>

    <form action="index.php" method="post" class="form">

        <div class="form-group">
            <label for="host">Database Host</label>
            <input required="required" class="form-control" type="text" name="host"  value="<?php echo (isset($_POST['host'])? $_POST['host']:'localhost')?>"/>
        </div>
        <div class="form-group">
            <label for="database">Database Name</label>
            <input required="required"  class="form-control" type="text" name="database" value="<?php echo (isset($_POST['database'])? $_POST['database']:@$_SESSION['db']['database'])?>"/>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input required="required"  class="form-control" type="text" name="username" value="<?php echo (isset($_POST['username'])? $_POST['username']:@$_SESSION['db']['username'])?>"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input   class="form-control" type="password" name="password" value="<?php echo (isset($_POST['password'])? $_POST['password']:@$_SESSION['db']['password'])?>"/>
        </div>
        <div class="form-footer">
            <button class="btn btn-primary pull-right btn-lg" type="submit" name="submit">Submit</button>
        </div>
    </form>

<?php require('./lib/footer.php'); ?>