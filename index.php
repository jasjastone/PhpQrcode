<?php
 echo getcwd();
if(isset($_GET['generateQrCodeImage'])){
    echo '<img src="'.$_GET['generateQrCodeImage'].'"/>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Qr code</title>
</head>

<body>
    <form action="./generatedQrCode.php" method="post">
        <div class="form-group">
            <label for="code" class="form-label">Enter text to generate a qrcode</label>
            <input type="text" id="code" name="code" class="form-control">
            <input type="submit" name="generate" value="Generate">
        </div>

    </form>
</body>

</html>