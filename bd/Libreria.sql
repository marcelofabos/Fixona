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
  FOREIGN KEY (autor) REFERENCES Autores(id_autor) ON DELETE CASCADE,
  FOREIGN KEY (editorial) REFERENCES Editoriales(id_editorial) ON DELETE CASCADE,
  FOREIGN KEY (categoria) REFERENCES Categorias(id_categoria) ON DELETE CASCADE
);
-- Tabla de Ventas
CREATE TABLE Ventas (
  id_venta char(5) PRIMARY KEY,
  id_libro char(5) NOT NULL,
  fecha_venta DATE NOT NULL,
  cantidad_vendida INT NOT NULL,
  total DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (id_libro) REFERENCES Libros(id_libro) ON DELETE CASCADE
);

select * from ventas;

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
  
SELECT * FROM Categorias;

  
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


-- Registrar un nueva categoria
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

CALL SP_MostrarLibro('L0002');


-- Registrar un nuevo Libro
DELIMITER $$
CREATE PROCEDURE SP_RegistrarLibro(IN id_libro CHAR(5), IN titulo VARCHAR(100), IN autor CHAR(5), IN editorial CHAR(5), IN categoria CHAR(5), IN precio DECIMAL(10, 2))
BEGIN
    INSERT INTO Libros (id_libro, titulo, autor, editorial, categoria, precio)
    VALUES (id_libro, titulo, autor, editorial, categoria, precio);
END $$
DELIMITER ;

-- drop procedure SP_RegistrarLibro
CALL SP_RegistrarLibro('L0008', 'Esta Biennnn', 'A0002', 'E0003', 'C0001', 29.99);

DELIMITER $$
CREATE PROCEDURE SP_EditarLibro(
    IN id_libro_in CHAR(5),
    IN titulo_in VARCHAR(100),
    IN autor_in CHAR(5),
    IN editorial_in CHAR(5),
    IN categoria_in CHAR(5),
    IN precio_in DECIMAL(10, 2)
)
BEGIN
    UPDATE Libros
    SET
        titulo = titulo_in,
        autor = autor_in,
        editorial = editorial_in,
        categoria = categoria_in,
        precio = precio_in
    WHERE
        id_libro = id_libro_in;
END $$

CALL SP_EditarLibro('L0008', 'Esta Biennnn', 'A0002', 'E0003', 'C0001', 29.99);

-- Borrar un Libro
DELIMITER $$
CREATE PROCEDURE SP_BorrarLibro(IN id_lib CHAR(5))
BEGIN
    DELETE FROM Libros WHERE id_libro = id_lib;
END $$
DELIMITER ;
CALL SP_BorrarLibro('L0004');

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
CALL SP_BuscarLibro('L0002');

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

-- Listar Autores
DELIMITER $$
CREATE PROCEDURE SP_ListarAutores()
BEGIN
    SELECT * FROM Autores;
END $$
DELIMITER ;
CALL sp_ListarAutores();

DELIMITER $$
CREATE PROCEDURE SP_ListarAutor()
BEGIN
    SELECT id_autor, CONCAT(nombre, ' ', apellido) AS nombre, nacionalidad FROM Autores;
END $$
DELIMITER ;
CALL sp_ListarAutor();

DELIMITER $$
CREATE PROCEDURE sp_FiltrarLibro(
    IN titulo_buscar VARCHAR(100)
)
BEGIN
    SELECT *
    FROM Libros
    WHERE titulo = titulo_buscar;
END $$

CALL sp_FiltrarLibro(1233);