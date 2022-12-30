<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner PHP</title>

    <script src="html5-qrcode.min.js"></script>
</head>
<body>
    <div>
        <button onclick="addScanner()">Scan Barcode</button>
        <div style="width: 400px" id="reader"></div>
    </div>
</body>

<script>

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`);
        alert(decodedText);
        html5QrcodeScanner.clear();
    }

    function onScanError(errorMessage) {
    // handle on error condition, with error message
        // console.log(errorMessage);
    }

    function addScanner(){
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: {width: 250, height: 250}});
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    }

</script>
</html>