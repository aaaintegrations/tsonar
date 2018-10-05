<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if ( ! function_exists('get_permisssions')){

		function get_permisssions($table,$menu,$permission,$where)
		{
			$CI = &get_instance();
			
			$CI->db->where($where);
			$CI->db->order_by('id', 'DESC');
			$CI->db->limit(1);
			$result = $CI->db->get($table)->row();
			if($result)
			{
				$permissions = unserialize($result->menu_permissions);

				if($permissions[$menu][$permission])
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
		}
    }