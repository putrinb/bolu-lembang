<?php
class Akun_model extends CI_Model {

		//deklarasi atribut dan access method-nya
		private $_table = "akun_user";
		
		public $id_user;
		public $password;
		public $kelompok;

        public function __construct()
        {
                $this->load->database();
				$this->load->helper(array('form', 'url')); 
				$this->load->library('form_validation');
        }
		
		public function fungsi_input_data(){
			$post = $this->input->post();
			$this->id_user = $post["id_user"];
			$this->password = $post["password"];
			$this->kelompok = $post["kelompok"];
			$sql = "INSERT INTO akun_user ";
			$sql = $sql." VALUES(".$this->db->escape($this->id_user).",md5(".$this->db->escape($this->password).")";
			$sql = $sql.",".$this->db->escape($this->kelompok).")";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}

		public function getData(){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table." WHERE id_user <> 'admin' ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function getDataEdit($id){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table." WHERE id_user = ".$this->db->escape($id);
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function updateFormInput($id)
		{
			$post = $this->input->post();
			$this->id_user = $post["id_user"];
			$this->password = $post["password"];
			$this->kelompok = $post["kelompok"];
			
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET id_user = ".$this->db->escape($this->id_user).", password= md5(".$this->db->escape($this->password).")";
			$sql = $sql." , kelompok = ".$this->db->escape($this->kelompok);
			$sql = $sql." WHERE id_user = ".$this->db->escape($this->id_user);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}

		public function deleteFormInput($id)
		{
			return $this->db->delete($this->_table, array("id_user" => $id));
		}

		public function validasi_login($username, $password){
			$sql = "SELECT COUNT(*) as jml_data ";
			$sql = $sql." FROM ".$this->_table." WHERE id_user =  ".$this->db->escape($username);
			$sql = $sql." AND password= md5(".$this->db->escape($password).")";
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml_data'];
			endforeach;

			return $jml_data;
		}

		public function getKelompok($username, $password){
			$sql = "SELECT kelompok ";
			$sql = $sql." FROM ".$this->_table." WHERE id_user =  ".$this->db->escape($username);
			$sql = $sql." AND password= md5(".$this->db->escape($password).")";
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$kelompok = $cacah['kelompok'];
			endforeach;

			return $kelompok;
		}
}
?>