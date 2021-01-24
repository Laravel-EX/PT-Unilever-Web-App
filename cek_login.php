<?php
	session_start();
	include 'admin/include/koneksi.php';

	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];

if($user!=="" && $pass!=="") {
	$sql=mysqli_query($db,"SELECT * FROM user WHERE username='$user' AND password='$pass' ");
	$cek=mysqli_num_rows($sql);

	if ($cek > 0) {
		$ambil = mysqli_fetch_array($sql);
		$status = $ambil['status_user'];
		$user = $ambil['username'];
		$id_user=$ambil['id_user'];
      	
		$_SESSION['username']=$user;
		$_SESSION['id_user']=$id_user;
		$_SESSION['status_user']=$status;

		if ($status=="admin") {
			echo "
				<script>
					window.location.href= 'admin/'
				</script>
			";
		} elseif($status =="sadmin") {
			echo "
				<script>
					window.location.href= 'sadmin/'
				</script>
			";
			} elseif($status =="tankfarm") {
			echo "
				<script>
					window.location.href= 'tankfarm/'
				</script>
			";
		} elseif($status =="quality") {
			echo "
				<script>
					window.location.href= 'quality/'
				</script>
			";
		} elseif($status =="warehouse") {
			echo "
				<script>
					window.location.href= 'warehouse/'
				</script>
			";
		}

	} else {
		echo "
			<script>
				alert('Username Dan Password Salah');
				window.location.href='index.php'
			</script>
		";
	}

} else {
	echo "
		<script>
			alert('Login Gagal');
			window.location.href='index.php'
		</script>
	";
}
?>
