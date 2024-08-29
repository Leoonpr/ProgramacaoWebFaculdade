CREATE TABLE IF NOT EXISTS categoria  (
    id          INT         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome   VARCHAR(60) NOT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS equipamento  (
    id              INT             NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo          CHAR(6)         NOT NULL,
    nome       VARCHAR(100)         NOT NULL,
    preco        DECIMAL(10,2)      NOT NULL,,
    categoria_id    INT             NOT NULL,
    CONSTRAINT fk_equipamento__categoria_id
        FOREIGN KEY ( categoria_id ) REFERENCES categoria( id )
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=INNODB;