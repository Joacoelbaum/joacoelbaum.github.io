<?php
        try {
            $statement="";
            $cbu = $_REQUEST['pCBU'];
            $alias = $_REQUEST['pALIAS'];
            $usuarios = [];
            $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "rootroot");  

            $sql  = 'CALL sp_btn_hacer_transferencia(:pCBU,:pALIAS)';

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':pCBU', $cbu,  PDO::PARAM_STR); 
            $statement->bindParam(':pALIAS', $alias,  PDO::PARAM_STR);
            $statement->execute(); 
            $usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }

        echo json_encode($usuarios);
?>