<?php
class CRUDVenta extends Conexion
{

    public function ListarVenta()
    {
        $arr_ven = null;

        $cn = $this->Conectar();

        $sql = "call sp_ListarVenta()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_ven = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_ven;
    }

    public function MostrarVenta($id_venta)
    {
        $arr_ven = null;

        $cn = $this->Conectar();

        $sql = "call SP_MostrarVenta(:id_venta);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":id_venta", $id_venta, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_ven = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_ven;
    }


    public function BorrarVenta($id_venta)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call SP_BorrarVenta(:id_venta)";
            $snt = $cn->prepare($sql);
            $snt->bindParam(":id_venta", $id_venta);
            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function BuscarVenta($id_venta)
    {

        $arr_ven = null;

        $cn = $this->Conectar();

        $sql = "call  SP_BuscarVenta(:id_venta);";

        $snt = $cn->prepare($sql);

        $snt->bindparam(":id_venta", $id_venta, PDO::PARAM_STR, 5);

        $snt->execute();

        $nr = $snt->rowCount();

        if ($nr > 0) {
            $arr_ven = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        return $arr_ven;
    }
    //Registrar Producto
    public function RegistrarVenta(Venta $venta)
    {
        try {
            $cn = $this->Conectar();

            $sql = "call SP_RegistrarVenta(:id_venta, :id_libro, :titulo, :fecha_venta, :cantidad_venta, :total)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_venta", $venta->id_venta);
            $snt->bindParam(":id_libro", $venta->id_libro);
            $snt->bindParam(":fecha_venta", $venta->fecha_venta);
            $snt->bindParam(":cantidad_venta", $venta->cantidad_vendida);
            $snt->bindParam(":total", $venta->total);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    public function EditarVenta(Venta $venta)
    {
        try {
            $cn = $this->Conectar();
            $sql = "call SP_EditarVenta(:id_venta, :id_libro, :titulo, :fecha_venta, :cantidad_venta, :total)";
            $snt = $cn->prepare($sql);

            $snt->bindParam(":id_venta", $venta->id_venta);
            $snt->bindParam(":id_libro", $venta->id_libro);
            $snt->bindParam(":fecha_venta", $venta->fecha_venta);
            $snt->bindParam(":cantidad_venta", $venta->cantidad_vendida);
            $snt->bindParam(":total", $venta->total);

            $snt->execute();
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function FiltrarVenta($valor)
    {

        $arr_ven = null;
        $cn = $this->Conectar();
        $sql = "call SP_FiltrarVenta(:valor)";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);
        $snt->execute();
        $arr_ven = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
        if ($nr > 0) {
            echo "<table class='table table-hover table-sm table-success table-striped'>";
            echo "<tr class='table-primary'>";
            echo "<th>N°</th>";
            echo "<th>Id_Venta</th>";
            echo "<th>Id_Libro</th>";
            echo "<th>Titulo</th>";
            echo "<th>Autor</th>";
            echo "<th>Nacionalidad</th>";
            echo "<th>Editorial</th>";
            echo "<th>Categoria</th>";
            echo "<th>Precio</th>";
            echo "<th>Fecha Venta</th>";
            echo "<th>Cantidad Vendida</th>";
            echo "<th>Total</th>";
            echo "</tr>";

            $i = 0; //contador del numero de registros

            foreach ($arr_ven as $ven) {

                $i++;

                echo "<tr>";

                echo "<td>" . $i . "</td>";

                echo "<td>" . $ven->id_venta . "</td>";

                echo "<td>" . $ven->id_libro . "</td>";

                echo "<td class='text-center'>" . $ven->titulo . "</td>";

                echo "<td>" . $ven->autor . "</td>";

                echo "<td class='text-center'>" . $ven->nacionalidad . "</td>";

                echo "<td>" . $ven->editorial . "</td>";

                echo "<td>" . $ven->categoria . "</td>";

                echo "<td>" . $ven->precio . "</td>";

                echo "<td>" . $ven->fecha_venta . "</td>";

                echo "<td>" . $ven->cantidad_vendida . "</td>";

                echo "<td>" . $ven->total . "</td>";

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
    public function ConsultarVenta($id_venta)
    {
        $arr_ven = null;
        $cn = $this->Conectar();
        $sql = "call SP_MostrarVenta(:id_venta);";
        $snt = $cn->prepare($sql);
        $snt->bindParam(":id_venta", $id_venta, PDO::PARAM_STR, 5);
        $snt->execute();
        $nr = $snt->rowCount();
        if ($nr > 0) {
            $arr_ven = $snt->fetch(PDO::FETCH_OBJ);
        }
        $cn = null;
        echo json_encode($arr_ven);
    }

}
