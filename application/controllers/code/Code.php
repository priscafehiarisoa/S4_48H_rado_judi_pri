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

    public function effacer_code($idcode){
        $table="CODE";
        $this->NM->delete($table,$idcode,"IDCODE");
        $this->lister_codes();
    }

    public function modifier_code($idcode){
        $conditions=array(
            'idcode'=>$idcode
        );
        $table="CODE";
        $code['codeModif']=$this->NM->selectFromTableConditions($table,$conditions)[0];
        $this->load->view('Insertion_code',$code);
    }

    public function update_code(){
        $code=trim($_POST['code']);
        $valeur=trim($_POST['valeur']);
        $idcode=$_POST['idcode'];
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
            $this->NM->modification("CODE",$idcode,$data,'IDCODE');
            $this->index();
        }
        else{
            $this->load->view('Insertion_code',$erreurs);
        }
    }

    public function charger_page_utiliser_un_code(){
        $table="CODE";
        $codes['codes']=$this->NM->selectFromTable($table);
        $this->load->view('code_use',$codes);
    }

    public function utiliser_un_code(){
        session_start();
        $code=trim($_POST['code']);
        $erreurs=null;
        if($this->verif->verifier_code($code)!=1){
            $erreurs['erreur']="code invalide ";
        }
        else{
            $conditions=array(
                'code'=>$code
            );
            $table="CODE";
            $code_source=$this->NM->selectFromTableConditions($table,$conditions);

            if($code_source!=null){
                $code_source=$code_source[0];
                $table = "CODEUTILISE";
                $conditions = array(
                    'idcode' => $code_source->IDCODE,
                    'VALIDEE'=>1
                );
                $code_validé = $this->NM->selectFromTableConditions($table, $conditions);

                if($code_validé!=null){
                    $erreurs['erreur']="code déjà utilisé ";
                }
                else{

                    date_default_timezone_set('Africa/Nairobi');
                    $currentDate = date('Y-m-d');
                    $data=array(
                        'IDUSER'=>$_SESSION['user']['IDUSER'],
                        'idcode'=>$code_source->IDCODE,
                        'VALIDEE'=>0
                    );
                    $table='CODEUTILISE';
                    $this->NM->insertion($table,$data);
                }

            }
            else{
                $erreurs['erreur']="code invalide ";
            }
        }
        $table="CODE";
        $erreurs['codes']=$this->NM->selectFromTable($table);
        $this->load->view('code_use',$erreurs);

    }

    public function charger_page_code_list_used(){

        $code['listecodes']=$this->NM->liste_code_utilise();
        $this->load->view('code_list_used',$code);

    }

    public function valider_code($idcode,$iduser){
        $table="CODEUTILISE";
        $data=array(
            'IDCODE'=>$idcode,
            'IDUSER'=>$iduser,
            'VALIDEE'=>1
        );
        $this->NM->modification($table,"IDCODE",$data);
        $this->charger_page_code_list_used();

    }


}