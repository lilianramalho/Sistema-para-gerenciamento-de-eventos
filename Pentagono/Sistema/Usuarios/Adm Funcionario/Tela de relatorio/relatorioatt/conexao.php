 <?php

	function abrirConexao(){
		
		$conn = mysqli_connect("localhost", "root", "", "bdtccfinal");
		return $conn;
		
	}

	function fecharConexao($conn){
		
		mysqli_close($conn);
				
	}

?>