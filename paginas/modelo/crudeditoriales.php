<?php
class CRUDEditoriales extends Conexion
{

    public function ListarEditoriales()
    {
        $arr_edito = null;

        $cn = $this->Conectar();

        $sql = "call SP_ListarEditoriales()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_edito = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_edito;
    }

    
}
