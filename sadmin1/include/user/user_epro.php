<?php
	include 'include/koneksi.php';
	$id = $_REQUEST['id'];
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
	if ($user!=="" and $pass!=="") {
		$sql = "UPDATE user SET username = '$user', password='$pass' WHERE id_user ='$id' ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Update Success !!');
				window.location='?page=user/user.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Update Failed !!');
				window.location='?page=user/user.php'
			</script>
		";
	}

	mysqli_close($db);
?>