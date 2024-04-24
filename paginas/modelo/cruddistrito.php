<?php
class CRUDDistrito extends Conexion
{
    public function ListarDistrito()
    {
        $arr_distrito = null;

        $cn = $this->Conectar();

        $sql = "call sp_Listardistrito()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_distrito = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_distrito;
    }
}
