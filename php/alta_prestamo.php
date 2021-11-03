<?php
 try {
            $statement="";
            $tipOp = 'A';
            $id_transaccion = $_REQUEST['pID_TRANSACCION'];
            $id_tip_trans = 3;
            $monto = $_REQUEST['pMONTO'];
            $fec_inicio = $_REQUEST['pFEC_INICIO'];
            $fec_fin = $_REQUEST['pFEC_FIN'];
            $porcentaje_interes = $_REQUEST['pPOCENTAJE_INTERES'];
            $plazo = $_REQUEST['pPLAZO'];
            $monto_a_devolver = $_REQUEST['pMONTO_A_DEVOLVER'];
            $observaciones = $_REQUEST['pOBSERVACIONES'];
            $id_usuario = $_REQUEST['pID_USUARIO'];
            $tarj = $_REQUEST['pID_TARJETA'];
            $transaccion = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_transaccion_prestamo_ABM(:pTipo_Op,:pID_TRANSACCION,:pID_TIP_TRANS,:pMONTO,:pFEC_INICIO,:pFEC_FIN,:pPOCENTAJE_INTERES,:pPLAZO,:pMONTO_A_DEVOLVER,:pOBSERVACIONES,:pID_USUARIO,:pID_TARJETA)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pTipo_Op', $tipOp,  PDO::PARAM_STR); 
            $statement->bindParam(':pID_TRANSACCION', $id_transaccion,  PDO::PARAM_INT);     
            $statement->bindParam(':pID_TIP_TRANS', $id_tip_trans,  PDO::PARAM_INT);  
            $statement->bindParam(':pMONTO', $monto,  PDO::PARAM_INT); 
            $statement->bindParam(':pFEC_INICIO', $fec_inicio,  PDO::PARAM_STR);  
            $statement->bindParam(':pFEC_FIN', $fec_fin,  PDO::PARAM_STR);  
            $statement->bindParam(':pPOCENTAJE_INTERES', $porcentaje_interes,  PDO::PARAM_INT);  
            $statement->bindParam(':pPLAZO', $plazo,  PDO::PARAM_STR);  
            $statement->bindParam(':pMONTO_A_DEVOLVER', $monto_a_devolver,  PDO::PARAM_INT);  
            $statement->bindParam(':pOBSERVACIONES', $observaciones,  PDO::PARAM_STR);  
            $statement->bindParam(':pID_USUARIO', $id_usuario,  PDO::PARAM_INT); 
            $statement->bindParam(':pID_TARJETA', $tarj,  PDO::PARAM_INT);   
        
 
            $statement->execute(); 
            $transaccion = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($transaccion);

        //  http://localhost/proyecto2021/php/alta_prestamo.php?pID_TRANSACCION=12&pMONTO=10000&pFEC_INICIO=2021-01-01&pFEC_FIN=2022-01-01&pPOCENTAJE_INTERES=10&pPLAZO=12%20meses&pMONTO_A_DEVOLVER=11000&pOBSERVACIONES=Prestamo%20para%20comprar%20la%20casa&pID_USUARIO=2

?>