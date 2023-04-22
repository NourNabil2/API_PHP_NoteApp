<?php
include '../connect.php';


$username = filter("username");
$email = filter("email");
$password = filter("password");

$stmt = $con->prepare('INSERT INTO `users`(`username`, `email`, `password`)
VALUES (?,?,?)'
);
$stmt->execute(array($username,$email,$password)) ; 

$data = $stmt->fetch(PDO::FETCH_ASSOC);

$count = $stmt->rowCount();

if ($count > 0 )
{
	echo json_encode(array("status" => "success","data" => $data));
}
else {
	echo json_encode(array("status" => "fail"));
}

