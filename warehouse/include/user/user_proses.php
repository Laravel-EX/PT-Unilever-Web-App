<?php
	include 'include/koneksi.php';
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
	if ($user!=="" and $pass!=="") {
		$sql = "INSERT INTO user (username,password) VALUES('$user','$pass') ";
		$query = mysqli_query($db,$sql);
		echo "
			<script>
				alert('Insert Success !!');
				window.location='?page=user/user.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Insert Failed !!');
				window.location='?page=user/user.php'
			</script>
		";
	}

	mysqli_close($db);
?>