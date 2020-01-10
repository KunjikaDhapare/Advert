<?php 
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Masters extends CI_Controller
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
		

		
		public function size_record()
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
			$data['all_size']=$this->Home_model->fetch_details('size_isDelete=0','ad_size');
			$data['page'] = 'publication';
			$this->load->view('Home/header',$data);
			$this->load->view('Masters/size_details',$data);
			$this->load->view('Masters/masters_footer.php',$data);
		}

		public function size()
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
			$data['page'] = 'publication';
			$data['all_pub_size']=$this->Home_model->fetch_details('','ad_size_type');
			$this->load->view('Home/header',$data);
			$this->load->view('Masters/size',$data);
			$this->load->view('Masters/masters_footer.php',$data);
		}

		public function new_size() // insert into db
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
			$size['size_name'] = $this->input->post('size_type_name');
			$size['size_createdby'] = $data['user']['id'];
			$this->Home_model->insert_records('ad_size',$size);
			redirect('sizeDetails');
		}

		public function periodicity_record()
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

			$data['all_per']=$this->Home_model->fetch_details('per_isDelete=0','ad_periodicity');
			$data['page'] = 'publication';
			$this->load->view('Home/header',$data);
			$this->load->view('Masters/periodicity_details',$data);
			$this->load->view('Masters/masters_footer.php',$data);
		}
		public function periodicity()
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

			$data['page'] = 'publication';
			//$data['all_per']=$this->Home_model->fetch_details('','ad_periodicity');
			$this->load->view('Home/header',$data);
			$this->load->view('Masters/periodicity',$data);
			$this->load->view('Masters/masters_footer.php',$data);
		}

		public function new_periodicity() // insert into db
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
			
			$size['per_name'] = $this->input->post('per_name');
			//$size['size_type'] = $this->input->post('pub_size_id');
			$size['per_createdby'] = $data['user']['id'];
			$this->Home_model->insert_records('ad_periodicity',$size);
			redirect('periodicityDetails');
			//print_r($this->input->post('per_name'));

		}

		
	}
?>