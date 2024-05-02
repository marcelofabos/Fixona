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


-- Mostrar categoría por código
DELIMITER $$
CREATE PROCEDURE SP_MostrarCategoria(IN id_cate CHAR(5))
BEGIN
    SELECT * FROM Categorias
    WHERE id_categoria = id_cate;
END $$
DELIMITER ;



-- Registrar un nuevo registro
DELIMITER $$
CREATE PROCEDURE SP_RegistrarCategoria(IN id_categoria CHAR(5),IN nombre_nueva VARCHAR(50))
BEGIN
    INSERT INTO Categorias (id_categoria, nombre_categoria)
    VALUES (id_categoria, nombre_nueva);
END $$
DELIMITER ;


-- Borrar la información de una categoría
DELIMITER $$
CREATE PROCEDURE sp_BorrarCategoria(IN id_cate CHAR(5))
BEGIN
    UPDATE Libros SET categoria = NULL WHERE categoria = id_cate;
    DELETE FROM Categorias WHERE id_categoria = id_cate;
END$$
DELIMITER ;


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

-- Filtrar Categoria
DELIMITER $$
CREATE PROCEDURE SP_FiltrarCategoria(IN nombre_filtro VARCHAR(50))
BEGIN
    SELECT *
    FROM Categorias
    WHERE nombre_categoria LIKE CONCAT('%', nombre_filtro, '%');
END$$
DELIMITER ;



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


-- Registrar un nuevo Libro
DELIMITER $$
CREATE PROCEDURE SP_RegistrarLibro(IN id_libro CHAR(5), IN cod_titulo VARCHAR(100), IN cod_autor CHAR(5), IN cod_editorial CHAR(5), IN cod_categoria CHAR(5), IN cod_precio DECIMAL(10, 2))
BEGIN
    INSERT INTO Libros 
    VALUES (id_libro, cod_titulo, cod_autor, cod_editorial, cod_categoria, precio);
END $$
DELIMITER ;


-- Borrar un Libro
DELIMITER $$
CREATE PROCEDURE SP_BorrarLibro(IN id_lib CHAR(5))
BEGIN
    DELETE FROM Libros WHERE id_libro = id_lib;
END $$
DELIMITER ;

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

DELIMITER $$
CREATE PROCEDURE SP_BuscarLibroporID(IN id_lib CHAR(5))
BEGIN
    SELECT *
    FROM Libros 
    WHERE id_libro = id_lib;
END $$
DELIMITER ;


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


-- LIBRO--------------------------------------------------








-- EDITORIALES--------------------------------------------

-- Listar todas las Editoriales ordenadas de manera ascendente
DELIMITER $$
CREATE PROCEDURE SP_ListarEditorial()
BEGIN
SELECT * FROM Editoriales
ORDER BY id_editorial ASC;
END $$
DELIMITER ;
CALL SP_ListarEditorial();

-- Buscar una editorial por código
DELIMITER $$
CREATE PROCEDURE SP_BuscarEditorial(IN id_edit CHAR(5))
BEGIN
SELECT * FROM Editoriales
WHERE id_editorial = id_edit;
END $$
DELIMITER ;

-- Mostrar la información completa de una editorial por código
DELIMITER $$
CREATE PROCEDURE SP_MostrarEditorial(IN id_edit CHAR(5))
BEGIN
SELECT e.id_editorial, e.nombre, e.pais, COUNT(l.id_libro) AS cant_libros
FROM Editoriales e
LEFT JOIN Libros l ON e.id_editorial = l.editorial
WHERE e.id_editorial = id_edit
GROUP BY e.id_editorial;
END $$
DELIMITER ;

-- Filtrar la información completa de las editoriales por nombre
DELIMITER $$
CREATE PROCEDURE SP_FiltrarEditorial(IN nombre_filtro VARCHAR(50))
BEGIN
SELECT e.id_editorial, e.nombre, e.pais, COUNT(l.id_libro) AS cant_libros
FROM Editoriales e
LEFT JOIN Libros l ON e.id_editorial = l.editorial
WHERE e.nombre LIKE CONCAT('%', nombre_filtro, '%')
GROUP BY e.id_editorial;
END $$
DELIMITER ;

-- Registrar la información de una editorial
DELIMITER $$
CREATE PROCEDURE SP_RegistrarEditorial(IN nombre_nueva VARCHAR(50), IN pais_nuevo VARCHAR(50), IN id_editorial_nueva CHAR(5))
BEGIN
INSERT INTO Editoriales (id_editorial, nombre, pais)
VALUES (id_editorial_nueva, nombre_nueva, pais_nuevo);
END $$
DELIMITER ;

