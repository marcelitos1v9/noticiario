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
DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `blog_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blog_blogimgs_codigo` int(11) NOT NULL DEFAULT '0',
  `blog_bloginfo_codigo` int(11) NOT NULL DEFAULT '0',
  `blog_usuarios_codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_codigo`),
  KEY `FK_blog_blogimgs` (`blog_blogimgs_codigo`),
  KEY `FK_blog_bloginfo` (`blog_bloginfo_codigo`),
  KEY `FK_blog_usuarios` (`blog_usuarios_codigo`),
  CONSTRAINT `FK_blog_blogimgs` FOREIGN KEY (`blog_blogimgs_codigo`) REFERENCES `blogimgs` (`blogimgs_codigo`),
  CONSTRAINT `FK_blog_bloginfo` FOREIGN KEY (`blog_bloginfo_codigo`) REFERENCES `bloginfo` (`bloginfo_codigo`),
  CONSTRAINT `FK_blog_usuarios` FOREIGN KEY (`blog_usuarios_codigo`) REFERENCES `usuarios` (`usuarios_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.blog: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
REPLACE INTO `blog` (`blog_codigo`, `blog_blogimgs_codigo`, `blog_bloginfo_codigo`, `blog_usuarios_codigo`) VALUES
	(35, 33, 43, 6),
	(36, 34, 44, 6),
	(37, 35, 46, 6),
	(38, 36, 47, 6),
	(39, 37, 48, 6);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Copiando estrutura para tabela web-tcc.blogimgs
DROP TABLE IF EXISTS `blogimgs`;
CREATE TABLE IF NOT EXISTS `blogimgs` (
  `blogimgs_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `blogimgs_nome` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogimgs_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.blogimgs: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `blogimgs` DISABLE KEYS */;
REPLACE INTO `blogimgs` (`blogimgs_codigo`, `blogimgs_nome`) VALUES
	(33, '64879eef21c5c.png'),
	(34, '64879f6c10520.png'),
	(35, '6487a44b4c91d.png'),
	(36, '6487a4ebe9681.png'),
	(37, '6487a78052cd2.png');
/*!40000 ALTER TABLE `blogimgs` ENABLE KEYS */;

-- Copiando estrutura para tabela web-tcc.bloginfo
DROP TABLE IF EXISTS `bloginfo`;
CREATE TABLE IF NOT EXISTS `bloginfo` (
  `bloginfo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `bloginfo_titulo` varchar(250) NOT NULL DEFAULT '0',
  `bloginfo_corpo` longtext NOT NULL,
  `bloginfo_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bloginfo_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.bloginfo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `bloginfo` DISABLE KEYS */;
REPLACE INTO `bloginfo` (`bloginfo_codigo`, `bloginfo_titulo`, `bloginfo_corpo`, `bloginfo_data`) VALUES
	(43, 'Curiosidade: Saiba qual é  maior e menor cidade do Vale do Ribeira', 'Ribeira tem o menor número de habitantes da região, com apenas 3.320 pessoas morando na cidade. Registro tem a maior quantidade de habitantes do Vale do Ribeira, com 56.463 habitantes.\r\n\r\nComo começou a ocupação da região do Vale do Ribeira\r\nO litoral da Baixada do Ribeira era habitado por índios seminômades que se dedicavam à caça, pesca e à agricultura itinerante de mandioca e foi visitado por exploradores e colonizadores no início do século XVI. Caso da expedição de 80 homens organizada por Martim Afonso de Sousa para explorar o interior em busca de ouro e prata.\r\n\r\nNesse primeiro período de exploração mineral surgiram os dois núcleos embrionários do Vale do Ribeira: as vilas litorâneas de Cananéia e Iguape. cuja economia se baseava na lavoura de subsistência e na atividade pesqueira. A partir do século XVII , iniciou-se uma ocupação mais intensa do interior em busca de ouro. Com o intenso fluxo fluvial no rio Ribeira de Iguape começou a colonização em suas margens e surgiram as cidades de Sete Barras, Juquiá, Ribeira e Jacupiranga, Eldorado entre outras.\r\n', '2023-06-12 19:40:47'),
	(44, 'A Mata Atlântica no estado de São Paulo', 'A maior parte do estado transformou suas áreas de mata nativa em grandes áreas de plantações e cidades, restando a mata nativa apenas na Serra da Mantiqueira, Serra da Cantareira, Serra do Mar e o Vale do Ribeira, mas nos últimos anos a área de vegetação nativa no estado aumentou 4,9% segundo dados do Instituto Florestal, 2020.', '2023-06-12 19:42:52'),
	(45, '', '', '2023-06-12 19:58:19'),
	(46, 'Parque Estadual da Caverna do Diabo – Vale do Ribeira – SP', 'Como muitos dizem: a 8ª maravilha do mundo.\r\n\r\nCriado no ano de 2008, o Parque Estadual da Caverna do Diabo, juntamente com 13 outras unidades de conservação, integra o mosaico de Jacupiranga, com mais de 40 mil hectares e abrange 4 municípios do Vale do Ribeira: Cajati, Barra do Turvo, Iporanga e Eldorado.\r\n\r\n\r\nSeu maior atrativo é a chamada Caverna do Diabo, que oferece 600 metros de visitação, mas que conta com mais de 6.000 metros de extensão total, com muita flora, rios, cachoeiras e fauna, incluindo espécies ameaçadas de extinção.\r\n\r\n \r\n\r\nCom formações rochosas gigantes formadas ao longo de milhões de anos como fruto do gotejamento da água, a caverna é visitada após a travessia de pontes e passarelas, sempre com acompanhamento de um guia turístico.\r\n\r\nEntre as muitas formações rochosas, é possível encontrar um “crânio”, que ao ser iluminado, reflete uma luz vermelha entre os olhos da “cabeça”, tornando a experiência ainda mais completa.', '2023-06-12 20:03:39'),
	(47, 'Tani: Plataforma inovadora busca impulsionar o turismo no Vale do Ribeira', 'O Vale do Ribeira, região de rica diversidade e belezas naturais, ganha uma aliada para impulsionar o turismo local. A plataforma Tani, lançada recentemente, tem como objetivo conectar viajantes e turistas a experiências autênticas e únicas na região.\r\nCom a proposta de valorizar a cultura local e promover o desenvolvimento sustentável, a Tani oferece uma ampla variedade de opções de turismo, incluindo trilhas ecológicas, passeios de barco pelos rios da região, visitas a comunidades tradicionais, degustações de produtos regionais e muito mais.\r\nAlém de facilitar a descoberta e reserva de atividades, a plataforma também se preocupa em promover a preservação ambiental e o respeito às comunidades locais. Ao escolher uma experiência na Tani, os viajantes têm a garantia de estar contribuindo para a economia local e para a conservação do meio ambiente.\r\nA Tani surge como uma oportunidade para os empreendedores locais divulgarem seus negócios e atrativos turísticos, alcançando um público mais amplo e diversificado. Ao mesmo tempo, os visitantes têm acesso a uma variedade de opções de lazer e cultura, enriquecendo sua experiência na região do Vale do Ribeira.\r\nSe você está planejando uma viagem ao Vale do Ribeira ou é um morador em busca de novas experiências, não deixe de conferir a plataforma Tani e descobrir o que a região tem de melhor a oferecer.', '2023-06-12 20:06:19'),
	(48, 'Vale do futuro ', 'vale do futuro oferece novas oportunidades turismo', '2023-06-12 20:17:20');
/*!40000 ALTER TABLE `bloginfo` ENABLE KEYS */;

-- Copiando estrutura para tabela web-tcc.comentarios
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_codigo` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `comentario` text,
  `data_comentario` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `blog_codigo` (`blog_codigo`),
  KEY `FK_comentarios_usuarios` (`usuario_id`),
  CONSTRAINT `FK_comentarios_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuarios_codigo`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`blog_codigo`) REFERENCES `blog` (`blog_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.comentarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
REPLACE INTO `comentarios` (`id`, `blog_codigo`, `usuario_id`, `comentario`, `data_comentario`) VALUES
	(4, 38, 6, 'ola mundo \r\n', '2023-06-16 20:28:53'),
	(5, 38, 9, 'ola pessoal do zap', '2023-06-16 20:36:18'),
	(6, 37, 9, 'nossa o vale realmente vem se superando com suas paisagens hein', '2023-06-16 20:41:26');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;

-- Copiando estrutura para tabela web-tcc.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarios_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_nome` varchar(250) NOT NULL,
  `usuarios_email` varchar(250) NOT NULL,
  `usuarios_senha` varchar(250) NOT NULL,
  `usuarios_status` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`usuarios_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela web-tcc.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`usuarios_codigo`, `usuarios_nome`, `usuarios_email`, `usuarios_senha`, `usuarios_status`) VALUES
	(6, 'Admin', 'Admin@gmail.com', '$2y$10$jKy4Vdu334F/qZxW7o94z.uTL4T2Iz7IF5b2UMNdYgIIIQKtL7rgS', 0),
	(9, 'Leo', 'leo@gmail.com', '$2y$10$bfwJB/FI5WmaW8DsOLQQDOhVoOkM5vPL.sO//uHjrs3q.ExFZcf6K', 2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
