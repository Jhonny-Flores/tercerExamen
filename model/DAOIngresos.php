<?php
require_once "../logic/conexion.php";

class DAOIngresos
{
    private $con;

    private function conectar()
    {
        try {
            $this->con = new mysqli(SERVER,
                USER,
                PASS,
                DB);
        } catch (Exception $ex) {
            //CODE
        }
    }

    private function desconectar()
    {
        $this->con->close();
    }

    public function get()
    {
        $sql = "select a.idingreso, a.tipodocumento,a.numerodocumento,a.numerocomprobante,a.fecha,a.total,a.descripcion, b.nombre as usuario from ingresos a ";
        $sql .= "inner join usuario b on a.idusuario = b.idusuario";
        $this->conectar();
        $html = "<table class='table table-hover table-sm' id='tabla'><thead><th>CODIGO</th><th>TipoDocumento</th><th>#Documento</th><th>#Comprobante</th><th>Fecha</th><th>Total</th><th>Descripcion</th><th>UserName</th><th>OPCIONES</th></thead><tbody>";
        try {
            $res = $this->con->query($sql);
            while ($fila = mysqli_fetch_assoc($res)) {
                $html .= "<tr>";
                $html .= "<td>" . $fila["idusuario"] . "</td>";
                $html .= "<td>" . $fila["tipodocumento"] . "</td>";
                $html .= "<td>" . $fila["numerodocumento"] . "</td>";
                $html .= "<td>" . $fila["numerocomprobante"] . "</td>";
                $html .= "<td>" . $fila["fecha"] . "</td>";
                $html .= "<td>" . $fila["total"] . "</td>";
                $html .= "<td>" . $fila["descripcion"] . "</td>";
                $html .= "<td>" . $fila["nombre"] . "</td>";
                $html .= "<td><a class=\"btn btn-danger \" href=\"javascript:eliminar('" . $fila["idusuario"] . "')\"><i class=\"bi bi-cart-x\"></i></a>";
                $html .= "<a class=\"btn btn-warning \" href=\"javascript:modificar('" . $fila["idusuario"] . "')\"><i class=\"bi bi-pencil-square\"></i></a></td>";
                $html .= "</tr>";
            }
            $html .= "</tbody></table>";
            $res->close();
            $this->desconectar();
        } catch (Exception $ex) {
            echo "<script>console.log('" . $ex->getMessage() . "');</script>";
        }
        return $html;
    }

    /*ESPACIO ENTRE CAMPOS*/
    public function llenarModel($id)
    {
        $sql = "select a.idusuario, a.tipodocumento, a.numerodocumento, a.numerocomprobante,a.fecha, a.total, a.descripcion, a.idusuario as usuario from ingresos a ";
        $sql .= "inner join usuario b on a.idusuario= b.idusuario where a.idusuario = $id";
        $this->conectar();
        $dataArray = array();
        try {
            $res = $this->con->query($sql);
            while ($fila = mysqli_fetch_assoc($res)) {
                $dataArray[] = $fila;
            }
            $res->close();
            $this->desconectar();
        } catch (Exception $ex) {
            http_response_code(400);
            header("Content-Type: application/json");
            return json_encode($ex->getMessage());
        }
        header("Content-Type: application/json");
        return json_encode($dataArray);
    }

    /*ESPACIO ENTRE CAMPOS*/
    public function getUsuario()
    {
        $sql = "select idusuario, nombre from usuario";
        $html = "";
        try {
            $this->conectar();
            $res = $this->con->query($sql);
            $html .= "<option selected disabled>Seleccione ...</option>";
            while ($fila = mysqli_fetch_assoc($res)) {
                $html .= "<option value='" . $fila["idusuario"] . "'>" . $fila["nombre"] . "</option>";
            }
            $this->desconectar();
            $res->close();
        } catch (Exception $ex) {
            http_response_code(400);
            header("Content-Type: application/json");
            return json_encode($ex->getMessage());
        }
        return $html;
    }

    /*ESPACIO ENTRE CAMPOS*/
    public function insertar(Ingresos $ing)
    {
        try {
            $this->conectar();
            //crear la sentencia preparada
            $pstm = $this->con->prepare("insert into ingresos(idusuario, tipodocumento, numerodocumento, numerocomprobante, fecha, total, descripcion) values(?,?,?,?,?,?,?)");
            //establecer parametros al PreparedStatement
            $tipodocumento = $ing->getTipodocumento();
            $numerodocumento = $ing->getNumerodocumento();
            $numerocomprobante = $ing->getNumerocomprobante();
            $fecha = $ing->getFecha();
            $total = $ing->getTotal();
            $descripcion = $ing->getDescripcion();
            $idusuario = $ing->getIdusuario();
            //incluirlos en la consulta (establecer parametros)
            //s = string
            // i = integer
            // d = digit   (12.365)
            // b = boolean    true, false
            $pstm->bind_param("sddsdsi",
                $tipodocumento,
                $numerodocumento,
                $numerocomprobante,
                $fecha,
                $total,
                $descripcion,
                $idusuario);

            //ejecutar la sentencia
            if ($pstm->execute()) {
                $pstm->close();
                $this->desconectar();
                return true;
            } else {
                $pstm->close();
                $this->desconectar();
                return false;
            }

        } catch (Exception $ex) {
            ///code
        }
    }

    /*ESPACIO ENTRE CAMPOS*/
    public function eliminar($idingreso)
    {
        //USANDO CONSULTA PREPARADA
        $this->conectar();
        $pstm = $this->con->prepare("delete from ingresos where idingreso=?");
        $pstm->bind_param("i", $idingreso);
        if ($pstm->execute()) {
            $pstm->close();
            $this->desconectar();
            return true;
        } else {
            $pstm->close();
            $this->desconectar();
            return false;
        }
    }

    /*ESPACIO ENTRE CAMPOS*/
    public function modificar(Ingresos $ing)
    {
        try {
            $this->conectar();
            //crear la sentencia preparada
            $pstm = $this->con->prepare("update ingresos set tipodocumento = ?, numerodocumento=?, numerocomprobante=?, fecha=?, total=?, descripcion=?, idusuario=? where idingreso = ?");
            //establecer parametros al PreparedStatement
            $tipodocumento = $ing->getTipodocumento();
            $numerodocumento = $ing->getNumerodocumento();
            $numerocomprobante = $ing->getNumerocomprobante();
            $fecha = $ing->getFecha();
            $total = $ing->getTotal();
            $descripcion = $ing->getDescripcion();
            $idusuario = $ing->getIdusuario();
            //incluirlos en la consulta (establecer parametros)
            // s = string
            // i = integer
            // d = digit   (12.365)
            // b = boolean    true, false
            $pstm->bind_param("sddsdsi",
                $tipodocumento,
                $numerodocumento,
                $numerocomprobante,
                $fecha,
                $total,
                $descripcion,
                $idusuario);

            //ejecutar la sentencia
            if ($pstm->execute()) {
                $pstm->close();
                $this->desconectar();
                return true;
            } else {
                $pstm->close();
                $this->desconectar();
                return false;
            }

        } catch (Exception $ex) {
            ///code
        }
    }
}