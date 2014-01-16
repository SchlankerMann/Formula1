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
				
		<p style="float: left;"><a href=".."><<-BACK</a></p>
		
		<form action="#" method="get">
			<table border="1">
				<tr>
					<th colspan="3"><p id="title">Formula 1 - Aggiunta pilota</p></th>
				</tr>
				<tr>
					<td>Nome: </td>
					<td colspan="2"><input type="text" name="nome"></td>
				</tr>
				<tr>
					<td>Cognome: </td>
					<td colspan="2"><input type="text" name="cognome"></td>
				</tr>
				<tr>
					<td>Numero: </td>
					<td colspan="2"><input type="text" name="numero"></td>
				</tr>
				<tr>
					<td>Squadra: </td>
					<td colspan="2">
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
				</tr>
				<tr>
					<td>Foto: </td>
					<td><input type="text" name="path"></td><td><input type="button" value="Carica..."></td>
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

			$result = mysqli_query($con,"SELECT pilota.cod_pilota,pilota.nome,pilota.cognome,pilota.numero,squadra.nome AS squadra,pilota.foto_path FROM pilota,squadra WHERE squadra.cod_squadra=pilota.squadra ORDER BY pilota.cod_pilota");
			
			echo "<table  border='1'><tr><th>Codice</th><th>Nome</th><th>Cognome</th><th>Numero</th><th>Squadra</th><th>Foto</th></tr>";
			while($row = mysqli_fetch_array($result))
			  {
			  echo "<tr><td>".$row['cod_pilota']."</td><td>".$row['nome']."</td><td>".$row['cognome']."</td><td>".$row['numero']."</td><td>".$row['squadra']."</td><td>".$row['foto_path']."</td>";
			  }
			echo "</table>";

			mysqli_close($con);
		?>
	</body>
</html>