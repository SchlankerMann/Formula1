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
				mysqli_query($con,"INSERT INTO squadra (nome) VALUES ('".$_GET["nome"]."');");

				mysqli_close($con);
			}
		?>
		
		<p style="float: left;"><a href=".."><<-BACK</a></p>

		<form action="#" method="get">
			<table border="1">
				<tr>
					<th colspan="2"><p id="title">Formula 1 - Aggiunta squadra</p></th>
				</tr>
				<tr>
					<td>Nome Squadra: </td>
					<td><input type="text" name="nome"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Aggiungi"></td>
				</tr>
			</table> 
		</form>
		
		<br><br><br>
		
		<?php 
			$con=mysqli_connect("127.0.0.1","root","","f1");
			if (mysqli_connect_errno())
			  {
			  echo "Connessione Fallita: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"SELECT * FROM squadra ORDER BY cod_squadra");
			
			echo "<table  border='1'><tr><th>Codice</th><th>Nome</th></tr>";
			while($row = mysqli_fetch_array($result))
			  {
			  echo "<tr><td>".$row['cod_squadra']."</td><td>".$row['nome']."</td>";
			  }
			echo "</table>";

			mysqli_close($con);
		?>
	</body>
</html>