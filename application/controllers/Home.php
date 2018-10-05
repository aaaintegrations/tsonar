<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_Controller {
	
	//homepage
	public function index()
	{
		//print_r($this->session->userdata);exit;
		$data['page'] = 'home';
		$data['content'] = 'frontend/content/homepage_view';		
		$this->load->view('frontend/master_layout',$data);
	}
	
	//user registration
	public function signUp()
	{	
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$json = array();
			$this->form_validation->set_rules('first_name','First Name','trim|required');
			$this->form_validation->set_rules('last_name','Last Name','trim|required');
			$this->form_validation->set_rules('country','Country','trim|required|callback_select_validate');
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[150]|valid_email|is_unique[ts_users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');
			$this->form_validation->set_rules('cpassword', 'Confirm password', 'required|matches[password]|min_length[6]|max_length[32]');
			
			if ($this->form_validation->run() !== false)
			{
				$insertData = array(
					'firstname' => $this->input->post('first_name'),
					'lastname' => $this->input->post('last_name'),
					'country' => $this->input->post('country'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'role_id' => $this->input->post('role_id_reg'),
					'activation_token' => substr(sha1(mt_rand()),17,30).time(),
				);
				$insert = $this->general_model->save('ts_users',$insertData);
                if(sendEmails('Activate Your Account',$this->input->post('email'),'activateAccount',$insertData))
				{
					$this->session->set_flashdata('success', 'Please check your email to activate your account.');
					$json = array
					(
						'status' => 'ok',
						'redirect' => 'signup'
					);
				}
				else
				{
					$this->session->set_flashdata('errors', 'There is an error while saving information.');
					$json = array
					(
						'status' => 'false',
						'redirect' => 'signup'
					);
				}
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				die;
			}
			else
			{
				$json = array
				(
					'first_name' => form_error('first_name', '<p class="mt-3 text-danger">', '</p>'),
					'last_name' => form_error('last_name', '<p class="mt-3 text-danger">', '</p>'),
					'country' => form_error('country', '<p class="mt-3 text-danger">', '</p>'),
					'email' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
					'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),
					'cpassword' => form_error('cpassword', '<p class="mt-3 text-danger">', '</p>')
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				exit;				
			}		
		}
		else
		{
			$data['page'] = 'signup';
			$data['countries'] = $this->general_model->get('ts_countries', $objArr=TRUE);
			$data['content'] = 'frontend/user/signup';
			$this->load->view('frontend/master_layout',$data);			
		}
	}
	
	//country select validation
	function select_validate($country)
	{
		// 'none' is the first option that is default "-------Choose Country-------"
		if($country=="none")
		{
			$this->form_validation->set_message('select_validate', 'Please Select Your Country.');
			return false;
		} 
		else
		{
			// User picked something.
			return true;
		}
	}
	
	//login to user
	public function signIn()
	{
		$json =  array();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$json = array();
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[150]|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');
			if ($this->form_validation->run() !== false)
			{
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
				$role_id = $this->input->post('role_id_reg');
				$where = array('email' => $email, 'password' => $password, 'role_id' => $role_id, 'status' => 1);
				$result = $this->general_model->get('ts_users',$objArr=TRUE,$where);
				$remember = $this->input->post('remember_me');
				if($result)
				{
					$cookie_time = 60*60*24*7;
					$cookie_time_onset = $cookie_time+ time();
					if (isset($remember)) 
					{
						setcookie('email', $email, $cookie_time_onset);
						setcookie('password', $this->input->post('password'), $cookie_time_onset);
					}
					else
					{
						$cookie_time_fromoffset = time() -$cookie_time;
						setcookie('email', '', $cookie_time_fromoffset);
						setcookie('password', '', $cookie_time_fromoffset);
					}
					$sess_array = array();
					foreach($result as $row)
					{
						$sess_array = array
						(
							'id' 			=> $row->id,
							'firstname'		=> $row->firstname,
							'lastname'		=> $row->lastname,
							'email'			=> $row->email,
							'avatar'		=> $row->avatar,
							'country'		=> $row->country,
							'user_type'		=> $row->user_type,
							'created_at'	=> $row->created_at,
							'role_id'		=> $row->role_id,
						);
						$this->session->set_userdata($sess_array);
					}
					$this->session->set_flashdata('success', 'Successfully Login.');
					$json = array
					(
						'status' => 'ok',
						'redirect' => 'dashboard'
					);
				}
				else
				{
					//$this->session->set_flashdata('errors', 'Username/Password Invalid');
					$json = array
					(
						'status' => 'false',
						'redirect' => 'login',
						'message' => 'Please select correct user type or enter correct login information!'
					);
				}
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				die;
			}
			else
			{
				$json = array
				(
					'email' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
					'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				exit;				
			}
		}
		else
		{
			$data['page'] = 'login';
			$data['content'] = 'frontend/user/login';
			$this->load->view('frontend/master_layout',$data);
		}
	}
	
	
	//forgot password for sending link
	public function forgotpassword()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST') 
		{
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[150]|valid_email');
			if ($this->form_validation->run() !== false)
			{
				$email = $this->input->post('email');
				$where = array('email' => $email);
				$result = $this->general_model->get('ts_users', $objArr=FALSE,$where);
				if($result)
				{
					$data = array
					(
						'reset_password' => substr(sha1(mt_rand()),17,30).time(),
					);
					$where = array('email' => $email);
					$result = $this->general_model->update('ts_users',$where,$data);
					$result = $this->general_model->get('ts_users', $objArr=FALSE,$where);
					$insertData = array
					(
						'firstname' => $result[0]['firstname'],
						'token' => $result[0]['reset_password'],
						'email' => $result[0]['email'],
					);
					sendEmails('Reset Password',$email,'resetPassword',$insertData);
					$this->session->set_flashdata('success', 'Reset Password Link Sent Successfully. Please check your mail');
					$json = array
					(
						'status' => 'ok',
						'redirect' => 'resetpassword',
						'message' => 'Reset password link sent to your email!'
					);
					$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
					die;
				}
				else
				{
					//$this->session->set_flashdata('errors', 'Invalid Email/User not Exist in our Database');
					$json = array
					(
						'status' => 'false',
						'message' => 'Invalid email or not exist in our database',
						'redirect' => 'resetpassword'
					);
				}
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				die;
			}
			else
			{
				$json = array
				(
					'email' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				exit;				
			}
		}
		else
		{
			$data['page'] = 'forgot-password';
			$data['content'] = 'frontend/user/forgot-password';
			$this->load->view('frontend/master_layout',$data);
		} 
	}
	     
	//role_id while login linkedin
	public function session()
	{ 
		$role_id_reg = $this->input->post('role_id_reg');
		$this->session->set_userdata(array('role_id_reg'=>$role_id_reg));
	}
	 
	//login linkedin
	public function login_linkedin() 
	{
		$role_id = $this->session->userdata('role_id_reg');
		$site_url = $this->config->item('base_url').'home/';		
		$client_id = $this->config->item('client_id');//"81hjvv8jnhdq78";
		$client_secret = $this->config->item('client_secret');//"qzc3T2MLmreyLGWA";
		
		$social_instance = new Social();
		$ldnData = $social_instance->linkedin_connect(NULL,$site_url,$client_id,$client_secret);
		if(!empty($ldnData['redirectURL'])) 
		{
			 redirect($ldnData['redirectURL']);
		} 
		else 
		{
			if(!empty($ldnData['oauth_uid'])) 
			{
				$where = array('email' => $ldnData['email']);
				$result = $this->general_model->get('ts_users', $objArr=FALSE, $where);
				if($result)
				{
					$where = array('email' => $ldnData['email'], 'role_id' => $role_id);
					$result = $this->general_model->get('ts_users', $objArr=FALSE,$where);
					unset($_SESSION['role_id_reg']);
					if($result)
					{
						$where = array('email' => $ldnData['email']);
						$this->general_model->update('ts_users',$where,$ldnData);
						$ldnData['id'] = 1;
						$this->session->set_userdata($ldnData);
						redirect('dashboard');
					}
					else
					{
						
						$this->session->set_flashdata('errors', 'Please select correct user type or enter correct login information!');
						redirect('login');
					}
				}
				else
				{
					if($role_id)
					{
						$ldnData['role_id'] = $role_id;
						$this->general_model->save('ts_users',$ldnData);
						unset($_SESSION['role_id_reg']);
						$role_id = 0;
						$ldnData['id'] = 1;//is_logged_in
						$this->session->set_userdata($ldnData);
						redirect('dashboard');
					}
					else
					{
						$this->session->set_flashdata('errors', 'Please select correct user type or enter correct login information!');
						redirect('login');
					}
				}					
		  	}
		}
	}
	
	//after login user will go to the page
	public function ldn_login()
	{
		$connect = $this->uri->segment(3);
		if($this->session->userdata('logged_user')== true)
		{
      		if($connect) 
			{
				redirect('home');
				//$this->load->view('welcome_message');
			} 
			else 
			{
				redirect(base_url('user/dashboard'));
			}       
		}
		if($connect == 'ldn') 
		{
			$this->login_linkedin();
			redirect('home');
		}
	}
	
	
	
	
	function setPassword($email, $accessToken)
	{
		$where = array('email' => $email, 'reset_password' => $accessToken);
		$result = $this->general_model->get('ts_users', $objArr=FALSE,$where);
		if($result)
		{
			$this->session->set_userdata(array('email'=>$email));
			redirect("resetp");
		}
	}
	
	public function resetp()
	{
		$email = $this->input->post('email');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{	
			$json = array();
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');
				$this->form_validation->set_rules('cpassword', 'Confirm password', 'required|matches[password]|min_length[6]|max_length[32]');
			if ($this->form_validation->run() !== false)
			{
				$data = array(
					'password' => md5($this->input->post('password')),
					'reset_password' => substr(sha1(mt_rand()),17,30).time(),
				);
				$where = array('email' => $email);
				$result = $this->general_model->update('ts_users',$where,$data);
				
				if($result == TRUE)
				{
					$this->session->set_flashdata('success', 'Password reset successfully. Login now!');
					$json = array(
						'status' => 'ok',
						'redirect' => 'login'
					);
				}
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				die;
			}
			else
			{
				$json = array
				(
					'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),
					'cpassword' => form_error('cpassword', '<p class="mt-3 text-danger">', '</p>')
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				exit;				
			}
		}
		else
		{
			$data['page'] = 'reset-password';
			$data['content'] = 'frontend/user/reset-password';
			$this->load->view('frontend/master_layout',$data);
		}
	}
	
	function mailConfirmation($email, $accessToken)
	{
		$where = array('email' => $email, 'activation_token' => $accessToken);
		$result = $this->general_model->get('ts_users', $objArr=FALSE,$where);
		if($result > 0)
		{
			$updateData = array
			(
				'activation_time' => date('Y-m-d H:i:s'),
				'activation_token' => substr(sha1(mt_rand()),17,30).time(),
				'status' => 1,
			);
			$where = array('email' => $email);
			$result = $this->general_model->update('ts_users',$where,$updateData);
			if($result == TRUE)
			{
				$this->session->set_flashdata('success', 'Your accounr has been Activated successfully. Please Login!.');
				redirect('login');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Access Token Expired!!.');
			redirect('signup');
		}
	}
	
	
	public function dashboard()
	{
		if($this->session->userdata['id'] && $this->session->userdata['role_id'] == 4)
		{
			$data['page'] = 'dashboard';
			$data['content'] = 'frontend/user/dashboard';
			$this->load->view('frontend/master_layout',$data);
		}
		else
		{
			redirect('login');
		}
	}


	public function ContactUs()
    {
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$json = array();
			$this->form_validation->set_rules('nm','Name','trim|required');
			$this->form_validation->set_rules('em','Email','trim|required');
			$this->form_validation->set_rules('phone','Phone','trim|required');
			$this->form_validation->set_rules('FB', 'Comment', 'trim|required');
			if ($this->form_validation->run() !== false)
			{
				$insertData = array
				(
					'name' => $this->input->post('nm'),
					'email' => $this->input->post('em'),
					'phone' => $this->input->post('phone'),
					'comment' => $this->input->post('FB')
				);
				$insert = $this->general_model->save('contact',$insertData);
				if($insert)
				{
					$json = array
					(
						'status' => 'ok',
						'redirect' => 'contact',
						'message' => 'Thank you for contacting with us!'
					);
					$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
					die;
				}
				else
				{
					//$this->session->set_flashdata('errors', 'There is an error while saving information.');
					$json = array(
						'status' => 'false',
						'redirect' => 'contact',
						'message' => 'There is an error while saving information.'								
					);
				}
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				die;
			}
            else
			{
				$json = array
				(
						'nm' => form_error('nm', '<p class="mt-3 text-danger">', '</p>'),
						'em' => form_error('em', '<p class="mt-3 text-danger">', '</p>'),
						'phone' => form_error('phone', '<p class="mt-3 text-danger">', '</p>'),
						'FB' => form_error('FB', '<p class="mt-3 text-danger">', '</p>')
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
				exit;				
            }
        }
		else
		{
			$data['page'] = 'contact';
			$data['content'] = 'frontend/content/contact';
			$this->load->view('frontend/master_layout',$data);
		}
    }
	
	public function logout()
	{
        //Unset token and user data from session
        
        //Destroy entire session
        $this->session->sess_destroy();
        // Redirect to login page
        redirect('login');
    }
	
		
}
