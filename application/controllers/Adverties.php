<?php 
ob_start();
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Adverties extends CI_Controller
	{		
		function __construct()
		{
			parent::__construct();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
		}

		public function adverties_details()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}else{
				redirect('/');				
			}

			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'Adverties';
			$data['adv_details'] = $this->Home_model->fetch_details('adv_isDelete=0 and adv_com_id='.$data['user']['com_id'].'','ad_adverties');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			// $data['advNotPrinted'] = $this->Home_model->total_records_count('sch_date < "'.date('Y-m-d').'" and sch_isDelete = 0 and sch_approved_status = 1 and sch_ready_print = 0 and sch_print_done = 0','ad_schedule');
			// print_r($data['advNotPrinted']);die();
			// $data['member_details'] = $this->Home_model->fetch_details('member_soc_id='.$data['user']['soc_id'].' AND member_role_id != 2 AND member_name !="" AND member_is_deactive=0','rs_member');
			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/adv_details',$data);
			$this->load->view('Adverties/adv_footer',$data);
		}

		public function printAdv()
		{
			$sch_id = $_POST['sch_id'];
			//$data=$this->Home_model->update_records('sch_id='.$sch_id.'')->('ad_schedule','sch_isDelete=2');
			$data= $this->Home_model->update_records('sch_id='.$sch_id.'','ad_schedule',array('sch_isDelete'=>2));
			echo json_encode($data);
		}

		public function printAdvt()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$data['page'] = 'Adverties';
			if(!empty($this->input->post('pub_sch_id'))){
				for ($i=0; $i < count($this->input->post('pub_sch_id')); $i++) { 
					$this->Home_model->update_records(array('sch_id'=>$this->input->post('pub_sch_id')[$i]),'ad_schedule',array('sch_ready_print'=>1));
				}
			}
			$pub= $this->input->post('adv_pub_id');
			$per= $this->input->post('adv_periodicity');
			$adv['date_from']= $this->input->post('date_from');
			$adv['date_to']= $this->input->post('date_to');
			$df= date('Y-m-d',strtotime($adv['date_from']));
			$dt= date('Y-m-d',strtotime($_POST['date_to']));

			$data['details']['adv_pub_id']= $this->input->post('adv_pub_id');
			$data['details']['date_from']=$this->input->post('date_from');
			$data['details']['date_to']=$this->input->post('date_to');
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0 and pub_com_id ='.$data['user']['com_id'].'','ad_publication');
			$data['all_schedule']=$this->Home_model->fetch_details('sch_isDelete=0 AND sch_date between "'.$df.'" AND "'.$dt.'" and sch_approved_status = 1 and sch_pub_id ='.$pub.' and sch_ready_print = 0 and sch_print_done = 0','ad_schedule');
			$data['periodicity']=$this->Home_model->fetch_details('per_id='.$per.'','ad_periodicity');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/adv_print',$data);
			$this->load->view('Adverties/adv_footer',$data);
		}

		public function finalprintAdvt()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$data['page'] = 'Adverties';
			if(isset($this->session->userdata['checkFinalPrint'])){
				$checkFinalPrint = $this->session->userdata('checkFinalPrint');
				$adv['pub']= $checkFinalPrint['pub'];
				$adv['per']= $checkFinalPrint['per'];
				$adv['df']= $checkFinalPrint['df'];
				$adv['dt']= $checkFinalPrint['dt'];
				$data['details']['adv_pub_id']= $checkFinalPrint['pub'];
				$data['details']['date_from']=date('d M Y',strtotime($checkFinalPrint['df']));
				$data['details']['date_to']=date('d M Y',strtotime($checkFinalPrint['dt']));
			}else{
				$adv['pub']= $this->input->post('adv_pub_id');
				$adv['per']= $this->input->post('adv_periodicity');
				$adv['df']= date('Y-m-d',strtotime($this->input->post('date_from')));
				$adv['dt']= date('Y-m-d',strtotime($this->input->post('date_to')));
				$this->session->set_userdata('checkFinalPrint',$adv);
				$data['details']['adv_pub_id']= $this->input->post('adv_pub_id');
				$data['details']['date_from']=$this->input->post('date_from');
				$data['details']['date_to']=$this->input->post('date_to');
			}
			// print_r($adv);die();

			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0 and pub_com_id ='.$data['user']['com_id'].'','ad_publication');
			$data['pub_details']=$this->Home_model->fetch_details('pub_isDelete=0 and pub_id ='.$adv['pub'].'','ad_publication');
			$data['all_schedule']=$this->Home_model->fetch_details('sch_isDelete=0 AND sch_date between "'.$adv['df'].'" AND "'.$adv['dt'].'" and sch_approved_status = 1 and sch_pub_id ='.$adv['pub'].' and sch_ready_print = 1 and sch_print_done = 0','ad_schedule');
			// print_r($data['all_schedule']);die();
			$data['periodicity']=$this->Home_model->fetch_details('per_id='.$adv['per'].'','ad_periodicity');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/final_adv_print',$data);
			$this->load->view('Adverties/adv_footer',$data);
		}

		public function isAdvertisePrinted()
		{
			print_r($this->input->post('sch_id'));
			$this->Home_model->update_records(array('sch_id'=>$this->input->post('sch_id')),'ad_schedule',array('sch_print_done'=>1));
			redirect('Adverties/finalprintAdvt');
		}

		public function adverties_print()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}

			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'Adverties';
			$data['adv_details'] = $this->Home_model->fetch_details('adv_isDelete=0','ad_adverties');
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0 and pub_com_id ='.$data['user']['com_id'].'','ad_publication');
			$data['all_schedule']= '';
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			// $data['member_details'] = $this->Home_model->fetch_details('member_soc_id='.$data['user']['soc_id'].' AND member_role_id != 2 AND member_name !="" AND member_is_deactive=0','rs_member');
			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/adv_print',$data);
			$this->load->view('Adverties/adv_footer',$data);
		}

		public function final_adverties_print()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}

			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'Adverties';
			$data['adv_details'] = $this->Home_model->fetch_details('adv_isDelete=0','ad_adverties');
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0 and pub_com_id ='.$data['user']['com_id'].'','ad_publication');
			$data['pub_details']= '';
			$data['date_from']= '';
			$data['date_to']= '';
			$data['all_schedule']= '';
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			// $data['member_details'] = $this->Home_model->fetch_details('member_soc_id='.$data['user']['soc_id'].' AND member_role_id != 2 AND member_name !="" AND member_is_deactive=0','rs_member');
			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/final_adv_print',$data);
			$this->load->view('Adverties/adv_footer',$data);
		}

		public function register_adverties()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}

			$data['page'] = 'Adverties';
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0 and pub_com_id = '.$data['user']['com_id'].'','ad_publication');
			$data['all_agent']=$this->Home_model->fetch_details('ag_isDelete=0 and ag_com_id = '.$data['user']['com_id'].' AND (ag_type=1 OR ag_type=2)','ad_agent');
			$data['all_MarketEx']=$this->Home_model->fetch_details('ag_isDelete=0 and ag_com_id = '.$data['user']['com_id'].' AND ag_type=3 ','ad_agent');
			$data['all_client']=$this->Home_model->fetch_details('cl_isDelete=0 and cl_com_id = '.$data['user']['com_id'].'','ad_client');
			

			$data['state_details'] = $this->Home_model->fetch_details('','ad_state');
			$data['city_details'] = $this->Home_model->fetch_details('','ad_cities');
			$data['incharge'] = $this->Home_model->fetch_details('member_role_id=3 AND member_is_deactive=0 and member_com_id='.$data['user']['com_id'].'','ad_member');
			$data['prjHead'] = $this->Home_model->fetch_details('member_role_id=2 AND member_is_deactive=0 and member_com_id='.$data['user']['com_id'].'','ad_member');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/new_adv',$data);
			$this->load->view('Adverties/adv_footer',$data);
		}
		public function getDetails() //for javascript
		{
			$pub = $_POST['pub'];
			$data= $this->db->from('ad_publication')->join('ad_periodicity','pub_periodicity_id = per_id')->where('pub_id='.$pub.' AND pub_isDelete=0')->get()->result_array();
			echo json_encode($data);
		}

		public function getRateSizeDetails()
		{
			$pub = $_POST['pub'];
			$data= $this->db->from('ad_rate')->join('ad_publication','rate_pub_id = pub_id')->join('ad_size','rate_size_id=size_id')->where('rate_pub_id='.$pub.' AND rate_isDelete=0 AND size_isDelete=0 AND rate_approved_status = 1' )->get()->result_array();
			echo json_encode($data);
		}

		public function getSizeDetailsAdv()
		{
			$pub =$this->input->post('pub');
			$size = $this->input->post('size');
			$data=$this->Home_model->fetch_details('rate_isDelete=0 AND rate_pub_id='.$pub.' AND rate_size_id='.$size.'','ad_rate');
			echo json_encode($data);
		}

		public function getInchargeDetails()
		{

			$pub = $_POST['pub'];
			$data= $this->Home_model->fetch_details('(cont_isDeleted=0 AND cont_for_id='.$pub.') AND (cont_for=3 OR cont_for=2)','ad_contact');
			echo json_encode($data);
		}

		public function getClientDetails()
		{
			$client = $_POST['client'];
			$data= $this->Home_model->fetch_details('cl_isDelete=0 AND cl_id='.$client.'','ad_client');
			echo json_encode($data);

		}

		public function getAgentDetails()
		{
			$agent = $_POST['agent'];
			$data= $this->Home_model->fetch_details('ag_isDelete=0 AND ag_id='.$agent.'','ad_agent');
			echo json_encode($data);

		}

		public function putClient()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}else{
				redirect('/');				
			}
			$client['cl_name']= $_POST['cl_name'];
			$client['cl_contact']= $_POST['cl_contact'];
			$client['cl_email']= $_POST['cl_email'];
			$client['cl_country']= 101;
			$client['cl_state']= $_POST['cl_state'];
			$client['cl_city']= $_POST['cl_city'];
			$client['cl_pincode']= $_POST['cl_pincode'];
			$client['cl_address']= $_POST['cl_address'];
			$client['cl_created'] = $data['user']['id'];
			$client['cl_com_id'] = $data['user']['com_id'];
			$this->Home_model->insert_records('ad_client',$client);
			echo json_encode($client);
		}

		public function getClient()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}else{
				redirect('/');				
			}
			$data= $this->Home_model->fetch_details('cl_isDelete=0 and cl_com_id = '.$data['user']['com_id'].'','ad_client');
			echo json_encode($data);
		}

		public function putAgent()
		{
			
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$agent['ag_type']= $_POST['ag_type'];
			$agent['ag_name']= $_POST['ag_name'];
			$agent['ag_contact']= $_POST['ag_contact'];
			$agent['ag_email']= $_POST['ag_email'];
			$agent['ag_country']= 101;
			$agent['ag_state']= $_POST['ag_state'];
			$agent['ag_city']= $_POST['ag_city'];
			$agent['ag_pincode']= $_POST['ag_pincode'];
			$agent['ag_address']= $_POST['ag_address'];
			$agent['ag_created'] = $data['user']['id'];
			$agent['ag_com_id'] = $data['user']['com_id'];
			$this->Home_model->insert_records('ad_agent',$agent);
			echo json_encode($agent);
		}

		public function getAgent()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}else{
				redirect('/');				
			}
			$data= $this->Home_model->fetch_details('ag_isDelete=0 and ag_com_id = '.$data['user']['com_id'].'','ad_agent');
			echo json_encode($data);
		}

		public function insert_Adv()
		{			
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			
			$adv['adv_for'] = $this->input->post('adv_for');
			$adv['adv_pub_id'] = $this->input->post('adv_pub_id');
			$adv['adv_periodicity'] = $this->input->post('adv_periodicity');
			$adv['adv_size_id'] = $this->input->post('adv_size_id');
			$adv['adv_size_height'] = $this->input->post('adv_size_height');
			$adv['adv_size_width'] = $this->input->post('adv_size_width');
			$color_scheme= $this->input->post('adv_color');
			if($color_scheme == 1)
			{
				$adv['adv_print_type'] = 1;
				$adv['adv_color_black'] = $this->input->post('adv_rate');
				$adv['adv_rate'] = 0;
			}
			else
			{
				$adv['adv_print_type'] = 2;
				$adv['adv_color_black'] = 0;
				$adv['adv_rate'] =$this->input->post('adv_rate');
			}
			$adv['adv_adjust_rate']= $this->input->post('adv_final_rate');
			$adv['adv_paid']= $this->input->post('adv_paid');
			$adv['adv_free']= $this->input->post('adv_free');
			$adv['adv_client_id']= $this->input->post('adv_client_name');
			$adv['adv_agent_id']= $this->input->post('adv_agent');
			$adv['adv_agent_comm']= $this->input->post('adv_agent_comm');
			$adv['adv_support_id']= $this->input->post('adv_support');
			$adv['adv_support_comm']= $this->input->post('adv_support_comm');
			$adv['adv_department_head_id']= $this->input->post('adv_department_head_id');
			$adv['adv_incharge_con_id']= $this->input->post('adv_incharge');
			$adv['adv_createby'] = $data['user']['id'];
			$adv['adv_com_id'] = $data['user']['com_id'];
			$adv['adv_created_role_id'] = $data['user']['role_id'];
			$adv['adv_approved_by_id'] = 0;
			$adv['adv_approved_role_id'] = 0;
			$adv['adv_approved_status'] = 2;
			$this->Home_model->insert_records('ad_adverties',$adv);
			$adv_id = $this->db->insert_id();
			$total = $this->input->post('adv_paid') + $this->input->post('adv_free');
			$pub_date = $this->Home_model->fetch_details(array('pub_id' => $adv['adv_pub_id']),'ad_publication');
			// print_r($pub_date);
			for ($i=0; $i < $total; $i++) { 
				// $sch['sch_adv_id'] = 12;
				$sch['sch_adv_id'] = $adv_id;
				$day = date('d',strtotime($this->input->post('sch_date')[$i]));
				$month = date('m',strtotime($this->input->post('sch_date')[$i]));
				$date = '';
				switch ($adv['adv_periodicity']) {
					case '1':
						// echo '1';
						break;
					case '7':
						if ($day >= 1 && $day <= 7) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($day >= 8 && $day <= 14) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($day >= 15 && $day <= 21) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_3'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '4':
						if ($day >= 1 && $day <= 15) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '2':
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						break;
					case '5':
						if ($month >= 1 && $month <= 3) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($month >= 4 && $month <= 6) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($month >= 7 && $month <= 9) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_3'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '6':
						if ($month >= 1 && $month <= 6) {
							$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '3':
						$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						break;
					default:
						# code...
						break;
				}
				$sch['sch_date'] = $date;
				$sch['sch_createdby'] = $data['user']['id'];
				$sch['sch_pub_id'] = $this->input->post('adv_pub_id');
				$this->Home_model->insert_records('ad_schedule',$sch);
			}
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Adverties has been Scheduled."); 
		    $this->session->set_flashdata('type',"success");
			redirect('adverties');

		}

		public function adverties_scheduling()
		{
			$adv_id = $this->uri->segment(2);
			$this->session->set_userdata('advert_rec',$adv_id);
			redirect('advSchedule');
		}

		public function adverties_scheduling_details()
		{
			// print_r($this->session->userdata('advert_rec'));die();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'Adverties';
			$data['adv_details'] = $this->Home_model->fetch_details('adv_isDelete=0 AND adv_id='.$this->session->userdata('advert_rec').'','ad_adverties');
			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/adv_scheduling',$data);
			$this->load->view('Adverties/sch_footer',$data);
		}
		public function adverties_view_details()
		{
			// print_r($this->session->userdata('advert_rec'));die();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'Adverties';
			$data['adv_details'] = $this->Home_model->fetch_details('adv_isDelete=0 AND adv_id='.$this->session->userdata('advert_rec').'','ad_adverties');
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0','ad_publication');
			$data['all_agent']=$this->Home_model->fetch_details('ag_isDelete=0','ad_agent');
			$data['all_client']=$this->Home_model->fetch_details('cl_isDelete=0','ad_client');
			$data['state_details'] = $this->Home_model->fetch_details('','ad_state');
			$data['city_details'] = $this->Home_model->fetch_details('','ad_cities');
			$data['incharge'] = $this->Home_model->fetch_details('cont_role=2 AND cont_isDeleted=0','ad_contact');

			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/adv_view',$data);
			$this->load->view('Adverties/sch_footer',$data);
		}
		public function adverties_view()
		{
			$adv_id = $this->uri->segment(2);
			$this->session->set_userdata('advert_rec',$adv_id);
			redirect('advView');
		}	

		public function adverties_edit()
		{
			$adv_id = $this->uri->segment(2);
			$this->session->set_userdata('advert_rec',$adv_id);
			redirect('editAdv');
		}	

		public function adverties_edit_details()
		{
			// print_r($this->session->userdata('advert_rec'));die();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'Adverties';
			$data['adv_details'] = $this->Home_model->fetch_details('adv_isDelete=0 AND adv_id='.$this->session->userdata('advert_rec').'','ad_adverties');
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0','ad_publication');
			$data['periodicity']=$this->Home_model->fetch_details('per_isDelete= 0','ad_periodicity');
			$data['all_agent']=$this->Home_model->fetch_details('ag_isDelete=0 and ag_com_id = '.$data['user']['com_id'].' AND (ag_type=1 OR ag_type=2)','ad_agent');			
			$data['all_MarketEx']=$this->Home_model->fetch_details('ag_isDelete=0 and ag_com_id = '.$data['user']['com_id'].' AND ag_type=3 ','ad_agent');

			$data['all_client']=$this->Home_model->fetch_details('cl_isDelete=0','ad_client');
			$data['state_details'] = $this->Home_model->fetch_details('','ad_state');
			$data['city_details'] = $this->Home_model->fetch_details('','ad_cities');
			//$data['incharge'] = $this->Home_model->fetch_details('cont_role=2 AND cont_isDeleted=0','ad_contact');
			$data['prjHead'] = $this->Home_model->fetch_details('member_role_id=2 AND member_is_deactive=0 and member_com_id='.$data['user']['com_id'].'','ad_member');
			$data['incharge'] = $this->Home_model->fetch_details('member_role_id=3 AND member_is_deactive=0 and member_com_id='.$data['user']['com_id'].'','ad_member');

			$this->load->view('Home/header',$data);
			$this->load->view('Adverties/edit_adv',$data);
			$this->load->view('Adverties/edit_adv_footer',$data);
		}

		public function edit_adv()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}			elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}else{
				redirect('/');				
			}
			$adv_id = $this->input->post('adv_id');
			$adv['adv_for'] = $this->input->post('adv_for');
			$adv['adv_pub_id'] = $this->input->post('adv_pub_id');
			$adv['adv_periodicity'] = $this->input->post('adv_periodicity');
			$adv['adv_size_id'] = $this->input->post('adv_size_id');
			$adv['adv_size_height'] = $this->input->post('adv_size_height');
			$adv['adv_size_width'] = $this->input->post('adv_size_width');
			$color_scheme= $this->input->post('adv_color');
			if($color_scheme == 1)
			{
				$adv['adv_color_black'] = $this->input->post('adv_rate');
				$adv['adv_rate'] =0;
			}
			else
			{
				$adv['adv_color_black'] = 0;
				$adv['adv_rate'] =$this->input->post('adv_rate');
			}
			$adv['adv_paid']= $this->input->post('adv_paid');
			$adv['adv_free']= $this->input->post('adv_free');
			$adv['adv_client_id']= $this->input->post('adv_client_name');
			$adv['adv_agent_id']= $this->input->post('adv_agent');
			$adv['adv_agent_comm']= $this->input->post('adv_agent_comm');
			$adv['adv_support_id']= $this->input->post('adv_support');
			$adv['adv_support_comm']= $this->input->post('adv_support_comm');
			$adv['adv_department_head_id']= $this->input->post('adv_department_head_id');
			$adv['adv_incharge_con_id']= $this->input->post('adv_incharge');
			$adv['adv_adjust_rate']= $this->input->post('adv_final_rate');
			$adv['adv_createby'] = $data['user']['id'];
			//print_r($adv);die();

			$this->Home_model->update_records('adv_id='.$adv_id.'','ad_adverties',$adv);
			/*$total = $this->input->post('adv_paid') + $this->input->post('adv_free');
			$pub_date = $this->Home_model->fetch_details(array('pub_id' => $adv['adv_pub_id']),'ad_publication');print_r($pub_date);
			 
			for ($i=0; $i < $total; $i++) { 
				$sch['sch_adv_id'] = $adv_id;
				$sch_id=$this->input->post('sch_id')[$i];
				$day = date('d',strtotime($this->input->post('sch_date')[$i]));
				$month = date('m',strtotime($this->input->post('sch_date')[$i]));
				$date = '';
				switch ($adv['adv_periodicity']) {
					case '1':
						// echo '1';
						break;
					case '2':
						if ($day >= 1 && $day <= 7) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($day >= 8 && $day <= 14) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($day >= 15 && $day <= 21) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_3'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '3':
						if ($day >= 1 && $day <= 15) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '4':
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						break;
					case '5':
						if ($month >= 1 && $month <= 3) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($month >= 4 && $month <= 6) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else if ($month >= 7 && $month <= 9) {
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_3'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '6':
						if ($month >= 1 && $month <= 6) {
							$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						}else{
							$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('sch_date')[$i]));
						}
						break;
					case '7':
						$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
						break;
					default:
						# code...
						break;
				}
				$sch['sch_date'] = $date;				
				$sch['sch_createdby'] = $data['user']['id'];

				$this->Home_model->update_records('sch_id='.$sch_id.'','ad_schedule',$sch);
			}*/
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Adverties has been Updated."); 
		    $this->session->set_flashdata('type',"success");
			redirect('adverties');

		}

		public function approve_Adverties()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}else{
				redirect('/');				
			}
			$adv_id = $this->input->post('approve_advert_id');
			$adv['adv_approved_by_id'] = $data['user']['id'];
			$adv['adv_approved_status'] = 1;
			$adv['adv_approved_role_id'] = $data['user']['role_id'];
			$sch['sch_approved_by_id'] = $data['user']['id'];
			$sch['sch_approved_status'] = 1;
			$sch['sch_approved_role_id'] = $data['user']['role_id'];
			$data= $this->Home_model->update_records('adv_id='.$adv_id.'','ad_adverties',$adv);
			$data= $this->Home_model->update_records('sch_adv_id='.$adv_id.'','ad_schedule',$sch);
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Adverties has been Approved."); 
		    $this->session->set_flashdata('type',"success");
			redirect('adverties');
		}

		public function reschedule_Adverties()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}else{
				redirect('/');				
			}
			$sch_id = $this->input->post('reSch_id');
			$record = $this->Home_model->fetch_details(array('sch_id'=>$sch_id),'ad_schedule');
			$pub_date = $this->Home_model->fetch_details(array('pub_id'=>$record[0]['sch_pub_id']),'ad_publication');
			$sch['sch_oldSch_date'] = $record[0]['sch_date'];
			$day = date('d',strtotime($this->input->post('reSch_date')));
			$month = date('m',strtotime($this->input->post('reSch_date')));
			$date = '';
			switch ($pub_date[0]['pub_periodicity_id']) {
				case '1':
					// echo '1';
					break;
				case '7':
					if ($day >= 1 && $day <= 7) {
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('reSch_date')));
					}else if ($day >= 8 && $day <= 14) {
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('reSch_date')));
					}else if ($day >= 15 && $day <= 21) {
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('reSch_date')));
					}else{
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_3'])).'',strtotime($this->input->post('reSch_date')));
					}
					break;
				case '4':
					if ($day >= 1 && $day <= 15) {
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('reSch_date')));
					}else{
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('reSch_date')));
					}
					break;
				case '2':
					$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('reSch_date')));
					break;
				case '5':
					if ($month >= 1 && $month <= 3) {
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('reSch_date')));
					}else if ($month >= 4 && $month <= 6) {
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_1'])).'',strtotime($this->input->post('reSch_date')));
					}else if ($month >= 7 && $month <= 9) {
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('reSch_date')));
					}else{
						$date = date('Y-m-'.date('d',strtotime($pub_date[0]['pub_publish_date_3'])).'',strtotime($this->input->post('reSch_date')));
					}
					break;
				case '6':
					if ($month >= 1 && $month <= 6) {
						$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('reSch_date')));
					}else{
						$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date_2'])).'',strtotime($this->input->post('reSch_date')));
					}
					break;
				case '3':
					$date = date('Y-'.date('m',strtotime($pub_date[0]['pub_publish_date'])).'-'.date('d',strtotime($pub_date[0]['pub_publish_date'])).'',strtotime($this->input->post('sch_date')[$i]));
					break;
				default:
					# code...
					break;
			}
			$sch['sch_date'] = $date;
			$data= $this->Home_model->update_records('sch_id='.$sch_id.'','ad_schedule',$sch);
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Adverties has been Reschedule."); 
		    $this->session->set_flashdata('type',"success");
			redirect('adverties');
		}

	}
?>