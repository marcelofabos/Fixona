<?php
class CRUDProvincia extends Conexion
{
    public function ListarProvincia()
    {
        $arr_provincia = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarProvincia()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_provincia = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_provincia;
    }
}
