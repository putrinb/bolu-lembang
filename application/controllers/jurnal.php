<?php
class jurnal extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('m_jurnal');
    }
    public function index()
    {
        $data=[
            'title'     => 'Bolu Susu Lembang | Jurnal Umum',
            'jurnal'    =>  $this->m_jurnal->get_jurnal()

        ];
        $this->load->view('templates/header',$data);
        $this->load->view('laporan/view_data_jurnal_umum',$data);
        $this->load->view('templates/footer');
    }

    public function jurnalumum(){
        $post = $this->input->post();
        $bulan = $this->input->post('bulan'); 
        $tahun = $this->input->post('tahun'); 
        $data=[
            'bulan' => str_pad($bulan,2,"0",STR_PAD_LEFT),
            'tahun' => $tahun,
            'jurnal' => $this->m_jurnal->getJurnalUmum($bulan,$tahun),
            'title' => 'Bolu Susu Lembang | Jurnal Umum',
        ];
        $this->load->view('templates/header',$data);
        $this->load->view('laporan/view_data_jurnal_umum', $data);
        $this->load->view('templates/footer');
    }

    //untuk form jurnal
    public function jurnal(){
        $data=[
            'tahun' => $this->m_jurnal->getTahun(),
            'title' => 'Bolu Susu Lembang | Jurnal Umum'
        ];
        $this->load->view('templates/header',$data);
        $this->load->view('laporan/form_input_data_jurnal', $data);
        $this->load->view('templates/footer');
    }
}

?>