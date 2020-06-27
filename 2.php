<?php 

$x = [20, 12, 35, 11, 17, 9, 58, 23, 69, 21];
$jumlah = 9;

echo "Awal : ";
for ($i=0; $i <= $jumlah; $i++) { 
	echo $x[$i]." ";
}

$index=0;
while($index<$jumlah)
{
	$i=0;
	while($i<$jumlah-$index)
	{
		if ($x[$i] > $x[$i+1])
		{
			$y = $x[$i];
			$x[$i] = $x[$i+1];
			$x[$i+1] = $y;
		}
		$i++;
	}
	$index++;
}
echo "<br>Hasil : ";
for ($i=0; $i<= $jumlah; $i++)
	echo $x[$i]." ";

?>