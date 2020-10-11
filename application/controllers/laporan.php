<?php

class laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
        if(!$this->session->userdata('is_logged')){
            redirect('auth');
        }
	}

	public function index()
	{
		$data=[
			'title'		=> 'Bolu Lembang | Laporan',
			'pembelian'	=>	$this->m_laporan->get_pembelian(),
			

		];
		$this->load->view('templates/header',$data);
		$this->load->view('laporan/view_laporan_pembelian',$data);
		$this->load->view('templates/footer');
	}

	function pembelian_perbulan()
	{
		$data=[
			'title'		=> 'Bolu Lembang | Laporan',
			'pembelian'	=>	$this->m_laporan->get_pembelian_perbulan(),
		];
		$this->load->view('templates/header',$data);
		$this->load->view('laporan/laporan_perbulan',$data);
		$this->load->view('templates/footer');
	}

	public function pembelian_pdf()
	{
		$this->load->library('pdf'); 
		$pdf= new FPDF('p','mm','A4');
		$pdf->AddPage();

		//header

		$pdf->SetAutoPageBreak(true,60);
		$pdf->SetFont('Arial','B',14);

		$pdf->Cell(200,7,'Laporan Pembelian Bahan Baku',0,1,'C');
		$pdf->Cell(200,7,'Bolu Susu Lembang',0,1,'C');
		$pdf->Cell(200,7,'Per '.date('d F Y'),0,1	,'C');

		//body

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(10,6,'No',1,0,'C');
		$pdf->Cell(60,6,'No. Faktur',1,0,'C');
		$pdf->Cell(50,6,'Tanggal',1,0,'C');
		$pdf->Cell(70,6,'Jumlah',1,1,'C');

		$data=$this->m_laporan->get_pembelian();
		$no=0;
		$total_p=0;

		foreach($data as $row) {
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(10,6,$no=$no+1,1,0,'C');
			$pdf->Cell(60,6,$row->no_faktur,1,0,'C');
			$pdf->Cell(50,6,$row->Tanggal,1,0,'C');
			$pdf->Cell(70,6,nominal($row->total),1,1,'L');
			$total_p=$total_p+$row->total;
		}
		$pdf->Cell(120,6,'Total',1,0,'R');
		$pdf->Cell(70,6,nominal($total_p),1,1,'L');

		$pdf->Output();
	}
	public function pembelian_pdf_perbulan()
	{
		$this->load->library('pdf'); 
		$pdf= new FPDF('p','mm','A4');
		$pdf->AddPage();

		//header

		$pdf->SetAutoPageBreak(true,60);
		$pdf->SetFont('Arial','B',14);

		$pdf->Cell(200,7,'Laporan Pembelian Bahan Baku',0,1,'C');
		$pdf->Cell(200,7,'Bolu Susu Lembang',0,1,'C');
		$pdf->Cell(200,7,'Per '.date('F Y'),0,1	,'C');

		//body

		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(10,6,'No',1,0,'C');
		$pdf->Cell(80,6,'Tanggal',1,0,'C');
		$pdf->Cell(100,6,'Jumlah',1,1,'C');

		$data=$this->m_laporan->get_pembelian_perbulan();
		$no=0;
		$total_p=0;

		foreach($data as $row) {
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(10,6,$no=$no+1,1,0,'C');
			$pdf->Cell(80,6,$row->Tanggal,1,0,'C');
			$pdf->Cell(100,6,nominal($row->total),1,1,'C');
			$total_p=$total_p+$row->total;
		}
		$pdf->Cell(90,6,'Total',1,0,'R');
		$pdf->Cell(100,6,nominal($total_p),1,1,'L');

		$pdf->Output();
	}

	function pembelian_excel()
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition:attachment; filename=pembelian.xls");
		$data=[
			'pembelian'	=> $this->m_laporan->get_pembelian()
		];
		$this->load->view('laporan/laporan_excel',$data);
	}

	function pembelian_excel_perbulan()
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition:attachment; filename=pembelian_bulanan.xls");
		$data=[
			'pembelian'	=> $this->m_laporan->get_pembelian_perbulan()
		];
		$this->load->view('laporan/laporan_excel_perbulan',$data);
	}
}
?>