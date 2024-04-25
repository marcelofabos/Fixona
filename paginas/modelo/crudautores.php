<?php
class CRUDAutores extends Conexion
{
    public function ListarAutores()
    {
        $arr_autores = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarAutores()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_autores = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_autores;
    }
}
