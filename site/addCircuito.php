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
			if (array_key_exists("nome", $_GET) && $_GET["nome"]!=""){
				$con=mysqli_connect("127.0.0.1","root","","f1");
				if (mysqli_connect_errno())
				  {
				  echo "Connessione Fallita: " . mysqli_connect_error();
				}
				mysqli_query($con,"INSERT INTO circuito (nome) VALUES ('".$_GET["nome"]."');");

				mysqli_close($con);
			}
		?>
		
		<p id="title">Formula 1</p>
		<form action="#" method="get">
			Nome Circuito: <input type="text" name="nome"><br><br>
			<input type="submit" value="Aggiungi">
		</form>
		
		<?php 
			$con=mysqli_connect("127.0.0.1","root","","f1");
			if (mysqli_connect_errno())
			  {
			  echo "Connessione Fallita: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"SELECT * FROM circuito ORDER BY cod_circuito");
			
			echo "<br><br><br><h4>Codice|Nome</h4>";
			while($row = mysqli_fetch_array($result))
			  {
			  echo "<br>".$row['cod_circuito']."|".$row['nome'];
			  }

			mysqli_close($con);
		?>
	</body>
</html>