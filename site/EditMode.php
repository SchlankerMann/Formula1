<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Esercizio in php, per l'elaborazione e la gestione di un Database gestionale delle corse di Formula 1">
		<meta name="author" content="Canale Davide">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../style/base.css">
	</head>
	<body>
					
		<p style="float: left;"><a href=".."><<-BACK</a></p>
		
		<form action="#" method="get">
			<table  border='1'>
				<tr>
					<th colspan="4"><p id="title">Formula 1</p></th>
				</tr>
				<tr>
					<td>Squadra: </td>
					<td>
						<select name="squadra">
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
					</td>
					<td><input type="button" value="Edit"></td>
					<td><input type="button" value="Erase"></td>
				</tr>
				<tr>
					<td>Pilota: </td>
					<td>
						<select name="pilota">
						<?php 
							$con=mysqli_connect("127.0.0.1","root","","f1");
							if (mysqli_connect_errno())
							  {
							  echo "Connessione Fallita: " . mysqli_connect_error();
							  }

							$result = mysqli_query($con,"SELECT nome,cognome,cod_pilota FROM pilota ORDER BY cod_pilota");
							
							while($row = mysqli_fetch_array($result))
							  {
							  echo "<option value='".$row['cod_pilota']."'>".$row['nome']." ".$row['cognome']."</option>";
							  }

							mysqli_close($con);
						?>
					</td>
					<td><input type="button" value="Edit"></td>
					<td><input type="button" value="Erase"></td>
				</tr>
				<tr>
					<td>Circuito: </td>
					<td>
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
					<td><input type="button" value="Edit"></td>
					<td><input type="button" value="Erase"></td>
				</tr>
				<tr>
					<td>Punti: </td>
					<td>
						<select name="punti">
						<?php 
							$con=mysqli_connect("127.0.0.1","root","","f1");
							if (mysqli_connect_errno())
							  {
							  echo "Connessione Fallita: " . mysqli_connect_error();
							  }

							$result = mysqli_query($con,"SELECT punti.cod_punti, pilota.nome AS nome, pilota.cognome AS cognome, circuito.nome AS circuito, punti.data FROM punti,pilota,circuito WHERE punti.pilota=pilota.cod_pilota AND punti.circuito=circuito.cod_circuito ORDER BY punti.cod_punti");
							
							while($row = mysqli_fetch_array($result))
							  {
							  echo "<option value='".$row['cod_punti']."'>".$row['nome']." ".$row['cognome']." a ".$row['circuito']." il ".$row['data']."</option>";
							  }

							mysqli_close($con);
						?>
					</td>
					<td><input type="button" value="Edit"></td>
					<td><input type="button" value="Erase"></td>
				</tr>
			</table>
		</form>
	</body>
</html>