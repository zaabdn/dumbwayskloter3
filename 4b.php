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
			<a href="#modalprovinsi"><button class="loadmore" id="addgame">ADD PROVINSI</button></a>
			<a href="#modalkabupaten"><button class="loadmore">ADD KABUPATEN</button></a>
		</div>

		<!--Modal Tambah Game -->
		<div class="cssmodal" id="modalprovinsi">
			<figure>
				<a href="#" style="float: right;">Tutup Modal</a><br>
				<form method="POST" action="4b.php?aksi=add; ?>" enctype="multipart/form-data" >
					<section class="base">
						<div>
							<label class="label-game">Nama</label>
							<input type="text" name="nama" autofocus="" required="" placeholder="Yogyakarta" class="input-game" />
						</div>
						<div>
							<label class="label-game">Gambar</label>
							<input type="file" name="gambar" required="" class="input-game" />
						</div>
						<div>
							<label class="label-game">Diresmikan</label>
							<input type="text" name="diresmikan" autofocus="" required="" placeholder="08 Maret 1997" class="input-game" />
						</div>
						<div>
							<label class="label-game">Pulau</label>
							<input type="text" name="pulau" autofocus="" required="" placeholder="Jawa" class="input-game" />
						</div>
						<div>
							<button type="submit" name="simpan" class="button-game">Simpan</button>
						</div>
					</section>
				</form>
			</figure>
		</div>
		<!--Modal Tambah Game -->

		<!--Modal Tambah Genre -->
		<div class="cssmodal" id="modalkabupaten">
			<a href="#" class="veil"></a>
			<figure>
				<a href="#" style="float: right;">Tutup Modal</a><br>
				<form method="POST" action="4b.php?aksi=addkabupaten; ?>" enctype="multipart/form-data" >
					<section class="base">
						<div>
							<label class="label-game">Nama</label>
							<input type="text" name="nama" autofocus="" required="" placeholder="Malang" class="input-game" />
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
							<label class="label-game">Diresmikan</label>
							<input type="text" name="diresmikan" autofocus="" required="" class="input-game" />
						</div>
						<div>
							<label class="label-game">Gambar</label>
							<input type="file" name="gambar" required="" class="input-game" />
						</div>
						<div>
							<button type="submit" name="simpankab" class="button-game">Simpan</button>
						</div>
					</section>
				</form>
			</figure>
		</div>
		<!--Modal Tambah Game -->

		<div id="content">
			<?php  
			$sql = "SELECT * FROM provinsi_tb";
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
							</div>
						</article>
					</div>
					<center>
						<a href="4bdetail.php?id=<?php echo $data['id']; ?>">
							<button class="loadmore">DETAIL</button>
						</a>
						<a href="4beditprov.php?id=<?php echo $data['id']; ?>">
							<button class="loadmore" style="background-color: orange;">EDIT</button>
						</a>
						<a href="4b.php?aksi=delete&id=<?php echo $data['id']; ?>">
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
	if (isset($_GET['aksi']) == "add") {
		if (isset($_POST['simpan'])){
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
				
				$sql = "INSERT INTO provinsi_tb (nama, diresmikan, photo, pulau) VALUES('".$nama."','".$diresmikan."','".$xx."','".$pulau."')";
				$simpan = mysqli_query($koneksi, $sql);

				if(!$simpan){
					die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
						" - ".mysqli_error($koneksi));
				} else {
					echo "<script>alert('Data berhasil ditambah.');window.location='4b.php';</script>";
				}
			}
		}
	}

	if (isset($_GET['aksi']) == "addkabupaten") {
		if (isset($_POST['simpankab'])){
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
				
				$sql = "INSERT INTO kabupaten_tb (nama, provinsi_id, diresmikan, photo) VALUES('".$nama."','".$provinsi."','".$diresmikan."','".$xx."')";
				$simpan = mysqli_query($koneksi, $sql);

				if(!$simpan){
					die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
						" - ".mysqli_error($koneksi));
				} else {
					echo "<script>alert('Data berhasil ditambah.');window.location='4b.php';</script>";
				}
			}
		}
	}

	if (isset($_GET['aksi']) == "delete"){
		if(isset($_GET['id']) && isset($_GET['aksi'])){
			$id = $_GET['id'];
			$sql = "DELETE FROM provinsi_tb WHERE id=".$id;
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

