<?php
require_once '../model/Ingresos.php';
require_once '../model/DAOIngresos.php';

$respuesta= null;
$data = array();
$dao = new DAOIngresos();

if($_POST){
    if(isset($_POST["key"])){
        $key = $_POST["key"];
        $ing = new Ingresos();
        switch ($key){
            case 'get':
                $respuesta = $dao->get();
                break;

            case 'getUsuario':
                $respuesta = $dao->getUsuario();
                break;
            case 'llenarModel':
                $idusuario = $_POST["idusuario"];
                $respuesta = $dao->llenarModel($idusuario);
                break;
            case 'insertar':
                parse_str($_POST["data"],$data);
                $ing->setTipodocumento($data["txtTipo"]);
                $ing->setNumerodocumento($data["txtDocumento"]);
                $ing->setNumerocomprobante($data["txtComprobante"]);
                $ing->setFecha($data["txtFecha"]);
                $ing->setTotal($data["txtTotal"]);
                $ing->setDescripcion($data["txtDescripcion"]);
                $respuesta = $dao->insertar($ing);
                break;
            case 'modificar':
                parse_str($_POST["data"],$data);
                $ing->setTipodocumento($data["txtTipo"]);
                $ing->setNumerodocumento($data["txtDocumento"]);
                $ing->setNumerocomprobante($data["txtComprobante"]);
                $ing->setFecha($data["txtFecha"]);
                $ing->setTotal($data["txtTotal"]);
                $ing->setDescripcion($data["txtDescripcion"]);
                $respuesta = $dao->insertar($ing);
                $ing->setIdusuario($data["txtIdUsuario"]);
                $respuesta = $dao->modificar($ing);
                break;

            case 'eliminar':
                $idingreso = $_POST["idingreso"];
                $respuesta= $dao->eliminar($idingreso);
                break;
        }
    }
}
echo $respuesta;
?>