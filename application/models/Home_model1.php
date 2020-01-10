<?php 
	/**
	 * ]
	 */
	class Home_model extends CI_Model
	{
		public function login_check($data)
		{
			$login = $this->db->select('*')->where('member_email',$data['username'])->where('member_is_deactive',0)->get('ad_member')->result_array();
			echo "<pre>";
			if(empty($login)){
				return 1;
			}elseif($login[0]['member_password'] == $this->make($data['password'].$login[0]['member_salt'])){
			// print_r($login);die();
				$user['id'] = $login[0]['member_id'];
				//$user['com_id'] = $login[0]['member_com_id'];
				$user['role_id'] = $login[0]['member_role_id'];
				$user['com_id'] = $login[0]['member_com_id'];
				/*if($user['role_id'] == 1){
					$user['com_id'] = 0;
				}else{
					$user['com_id'] = $login[0]['member_com_id'];
				}*/
				// print_r($user);die();
				if($user['role_id'] == '1'){
					$this->db->insert('ad_user_session',['user_id'=>$login[0]['member_id'],'com_id'=>$login[0]['member_com_id'],'hash'=>$this->unique(),'islogedinn'=>1]);
					$this->session->set_userdata('mainAdmin',$user);
					redirect('Dashboard');
				}elseif($user['role_id'] == '2'){
					$this->db->insert('ad_user_session',['user_id'=>$login[0]['member_id'],'com_id'=>$login[0]['member_com_id'],'hash'=>$this->unique(),'islogedinn'=>1]);
					$this->session->set_userdata('prjHead',$user);
					redirect('Dashboard');
				}elseif($user['role_id'] == '3'){
					$this->db->insert('ad_user_session',['user_id'=>$login[0]['member_id'],'com_id'=>$login[0]['member_com_id'],'hash'=>$this->unique(),'islogedinn'=>1]);
					$this->session->set_userdata('pubIncharge',$user);
					redirect('Dashboard');
				}elseif($user['role_id'] == '4'){
					$this->db->insert('ad_user_session',['user_id'=>$login[0]['member_id'],'com_id'=>$login[0]['member_com_id'],'hash'=>$this->unique(),'islogedinn'=>1]);
					$this->session->set_userdata('offExe',$user);
					redirect('Dashboard');
				}elseif($user['role_id'] == '5'){
					$this->db->insert('ad_user_session',['user_id'=>$login[0]['member_id'],'com_id'=>$login[0]['member_com_id'],'hash'=>$this->unique(),'islogedinn'=>1]);
					$this->session->set_userdata('comAdmin',$user);
					redirect('Dashboard');
				}
			}else{
				return 2;
			}
		}

		public function total_records_count($where,$table)
		{
			if(!empty($where)){
				return $this->db->where($where)->get($table)->num_rows();
			}else{
				return $this->db->get($table)->num_rows();				
			}
		}

		public function fetch_details($where,$table)
		{
			if(!empty($where)){
				return $this->db->where($where)->get($table)->result_array();	
			}else{
				return $this->db->get($table)->result_array();	
			}
		}

		public function fetch_order_details($where,$table)
		{
			if(!empty($where)){
				return $this->db->where($where)->order_by('meeting_date')->get($table)->result_array();	
			}else{
				return $this->db->order_by('meeting_date')->get($table)->result_array();	
			}
		}

		public function insert_records($table,$data)
		{
			return $this->db->insert($table,$data);
		}

		public function update_records($where,$table,$data)
		{
			return $this->db->where($where)->update($table,$data);
		}

		public function delete_records($where,$table)
		{
			return $this->db->where($where)->delete($table);
		}

		public function logout_user($data)			
		{
			$this->db->SET('islogedinn',0)->where('user_id',$data[0]['id'])->update('ad_user_session');
			$this->session->unset_userdata('mainAdmin');
			$this->session->unset_userdata('socAdmin');
			$this->session->unset_userdata('flatOwner');
			$this->session->unset_userdata('socChairman');
			$this->session->unset_userdata('socChairman');
			$this->session->set_flashdata('success',"Thanks for login.");
			redirect('/');
		}

		public function update_password($data)
		{
			$login = $this->db->select('*','society_id')->where('member_email',$data['username'])->get('ad_member')->result_array();
			// echo "<pre>";
			if(empty($login)){
				return 1;
			}elseif($login[0]['member_email'] != $data['username']){
				print_r($login);die();
				return 1;
			}else{
				$user['member_email'] = $data['username'];
				$user['member_salt'] = $this->salt(32); 
				$user['member_password'] =$this->make($data['password'].$user['member_salt']); 
				$this->db->where('member_email',$user['member_email'])->update('ad_member',$user);
				$this->session->set_flashdata('success',"Password has been updated successfully. Please login.");
				redirect('/');
			}
		}

		public function send_mail($member_email,$subject,$msg)
		{
			$config['protocol'] = $this->config->item('protocol');
			$config['smtp_host'] = $this->config->item('smtp_host');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['smtp_user'] = $this->config->item('smtp_user');
			$config['smtp_pass'] = $this->config->item('smtp_pass');
			$config['charset'] = $this->config->item('charset');
			$config['newline'] = $this->config->item('newline');
			$config['mailtype'] = $this->config->item('mailtype');
			$config['validation'] = $this->config->item('validation');

			$this->email->initialize($config);
			$this->email->from('info@colonia.in');
			$this->email->to(''.$member_email.'');
			$this->email->subject($subject);	
			$this->email->message($msg);
			// print_r($this->email->send());
			if($this->email->send()){
				return true;
			}else{
				return false;
			}
		}

		function upload_profile($file,$folder)						
		{
			$config = array(
				'upload_path' => 'assets/'.$folder.'/',
				'upload_url' => base_url().'assets/'.$folder.'/',
				'allowed_types' => 'jpg|jpeg|gif|png',
				'encrypt_name' => TRUE,
				);
			// print_r($folder);die();
			$this->upload->initialize($config);
			if($this->upload->do_upload($file)){
				$upload_files = array('upload_data' => $this->upload->data());
				$file_upload = base_url().'assets/'.$folder.'/'.$upload_files['upload_data']['file_name'];
				$this->upload->data();

				return $file_upload;
			}
		}

		public function verify_field($table,$where)
		{
			return $this->db->where($where)->get('ad_member')->num_rows();
		}

		public static function make($string, $salt = '') {
			return hash('sha256', $string . $salt);
		}
		
		public static function salt($length) {
			//return openssl_random_pseudo_bytes($length, NULL);
			return mcrypt_create_iv($length);
		}
	
		public static function unique() {
			return self::make(uniqid());
		}

		public function pagination()
		{
			$config['full_tag_open'] = "<ul class='pagination'>";
	        $config['full_tag_close'] = '</ul>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['prev_tag_open'] = '<li>';
	        $config['prev_tag_close'] = '</li>';
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';

	        // $config['next_link'] = 'Next Page';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';

	        // $config['prev_link'] = 'Previous Page';
	        $config['prev_tag_open'] = '<li>';
	        $config['prev_tag_close'] = '</li>';
	        return $config;
		}
	}
?>