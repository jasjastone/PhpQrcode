<?php
include("./phpqrcode/qrlib.php");

if (isset($_POST['generate'])) {
    //get the qrcodeText from the input form
    $qrCodeContent = $_POST['code'];

    // this is my server path to get it use getcwd() function to get server path
    // $saveDirectory = "/opt/lampp/htdocs/qrcode/qrcodesImages/ ";

    //apa i use getcwd() function to get the abosoltue server path means a completely path to this directory
    $saveDirectory = getcwd()."/qrcodesImages/";//out put "/opt/lampp/htdocs/qrcode/qrcodesImages/"

    // we need to generate filename somehow,
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.md5($qrCodeContent).'.png';
    $fullServerPath = $saveDirectory.$fileName;

    // check if the file with the code is already exist
    if (!file_exists($fullServerPath)) {
        //generate
        QRcode::png($qrCodeContent, $fullServerPath);
        echo 'File generated! successfully';
        echo '<hr />';
        echo $fullServerPath;
    } else {
        echo 'File already generated';
        echo '<hr />';
        //hapa tunatumia relative path ya kwetu kwasababu image awezi acces server path
        // kama hii /opt/lampp/htdocs/qrcode/qrcodesImages/
        // kwaiy tumetumia filename maana tunajua directory tuilpo store ile qrcode
        echo '<img src="./qrcodesImages/'.$fileName.'">';

        //hii apa itakusaidia kuredirect kama unahitaji kurudi kwenye page uliyo create qrcode ili mtu aweze scan
        // header("Location:./index.php?generateQrCodeImage="."./qrcodesImages/".$fileName);
    }

}
