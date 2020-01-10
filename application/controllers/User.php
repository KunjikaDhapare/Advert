<?php 
	defined('BASEPATH') OR exit('No direct script accept allowed');

	class User extends CI_Controller
	{	
		function __construct()
		{
			parent::__construct();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}
			else{
				redirect('/');				
			}
		}

		public function user_details()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
				$data['user_deatils']=$this->Home_model->fetch_details('member_is_deactive=0 and member_role_id != 1','ad_member');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
				$data['user_deatils']=$this->Home_model->fetch_details('member_is_deactive=0 and member_com_id = '.$data['user']['com_id'].' and member_role_id NOT IN (1,5)','ad_member');
			}
			else{
				redirect('/');				
			}
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'User';
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$this->load->view('Home/header',$data);
			$this->load->view('User/user_details',$data);
			$this->load->view('User/user_footer',$data);
		}

		public function new_user()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
				$data['user_role'] = $this->Home_model->fetch_details('id NOT IN(1) and valid_id= 1','ad_user_role');
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0','ad_company');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
				$data['user_role'] = $this->Home_model->fetch_details('id NOT IN(1,5) and valid_id= 1','ad_user_role');
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0 and com_id='.$data['user']['com_id'].'','ad_company');
			}
			else{
				redirect('/');				
			}
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$where = 'ct_id IN (2763,5742)';
			$data['state'] = '22';
			$data['page'] = 'User';
			$this->load->view('Home/header',$data);
			$this->load->view('User/new_user',$data);
			$this->load->view('User/user_footer',$data);
		}

		public function update_reg_user(){
			$user_id = $this->uri->segment(2);
			$this->session->set_userdata('updateUserRe',$user_id);
			redirect('updateUserRecord');
		}

		public function update_user()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
				$data['user_role'] = $this->Home_model->fetch_details('id NOT IN(1) and valid_id= 1','ad_user_role');
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0','ad_company');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
				$data['user_role'] = $this->Home_model->fetch_details('id NOT IN(1,5) and valid_id= 1','ad_user_role');
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0 and com_id='.$data['user']['com_id'].'','ad_company');
			}
			else{
				redirect('/');				
			}
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$data['user_details'] = $this->Home_model->fetch_details('member_id='.$this->session->userdata('updateUserRe').' AND  member_is_deactive=0','ad_member');
			$where = 'ct_id IN (2763,5742)';
			$data['state'] = '22';
			$data['page'] = 'User';
			$this->load->view('Home/header',$data);
			$this->load->view('User/update_user',$data);
			$this->load->view('User/user_footer',$data);
		}

		public function save_user()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}
			else{
				redirect('/');				
			}
			if($_POST['member_password']== $_POST['member_re_password']){
				$user_d['member_name']= $_POST['member_name'];
				$user_d['member_email']= $_POST['member_email'];
				$user_d['member_mobile']= $_POST['member_mobile'];
			//	$user_d['member_username']= $_POST['member_username'];
				$user_d['member_role_id']= $_POST['member_role_id'];
				$user_d['member_createdby']=  $data['user']['id'];
				$user_d['member_com_id']=  $_POST['member_com_id'];
				$password = $_POST['member_password'];;
				$user_d['member_salt'] = $this->Home_model->salt(32);
				$user_d['member_password'] = $this->Home_model->make($password.$user_d['member_salt']);
				//print_r($user_d);
				$this->Home_model->insert_records('ad_member',$user_d);
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Thank You.");
		        $this->session->set_flashdata('text',"User has been created successfully."); 
		        $this->session->set_flashdata('type',"success");
				redirect('user');

			}
			else
			{
				$this->session->set_flashdata('active',1);
		        $this->session->set_flashdata('title',"Re-enter password incorrect.");
		        $this->session->set_flashdata('text',"Password and re-enter password does not match."); 
		        $this->session->set_flashdata('type',"warning");
		        redirect('newUser');
			}
		}

		public function update_save_user()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['comAdmin'])){
				$data['user'] = $this->session->userdata('comAdmin');
			}
			else{
				redirect('/');				
			}
			$member_id = $_POST['member_id'];
			if($_POST['member_password'] == $_POST['member_re_password'] && !empty($_POST['member_password'])){				
				$password = $_POST['member_password'];;
				$user_d['member_salt'] = $this->Home_model->salt(32);
				$user_d['member_password'] = $this->Home_model->make($password.$user_d['member_salt']);
			}
			$user_d['member_name']= $_POST['member_name'];
			$user_d['member_email']= $_POST['member_email'];
			$user_d['member_mobile']= $_POST['member_mobile'];
			$user_d['member_role_id']= $_POST['member_role_id'];
			$user_d['member_com_id']=  $_POST['member_com_id'];
			// print_r($user_d);die();
			$this->Home_model->update_records(array('member_id'=>$member_id),'ad_member',$user_d);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Thank You.");
	        $this->session->set_flashdata('text',"User has been updated successfully."); 
	        $this->session->set_flashdata('type',"success");
			redirect('user');
		}

		public function disable_user()
		{
			$member_id = $_POST['member_id'];
			// echo $com_id;
			$data= $this->Home_model->update_records('member_id='.$member_id.'','ad_member',array('member_is_deactive'=>1));
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"User has been Deleted"); 
		    $this->session->set_flashdata('type',"success");
			redirect('user');
		}

		public function getUserDetails()
		{			
			$user_id = $_POST['user_id'];
			$data = $this->db->query("SELECT * FROM `ad_member` where member_id = '21' and member_is_deactive = 0")->result_array();
			echo json_encode($data);
		}
	}
?> 

