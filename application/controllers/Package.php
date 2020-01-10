<?php 
	defined('BASEPATH') OR exit('direct script access not allowed');
	
	class Package extends CI_Controller
	{		
		function __construct()
		{
			parent::__construct();
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}else{
				redirect('/');				
			}
		}

		public function package_details()
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['flatOwner'])){
				$data['user'] = $this->session->userdata('flatOwner');
			}
			$data['flash']['active'] = $this->session->flashdata('active');
	    	$data['flash']['title'] = $this->session->flashdata('title');
	    	$data['flash']['text'] = $this->session->flashdata('text');
	    	$data['flash']['type'] = $this->session->flashdata('type');
			$data['page'] = 'publication';
			$id=$data['user']['id'];
			$data['package_details'] = $this->Home_model->fetch_details('pk_createdby='.$id.' AND  pk_isDelete=0','ad_package');
			// $data['member_details'] = $this->Home_model->fetch_details('member_soc_id='.$data['user']['soc_id'].' AND member_role_id != 2 AND member_name !="" AND member_is_deactive=0','rs_member');
			$this->load->view('Home/header',$data);
			$this->load->view('Package/package_details',$data);
			$this->load->view('Package/package_footer',$data);
		}

		public function create_package()
		{
			//echo "<a href='".$society->website."' target='_blank'>'".$society->website."'</a>";
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['flatOwner'])){
				$data['user'] = $this->session->userdata('flatOwner');
			}
			$data['all_pub']=$this->Home_model->fetch_details('pub_isDelete=0','ad_publication');
			
			$data['page'] = 'publication';
			$this->load->view('Home/header',$data);
			$this->load->view('Package/new_package',$data);
			$this->load->view('Package/package_footer',$data);
		}
		public function getDetails() //for javascript
		{
			$pub = $_POST['pub'];
			$data= $this->db->from('ad_publication')->join('ad_periodicity','pub_periodicity_id = per_id')->where('pub_id='.$pub.' AND pub_isDelete=0')->get()->result_array(); 
			
			echo json_encode($data);
		}

			public function pacakge_insert() // insert into db
		{
			if(isset($this->session->userdata['mainAdmin'])){
				$data['user'] = $this->session->userdata('mainAdmin');
			}elseif(isset($this->session->userdata['flatOwner'])){
				$data['user'] = $this->session->userdata('flatOwner');
			}
			
			$package['pk_name'] = $this->input->post('pk_name');
			$package['pk_pub_id'] = $this->input->post('pk_pub_id');
			$package['pk_paid_adv'] = $this->input->post('pk_paid_adv');
			$package['pk_free_adv'] = $this->input->post('pk_free_adv');
			$package['pk_createdby'] = $data['user']['id'];
			$package['pk_com_id'] = $data['user']['id'];

			print_r($package);
			$this->Home_model->insert_records('ad_package',$package);
			$id= $this->db->insert_id();

			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Package has been Created."); 
		    $this->session->set_flashdata('type',"sucess");
			redirect('package');

			//redirect('company');
			//print_r($this->input->post('per_name'));

		}

		public function disable_package()
		{
			$pk_id = $this->input->post('pk_id');
			$data= $this->Home_model->update_records('pk_id='.$pk_id.'','ad_package',array('pk_isDelete'=>1));
			$this->session->set_flashdata('active',1);
		    $this->session->set_flashdata('title',"Thank You.");
		    $this->session->set_flashdata('text',"Package has been Deleted."); 
		    $this->session->set_flashdata('type',"sucess");
			redirect('package');

		}

	}
?>