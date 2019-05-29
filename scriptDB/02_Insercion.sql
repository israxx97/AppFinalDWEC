-- Inserción de datos en la tabla T01_Usuarios. --
INSERT INTO T01_Usuarios (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumAccesos, T01_Perfil, T01_ImagenUsuario) VALUES 
    ('admin', SHA2('paso', 256), 'Administrador', 0, 0, 'administrador', NULL),
    ('israel', SHA2('paso', 256), 'Israel', 0, 0, 'usuario', NULL),
    ('christian', SHA2('paso', 256), 'Christian', 0, 0, 'usuario', NULL),
    ('david', SHA2('paso', 256), 'David', 0, 0, 'usuario', NULL),
    ('adrian', SHA2('paso', 256), 'Adrian', 0, 0, 'usuario', NULL),
    ('tania', SHA2('paso', 256), 'Tania', 0, 0, 'usuario', NULL),
    ('alejandro', SHA2('paso', 256), 'Alejandro', 0, 0, 'usuario', NULL),
    ('victor', SHA2('paso', 256), 'Victor', 0, 0, 'usuario', NULL),
    ('mario', SHA2('paso', 256), 'Mario', 0, 0, 'usuario', NULL),
    ('maria', SHA2('paso', 256), 'Maria', 0, 0, 'usuario', NULL),
    ('amor', SHA2('paso', 256), 'Amor', 0, 0, 'usuario', NULL),
    ('heraclio', SHA2('paso', 256), 'Heraclio', 0, 0, 'usuario', NULL),
    ('baldomero', SHA2('paso', 256), 'Baldomero', 0, 0, 'usuario', NULL),
    ('teresa', SHA2('paso', 256), 'Teresa', 0, 0, 'usuario', NULL);

-- Inserción de datos en la tabla T02_Departamentos. --
INSERT INTO T02_Departamentos (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
    ('AAA', 'Mi departamento AAA', 1554923890, 10, NULL),
    ('AAB', 'Mi departamento AAB', 1554923890, 10, 1554923890),
    ('BBB', 'Mi departamento BBB', 1554923890, 10, NULL),
    ('BBC', 'Mi departamento BBC', 1554923890, 10, NULL),
    ('CCC', 'Mi departamento CCC', 1554923890, 10, 1554923890),
    ('CCD', 'Mi departamento CCD', 1554923890, 10, 1554923890),
    ('DDD', 'Mi departamento DDD', 1554923890, 10, 1554923890),
    ('DDE', 'Mi departamento DDE', 1554923890, 10, NULL),
    ('EEE', 'Mi departamento EEE', 1554923890, 10, NULL),
    ('EEF', 'Mi departamento EEF', 1554923890, 10, NULL),
    ('FFF', 'Mi departamento FFF', 1554923890, 10, 1554923890);

-- Inserción de datos en la tabla T05_Gafas --
INSERT INTO T05_Gafas (T05_IdGafas, T05_Name, T05_Modelo) VALUES 
    (NULL, 'ROLLER TR90 BLACK EDITION', 'unisex'),
    (NULL, 'DUNAR MILKY DEMI / BLACK', 'mujer'),
    (NULL, 'ROLLER TR90 CAREY G15', 'unisex'),
    (NULL, 'ULTRA LIGHT CLIP-ON V1', 'unisex'),
    (NULL, 'ROSEVELT II BLACK / BLACK', 'unisex'),
    (NULL, 'AMERICA II CAREY G-15', 'unisex'),
    (NULL, 'MALIBU BLACK / BLACK', 'mujer'),
    (NULL, 'ORION III RED GRAD BROWN', 'unisex');

