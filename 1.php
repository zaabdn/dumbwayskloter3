<?php 

	function Hitungbarang($barang, $jumlah){
		$totalA = $jumlah*4550;
		$totalB = $jumlah*5330;
		$totalC = $jumlah*8653;

		if ($barang=='A' && $jumlah <= 13) {
			echo "Total harga barang : " .$totalA. "<br>";
			echo "Potongan : 0 <br>";
			echo "Total yang harus dibayar : " .$totalA;
		}elseif ($barang=='A' && $jumlah > 13) {
			$potonganA = 231*$jumlah;
			$bayarA = $totalA-$potonganA;
			echo "Total harga barang : " .$totalA. "<br>";
			echo "Potongan : " .$potonganA. "<br>";
			echo "Total yang harus dibayar : " .$bayarA;
		}elseif ($barang=='B' && $jumlah <= 7) {
			echo "Total harga barang : " .totalB. "<br>";
			echo "Potongan : 0 <br>";
			echo "Total yang harus dibayar : " .$totalB;
		}elseif ($barang=='B' && $jumlah > 7) {
			$potonganB = $totalB*23/100;
			$bayarB = $totalB-$potonganB;
			echo "Total harga barang : " .$totalB. "<br>";
			echo "Potongan : " .$potonganB. "<br>";
			echo "Total yang harus dibayar : " .$bayarB;
		}elseif ($barang=='C') {
			echo "Total harga barang : " .$totalC. "<br>";
			echo "Potongan : 0 <br>";
			echo "Total yang harus dibayara : " .$totalC;
		}
	}

	Hitungbarang('A', 14);

?>
