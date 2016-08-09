<?php

 function hash_password($password){

		return hash('sha512', $password . config_item('encryption_key'));

}


function wordlimiter($string, $limit = 1){

	return str_replace('&#8230;','',word_limiter($string, $limit));

}

function indo_date($date){

	$hari = substr($date, 8, 2);
	$bulan = nama_bulan(substr($date, 5, 2));
	$tahun = substr($date, 0, 4);

	return "$hari/$bulan/$tahun";

}

function tanggal_indo($date){
        /** ARRAY hari dan bulan**/
        $nama_hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $nama_bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        
        $tanggal = substr($date,8,2);
        $bulan = substr($date,5,2);
        $tahun = substr($date,0,4);
        $waktu = substr($date,11,5);
        $hari = date("w", strtotime($date));
        
        
        $result = $nama_hari[$hari].", ".$tanggal." ".$nama_bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";
        return $result;
    }

function nama_bulan($month){

	switch($month){

		case 1: return 'Jan'; break;
		case 2: return 'Feb'; break;
		case 3: return 'Mar'; break;
		case 4: return 'Apr'; break;
		case 5: return 'Mei'; break;
		case 6: return 'Jun'; break;
		case 7: return 'Jul'; break;
		case 8: return 'Agt'; break;
		case 9: return 'Sep'; break;
		case 10: return 'Okt'; break;
		case 11: return 'Nov'; break;
		case 12: return 'Des'; break;

	}

}

function rupiah($number){

		return 'Rp. '.number_format($number,0,',','.');

}