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
$src1 = "Plaintext = ";
$scr2 = "DevAddr = ";
// echo preg_match("/{$src1}/i", $dr);
// $res = strpos($dr, $src1) + strlen($src1);
// $ress = strpos($dr, " ", $res) - $res;
// $valor = substr($dr, $res, $ress);
// echo $res . " and " . $ress . " = " . $valor;


/**
 * @param string $dados
 * @param string $procurar
 * @param int 	 $td
 * @param int 	 $rp
 * @param int    $posI
 * @param int 	 $posF
 */

function getTextDataValue($dados, $procurar){
	//$result = "";
	$td = strlen($dados); 
	$tp = strlen($procurar);

	//Verificar se tem caracters nos dados
	if ( $td > 0 && $tp > 0){
		$posI = strpos($dados, $procurar) + $tp;
		$posF = strpos($dados, " ", $posI) - $posI;

		//Verificar se a posição inicial é maior que tamanho da string procurada
		if ($posI > $tp) {
			$result = substr($dados, $posI, $posF);
		}else{
			$result = "O texto $procurar não foi encontrado.\n";
		}

	}else{
		$result = "Sem dados correto.\n";
	}

	return $result;
}

echo getTextDataValue($dr, "Plaintext = ");
?>

</body>
</html>