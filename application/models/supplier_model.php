<?php
class supplier_model extends CI_Model {

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
		
		public function fungsi_input_data(){
			$post = $this->input->post();
			$this->nama= $post["nama"];
			$this->alamat = $post["alamat"];
			$this->no_telp = $post["no_telp"];
			$this->email = $post["email"];
			$sql = "INSERT INTO supplier(nama,alamat,no_telp,email) ";
			$sql = $sql." VALUES(".$this->db->escape($this->nama).",".$this->db->escape($this->alamat);
			$sql = $sql.",".$this->db->escape($this->no_telp).",".$this->db->escape($this->email).")";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
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

		
		public function getDataEdit($id){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table." WHERE id_supplier = ".$id;
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function updateFormInput($id)
		{
			$post = $this->input->post();
			$data = array('id_supplier' => $post["id_supplier"],
	
							'nama' => $post["nama"],
							'alamat' => $post["alamat"],
							'no_telp' => $post["no_telp"],
							'email' => $post["email"]);
						
							
			// $this->id_produk = $post["id_produk"];
			// $this->nama_produk = $post["nama_produk"];
			// $this->harga = $post["harga"];
			// $this->satuan = $post["satuan"];
			$this->db->where('id_supplier',$id);
			$this->db->update('supplier',$data);
			//jika ada file yang diupload saat mengedit data maka upload filenya
			//$post = $this->input->post();
			//$this->id_supplier = $post["id_supplier"];
			// $this->nama = $post["nama"];
			// $this->alamat = $post["alamat"];
			// $this->no_telp = $post["no_telp"];
			
			//jika ada file yang diupload saat mengedit data maka upload filenya
			
		}
		
		public function deleteFormInput($id_supplier)
		{
			return $this->db->delete('supplier', array("id_supplier" => $id_supplier));
		}
}
?>