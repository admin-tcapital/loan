<?php

class Borrower extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Borrower_model');
		
		$this->load->model('Loan_model');
	}
	
	function index()
	{
		$this->viewall();
	}
	
	function viewall()
	{
		$this->load->view(
			'template/main', 
			array(
				'content'=>'borrower/index', 
				'location' => 'Borrower / View', 
				'menu' => array(
					'Logout' => 'user/logout', 
					'Loan' => 'loan/view', 
					'Home' => 'stats')
			)
		);
	}
	
	function view()
	{
		//validation
		$this->form_validation->set_rules('loan_amount', 'Amount', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('loan_id', 'Loan Type', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('borrower_id', 'Borrower', 'trim|required|xss_clean|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			//change validation error delimiters
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->view(
				'template/main', 
				array(
					'content'=>'borrower/view', 
					'location' => 'Borrower / View', 
					'menu' => array(
						'Logout' => 'user/logout', 
						'Loan' => 'loan/view', 
						'Home' => 'stats')
				)
			);
		}
		else
		{
			if (isset($_POST['submit_borrower'])) {
				//destroy submit_borrower from the POST array
				unset($_POST['submit_borrower']);
				//add loan
				if ($this->Borrower_model->add_loan($_POST)) {
					redirect('borrower/view/?id='.$this->input->post('borrower_id'), 'refresh');
				}
			}
		}
		
	}
	
	function add()
	{
		//validation
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mi', 'Middle Initial', 'trim|required|xss_clean');
		$this->form_validation->set_rules('age', 'Age', 'trim|required|xss_clean');
		$this->form_validation->set_rules('birth_date', 'Date of Birth', 'trim|required|xss_clean');
		$this->form_validation->set_rules('civil_status', 'Civil Status', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone_cell', 'Phone / Cellphone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
		$this->form_validation->set_rules('employment_status', 'Employment Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('company', 'Company', 'trim|xss_clean');
		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|xss_clean');
		$this->form_validation->set_rules('income', 'Income', 'trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			//change validation error delimiters
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->view('template/main', array('content' => 'borrower/add', 'location' => 'Borrower / Add', 'menu' => array('Logout' => 'user/logout', 'Loan' => 'loan/view', 'Home' => 'stats')));
		}
		else
		{
			if (isset($_POST['submit_borrower'])) {
				//destroy submit_borrower from the POST array
				unset($_POST['submit_borrower']);
				//add loan
				if ($this->Borrower_model->add($_POST)) {
					redirect('borrower/view', 'refresh');
				}
			}
		}
	}
	
	function edit()
	{
		//validation
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('mi', 'Middle Initial', 'trim|required|xss_clean');
		$this->form_validation->set_rules('age', 'Age', 'trim|required|xss_clean');
		$this->form_validation->set_rules('birth_date', 'Date of Birth', 'trim|required|xss_clean');
		$this->form_validation->set_rules('civil_status', 'Civil Status', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('phone_cell', 'Phone / Cellphone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
		$this->form_validation->set_rules('employment_status', 'Employment Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('company', 'Company', 'trim|xss_clean');
		$this->form_validation->set_rules('job_title', 'Job Title', 'trim|xss_clean');
		$this->form_validation->set_rules('income', 'Income', 'trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			//change validation error delimiters
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->view('template/main', array('content' => 'borrower/edit', 'location' => 'Borrower / Add', 'menu' => array('Logout' => 'user/logout', 'Loan' => 'loan/view', 'Home' => 'stats')));
		}
		else
		{
			if (isset($_POST['submit_borrower'])) {
				$id = $this->input->post('id');
				//destroy submit_borrower from the POST array
				unset($_POST['submit_borrower']);
				unset($_POST['id']);
				//add loan
				if ($this->Borrower_model->edit($_POST, $id)) {
					redirect('borrower/view/?id='.$id, 'refresh');
				}
			}
		}
	}
	
	function calculator()
	{
		//validation
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('loan_type', 'Loan Type', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('loan_date', 'Loan Date', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			//change validation error delimiters
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->view('template/main', array('content' => 'loan/calculator', 'location' => 'Loan / Loan Calculator', 'menu' => array('Logout' => 'user/logout', 'Loan' => 'loan/view', 'Home' => 'stats')));
		}
		else
		{
			if (isset($_POST['submit_loan'])) {
				//check if loan name exist
				$id = $this->input->post('loan_type');
				$exist = $this->Loan_model->chk_loan_exist(array('id' => $id));
				
				if ($exist) {
					$result = $this->Loan_model->calculate($this->input->post('amount'), $this->input->post('loan_type'), $this->input->post('loan_date'));
					$this->load->view('template/main', array('content' => 'loan/calculator', 'data' => array('result' => $result), 'location' => 'Loan / Loan Calculator', 'menu' => array('Logout' => 'user/logout', 'Loan' => 'loan/view', 'Home' => 'stats')));
				} else {
					$this->load->view('template/main', array('content' => 'loan/calculator', 'data' => array('error' => '<div class="error">Sorry, loan don\'t exist.</div>'), 'location' => 'Login', 'menu' => array('Logout' => 'user/logout', 'Loan' => 'loan/view', 'Home' => 'stats')));
				}
			}
		}
	}
}