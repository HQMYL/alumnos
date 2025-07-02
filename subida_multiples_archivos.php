<?php 
$filesArr = $_FILES["archivo_usuario"];

 $fileNames = array_filter($filesArr['name']);
        
       
        $uploadedFile = '';
        if(!empty($fileNames)){ //SUBIDA DE FOTOS DE USUARIOS
          $uploadStatus = 1;
            foreach($filesArr['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($filesArr['name'][$key]);
                $imgExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
                 
                 $fileName = mt_rand(1000,1000000).".".$imgExt; 
                $targetFilePath = $uploadDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($filesArr["tmp_name"][$key], $targetFilePath)){ 
                        $uploadedFile .= $fileName.',';
                    }else{ 
                        $uploadStatus = 0;
                        $response['message'] = 'Lo Sentimos hubo un error al subir tu Archivo.';
                    } 
                }else{ 
                    $uploadStatus = 0;
                    $response['message'] = "Solo se permiten archivos JPG,JPEG,GIF,PNG y JFIF";
                } 
            } 
        } //SUBIDA DE FOTOS DE USUARIOS

?>