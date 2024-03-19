<?php
// nama file data01.php
// sertakan file koneksi database
include "koneksidb.php";

// query untuk mengambil data
$no_urut = 0;
$query = "SELECT nilai.thn_akademik, nilai.nilai, m_mahasiswa.nim, m_mahasiswa.nm_mhs, m_matakuliah.kode_mk, m_matakuliah.nama_mk
		  FROM nilai
		  INNER JOIN m_mahasiswa ON nilai.nim = m_mahasiswa.nim
		  INNER JOIN m_matakuliah ON nilai.kode_mk = m_matakuliah.kode_mk";
		  
// eksekusi query
$result = mysqli_query($conn, $query);

// tampilkan hasil
echo "<table align='center' width='50%' border='1' cellspacing='1' cellpadding='1'>
			 <th>NO</th>
			 <th>NIM</th>
			 <th>NAMA</th>
			 <th>KODE MK</th>
			 <th>NAMA MK</th>
			 <th>TAHUN AKADEMIK</th>
			 <th>NILAI</th>
		</tr>";
		
while ($row = mysqli_fetch_array($result)) {
	$no_urut++;
	echo "<tr>
			<td>{$no_urut}</td>
			<td>{$row['nim']}</td>
			<td>{$row['nm_mhs']}</td>
			<td>{$row['kode_mk']}</td>
			<td>{$row['nama_mk']}</td>
			<td>{$row['thn_akademik']}</td>
			<td>{$row['nilai']}</td>
		 </tr>";
}

echo "</table>";

?>