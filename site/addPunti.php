<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Esercizio in php, per l'elaborazione e la gestione di un Database gestionale delle corse di Formula 1">
		<meta name="author" content="Canale Davide">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../style/base.css">
	</head>
	<body>
		<?php
			if (array_key_exists("pilota", $_GET) && $_GET["pilota"]!=null && array_key_exists("circuito", $_GET) && $_GET["circuito"]!=null && array_key_exists("data", $_GET)&& $_GET["data"]!="" && array_key_exists("punti", $_GET)&& $_GET["punti"]!=""){
				$con=mysqli_connect("127.0.0.1","root","","f1");
				if (mysqli_connect_errno())
				  {
				  echo "Connessione Fallita: " . mysqli_connect_error();
				}
				
				mysqli_query($con,"INSERT INTO punti (pilota,circuito,data,punti) VALUES (".$_GET["pilota"].",".$_GET["circuito"].",'".$_GET["data"]."',".$_GET["punti"].");");

				mysqli_close($con);
			}
		?>
		
		<p id="title">Formula 1</p>
		<form action="#" method="get">
      Pilota: <select name="pilota">
			<?php 
				$con=mysqli_connect("127.0.0.1","root","","f1");
				if (mysqli_connect_errno())
				  {
				  echo "Connessione Fallita: " . mysqli_connect_error();
				  }

				$result = mysqli_query($con,"SELECT * FROM pilota ORDER BY cod_pilota");
				
				while($row = mysqli_fetch_array($result))
				  {
				  echo "<option value='".$row['cod_pilota']."'>".$row['nome']."</option>";
				  }

				mysqli_close($con);
			?>
			</select><br>
      Circuito: <select name="circuito">
			<?php 
				$con=mysqli_connect("127.0.0.1","root","","f1");
				if (mysqli_connect_errno())
				  {
				  echo "Connessione Fallita: " . mysqli_connect_error();
				  }

				$result = mysqli_query($con,"SELECT * FROM circuito ORDER BY cod_circuito");
				
				while($row = mysqli_fetch_array($result))
				  {
				  echo "<option value='".$row['cod_circuito']."'>".$row['nome']."</option>";
				  }

				mysqli_close($con);
			?>
			</select><br>
			Data: <input type="date" name="data" value="<?php echo date('d/m/Y');?>"><br>
      Punti: <input type="number" name="punti" min="0" value="0"><br>
			<input type="submit" value="Aggiungi">
		</form>
		
		<?php 
			$con=mysqli_connect("127.0.0.1","root","","f1");
			if (mysqli_connect_errno())
			  {
			  echo "Connessione Fallita: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"SELECT pilota.nome AS pilota,circuito.nome AS circuito,punti.data,punti.punti FROM pilota,circuito,punti WHERE pilota.cod_pilota = punti.pilota AND circuito.cod_circuito = punti.circuito ORDER BY punti.data");
			
			echo "<br><br><br><h4>Pilota|Circuito|Data|Punti</h4>";
			while($row = mysqli_fetch_array($result))
			  {
			  echo "<br>".$row['pilota']."|".$row['circuito']."|".$row['data']."|".$row['punti'];
			  }

			mysqli_close($con);
		?>
	</body>
</html>