 <?php

	function abrirConexao(){
		
		$conn = mysqli_connect("localhost", "root", "", "bdtccfinal");
		mysqli_set_charset($conn,"utf8");
		return $conn;
		
	}

	function fecharConexao($conn){
		
		mysqli_close($conn);
				
	}

?>