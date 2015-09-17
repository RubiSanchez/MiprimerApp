
<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
$dir = getcwd();
chmod($dir, 755);

            if(is_dir($dir))
            {
             ///////////////   
   if (is_dir($dir))
    {
        // Abrimos el directorio y comprobamos que
        if ($aux = opendir($dir))
        {
			
            
                    //$ht1="<table class=\"container\">";
	
            while (($archivo = readdir($aux)) !== false)
            {
                // Si quisieramos mostrar todo el contenido del directorio pondr?amos lo siguiente:
                // echo '<br />' . $file . '<br />';
                // Pero como lo que queremos es mostrar todos los archivos excepto "." y ".."
                $cad=str_split("".$archivo);
				$cad1=str_split("".$ht);
				echo $ht;
                if(($cad[0]=="A")&&($cad[1]=="p")&&($cad[2]=="p")&&($cad[3]=="R")&&($cad[4]=="u")&&($cad[5]=="b")&&($cad[6]=="i")&&(array_pop($cad)=="t"))
                {
                            if ($archivo!="." && $archivo!="..")
                {
                    $ruta_completa = $dir . '/' . $archivo;
                    // Comprobamos si la ruta m?s file es un directorio (es decir, que file es
                    // un directorio), y si lo es, decimos que es un directorio y volvemos a
                    // llamar a la funci?n de manera recursiva.
                    if (is_dir($ruta_completa))
                    {
                        echo "<br /><strong>Directorio:</strong> " . $ruta_completa;
                        //echo "Estamos tratando el <b>fichero</b> $archivo que tiene un tama?o ".filesize($archivo).", su ?ltima acceso fue en ".fileatime($archivo).", su ?ltima modificaci?n fue en ".filemtime($archivo).", y su fecha de creaci?n fue en ". filectime($archivo)";
                        leer_archivos_y_directorios($ruta_completa . "/");
                    }
                    else
                    {
                        $fichero_url = fopen ($ruta_completa, "r");
                         $texto = "";
                         $ht1="<tr>";
                           
                        //bucle para ir recibiendo todo el contenido del fichero en bloques de 1024 bytes
						$inc=1;$i=0;$array="";$asunto;$autor;$categoria;$area;$prioridad;$fecha;$activo;$descripcion;$cadena="";
                        while ($trozo = fgets($fichero_url, 1024)){
                        //$texto .= $trozo;
                        $key="%META:FIELD";
                        $resultado = strpos($trozo, $key);
						if($inc!=1){
							if($resultado!==FALSE){
								$cad2=explode('name="',$trozo);
								$final2=explode('"',$cad2[1]);
								$cad1=explode('value="',$trozo);
								$final=explode('"',$cad1[1]);
								
								$texto = $final[0];
								//$param.=$final2[0]."=".rawurlencode($texto)."&";
								
								/////////////============================Variable Fomr================================
									if($final2[0]=="Product")
									{   /*echo "<div>Asunto: ";echo*/   $Product=$texto; /*echo "</div>";$array="author".$asunto." "; */}
									if($final2[0]=="Description")
									{ /*echo "<div>Autor:  ";echo*/ $Description=$texto;/*echo "</div>";$array.="author".$autor." ";*/}
									if($final2[0]=="Code")
									{ /*echo "<div>Categoria";echo*/ $Code=$texto; /*echo "</div>";$array.=$categoria." ";*/}
									if($final2[0]=="Date")
									{/* echo "<div>Area: ";echo*/ $Date=$texto; /*echo "</div>";$array.=$area." ";*/}
									if($final2[0]=="Stock")
									{/*echo "<div>Prioridad: ";echo*/ $Stock=$texto; /*echo "</div>"; $array.=$prioridad." ";*/}
									if($final2[0]=="Content")
									{ /* echo "<div>Fecha: ";echo*/ $Content=$texto; /*echo "</div>";$array.=$fecha." ";*/}
									if($final2[0]=="Price")
									{/*echo "<div>Descricion: ";echo*/  $Price=$texto; /*echo "</div>"; $array.=$descripcion." ";*/}
								//////////////////////////========================Hasta quí==============================================
								}
								else{$porciones = explode(".",$archivo);
								}
								$i++;
							}
							$inc++;
                        }
						$array1[]=array("Product"=>$Product,"Description"=>$Description,"Code"=>$Code,"Date"=>$Date,"Stock"=>$Stock,"Content"=>$Content,"Price"=>$Price);
						
                    }
					  
                } 
            }
                }
        
 
                     
						//echo json_encode($array);echo json_encode($Arrays);
						$Arrays=array("".json_encode($array1));
						echo implode($Arrays);
						//$cadena.=implode($Arrays);
						//echo json_encode($cadena);    
            
			      // echo json_encode($cadena); 
            closedir($aux);
 
            // Tiene que ser ruta y no ruta_completa por la recursividad
            
        }
    }
    else
    {
        echo $ruta;
        echo "<br />No es ruta valida";
    }



             //////////////
            }
            else
            {
                echo "$dir no es una ruta";
            }


?>
