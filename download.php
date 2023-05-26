<?php
    session_start();

    $tmpName = tempnam(sys_get_temp_dir(), 'data');
    $file = fopen($tmpName, 'w');
    fwrite($file, $_SESSION['fileData']);
    fclose($file);

    header('Content-Description: File Transfer');
    header('Content-Type: text/plain');

    if($_SESSION['success']==1){
        header('Content-Disposition: attachment; filename=encrypted_file.txt');
    }
    else{
        header('Content-Disposition: attachment; filename=decrypted_file.txt');
    }

    header('Content-Length: ' . filesize($tmpName));
    readfile($tmpName);
    unlink($tmpName);
?>