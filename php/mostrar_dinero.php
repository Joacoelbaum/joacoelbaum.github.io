<?php
        try {
            $statement="";
            $idusuario = $_REQUEST['pID_USUARIO'];
            $dinero = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

			$sql  = 'CALL sp_mostrar_dinero(:pID_USUARIO)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pID_USUARIO', $idusuario,  PDO::PARAM_INT); 
            $statement->execute(); 
            $dinero = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

		echo json_encode($dinero);

        //  http://localhost/proyecto2021/php/mostrar_dinero.php?pID_USUARIO=1
?>