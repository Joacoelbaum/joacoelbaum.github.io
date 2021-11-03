<?php
 try {
            $statement="";
            $tipOp = 'A';
            $id_transaccion = $_REQUEST['pID_TRANSACCION'];
            $id_tip_trans = 2;
            $id_usuario = $_REQUEST['pID_USUARIO'];
            $monto = $_REQUEST['pMONTO'];
            $fec_inicio = $_REQUEST ['pFEC_INICIO'];
            $tarj = $_REQUEST['pID_TARJETA'];
            $transaccion = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_transaccion_ingreso_dinero_ABM(:pTipo_Op,:pID_TRANSACCION,:pID_TIP_TRANS,:pID_USUARIO,:pMONTO,:pFEC_INICIO,:pID_TARJETA)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pTipo_Op', $tipOp,  PDO::PARAM_STR); 
            $statement->bindParam(':pID_TRANSACCION', $id_transaccion,  PDO::PARAM_INT);     
            $statement->bindParam(':pID_TIP_TRANS', $id_tip_trans,  PDO::PARAM_INT);  
            $statement->bindParam(':pID_USUARIO', $id_usuario,  PDO::PARAM_INT);  
            $statement->bindParam(':pMONTO', $monto,  PDO::PARAM_INT);  
            $statement->bindParam(':pFEC_INICIO', $fec_inicio,  PDO::PARAM_STR); 
            $statement->bindParam(':pID_TARJETA', $tarj,  PDO::PARAM_INT);  
 
            $statement->execute(); 
            $transaccion = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($transaccion);

        //  http://localhost/proyecto2021/php/alta_ingreso_dinero.php?pID_TRANSACCION=10&pID_USUARIO=3&pMONTO=550&pFEC_INICIO=2021-10-22
?>

