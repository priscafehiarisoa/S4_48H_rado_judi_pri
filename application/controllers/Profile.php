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
        $age=$this->input->post('age');
        $poids=$this->input->post('poids');
        $taille=$this->input->post('taille');
        $errors=null;
        $this->load->model('verifications');
        $this->load->model('news_model');
        $data1 = array(
            'iduser' => $_SESSION['user']['iduser'],
            'age' => $age,
            'poids' => $poids,
            'taille' => $taille
        );

        if($this->verif->verifier_age($age)==-1){
            $errors['age']="age invalide";
        }
        if($this->verif->verifier_taille($taille)==-1)
            $errors['taille']="taille invalide";

        if($this->verif->verifier_poids($poids)==-1)
            $errors['poids']="poids invalide";

        if($errors==null){
            $this->news_model->insertion('profiluser',$data1);
            $this->load->view('objectif',$data1);
        }
        else{
            $this->load->view('profil',$errors);
        }

    }

}