<?php

class c_supplier extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
            $this->load->model('m_supplier');
            if(!$this->session->userdata('is_logged')){
                redirect('auth');
            }
				
    }
    
    public function index()
    {
        $data=array(
                'supplier' =>  $this->m_supplier->getData(),
                'title' => 'Data Supplier',
                'heading' => 'Form Input Supplier'
                );
        $this->load->view('templates/header', $data);
        $this->load->view('masterdata/form', $data);
        $this->load->view('templates/footer', $data);

    }

    public function insert()
    {
        $this->form_validation->set_rules('nama', 'Nama supplier', 'required|alpha_numeric_spaces',
                array('required' => '%s harus diisi!',
                        'alpha_numeric_spaces' => '%s hanya boleh diisi dengan angka, huruf, atau spasi.')
                );
        $this->form_validation->set_rules('alamat', 'Alamat supplier', 'required',
                array('required' => '%s harus diisi!')
        );		
        $this->form_validation->set_rules('no_telp', 'Nomor telepon', 'required|numeric',
                array('required' => '%s harus diisi!',
                        'numeric' => '%s hanya diisi oleh angka!'
                )
        );
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
                array('required' => '%s harus diisi!',
                      'valid_email' => 'Masukkan alamat %s yang valid.',
                )
        );
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $data=['title'=>'Supplier | Input Supplier',
                'heading' => 'Form Data Supplier'];
        
        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('templates/header',$data);
                $this->load->view('masterdata/form',$data);
                $this->load->view('templates/footer');
        }
        else
        {
                 $post = $this->input->post();
                 $data['kirim'] = array('id'=> $this->m_supplier->getSupplierId(),
                                'nama'=>$post["nama"],
                                'alamat'=>$post["alamat"],  
                                'no_telp'=>$post["no_telp"],
                                'email'=>$post["email"]
                          );
                 
                $hasil = $this->m_supplier->fungsi_input_data();   
                if($hasil>0){
                        redirect('c_supplier/view_data');
                }else{
                    $data['pesan_error'] = 'Input data tidak berhasil';
                    $this->load->view('templates/header');
                    $this->load->view('masterdata/form', $data);
                    $this->load->view('templates/footer');
                }
                
        }
        
    }

    public function view_data()
        {
            $data=array('supplier' =>  $this->m_supplier->getData(),
                'title'=>'Supplier | Data Supplier',
                'heading' => 'Data Supplier'
            );
            $this->load->view('templates/header',$data);
            $this->load->view('masterdata/view_data',$data);
            $this->load->view('templates/footer');
        }

        public function edit_form($id)
        {
                if(!isset($id)) redirect('c_supplier/view_data');
                $data=array('supplier'     => $this->m_supplier->updateFormInput($id),
                                'id_supplier'   => $this->m_supplier->getSupplierId(),
                );
                $supplier = $this->m_supplier->getDataEdit($id);
                
                $this->form_validation->set_rules('nama', 'Nama supplier', 'required|alpha_numeric_spaces',
                array('required' => '%s harus diisi!',
                        'alpha_numeric_spaces' => '%s hanya boleh diisi dengan angka, huruf, atau spasi.')
                );
                $this->form_validation->set_rules('alamat', 'Alamat supplier', 'required',
                array('required' => '%s harus diisi!')
                );		
                $this->form_validation->set_rules('no_telp', 'Nomor telepon', 'required|numeric',
                array('required' => '%s harus diisi!',
                        'numeric' => '%s hanya diisi oleh angka!'
                )
                );
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
                array('required' => '%s harus diisi!',
                      'valid_email' => 'Masukkan alamat %s yang valid.',
                )
                );

                $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
                $data=['title'=>'Supplier | Edit Data Supplier',
                'heading' => 'Form Edit Data Supplier'];

                if ($this->form_validation->run()) {
                        $this->db->where('id_supplier',$this->input->post('id_supplier'));
                        $this->db->update('supplier',$data); 
                        redirect('c_supplier/view_data'); 
                }
                $data["supplier"] = $supplier;
                if (!$data["supplier"]) show_404();
                
                $this->load->view('templates/header',$data);
                $this->load->view('masterdata/edit_form', $data);
                $this->load->view('templates/footer', $data);

        }

            public function update($id)
        {
            $data=array(
                'supplier'=>$this->m_supplier->getDataEdit($id)
            );
            //$this->load->view('templates/header', $data);
            $this->load->view('masterdata/view_data',$data);
            $this->load->view('templates/footer',$data);
            

        }
        public function update_supplier()
        {
            $data=array(
                'nama'=>$this->input->post('nama'),
                'alamat'=>$this->input->post('alamat'),
                'no_telp'=> $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                
            );
            $this->db->where('id_supplier',$this->input->post('id_supplier'));
            $this->db->update('supplier',$data); 
            redirect(site_url('c_supplier/view_data'));
        }

        public function delete_data($id)
        {
                //if (!isset($id)) show_404();

                if ($this->m_supplier->delete($id)) {
                        redirect(site_url('c_supplier/view_data'));
                }
        }

}
?>