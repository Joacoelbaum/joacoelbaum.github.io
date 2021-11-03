<?php
        try {
            $statement="";
            $idusuario = $_REQUEST['pID_USUARIO'];
            $id_tip_trans = $_REQUEST['pID_TIP_TRANS'];
            $transacciones = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

			$sql  = 'CALL sp_listar_transferencias(:pID_USUARIO)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pID_USUARIO', $idusuario,  PDO::PARAM_INT);  
            $statement->execute(); 
            $transacciones = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

		echo json_encode($transacciones);

        // http://localhost/proyecto2021/php/listar_transferencias.php?pID_USUARIO=1
?>