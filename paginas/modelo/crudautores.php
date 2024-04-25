<?php
class CRUDAutores extends Conexion
{
    public function ListarAutor()
    {
        $arr_aut = null;

        $cn = $this->Conectar();

        $sql = "call SP_ListarAutor()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_aut = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_aut;
    }

    public function MostrarAutor($id_aut)
    {
        $arr_aut = null;

        $cn = $this->Conectar();

        $sql = "call SP_MostrarAutor(:id_aut);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":id_aut", $id_aut, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_aut = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_aut;
    }


    public function BorrarAutor($id_aut)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call SP_BorrarAutor(:id_aut)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":id_aut", $id_aut);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function BuscarAutor($id_aut)
    {

        $arr_aut = null;

        $cn = $this->Conectar();

        $sql = "call SP_BuscarAutor(:id_aut);";

        $snt = $cn->prepare($sql);

        $snt->bindparam(":id_aut", $id_aut, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_aut = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_aut;
    }
    //Registrar Producto
    public function RegistrarAutor(Autores $autor)
    {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_RegistrarAutor(:id_autor, :nombre, :apellido, :nacionalidad)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_libro", $autor->id_autor);
            $snt->bindParam(":nombre", $autor->nombre);
            $snt->bindParam(":apellido", $autor->apellido);
            $snt->bindParam(":nacionalidad", $autor->nacionalidad);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    public function EditarAutor(Autores $autor)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_EditarAutor(:id_autor, :nombre, :apellido, :nacionalidad)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_libro", $autor->id_autor);
            $snt->bindParam(":nombre", $autor->nombre);
            $snt->bindParam(":apellido", $autor->apellido);
            $snt->bindParam(":nacionalidad", $autor->nacionalidad);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function FiltrarAutor($valor)
    {

        $arr_aut = null;
        $cn = $this->Conectar();
        $sql = "call sp_FiltrarAutor(:valor)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);
        $snt->execute();
        $arr_aut = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>N°</th>";
            echo "<th>Id</th>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido</th>";
            echo "<th>Nacionalidad</th>";
            echo "<th>Cantidad de Libros</th>";
            echo "</tr>";

            $i = 0; //contador del numero de registros

            foreach ($arr_aut as $auto) {

                $i++;

                echo "<tr>";

                echo "<td>" . $i . "</td>";

                echo "<td>" . $auto->id_autor . "</td>";

                echo "<td>" . $auto->nombre . "</td>";

                echo "<td class='text-center'>" . $auto->apellido . "</td>";

                echo "<td>" . $auto->nacionalidad . "</td>";

                echo "<td class='text-center'>" . $auto->cant_libros . "</td>";

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
    public function ConsultarAutor($id_aut)
    {
        $arr_aut = null;
        $cn = $this->Conectar();
        $sql = "call sp_MostrarAutor(:id_aut);";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":id_aut", $id_aut, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_aut = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_aut);
    }
}
