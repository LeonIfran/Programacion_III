<?php

    $i=0;
    var_dump($_FILES);
    $ruta = "./Archivos/";

    if(isset($_FILES["fArchivos"])) {

    
        foreach($_FILES["fArchivos"]["tmp_name"] as $item) {

            move_uploaded_file($item , $ruta.$_FILES["fArchivos"]["name"][$i]);
            $i++;
        }

        echo "<table border='1'>
                <tbody>
                    <thead>
                        <th>Nombre</th>
                        <th>Imagen</th>
                    </thead>";

        foreach(scandir($ruta) as $item) {

            if($item == "." || $item == "..") {

                continue;
            }

            $rutaAb = $ruta.$item;

            echo "<tr>
                    <td>{$item}</td>
                    <td><img src='{$rutaAb}' height='25px' width='75px'></img></td>
                </tr>";
        }

        echo "  </tbody>
            </table>";
    }
    else {

        echo "No se han seleccionado imagenes.";
    }
?>