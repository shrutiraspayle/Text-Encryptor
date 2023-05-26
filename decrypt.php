<?php

    include 'fake_hash.php';

    session_start();
    
    $enkey=$_POST['enkey'];
    if (isset($_FILES['file']['tmp_name'])){
        $fileUrl = $_FILES['file']['tmp_name'];
        $file = fopen($fileUrl, "r") or die("Unable to open file!");
        $data = fread($file,filesize($fileUrl));
        fclose($file);
    }
    else{
        $data = $_POST['data'];
    }   

    $decTxt = decrypt($data,$enkey);

    if ($decTxt){
        $_SESSION["success"]=2;
        $_SESSION["fileData"]=$decTxt; 
        header("Location: ./result.php");
    }
    else{
        $_SESSION["error"] = 3;
        header("Location: ./index.php");
    }

?>
