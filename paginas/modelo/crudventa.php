<?php
class CRUDVenta extends Conexion
{
    public function ListarVentas()
    {
        $arr_vent = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarVentas()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_vent = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_vent;
    }
    public function MostrarCategoriaPorId()
    {
        $arr_vent = null;

        $cn = $this->Conectar();

        $sql = "call sp_MostrarCategoriaPorId(:id_ven);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":id_ven", $id_ven, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_vent = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_vent;
    }
}
