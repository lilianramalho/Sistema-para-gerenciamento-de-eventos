 <?php

	function abrirConexao(){
		
		$conn = mysqli_connect("localhost", "root", "", "bdfinaltcc");
		return $conn;
		
	}

	function fecharConexao($conn){
		
		mysqli_close($conn);
				
	}

?>