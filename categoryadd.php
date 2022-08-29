<?php
	$connect=mysqli_connect("localhost","root","","adminpannel") or die("Connection failed");
	if(!empty($_REQUEST['save']))
	{
		$eid=$_REQUEST['id'];
		$categoryname=$_REQUEST['catname'];
		if(!empty($_REQUEST['id']))
		{
			$query="update category set categoryname='$categoryname' where id=$eid ";
		}
		else{
			$query="insert into category (categoryname) values('$categoryname')";
		}
		if(mysqli_query($connect,$query))
		{
			echo "Record inserted";
		}
		else{
			echo "Record not inserted";
		}
	}
	if(!empty($_REQUEST['eid']))
	{
		$id=$_REQUEST['eid'];
		$query="select * from category where id=$id";
		$result=mysqli_query($connect,$query);
		$r=mysqli_fetch_assoc($result);
	}
?>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/color.css">
	<script src="js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'.tinymce' });</script>
</head>
<body>
	<header class="col-md-12">
		<div class="container">
			<div class="col-md-3" >
				<image src="images/logo.png" style="margin:15px 0px 5px 0px; float:left">
			</div>
			<div class="col-md-2 col-md-offset-6">
				<a  href="login.html" class="logoutbtn">Logout</a>
			</div>
	</header>
		</div>
	<div class="col-md-12" style="background:#1C5978"> 
		<div class="container">
		<div class="col-md-3">
		<p style="color:white; font-weight:bold; font-family:arial; font-size:12px; margin:7px 0px; float:left; letter-spacing:1; word-spacing:3"><?php echo date('d-m-y') ?></p>
		</div>
		</div>
	</div>
	<aside>
		<div class="container ">
			<div class="col-md-2" style="padding:0px">
			<div class="col-md-12" style="padding:0px">
			 <aside>
			 	<?php include('common/navigation.php'); ?>
			</aside>	
				</div>
		</div>
		<div class="col-md-10 main-section">
			<section>
				<h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">Category Manager</h3>
				<hr style="margin:0px; width:600px; margin-bottom:10px" />
				<!--font: font-style font-variant font-weight font-size/line-height font-family -->
				<div style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">Add Category</div>
				<div>
					<form method="post">
						<table class="addpage-table">
							<tr>
								<td style="width:250px; text-align:right">Category Name<span style="color:red">*</span></td>
								<td>
									<input type="hidden" name="id" style="width:200px" value="<?php if(!empty($r['id'])) echo $r['id'] ?>">
									<input type="text" name="catname" style="width:200px" value="<?php if(!empty($r['categoryname'])) echo $r['categoryname'] ?>">
								</td>
							</tr>
							<tr>
								<td colspan="2" >
								<div style="padding-left:25%"><input type="submit" class="savebtn" name="save" value="Save"/>
									&nbsp;&nbsp; 
								<a href="#" class="cnclbtn">Cancel</a>
								</td>
							</tr>
						</table>
					</form>
				</div>
		</section>
				
		</div>
	</aside>
	<div class="footer-line" style="margin-top:15px">
		<footer></footer>
	</div>
	
</body>
</html>
