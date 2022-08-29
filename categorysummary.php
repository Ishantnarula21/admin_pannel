<?php
	$connect=mysqli_connect("localhost","root","","adminpannel") or die("Connection failed");
	if(!empty($_REQUEST['did']))
	{
		$id=$_REQUEST['did'];
		$query="delete from category where id=$id";
		if(mysqli_query($connect,$query))
		{
			header('Location:categorysummary.php');
		}
		else{
			echo "Record not deleted";
		}
	}
?>
<html>
<head>
	<title>Admin panel</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/color.css">
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
		<p style="color:white; font-weight:bold; font-family:arial; font-size:12px; margin:7px 0px; float:left; letter-spacing:1; word-spacing:3">Friday, 8th June 2012</p>
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
				<h3 style="font-size:16px; font-weight:bold; color:#1C5978; text-align:left;margin-left:0px;">category Manager</h3>
				<hr style="margin:0px; width:600px; margin-bottom:10px" />
				<p class="text-left">This section displays the list of categorys.</p>
				<p class="bordered text-center" style="padding:3px"><a href="#" style="text-decoration:underline; color:blue; font-size:12px">Click here</a>
						to create
						<a href="#" style="text-decoration:underline; color:blue; font-size:12px">New category</a></p>
		<form>				
			<table class="table1">
				<tr class="table-1-head">
					<td colspan="2" style="padding:8px 15px 8px 15px; background:#EBEBEB;border-bottom:1px solid">Search</td>
				</tr>
				<tr class="table-1-row">
					<td style="padding:8px 15px 8px 15px">Search By category Name</td>
					<td style="padding:8px 15px 8px 15px">
						<input type="text" name="search" placeholder="Search here..." /> 	
						<input type="submit" value="Search" name="searchbtn"/>
					</td>
				</tr>
			</table>
		</form>
		<p style="padding-top:20px">category 1 of 2, showing 10 records out  of 13 total, starting on record 1, ending on 10</p>
		<table class="table2">
			<thead>
				<tr>
					<th>Id</th>
					<th>category Name</th>
					<th>Edit</th>
					<th style="width:100px">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(!empty($_REQUEST['searchbtn']))
					{
						$sname=$_REQUEST['search'];
						$query="select * from category where categoryname like '%$sname%'";
					}
					else{
						$query="select * from category";
					}
					$result=mysqli_query($connect,$query);
					while($row=mysqli_fetch_assoc($result))
					{
						?>
							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['categoryname'] ?></td>
								<td><a href="categoryadd.php?eid=<?php echo $row['id'] ?>"><img src="images/edit.jpg" alt="no image found" class="edit"/></a></td>
								<td><a href="categorysummary.php?did=<?php echo $row['id'] ?>">Delete</a></td>
							</tr>
						<?php
					}
				?>
			</tbody>
		</table>
		</section>
				
		</div>
	</aside>
	<div class="footer-line">
		<footer></footer>
	</div>
	
</body>
</html>
