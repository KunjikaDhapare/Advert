<?php 
	defined('BASEPATH') OR exit ('No direct script access allowed.');

	class Home extends CI_Controller
	{
		public function index()
		{
			$data['error'] = $this->session->flashdata('error');
			$data['success'] = $this->session->flashdata('success');
			$data['Disabled'] = $this->session->flashdata('Disabled');
			$this->load->view('Home/login',$data);
		}

		public function dashboard()
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
			$data['error'] = $this->session->flashdata('error');
			$data['success'] = $this->session->flashdata('success');
			$data['Disabled'] = $this->session->flashdata('Disabled');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$data['publication_details'] = $this->Home_model->total_records_count('pub_com_id='.$data['user']['com_id'].' AND  pub_isDelete=0','ad_publication');
			$data['agent_details'] = $this->Home_model->total_records_count('ag_com_id='.$data['user']['com_id'].' AND  ag_isDelete=0','ad_agent');
			$data['adverties_details'] = $this->Home_model->total_records_count('adv_com_id='.$data['user']['com_id'].' AND  adv_isDelete=0','ad_adverties');
			$data['client_details'] = $this->Home_model->total_records_count('cl_com_id='.$data['user']['com_id'].' AND  cl_isDelete=0','ad_client');
			// print_r($data['publication_details']);die();
			$data['page'] = 'dashboard';
			$this->load->view('Home/header',$data);
			$this->load->view('Home/homepage',$data);
			$this->load->view('Home/footer',$data);
		}

		public function login_check()
		{
			$this->form_validation->set_rules('user_email','trim|required');
			$this->form_validation->set_rules('user_password','password','trim|required');

			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error','Please enter the details.');
				redirect('/');

			}else{
				$data['username'] = $this->input->post('user_email');
				$data['password'] =  $this->input->post('user_password');
				$log_check = $this->Home_model->login_check($data);
				// print_r($log_check);die();
				if($log_check == 1){
					$this->session->set_flashdata('error','Username is not register with us.');
				}elseif($log_check == 2){
					// $this->session->set_userdata('username',$data['username']);
					$this->session->set_flashdata('error','Please enter correct password.');
				}elseif($log_check == 3){
					// $this->session->set_userdata('username',$data['username']);
					$this->session->set_flashdata('error','Society Not Approved.. Please contact for admin.');
				}
				redirect('/');
			}
		}

		public function log_out()
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
			}
			$this->Home_model->logout_user($data);			
		}

		public function forgot_password()
		{
			$data['error'] = $this->session->flashdata('error');
			$data['success'] = $this->session->flashdata('success');
			$data['Disabled'] = $this->session->flashdata('Disabled');
			$this->load->view('Home/forgot_password',$data);
		}

		public function update_password()
		{
			$this->form_validation->set_rules('user_email','trim|required');
			$this->form_validation->set_rules('user_password','password','trim|required');

			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error','Please enter the details.');
				redirect('forgotPasaword');
			}else{
				$data['username'] = $this->input->post('user_email');
				$data['password'] =  $this->input->post('user_password');
				$log_check = $this->Home_model->update_password($data);
				if($log_check == 1){
					$this->session->set_flashdata('error','Username is not register with us.');
				}elseif($log_check == 2){
					$this->session->set_flashdata('error','Please enter correct password.');
				}
				redirect('forgotPasaword');
			}
		}

		public function change_pwd()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['socAdmin'])){
				$data['user'] = $this->session->userdata('socAdmin');
			}elseif(isset($this->session->userdata['flatOwner'])){
				$data['user'] = $this->session->userdata('flatOwner');
			}elseif(isset($this->session->userdata['socChairman'])){
				$data['user'] = $this->session->userdata('socChairman');
			}else{
				redirect('/');				
			}
			$data['member'] = $this->Home_model->fetch_details(array('member_id'=>$data['user']['id']),'bl_member');
			$data['page'] = 'dashboard';
			$this->load->view('Home/header',$data);
			$this->load->view('Home/change_pwd',$data);
			$this->load->view('Home/footer',$data);
		}

		public function update_pwd()
		{
			$user['member_email'] = $this->input->post('member_email');
			$password = $this->input->post('member_password');
			$user['member_salt'] = $this->Home_model->salt(32); 
			$user['member_password'] =$this->Home_model->make($password.$user['member_salt']); 
			$this->db->where('member_email',$user['member_email'])->update('bl_member',$user);
			$this->session->set_flashdata('active',1);
	        $this->session->set_flashdata('title',"Thank You.");
	        $this->session->set_flashdata('text',"Member password Updated Successfully."); 
	        $this->session->set_flashdata('type',"success");
	        redirect('Dashboard');
		}

		
		public function ajax_upload()
		{
			if(isset($this->session->userdata['socAdmin'])){
				$data['user'] = $this->session->userdata('socAdmin');
			}elseif(isset($this->session->userdata['flatOwner'])){
				$data['user'] = $this->session->userdata('flatOwner');
			}
			if($_FILES["file"]["name"]){
				$test =explode(".", $_FILES['file']['name']);
				$extension = end($test);
				$name =$data['user']['id'] . '.' . $extension;
				$location = $_SERVER['DOCUMENT_ROOT'] .'/Colonia/assets/images/'.$name;
				move_uploaded_file($_FILES['file']['tmp_name'], $location);
				$this->Home_model->update_records('member_id='.$data['user']['id'].'','bl_member',array('member_photo_link'=>''.base_url().'/assets/images/'.$name.''));
				echo '<img src="'.base_url().'/assets/images/'.$name.'" class="image-responsive" style="width: 12%;border-radius: 63%;border: 1px solid black;"/>';
			}
		}
	}
?>