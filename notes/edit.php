<?php
include '../connect.php';

$noteid		= filter("note_id");
$title		= filter("note_title");
$content	= filter("note_content");


$stmt = $con->prepare('UPDATE `notes` SET `note_title` = ?, `note_content` = ? WHERE `note_id`=?'
);
$stmt->execute(array($title,$content,$noteid)) ; 

$count = $stmt->rowCount();

if ($count > 0 )
{
	echo json_encode(array("status" => "success"));
}
else {
	echo json_encode(array("status" => "fail"));
}

