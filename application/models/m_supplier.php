<?php
class m_supplier extends CI_Model {

		//deklarasi atribut dan access method-nya
		private $_table = "supplier";
		public $id_supplier;
		public $nama;
		public $alamat;
		public $no_telp;
		public $email;

        public function __construct()
        {
                $this->load->database('');
				$this->load->helper(array('form', 'url')); 
				$this->load->library('form_validation');
        }

        public function get_id_supplier()
        {
        	return $this->db->get_where('supplier', array('status' => '1'))->row_array();
        }

		
		public function fungsi_input_data(){
			$post = $this->input->post();
			$this->id_supplier = $this->getSupplierId();
			$this->nama= $post["nama"];
			$this->alamat = $post["alamat"];
			$this->no_telp = $post["no_telp"];
			$this->email = $post["email"];
			$sql = "INSERT INTO supplier(id_supplier,nama,alamat,no_telp,email) ";
			$sql = $sql." VALUES(".$this->db->escape($this->id_supplier).",".$this->db->escape($this->nama).",".$this->db->escape($this->alamat);
			$sql = $sql.",".$this->db->escape($this->no_telp).",".$this->db->escape($this->email).")";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}

		public function getSupplierId()
		{
			$sql = "SELECT (substring(IFNULL(MAX(id_supplier),0),4)+0) as hsl FROM ".$this->_table;
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id = 'S-';
			$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
			$id = $id.$nomor;
			return $id;
		}
		
		public function getData(){
			$query = $this->db->get($this->_table); 
			return $query->result_array();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama', 'ASC');
			$query = $this->db->get($this->_table); 
			return $query->result_array();
		}

		public function getDataOrderByNama2($no_faktur){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_supplier NOT IN ";
			$sql = $sql." (SELECT id_supplier FROM detail_beli WHERE no_faktur = '".$no_faktur."') ";
			$sql = $sql." ORDER BY nama_supplier ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function getDataEdit($id){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table." WHERE id_supplier = ".$this->db->escape($id);
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function updateFormInput($id)
		{
			return $this->db->get_where('supplier', array('id_supplier'=>$id))->row_array();
			
		}
		
		public function delete($id_supplier)
		{
			return $this->db->delete('supplier', array("id_supplier" => $id_supplier));
		}
}
?>