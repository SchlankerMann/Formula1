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
				
				$ = str_replace("-", "/", $_GET["data"]);
				
				mysqli_query($con,"INSERT INTO punti (pilota,circuito,data,punti) VALUES (".$_GET["pilota"].",".$_GET["circuito"].",'".$_GET["data"]."',".$_GET["punti"].");");

				mysqli_close($con);
			}
		?>
		
		<p style="float: left;"><a href=".."><<-BACK</a></p>
		
				<form action="#" method="get">
			<table border="1">
				<tr>
					<th colspan="3"><p id="title">Formula 1 - Aggiunta punti</p></th>
				</tr>
				<tr>
					<td>Pilota: </td>
					<td colspan="2">
						<select name="pilota">
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
					</td>
				</tr>
				<tr>
					<td>Circuito: </td>
					<td colspan="2">
						<select name="circuito">
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
					</td>
				</tr>
				<tr>
					<td>Data: </td>
					<td><input type="date" name="data" value="<?php echo date('d/m/Y');?>"></td>
				</tr>
				<tr>
					<td>Punti: </td>
					<td colspan="2"><input type="number" name="punti" min="0" value="0"></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" value="Aggiungi"></td>
				</tr>
			</table> 
		</form>
		
		<br>
		
		<?php 
			$con=mysqli_connect("127.0.0.1","root","","f1");
			if (mysqli_connect_errno())
			  {
			  echo "Connessione Fallita: " . mysqli_connect_error();
			  }

			$result = mysqli_query($con,"SELECT punti.cod_punti, pilota.nome AS nome, pilota.cognome AS cognome,circuito.nome AS circuito,punti.data,punti.punti FROM pilota,circuito,punti WHERE pilota.cod_pilota = punti.pilota AND circuito.cod_circuito = punti.circuito ORDER BY punti.cod_punti");
			
			echo "<table border='1'><tr><th>Codice</th><th>Nome</th><th>Cognome</th><th>Circuito</th><th>Data</th><th>Punti</th></tr>";
			while($row = mysqli_fetch_array($result))
			  {
			  echo "<tr><td>".$row['cod_punti']."</td><td>".$row['nome']."</td><td>".$row['cognome']."</td><td>".$row['circuito']."</td><td>".$row['data']."</td><td>".$row['punti']."</td>";
			  }
			echo "</table>";

			mysqli_close($con);
		?>
	</body>
</html>