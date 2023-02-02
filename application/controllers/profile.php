<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Profile_model");
	}

	public function plan(){

		if (isset($_GET['ac'])){
			$_SESSION['account_id'] = $_GET['ac'];
		};

		$planlist = $this->Profile_model->getUserAccounts1();

		$params = array(
			'title' => "Plan",
			'selections' => json_encode(array("user", "plan")),
			'data' => array(
				'planlist' => $planlist
			)
		);
		
		$this->load_view('profile/plan_view.php', $params);
	}

	public function index(){
		if (isset($_GET['ac'])){
			$_SESSION['account_id'] = $_GET['ac'];
		};

		$params = array(
			'title' => "Profile",
			'selections' => json_encode(array("user", "profile"))
		);
		
		$this->load_view('profile/profile_view.php', $params);
	}

    public function getUserAccountList() {

		$account = $this->Profile_model->getUserAccountList();
		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function updateAccountStatus() {
		$account_id = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;
		$status = isset($_POST['status']) ? $_POST['status'] : NULL;

		$account = $this->Profile_model->updateAccountStatus($account_id, $status);
		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function getUserAccounts1() {

		$account = $this->Profile_model->getUserAccounts1();
		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function delectAccount() {
		$account_id = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;

		$account = $this->Profile_model->delectAccount($account_id);
		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function addAccount() {
		$account_id = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;

		$account = $this->Profile_model->addAccount($account_id);
		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function changeUsername() {
		$uname =  isset($_POST['username'])?$_POST['username']:NULL;
		$email = $_SESSION['email'];
		$result =$this->Profile_model->changeUsername($uname, $email);
		if($result){
			echo json_encode(array('status' => "success"));
		}else{
			echo json_encode(array('status' => "error"));
		}
	}

	public function getUserInvoices() {
		$account = $this->Profile_model->getUserInvoices();
		echo json_encode(array('status' => "success", "data" => $account));
	}
	
	public function profile(){
		if (isset($_GET['ac'])){
			$_SESSION['account_id'] = $_GET['ac'];
		};

		$planlist = $this->Profile_model->getUserAccounts1();

		$params = array(
			'title' => "Profile",
			'selections' => json_encode(array("user", "profile")),
			'data' => array(
				'planlist' => $planlist
			)
		);
		
		$this->load_view('profile/profile_view.php', $params);
	}

	public function updateUserProfile() {
		$params =  isset($_POST)?$_POST:NULL;
		$profile = $this->Profile_model->updateUserProfile($params);
		if($profile){
			echo json_encode(array('status' => "success")); 
		}
		else{
			echo json_encode(array('status' => "error"));
		}
	}

	public function changeTimezone(){
		$params =  isset($_POST['timezone'])?$_POST['timezone']:$_SESSION['GMT'];
		$_SESSION['GMT'] = $params;

		echo json_encode(array('status' => 'success'));
	}
}
