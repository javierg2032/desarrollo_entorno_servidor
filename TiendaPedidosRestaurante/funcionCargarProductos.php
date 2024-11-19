<?php
// recibe un array de códigos de productos
// devuelve un cursor con los datos de esos productos
function cargar_productos($codigosProductos)
{
    $res = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $texto_in = implode(",", $codigosProductos);
    $ins = "select * from productos where codProd in($texto_in)";
    $resul = $bd->query($ins);
    if (!$resul) {
        return FALSE;
    } else {
        //Almacena los productos en un array
        $productos = array();
        while ($producto = $resul->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = $producto;
        }
        return $productos;
    }
}
