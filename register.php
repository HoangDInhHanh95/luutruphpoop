<?php
    include_once("header.php");
?>
<?php
    if(isset($_SESSION['user'])!="")
    {
        header("Location: index.php");
    }

    require_once ("entities/user.class.php");
    if(isset($_POST['btn-signup']))
    {
    $u_name =$_POST['txtname'];
    $u_email = $_POST['txtemail'];
    $u_pass= $_POST['txtpass'];
    $account = new user ( $u_name,$u_email,$u_pass);
    $result =$account->save();
    if(!$result)
    {
        ?>
        <script> alert(' có lỗi xẩy ra vui long kiểm tra dữ liệu!!');</script>
        <?php
    }
    else{
        $_SESSION['user'] = $u_name;
        header("Lacation: index.php");
    }
}

?>
<form action="#" method="post" style="width: 30%;">
    <div class="form-group row">
        <label for="txtname" class="col-sm-2 form-control-label">
            UserName:
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="txtname" placeholder="User name">
        </div>
    </div>

    <div class="form-group row">
        <label for="txtname" class="col-sm-2 form-control-label">
           email:
        </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="txtemail" placeholder="User email">
        </div>
    </div>

    <div class="form-group row">
        <label for="txtname" class="col-sm-2 form-control-label">
           Password:
        </label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="txtpass" placeholder="password...">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10 row">
            <input type="submit" name="btn-signup" value="Sign up"/>
        </div>
    </div>
</form>
<?php include_once ("footer.php");?>
