<?php
class bb_model extends CI_Model {

		//deklarasi atribut dan access method-nya
		private $_table = "bahanbaku";
		public $id_bb;
		public $nama_bahan;
		public $jml_satuan;
		public $satuan;

        public function __construct()
        {
                $this->load->database('');
				$this->load->helper(array('form', 'url')); 
				$this->load->library('form_validation');
        }
		public function fungsi_input_data(){
			$post = $this->input->post();
			$this->nama_bahan= $post["nama_bahan"];
			$this->satuan = $post["satuan"];
			$sql = "INSERT INTO bahanbaku(nama_bahan,satuan) ";
			$sql = $sql." VALUES(".$this->db->escape($this->nama_bahan).",".$this->db->escape($this->satuan).")";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getData(){
			$query = $this->db->get($this->_table); 
			return $query->result_array();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_bahan', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		
		//query buah yang tidak terdapat di tabel detail_beli
		public function getDataOrderByNama2($no_faktur){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_bb NOT IN ";
			$sql = $sql." (SELECT id_bb FROM detail_beli WHERE id_beli = '".$id_beli."') ";
			$sql = $sql." ORDER BY nama_bahan ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataEdit($id){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table." WHERE id_bb = ".$id;
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function updateFormInput($id)
		{
			$post = $this->input->post();
			$data = array('id_bb' => $post["id_bb"],
	
							'nama_bahan' => $post["nama_bahan"],
							//'jml_satuan' => $post["jml_satuan"],
							'satuan' => $post["satuan"]);
						
							
			// $this->id_produk = $post["id_produk"];
			// $this->nama_produk = $post["nama_produk"];
			// $this->harga = $post["harga"];
			// $this->satuan = $post["satuan"];
			$this->db->where('id_bb',$id);
			$this->db->update('bahanbaku',$data);
			//jika ada file yang diupload saat mengedit data maka upload filenya
			
		}
		
		public function deleteFormInput($id_bb)
		{
			return $this->db->delete('bahanbaku', array("id_bb" => $id_bb));
		}
}
?>