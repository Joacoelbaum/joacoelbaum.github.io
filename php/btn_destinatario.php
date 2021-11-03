<?php
        try {
            $statement="";
            $id_destinatario = $_REQUEST['pID_USUARIO'];
            $usuarios = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_btn_destinatario(:pID_USUARIO)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pID_USUARIO', $id_destinatario,  PDO::PARAM_INT); 

            $statement->execute(); 
            $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($usuarios);
        // http://localhost/Proyecto2021/php/btn_destinatario.php?pID_USUARIO=1
?>