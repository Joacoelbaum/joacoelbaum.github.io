<?php
        try {
            $statement="";
            $usuario = $_REQUEST['pUSUARIO'];
            $contrasenya = $_REQUEST['pCONTRASENYA'];
            $usuarios = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

			$sql  = 'CALL sp_login(:pUSUARIO,:pCONTRASENYA)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pUSUARIO', $usuario,  PDO::PARAM_STR); 
            $statement->bindParam(':pCONTRASENYA', $contrasenya,  PDO::PARAM_STR); 
            $statement->execute(); 
            $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

		echo json_encode($usuarios);

        //  http://localhost/Proyecto2021/php/login.php?pUSUARIO=dj8fd8e&pCONTRASENYA=dubruirc
?>
