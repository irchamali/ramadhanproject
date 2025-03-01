<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Membuat Jadwal Shalat Dengan PHP</title>
</head>
<body>
 
	<h2>Jadwal Shalat dan Imsakiyah</h2>
 
	<?php
 
	$api_url = 'https://api.myquran.com/v2/sholat/jadwal/1301/2025/3/1';
 
	// membaca JSON dari url
	$json_data = file_get_contents($api_url);
 
	// Decode data JSON data menjadi array PHP
	$response_data = json_decode($json_data);
 
	// Mengakses data yang ada dalam object 'data'
	$jadwal_shalat = $response_data->data;
 
	?>
 
	Lokasi : <?php echo $jadwal_shalat->lokasi; ?>
	<br>
	Daerah : <?php echo $jadwal_shalat->daerah; ?>
	<br>
	<br>
	Tanggal : <?php echo $jadwal_shalat->jadwal->tanggal; ?>
	<br>
	<br>
	
	<table border="1">
		<tr>
			<td>Imsak</td>
			<td><?php echo $jadwal_shalat->jadwal->imsak; ?></td>
		</tr>
		<tr>
			<td>subuh</td>
			<td><?php echo $jadwal_shalat->jadwal->subuh; ?></td>	
		</tr>
		<tr>
			<td>dzuhur</td>
			<td><?php echo $jadwal_shalat->jadwal->dzuhur; ?></td>	
		</tr>
		<tr>			
			<td>ashar</td>
			<td><?php echo $jadwal_shalat->jadwal->ashar; ?></td>	
		</tr>
		<tr>			
			<td>maghrib</td>
			<td><?php echo $jadwal_shalat->jadwal->maghrib; ?></td>	
		</tr>
		<tr>
			<td>isya</td>
			<td><?php echo $jadwal_shalat->jadwal->isya; ?></td>
		</tr>
	</table>
</body>
</html>