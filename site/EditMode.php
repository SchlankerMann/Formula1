<!DOCTYPE html>
<html>
	<head>
		<meta name="description" content="Esercizio in php della F1">
		<meta name="author" content="Martina Ghisolfo">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../style/base.css">
	</head>
	<body>
		<p id="title">Formula 1</p>
		<form action="#" method="get">
      Squadra: <select name="pilota">
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
			</select>
      <input type="button" value="Edit">
      <input type="button" value="Erase">
      <br>
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
				  echo "<option value='".$row['cod_pilota']."'>".$row['nome']." ".$row['cognome']."</option>";
				  }

				mysqli_close($con);
			?>
			</select>
      <input type="button" value="Edit">
      <input type="button" value="Erase">
      <br>
      Circuito: <select name="pilota">
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
			</select>
      <input type="button" value="Edit">
      <input type="button" value="Erase">
      <br>
      Punti: <select name="pilota">
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
			</select>
      <input type="button" value="Edit">
      <input type="button" value="Erase">
      <br>
		</form>
	</body>
</html>