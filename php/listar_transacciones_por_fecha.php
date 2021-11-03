<?php
        try {
            $statement="";
            $idusuario = $_REQUEST['pID_USUARIO'];
            $id_tip_trans = $_REQUEST['pID_TIP_TRANS'];
            $fec1 = $_REQUEST['pFEC1'];
            $fec2 = $_REQUEST['pFEC2'];
            $transacciones = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

			$sql  = 'CALL sp_listar_transacciones(:pID_USUARIO,:pID_TIP_TRANS,:pFEC1,:pFEC2)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pID_USUARIO', $idusuario,  PDO::PARAM_INT); 
            $statement->bindParam(':pID_TIP_TRANS', $id_tip_trans,  PDO::PARAM_INT); 
            $statement->bindParam(':pFEC1', $fec1,  PDO::PARAM_STR); 
            $statement->bindParam(':pFEC2', $fec2,  PDO::PARAM_STR); 
            $statement->execute(); 
            $transacciones = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

		echo json_encode($transacciones);
?>