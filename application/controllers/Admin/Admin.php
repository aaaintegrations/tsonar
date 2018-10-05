<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller {
	
	//homepage
	public function index()
	{
		$data['page'] = 'home';
		$data['content'] = 'frontend/content/homepage_view';		
		$this->load->view('frontend/master_layout',$data);
	}
	//Admin Dashboard
	public function dashboard()
	{
		if(isset($this->session->userdata['id']))
		{
			$data['page'] = 'dashboard';
			$data['content'] = 'admin/dashboard';
			$this->load->view('frontend/master_layout',$data);
		}
		else
		{
			redirect('login');
		}
	}
	
	//Admin Dashboard
	public function users()
	{
		if(isset($this->session->userdata['id']))
		{
			$data['page'] = 'dashboard';
			$data['users'] = $this->general_model->get('ts_users', $objArr=TRUE);
			$data['content'] = 'admin/users';
			$this->load->view('frontend/master_layout',$data);
		}
		else
		{
			redirect('login');
		}
	}
	
	//Admin Roles
	public function roles()
	{
		$where = array('role_id' => $this->session->userdata['role_id']);
		if($this->session->userdata['id'] && get_permisssions('ts_options', 'roles', 'view', $where) || $this->session->userdata['role_id'] == 4)
		{
			$data['page'] = 'dashboard';
			$data['roles'] = $this->general_model->get('ts_user_roles', $objArr=TRUE);
			$data['content'] = 'admin/roles';
			$this->load->view('frontend/master_layout',$data);
		}
		else
		{
			redirect('logout');
		}
	}
	
	//Admin Menus
	public function menus()
	{
		if($this->session->userdata['id'])
		{
			$data['page'] = 'menu';
			$data['menus'] = $this->general_model->get('ts_menu', $objArr=TRUE);
			$data['content'] = 'admin/menus';
			$this->load->view('frontend/master_layout',$data);
		}
		else
		{
			redirect('logout');
		}
	}
	
	//Admin Menus Sorting
	public function menusorting()
	{
		if($this->session->userdata['id'])
		{
			print_r($this->input->post('choices[]'));
			exit;
			$data['page'] = 'menu';
			$data['menus'] = $this->general_model->get('ts_menu', $objArr=TRUE);
			$data['content'] = 'admin/menus';
			$this->load->view('frontend/master_layout',$data);
		}
		else
		{
			redirect('logout');
		}
	}
	
	//Admin Role Change code goes here
	public function permissions($role_id="")
	{
		if(isset($this->session->userdata['id']))
		{
			if($this->input->server('REQUEST_METHOD') == 'POST')
			{
				$json = array();
				$role_id = $this->input->post('role_id');
				$where = array('role_id' => $role_id);
				if($this->general_model->get('ts_options', $objArr=TRUE, $where))
				{
					$info_role = array(
						'menu_permissions' => serialize($this->input->post('per'))						
					);
					$where = array('role_id' => $role_id);
					$update = $this->general_model->update('ts_options',$where,$info_role);
					if($update)
					{
						$this->session->set_flashdata('success', ' Roles Permission Updated Successfully!');
						$json = array(
							'status' => 'ok',
							'redirect' => $role_id,
						);
						$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
						die;
					}
				}
				else
				{
					$info_role = array(
						'role_id' => $this->input->post('role_id'),
						'menu_permissions' => serialize($this->input->post('per'))						
					);
					$insert = $this->general_model->save('ts_options',$info_role);
					if($insert == TRUE)
					{
						$this->session->set_flashdata('success', ' Roles Permission Added Successfully!');
						$json = array(
							'status' => 'ok',
							'redirect' => $role_id,
						);
						$this->output->set_content_type('application/json')->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
						die;
					}
				}
			}
			else
			{
				$data['page'] = 'dashboard';
				$data['menus'] = $this->general_model->get('ts_menu', $objArr=TRUE);
				$data['role_id'] = $role_id;
				$where = array('role_id' => $role_id);
				$data['roles'] = $this->general_model->get('ts_options', $objArr=FALSE, $where);
				$data['permissions'] = unserialize($data['roles'][0]['menu_permissions']);
				$data['content'] = 'admin/permissions';
				$this->load->view('frontend/master_layout',$data);
			}
		}
		else
		{
			redirect('login');
		}
	}
	
}
?>