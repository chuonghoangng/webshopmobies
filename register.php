<?php include_once("header.php") ?>
<?php  
    if(isset($_SESSION['user'])!="")
    {
        header("Location : index.php");
    }
    require_once("/xampp/htdocs/Shopmobies/entities/user.class.php");

    if(isset($_POST['btn-signup'])){
        $u_name=$_POST['txtname'];
        $u_email=$_POST['txtemail'];
        $u_pass=$_POST['txtpass'];
        $u_address=$_POST['txtaddress'];
        $u_number=$_POST['txtnumber'];
        $account = new User($u_name,$u_email,$u_pass,$u_address,$u_number,2);
        

        $result = $account->save();
        if(!$result){
            ?>
            <script>alert('Có lỗi xảy ra, vui lòng kiểm tra dữ liệu!');</script>

            <?php
        }
        else{

            $_SESSION['user']=$u_name;
            header("Location: index.php");

        }
    }
?>
<!-- form dang ki tai khoang cua shop web-->

<form method="post" style="width:30%">
  <div class="form-group row">
    <label for="txtname" class="col-sm-2 form-control-label">UserName</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txtname" placeholder="User name">
    </div>
  </div>
  <div class="form-group row">
    <label for="txtemail" class="col-sm-2 form-control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="txtemail" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="txtpass" class="col-sm-2 form-control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="txtpass" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <label for="txtaddress" class="col-sm-2 form-control-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txtaddress" placeholder="Address">
    </div>
  </div>
  <div class="form-group row">
    <label for="txtnumber" class="col-sm-2 form-control-label">Number</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txtnumber" placeholder="Number">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="btn-signup" value="Sign Up" />
    </div>
  </div>
</form>

<?php include_once("footer.php"); ?>
