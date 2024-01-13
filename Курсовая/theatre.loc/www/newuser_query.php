<?php
	session_start();
	require_once 'conn.php';
 
	if(ISSET($_POST['sub'])){
		if( $_POST['login'] !=='' && $_POST['login'] !==' ' && $_POST['pass'] !=='' && $_POST['pass'] !==' '){
			try{
                $login=$_POST['login'];
                $pass=$_POST['pass'];
            
    
                $data = array( 'login' => $login, 
                      'pass' => $pass,
                      
                     ); 
    
                $sql = "INSERT INTO  users (login , pass)
                        values (
                        :login, :pass
                        );"; //Формируем запрос без данных
                $result = $conn->prepare($sql);
                $result->execute($data); //Выполняем запросы
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$conn = null;
			header('location: админка.php');
		}else{
			echo "
				<script>alert('Пожалуйста повторите попытку')</script>
				<script>window.location = 'newuser.php'</script>
			";
		}
	}
?>