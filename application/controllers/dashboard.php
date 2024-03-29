<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model("Dashboard_model");
	}

	public function index(){
		if($_SESSION['usertype_id']  > 1)
			redirect("/dashboard/general");
		if (isset($_GET['ac'])){
			$_SESSION['account_id'] = $_GET['ac'];
		};
		
		$active_inactive_account = $this->Dashboard_model->get_active_inactive_account();
		$active_inactive_client = $this->Dashboard_model->get_active_inactive_client();
		$plan = $this->Dashboard_model->getPlan();
		$payment_data = $this->Dashboard_model->getPaymentTable();

		$params = array(
			'title' => "Admin Dashboard",
			'selections' => json_encode(array("dashboard", "admin")),
			'data' => array(
				'active_inactive_account' => $active_inactive_account,
				'active_inactive_client' => $active_inactive_client,
				'plan' => $plan,
				'payment_data' => $payment_data
			)
		);

		$this->load_view('dashboard/admin_view.php', $params);
	}

	public function logout() {
		session_destroy();
		redirect('/login');
	}

	public function getUserAccounts() {

		$account = $this->Dashboard_model->getUserAccounts();

		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function loadCalendarUpper() {
		$acct = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;

		$account = $this->Dashboard_model->loadCalendarUpper($acct);
		
		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function getTableData(){
		$table = $this->Dashboard_model->getTableData();

		echo json_encode(array('data' => $table));
	}

	public function getAccounts(){
		$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : NULL;
		$account = $this->Dashboard_model->getAccounts($user_id);

		echo json_encode(array('status' => "success", "data" => $account));
	}

	public function general(){
		if (isset($_GET['ac'])){
			$_SESSION['account_id'] = $_GET['ac'];
		};
		$params = array(
			'title' => "General Dashboard",
			'selections' => json_encode(array("dashboard", "general"))
		);
		
		$this->load_view('dashboard/general_view.php', $params);
	}

	public function session(){
		$params = array(
			'title' => "Session",
			'selections' => json_encode(array("session", "session")),
			'data' => "Test Data"
		);
		
		$this->load_view('session/session_view.php', $params);
	}

	public function deleteUser() {
		$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : NULL;
		$result = $this->Dashboard_model->deleteUser($user_id);

		echo json_encode($result);
	}

	public function getAccountSymbols() {
		$result = $this->Dashboard_model->getAccountSymbols();

		echo $result;
	}

	public function getSymbolCharts() {
		$acct = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;
		// $filter_type = isset($_POST['filter_type']) ? $_POST['filter_type'] : NULL;

		$result = $this->Dashboard_model->getSymbolCharts($acct);

		echo json_encode($result);
	}

	public function getTotalTradeSummary() {
		$acct = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;
		$result = $this->Dashboard_model->getTotalTradeSummary($acct);

		echo json_encode(array('status' => "success", "data" => $result));
	}

	public function getTotalTradeSummaryFilter() {
		$acct = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;
		$filterType = isset($_POST['filter_type']) ? $_POST['filter_type'] : NULL;
		$period = isset($_POST['period']) ? $_POST['period'] : NULL;
		// $symbols = isset($_POST['symbols']) ? $_POST['symbols'] : NULL;

		$result = $this->Dashboard_model->getTotalTradeSummaryFilter($acct, $filterType, $period);

		echo json_encode(array('status' => "success", "data" => $result));
	}

	public function getPerformanceGrowth() {

		$acct = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;
		$result = $this->Dashboard_model->getPerformanceGrowth($acct);

		echo json_encode(array('status' => "success", "data" => $result));
	}

	public function getSymbolChartsFilter() {
		$filterType = isset($_POST['filter_type']) ? $_POST['filter_type'] : NULL;
		$period = isset($_POST['period']) ? $_POST['period'] : NULL;
		$acct = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;

		$result = $this->Dashboard_model->getSymbolChartsFilter($acct, $filterType, $period);

		echo json_encode(array('status' => "success", "data" => $result));
	}

	public function getAccountSummary() {
		$acct = isset($_POST['account_id']) ? $_POST['account_id'] : NULL;

		$result = $this->Dashboard_model->getAccountSummary($acct);
		echo json_encode(array('status' => "success", "data" => $result));
	}
}
