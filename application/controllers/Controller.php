<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

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
  		$this->load->view('welcome_message');
  	}

    public function dashboard(){
        $this->load->view('dashboard');
    }

    public function regimes(){
        $this->load->view('regimes');
    }

    public function completer(){
        $this->load->view('profil');
    }


/*** Inscription, Completion, Profil**/
   public function signup(){
    $this->load->model('news_model');
    $admin = -1;
    $data1 = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'admin' => $admin
    );
    $this->news_model->insertion('USER',$data1);
		$this->session->set_userdata('user', $data1[$i]);
    $data = $this->news_model->selectuser($data1['name']);
    $this->session->set_userdata('user', $data);
    redirect(base_url('controller/completer'));
  }


  public function saveObjectif(){
        $this->load->model('news_model');
        $data1 = array(
            'objectif' => $this->input->post('objectif')
        );
        $this->news_model->insertion('objectif',$data1);
        redirect(base_url('controller/welcome'));
   }

/***Fonction de connexion**/
  public function connection(){
		$this->load->model('news_model');
		$table = "USER";
        $email = $this->input->post('email');
        $password = $this->input->post('password');
		$data = $this->news_model->login($email,$password);
        if($data != null){
            if(intval($data['admin']) == 1){
                $this->session->set_userdata('user', $data);
                redirect(base_url('controller/dashboard'));
            }else {
                $this->session->set_userdata('user', $data);
                redirect(base_url('controller/welcome'));
            }
        }
		redirect(base_url('controller/index'));
	}

    /***Fonction CRUD regime**/
    public function saveRepas(){
        $this->load->model('news_model');
        $data1 = array(
            'types' => $this->input->post('types'),
            'nom' => $this->input->post('nom'),
            'nombrecalories' => $this->input->post('nbcalories'),
            'prix' => $this->input->post('prix')
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
            'types' => $this->input->post('types'),
            'nom' => $this->input->post('nom'),
            'nombrecalories' => $this->input->post('nbcalories'),
            'prix' => $this->input->post('prix')
        );
        $this->news_model->modification('repas','idrepas',$id,$data1);
        redirect(base_url('controller/getAllrepas'));
    }
}