-- Editar la información de una editorial
DELIMITER $$
CREATE PROCEDURE SP_EditarEditorial(IN id_edit CHAR(5), IN nombre_nueva VARCHAR(50), IN pais_nuevo VARCHAR(50))
BEGIN
UPDATE Editoriales
SET nombre = nombre_nueva,
pais = pais_nuevo
WHERE id_editorial = id_edit;
END $$
DELIMITER ;

-- Borrar la información de una editorial
DELIMITER $$
CREATE PROCEDURE SP_BorrarEditorial(IN id_edit CHAR(5))
BEGIN
DELETE FROM Editoriales
WHERE id_editorial = id_edit;
END $$
DELIMITER ;







-- Autores--------------------------------------------------

-- Listar todos los autores ordenados de manera ascendente
DELIMITER $$
CREATE PROCEDURE SP_ListarAutor()
BEGIN
SELECT * FROM Autores
ORDER BY id_autor ASC;
END $$
DELIMITER ;
CALL SP_ListarAutor();
-- Buscar un autor por código
DELIMITER $$
CREATE PROCEDURE SP_BuscarAutor(IN id_aut CHAR(5))
BEGIN
SELECT * FROM Autores
WHERE id_autor = id_aut;
END $$
DELIMITER ;

-- Mostrar la información completa de un autor por código
DELIMITER $$
CREATE PROCEDURE SP_MostrarAutor(IN id_aut CHAR(5))
BEGIN
SELECT a.id_autor, a.nombre, a.apellido, a.nacionalidad, COUNT(l.id_libro) AS cant_libros
FROM Autores a
LEFT JOIN Libros l ON a.id_autor = l.autor
WHERE a.id_autor = id_aut
GROUP BY a.id_autor;
END $$
DELIMITER ;

-- Filtrar la información completa de los autores por nombre
DELIMITER $$
CREATE PROCEDURE SP_FiltrarAutor(IN nombre_filtro VARCHAR(50))
BEGIN
SELECT a.id_autor, a.nombre, a.apellido, a.nacionalidad, COUNT(l.id_libro) AS cant_libros
FROM Autores a
LEFT JOIN Libros l ON a.id_autor = l.autor
WHERE a.nombre LIKE CONCAT('%', nombre_filtro, '%') OR a.apellido LIKE CONCAT('%', nombre_filtro, '%')
GROUP BY a.id_autor;
END $$
DELIMITER ;
CALL SP_FiltrarAutor('l');

-- Registrar la información de un autor
DELIMITER $$
CREATE PROCEDURE SP_RegistrarAutor(IN nombre_nuevo VARCHAR(50), IN apellido_nuevo VARCHAR(50), IN nacionalidad_nueva VARCHAR(50), IN id_autor_nuevo CHAR(5))
BEGIN
INSERT INTO Autores (id_autor, nombre, apellido, nacionalidad)
VALUES (id_autor_nuevo, nombre_nuevo, apellido_nuevo, nacionalidad_nueva);
END $$
DELIMITER ;

-- Editar la información de un autor
DELIMITER $$
CREATE PROCEDURE SP_EditarAutor(IN id_aut CHAR(5), IN nombre_nuevo VARCHAR(50), IN apellido_nuevo VARCHAR(50), IN nacionalidad_nueva VARCHAR(50))
BEGIN
UPDATE Autores
SET nombre = nombre_nuevo,
apellido = apellido_nuevo,
nacionalidad = nacionalidad_nueva
WHERE id_autor = id_aut;
END $$
DELIMITER ;

-- Borrar la información de un autor
DELIMITER $$
CREATE PROCEDURE SP_BorrarAutor(IN id_aut CHAR(5))
BEGIN
DELETE FROM Autores
WHERE id_autor = id_aut;
END $$
DELIMITER ;












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

DELIMITER $$
CREATE PROCEDURE SP_BuscarVentaporID(IN id_venta_buscar CHAR(5))
BEGIN
SELECT *
FROM Ventas 
WHERE id_venta = id_venta_buscar;
END $$
DELIMITER ;

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

- Registrar venta
DELIMITER $$
CREATE PROCEDURE SP_RegistrarVenta(IN id_venta_nueva CHAR(5), IN id_libro_venta CHAR(5), IN fecha_venta_nueva DATE, IN cantidad_vendida_nueva INT, IN total_nuevo DECIMAL(10, 2))
BEGIN
INSERT INTO Ventas (id_venta, id_libro, fecha_venta, cantidad_vendida, total)
VALUES (id_venta_nueva, id_libro_venta, fecha_venta_nueva, cantidad_vendida_nueva, total_nuevo);
END $$
DELIMITER ;


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

-- Borrar venta
DELIMITER $$
CREATE PROCEDURE SP_BorrarVenta(IN id_venta_borrar CHAR(5))
BEGIN
DELETE FROM Ventas WHERE id_venta = id_venta_borrar;
END $$
DELIMITER ;

