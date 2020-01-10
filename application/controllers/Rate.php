<?php 
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Rate extends CI_Controller
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

		public function rate_record()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['all_rate']=$this->Home_model->fetch_details('rate_isDelete = 0','ad_rate');
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
				$data['all_rate']=$this->Home_model->fetch_details('rate_com_id = '.$data['user']['com_id'].' and rate_isDelete = 0','ad_rate');
			}elseif(isset($this->session->userdata['prjHead'])){
				$data['user'] = $this->session->userdata('prjHead');
				$data['all_rate']=$this->Home_model->fetch_details('rate_com_id = '.$data['user']['com_id'].' and rate_isDelete = 0','ad_rate');
			}elseif(isset($this->session->userdata['pubIncharge'])){
				$data['user'] = $this->session->userdata('pubIncharge');
				$data['all_rate']=$this->Home_model->fetch_details('rate_com_id = '.$data['user']['com_id'].' and rate_isDelete = 0','ad_rate');
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
				$data['all_rate']=$this->Home_model->fetch_details('rate_com_id = '.$data['user']['com_id'].' and rate_isDelete = 0','ad_rate');
			}else{
				redirect('/');				
			}

			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');

			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$data['page'] = 'publication';
			$this->load->view('Home/header',$data);
			$this->load->view('Rate/rate_details',$data);
			$this->load->view('Rate/rate_footer.php',$data);
		}

		public function new_rate()
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

			$data['all_size']=$this->Home_model->fetch_details('size_isDelete=0','ad_size');
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0 and pub_com_id = '.$data['user']['com_id'].'','ad_publication');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$data['page'] = 'publication';
			$this->load->view('Home/header',$data);
			$this->load->view('Rate/rate',$data);
			$this->load->view('Rate/rate_footer.php',$data);
		}
	
		public function insert_rate() // insert into db
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
			

			$pub = $_POST['rate_pub_id'];
			$size = $_POST['rate_size_id'];

			$data1= $this->Home_model->fetch_details('pub_id='.$pub.' AND pub_isDelete=0','ad_publication');

			foreach ($data1 as $key) {
				$com=$key['pub_com_id'];
			}

			$data2= $this->Home_model->fetch_details('rate_pub_id='.$pub.' AND rate_size_id='.$size.' AND rate_isDelete=0','ad_rate');
			if(empty($data2))
			{
				$rate['rate_size_id'] = $this->input->post('rate_size_id');
				$rate['rate_size_height'] = $this->input->post('rate_size_height');
				$rate['rate_size_width'] = $this->input->post('rate_size_width');
				$rate['rate_colour'] = $this->input->post('rate_colour');
				$rate['rate_blank_white'] = $this->input->post('rate_blank_white');
				$rate['rate_com_id'] = $com;
				$rate['rate_pub_id'] = $this->input->post('rate_pub_id');
				$rate['rate_createby'] = $data['user']['id'];
				$rate['rate_created_role_id'] = $data['user']['role_id'];
				$rate['rate_approved_by_id'] = 0;
				$rate['rate_approved_status'] = 2;
				$this->Home_model->insert_records('ad_rate',$rate);
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Thank You.");
		        $this->session->set_flashdata('text',"Rate has been Submitted."); 
		        $this->session->set_flashdata('type',"sucess");
				redirect('rateDetails');
			}
			else{
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Already publication rate defined.");
		        $this->session->set_flashdata('text',"Publication rate with size already submitted. if new rate define then deactivated first."); 
		        $this->session->set_flashdata('type',"warning");
		        redirect('newRate');
			}
		}

		public function disable_rate()
		{
			$rate_id = $_POST['rate_id'];
			$data= $this->Home_model->update_records('rate_id='.$rate_id.'','ad_rate',array('rate_isDelete'=>1));
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Rate has been Submitted."); 
		    $this->session->set_flashdata('type',"sucess");
			redirect('rateDetails');

		}

		public function approve_rate()
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
			$rate_id = $this->input->post('approve_rate_id');
			$rate['rate_approved_by_id'] = $data['user']['id'];
			$rate['rate_approved_status'] = 1;
			$rate['rate_approved_role_id'] = $data['user']['role_id'];
			$data= $this->Home_model->update_records('rate_id='.$rate_id.'','ad_rate',$rate);
			// print_r($rate);die();
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Rate has been Approved."); 
		    $this->session->set_flashdata('type',"success");
			redirect('rateDetails');
		}

		public function getDimension() //for javascript
		{
			$size = $_POST['size'];
			$pub = $_POST['pub'];
			$data= $this->Home_model->fetch_details('pub_id='.$pub.' AND pub_isDelete=0','ad_publication');
			echo json_encode($data);
		}

		
	}
?>