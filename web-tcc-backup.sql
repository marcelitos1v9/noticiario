-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.33-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para web-tcc
DROP DATABASE IF EXISTS `web-tcc`;
CREATE DATABASE IF NOT EXISTS `web-tcc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `web-tcc`;

-- Copiando estrutura para tabela web-tcc.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `blog-codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blog-blogimgs-codigo` int(11) NOT NULL DEFAULT '0',
  `blog-bloginfo-codigo` int(11) NOT NULL DEFAULT '0',
  `blog-usuarios-codigo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blog-codigo`),
  KEY `FK_blog_blogimgs` (`blog-blogimgs-codigo`),
  KEY `FK_blog_bloginfo` (`blog-bloginfo-codigo`),
  KEY `FK_blog_usuarios` (`blog-usuarios-codigo`),
  CONSTRAINT `FK_blog_blogimgs` FOREIGN KEY (`blog-blogimgs-codigo`) REFERENCES `blogimgs` (`blogimgs-codigo`),
  CONSTRAINT `FK_blog_bloginfo` FOREIGN KEY (`blog-bloginfo-codigo`) REFERENCES `bloginfo` (`bloginfo-codigo`),
  CONSTRAINT `FK_blog_usuarios` FOREIGN KEY (`blog-usuarios-codigo`) REFERENCES `usuarios` (`usuarios-codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.blog: ~0 rows (aproximadamente)
DELETE FROM `blog`;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Copiando estrutura para tabela web-tcc.blogimgs
CREATE TABLE IF NOT EXISTS `blogimgs` (
  `blogimgs-codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blogimgs-nome` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogimgs-codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.blogimgs: ~5 rows (aproximadamente)
DELETE FROM `blogimgs`;
/*!40000 ALTER TABLE `blogimgs` DISABLE KEYS */;
INSERT INTO `blogimgs` (`blogimgs-codigo`, `blogimgs-nome`) VALUES
	(1, 'arvore.jpg'),
	(2, 'bicicleta.png'),
	(3, 'escola.jpeg'),
	(4, 'copo.jpg'),
	(5, 'rua.jpg');
/*!40000 ALTER TABLE `blogimgs` ENABLE KEYS */;

-- Copiando estrutura para tabela web-tcc.bloginfo
CREATE TABLE IF NOT EXISTS `bloginfo` (
  `bloginfo-codigo` int(11) NOT NULL AUTO_INCREMENT,
  `bloginfo-titulo` varchar(250) NOT NULL DEFAULT '0',
  `bloginfo-corpo` longtext NOT NULL,
  `bloginfo-data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bloginfo-codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.bloginfo: ~3 rows (aproximadamente)
DELETE FROM `bloginfo`;
/*!40000 ALTER TABLE `bloginfo` DISABLE KEYS */;
INSERT INTO `bloginfo` (`bloginfo-codigo`, `bloginfo-titulo`, `bloginfo-corpo`, `bloginfo-data`) VALUES
	(1, 'Título exemplo 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius laboriosam, hic obcaecati voluptate atque. Quis eos dolorum optio dicta earum placeat maiores asperiores, quibusdam, autem consequuntur aperiam! Ratione odio, cum quis quae esse maxime ipsum quibusdam libero nihil id nostrum quaerat repellat facilis repudiandae inventore quas minima asperiores nulla?', '2023-04-11 01:21:01'),
	(2, 'Título exemplo 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius laboriosam, hic obcaecati voluptate atque. Quis eos dolorum optio dicta earum placeat maiores asperiores, quibusdam, autem consequuntur aperiam! Ratione odio, cum quis quae esse maxime ipsum quibusdam libero nihil id nostrum quaerat repellat facilis repudiandae inventore quas minima asperiores nulla?', '2023-04-11 01:21:03'),
	(3, 'Título exemplo 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius laboriosam, hic obcaecati voluptate atque. Quis eos dolorum optio dicta earum placeat maiores asperiores, quibusdam, autem consequuntur aperiam! Ratione odio, cum quis quae esse maxime ipsum quibusdam libero nihil id nostrum quaerat repellat facilis repudiandae inventore quas minima asperiores nulla?', '2023-04-11 01:21:04');
/*!40000 ALTER TABLE `bloginfo` ENABLE KEYS */;

-- Copiando estrutura para tabela web-tcc.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarios-codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios-nome` varchar(250) NOT NULL,
  `usuarios-email` varchar(250) NOT NULL,
  `usuarios-senha` varchar(250) NOT NULL,
  `usuarios-status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usuarios-codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.usuarios: ~2 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`usuarios-codigo`, `usuarios-nome`, `usuarios-email`, `usuarios-senha`, `usuarios-status`) VALUES
	(1, 'João', 'joao@email.com', '123', 0),
	(2, 'Maria', 'maria@email.com', '321', 0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
