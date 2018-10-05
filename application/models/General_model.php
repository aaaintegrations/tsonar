<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model 
{

    public function __construct()
	{
        parent::__construct();
    }

    function save($table,$data)
	{
		$this->db->insert($table, $data);
		if($this->db->insert_id() > 0)
		{
			return $this->db->insert_id();
		} 
		else
		{
			return FALSE;
		}
    }
	
	function update($table,$where,$data)
	{
		$this->db->update($table, $data, $where);
        if ($this->db->affected_rows() > 0)
		{
            return TRUE;
        } 
		else 
		{
            return FALSE;
        }
    }

	function delete($table,$where)
	{
    	$this->db->where($where)->delete($table);
        //echo $this->db->last_query();die;
        if ($this->db->affected_rows()==1)
            return TRUE;
        return FALSE;
    }
	
	function get($table, $objArr=FALSE, $where = false,$fields = '*',$order = false)
    {
        $this->db->select($fields)->from($table);
        if($where)
		{
            $this->db->where($where);
        }

        if($order)
		{
            foreach ($order as $key => $value) 
			{
                $this->db->order_by($key,$value);
            }
        }
        $query = $this->db->get();
        //if($group_by)
        //{echo $this->db->last_query();die;}
        if($query->num_rows() > 0)
		{
			if($objArr)
			{
				return $query->result();
			}
			else
			{
				return $query->result_array();
			}
		}
        return FALSE;
    }
	
}