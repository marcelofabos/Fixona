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

    //para el dropdown de editar no usar
    public function ListarAutor()
    {
        $arr_autor = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarAutor()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_autor = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_autor;
    }

}
