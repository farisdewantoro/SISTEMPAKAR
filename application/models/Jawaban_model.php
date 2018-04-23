<?php

class Jawaban_model extends CI_Model
{

  function __construct()
  {
$this->load->database();
  }






public function jawabanUser(){
  $kodep=$this->input->post('KodePertanyaan');
  $pertanyaan=$this->input->post('Pertanyaan');
  $tanggal=$this->input->post('Tanggal');
  $waktu=$this->input->post('Waktu');

  if (isset($_POST['btnYa'])) {
    $jawaban = 'YA';
  }
  if (isset($_POST['btnNo'])) {
    $jawaban = 'NO';
  }


$data = array(
  'KodePertanyaan' => $this->input->post('KodePertanyaan'),
    'Pertanyaan'  =>    $this->input->post('Pertanyaan'),
    'Tanggal' =>   $this->input->post('Tanggal'),
      'Waktu'=>  $this->input->post('Waktu'),
      'username'=>$this->session->userdata('username'),
      'jawaban'=>$jawaban
 );


 return $this->db->insert('riwayatjawaban',$data);



}

public function tampilJawaban(){
$username = $this->session->userdata('username');
$this->db->select('*');
$this->db->from('riwayatjawaban');
$this->db->where('username',$username);
$query=$this->db->get();
  return $query->result_array();


}

public function cariPertanyaanNo(){
  $username = $this->session->userdata('username');
$qRiwayat = $this->db->query("SELECT kodePertanyaan from riwayatjawaban where jawaban ='NO' and username ='$username' ");

   $b ='';
   $x = '';
    foreach ($qRiwayat->result() as $row)
    {
             $a= $row->kodePertanyaan;
             $vpvpvp[]=$a;
             $b .= "%$a%";
             $x .="$a,";
    }
         $query2=$this->db->query("SELECT KodePertanyaan from tabelrule where KodePertanyaan not like ('$b')");
  $data = '';
         foreach ($query2->result() as $as) {
           $c = $as->KodePertanyaan;
      $da= "$c<br>";

  $data .= "$da";
         }

  $dc = explode(" ",$data);
  $asd = implode(",",$dc);
  $dax = explode(",",$asd);



  foreach ($dax as $cp ) {
    $cxxx = "$cp";
  $zzz[] = "KodePertanyaan LIKE '%$cxxx%'";
  }

   $query3=$this->db->query("SELECT * from tabelpertanyaan  where ".implode(" OR ",$zzz));


  foreach ($query3->result() as $xar) {



  $pc = $xar->KodePertanyaan;
  $dd[]= "$pc";

  }



  $ubah = implode(",",$dd);

  $ubah= explode(",",$ubah);
  $remove = array_diff($ubah,$vpvpvp);

  foreach ($remove as $rmv ) {
  $vp = "$rmv";

  $zzz2[] = "KodePertanyaan LIKE '%$vp%'";

  }
   $query4=$this->db->query("SELECT KodePertanyaan from tabelpertanyaan  where ".implode(" OR ",$zzz2)."LIMIT 1");
return $fixhasil2 = $query4->result_array();

}




public function cekJawaban(){
  $jawab='NO';
  $this->db->select('jawaban');
  $this->db->from('riwayatjawaban');
  $this->db->where('jawaban',$jawab);
  $cek =$this->db->get()->num_rows();
  return $cek;
}

public function hapusriwayatjawaban(){
$username=$this->session->userdata('username');
$this->db->delete('riwayatjawaban',array('username'=>$username));
}

public function cariPertanyaan(){
$username = $this->session->userdata('username');
  $this->db->select('jawaban');
  $this->db->from('riwayatjawaban');
  $this->db->where('jawaban','NO');
  $this->db->where('username',$username);
  $query = $this->db->get();
  $num = $query->num_rows();
    if ($num >0) {


    $qRiwayat = $this->db->query("SELECT kodePertanyaan from riwayatjawaban where jawaban ='NO' and username = '$username' ");


       $x = '';
        foreach ($qRiwayat->result() as $row)
        {
                 $a= $row->kodePertanyaan;
                 $vpNo[]=$a;
                 $b[]= "KodePertanyaan not like '%$a%'";
                 $x .="$a,";
        }


             $kodeNo=$this->db->query("SELECT KodePertanyaan from tabelrule where ".implode(" AND ",$b));
             $kodeNo = $kodeNo->result_array();
if (!empty($kodeNo)) {


             foreach ($kodeNo as $data ) {
                $datx[]= $data;
             }


    foreach ($datx as $da ) {
      $p[] = $da['KodePertanyaan'];
    }
  $dtNo = implode(",",$p);
  $dtNo = explode(",",$dtNo);


    $removeNo = array_diff($p,$vpNo);

  $removeNo = implode(",",$removeNo);

  $removeNo = explode(",",$removeNo);





    foreach ($removeNo as $daata ) {
      $hasildataNo[] = "KodePertanyaan like '%$daata%'";
    }









  // BAGIAN AKHIR NO
  $username = $this->session->userdata('username');
  $this->db->select('jawaban');
  $this->db->from('riwayatjawaban');
  $this->db->where('jawaban','YA');
  $this->db->where('username',$username);
  $query = $this->db->get();
  $num2 = $query->num_rows();
}else {
  $username=$this->session->userdata('username');
  $this->db->delete('riwayatjawaban',array('username'=>$username));
redirect('Halaman/noresult');
}
    if ($num2 >0 ) {
  $qRiwayat = $this->db->query("SELECT kodePertanyaan from riwayatjawaban where jawaban ='YA' and username='$username' ORDER BY noRjawaban asc ");
  $qRiwayat = $qRiwayat->result_array();

  $b = '';


  foreach ($qRiwayat as $k ) {
        $vpvpvp[]=$k['kodePertanyaan'];
        $c =$k['kodePertanyaan'];
        $b .="%$c%";
  }

  foreach ($vpNo as $dataNo ) {
    $hasilNo[]="KodePertanyaan Not like '%$dataNo%'";
  }
  foreach ($vpvpvp as $dataYa ) {
    $hasilYa[]="KodePertanyaan Like '%$dataYa%'";
  }
  $query3=$this->db->query("SELECT KodePertanyaan from tabelrule  where ".implode(" AND ",$hasilYa)." AND ".implode(" AND ",$hasilNo));
   $query3 = $query3->result_array();
if (!empty($query3)) {
  foreach ($query3 as $key ) {
    $hasilseluruh[]= $key['KodePertanyaan'];
  }




$username = $this->session->userdata('username');

  $query4 = $this->db->query("SELECT kodePertanyaan from riwayatjawaban where username='$username' ");
  $query4 = $query4->result_array();
  foreach ($query4 as $key ) {
    $jawaban[]= $key['kodePertanyaan'];
  }

  $hasilseluruh = implode(",",$hasilseluruh);
  $hasilseluruh = explode(",",$hasilseluruh);

  $hasilFix = array_diff($hasilseluruh,$jawaban);

  foreach ($hasilFix as $data ) {
    $resultdata[] ="KodePertanyaan like '%$data%'";
  }


  $query5=$this->db->query("SELECT * from tabelpertanyaan  where ".implode(" OR ",$resultdata)."LIMIT 1");
$query5 = $query5->result_array();
return $query5;
  // foreach ($query5 as $key ) {
  //   $fixData[]= $key['Pertanyaan'];
  // }

}else {
  $username=$this->session->userdata('username');
  $this->db->delete('riwayatjawaban',array('username'=>$username));
  redirect('Halaman/noresult');
}


}else {
  $queryNosaja=$this->db->query("SELECT * from tabelpertanyaan  where ".implode(" OR ",$hasildataNo)."LIMIT 1");
$queryNosaja = $queryNosaja->result_array();
return $queryNosaja;
}

  }else {
    $username = $this->session->userdata('username');
    $qRiwayat = $this->db->query("SELECT kodePertanyaan from riwayatjawaban where jawaban ='YA' and username='$username' ORDER BY noRjawaban asc ");
    $qRiwayat = $qRiwayat->result_array();

    $b = '';


    foreach ($qRiwayat as $k ) {
          $vpvpvp[]=$k['kodePertanyaan'];
          $c =$k['kodePertanyaan'];
          $b .="%$c%";
    }


           $query2=$this->db->query("SELECT KodePertanyaan from tabelrule where KodePertanyaan like ('$b')");

           $query2=$query2->result_array();
           if (empty($query2)) {
             $username=$this->session->userdata('username');
             $this->db->delete('riwayatjawaban',array('username'=>$username));
             redirect('Halaman/noresult');
           }

    foreach ($query2 as $as ) {
          $cca[]= $as['KodePertanyaan'];
    }


    foreach ($cca as $s ) {
      $ba[]= $s;
    }

    $ba = implode(",",$ba);
    $ba = explode(",",$ba);


    $remove = array_diff($ba,$vpvpvp);
    foreach ($remove as $daata ) {
      $cxxx = "$daata";
      $zzz[] = "KodePertanyaan LIKE '%$cxxx%'";
    }
    $queryAkhir=$this->db->query("SELECT * from tabelpertanyaan  where ".implode(" OR ",$zzz)."LIMIT 1");

    return $queryAkhir->result_array();



  }
}






}
