CREATE TABLE pet (
    -- SERIAL crea automáticamente una secuencia y asigna un valor entero de autoincremento
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    born DATE NOT NULL,
    chip VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    -- BOOLEAN es el tipo correcto para almacenar true/false
    adopt BOOLEAN NOT NULL DEFAULT FALSE
);

-- Opcional: añade algunos datos de ejemplo si lo necesitas
INSERT INTO pet (name, born, chip, category, adopt) VALUES
('Fido', '2023-01-15', '123A', 'Perro', TRUE),
('Miau', '2024-05-20', '456B', 'Gato', FALSE);
