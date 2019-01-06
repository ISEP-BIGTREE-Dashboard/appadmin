<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record == 1)) {
			$n = mysqli_fetch_array($record);
			$firstname = $n['firstname'];
			$lastname = $n['lastname'];
			$email = $n['email'];
			$password = $n['password'];
			$address = $n['address'];
			$usertype = $n['usertype'];
		}

	}
?>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
<!-- <?php $row = mysqli_fetch_array($results); ?> -->


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
	.header {
		background: #444;
	}
	button[name=register_btn] {
		background: #444;
	}
	</style>
	<!-- 添加控制show-users的样式代码 -->
	<link rel="stylesheet" type="text/css" href="../useradmin/style.css">
	<link rel="stylesheet" type="text/css" href="../useradmin/nav.css">

	<link rel="stylesheet" type="text/css" href="../useradmin/searchbox/style.css">
	<script type="text/javascript" src="../useradmin/searchbox/function.js"></script>
</head>
<body>
	<div class="header">
		<h2>User Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
        <div class="profile_info" style="margin: -20px;">
            <ul class="top-nav" style="width: 100%;float: left;display: block;">
                <?php $row = mysqli_fetch_array($results) ?>
                <li><a href="myprofile.php">Add User</a></li>
                <li><a href="edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit My Profile</a></li>
                <li><a href="show-user.php">User tables</a></li>
                <li><a href="admin-table.php">Admin tables</a></li>
                <li><a href="change_password.php?edit=<?php echo $row['id']; ?>" >Change Password</a></li>
                <img src="../images/icon.png"  >
                <div>
                    <?php  if (isset($_SESSION['user'])) : ?>
                        <strong><?php echo $_SESSION['user']['username']; ?></strong>

                        <small>
                            <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                            <br>
                            <a href="../admin/home.php?logout='1'" style="color: red;">logout</a>
                            &nbsp; <a href="../admin/create_user.php"> + add user</a>
                        </small>

                    <?php endif ?>
                </div>
                <?php ?>
            </ul>

        </div>
    </div>
    <div class="footer" style="width: 80%;
	margin: -1px auto -1px;
	color: goldenrod;
	background: #444 ;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 0px 0px 10px 10px;
	padding: 20px;">
        <h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved!</h5>
    </div>


</body>
</html>