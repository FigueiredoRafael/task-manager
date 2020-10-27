<?php

//upload.php

if(isset($_POST['image']))
{
	$data = $_POST['image'];

	$userId = $_POST['userId'];

	$image_array_1 = explode(";", $data);


	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$image_name = 'upload/' . $userId . '.png';

	file_put_contents($image_name, $data);

	echo $image_name;

	require "dbh.inc.php";
	$sql = "SELECT * FROM users WHERE idUsers='$userId'"; 
	$result = mysqli_query($conn, $sql);
 
	if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
					$uid = $row['idUsers'];
					$sql = "SELECT * FROM profileimg WHERE id='$userId'"; 
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) == 0) {
							$sql = "INSERT INTO profileimg (id, name, img_dir) VALUES ('$uid', '$fileNameNew', '$fileDestination')";
							mysqli_query($conn, $sql);

							header("Location: ../profile.php?profileimg-insert=success");
							exit();
					} else {
							$sql = "UPDATE profileimg SET name='$fileNameNew', img_dir='$fileDestination' WHERE id='$userId'";
							if ($conn->query($sql) === TRUE) {
									header("Location: ../profile.php?profileimg-update=success");
									exit();
							} else {
									header("Location: ../profile.php?profileimg-update=error");
									exit();
							}
					}
			}
	}
}



?>
