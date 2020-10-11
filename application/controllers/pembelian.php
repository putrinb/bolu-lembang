<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class pembelian extends CI_Controller {

		public function __construct()
        {
                parent::__construct();
                $this->load->model('pembelian_model');
				$this->load->model('m_bb'); //digunakan untuk melihat id bahanbaku dan nama bahanbaku
				$this->load->model('m_supplier'); //digunakan untuk melihat id supplier dan nama supplier
                if(!$this->session->userdata('is_logged')){
					redirect('auth');
				}

        }

		//untuk mengecek apakah no faktur uniq
		function check_nofaktur() {
				$post = $this->input->post();
				$no_faktur = $this->input->post('no_faktur');// get no_faktur
				$id_supplier = $this->input->post('id_supplier');// get id_supplier
				$this->db->select('no_faktur');
				$this->db->from('pembelian_bb');
				$this->db->where('no_faktur', $no_faktur);
				$this->db->where('id_supplier', $id_supplier);
				$query = $this->db->get();
				$num = $query->num_rows();
				if ($num > 0) {
				$this->form_validation->set_message('check_nofaktur','Kombinasi No. Faktur dan ID Supplier sudah ada');
				return FALSE;
				} else {
				return TRUE;
				}
				}

				//untuk input
		public function input_form(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('no_faktur', 'No Faktur', 'required|callback_check_nofaktur',
			array('required' => 'Anda harus memasukkan %s.')
			);

			$this->form_validation->set_rules('id_supplier', 'Nama Supplier', 'required',
			array('required' => 'Anda harus memasukkan %s.')
			);

			$this->form_validation->set_rules('datetimepicker', 'Tanggal Pembelian', 'required',
			array('required' => 'Anda harus memasukkan %s.')
			);

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$data['bahanbaku'] = $this->m_bb->getDataOrderByNama(); //untuk mengambil data bahanbaku
			$data['datasupplier'] = $this->m_supplier->getDataOrderByNama(); //untuk mengambil data supplier
			$data['heading'] = 'Form Pembelian';
			$data['title'] = 'Transaksi Pembelian | Form';
			if ($this->form_validation->run() == FALSE)
			{
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/form_input_data', $data);
			$this->load->view('templates/footer');
			}
			else
			{ $post = $this->input->post();
			$data['faktur_pembelian'] = array('no_faktur' => $post["no_faktur"],
			'id_supplier' => $post["id_supplier"],
			'datetimepicker' => $post["datetimepicker"]
			);
			$_SESSION['no_faktur'] = $post["no_faktur"];
			$_SESSION['id_supplier'] = $post["id_supplier"];
			$_SESSION['datetimepicker'] = $post["datetimepicker"];

			$data['isi_data'] = $this->pembelian_model->getDataDetail($post["no_faktur"],$post["id_supplier"]);
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/form_input_detail_pembelian', $data);
			$this->load->view('transaksi/view_data_pembelian',$data);
			$this->load->view('templates/footer');

			}

			}


			//untuk input detail
		public function input_form_detail(){

				//simpan ke database
				$this->pembelian_model->fungsi_input_data();

				//dapatkan data hasil penyimpanan
				$data['bahanbaku'] = $this->m_bb->getData(); //untuk mengambil data bahanbaku
				$data['datasupplier'] = $this->m_supplier->getDataOrderByNama(); //untuk mengambil data supplier
				$data['title'] = 'Transaksi Pembelian | Detail';
				$data['heading'] = 'Form Detail Transaksi';
				$post = $this->input->post();
				$data['faktur_pembelian'] = $this->pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);

				$data['isi_data'] = $this->pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);
				$this->load->view('templates/header', $data);
				$this->load->view('transaksi/form_input_detail_pembelian', $data);
				$this->load->view('transaksi/view_data_detail_pembelian',$data);
				$this->load->view('templates/footer');

				}

		//input form 2
		public function input_form_detail2(){

			$data['faktur_pembelian'] = $this->pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);

			$data['isi_data'] = $this->pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);
			$data['bahanbaku'] = $this->m_bb->getData($_SESSION['no_faktur']); //untuk mengambil data bahanbaku
			$data['datasuplier'] = $this->m_supplier->getDataOrderByNama(); //untuk mengambil data supplier
			$data['title'] = 'Transaksi Pembelian | Detail';
				$data['heading'] = 'Form Detail Transaksi';

			//$this->load->view('templates/header', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/form_input_detail_pembelian', $data);
			$this->load->view('transaksi/view_data_detail_pembelian',$data);
			$this->load->view('templates/footer');


			}

		//ketika sudah selesai menambahkan detail pembelian ke dalam keranjang
		public function selesai(){
		//unset sesi yang digunakan untuk transaksi pembelian
			unset($_SESSION['no_faktur']);
			unset($_SESSION['id_supplier']);
			unset($_SESSION['datetimepicker']);
			redirect('pembelian/view_data');
			}

		//fungsi untuk edit data
		public function edit_form($no_faktur,$id_supplier){

			if ((!isset($no_faktur)) and (!isset($id_supplier))) redirect('transaksi/view_data_pembelian');

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$data_form_input = $this->pembelian_model->getDataEdit($no_faktur,$id_supplier);

			$this->form_validation->set_rules('no_faktur', 'No Faktur', 'required',
			array('required' => 'Anda harus memasukkan %s.')
			);

			$this->form_validation->set_rules('id_supplier', 'Nama Supplier', 'required',
			array('required' => 'Anda harus memasukkan %s.')
			);

			$this->form_validation->set_rules('datetimepicker', 'Tanggal Pembelian', 'required',
			array('required' => 'Anda harus memasukkan %s.')
			);

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$data['bahanbaku'] = $this->m_bb->getDataOrderByNama($no_faktur); //untuk mengambil data bahanbaku
			$data['data_supplier'] = $this->m_supplier->getDataOrderByNama(); //untuk mengambil data supplier

			if ($this->form_validation->run()) {
			$this->pembelian_model->updateFormInput($no_faktur,$id_supplier);
			redirect('pembelian/view_data');
			}
			$data["data_form_input"] = $data_form_input;
			$data['heading'] = 'Data Detail Pembelian';
			$data['title'] = 'Transaksi Pembelian | Data';

			if (!$data["data_form_input"]) show_404();
			//print_r($data["data_form_input"]);
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/form_edit_data', $data);
			$this->load->view('templates/footer');

			}

			//fungsi untuk edit data detail pembelian
		public function edit_form_detail($id){

				if(!isset($id)){
				$post = $this->input->post();
				$id = $post['id_transaksi_pembelian'];
				}

				if ((!isset($id))) redirect('transaksi/selesai');

				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');

				$this->form_validation->set_rules('harga', 'Harga', 'required',
				array('required' => 'Anda harus memasukkan %s.')
				);

				$this->form_validation->set_rules('jumlah', 'Jumlah', 'required',
				array('required' => 'Anda harus memasukkan %s.')
				);
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');

				$data_form_input = $this->pembelian_model->getDataEditDetailPembelian($id);


				$data['bahanbaku'] = $this->m_bb->getDataOrderByNama(); //untuk mengambil data bahanbaku
				$data['datasuplier'] = $this->m_supplier->getDataOrderByNama(); //untuk mengambil data supplier
				$data["data_form_input"] = $data_form_input;
				$data['heading'] = 'Edit Data Pembelian';
				$data['title'] = 'Transaksi Pembelian | Edit';

				if ($this->form_validation->run()) {
				$this->pembelian_model->updateFormInputDetail($id);
				redirect('pembelian/view_data_pembelian_detail2/'.$data_form_input[0]['no_faktur'].'/'.$data_form_input[0]['id_supplier']);
				}
				$data["data_form_input"] = $data_form_input;
				if (!$data["data_form_input"]) show_404();

				$this->load->view('templates/header', $data);
				$this->load->view('transaksi/form_edit_data_detail_pembelian', $data);
				$this->load->view('templates/footer');

				}

				//fungsi untuk menghapus data
				public function delete_form($no_faktur,$id_supplier){

				if ((!isset($no_faktur)) or (!isset($id_supplier))) show_404();
				       
				if ($this->pembelian_model->deleteFormInput($no_faktur,$id_supplier)) {
				redirect(site_url('pembelian/view_data'));
				}

				}

				//fungsi untuk menghapus data ketika input data detail pembelian
		public function delete_form_detail($id_transaksi_pembelian,$no_faktur,$id_supplier){

			if ($this->pembelian_model->deleteFormInputDetailPembelian($id_transaksi_pembelian)) {
				redirect(site_url('pembelian/input_form_detail2'));
				}

				}

				//fungsi untuk menghapus data ketika input data detail pembelian
		public function delete_form_detail2($id_transaksi_pembelian,$no_faktur,$id_supplier){

			if($this->pembelian_model->deleteFormInputDetailPembelian($id_transaksi_pembelian)){
			redirect(site_url('pembelian/view_data_pembelian_detail2/'.$no_faktur.'/'.$id_supplier));
			}

			}

			//fungsi untuk melihat data
		public function view_data(){
			$data['isi_data'] = $this->pembelian_model->getData();
			$data['heading'] = 'Data Pembelian';
			$data['title'] = 'Transaksi Pembelian | Data';
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/view_data_pembelian',$data);
			$this->load->view('templates/footer');
			}

		//fungsi untuk melihat data
		public function view_data_pembelian_detail($no_faktur,$id_supplier){
			$data['isi_data'] = $this->pembelian_model->getDataDetailPembelian($no_faktur,$id_supplier);
			$data['heading'] = 'Data Detail Pembelian';
			$data['title'] = 'Transaksi Pembelian | Data';
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/view_data_pembelian',$data);
			$this->load->view('templates/footer');
			}

		//fungsi untuk melihat data
		public function view_data_pembelian_detail2($no_faktur,$id_supplier){
			$data['isi_data'] = $this->pembelian_model->getDataDetailPembelian($no_faktur,$id_supplier);
			//print_r($data['isi_data']);
			$data['heading'] = 'Data Detail Pembelian';
			$data['title'] = 'Transaksi Pembelian | Data';
			$this->load->view('templates/header', $data);
			$this->load->view('transaksi/view_data_detail_pembelian2',$data);
			$this->load->view('templates/footer');
			}
	}
?>