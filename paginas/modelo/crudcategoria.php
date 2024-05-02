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
    public function EditarCategoria(Categoria $categoria)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_EditarCategoria(:id_categoria, :nombre_categoria)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_categoria", $categoria->id_categoria);
            $snt->bindParam(":nombre_categoria", $categoria->nombre_categoria);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    
    public function RegistrarCategoria(Categoria $categoria)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_RegistrarCategoria(:id_categoria, :nombre_categoria)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":id_categoria", $categoria->id_categoria);
            $snt->bindParam(":nombre_categoria", $categoria->nombre_categoria);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function FiltrarCategoria($valor)
    {
        $arr_cate = null;
        $cn = $this->Conectar();
        $sql = "call sp_FiltrarCategoria(:valor)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);
        $snt->execute();
        $arr_cate = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>N°</th>";
            echo "<th>Id</th>";
            echo "<th>Categoria</th>";
            echo "</tr>";

            $i = 0; //contador del numero de registros

            foreach ($arr_cate as $cate) {

                $i++;

                echo "<tr>";

                echo "<td>" . $i . "</td>";

                echo "<td>" . $cate->id_categoria . "</td>";

                echo "<td>" . $cate->nombre_categoria . "</td>";

                echo "</tr>";
            }

            echo "</table>";
        } else {

            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";

            echo "No existen registros.";

            echo "</div>";
        }

        $cn = null;
    }
    public function ConsultarCategoria($id_cate)
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
        echo json_encode($arr_cate);
    }
}
