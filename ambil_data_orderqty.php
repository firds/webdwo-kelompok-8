<?php
include_once('koneksi.php');

// Query untuk mengambil data dari tabel fakta_penjualan
$query = "select concat(w.Tahun, ' ', monthname(w.Tanggal)) as tanggal, 
sum(fp.OrderQty) as orderqty
from `fakta penjualan` fp
join waktu w on w.time_id = fp.time_id 
group by year(w.Tanggal), month(w.Tanggal);";
$result = mysqli_query($koneksi, $query);

// Simpan hasil query ke dalam array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mengirim data dalam format JSON
echo json_encode($data);
?>