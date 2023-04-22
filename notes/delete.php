<?php
include '../connect.php';


$noteid		= filter("id");
$imagename	= filter('imagename');

$stmt = $con->prepare('DELETE FROM `notes` WHERE `note_id` = ? '
);
$stmt->execute(array($noteid)) ;

$count = $stmt->rowCount();

if ($count > 0 )
{
	deletfile('../Upload',$imagename);
	echo json_encode(array("status" => "success"));
}
else {
	echo json_encode(array("status" => "fail"));
}

