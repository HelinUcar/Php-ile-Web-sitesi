<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <title>201813709034 - Helin Duygu UÇAR</title>
	
</head>
<!--kullanici.php-->
<body class="text-center">
<svg class="bi bi-people-fill" width="10em" height="10em" viewBox="0 0 16 16" fill="#847da7" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0
  1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>
    <h3 style="color:#6e177e">Lütfen Giriş Yapınız</h3>
	<style>
        div.w-25{
         margin-left: auto;
         margin-right: auto;
         width: 50em;
         text-align: left;
		}
	</style>
    <form action="" method="post">
	    <div class="w-25">
         <label for="eposta"></label>
         <input type="email" class="form-control" name="eposta" id="eposta" placeholder="E-Posta adresi" required>
        </div>
        <div class="w-25">
         <label for="sifre"></label>
         <input type="password" class="form-control" name="sifre" id="sifre" placeholder="Şifre" required>
        </div>
		<br>
        <button type="submit" class="btn btn-outline-primary" name="giris" value="giris">Giriş</button><br>
		
<?php
    $sunucu_adi="localhost";
    $kullaniciAdi="root";
    $sifre="";
    $veri_tabani="final";

    $baglanti = new mysqli($sunucu_adi, $kullaniciAdi, $sifre,$veri_tabani);
    if ($baglanti->connect_error){
		die("Bağlantı sağlanamadı : ".$baglanti->connect_error);
	}
	error_reporting(0);
    session_start();
	if($_POST){
		$Eposta=$_POST["eposta"];
		$Sifre =$_POST["sifre"];
		$giris="SELECT * FROM kullanici WHERE eposta='$Eposta' && sifre='$Sifre'";
		$getir=$baglanti->query($giris);
		if($getir->num_rows>0){
			while($row= $getir->fetch_assoc()){
				$_SESSION["ID"] = $row["id"];
				$_SESSION["kullanici_adi"] = $row["kullanici_adi"];
			    header("location:201813709034_2.php");
				die();
			}
		}
		else{
?>
        <br><div class="alert alert-danger w-25  text-center" role="alert">
		 <svg class="bi bi-exclamation-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
</svg>
			<font size="-1">Yanlış bilgi girdiniz.</font>
			</div>
<?php			  
		}	
	}		
?>

        <p class="mt-5 mb-3 text-muted">© Final Sınavı </p>

	</form>
    <script src="js/jquery-3.5.1.slim.min.js"</script>
    <script src="js/popper.min.js" </script>
    <script src="js/bootstrap.min.js" </script>
</body>
</html>