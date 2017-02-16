<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function timetable()
	{		
		$this->load->model('movie/Timetable');
        $data['time'] = $this->Timetable->getTimetable();			
		$this->load->view('movie/timetable',$data);
	}
	public function index(){		
		$this->load->view('movie/index');
	}
	
	public function login($time,$hall){		
		$this->load->library('session');
		$this->session->set_userdata('time',$time);
		$this->session->set_userdata('hall',$hall);				
		$this->load->view('movie/login');
	}

	public function checkLogin(){
		$name = $this->input->post('txtUser');
		$password = $this->input->post('txtPassword');
		$this->load->model("movie/Timetable");
		$data['result'] = $this->Timetable->checkUserExist($name,$password);
		
		if (empty($data['result'])){
			$this->load->library('session');			
			$this->session->set_flashdata('msg', 'Username and password didnt match');
			$this->load->view('movie/login');			
		}else{
			$this->load->library('session');				
			$this->session->set_flashdata('msg', 'Sucessfully login');	
			$this->session->set_userdata('login',1);		
			$this->session->set_userdata('userid',$data['result'][0]['id']);					   
			$hall = $this->session->userdata('hall');
			$this->load->model('movie/Timetable');						
			$data['price'] = $this->Timetable->getHallName($hall);							
		    $this->load->view('movie/getprice',$data);
		}	
	}

	public function savedetail(){	
		$price = $_POST['price'];	
		$totalprice = ltrim($_POST['totalprice'],'$');
		$quantity = $_POST['qty'];
		$hallname = $_POST['hall'];
		$time = $_POST['time'];
		$userid = $_POST['userid'];
		$date = date("Y-m-d");		
		$data = array(
			'user_id' => $userid,
			'price' => $price,
			'qty' => $quantity,
			'total_price' => $totalprice,
			'movie'=>$hallname,
			'm_time'=>$time	,
			'created_at'=>$date	
		);
		
	     $this->load->model('movie/Timetable');
		 $value = $this->Timetable->saveUserDetail($data);
		 return "true";		
	}

  public function confirmation(){
	  $this->load->library('session');	
		if($this->session->userdata('login') == 1) {
        $uid = $this->session->userdata('userid');
				$this->load->model('movie/Timetable');
				$data[]= $this->Timetable->getUserDetail($uid);
				foreach($data as $r){
					foreach($r as $item){
						$date     = $item['created_at'];
						$create_at = strtotime($date);
						$end_at = strtotime(date("Y-m-d"));
						$diff = ($create_at - $end_at);			 
						if($diff<2){
						$result[] = $item;
						}			  		  
					}
				}	
				$result['user'] = $result;	  
			  $this->load->view('movie/confirmation',$result);
		}else{
			$this->session->set_flashdata('msg', 'please! login ');
			$this->load->view("movie/login.php");
		}
		  
  }	

  public function editConfirmation($id){
		$this->load->library('session');
		if($this->session->userdata('login') == 1) {
			$this->load->model('movie/Timetable');
			$result['user'] = $this->Timetable->getOneUser($id);
			$this->load->view('movie/editconfirmation',$result);
		}else{
			$this->session->set_flashdata('msg', 'please! login ');
			$this->load->view("movie/login.php");
		}
  }

  public function editDetail(){	
	  $price = $_POST['price'];	
	  $totalprice = ltrim($_POST['totalprice'],'$');
	  $quantity = $_POST['qty'];
	  $id = $_POST['id'];		
	  $data = array(
			'id' => $id,
			'price' => $price,
			'qty' => $quantity,
			'total_price' => $totalprice				
		);				
	  $this->load->model('movie/Timetable');	 
	  $value = $this->Timetable->editUserDetail($data);
	  return "true";
  }

  public function deleteConfirmation($id){
		$this->load->library('session');
		if($this->session->userdata('login') == 1) {
			$this->load->model('movie/Timetable');	 
			$value = $this->Timetable->deleteUserDetail($id);
			if($value==1){
			redirect("home/confirmation?sdmsg=1");  
			}else{
			redirect('home/confirmation?fdmsg=1'); 
			}
		}else{
			$this->session->set_flashdata('msg', 'please! login ');
			$this->load->view("movie/login.php");
		}
  }

  public function doneConfirmation($id){
		$this->load->library('session');
		if($this->session->userdata('login') == 1) {
			$this->load->model('movie/Timetable');	 
			$value = $this->Timetable->confirmUserDetail($id);
			echo $id;
			if($value==1){
			redirect("home/index?scmsg=1");  
			}else{
			redirect('home/confirmation?fcmsg=1'); 
			}
		}else{
			$this->session->set_flashdata('msg', 'please! login ');
			$this->load->view("movie/login.php");
		}
  }

}
