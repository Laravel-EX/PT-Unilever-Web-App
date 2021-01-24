<?php
	$db = mysqli_connect("localhost","root","","unilever");
	if (mysqli_connect_errno($db)) {
		echo "gagal konek".mysqli_connect_errno();
	}
?>
