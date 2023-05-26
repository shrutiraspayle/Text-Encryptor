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
                <div class="col ldbtn btn-light switch-encrypt" onclick="switchEncrypt();"><i class="fa fa-lock"></i>Encrypt</div>
                <div class="col ldbtn btn-dark switch-decrypt" onclick="switchDecrypt();"><i class="fa fa-unlock"></i>Decrypt</div>
            </div>
            <div class="row">
                <div class="inner-wrapper">
                    <div class="row">
                        <div class="col ldbtn btn-dark switch-upload" onclick="switchUpload();"><i class="fa fa-upload"></i>Upload
                            File</div>
                        <div class="col ldbtn btn-light switch-paste" onclick="switchPaste();"><i class="fa fa-paste"></i>Paste Data
                        </div>
                    </div>
                    <div class="upload">
                        <form class="form" action="#" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="drag-area">
                                        <header class="drag-area-context">Drag & Drop to Upload File</header>
                                        <div class="choose-file">
                                        <span>or</span>
                                        <a class="a-choose-file">choose your file</a>
                                        </div>
                                        <input type="file" class="upload-file" name="file" hidden>
                                </div>
                            </div>
                            <div class="row">
                                <input type="password" placeholder="Encryption Key" name="enkey" class="enkey" required>
                                <input type="password" placeholder="Confirm Encryption Key" name="c-enkey" class="c-enkey" required>
                            </div>
                            <div class="row">
                                <button class="ldbtn btn-dark btn-dark-small disabled"></button>
                            </div>
                        </form>
                    </div>
                    <div class="paste hide">
                        <form class="form" action="#" method="post">
                            <div class="row">
                                <textarea name="data" cols="30" rows="4"
                                    placeholder="Enter your text here..." required></textarea>
                            </div>
                            <div class="row">
                                <input type="password" placeholder="Encryption Key" name="enkey" class="enkey" required>
                                <input type="password" placeholder="Confirm Encryption Key" name="c-enkey" class="c-enkey" required>
                            </div>
                            <div class="row">
                                <button class="ldbtn btn-dark btn-dark-small"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="assets/jQuery/jquery.min.js"></script>
<script type="text/javascript" src="assets/sweetalert/sweetalert.js"></script>
<script type="text/javascript" src="assets/custom/js/script.js"></script>
</html>

<?php 
    if($_SESSION['error']==1){
        echo '<script type="text/javascript">Swal.fire("Oops!","Encryption Keys Doesn\'t Matched!","error");</script>';
    }
    else if ($_SESSION['error']==2) {
        echo '<script type="text/javascript">Swal.fire("Oops!","Encryption key must be at least 8 characters long","error");</script>';
    }
    else if ($_SESSION['error']==3) {
        echo '<script type="text/javascript">Swal.fire("Oops!","Incorrect Encryption Key","error");</script>';
    }
    $_SESSION["error"] = 0;
?>