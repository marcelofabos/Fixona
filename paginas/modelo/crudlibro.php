<?php
class CRUDLibro extends Conexion
{

    public function ListarLibro()
    {
        $arr_lib = null;

        $cn = $this->Conectar();

        $sql = "call SP_ListarLibro()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_lib = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_lib;
    }

    public function MostrarLibro($id_lib)
    {
        $arr_lib = null;

        $cn = $this->Conectar();

        $sql = "call SP_MostrarLibro(:id_lib);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":id_lib", $id_lib, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_lib = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_lib;
    }


    public function BorrarLibro($id_lib)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call SP_BorrarLibro(:id_lib)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":id_lib", $id_lib);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function BuscarLibro($id_lib)
    {

        $arr_lib = null;

        $cn = $this->Conectar();

        $sql = "call SP_BuscarLibro(:id_lib);";

        $snt = $cn->prepare($sql);

        $snt->bindparam(":id_lib", $id_lib, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_lib = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_lib;
    }
}
