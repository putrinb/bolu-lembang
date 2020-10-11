<?php
class m_bb extends CI_Model {

		//deklarasi atribut dan access method-nya
		private $_table = "bahanbaku";
		public $id_bb;
		public $nama_bahan;
		public $status;
		public $satuan;

        public function __construct()
        {
                $this->load->database('');
				$this->load->helper(array('form', 'url')); 
				$this->load->library('form_validation');
        }

        public function get_id_bb()
        {
        	return $this->db->get_where('bahanbaku', array('status' => '1'))->row_array();
        }

		
		/*public function fungsi_input_data(){
			$post = $this->input->post();
			$this->id_bb = $this->getSupplierId();
			$this->nama= $post["nama"];
			$this->alamat = $post["alamat"];
			$this->no_telp = $post["no_telp"];
			$this->email = $post["email"];
			$sql = "INSERT INTO supplier(id_bb,nama,alamat,no_telp,email) ";
			$sql = $sql." VALUES(".$this->db->escape($this->id_bb).",".$this->db->escape($this->nama).",".$this->db->escape($this->alamat);
			$sql = $sql.",".$this->db->escape($this->no_telp).",".$this->db->escape($this->email).")";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}*/

		/*public function getSupplierId()
		{
			$sql = "SELECT (substring(IFNULL(MAX(id_bb),0),4)+0) as hsl FROM ".$this->_table;
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id = 'S-';
			$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
			$id = $id.$nomor;
			return $id;
		}*/
		
		public function getData(){
			$query = $this->db->get($this->_table); 
			return $query->result_array();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_bahan', 'ASC');
			$query = $this->db->get($this->_table); 
			return $query->result_array();
		}

		public function getDataOrderByNama2($no_faktur){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_bb NOT IN ";
			$sql = $sql." (SELECT id_bb FROM detail_pembelian WHERE no_faktur = '".$no_faktur."') ";
			$sql = $sql." ORDER BY nama_bahan ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function getDataEdit($id){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table." WHERE id_bb = ".$this->db->escape($id);
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function updateFormInput($id)
		{
			return $this->db->get_where('bahanbaku', array('id_bb'=>$id))->row_array();
			
		}
		
		public function delete($id_bb)
		{
			return $this->db->delete('bahanbaku', array("id_bb" => $id_bb));
		}
}
?>