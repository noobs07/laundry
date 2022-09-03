<?php



//date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
					
//fungsi penambahan otomatis
//this function created by Sigit Dwi Prasetyo
function penambahan($conn, $teks1, $teks2)
{
	$id=0;
	$query=mysqli_query($conn, $teks1);
	$qry=mysqli_query($conn, $teks2);
	$inc=mysqli_fetch_array($qry);
	$nrow=mysqli_num_rows($query);

	if ($nrow==0){
		$id=1;	
	}else{
		$inc['inc']=$inc['inc']+1;
		$id=$inc['inc'];
		
	}
	return $id;
}
?>
