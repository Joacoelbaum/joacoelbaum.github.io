<?php
        try {
            $statement="";
            $id_usuario = $_REQUEST['pID_USUARIO'];
            $usuarios = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_btn_infobancaria(:pID_USUARIO)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pID_USUARIO', $id_usuario,  PDO::PARAM_INT); 
            $statement->execute(); 
            $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($usuarios);
        
        // http://localhost/Proyecto2021/php/btn_infobancaria.php?pID_USUARIO=1
?>