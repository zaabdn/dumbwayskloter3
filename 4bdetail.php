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
		<div id="content">
			<?php  
			$sql = "SELECT k.id, k.nama, k.diresmikan, k.photo, p.nama as name FROM kabupaten_tb k JOIN provinsi_tb p ON k.provinsi_id=p.id WHERE k.provinsi_id='".$_GET['id']."'";
			$query = mysqli_query($koneksi, $sql) or die( mysqli_error($koneksi));
			while($data = mysqli_fetch_array($query))
			{
				?>
				<div class="card">
					<div class="card-header">
						<h3><?php echo $data['nama']; ?></h3>
					</div>
					<div class="row">
						<article style="text-align: justify; margin: 10px auto;">
							<img src="<?php echo $data['photo']; ?>" class="featured-image">
							<div style="width: 100%;">
								<div style="width: 100%; text-align: center;">
									<h5 style="color: black;"><?php echo $data['diresmikan']; ?></h5>
								</div>
								<p style="font-size: 9pt;">Provinsi <?php echo $data['name']; ?></p>
							</div>
						</article>
					</div>
					<center>
						<a href="4beditkab.php?aksi=edit&id=<?php echo $data['id'];?>">
							<button class="loadmore" style="background-color: orange;">EDIT</button>
						</a>
						<a href="4bdetail.php?aksi=delete&id=<?php echo $data['id']; ?>">
							<button class="loadmore" style="background-color: red;" name="hapus" onclick="return confirm('Apakah anda yakin untuk mengahapus data ini?')">HAPUS</button>
						</a>
					</center>
				</div>

				<!--Modal Edit Game -->
				<div class="cssmodal" id="editprovinsi">
					<figure>
						<a href="#" style="float: right;">Tutup Modal</a><br>
						<form method="POST" action="4b.php?aksi=add; ?>" enctype="multipart/form-data" >
							<section class="base">
								<div>
									<label class="label-game">Nama</label>
									<input type="text" name="nama" autofocus="" required="" value="<?php echo $_GET['nama'] ?>" class="input-game" />
								</div>
								<div>
									<label class="label-game">Gambar</label>
									<input type="file" name="gambar" required="" class="input-game" />
								</div>
								<div>
									<label class="label-game">Diresmikan</label>
									<input type="text" name="diresmikan" autofocus="" required=""  value="<?php echo $_GET['diresmikan'] ?>" class="input-game" />
								</div>
								<div>
									<label class="label-game">Pulau</label>
									<input type="text" name="pulau" autofocus="" required=""  value="<?php echo $_GET['pulau'] ?>" class="input-game" />
								</div>
								<div>
									<button type="submit" name="edit" class="button-game">Simpan</button>
								</div>
							</section>
						</form>
					</figure>
				</div>
				<!--Modal Tambah Game -->
			<?php } ?>
		</div>
	</main>
	<?php

	if (isset($_GET['aksi']) == "edit") {
		if (isset($_POST['ubah'])){
			$rand = rand();
			$nama = $_POST['nama'];
			$diresmikan = $_POST['diresmikan'];
			$pulau = $_POST['pulau'];
			$ekstensi =  array('png','jpg','jpeg','gif'); 
			$filename = $_FILES['gambar']['name'];
			$ukuran = $_FILES['gambar']['size'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);   
			if(!in_array($ext, $ekstensi))  {    
				header("location:4b.php?alert=gagal_ekstensi");
			}else{ 
				move_uploaded_file($_FILES['gambar']['tmp_name'], $rand.'_'.$filename);
				$xx = $rand.'_'.$filename;
				
				$sql = "UPDATE provinsi_tb SET nama='".$nama."', diresmikan='".$diresmikan."', photo='".$xx."', pulau='".$pulau."') WHERE id='".$id."'";
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

	if (isset($_GET['aksi']) == "delete"){
		if(isset($_GET['id']) && isset($_GET['aksi'])){
			$id = $_GET['id'];
			$sql = "DELETE FROM kabupaten_tb WHERE id=".$id;
			$hapus = mysqli_query($koneksi, $sql);

			if(!$hapus){
				die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
					" - ".mysqli_error($koneksi));
			} else {

				echo "<script>alert('Data berhasil dihapus.');window.location='4b.php';</script>";
			}
		}

	} ?>

	<footer>
		<p>Created with <span style="color: #e25555;"> &#10084; </span>by Zainal Abidin</p>
	</footer>
</body>
</html>

