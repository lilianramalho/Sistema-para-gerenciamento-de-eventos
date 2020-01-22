<?php
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		echo 'data'.$dia = $_POST["dia1"];
	?>
	<form action="" id="hora" method="post">
		<input type="time" name="hora" placeholder="horario">
		<select name="salas">
			<?php
			$conn = abrirConexao();

			$query = "SELECT * FROM tbsala WHERE salaExiste = 1";
			$result = mysqli_query($conn , $query);
			while ($row_query = mysqli_fetch_array($result)) { ?>
			<option name = "bla" value= "<?php echo $row_query['codsala']; ?>" > <?php echo $row_query['nomesala'];  ?>
				</option> <?php
			} fecharConexao($conn); ?>
		</select>
		<input type="submit" name="enviar" value="enviar">
	</form>

</body>
</html>