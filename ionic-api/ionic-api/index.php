<?php
include("config.php");

if($_GET["islem"] == "insert"){
	$soru = trim($_POST["soru"]);
	$sinav = trim($_POST["sinav"]);
	$a_sikki = trim($_POST["a_sikki"]);
	$b_sikki = trim($_POST["b_sikki"]);
	$c_sikki = trim($_POST["c_sikki"]);
	$d_sikki = trim($_POST["d_sikki"]);
	$e_sikki = trim($_POST["e_sikki"]);
	$dogru = trim($_POST["dogru"]);

	$insert = mysqli_query($mysqli, "INSERT INTO sorular(soru, sinav, a_sikki, b_sikki, c_sikki, d_sikki, e_sikki, dogru) 
			VALUES(
				'$soru',
				'$sinav',
				'$a_sikki',
				'$b_sikki',
				'$c_sikki',
				'$d_sikki',
				'$e_sikki',
				'$dogru'
			) ");
	if($insert){
		header("location:index.php?mesaj=basarili");
	} else {
		$mesaj = "hata oldu";
	}
}
if($_GET["mesaj"] == "basarili") $mesaj = "kayıt başaralı";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Soru Ekle</title>
</head>
<body>

	<?= $mesaj;?>

	<form action="index.php?islem=insert" method="post">

		<div class="item">
			<label>Soru</label>
			<textarea name="soru"></textarea>
		</div>

		<div class="Sor">
			<label>Sınav</label>
			<select name="sinav">
				<option value="yks">YKS</option>
				<option value="kpss">KPSS</option>
				<option value="ales">ALES</option>
				<option value="lgs">LGS</option>
			</select>
		</div>

		<div class="item">
			<label>A Şıkkı</label>
			<input type="text" name="a_sikki">
		</div>

		<div class="item">
			<label>B Şıkkı</label>
			<input type="text" name="b_sikki">
		</div>

		<div class="item">
			<label>C Şıkkı</label>
			<input type="text" name="c_sikki">
		</div>

		<div class="item">
			<label>D Şıkkı</label>
			<input type="text" name="d_sikki">
		</div>

		<div class="item">
			<label>E Şıkkı</label>
			<input type="text" name="e_sikki">
		</div>

		<div class="item">
			<label>Doğru Şık (kücük harf ile yaz)</label>
			<input type="text" name="dogru">
		</div>

		<button type="submit">Kaydet</button>
		
	</form>

</body>
</html>