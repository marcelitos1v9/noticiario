-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para web-tcc
CREATE DATABASE IF NOT EXISTS `web-tcc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `web-tcc`;

-- Copiando estrutura para tabela web-tcc.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `blog_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blog_blogimgs_codigo` int(11) NOT NULL DEFAULT 0,
  `blog_bloginfo_codigo` int(11) NOT NULL DEFAULT 0,
  `blog_usuarios_codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_codigo`),
  KEY `FK_blog_blogimgs` (`blog_blogimgs_codigo`),
  KEY `FK_blog_bloginfo` (`blog_bloginfo_codigo`),
  KEY `FK_blog_usuarios` (`blog_usuarios_codigo`),
  CONSTRAINT `FK_blog_blogimgs` FOREIGN KEY (`blog_blogimgs_codigo`) REFERENCES `blogimgs` (`blogimgs_codigo`),
  CONSTRAINT `FK_blog_bloginfo` FOREIGN KEY (`blog_bloginfo_codigo`) REFERENCES `bloginfo` (`bloginfo_codigo`),
  CONSTRAINT `FK_blog_usuarios` FOREIGN KEY (`blog_usuarios_codigo`) REFERENCES `usuarios` (`usuarios_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.blog: ~6 rows (aproximadamente)
INSERT INTO `blog` (`blog_codigo`, `blog_blogimgs_codigo`, `blog_bloginfo_codigo`, `blog_usuarios_codigo`) VALUES
	(1, 3, 1, 1),
	(2, 4, 2, 2),
	(4, 2, 3, 1),
	(5, 3, 4, 2),
	(20, 14, 31, 2),
	(21, 15, 32, 2);

-- Copiando estrutura para tabela web-tcc.blogimgs
CREATE TABLE IF NOT EXISTS `blogimgs` (
  `blogimgs_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blogimgs_nome` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogimgs_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.blogimgs: ~13 rows (aproximadamente)
INSERT INTO `blogimgs` (`blogimgs_codigo`, `blogimgs_nome`) VALUES
	(1, 'arvore.jpg'),
	(2, 'bicicleta.jpg'),
	(3, 'escola.jpg'),
	(4, 'copo.jpg'),
	(5, 'rua.jpg'),
	(6, 'arvore'),
	(7, '644d9e2aa88c3.png'),
	(10, '644dac1f140fb.png'),
	(11, '644db11542249.png'),
	(12, '644db138d7654.png'),
	(13, '644db1481d547.png'),
	(14, '644db19e773e0.png'),
	(15, '644db29a6551f.png');

-- Copiando estrutura para tabela web-tcc.bloginfo
CREATE TABLE IF NOT EXISTS `bloginfo` (
  `bloginfo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `bloginfo_titulo` varchar(250) NOT NULL DEFAULT '0',
  `bloginfo_corpo` longtext NOT NULL,
  `bloginfo_data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`bloginfo_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.bloginfo: ~24 rows (aproximadamente)
INSERT INTO `bloginfo` (`bloginfo_codigo`, `bloginfo_titulo`, `bloginfo_corpo`, `bloginfo_data`) VALUES
	(1, 'Título exemplo 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius laboriosam, hic obcaecati voluptate atque. Quis eos dolorum optio dicta earum placeat maiores asperiores, quibusdam, autem consequuntur aperiam! Ratione odio, cum quis quae esse maxime ipsum quibusdam libero nihil id nostrum quaerat repellat facilis repudiandae inventore quas minima asperiores nulla?', '2023-04-11 04:21:01'),
	(2, 'Título exemplo 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius laboriosam, hic obcaecati voluptate atque. Quis eos dolorum optio dicta earum placeat maiores asperiores, quibusdam, autem consequuntur aperiam! Ratione odio, cum quis quae esse maxime ipsum quibusdam libero nihil id nostrum quaerat repellat facilis repudiandae inventore quas minima asperiores nulla?', '2023-04-11 04:21:03'),
	(3, 'Título exemplo 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius laboriosam, hic obcaecati voluptate atque. Quis eos dolorum optio dicta earum placeat maiores asperiores, quibusdam, autem consequuntur aperiam! Ratione odio, cum quis quae esse maxime ipsum quibusdam libero nihil id nostrum quaerat repellat facilis repudiandae inventore quas minima asperiores nulla?', '2023-04-11 04:21:04'),
	(4, 'Título exemplo 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius laboriosam, hic obcaecati voluptate atque. Quis eos dolorum optio dicta earum placeat maiores asperiores, quibusdam, autem consequuntur aperiam! Ratione odio, cum quis quae esse maxime ipsum quibusdam libero nihil id nostrum quaerat repellat facilis repudiandae inventore quas minima asperiores nulla?', '2023-04-18 23:17:47'),
	(13, 'materia 1', 'ola mundi', '2023-04-29 22:43:42'),
	(14, 'materia 1', 'ola mundi', '2023-04-29 22:44:46'),
	(15, 'materia 1', 'ola mundi', '2023-04-29 22:46:02'),
	(16, 'materia 1', 'ola mundo', '2023-04-29 23:32:03'),
	(17, 'materia 1', 'ola mundo', '2023-04-29 23:33:45'),
	(18, 'materia 1', '76890', '2023-04-29 23:34:16'),
	(19, 'materia 1', 'aaxzsa', '2023-04-29 23:36:52'),
	(20, 'materia 1', '6gyuioho', '2023-04-29 23:37:55'),
	(21, 'materia 2', 'krserdtfyguhi', '2023-04-29 23:40:17'),
	(22, 'ljshvbnj', 'syciolç', '2023-04-29 23:41:20'),
	(23, 'lnkhbjvghcftxcvghbjk', 'çlkjbhvfcxdxfcvghbnjkmlç', '2023-04-29 23:43:15'),
	(24, 'materia 2', 'lbhrvbnjk', '2023-04-29 23:44:17'),
	(25, 'materia 2', 'lbhrvbnjk', '2023-04-29 23:44:30'),
	(26, 'materia 2', 'lbhrvbnjk', '2023-04-29 23:45:12'),
	(27, 'asxs', 'csas', '2023-04-29 23:45:35'),
	(28, 'materia 1', 'knhbvgycrtytyiu', '2023-04-30 00:06:45'),
	(29, 'materia 1', 'knhbvgycrtytyiu', '2023-04-30 00:07:20'),
	(30, 'kmnbuyryvgubj', 'kijyugtf6rdtfyugioj', '2023-04-30 00:07:36'),
	(31, 'onhbuhbna', 'sadddv', '2023-04-30 00:09:02'),
	(32, 'ola mundo temos uma noticia', 'ola pessoal noticia inserida pela cms eita lele', '2023-04-30 00:13:14');

-- Copiando estrutura para tabela web-tcc.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarios_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_nome` varchar(250) NOT NULL,
  `usuarios_email` varchar(250) NOT NULL,
  `usuarios_senha` varchar(250) NOT NULL,
  `usuarios_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`usuarios_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`usuarios_codigo`, `usuarios_nome`, `usuarios_email`, `usuarios_senha`, `usuarios_status`) VALUES
	(1, 'João', 'joao@email.com', '123', 0),
	(2, 'Maria', 'maria@email.com', '321', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
