<?php

function encrypt($str,$enKey){

    $str = str_replace(array("\r\n","\n"), '<br>', $str);
    $strHex='';
    $Key='';
    $rKey=20;
    $tmpKey='';

    for($i=0;$i<strlen($enKey);$i++){
        $Key.=ord($enKey[$i])+$rKey;
        $tmpKey.=dechex(ord($enKey[$i])+$rKey);
    }    

    $rKeyHex=dechex($rKey);

    $enKeyHash = hash('sha256',$tmpKey);
    
    for ($i=0,$j=0; $i < strlen($str); $i++,$j++){
        if($j==strlen($Key)){
            $j=0;
        }
        $strHex .= dechex(ord($str[$i])+$Key[$j]);
    }

    $encTxt = $strHex.$rKeyHex.$enKeyHash;

    return $encTxt;
}

function decrypt($str,$uenKey){

    $enKeyHash='';
    $strHex='';
    $Key='';
    $tmpKey='';
    $uenKeyHash='';
    $decTxt='';

    for($i=strlen($str)-64;$i<strlen($str);$i++){
        $enKeyHash.=$str[$i];
    }    

    $rKeyHex=$str[-66].$str[-65];
    $rKey=hexdec($rKeyHex);

    for($i=0;$i<strlen($str)-66;$i++){
        $strHex.=$str[$i];
    }  

    for($i=0;$i<strlen($uenKey);$i++){
        $Key.=ord($uenKey[$i])+$rKey;
        $tmpKey.=dechex(ord($uenKey[$i])+$rKey);
    } 

    $uenKeyHash=hash('sha256',$tmpKey);
    
    if($enKeyHash==$uenKeyHash){
        for ($i=0, $j=0; $i < strlen($str)-66; $i+=2, $j++){
            if($j==strlen($Key)){
                $j=0;
            }    
            $decTxt.=chr(hexdec($str[$i].$str[$i+1])-$Key[$j]);
        }
        $decTxt = str_replace(array("<br>"), "\r\n", $decTxt);
        return $decTxt;
    }
    else{
        return false;
    }

}

?>
