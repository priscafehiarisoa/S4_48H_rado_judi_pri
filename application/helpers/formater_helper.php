<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if ( ! function_exists('formater')) {
        function formater($nombre) {
            $arr = array();
            $a=0;
            while($nombre>0){
                $arr[$a]=$nombre % 100;
                $nombre=$nombre -($nombre/100);
                $a++;
            }
            $resulta=" ";
            for($a-1;$a>=0;$a--){
                echo $resulta;
                if($a%3==0){
                    $resulta= $resulta." ";
                }else{
                    $resulta=$resulta.$arr[$a];
                }
            }
            $resulta = $resulta." Ar";
            return $resulta;
        }

    }
?>