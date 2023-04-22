<?php 
 include "connect.php";

 $stmt = $con->prepare("SELECT * FROM noteapp");
 $stmt->execute();
 $noteapp = $stmt->fetchAll(PDO::FETCH_ASSOC);
 //$count = $stmt->rowCount();

// echo "<pre>" ;
//print_t($nametable);
//echo "</pre>" ;
 
 echo json_encode($noteapp);