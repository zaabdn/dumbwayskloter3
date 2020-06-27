<!DOCTYPE html>
<html>
<title>ZA</title>
<head>
	<link rel="stylesheet" type="text/css" href="4.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php 
	$koneksi = mysqli_connect("localhost", "root", "", "wilayah")or die(mysqli_error());
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	?>
	<header>
		<nav>
			<ul>
				<div class="judul">
					<a href="4b.php"><b>Provinsi&</b>Kabupaten</a></li>
				</div>
			</ul>
		</nav>
	</header>
	<main>
		<div style="float: right;">
			<a href="4b.php"><button class="loadmore" style="background-color: green;"><<< BACK</button></a>
		</div>
		<div id="content" style="margin: 0;">
			<?php  
			$sql = "SELECT k.nama, k.id, k.diresmikan, k.provinsi_id, k.photo, p.nama as name FROM kabupaten_tb k JOIN provinsi_tb p ON k.provinsi_id=p.id WHERE k.id='".$_GET['id']."'";
			$query = mysqli_query($koneksi, $sql) or die( mysqli_error($koneksi));
			while($data = mysqli_fetch_array($query))
			{
				?>
				<div class="card" style="width: 80%; margin: auto;">
					<div class="card-header">
						<h3><?php echo $data['nama']; ?></h3>
					</div>
					<form method="POST" action="4beditkab.php?aksi=edit&id=<?php echo $data['id']; ?>" enctype="multipart/form-data" >
						<section class="base">
							<div>
								<label class="label-game">Nama Kabupaten</label>
								<input type="text" name="nama" autofocus="" required="" value="<?php echo $data['nama'] ?>" class="input-game" />
							</div>
							<div>
								<label class="label-game">Gambar</label>
								<input type="file" name="gambar" value="<?php echo $data['photo']; ?>" required="" class="input-game"/>
							</div>
							<div>
								<label class="label-game">Diresmikan</label>
								<input type="text" name="diresmikan" autofocus="" required="" value="<?php echo $data['diresmikan'] ?>" class="input-game" />
							</div>
							<div>
								<label class="label-game">Provinsi</label>
								<select class="input-game" name="provinsi">
									<?php  
									$sql = "SELECT * FROM provinsi_tb ORDER BY nama ASC";
									$query = mysqli_query($koneksi, $sql) or die( mysqli_error($koneksi));
									while($data = mysqli_fetch_array($query))
									{
										?>
										<option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div>
								<button type="submit" style="margin: 7px 0; float: right;" name="ubah" class="button-game">Simpan</button>
							</div>
						</section>
					</form>
				</div>
			<?php } ?>
		</div>
	</main>
	<?php

	if (isset($_GET['aksi']) == "edit") {
		if (isset($_POST['ubah'])){
			$rand = rand();
			$nama = $_POST['nama'];
			$diresmikan = $_POST['diresmikan'];
			$provinsi = $_POST['provinsi'];
			$ekstensi =  array('png','jpg','jpeg','gif'); 
			$filename = $_FILES['gambar']['name'];
			$ukuran = $_FILES['gambar']['size'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);   
			if(!in_array($ext, $ekstensi))  {    
				header("location:4b.php?alert=gagal_ekstensi");
			}else{ 
				move_uploaded_file($_FILES['gambar']['tmp_name'], $rand.'_'.$filename);
				$xx = $rand.'_'.$filename;
				
				$sql = "UPDATE kabupaten_tb SET nama='".$nama."', provinsi_id='".$provinsi."', diresmikan='".$diresmikan."', photo='".$xx."' WHERE id='".$_GET['id']."'";
				$ubah = mysqli_query($koneksi, $sql);

				if(!$ubah){
					die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
						" - ".mysqli_error($koneksi));
				} else {
					echo "<script>alert('Data berhasil diubah.');window.location='4b.php';</script>";
				}
			}
		}
	}
	?>

	<footer style="margin-top: 30px; ">
		<p>Created with <span style="color: #e25555;"> &#10084; </span>by Zainal Abidin</p>
	</footer>
</body>
</html>

