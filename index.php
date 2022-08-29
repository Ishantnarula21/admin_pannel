<?php
    $connect=mysqli_connect("localhost","root","","adminpannel") or die("Connection failed");
    if(!empty($_REQUEST['save']))
    {
        $username=$_REQUEST['un'];
        $password=$_REQUEST['pw'];
        $query="select * from login where username='$username' and password='$password' ";
        $result=mysqli_query($connect,$query);
        $count=mysqli_num_rows($result);
        if($count > 0)
        {
            header("Location:pageadd.php");
        }
        else{
            echo "Login not successful";
        }
    }
?>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/mybootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/color.css">
	<style>
	</style>
</head>
<body>

	<header class="col-md-12">
		<div class="container">
			<div class="col-md-3" >
				<image src="images/logo.png" style="margin:15px 0px 5px 0px; float:left">
			</div>
			<div class="col-md-9"></div>
		</div>
	</header>
	<div class="col-md-12" style="background:#1C5978"> 
		<div class="container">
		<div class="col-md-3">
		<p style="color:white; font-weight:bold; font-family:arial; font-size:12px; margin:7px 0px; float:left; letter-spacing:1; word-spacing:3"><?php echo date('d-m-y');?></p>
		</div>
		</div>
	</div>
	<div class="col-md-12" style="height:70%; min-height:200px">
		<div class="container">
            <form method="post">
                <table class="table" style="width:150px; margin:40px auto">
                    <tr>
                        <td></td>
                        <td style="color:#1C5978; font-weight:bold; text-align:center">Login</td>
                    </tr>
                    <tr>
                        <td class="login-table-text">Username</td>
                        <td><input type="text" class="login-table-input" name="un" required></td>
                    </tr>
                    <tr style="border:none">
                        <td class="login-table-text">Password</td>
                        <td><input type="password" class="login-table-input" name="pw" style="font-size:30px;height:25px" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Login" name="save" style="margin-left:60px; padding:2px 15px"/></td>
                    </tr>
                </table>
            </form>
		</div>
	</div>
	<footer style="clear:both">
		<div class="footer-line col-md-12"></div>
	</footer>
</body>
</html>
