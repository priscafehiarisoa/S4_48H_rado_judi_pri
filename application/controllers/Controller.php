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
  		$this->load->view('profile');
  	}

    public function completer(){
        $this->load->view('completer_profile');
    }


/*** Inscription, Completion, Profil**/
   public function signup(){
    $this->load->model('news_model');
    $data1 = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password')
    );
    $this->news_model->insertion('users',$data1);
    $this->session->set_userdata('user', $data1);
    redirect(base_url('Profile/index'));
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
		$table = "users";
		$data = $this->news_model->selectusers($table);
		for($i = 0; $i<count($data); $i++){
				if($this->input->post('email') == $data[$i]['email'] && $this->input->post('password') == $data[$i]['password']){
						$this->session->set_userdata('user', $data[$i]);
                        $id = $data[$i]['id'];
						redirect(base_url('controller/welcome'));
				}
		}
		redirect(base_url('controller/index'));
	}
}
