-- Crear la base de datos
CREATE DATABASE libreria;

USE libreria;

-- Tabla de Autores
CREATE TABLE Autores (
  id_autor char(5) PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  nacionalidad VARCHAR(50)
);

-- Tabla de Editoriales
CREATE TABLE Editoriales (
  id_editorial char(5) PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  pais VARCHAR(50)
);

-- Tabla de Categorías
CREATE TABLE Categorias (
  id_categoria char(5) PRIMARY KEY,
  nombre_categoria VARCHAR(50) NOT NULL
);

-- Tabla de Libros
CREATE TABLE Libros (
  id_libro char(5) PRIMARY KEY,
  titulo VARCHAR(100) NOT NULL,
  autor char(5) NOT NULL,
  editorial char(5) NOT NULL,
  categoria char(5)  NULL,
  precio DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (autor) REFERENCES Autores(id_autor) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (editorial) REFERENCES Editoriales(id_editorial) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (categoria) REFERENCES Categorias(id_categoria) ON DELETE SET NULL ON UPDATE CASCADE
);

-- Tabla de Ventas
CREATE TABLE Ventas (
  id_venta char(5) PRIMARY KEY,
  id_libro char(5) NOT NULL,
  fecha_venta DATE NOT NULL,
  cantidad_vendida INT NOT NULL,
  total DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (id_libro) REFERENCES Libros(id_libro) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Insertar datos de ejemplo en las tablas
INSERT INTO Autores (id_autor, nombre, apellido, nacionalidad) VALUES
  ('A0001', 'Gabriel', 'García Márquez', 'Colombia'),
  ('A0002', 'Jane', 'Austen', 'Inglaterra'),
  ('A0003', 'Paulo', 'Coelho', 'Brasil');

INSERT INTO Editoriales (id_editorial, nombre, pais) VALUES
  ('E0001', 'Editorial Planeta', 'España'),
  ('E0002', 'Penguin Random House', 'Estados Unidos'),
  ('E0003', 'Companhia das Letras', 'Brasil');

INSERT INTO Categorias (id_categoria, nombre_categoria) VALUES
  ('C0001', 'Novela'),
  ('C0002', 'Romance'),
  ('C0003', 'Autoayuda');

INSERT INTO Libros (id_libro, titulo, autor, editorial, categoria, precio) VALUES
  ('L0001', 'Cien años de soledad', 'A0001', 'E0001', 'C0001', 19.99),
  ('L0002', 'Orgullo y prejuicio', 'A0002', 'E0002', 'C0001', 14.99),
  ('L0003', 'El alquimista', 'A0003', 'E0003', 'C0003', 12.99),
  ('L0004', 'Triap', 'A0001', 'E0002', 'C0001', 15.99);


INSERT INTO Ventas (id_venta, id_libro, fecha_venta, cantidad_vendida, total) VALUES
  ('V0001', 'L0001', '2023-04-15', 5, 99.95),
  ('V0002', 'L0002', '2023-04-18', 3, 44.97),
  ('V0003', 'L0003', '2023-04-20', 8, 103.92);
  
SELECT * FROM Ventas;

  
-- CATEGORIA----------------------------------------------
-- Listar Categoría
DELIMITER $$
CREATE PROCEDURE SP_ListarCategoria()
BEGIN
    SELECT * FROM Categorias
    ORDER BY id_categoria ASC;
END $$
DELIMITER ;

CALL SP_ListarCategoria();

-- Mostrar categoría por código
DELIMITER $$
CREATE PROCEDURE SP_MostrarCategoria(IN id_cate CHAR(5))
BEGIN
    SELECT * FROM Categorias
    WHERE id_categoria = id_cate;
END $$
DELIMITER ;

CALL SP_MostrarCategoria('C0002');


-- Registrar un nuevo registro
DELIMITER $$
CREATE PROCEDURE SP_RegistrarCategoria(IN nombre_nueva VARCHAR(50), IN id_categoria CHAR(5))
BEGIN
    INSERT INTO Categorias (id_categoria, nombre_categoria)
    VALUES (id_categoria, nombre_nueva);
END $$
DELIMITER ;

CALL SP_RegistrarCategoria('Thriller', 'C0003');

-- Borrar la información de una categoría
DELIMITER $$
CREATE PROCEDURE sp_BorrarCategoria(IN id_cate CHAR(5))
BEGIN
    UPDATE Libros SET categoria = NULL WHERE categoria = id_cate;
    DELETE FROM Categorias WHERE id_categoria = id_cate;
END$$
DELIMITER ;

CALL sp_BorrarCategoria('C0003');

-- Editar Categoria
DELIMITER $$
CREATE PROCEDURE SP_EditarCategoria(
    IN id_cate CHAR(5),
    IN nueva_nombre VARCHAR(50)
)
BEGIN
    UPDATE Categorias
    SET nombre_categoria = nueva_nombre
    WHERE id_categoria = id_cate;
END$$
DELIMITER ;
CALL SP_EditarCategoria('C0001', 'Nueva Categoría');

-- Filtrar Categoria
DELIMITER $$
CREATE PROCEDURE SP_FiltrarCategoria(IN nombre_filtro VARCHAR(50))
BEGIN
    SELECT *
    FROM Categorias
    WHERE nombre_categoria LIKE CONCAT('%', nombre_filtro, '%');
END$$
DELIMITER ;
CALL SP_FiltrarCategoria('Nove');



-- CATEGORIA----------------------------------------------

-- LIBRO--------------------------------------------------
-- Listar Libros
DELIMITER $$
CREATE PROCEDURE SP_ListarLibro()
BEGIN
    SELECT l.id_libro, l.titulo, CONCAT(a.nombre, ' ', a.apellido) AS autor, a.nacionalidad, e.nombre AS editorial, c.nombre_categoria AS categoria, l.precio
    FROM Libros l
    INNER JOIN Autores a ON l.autor = a.id_autor
    INNER JOIN Editoriales e ON l.editorial = e.id_editorial
    INNER JOIN Categorias c ON l.categoria = c.id_categoria;
END $$
DELIMITER ;

CALL SP_ListarLibro();


-- Mostrar Libro por ID
DELIMITER $$
CREATE PROCEDURE SP_MostrarLibro(IN id_lib CHAR(5))
BEGIN
    SELECT l.id_libro, l.titulo, CONCAT(a.nombre, ' ', a.apellido) AS autor, a.nacionalidad, e.nombre AS editorial, c.nombre_categoria AS categoria, l.precio
    FROM Libros l
    INNER JOIN Autores a ON l.autor = a.id_autor
    INNER JOIN Editoriales e ON l.editorial = e.id_editorial
    INNER JOIN Categorias c ON l.categoria = c.id_categoria
    WHERE l.id_libro = id_lib;
END $$
DELIMITER ;

CALL SP_MostrarLibro('L0001');

-- Registrar un nuevo Libro
DELIMITER $$
CREATE PROCEDURE SP_RegistrarLibro(IN titulo VARCHAR(100), IN autor CHAR(5), IN editorial CHAR(5), IN categoria CHAR(5), IN precio DECIMAL(10, 2), IN id_libro CHAR(5))
BEGIN
    INSERT INTO Libros (id_libro, titulo, autor, editorial, categoria, precio)
    VALUES (id_libro, titulo, autor, editorial, categoria, precio);
END $$
DELIMITER ;

CALL SP_RegistrarLibro('Xess', 'A0002', 'E0001', 'C0001', 29.99, 'L0002');

-- Borrar un Libro
DELIMITER $$
CREATE PROCEDURE SP_BorrarLibro(IN id_lib CHAR(5))
BEGIN
    DELETE FROM Libros WHERE id_libro = id_lib;
END $$
DELIMITER ;
CALL SP_BorrarLibro('L0003');

-- Buscar Libro
DELIMITER $$
CREATE PROCEDURE SP_BuscarLibro(IN id_lib CHAR(5))
BEGIN
    SELECT l.id_libro, l.titulo, CONCAT(a.nombre, ' ', a.apellido) AS autor, a.nacionalidad, e.nombre AS editorial, c.nombre_categoria AS categoria, l.precio
    FROM Libros l
    INNER JOIN Autores a ON l.autor = a.id_autor
    INNER JOIN Editoriales e ON l.editorial = e.id_editorial
    INNER JOIN Categorias c ON l.categoria = c.id_categoria
    WHERE l.id_libro = id_lib;
END $$
DELIMITER ;
CALL SP_BuscarLibro('L0001');

-- Editar Libro

DELIMITER $$
CREATE PROCEDURE SP_EditarLibro(
    IN id_lib CHAR(5),
    IN nuevo_titulo VARCHAR(100),
    IN nuevo_autor CHAR(5),
    IN nueva_editorial CHAR(5),
    IN nueva_categoria CHAR(5),
    IN nuevo_precio DECIMAL(10, 2)
)
BEGIN
    UPDATE Libros
    SET titulo = nuevo_titulo,
        autor = nuevo_autor,
        editorial = nueva_editorial,
        categoria = nueva_categoria,
        precio = nuevo_precio
    WHERE id_libro = id_lib;
END $$
DELIMITER ;

CALL SP_EditarLibro('L0001', 'Nuevo título', 'A0003', 'E0001', 'C0002', 24.99);

-- Filtrar Libro

DELIMITER $$
CREATE PROCEDURE SP_FiltrarLibro(IN nombre_filtro VARCHAR(100))
BEGIN
    SELECT 
        l.id_libro, 
        l.titulo, 
        CONCAT(a.nombre, ' ', a.apellido) AS autor,
        a.nacionalidad,
        e.nombre AS editorial,
        c.nombre_categoria AS categoria,
        l.precio
    FROM 
        Libros l
    INNER JOIN 
        Autores a ON l.autor = a.id_autor
    INNER JOIN 
        Editoriales e ON l.editorial = e.id_editorial
    INNER JOIN 
        Categorias c ON l.categoria = c.id_categoria
    WHERE 
        l.titulo LIKE CONCAT('%', nombre_filtro, '%');
END$$
DELIMITER ;

CALL SP_FiltrarLibro('s');


-- LIBRO--------------------------------------------------

-- EDITORIALES--------------------------------------------
-- Listar Editoriales
DELIMITER $$
CREATE PROCEDURE SP_ListarEditoriales()
BEGIN
    SELECT * FROM Editoriales;
END $$
DELIMITER ;
CALL SP_ListarEditoriales();

-- Venta-------------------------------------------------

-- Listar ventas
DELIMITER $$
CREATE PROCEDURE SP_ListarVenta()
BEGIN
SELECT v.id_venta, v.id_libro, l.titulo, v.fecha_venta, v.cantidad_vendida, v.total
FROM Ventas v
INNER JOIN Libros l ON v.id_libro = l.id_libro
ORDER BY v.id_venta ASC;
END $$
DELIMITER ;

CALL SP_ListarVenta();

-- Buscar venta
DELIMITER $$
CREATE PROCEDURE SP_BuscarVenta(IN id_venta_buscar CHAR(5))
BEGIN
SELECT v.id_venta, v.id_libro, l.titulo, v.fecha_venta, v.cantidad_vendida, v.total
FROM Ventas v
INNER JOIN Libros l ON v.id_libro = l.id_libro
WHERE v.id_venta = id_venta_buscar;
END $$
DELIMITER ;

CALL SP_BuscarVenta('V0001');

-- Mostrar venta
DELIMITER $$
CREATE PROCEDURE SP_MostrarVenta(IN id_venta_buscar CHAR(5))
BEGIN
SELECT v.id_venta, v.id_libro, l.titulo, CONCAT(a.nombre, ' ', a.apellido) AS autor, a.nacionalidad, e.nombre AS editorial, c.nombre_categoria AS categoria, l.precio, v.fecha_venta, v.cantidad_vendida, v.total
FROM Ventas v
INNER JOIN Libros l ON v.id_libro = l.id_libro
INNER JOIN Autores a ON l.autor = a.id_autor
INNER JOIN Editoriales e ON l.editorial = e.id_editorial
INNER JOIN Categorias c ON l.categoria = c.id_categoria
WHERE v.id_venta = id_venta_buscar;
END $$
DELIMITER ;

CALL SP_MostrarVenta('V0001');

-- Filtrar  ventas
DELIMITER $$
CREATE PROCEDURE SP_FiltrarVenta(IN nombre_libro VARCHAR(100))
BEGIN
SELECT v.id_venta, v.id_libro, l.titulo, CONCAT(a.nombre, ' ', a.apellido) AS autor, a.nacionalidad, e.nombre AS editorial, c.nombre_categoria AS categoria, l.precio, v.fecha_venta, v.cantidad_vendida, v.total
FROM Ventas v
INNER JOIN Libros l ON v.id_libro = l.id_libro
INNER JOIN Autores a ON l.autor = a.id_autor
INNER JOIN Editoriales e ON l.editorial = e.id_editorial
INNER JOIN Categorias c ON l.categoria = c.id_categoria
WHERE l.titulo LIKE CONCAT('%', nombre_libro, '%');
END $$
DELIMITER ;

CALL SP_FiltrarVenta('q');

-- Registrar venta
DELIMITER $$
CREATE PROCEDURE SP_RegistrarVenta(IN id_libro_venta CHAR(5), IN fecha_venta_nueva DATE, IN cantidad_vendida_nueva INT, IN total_nuevo DECIMAL(10, 2), IN id_venta_nueva CHAR(5))
BEGIN
INSERT INTO Ventas (id_venta, id_libro, fecha_venta, cantidad_vendida, total)
VALUES (id_venta_nueva, id_libro_venta, fecha_venta_nueva, cantidad_vendida_nueva, total_nuevo);
END $$
DELIMITER ;

CALL SP_RegistrarVenta('L0002', '2023-04-22', 2, 31.98, 'V0002');

-- Editar  venta
DELIMITER $$
CREATE PROCEDURE SP_EditarVenta(IN id_venta_editar CHAR(5), IN id_libro_nuevo CHAR(5), IN fecha_venta_nueva DATE, IN cantidad_vendida_nueva INT, IN total_nuevo DECIMAL(10, 2))
BEGIN
UPDATE Ventas
SET id_libro = id_libro_nuevo,
fecha_venta = fecha_venta_nueva,
cantidad_vendida = cantidad_vendida_nueva,
total = total_nuevo
WHERE id_venta = id_venta_editar;
END $$
DELIMITER ;

CALL SP_EditarVenta('V0003', 'L0002', '2023-04-21', 5, 74.95);

-- Borrar venta
DELIMITER $$
CREATE PROCEDURE SP_BorrarVenta(IN id_venta_borrar CHAR(5))
BEGIN
DELETE FROM Ventas WHERE id_venta = id_venta_borrar;
END $$
DELIMITER ;

CALL SP_BorrarVenta('V0003');
