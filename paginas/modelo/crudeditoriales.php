<?php
class CRUDEditoriales extends Conexion
{
    public function ListarEditorial()
    {
        $arr_edito = null;

        $cn = $this->Conectar();

        $sql = "call SP_ListarAutor()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_edito = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_edito;
    }

    public function MostrarEditorial($id_edit)
    {
        $arr_edito = null;

        $cn = $this->Conectar();

        $sql = "call SP_MostrarAutor(:id_edit);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":id_edit", $id_edit, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_edito = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_edito;
    }


    public function BorrarEditorial($id_edit)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call SP_BorrarAutor(:id_edit)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":id_edit", $id_edit);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function BuscarEditorial($id_edit)
    {

        $arr_edito = null;

        $cn = $this->Conectar();

        $sql = "call SP_BuscarAutor(:id_edit);";

        $snt = $cn->prepare($sql);

        $snt->bindparam(":id_edit", $id_edit, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_edito = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_edito;
    }
    //Registrar Producto
    public function RegistrarEditorial(Editoriales $editoriales)
    {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_RegistrarEditorial(:id_editorial, :nombre, :pais)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_libro", $editoriales->id_editorial);
            $snt->bindParam(":nombre", $editoriales->nombre);
            $snt->bindParam(":pais", $editoriales->pais);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    public function EditarEditorial(Editoriales $editoriales)
    {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_EditarEditorial(:id_editorial, :nombre, :pais)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_libro", $editoriales->id_editorial);
            $snt->bindParam(":nombre", $editoriales->nombre);
            $snt->bindParam(":pais", $editoriales->pais);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function FiltrarEditorial($valor)
    {

        $arr_edito = null;
        $cn = $this->Conectar();
        $sql = "call sp_FiltrarEditorial(:valor)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);
        $snt->execute();
        $arr_edito = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>N°</th>";
            echo "<th>Id</th>";
            echo "<th>Nombre</th>";
            echo "<th>Pais</th>";
            echo "</tr>";

            $i = 0; //contador del numero de registros

            foreach ($arr_edito as $edito) {

                $i++;

                echo "<tr>";

                echo "<td>" . $i . "</td>";

                echo "<td>" . $edito->id_editorial . "</td>";

                echo "<td>" . $edito->nombre . "</td>";

                echo "<td class='text-center'>" . $edito->pais . "</td>";

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

    //Consultar Producto por Codigo(JSON)
    public function ConsultarEditorial($id_edit)
    {
        $arr_edito = null;
        $cn = $this->Conectar();
        $sql = "call SP_MostrarEditorial(:id_edit);";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":id_edit", $id_edit, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_edito = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_edito);
    }


    
}
