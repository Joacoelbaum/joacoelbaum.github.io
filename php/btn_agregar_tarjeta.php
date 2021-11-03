<?php
 try {
            $statement="";
            $tipOp = 'A';
            $nombre = $_REQUEST['pNombre'];
            $apellido = $_REQUEST['pApellido'];
            $numero = $_REQUEST['pNumero'];
            $codseg = $_REQUEST['pCodSeg'];
            $id_usuario = $_REQUEST['pID_Usuario'];
            $id_tarjeta = 0;
            $fecha_caducidad = $_REQUEST['pFecha_Caducidad'];
            $empresa = $_REQUEST['pEmpresa'];
            $banco = $_REQUEST['pBanco'];
            $dinero = $_REQUEST['pDinero']
            $tarjeta = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_tarjeta_ABM(:pTipo_Op,:pNombre,:pApellido,:pNumero,:pCodSeg,:pID_Usuario,:pID_Tarjeta,:pFecha_Caducidad,:pEmpresa,:pBanco,:pDinero)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pTipo_Op', $tipOp,  PDO::PARAM_STR); 
            $statement->bindParam(':pNombre', $nombre,  PDO::PARAM_STR); 
            $statement->bindParam(':pApellido', $apellido,  PDO::PARAM_STR);
            $statement->bindParam(':pNumero', $numero,  PDO::PARAM_STR);
            $statement->bindParam(':pCodSeg', $codseg,  PDO::PARAM_INT); 
            $statement->bindParam(':pID_Usuario', $id_usuario,  PDO::PARAM_INT); 
            $statement->bindParam(':pID_Tarjeta', $id_tarjeta,  PDO::PARAM_INT); 
            $statement->bindParam(':pFecha_Caducidad', $fecha_caducidad,  PDO::PARAM_STR); 
            $statement->bindParam(':pEmpresa', $empresa,  PDO::PARAM_STR);  
            $statement->bindParam(':pBanco', $banco,  PDO::PARAM_STR); 
            $statement->bindParam(':pDinero', $dinero,  PDO::PARAM_INT); 
     
            $statement->execute(); 
            $tarjeta = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($tarjeta);

        //  http://localhost/Proyecto2021/php/btn_agregar_tarjeta.php?pNombre=Martin&pApellido=Camello&pNumero=5486321488971236&pCodSeg=123&pID_Usuario=4&pFecha_Caducidad=03/30&pEmpresa=Visa&pBanco=BBVA&pDinero=0
?>