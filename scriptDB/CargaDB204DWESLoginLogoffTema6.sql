use DB204DWESLoginLogoffTema6;

insert into T02_Departamento values('PES', 'Pescaderia', now(), 100.34, null),
('CHA', 'Charcuteria', now(), 2500.46, null),
('MAR', 'Marketing', now(), 12.56, null),
('LIM', 'Limpieza', now(), 3000.6, null),
('VER', 'Verduleria', '2024-07-19 12:00:00', 12000.56, '2024-11-02 14:00:00');

insert into T01_Usuario values('admin', SHA2('adminpaso', 256), 'Admin Admin Admin', 0, null, 'perfil', null),
('alex', SHA2('alexpaso', 256), 'Alex Asensio Sanchez', 0, null, 'perfil', null),
('victor', SHA2('victorpaso', 256), 'Victor Garcia Gordon', 0, null, 'perfil', null),
('luis', SHA2('luispaso', 256), 'Luis Ferreras Gonzalez', 0, null, 'perfil', null),
('jesus', SHA2('jesuspaso', 256), 'Jesus Ferreras Gonzalez', 0, null, 'perfil', null),

('antonio', SHA2('antoniopaso', 256), 'Antonio Jañez Veleda', 0, null, 'perfil', null),
('ivan', SHA2('ivanpaso', 256), 'Ivan Campos de Cela', 0, null, 'perfil', null),
('heraclio', SHA2('heracliopaso', 256), 'Heraclio Borbujo Moran', 0, null, 'perfil', null),
('amor', SHA2('amorpaso', 256), 'Amor Rodriguez Navarro', 0, null, 'perfil', null),
('gisela', SHA2('giselapaso', 256), 'Gisela Folgueral Lindoso', 0, null, 'perfil', null);
