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
    public function verifier_poids($poids)
    {
        if ($poids <= 0) {
            return -1;
        } else return 1;
    }

    public function differencePoidscibles($objectif,$poids,$cible){
        if($objectif == 1){
            if($poids >= $cible){
                return false;
            }
        }
    }
}