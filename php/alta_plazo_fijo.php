<?php
 try {
            $statement="";
            $tipOp = 'A';
            $id_transaccion = $_REQUEST['pID_TRANSACCION'];
            $monto = $_REQUEST['pMONTO'];
            $fec_inicio = $_REQUEST['pFEC_INICIO'];
            $fec_fin = $_REQUEST['pFEC_FIN'];
            $rentabilidad = $_REQUEST['pRENTABILIDAD'];
            $capital_final = $_REQUEST['pCAPITAL_FINAL'];
            $id_usuario = $_REQUEST['pID_USUARIO'];
            $id_tip_trans = 4;
            $transaccion = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_transaccion_plazo_fijo_ABM(:pTipo_Op,:pID_TRANSACCION,:pMONTO,:pFEC_INICIO;:pFEC_FIN,:pRENTABILIDAD,:pCAPITAL_FINAL,:pID_USUARIO,:pID_TIP_TRANS)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pTipo_Op', $tipOp,  PDO::PARAM_STR); 
            $statement->bindParam(':pID_TRANSACCION', $id_transaccion,  PDO::PARAM_INT);     
            $statement->bindParam(':pMONTO', $monto,  PDO::PARAM_INT);  
            $statement->bindParam(':pFEC_INICIO', $fec_inicio,  PDO::PARAM_STR); 
            $statement->bindParam(':pFEC_FIN', $fec_fin,  PDO::PARAM_STR); 
            $statement->bindParam(':pRENTABILIDAD', $rentabilidad,  PDO::PARAM_INT); 
            $statement->bindParam(':pCAPITAL_FINAL', $capital_final,  PDO::PARAM_INT);  
            $statement->bindParam(':pID_USUARIO', $id_usuario,  PDO::PARAM_INT);  
            $statement->bindParam(':pID_TIP_TRANS', $id_tip_trans,  PDO::PARAM_INT);  
    
            $statement->execute(); 
            $transaccion = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($transaccion);

        // http://localhost/proyecto2021/php/alta_plazo_fijo.php?pID_TRANSACCION=12&pMONTO=15000&pFEC_INICIO=2021-10-23&pFEC_FIN=2022-10-23&pRENTABILIDAD=10&pCAPITAL_FINAL=16500&pID_USUARIO=1&pID_TIP_TRANS=4



?>