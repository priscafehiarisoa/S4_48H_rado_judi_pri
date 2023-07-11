<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifications extends CI_Model
{
    public function verifier_age($age){
        if($age<=0){
            return -1;
        }
        else return 1;
    }
    public function verifier_taille($taille){
        if($taille<=0){
            return -1;
        }
        else return 1;
    }
    public function verifier_poids($poids){
        if($poids<=0){
            return -1;
        }
        else return 1;
    }

    public function verifier_code($str_code){
        $pattern = '/[^a-zA-Z0-9]/';
        if(preg_match($pattern, $str_code)){
            return -1 ; // dans le cas ou il contient des caracteres speciaux
        }
        else if (strlen($str_code)<14 or strlen($str_code)>14){
            return 0; // dans le cas ou le code contient moins de 14 caracteres ou plus
        }
        else return 1;


    }


    public function differencePoidscibles($objectif,$poids,$cible){
        if($objectif == 1){
            if($poids >= $cible){
                return false;
            }
        }
    }
}