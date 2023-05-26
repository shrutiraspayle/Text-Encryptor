<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="assets/custom/css/style.css">
    <title>Text Encrypter / Decrypter</title>
</head>

<body>
    <div class="container">
        <div class="outer-wrapper">
            <div class="row">
                <div class="inner-wrapper">
                    <div class="result">
                        <form id="form" action="download.php" method="post">
                            <div class="row">
                                <label><i class="fa fa-file-alt"></i>Result</label>
                                <textarea name="data" cols="30" rows="4"
                                    placeholder="No Result Found!" readonly><?php echo $_SESSION['fileData']; ?></textarea>
                                <button type="submit" class="ldbtn btn-dark btn-download" value="download"><i class="fa fa-download"></i>Download</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="assets/sweetalert/sweetalert.js"></script>
</html>

<?php
    if($_SESSION['success']==1){
        echo '<script type="text/javascript">Swal.fire("Success!","Data Encrypted Successfully","success");</script>';
    }
    else if($_SESSION['success']==2){
        echo '<script type="text/javascript">Swal.fire("Success!","Data Decrypted Successfully","success");</script>';
    }
?>
