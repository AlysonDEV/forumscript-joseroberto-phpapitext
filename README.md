# Forum Script - José Roberto Redígolo - Consumir dados API que retorne texto
Ajuda a consumir dados de API que retorna dados em texto

## Forum Script
Meu perfil do forum script [Alyson Ronnan](https://forum.scriptbrasil.com.br/profile/94500-alyson-ronnan-martins/)

### Duvida no forum:
Prezados,

Sou iniciante em PHP e tenho uma dúvida que não consegui sanar na internet. Tenho um programa externo que me dá o seguinte retorno:


```
decoding from Base64:  QNVqRQGAAQAyKVlWDC2Za5A6
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
       FCtrl.ADRACKReq = false

```

Preciso colocar o valor de Plaintext e o valor de DevAddr em uma variável. Preciso apenas dos valores em hexadecimal. Alguém tem algum exemplo de como fazer isso?

Desde já agradeço.

Zé Roberto

### Resolução :tada:
Para localizar os dados dentro da string, recebida de um retorno em texto, foi criado uma função para retornar o valor procurado.

**getTextDataValue(Dados, ValorProcurado)**

```
/**
 * @param string $dados
 * @param string $procurar
 * @param int    $td
 * @param int    $rp
 * @param int    $posI
 * @param int    $posF
 */

function getTextDataValue($dados, $procurar){
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
?>
```
