<?php
        try {
            $statement="";
            $idusuario = $_REQUEST['pID_USUARIO'];
            $tARJETAS = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

			$sql  = 'CALL sp_listar_tarjetas(:pID_USUARIO)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pID_USUARIO', $idusuario,  PDO::PARAM_INT); 
            $statement->execute(); 
            $tARJETAS = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

		echo json_encode($tARJETAS);

        //  http://localhost/proyecto2021/php/listar_tarjetas.php?pID_USUARIO=1
?>