<?php
class m_auth extends CI_model
{
	public function get_user($username)
	{
		return $this->db->get_where('user',['username' => $username])->row_array();
		
	}
}