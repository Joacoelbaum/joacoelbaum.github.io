<?php
 try {
            $statement="";
            $tipOp = 'A';
            $id_transaccion = $_REQUEST['pID_TRANSACCION'];
            $id_tip_trans = 1;
            $id_usuario = $_REQUEST['pID_USUARIO'];
            $destinatario = $_REQUEST['pID_DESTINATARIO'];
            $monto = $_REQUEST['pMONTO'];
            $motivo = $_REQUEST['pMOTIVO'];
            $fec_inicio = $_REQUEST['pFEC_INICIO'];
            $id_tarjeta = $_REQUEST['pID_TARJETA'];
            $transaccion = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_transaccion_transferencia_ABM(:pTipo_Op,:pID_TRANSACCION,:pID_TIP_TRANS,:pID_USUARIO,:pID_DESTINATARIO,:pMONTO,:pMOTIVO,:pFEC_INICIO,:pID_TARJETA)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pTipo_Op', $tipOp,  PDO::PARAM_STR); 
            $statement->bindParam(':pID_TRANSACCION', $id_transaccion,  PDO::PARAM_INT);     
            $statement->bindParam(':pID_TIP_TRANS', $id_tip_trans,  PDO::PARAM_INT);  
            $statement->bindParam(':pID_USUARIO', $id_usuario,  PDO::PARAM_INT); 
            $statement->bindParam(':pID_DESTINATARIO', $destinatario,  PDO::PARAM_INT); 
            $statement->bindParam(':pMONTO', $monto,  PDO::PARAM_INT); 
            $statement->bindParam(':pMOTIVO', $motivo,  PDO::PARAM_STR);  
            $statement->bindParam(':pFEC_INICIO', $fec_inicio,  PDO::PARAM_STR);  
            $statement->bindParam(':pID_TARJETA', $id_tarjeta,  PDO::PARAM_INT);  
 
            $statement->execute(); 
            $transaccion = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($transaccion);

        // http://localhost/proyecto2021/php/alta_transferencia.php?pID_TRANSACCION=14&pID_TIP_TRANS=1&pID_USUARIO=3&pDESTINATARIO=1&pMONTO=1010&pMOTIVO=Polleria&pFEC_INICIO=2021-10-19&pID_TARJETA=1
?>