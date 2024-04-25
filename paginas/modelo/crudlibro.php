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

        //Registrar Libro
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
    
        //Editar Libro
        public function EditarLibro(Producto $producto)
        {
            try {
                $cn = $this->Conectar();
                $sql = "call sp_EditarProducto(:codprod, :prod, :stk, :cst, :gnc, :codmar, :codcat)";
                $snt = $cn->prepare($sql);
    
                $snt->bindParam(":codprod", $producto->codigo_producto);
                $snt->bindParam(":prod", $producto->producto);
                $snt->bindParam(":stk", $producto->stock_disponible);
                $snt->bindParam(":cst", $producto->costo);
                $snt->bindParam(":gnc", $producto->ganancia);
                $snt->bindParam(":codmar", $producto->producto_codigo_marca);
                $snt->bindParam(":codcat", $producto->producto_codigo_categoria);
                $snt->execute();
                $cn = null;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
}
