<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('verifications','verif');
        $this->load->model('news_model','NM');

    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		$this->load->view('sign-in');
	}

	public function inscription(){
		$this->load->view('sign-up');
	}

  /***Redirection vers la page profile**/
    public function welcome(){
        session_start();
        $this->load->model('baseModel/ObjectifModel');
        $user['calorie'] = $this->ObjectifModel->getCalorieCible($_SESSION['user']['IDUSER']);
        $us=$_SESSION['user'];
        $user['user']=$us;
        //maka ny compte client
        $table="COMPTEUSER";
        $conditions=array(
            'IDUSER'=>$us['IDUSER'],
        );
        $compte=$this->NM->selectFromTableConditions($table,$conditions);
        $io=0;
        for ($i = 0; $i < count($compte); $i++) {
            $io+=$compte[$i]->MONTANT;
        }
        $user['compte']=$io;
        $this->load->view('profile_client',$user);
  	}

    public function dashboard(){
        $this->load->model('news_model');
        $data = array();
        $data['regime'] = $this->news_model->selectregime();
        $data['prise'] = $this->news_model->selectprise();
        $this->load->view('dashboard',$data);
    }

    public function regimes(){
        $this->load->view('regimes');
    }

    public function completer(){
        $this->load->view('profil');
    }

    /***Fonction de connexion**/
    public function connection(){
        session_start();
        $this->load->model('news_model');
        $table = "users";
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = $this->news_model->login($email,$password);
        if($data != null){
            if(intval($data['ADMIN']) == 1){
                $_SESSION['admin'] = $data;
                redirect(base_url('controller/dashboard'));
            }else {
                $_SESSION['user'] = $data;
                redirect(base_url('controller/welcome'));
            }
        }
        redirect(base_url('controller/index'));
    }

/*** Inscription, Completion, Profil**/
   public function signup(){
       session_start();
    $this->load->model('news_model');
    $admin = -1;
    $data1 = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'genre' => $this->input->post('genre'),
        'admin' => $admin
    );
    $this->news_model->insertion('user',$data1);
    $data = $this->news_model->selectuser($data1['name']);
    $_SESSION['user'] = $data;
    redirect(base_url('controller/completer'));
  }


  public function saveObjectif(){
       session_start();
        $this->load->model('news_model');
        $this->load->model('verifications');
        $objectif = $this->input->post('objectif');
        $cible = $this->input->post('cibles');
        $poids = $this->input->post('poids');
        $data1 = array(
            'objectif' => $objectif,
            'cible' => $cible
        );
        if($this->verifications->differencePoidscibles($objectif,$cible,$poids)){
            $this->news_model->insertion('objectif',$data1);
            $idobjectif = $this->news_model->selectMaxIdobjectif();
            $data1 = array(
                'IDOBJECTIF' => $objectif,
                'IDUSER' =>$_SESSION['user']['IDUSER'],
                'POIDSCIBLE' => $cible
            );
            $this->news_model->insertion('OBJECTIFUSER',$data1);
            redirect(base_url('controller/welcome'));
        } else {
            $data1['poids'] = $poids;
            $data1['erreur'] = "poids non validee";
            $this->load->view('objectif',$data1);
        }

   }

    /***Fonction CRUD regime**/
    public function saveRepas(){
        $this->load->model('news_model');
        $data1 = array(
            'typerepas' => $this->input->post('types'),
            'nomrepas' => $this->input->post('nom'),
            'caloriedonee' => $this->input->post('nbcalories'),
            'prix' => $this->input->post('prix'),
            'composantrepas' => $this->input->post('composant')
        );
        $this->news_model->insertion('repas',$data1);
        redirect(base_url('controller/getAllrepas'));
    }

    public function getAllrepas(){
        $this->load->model('news_model');
        $data = array();
        $data['repas'] = $this->news_model->select('repas');
        $this->load->view('regimes',$data);
    }

    public function modifrepas(){
        $id = array();
        $id['idrepas'] = $this->input->get('idrepas');
        $this->load->view('modifRepas',$id);
    }

    public function deleterepas(){
        $id = $this->input->get('idrepas');
        $this->load->model('news_model');
        $this->news_model->supression('repas','idrepas',$id);
        redirect(base_url('controller/getAllrepas'));
    }

    public function changeRepas(){
        $this->load->model('news_model');
        $id = $this->input->post('idrepas');
        $data1 = array(
            'typerepas' => $this->input->post('types'),
            'nomrepas' => $this->input->post('nom'),
            'caloriedonee' => $this->input->post('nbcalories'),
            'prix' => $this->input->post('prix'),
            'composantrepas' => $this->input->post('composant')
        );
        $this->news_model->modification('repas','idrepas',$id,$data1);
        redirect(base_url('controller/getAllrepas'));
    }

    /***Fonction CRUD exercice**/
    public function saveExercice(){
        $this->load->model('news_model');
        $data1 = array(
            'nomrepas' => $this->input->post('nom'),
            'CALORIEDEPENSE' => $this->input->post('dpcalories'),
            'NOMEXERCICE' => $this->input->post('nom'),
            'CALORIEDEPENSEE' => $this->input->post('dpcalories')
        );
        $this->news_model->insertion('exercice',$data1);
        redirect(base_url('controller/getAllexercice'));
    }

    public function getAllexercice(){
        $this->load->model('news_model');
        $data = array();
        $data['exercice'] = $this->news_model->select('exercice');
        $this->load->view('exercice',$data);
    }

    public function modifexercice(){
        $id = array();
        $id['idexercice'] = $this->input->get('idexercice');
        $this->load->view('modifExercice',$id);
    }

    public function deleteexercice(){
        $id = $this->input->get('idexercice');
        $this->load->model('news_model');
        $this->news_model->supression('exercice','idexercice',$id);
        redirect(base_url('controller/getAllexercice'));
    }

    public function changeExercice(){
        $this->load->model('news_model');
        $id = $this->input->post('idexercice');
        $data1 = array(
            'nomrepas' => $this->input->post('nom'),
            'caloriedepensee' => $this->input->post('dpcalories')
        );
        $this->news_model->modification('exercice','idexercice',$id,$data1);
        redirect(base_url('controller/getAllexercice'));
    }

    public function deconnectAdmin(){
        session_start();
        unset($_SESSION['admin']);
        redirect(base_url('controller/index'));
    }

    public function deconnectClient(){
        session_start();
        unset($_SESSION['user']);
        redirect(base_url('controller/index'));
    }
    public function sceance(){
        $this->load->model('news_model');
        $data = array();
        $data['allExo'] = $this->news_model->select('EXERCICE');
        $this->load->view('sceance',$data);
    }

    public function plats(){
        $this->load->model('news_model');
        $data = array();
        $data['allRepas'] = $this->news_model->select('REPAS');
        $this->load->view('plats',$data);
    }
}
