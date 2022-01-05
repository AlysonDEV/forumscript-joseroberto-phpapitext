<?php
/**
 * @author    Alyson Ronnan Martins <alysonronnan@gmail.com>
 * @link      https://github.com/AlysonDEV/forumscript-joseroberto-phpapitext 
 * @version   1.0.1
 */



/**
 * @param string $dados
 * @param string $procurar
 * @param int 	 $td
 * @param int 	 $rp
 * @param int    $posI
 * @param int 	 $posF
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