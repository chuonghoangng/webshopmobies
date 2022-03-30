<?php include_once("header.php") ?>
<?php
if (isset($_SESSION['user']) != "") {
    header("Location : index.php");
}
require_once("/xampp/htdocs/Shopmobies/entities/user.class.php");

if (isset($_POST['btn-signup'])) {
    $u_name = $_POST['txtname'];
    $u_pass = $_POST['txtpass'];
    $result = User::checkLogin($u_name, $u_pass);
    
    if (!$result) {
?>
        <script>
            alert('Tài khoản không đúng mời nhập lại!');
        </script>

<?php
    } else {

        $_SESSION['user'] = $u_name;
        header("Location: index.php");
    }
}
?>
<!-- form dang nhap tai khoang cua shop web-->

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    

    <form method="post" style="width:30%">
    <div class="form-group row">
        <label for="txtname" class="col-sm-2 form-control-label">UserName</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="txtname" placeholder="User name">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="txtpass" class="col-sm-2 form-control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="txtpass" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="btn-signup" value="Login" />
        </div>
    </div>
</form>

</body>

</html>



<?php include_once("footer.php"); ?>