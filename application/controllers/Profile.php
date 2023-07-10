<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('verifications','verif');

    }
    function index(){
        $this->load->view('profil');
    }

    function completion_profile(){
        $age=$_POST['age'];
        $poids=$_POST['poids'];
        $taille=$_POST['taille'];
        $errors=null;

        if($this->verif->verifier_age($age)==-1){
            $errors['age']="age invalide";

        }
        if($this->verif->verifier_taille($taille)==-1)
            $errors['taille']="taille invalide";

        if($this->verif->verifier_poids($poids)==-1)
            $errors['poids']="poids invalide";

        if($errors==null){
            print_r($errors);
        }
        else{

            $this->load->view('profil',$errors);
        }

    }

}