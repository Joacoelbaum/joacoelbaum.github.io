<?php
 try {
            $statement="";
            $tipOp = 'A';
            $id_usuario = 0;
            $usuario = $_REQUEST['pUSUARIO'];
            $contrasenya = $_REQUEST['pCONTRASENYA'];
            $nombre = $_REQUEST['pNOMBRE'];
            $apellido = $_REQUEST['pAPELLIDO'];
            $mail = $_REQUEST['pMAIL'];
            $telefono = $_REQUEST['pTELEFONO'];
            $cbu = $_REQUEST['pCBU'];
            $id_tipusu = 2;
            $fecha_nac = $_REQUEST['pFECHA_NAC'];
            $alias = $_REQUEST['pALIAS'];
            $dni = $_REQUEST['pDNI'];
            $foto_perf = $_REQUEST['pFOTO_PERF'];
            $dinero = 0;
            $usuarios = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

			$sql  = 'CALL sp_usuario_ABM(:pTipo_Op,:pNOMBRE,:pAPELLIDO,:pMAIL,:pUSUARIO,:pCONTRASENYA,:pTELEFONO,:pCBU,:pID_TIPUSU,:pFECHA_NAC,:pALIAS,:pDNI,:pFOTO_PERF,:pDINERO,:pID_USUARIO)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pTipo_Op', $tipOp,  PDO::PARAM_STR); 
            $statement->bindParam(':pNOMBRE', $nombre,  PDO::PARAM_STR); 
            $statement->bindParam(':pAPELLIDO', $apellido,  PDO::PARAM_STR);
            $statement->bindParam(':pMAIL', $mail,  PDO::PARAM_STR);
            $statement->bindParam(':pUSUARIO', $usuario,  PDO::PARAM_STR); 
            $statement->bindParam(':pCONTRASENYA', $contrasenya,  PDO::PARAM_STR); 
            $statement->bindParam(':pTELEFONO', $telefono,  PDO::PARAM_STR); 
            $statement->bindParam(':pCBU', $cbu,  PDO::PARAM_STR);  
            $statement->bindParam(':pID_TIPUSU', $id_tipusu,  PDO::PARAM_INT); 
            $statement->bindParam(':pFECHA_NAC', $fecha_nac,  PDO::PARAM_STR); 
            $statement->bindParam(':pALIAS', $alias,  PDO::PARAM_STR); 
            $statement->bindParam(':pDNI', $dni,  PDO::PARAM_STR);     
            $statement->bindParam(':pFOTO_PERF', $foto_perf,  PDO::PARAM_STR);     
            $statement->bindParam(':pDINERO', $dinero,  PDO::PARAM_INT);     
            $statement->bindParam(':pID_USUARIO', $id_usuario,  PDO::PARAM_INT);   
 
            $statement->execute(); 
            $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($usuarios);

        //  http://localhost/Proyecto2021/php/register.php?pUSUARIO=MonicaVerde3&pCONTRASENYA=CaramelitosGuiso5&pNOMBRE=M%C3%B3nica&pAPELLIDO=Marello&pMAIL=monicamar@hotmail.com&pTELEFONO=1198746987&pCBU=0000047907350000912368&pID_TIPUSU=2&pFECHA_NAC=1966-05-03&pALIAS=camino.ferretero.koala&pDNI=37849572&pFOTO_PERF=monica.png

        //http://localhost/Proyecto2021/php/register.php?pUSUARIO=m&pCONTRASENYA=m&pMAIL=ajsua&pTELEFONO=1168686659&pFECHA_NAC=1990-11-11&pDNI=123
?>

