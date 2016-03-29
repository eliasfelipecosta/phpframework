CREATE DATABASE `locadora`;

USE `locadora`;

# Dump da tabela categorias
# ------------------------------------------------------------
DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dump da tabela clientes
# ------------------------------------------------------------
DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL DEFAULT '',
  `nome` varchar(45) NOT NULL DEFAULT '',
  `cep` varchar(9) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dump da tabela filmes
# ------------------------------------------------------------
DROP TABLE IF EXISTS `filmes`;

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_filmes_categorias` (`categoria_id`),
  CONSTRAINT `fk_filmes_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dump da tabela locacoes
# ------------------------------------------------------------
DROP TABLE IF EXISTS `locacoes`;

CREATE TABLE `locacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `data_devolucao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_locacoes_clientes` (`cliente_id`),
  CONSTRAINT `fk_locacoes_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dump da tabela filmes_alugados
# ------------------------------------------------------------
DROP TABLE IF EXISTS `filmes_alugados`;

CREATE TABLE `filmes_alugados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locacao_id` int(11) NOT NULL,
  `filme_id` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_filmes_alugados_locacoes` (`locacao_id`),
  KEY `fk_filmes_alugados_filmes` (`filme_id`),
  CONSTRAINT `fk_filmes_alugados_filmes` FOREIGN KEY (`filme_id`) REFERENCES `filmes` (`id`),
  CONSTRAINT `fk_filmes_alugados_locacoes` FOREIGN KEY (`locacao_id`) REFERENCES `locacoes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;