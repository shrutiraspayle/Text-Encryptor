<?php

include 'fake_hash.php';

session_start();

if ($_POST['enkey']==$_POST['c-enkey']) {

    $enkey=$_POST['enkey'];

    if (strlen($enkey)>=8) {

        if (isset($_FILES['file']['tmp_name'])){
            $fileUrl = $_FILES['file']['tmp_name'];
            $file = fopen($fileUrl, "r") or die("Unable to open file!");
            $data = fread($file,filesize($fileUrl));
            fclose($file);
        }
        else{
            $data = $_POST['data'];
        }   

        $encTxt = encrypt($data,$enkey);

        $_SESSION["success"]=1;
        $_SESSION["fileData"]=$encTxt;

        header("Location: ./result.php");
    }
    else{
        $_SESSION["error"] = 2;
        header("Location: ./index.php");
    }
}
else{
    $_SESSION["error"] = 1;
    header("Location: ./index.php");
}



?>
