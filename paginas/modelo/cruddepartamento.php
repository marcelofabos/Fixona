<?php
class CRUDDepartamento extends Conexion
{
    public function ListarDepartamento()
    {
        $arr_departamento = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarDepartamento()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_departamento = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_departamento;
    }
}
