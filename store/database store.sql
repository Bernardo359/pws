DROP TABLE IF EXISTS `lojas`;
CREATE TABLE IF NOT EXISTS `lojas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
    `nif` int DEFAULT NULL,
    `morada` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
    `telefone` int DEFAULT NULL,
    `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
    `id` int NOT NULL AUTO_INCREMENT,
    `descricao` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
    `referencia` int DEFAULT NULL,
    `precounitario` float(7,2) DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `numero` int DEFAULT NULL,
    `data` date DEFAULT NULL,
    `nomecliente` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
    `moradacliente` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
    `nifcliente` int DEFAULT NULL,
    `valortotal` float(7,2) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;


DROP TABLE IF EXISTS `linhafaturas`;
CREATE TABLE IF NOT EXISTS `linhafaturas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `quantidade` int DEFAULT NULL,
    `subtotal` float(7,2) DEFAULT NULL,
    `fatura_id` int DEFAULT NULL,
    `produto_id` int DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `fatura_id` (`fatura_id`),
    KEY `produto_id` (`produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

ALTER TABLE `linhafaturas`
    ADD CONSTRAINT `linhafaturas_ibfk_1` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`),
    ADD CONSTRAINT `linhafaturas_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;