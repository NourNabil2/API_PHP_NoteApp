
<?php
define("mb",1048576);

function filter($requsetname){

return htmlspecialchars(strip_tags($_POST[$requsetname]));

}

function imageUpload($requsetimage)
{
    $imagename = $_FILES[$requsetimage]['name'];
    $imagetemp = $_FILES[$requsetimage]['tmp_name'];
    $imagesize = $_FILES[$requsetimage]['size'];

    $allowExt   = array('jpg','png');
    $strToArray = explode('.',$imagename);
    $ext        = end($strToArray);
    $ext        = strtolower($ext);
    if (!empty($imagename) && ! in_array($ext,$allowExt))
    {
        $msErorr[] = 'ext';
    }
    if ($imagesize > 2*mb )
    {
        $msErorr[] = 'size';
    }
    if (empty($msErorr))
    {
        move_uploaded_file($imagetemp,'../Upload/' .$imagename );
        return $imagename;
    }


    else
    {
        echo '<pre>';
        print_r($msErorr);
        echo '<pre>';
    }
}

function deletfile($dir,$imagename)
{
    if (file_exists($dir . '/'.$imagename))
    {
        unlink($dir . '/'.$imagename);
    }
}
function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "Nour" ||  $_SERVER['PHP_AUTH_PW'] != "Nour123456789"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
}
