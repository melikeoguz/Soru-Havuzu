<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credential: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token');
header('Content-Type: application/json; charset=utf-8');

include("config.php");

$postJson = json_decode(file_get_contents("php://input"), true);
$today = date("Y-m-d H:i:s");

if($postJson['action'] == "registration_progress") {
	$emailcheck = mysqli_fetch_array(mysqli_query($mysqli,"SELECT email FROM users WHERE email = '$postJson[email]'"));

	if($emailcheck["email"] == $postJson["email"]){
		// Email Already Registered : E-posta zaten kayıtlı
		$result = json_encode(array("success" => false, 'msg' => 'E-posta zaten kayıtlı')); 
	} else {
		$password = md5($postJson['password']);
		$insert = mysqli_query($mysqli, "INSERT INTO users(fullname, gender, datebirth, email, password, createdat, sinavturu) 
			VALUES(
				'$postJson[fullname]',
				'$postJson[gender]',
				'$postJson[datebirth]',
				'$postJson[email]',
				'$password',
				'$today',
				'$postJson[sinav]'
			) ");
		if($insert) {
			$result = json_encode(array("success" => true, "msg" => 'Başarılı Kayıt'));
		} else {
			$result = json_encode(array("success" => false, "msg" => 'Başarısız Kayıt'));
		}
		echo $result;
	}
} else if($postJson['action'] == 'login_progress'){
	$password = md5($postJson["password"]);
	$loginData = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$postJson[email]' AND password = '$password'"));

	$data = array(
		'user_id' => $loginData['user_id'],
		'fullname' => $loginData['fullname'],
		'gender' => $loginData['gender'],
		'datebirth' => $loginData['datebirth'],
		'email' => $loginData['email'],
		'sinav' => $loginData['sinavturu']
	);

	if($loginData) {
		$result = json_encode(array('success' => true, 'result' => $data));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
} else if($postJson['action'] == 'load_users'){
	$data = array();

	$query = mysqli_query($mysqli,"SELECT * FROM users ORDER BY user_id DESC LIMIT $postJson[start],$postJson[limit]");

	while ($row = mysqli_fetch_array($query)) {
		$data[] = array(
			'user_id' => $row["user_id"],
			'fullname' => $row["fullname"],
			'gender' => $row["gender"],
			'datebirth' => $row["datebirth"],
			'email' => $row["email"]
		);
	}

	if($query) {
		$result = json_encode(array('success' => true, 'result' => $data));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
} else if($postJson['action'] == 'delete_user'){
	$data = array();

	$query = mysqli_query($mysqli,"DELETE FROM users WHERE user_id = '$postJson[id]'");

	if($query) {
		$result = json_encode(array('success' => true));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
} else if($postJson['action'] == 'kullanici_bilgileri'){
	$data = array();

	$query = mysqli_query($mysqli,"SELECT * FROM users WHERE user_id='$postJson[id]'");

	while ($row = mysqli_fetch_array($query)) {
		$data[] = array(
			'fullname' => $row["fullname"],
			'gender' => $row["gender"],
			'datebirth' => $row["datebirth"],
			'email' => $row["email"]
		);
	}

	if($query) {
		$result = json_encode(array('success' => true, 'result' => $data));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
} else if($postJson['action'] == 'crud_progress'){
	
	$password = md5($postJson['password']);
	$passcheck = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM users WHERE user_id = '$postJson[id]'"));

	if($postJson["password"] == ""){
		$password = $passcheck["password"];
	} else {
		$password = md5($postJson['password']);
	}

	if($postJson["crudAct"] == "Create"){
		$emailcheck = mysqli_fetch_array(mysqli_query($mysqli,"SELECT email FROM users WHERE email = '$postJson[email]'"));
			if($emailcheck["email"] == $postJson["email"]){
			// Email Already Registered : E-posta zaten kayıtlı
			$result = json_encode(array("success" => false, 'msg' => 'E-posta zaten kayıtlı')); 
		} else {
			$password = md5($postJson['password']);
			$insert = mysqli_query($mysqli, "INSERT INTO users(fullname, gender, datebirth, email, password, createdat) 
				VALUES(
					'$postJson[fullname]',
					'$postJson[gender]',
					'$postJson[datebirth]',
					'$postJson[email]',
					'$password',
					'$today'
				) ");
			if($insert) {
				$result = json_encode(array("success" => true, "msg" => 'Başarılı Kayıt'));
			} else {
				$result = json_encode(array("success" => false, "msg" => 'Başarısız Kayıt'));
			}
			echo $result;
		}
	} else if ($postJson["crudAct"] == "Update"){
		$Update = mysqli_query($mysqli, "UPDATE users SET 
			fullname = '$postJson[fullname]', 
			gender = '$postJson[gender]', 
			email = '$postJson[email]',
			datebirth = '$postJson[datebirth]',
			password = '$password' WHERE user_id='$postJson[id]'");

		if($Update) {
			$result = json_encode(array("success" => true, "msg" => 'Güncelleme Başarılı'));
		} else {
			$result = json_encode(array("success" => false, "msg" => 'İşlem Başarısız'));
		}
		echo $result;
	}
} else if($postJson['action'] == 'soru_listesi'){
	$data = array();

	$query = mysqli_query($mysqli,"SELECT * FROM sorular WHERE sinav='$postJson[sinav]' ORDER BY rand() LIMIT 0,10");
	$i = 1;
	while ($row = mysqli_fetch_array($query)) {
		$data[] = array(
			"soru" => $row["soru"],
			"dogru_sik" => $row["dogru"],
			"a_sikki" => $row["a_sikki"],
			"b_sikki" => $row["b_sikki"],
			"c_sikki" => $row["c_sikki"],
			"d_sikki" => $row["d_sikki"],
			"e_sikki" => $row["e_sikki"],
			"a_sikki" => $row["a_sikki"],
			"i" => $i
		);
		$i++;
	}
	if($query) {
		$result = json_encode(array('success' => true, 'result' => $data));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
} else if($postJson["action"] == "sonuclari_gir"){
	if($postJson["user_id"]!=""){
		$today = date('Y-m-d');
		$toplam = $postJson["dogru"] + $postJson["yanlis"];
		if($toplam == 5){
			$soru_puani = 20;
		} else if ($toplam == 10) {
			$soru_puani = 10;
		}

		$puan = $postJson["dogru"] * $soru_puani;

		$query = mysqli_query($mysqli,"INSERT INTO sonuc_tablo (dogru, yanlis, user_id, kayit_tarihi, puan) VALUES ('$postJson[dogru]', '$postJson[yanlis]','$postJson[user_id]', '$today', $puan) ");
		if($query) {
			$result = json_encode(array('success' => true));
		} else {
			$result = json_encode(array('success' => false));
		}
	} else {
		$result = json_encode(array('success' => false));
	}
	echo $result;
} else if($postJson['action'] == 'sonuclar_listesi'){
	$data = array();

	$query = mysqli_query($mysqli,"SELECT * FROM sonuc_tablo WHERE user_id='$postJson[user_id]'");
	while ($row = mysqli_fetch_array($query)) {
		$data[] = array(
			"kayit_tarihi" => $row["kayit_tarihi"],
			"dogru" => $row["dogru"],
			"yanlis" => $row["yanlis"],
			"sonuc_id" => $row["sonuc_id"],
			"puan" => $row["puan"]
		);
		$i++;
	}
	if($query) {
		$result = json_encode(array('success' => "SELECT * FROM sonuc_tablo WHERE user_id='$postJson[user_id]'", 'result' => $data));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
} else if($postJson['action'] == 'delete_sonuc'){
	$data = array();

	$query = mysqli_query($mysqli,"DELETE FROM sonuc_tablo WHERE sonuc_id = '$postJson[sonuc_id]'");

	if($query) {
		$result = json_encode(array('success' => true));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
} else if($postJson['action'] == 'en_iyi_kisi'){

	$query = mysqli_query($mysqli,"SELECT u.fullname, s.puan FROM sonuc_tablo s 
		LEFT JOIN users u ON u.user_id = s.user_id
		WHERE u.sinavturu='$postJson[sinav]' 
		ORDER BY s.puan DESC"
	);

	$row = mysqli_fetch_assoc($query);


	$data[0] = array('fullname' => $row["fullname"], "puan" => $row["puan"]);

	if($query) {
		$result = json_encode(array('success' => true, 'result' => $data));
	} else {
		$result = json_encode(array('success' => false));
	}

	echo $result;
}
