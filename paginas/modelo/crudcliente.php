<?php
class CRUDCliente extends Conexion
{
    // Listar Cliente
    public function ListarCliente()
    {
        $arr_clie = null;
        $cn = $this->Conectar();
        $sql = "call sp_ListarCliente()";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_clie = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;
        return $arr_clie;
    }

    public function RegistrarCliente()
    {
        try {
            $cn = $this->Conectar();
            $sql = "CALL sp_RegistrarCliente(:nombre, :apellidoPaterno, :apellidoMaterno, :fechaNacimiento, :direccion, :correoElectronico, :codigoDepartamento, :codigoProvincia, :codigoDistrito)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $snt->bindParam(':apellidoPaterno', $apellidoPaterno, PDO::PARAM_STR);
            $snt->bindParam(':apellidoMaterno', $apellidoMaterno, PDO::PARAM_STR);
            $snt->bindParam(':fechaNacimiento', $fechaNacimiento, PDO::PARAM_STR);
            $snt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $snt->bindParam(':correoElectronico', $correoElectronico, PDO::PARAM_STR);
            $snt->bindParam(':codigoDepartamento', $codigoDepartamento, PDO::PARAM_INT);
            $snt->bindParam(':codigoProvincia', $codigoProvincia, PDO::PARAM_INT);
            $snt->bindParam(':codigoDistrito', $codigoDistrito, PDO::PARAM_INT);
            $snt->execute();

            $cn = null;

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    
    public function MostrarClientePorCodigo($codcliente)
    {

        $arr_cliente = null;

        $cn = $this->Conectar();

        $sql = "call sp_MostrarClientePorCodigo(:codcliente);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":codcliente", $codcliente, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_cliente = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_cliente;
    }


}
