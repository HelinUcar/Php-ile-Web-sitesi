<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>201813709034 - Helin Duygu UÇAR</title>
  </head>
  <body class="text-enter">
  <?php
  $sunucu_adi="localhost";
    $kullanici_adi="root";
    $sifre="";
    $veri_tabani="final";

    $baglanti = new mysqli($sunucu_adi, $kullanici_adi, $sifre,$veri_tabani);
    if ($baglanti->connect_error){
		die("Bağlantı sağlanamadı : ".$baglanti->connect_error);
	}
	
	
    if(isset($_POST["ekle"]))
	{
      $sql = "INSERT INTO `urun` (`id`, `urun_adi`, `adet`, `fiyat`)
	  VALUES (NULL, '".$_POST['hu_urun_adi']."', '".$_POST['hu_adet']."', '".$_POST['hu_fiyat']."')";
	  $baglanti->query($sql);
	}
	if(isset($_POST["guncelle"]))
	{
      $sorgu = "UPDATE `urun` SET `urun_adi` = '".$_POST['hu_urun_adi']."', `adet` = '".$_POST['hu_adet']."', `fiyat` = '".$_POST['hu_fiyat']."' 
	  WHERE `urun`.`id` = ".$_POST['kayit_no'].";";
	  $baglanti->query($sorgu);
	}
	else if(isset($_POST["sil"]))
	{
		$sorgu = "DELETE FROM `urun` WHERE `urun`.`id` = ".$_POST['kayit_no']."";
		 $baglanti->query($sorgu);
	}
	else if(isset($_POST["duzenle"]))
	{
		$sorgu = "SELECT * FROM `urun` WHERE`id` = ".$_POST['kayit_no']."";
		$sonuc = $baglanti->query($sorgu);
		$kayit=$sonuc->fetch_assoc();
	}
	
  ?>
    <center><h2><svg class="bi bi-folder-plus" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 
  .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 
  4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
  <path fill-rule="evenodd" d="M13.5 10a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
  <path fill-rule="evenodd" d="M13 12.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
</svg> Eklenecek Ürünler</h2></center>
    <div class="container">
    <div class="row">
	<div class="col-md-12">
	<?php
	if(!isset($_POST["duzenle"]))
	{
	?>
	<style>
        div.w-50{
         margin-left: auto;
         margin-right: auto;
         width: 50em;
         text-align: left;
		}
	</style>
	 <form action="" method="post">
	    <div class="form-group row w-50">
          <label for="urun_adi" class="col-sm-2 col-form-label">
		  <font size="-1">Ürün Adı</font></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="hu_urun_adi" id="hu_urun_adi">
          </div>
        </div>
		
        <div class="form-group row w-50">
          <label for="adet" class="col-sm-2 col-form-label">
		  <font size="-1">Ürün Adeti</font></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="hu_adet" id="hu_adet">
          </div>
        </div>
		
	    <div class="form-group row w-50">
          <label for="fiyat" class="col-sm-2 col-form-label">
		  <font size="-1">Ürün Fiyatı</font></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="hu_fiyat" id="hu_fiyat">
          </div>
        </div>
		<br>
        <center><button type="submit" class="btn btn-dark" style="color:#d0ebf6" name="ekle" value="ekle">Ekle</button>
		&nbsp&nbsp
		<button type="reset" class="btn btn-dark" style="color:#d6d1e5" name="temizle" value="temizle">Temizle</button>
		&nbsp&nbsp
		<button type="submit" class="btn btn-dark" style="color:#e7a78a" name="cıkıs" value="cıkıs">ÇIKIŞ</button></center><br>
		<?php 
		      session_start();
			  ?> 
			  <h6>Giris Yapan Kişi:</h6>
			  <?php
	          echo $_SESSION["kullanici_adi"];
			  if(!isset($_SESSION["ID"]))
			  { 
		        header("location:201813709034_1.php");
			  }
			  else if(isset($_POST["cıkıs"]))
			  { 
		        unset($_SESSION["ID"]);
		        header("location:201813709034_1.php");
				die();
			  }
?>
     </form>
	 <?php
	}else{
		?>
		<style>
        div.w-50{
         margin-left: auto;
         margin-right: auto;
         width: 50em;
         text-align: left;
		}
	</style>
	 <form action="" method="post">
	    <div class="form-group row w-50">
          <label for="urun_adi" class="col-sm-2 col-form-label">
		  <font size="-1">Ürün Adı</font></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="hu_urun_adi" id="hu_urun_adi" value="<?=$kayit["urun_adi"]?>">
          </div>
        </div>
		
        <div class="form-group row w-50">
          <label for="adet" class="col-sm-2 col-form-label">
		  <font size="-1">Ürün Adeti</font></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="hu_adet" id="hu_adet" value="<?=$kayit["adet"]?>">
          </div>
        </div>
		
	    <div class="form-group row w-50">
          <label for="fiyat" class="col-sm-2 col-form-label">
		  <font size="-1">Ürün Fiyatı</font></label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="hu_fiyat" id="hu_fiyat" value="<?=$kayit["fiyat"]?>">
          </div>
        </div>
		<br>
		<input type="hidden" name="kayit_no" value="<?=$kayit["id"]?>">
        <center><button type="submit" class="btn btn-dark" style="color:#a564a7" name="guncelle" value="guncelle">Güncelle</button>
		&nbsp&nbsp
		<button type="reset" class="btn btn-dark" style="color:#d6d1e5" name="temizle" 
		value="temizle">Temizle</button></center><br>
     </form>
		<?php
	}
	 ?>
	</div>
	</div>
	 <center><h2><svg class="bi bi-collection" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 
  1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 
  0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
</svg>  Ürün Listesi</h2></center>
	<div class="row">
	  <div class="col-md-12">
	    <table class="table table-striped">
         <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">Ürün Adı</th>
             <th scope="col">Ürün Adeti</th>
             <th scope="col">Ürün Fiyatı</th>
			 <th scope="col">İşlem</th>
           </tr>
         </thead>
         <tbody>
		 <?php
		 $sorgu="SELECT * FROM `urun`";
		 $sonuc=$baglanti->query($sorgu);
		 $i=0;
		 while($kayit=$sonuc->fetch_assoc())
		 {
			 $i++;
		 ?>
           <tr>
             <th scope="row"><?=$i?></th>
             <td><?=$kayit["urun_adi"]?></td>
             <td><?=$kayit["adet"]?></td>
             <td><?=$kayit["fiyat"]?></td>
			 <td>
			 <form action="" method="post">
			 <div class="btn-group" role="group" aria-label="Basic example">
              <button type="submit" class="btn btn" style="background-color:#f8825e" name="duzenle" value="duzenle">
			<svg class="bi bi-caret-up-square" width="1em" height="1em" viewBox="0 0 16 16" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M3.544 10.705A.5.5 0 0 0 4 11h8a.5.5 0 0 0 .374-.832l-4-4.5a.5.5 0 0 0-.748 0l-4 4.5a.5.5 0 0 0-.082.537z"/>
</svg>
			  </button>
			  <input type="hidden" name="kayit_no" value="<?=$kayit["id"]?>">
              <button type="submit" class="btn btn" style="background-color:#f8825e" name="sil" value="sil">
			  <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
			  </button>
             </div>
			 </form>
			 </td>
           </tr>
		   <?php
		 }
		   ?>
        </tbody>
</table>
	  </div>
	</div>
	</div>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>