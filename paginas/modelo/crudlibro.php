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
    //Registrar Producto
    public function RegistrarLibro(Libro $libro)
    {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_RegistrarLibro(:id_libro, :titulo, :autor, :editorial, :categoria, :precio)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_libro", $libro->id_libro);
            $snt->bindParam(":titulo", $libro->titulo);
            $snt->bindParam(":autor", $libro->autor);
            $snt->bindParam(":editorial", $libro->editorial);
            $snt->bindParam(":categoria", $libro->categoria);
            $snt->bindParam(":precio", $libro->precio);


            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    public function EditarLibro(Libro $libro)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call sp_EditarLibro(:id_libro, :titulo, :autor, :editorial, :categoria, :precio)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_libro", $libro->id_libro);
            $snt->bindParam(":titulo", $libro->titulo);
            $snt->bindParam(":autor", $libro->autor);
            $snt->bindParam(":editorial", $libro->editorial);
            $snt->bindParam(":categoria", $libro->categoria);
            $snt->bindParam(":precio", $libro->precio);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function FiltrarLibro($valor)
    {

        $arr_lib = null;
        $cn = $this->Conectar();
        $sql = "call sp_FiltrarLibro(:valor)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);
        $snt->execute();
        $arr_lib = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>N°</th>";
            echo "<th>Id</th>";
            echo "<th>Titulo</th>";
            echo "<th>Autor</th>";
            echo "<th>Nacionalidad</th>";
            echo "<th>Editorial</th>";
            echo "<th>Categoria</th>";
            echo "<th>Precio</th>";
            echo "</tr>";

            $i = 0; //contador del numero de registros

            foreach ($arr_lib as $lib) {

                $i++;

                echo "<tr>";

                echo "<td>" . $i . "</td>";

                echo "<td>" . $lib->id_libro . "</td>";

                echo "<td>" . $lib->titulo . "</td>";

                echo "<td class='text-center'>" . $lib->autor . "</td>";

                echo "<td>" . $lib->nacionalidad . "</td>";

                echo "<td class='text-center'>" . $lib->editorial . "</td>";

                echo "<td>" . $lib->categoria . "</td>";

                echo "<td>S/" . $lib->precio . "</td>";

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
    public function ConsultarLibro($id_lib)
    {
        $arr_lib = null;
        $cn = $this->Conectar();
        $sql = "call sp_MostrarLibro(:id_lib);";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":id_lib", $id_lib, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_lib = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_lib);
    }
}
