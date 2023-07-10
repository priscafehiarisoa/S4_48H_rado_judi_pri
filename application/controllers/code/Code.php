<?php

class Code extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('verifications','verif');
        $this->load->model('news_model','NM');

    }
    public function index(){
        $this->load->view('Insertion_code');
    }

    public function enregistrer_code(){
        $code=$_POST['code'];
        $valeur=$_POST['valeur'];
        $erreurs=null;
        //il y a des caracteres speciaux
        if($this->verif->verifier_code($code)==-1){
            $erreurs['code']="les caractères spéciaux ne sont pas autorisés dans un code ";
        }
        elseif ($this->verif->verifier_code($code)==0){
            $erreurs['code']="le code ne peut pas dépasser ni être moins de 14 caractères";
        }
        if($valeur<=0){
            $erreurs['valeurs']="la valeur d'un code ne peut-être négatif";
        }

        if($erreurs==null){
            $data=array(
                'CODE'=>$code,
                'VALEUR'=>$valeur
            );
            $this->NM->insertion("CODE",$data);
            $this->index();
        }
        else{
            $this->load->view('Insertion_code',$erreurs);
        }

    }

    public function lister_codes(){
        $table="CODE";
        $codes['codes']=$this->NM->selectFromTable($table);
        $this->load->view('code_list',$codes);
    }


}