<?php
$connect = mysqli_connect("localhost", "root", "", "adminpannel") or die("Connection failed");
if (!empty($_REQUEST['save'])) {
	$eid = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$content = $_REQUEST['content'];
	$status = 0;
	if (isset($_REQUEST['status'])) {
		$status = $_REQUEST['status'];
		if ($status == "on") {
			$status = 1;
		}
	}
	if (!empty($_REQUEST['id'])) {
		$query = "update page set name='$name',content='$content',status=$status where id=$eid ";
	} else {
		$query = "insert into page (name,content,status) values('$name','$content',$status )";
	}
	if (mysqli_query($connect, $query)) {
		echo "Record inserted";
	} else {
		echo "Record not inserted";
	}
}
if (!empty($_REQUEST['eid'])) {
	$id = $_REQUEST['eid'];
	$query = "select * from page where id=$id";
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
					<h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">Page Manager</h3>
					<hr style="margin:0px; width:600px; margin-bottom:10px" />
					<!--font: font-style font-variant font-weight font-size/line-height font-family -->
					<div style=" background:#F3F1F1;border:1px solid silver; font: bold 13px/13px arial ;padding:5px 0px 5px 15px ">Add Page</div>
					<div>
						<form method="post">
							<table class="addpage-table">
								<tr>
									<td style="width:250px; text-align:right">Name<span style="color:red">*</span></td>
									<td>
										<input type="hidden" name="id" style="width:200px" value="<?php if (!empty($r['id'])) echo $r['id'] ?>">
										<input type="text" name="name" style="width:200px" value="<?php if (!empty($r['name'])) echo $r['name'] ?>">
									</td>
								</tr>
								<tr>
									<td style="width:250px; text-align:right">Content</td>
									<td>
										<textarea class="tinymce" name="content" style="height:200px"><?php if (!empty($r['content'])) echo $r['content'] ?></textarea>
									</td>
								</tr>
								<tr>
									<td style="width:250px; text-align:right">Status</td>
									<td>
										<?php if (!empty($r['status']) && $r['status'] == 1) { ?>
											<input type="checkbox" name="status" style="margin-right:20px" checked />
										<?php } else { ?>
											<input type="checkbox" name="status" style="margin-right:20px" />
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div style="padding-left:25%"><input type="submit" class="savebtn" name="save" value="Save" />
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