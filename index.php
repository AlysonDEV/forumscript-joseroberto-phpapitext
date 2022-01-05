<?php 
require_once('./txtapiphp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consumir dados de uma API com texto</title>
</head>
<body>
<?php
$dr = "decoding from Base64:  QNVqRQGAAQAyKVlWDC2Za5A6
Decoded packet
--------------
Message Type = Data
            PHYPayload = 40D56A4501800100322959560C2D996B903A

          ( PHYPayload = MHDR[1] | MACPayload[..] | MIC[4] )
                  MHDR = 40
            MACPayload = D56A4501800100322959560C2D
                   MIC = 996B903A (OK)

          ( MACPayload = FHDR | FPort | FRMPayload )
                  FHDR = D56A4501800100
                 FPort = 32
            FRMPayload = 2959560C2D
             Plaintext = 48656C6C6F ('Hello')

                ( FHDR = DevAddr[4] | FCtrl[1] | FCnt[2] | FOpts[0..15] )
               DevAddr = 01456AD5 (Big Endi﻿an)
                 FCtrl = 80
                  FCnt = 0001 (Big Endian)
                 FOpts =

          Message Type = Unconfirmed Data Up
             Direction = up
                  FCnt = 1
             FCtrl.ACK = false
             FCtrl.ADR = true
       FCtrl.ADRACKReq = false";
 
 

$plaintext = getTextDataValue($dr, "Plaintext = ");
$devaddr = getTextDataValue($dr, "DevAddr = ");

echo "O valor do Plaintext é: $plaintext.<br>\n";
echo "O valor do DevAddr é: $devaddr.<br>\n";
?>

</body>
</html>