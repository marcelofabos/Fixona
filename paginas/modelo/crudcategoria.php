<?php
class CRUDCategoria extends Conexion
{

    public function ListarCategoria()
    {
        $arr_cate = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarCategoria()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_cate = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_cate;
    }
    
    public function MostrarCategoria($id_cate)
    {
        $arr_cate = null;

        $cn = $this->Conectar();

        $sql = "call sp_MostrarCategoria(:id_cate);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":id_cate", $id_cate, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_cate = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_cate;
    }

    public function BorrarCategoria($id_cate)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_BorrarCategoria(:id_cate)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":id_cate", $id_cate);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    
}
