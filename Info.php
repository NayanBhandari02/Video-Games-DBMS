include_once('db.php');

$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$phone = mysqli_real_escape_string($db,$_POST['phone']);

if (mysql_query("INSERT INTO `users` (`name`, `email`, `phone`) VALUES ('".$name."','".$email."','".$phone."')"))
echo"successfully inserted";
else
echo "failed";