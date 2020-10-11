<?php

class m_jurnal extends CI_Model
{
    function get_jurnal()
    {
        $this->db->select('coa.no_akun,coa.nama_akun,jurnal.tgl_jurnal,jurnal.posisi_dr_cr,jurnal.nominal');
        $this->db->from('jurnal');
        $this->db->join('coa','jurnal.no_akun=coa.no_akun');
        return $this->db->get()->result();
    }

    		//get jurnal
		public function getJurnalUmum($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$waktu = $bulan."-".$tahun;
			$sql="	SELECT a.no_transaksi, DATE_FORMAT(a.tgl_jurnal,'%d-%m-%Y') as tanggal,
				   a.posisi_dr_cr,a.nominal,b.nama_akun,a.no_akun
				FROM jurnal a
				JOIN coa b ON (a.no_akun=b.no_akun)
				WHERE   DATE_FORMAT(a.tgl_jurnal,'%m-%Y') = ".$this->db->escape($waktu)." ORDER BY 1 ASC, 2 ASC, 5 ASC, 3 DESC ";
				//echo $sql."<br>";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		//data tahun
		public function getTahun(){
			$sql = "
						SELECT year(waktu) as tahun 
						FROM pembelian
						ORDER BY 1 ASC			
					";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
}
?>