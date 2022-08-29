<?php
$connect = mysqli_connect("localhost", "root", "", "adminpannel") or die("Connection failed");
if (!empty($_REQUEST['save'])) {
	$catid = $_REQUEST['catname'];
	$pname = $_REQUEST['pname'];
	$pdisc = $_REQUEST['pdescription'];
	$pprice = $_REQUEST['pprice'];
	//image upload
	$pimagename = $_FILES['pimage']['name'];
	$ptemp = $_FILES['pimage']['tmp_name'];
	$currtime = round(microtime(true) * 1000);
	$extarr = explode(".", $pimagename);
	$extt = $extarr[1];
	$fullfilename = $currtime . "." . $extt;
	//image name genrated
	$query = "insert into product (category_id,pname,pdescription,pprice,pimage) values('$catid','$pname','$pdisc',$pprice,'$fullfilename')";

	if (mysqli_query($connect, $query)) {
		move_uploaded_file($ptemp, "upload/" . $fullfilename);
		header('Location:productadd.php');
	} else {
		echo "Record not inserted";
	}
}
if (!empty($_REQUEST['update'])) {
	$idd = $_REQUEST['eid'];
	$catid = $_REQUEST['catname'];
	$pname = $_REQUEST['pname'];
	$pdisc = $_REQUEST['pdescription'];
	$pprice = $_REQUEST['pprice'];
	//image upload
	$pimagename = $_FILES['pimage']['name'];
	$ptemp = $_FILES['pimage']['tmp_name'];
	$currtime = round(microtime(true) * 1000);
	$extarr = explode(".", $pimagename);
	$extt = $extarr[1];
	$fullfilename = $currtime . "." . $extt;
	//image name genrated
	$query = "update product set category_id='$catid',pname='$pname',pdescription='$pdisc',pprice=$pprice,pimage='$fullfilename' where id=$idd ";
	if (mysqli_query($connect, $query)) {
		move_uploaded_file($ptemp, "upload/" . $fullfilename);
		header('Location:productsummary.php');
	} else {
		echo "Record not inserted";
	}
}
if (!empty($_REQUEST['eid'])) {
	$id = $_REQUEST['eid'];
	$query = "select * from product where id=$id";
	$result = mysqli_query($connect, $query);
	$r = mysqli_fetch_assoc($result);
}
?>
<html>

<head>
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/color.css">
	<script src="js/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: '.tinymce'
		});
	</script>
</head>

<body>
	<header class="col-md-12">
		<div class="container">
			<div class="col-md-3">
				<image src="images/logo.png" style="margin:15px 0px 5px 0px; float:left">
			</div>
			<div class="col-md-2 col-md-offset-6">
				<a href="login.html" class="logoutbtn">Logout</a>
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
					<h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">product Manager</h3>
					<hr style="margin:0px; width:600px; margin-bottom:10px" />
					<!--font: font-style font-variant font-weight font-size/line-height font-family -->
					<div style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">Add product</div>
					<div>
						<form method="post" enctype="multipart/form-data">
							<table class="addpage-table">
								<tr>
									<td style="width:250px; text-align:right">Select category<span style="color:red">*</span></td>
									<td>
										<select name="catname">
											<?php
											$query = "select * from category";
											$result = mysqli_query($connect, $query);
											$catr = mysqli_fetch_assoc($result);
											if (!empty($catr['categoryname'])) {
											?>
												<option><?php echo $catr['categoryname'] ?></option>
											<?php
											} else {
											?>
												<option>Select category</option>
											<?php
											}
											while ($cat = mysqli_fetch_assoc($result)) {
											?>
												<option value="<?php echo $cat['id'] ?>"><?php echo $cat['categoryname'] ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:250px; text-align:right">Product Name<span style="color:red">*</span></td>
									<td>
										<input type="text" name="pname" style="width:200px" value="<?php if (!empty($r['pname'])) echo $r['pname'] ?>">
									</td>
								</tr>
								<tr>
									<td style="width:250px; text-align:right">Product description</td>
									<td>
										<textarea class="tinymce" name="pdescription" style="height:200px"><?php if (!empty($r['pdescription'])) echo $r['pdescription'] ?></textarea>
									</td>
								</tr>
								<tr>
									<td style="width:250px; text-align:right">Product Price<span style="color:red">*</span></td>
									<td>
										<input type="text" name="pprice" style="width:200px" value="<?php if (!empty($r['pprice'])) echo $r['pprice'] ?>">
									</td>
								</tr>
								<tr>
									<td style="width:250px; text-align:right">Product Image<span style="color:red">*</span></td>
									<td>
										<input type="file" name="pimage" style="width:200px">
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div style="padding-left:25%">
											<input type="submit" class="savebtn" name="save" value="Save" />
											<input type="submit" class="savebtn" name="update" value="Update" />
											<a href="productadd.php" class="cnclbtn">Cancel</a>
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