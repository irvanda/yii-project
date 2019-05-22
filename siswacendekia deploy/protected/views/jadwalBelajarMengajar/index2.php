<?php
$this->breadcrumbs=array(
	'Jadwal Belajar Mengajars',
);

$this->menu=array(
	array('label'=>'Create JadwalBelajarMengajar', 'url'=>array('create')),
	array('label'=>'Manage JadwalBelajarMengajar', 'url'=>array('admin')),
);

$tabeljadwal = array();
$day;
echo "<table id='newspaper-b'>";
foreach($jadwal as $barisjadwal)
{
	$format = '%H:%M:%S';
	echo "<tr>".
	"<td>".$barisjadwal->hari."</td>".
	"<td>".(strptime($barisjadwal->jam_mulai, $format))."</td>".
	"<td>".$barisjadwal->jam_selesai."</td>".
	"<td>".$barisjadwal->pelajaran."</td>".
	"<td>".$barisjadwal->Pengajar_User_id."</td>".	
	"</tr>";
	
	if($barisjadwal->hari=='Senin')
		$days = 0;
	else if($barisjadwal->hari=='Selasa')
		$days = 1;
	else
		$days = 2;
	
	//while()
		//$tabeljadwal[][$days] = 1;
}
echo "</table>";

?>

<h1>Jadwal Belajar Mengajars</h1>
<table id='newspaper-b'>
	<thead>
		<td>Jam\Hari</td>
		<td>Senin</td>
		<td>Selasa</td>
		<td>Rabu</td>
		<td>Kamis</td>
		<td>Jumat</td>
		<td>Sabtu</td>
		<td>Minggu</td>
	</thead>
	<tbody>
		<?php
			$j=7;
			$td='<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
			for($i=0; $i<26; $i++)
			{
				if($i%2==0){
					$k="00";
					$j++;
				}
				else
				{
					$k="30";
				}
				echo "<tr><td>".$j.":".$k."</td>".$td."</tr>";
			}
		?>
	</tbody>
</table>