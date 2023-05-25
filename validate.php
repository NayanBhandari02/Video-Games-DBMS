<?php

include_once('connection.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
	
	$LoginID = test_input($_POST["LoginID"]);
	$Password = test_input($_POST["Password"]);
	$stmt = $conn->prepare("SELECT * FROM adminlogin");
	$stmt->execute();
	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
		
		if(($user['LoginID'] == $LoginID) &&
			($user['Password'] == $Password)) {
				header("Location: contact.html");
		}
		else { 
			echo "Invalid credentials";
			echo "<script>
			setTimeout(\"location.href = 'http:\\localhost\\videogames dbms\\home.php';\",2000);
			</script>";    		
			
		}
	}
	
}

?>
