<?php
include '../connect.php';


$title		= filter("note_title");
$content	= filter("note_content");
$users		= filter("note_users");
$image		= imageUpload('file');


if (empty($image) )
{
    $stmt = $con->prepare('INSERT INTO `notes`(`note_title`, `note_content`, `note_users`)
VALUES (?,?,?)'
);
    $stmt->execute(array($title,$content,$users,)) ;

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $count = $stmt->rowCount();

    if ($count > 0 )
    {
        echo json_encode(array("status" => "success","data" => $data));
    }
    else {
        echo json_encode(array("status" => "fail"));
    }
}
else{
    $stmt = $con->prepare('INSERT INTO `notes`(`note_title`, `note_content`, `note_users`,`note_image`)
VALUES (?,?,?,?)'
);
    $stmt->execute(array($title,$content,$users,$image)) ;

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $count = $stmt->rowCount();

    if ($count > 0 )
    {
        echo json_encode(array("status" => "success","data" => $data));
    }
    else {
        echo json_encode(array("status" => "fail"));
    }
}


