<?php 
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Publication extends CI_Controller
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
			}elseif(isset($this->session->userdata['offExe'])){
				$data['user'] = $this->session->userdata('offExe');
			}else{
				redirect('/');				
			}
		}

		public function publication_details()
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
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'publication';
			//print_r($data['user']['com_id']);die();
			if($data['user']['com_id']== 0)
			{
				$data['publication_details'] = $this->Home_model->fetch_details('pub_isDelete=0 ','ad_publication');
			}
			else
			{
				$data['publication_details'] = $this->Home_model->fetch_details('pub_isDelete=0 AND pub_com_id='.$data['user']['com_id'].'','ad_publication');
			}
			$data['periodicity'] = $this->Home_model->fetch_details('per_isDelete=0','ad_periodicity');
			$data['contact'] = $this->Home_model->fetch_details('cont_isDeleted=0 AND cont_for=3 AND cont_role=2','ad_contact');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			$data['pub_size_type']=$this->Home_model->fetch_details('size_type_isDelete= 0','ad_size_type');
			$this->load->view('Home/header',$data);
			$this->load->view('Publication/publication_details',$data);
			$this->load->view('Publication/publication_footer',$data);
		}

		public function register_publication()
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
			$data['page'] = 'publication';
			$user_id= $data['user']['id'];
			if($data['user']['com_id']== 0)
			{
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0','ad_company');
			}
			else
			{
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0 AND com_com_id='.$data['user']['com_id'].'','ad_company');
			}
			
			
			$data['size_type']=$this->Home_model->fetch_details('size_type_isDelete=0','ad_size_type');

			$data['state_details'] = $this->Home_model->fetch_details('','ad_state');
			$data['city_details'] = $this->Home_model->fetch_details('','ad_cities');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
			//print_r($data['all_com']);

			$data['periodicity']=$this->Home_model->fetch_details('per_isDelete= 0','ad_periodicity');
			
			$this->load->view('Home/header',$data);
			$this->load->view('Publication/new_publication',$data);
			$this->load->view('Publication/publication_footer',$data);
		}

		public function new_publication() // insert into db
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
			$pub['pub_name'] = $this->input->post('pub_name');
			$pub['pub_reg_no'] = $this->input->post('pub_reg');
			$pub['pub_com_id'] = $data['user']['com_id'];
			$pub['pub_contact'] = $this->input->post('pub_contact');
			$pub['pub_email'] = $this->input->post('pub_email');
			$pub['pub_website'] = $this->input->post('pub_website');
			$pub['pub_country'] = 101;
			$pub['pub_state'] = $this->input->post('pub_state');
			$pub['pub_city'] = $this->input->post('pub_city');
			$pub['pub_pincode'] = $this->input->post('pub_pincode');
			$pub['pub_code'] = strtoupper($this->input->post('pub_code'));
			$pub['pub_size_type'] = $this->input->post('pub_size_type');
			$pub['pub_actual_height'] = $this->input->post('pub_actual_height');
			$pub['pub_actual_width'] = $this->input->post('pub_actual_width');
			$pub['pub_print_height'] = $this->input->post('pub_print_height');
			$pub['pub_print_width'] = $this->input->post('pub_print_width');
			$pub['pub_periodicity_id'] = $this->input->post('pub_periodicity_id');
			$pub['pub_address'] = $this->input->post('pub_address');
			$pub['pub_createdby'] = $data['user']['id'];
			$pub['pub_created_role_id'] = $data['user']['role_id'];
			$pub['pub_approve_status'] = 2;
			$pub['pub_approve_by_id'] = 0;
		
			if(!empty($this->input->post('pub_publish_date')))
				$pub['pub_publish_date'] = $this->input->post('pub_publish_date');
			if(!empty($this->input->post('pub_publish_date_1')))
				$pub['pub_publish_date_1'] = $this->input->post('pub_publish_date_1');
			if(!empty($this->input->post('pub_publish_date_2')))
				$pub['pub_publish_date_2'] = $this->input->post('pub_publish_date_2');
			if(!empty($this->input->post('pub_publish_date_3')))
				$pub['pub_publish_date_3'] = $this->input->post('pub_publish_date_3');
			if(!empty($this->input->post('pub_publish_date_4')))
				$pub['pub_publish_date_4'] = $this->input->post('pub_publish_date_4');

			$this->Home_model->insert_records('ad_publication',$pub);
			$id= $this->db->insert_id();
			$contact1['cont_name']=$this->input->post('member_name1');
			$contact1['cont_mobile']=$this->input->post('member_mobile1');
			$contact1['cont_email']=$this->input->post('member_email1');
			$contact1['cont_for']=3;
			$contact1['cont_role']=1;	//publisher		
			$contact1['cont_for_id']=$id;
			$this->Home_model->insert_records('ad_contact',$contact1);
			if($this->input->post('member_name2'))
			{
				$contact2['cont_name']=$this->input->post('member_name2');
				$contact2['cont_mobile']=$this->input->post('member_mobile2');
				$contact2['cont_email']=$this->input->post('member_email2');
				$contact2['cont_com_id']=$data['user']['com_id'];
				$contact2['cont_for']=3;
				$contact2['cont_role']=2; //incharge
				$contact2['cont_for_id']=$id;
				$this->Home_model->insert_records('ad_contact',$contact2);
			}
			redirect('publication');
		}
		public function getCity()
		{
			$state = $_POST['state'];
			$data=$this->Home_model->fetch_details('st_id='.$state.'','ad_cities');
			echo json_encode($data);
		}

		public function edit_pub()
		{
			$pub_id = $this->uri->segment(2);
			$this->session->set_userdata('advert_rec',$pub_id);
			redirect('editPub');
		}	

		public function edit_publication() // insert into db
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
			$data['page'] = 'publication';
			$user_id= $data['user']['id'];
			if($data['user']['com_id'] == 0)
			{
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0','ad_company');
			}
			else
			{
				$data['all_com']=$this->Home_model->fetch_details('com_isDelete=0 AND com_com_id='.$data['user']['com_id'].'','ad_company');
			}
			$data['publication']=$this->Home_model->fetch_details('pub_isDelete=0 AND pub_id='.$this->session->userdata('advert_rec').'','ad_publication');
			$data['publisher']=$this->Home_model->fetch_details('cont_for=3 AND cont_role=1 AND cont_for_id='.$this->session->userdata('advert_rec').'','ad_contact');
			$data['incharge']=$this->Home_model->fetch_details('cont_for=3 AND cont_role=2 AND cont_for_id='.$this->session->userdata('advert_rec').'','ad_contact');
			$data['company_details'] = $this->Home_model->fetch_details('com_createdby='.$data['user']['com_id'].' AND  com_isDelete=0','ad_company');
				//print_r($this->db->last_query()); die();
			$data['size_type']=$this->Home_model->fetch_details('size_type_isDelete=0','ad_size_type');
			$data['state_details'] = $this->Home_model->fetch_details('','ad_state');
			$data['city_details'] = $this->Home_model->fetch_details('','ad_cities');
			//print_r($data['all_com']);

			$data['periodicity']=$this->Home_model->fetch_details('per_isDelete= 0','ad_periodicity');
			
			$this->load->view('Home/header',$data);
			$this->load->view('Publication/edit_publication',$data);
			$this->load->view('Publication/publication_footer',$data);
		}

		public function update_publication() // insert into db
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
			$pub['pub_id'] = $this->input->post('pub_id');
			$pub['pub_name'] = $this->input->post('pub_name');
			$pub['pub_reg_no'] = $this->input->post('pub_reg');
			$pub['pub_com_id'] = $data['user']['com_id'];
			$pub['pub_contact'] = $this->input->post('pub_contact');
			$pub['pub_email'] = $this->input->post('pub_email');
			$pub['pub_website'] = $this->input->post('pub_website');
			$pub['pub_country'] = 101;
			$pub['pub_state'] = $this->input->post('pub_state');
			$pub['pub_city'] = $this->input->post('pub_city');
			$pub['pub_pincode'] = $this->input->post('pub_pincode');
			$pub['pub_code'] = strtoupper($this->input->post('pub_code'));
			$pub['pub_size_type'] = $this->input->post('pub_size_type');
			$pub['pub_actual_height'] = $this->input->post('pub_actual_height');
			$pub['pub_actual_width'] = $this->input->post('pub_actual_width');
			$pub['pub_print_height'] = $this->input->post('pub_print_height');
			$pub['pub_print_width'] = $this->input->post('pub_print_width');
			$pub['pub_periodicity_id'] = $this->input->post('pub_periodicity_id');
			$pub['pub_address'] = $this->input->post('pub_address');
			$pub['pub_createdby'] = $data['user']['id'];


			//$data= $this->Home_model->update_records('rate_id='.$rate_id.'','ad_rate',array('rate_isDelete'=>1));
		
			if(!($this->input->post('pub_publish_date')))
				$pub['pub_publish_date'] = $this->input->post('pub_publish_date');
			if(!($this->input->post('pub_publish_date_1')))
				$pub['pub_publish_date_1'] = $this->input->post('pub_publish_date_1');
			if(!($this->input->post('pub_publish_date_2')))
				$pub['pub_publish_date_2'] = $this->input->post('pub_publish_date_2');
			if(!($this->input->post('pub_publish_date_3')))
				$pub['pub_publish_date_3'] = $this->input->post('pub_publish_date_3');
			if(!($this->input->post('pub_publish_date_4')))
				$pub['pub_publish_date_4'] = $this->input->post('pub_publish_date_4');

			$this->Home_model->update_records('pub_id='.$pub['pub_id'].'','ad_publication',$pub);
			//$id= $this->db->insert_id();
			$contact1['cont_id']=$this->input->post('member_id1');
			$contact1['cont_name']=$this->input->post('member_name1');
			$contact1['cont_mobile']=$this->input->post('member_mobile1');
			$contact1['cont_email']=$this->input->post('member_email1');
			$contact1['cont_for']=3;
			$contact1['cont_role']=1;	//publisher		
			$contact1['cont_for_id']=$pub['pub_id'] ;
			$this->Home_model->update_records('cont_id='.$contact1['cont_id'].'','ad_contact',$contact1);
			if($this->input->post('member_name2'))
			{
				$contact2['cont_id']=$this->input->post('member_id2');
				$contact2['cont_name']=$this->input->post('member_name2');
				$contact2['cont_mobile']=$this->input->post('member_mobile2');
				$contact2['cont_email']=$this->input->post('member_email2');
				$contact2['cont_com_id']=$data['user']['com_id'];
				$contact2['cont_for']=3;
				$contact2['cont_role']=2; //incharge
				$contact2['cont_for_id']=$pub['pub_id'] ;
				$this->Home_model->update_records('cont_id='.$contact2['cont_id'].'','ad_contact',$contact2);
			}
			redirect('publication');
		}
      public function disable_pub()
		{
			$pub_id = $_POST['pub_id'];
			echo $pub_id;
			$data= $this->Home_model->update_records('pub_id='.$pub_id.'','ad_publication',array('pub_isDelete'=>1));
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Publication has been deleted."); 
		    $this->session->set_flashdata('type',"success");
			redirect('publication');

		}

	}
?>