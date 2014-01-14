<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Esercizio in php della F1">
		<meta name="author" content="Martina Ghisolfo">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../style/base.css">
	</head>
	<body>
		<?php
			if (array_key_exists("nome", $_GET) && $_GET["nome"]!="" && array_key_exists("cognome", $_GET) && $_GET["cognome"]!="" && array_key_exists("nome", $_GET) && $_GET["nome"]!="" && $_GET["squadra"]!=null){
				$con=mysqli_connect("127.0.0.1","root","","f1");
				if (mysqli_connect_errno())
				  {
				  echo "Connessione Fallita: " . mysqli_connect_error();
				}
				
				mysqli_query($con,"INSERT INTO pilota (nome,cognome,numero,squadra,foto_path) VALUES ('".$_GET["nome"]."','".$_GET["cognome"]."',".$_GET["numero"].",".$_GET["squadra"].",'".$_GET["path"]."');");

				mysqli_close($con);
			}
		?>
		
		<p id="title">Formula 1</p>
		<form action="#" method="get">
			Nome: <input type="text" name="nome"><br>
			Cognome: <input type=="text" name="cognome"><br>
			Numero: <input type=="text" name="numero"><br>
			Squadra: <select name="squadra">
			<?php 
				$con=mysqli_connect("127.0.0.1","root","","f1");
				if (mysqli_connect_errno())
				  {
				  echo "Connessione Fallita: " . mysqli_connect_error();
				  }

				$result = mysqli_query($con,"SELECT * FROM squadra ORDER BY cod_squadra");
				
				while($row = mysqli_fetch_array($result))
				  {
				  echo "<option value='".$row['cod_squadra']."'>".$row['nome']."</option>";
				  }

				mysqli_close($con);
			?>
			</select><br>
			Foto: <input type=="text" name="path"><br><br>
			<input type="submit" value="Aggiungi">
		</form>
		
		<?php 
			$con=mysqli_connect("127.0.0.1","root","","f1");
			if (mysqli_connect_errno())
			  {
			  echo "Connessione Fallita: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"SELECT pilota.cod_pilota,pilota.nome,pilota.cognome,pilota.numero,squadra.nome AS squadra,pilota.foto_path FROM pilota,squadra WHERE squadra.cod_squadra=pilota.squadra ORDER BY pilota.cod_pilota");
			
			echo "<br><br><br><h4>Cod_pilota|Nome|Cognome|Numero|n°Squadra|path</h4>";
			while($row = mysqli_fetch_array($result))
			  {
			  echo "<br>".$row['cod_pilota']."|".$row['nome']."|".$row['cognome']."|".$row['numero']."|".$row['squadra']."|".$row['foto_path'];
			  }

			mysqli_close($con);
		?>
	</body>
</html>