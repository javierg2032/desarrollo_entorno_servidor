<?php
function insertar_pedido($carrito, $codRes)
{
    // Leer configuración
    $config = leer_config(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");

    // Crear conexión PDO
    $bd = new PDO($config[0], $config[1], $config[2]);
    $bd->beginTransaction();

    try {
        $hora = date("Y-m-d H:i:s", time());

        // Insertar el pedido
        $sql = "INSERT INTO pedidos (fecha, enviado, restaurante) VALUES ('$hora', 0, ?)";
        $stmt = $bd->prepare($sql);
        if (!$stmt->execute([$codRes])) {
            $bd->rollback();
            return false;
        }

        // Obtener el ID del pedido recién insertado
        $idPedido = $bd->lastInsertId();

        // Insertar los productos del pedido
        foreach ($carrito as $codProd => $unidades) {
            $sql = "INSERT INTO pedidosproductos (Pedido, Producto, Unidades) VALUES (?, ?, ?)";
            $stmt = $bd->prepare($sql);
            if (!$stmt->execute([$idPedido, $codProd, $unidades])) {
                $bd->rollback();
                return false;
            }

            // Actualizar el stock del producto
            $sql = "UPDATE productos SET stock = stock - ? WHERE codProd = ?";
            $stmt = $bd->prepare($sql);
            if (!$stmt->execute([$unidades, $codProd])) {
                $bd->rollback();
                return false;
            }
        }

        // Confirmar la transacción
        $bd->commit();
        return $idPedido;
    } catch (Exception $e) {
        // Revertir transacción en caso de error
        $bd->rollback();
        return false;
    }
}
