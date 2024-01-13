<?php
	session_start();
	require_once 'conn.php';
 
	if(ISSET($_POST['sub'])){
		if( $_POST['title'] !=='' && $_POST['title'] !==' ' && $_POST['date'] !=='' && $_POST['date'] !==' ' && $_POST['cena'] !=='' && $_POST['cena'] !==' '){
			try{
                $title=$_POST['title'];
                $date=$_POST['date'];
                $cena=$_POST['cena'];
    
                $data = array( 'title' => $title, 
                      'date' => $date,
                      'cena' => $cena,
                     ); 
    
                $sql = "INSERT INTO  spectacles (title , date, cena)
                        values (
                        :title, :date, :cena
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
				<script>window.location = 'new.php'</script>
			";
		}
	}
?>
