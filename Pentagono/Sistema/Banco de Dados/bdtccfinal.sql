-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2018 às 20:44
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdtccfinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbagendamento`
--

CREATE TABLE `tbagendamento` (
  `codagendamento` int(11) NOT NULL,
  `dataagendamento` date NOT NULL,
  `horariocomecaagendamento` time NOT NULL,
  `horarioterminaagendamento` time NOT NULL,
  `statusagendamento` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `codstatusagendamento` int(11) NOT NULL,
  `codsala` int(11) NOT NULL,
  `solicitanteagendamento` text NOT NULL,
  `instituicaoagendamento` text NOT NULL,
  `cortabela` text NOT NULL,
  `nomeatividade` text NOT NULL,
  `statusNotificacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbagendamento`
--

INSERT INTO `tbagendamento` (`codagendamento`, `dataagendamento`, `horariocomecaagendamento`, `horarioterminaagendamento`, `statusagendamento`, `idusuario`, `codstatusagendamento`, `codsala`, `solicitanteagendamento`, `instituicaoagendamento`, `cortabela`, `nomeatividade`, `statusNotificacao`) VALUES
(111, '2018-10-04', '15:00:00', '16:00:00', 2, 1, 1, 88, '', '', '', '', 2),
(113, '2018-10-20', '15:00:00', '15:30:00', 1, 1, 1, 88, '', '', '', '', 0),
(114, '2018-10-10', '15:00:00', '15:30:00', 1, 1, 1, 89, '', '', '', '', 0),
(117, '2018-12-28', '13:00:00', '15:00:00', 1, 1, 1, 89, '', '', '', '', 0),
(118, '2018-12-28', '16:00:00', '16:30:00', 2, 1, 1, 88, '', '', '', '', 0),
(119, '2018-12-09', '13:00:00', '13:30:00', 2, 1, 1, 85, '', '', '', '', 0),
(120, '2018-11-10', '14:00:00', '14:30:00', 2, 1, 1, 89, '', '', '', '', 0),
(121, '2018-10-01', '14:00:00', '15:00:00', 2, 1, 1, 88, '', '', '', '', 0),
(122, '2018-10-05', '13:00:00', '13:30:00', 2, 1, 1, 89, '', '', '', '', 0),
(123, '2018-10-05', '13:00:00', '13:30:00', 1, 1, 1, 88, '', '', '', '', 1),
(124, '2018-10-31', '16:00:00', '16:30:00', 2, 1, 1, 89, '', '', '', '', 2),
(125, '2018-10-22', '17:00:00', '17:30:00', 2, 1, 1, 89, '', '', '', '', 2),
(126, '2018-10-06', '11:00:00', '11:30:00', 1, 1, 1, 89, '', '', '', '', 2),
(127, '2018-10-01', '09:59:00', '10:30:00', 1, 1, 1, 89, '', '', '', '', 2),
(128, '2018-10-01', '08:00:00', '08:30:00', 1, 1, 1, 89, '', '', '', '', 2),
(129, '2018-10-05', '08:10:00', '08:20:00', 0, 1, 1, 89, '', '', '', '', 2),
(130, '2018-10-04', '12:00:00', '12:30:00', 2, 1, 1, 85, '', '', '', '', 2),
(131, '2018-10-31', '16:24:00', '17:24:00', 1, 1, 1, 85, 'lkjgklajgkl', 'klgjalkgajkl', 'rgba(128,212,255,1)', 'alkgj', 2),
(132, '2018-11-30', '13:01:00', '13:02:00', 0, 1, 1, 85, '', '', '', '', 2),
(133, '2018-11-30', '13:03:00', '13:10:00', 0, 1, 1, 85, '', '', '', '', 2),
(134, '2018-11-30', '13:04:00', '13:05:00', 0, 1, 1, 85, '', '', '', '', 2),
(135, '2018-11-24', '15:00:00', '16:00:00', 1, 8, 1, 25, 'Aline', 'Etec Guaianazes', 'rgba(252,66,123,1)', 'TCC', 0),
(136, '2018-11-24', '17:00:00', '18:00:00', 1, 8, 1, 25, 'Vanessa', 'Etec São Matheus', '', 'Gravação Musical', 0),
(137, '2018-11-24', '09:00:00', '11:00:00', 1, 8, 1, 25, 'Roberto', '', '', 'Sarau', 0),
(138, '2018-11-24', '10:00:00', '10:30:00', 1, 8, 1, 25, 'Júlia', 'Etec São Carlos', '', 'Ginástica', 0),
(139, '2018-11-24', '09:00:00', '09:30:00', 1, 8, 1, 25, 'Lucio', '', '', 'Poesia', 0),
(140, '2018-11-24', '14:00:00', '14:30:00', 1, 1, 1, 1, 'Carlos Eduardo', 'Etec Jacu', '', 'Ballet', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbatividade`
--

CREATE TABLE `tbatividade` (
  `codatividade` int(11) NOT NULL,
  `nomeatividade` varchar(40) NOT NULL,
  `descricaoatividade` varchar(60) NOT NULL,
  `codsalaFk` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cortabela` text NOT NULL,
  `imagematividade` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbatividade`
--

INSERT INTO `tbatividade` (`codatividade`, `nomeatividade`, `descricaoatividade`, `codsalaFk`, `status`, `cortabela`, `imagematividade`) VALUES
(27, 'atividade', 'dfdfgdfg', 30, 1, 'rgba(247,206,123,1)', 'nenhuma'),
(28, 'attd', 'gfdghfh', 30, 0, 'rgba(142,236,200,1)', 'c21de026d74a7df63c97dd7a67c1a9f7.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdisponibilidadereservasala`
--

CREATE TABLE `tbdisponibilidadereservasala` (
  `coddisponibilidadereservasala` int(11) NOT NULL,
  `disponibilidadereservasala` varchar(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbdisponibilidadereservasala`
--

INSERT INTO `tbdisponibilidadereservasala` (`coddisponibilidadereservasala`, `disponibilidadereservasala`) VALUES
(1, 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbevento`
--

CREATE TABLE `tbevento` (
  `codevento` int(11) NOT NULL,
  `nomeevento` varchar(20) NOT NULL,
  `descricaoevento` varchar(60) NOT NULL,
  `codsala` int(11) NOT NULL,
  `datainicioevento` date NOT NULL,
  `datafimevento` date NOT NULL,
  `horainicioevento` time NOT NULL,
  `horafimevento` time NOT NULL,
  `imagemevento` text NOT NULL,
  `eventoexiste` int(11) NOT NULL,
  `cortabela` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbevento`
--

INSERT INTO `tbevento` (`codevento`, `nomeevento`, `descricaoevento`, `codsala`, `datainicioevento`, `datafimevento`, `horainicioevento`, `horafimevento`, `imagemevento`, `eventoexiste`, `cortabela`) VALUES
(1, 'tcc', 'jbwdjwbjd', 4, '2015-02-02', '2018-09-28', '00:00:00', '00:00:00', '', 0, ''),
(2, '  dj3dj', ' dm dm', 3, '2018-09-19', '2018-09-19', '00:00:00', '00:00:00', '', 0, ''),
(3, 'evento', 'fdsfgdg', 19, '2018-10-27', '2018-10-28', '05:00:00', '17:00:00', '348650a2b14f264e4fb4eb2fc8e89d0b.png', 0, 'rgba(247,206,123,1)'),
(4, 'event', 'desc', 19, '2018-10-27', '2018-10-28', '17:00:00', '18:00:00', 'ced7f69ccaf13a85ac046173998a4474.jpg', 0, 'rgba(142,236,200,1)'),
(5, 'holafgdf', 'fdgdfgbd', 30, '2018-10-30', '2018-10-31', '15:00:00', '17:00:00', '76ee2af7405dfef2b14fcec3abdc87b4.jpg', 0, 'rgba(251,165,204,1)'),
(6, 'evento of', 'dsfds', 25, '2018-10-27', '2018-10-28', '18:39:00', '19:39:00', '1ff99c0837e22670659140484abc432e.jpg', 1, 'rgba(160,159,237,1)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbobjeto`
--

CREATE TABLE `tbobjeto` (
  `codobjeto` int(11) NOT NULL,
  `nomeobjeto` varchar(20) NOT NULL,
  `quantidadeobjeto` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cortabela` text NOT NULL,
  `imagemobjeto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbobjeto`
--

INSERT INTO `tbobjeto` (`codobjeto`, `nomeobjeto`, `quantidadeobjeto`, `status`, `cortabela`, `imagemobjeto`) VALUES
(1, 'microfone2', 10, 0, '#0abde3', ''),
(2, 'saxofone', 10, 0, '#fd9644', ''),
(3, 'patinss', 2, 0, '#1dd1a1', ''),
(4, 'patins2222', 1, 0, '#fd9644', ''),
(5, 'foi', 1, 0, '#fc5c65', ''),
(6, 'novo', 20, 0, '#1dd1a1', ''),
(7, 'Pincel', 222, 0, '#fd9644', ''),
(8, 'Pincel', 0, 0, '#e84393', ''),
(9, 'carr', 2, 0, '#e84393', ''),
(10, 'Pincel', 2, 0, '#1dd1a1', ''),
(11, '', 0, 0, '#fd9644', ''),
(12, '', 0, 0, '#fc5c65', ''),
(13, '', 0, 0, '#e84393', ''),
(14, '', 0, 0, '#fd9644', ''),
(15, 'kasljflkaj', 2983209, 0, '#fd9644', ''),
(16, 'Carregador', 10, 0, '#0abde3', ''),
(17, 'Pincel', 2, 0, '#e84393', ''),
(18, 'a', 2, 0, '#0abde3', ''),
(19, 'sfs', 2, 0, '#1dd1a1', ''),
(20, 'af', 2, 0, '#1dd1a1', ''),
(21, 'Bprracha', 2, 0, '#fd9644', ''),
(22, 'pinceli', 22, 0, '#0abde3', ''),
(23, 'xandam', 2, 0, '#1dd1a1', ''),
(24, 'af', 2, 0, '#1dd1a1', ''),
(25, 'afa', 2, 0, '#0abde3', ''),
(26, 'sks', 2, 0, '#e84393', ''),
(27, 'afa', 2, 0, '#1dd1a1', ''),
(28, 'afa', 2, 0, '#0abde3', ''),
(29, 'afasf', 122, 0, '#0abde3', ''),
(30, 'afa', 2, 0, '#0abde3', ''),
(31, 'Microfone', 2, 0, '#e84393', ''),
(32, 'afa', 2, 0, '#fd9644', ''),
(33, 'afa', 2, 0, '#1dd1a1', ''),
(34, 'Kaue', 200, 0, '#0abde3', ''),
(35, 'Pincel', 0, 0, '#1dd1a1', ''),
(36, 'Pincel2', 2, 0, '#0abde3', ''),
(37, 'LÃ¡pis', 0, 0, '#fd9644', ''),
(38, 'Caixa de Som', 0, 0, '#e84393', ''),
(39, 'Apontador', 200, 0, '#0abde3', ''),
(40, 'violao', 2, 0, '#0abde3', ''),
(41, 'Guitarra', 10, 0, '#e84393', ''),
(42, 'akfj', 10, 0, '#0abde3', ''),
(43, 'agasgf', 0, 0, '#e84393', ''),
(44, 'alakg', 10, 0, '#1dd1a1', ''),
(45, 'lkagjkl', 0, 0, '#1dd1a1', ''),
(46, 'alkf', 10, 0, '#e84393', ''),
(47, 'Lápis', 2, 0, '#1dd1a1', ''),
(48, 'afkj', 2, 0, '#fd9644', ''),
(49, 'jklfj', 2, 0, '#0abde3', ''),
(50, 'kfjakj', 2, 0, 'rgba(69, 170, 242,1.0)', ''),
(51, 'smfjak', 2, 0, 'rgba(136, 84, 208,1.0)', ''),
(52, 'jfdlkaj', 2, 0, 'rgba(235, 59, 90,1.0)', ''),
(53, 'af', 2, 0, '#0abde3', ''),
(54, 'af', 2, 0, '#25CCF7', ''),
(55, 'KFK', 2, 0, '#25CCF7', ''),
(56, 'AKJFK', 2, 0, '#fd9644', ''),
(57, 'akf', 2, 0, '#FC427B', ''),
(58, 'kfk2', 2, 0, '#32ff7e', ''),
(59, 'skfjakl', 0, 0, '#3ae374', ''),
(60, 'akfk', 2, 0, '#7d5fff', ''),
(61, 'ksfka', 2, 0, '#2ed573', ''),
(62, 'lakf', 2, 0, '#0abde3', ''),
(63, 'kafk', 2, 0, '#ffdd59', ''),
(64, 'akfmk', 2, 0, '#ffdd59', ''),
(65, 'skjdfk', 2, 0, '#FC427B', ''),
(66, 'KLFJAKJF', 2, 0, '#7d5fff', ''),
(67, 'KFJAKJFK', 2, 0, '#2ed573', ''),
(68, 'LFKLAK', 2, 0, '#ffdd59', ''),
(69, 'lakf', 2, 0, '#25CCF7', ''),
(70, 'kagk', 2, 0, '#1dd1a1', ''),
(71, 'kal', 2, 0, '#25CCF7', ''),
(72, 'klfkafk', 2, 0, '#2ed573', ''),
(73, 'kgjakl', 3, 0, '#ffdd59', ''),
(74, 'sfa', 100, 0, '#7d5fff', ''),
(75, 'klsfakl', 22, 0, '#1dd1a1', ''),
(76, 'Saxofone', 2, 0, '#ffdd59', ''),
(77, 'fkjalk', 2, 0, '#7d5fff', ''),
(78, 'akjflkafl', 2, 0, '#FC427B', ''),
(79, 'akfjaklj', 2, 0, '#1dd1a1', ''),
(80, 'aklfjka', 2, 0, '#ffdd59', ''),
(81, 'kafjalkfj', 222, 0, '#FC427B', ''),
(82, 'lagklaf', 10, 0, '#7d5fff', ''),
(83, 'afkla', 1, 0, '#ffdd59', ''),
(84, 'zzzzzz', 111, 0, '#7d5fff', ''),
(85, 'kafjkal', 0, 0, '#7d5fff', ''),
(86, 'ajkfka', 22, 0, '#25CCF7', ''),
(87, 'Microfone', 20, 0, '#7d5fff', ''),
(88, 'Pandeiro', 300, 0, '#1dd1a1', ''),
(89, 'Gaita', 1, 0, '#FC427B', ''),
(90, 'Mic', 14, 0, '#25CCF7', ''),
(91, 'novo', 2, 0, '#7d5fff', ''),
(92, 'ajkgak', 2, 0, '#7d5fff', ''),
(93, 'akl', 2, 0, '#1dd1a1', ''),
(94, 'Som', 2, 0, '#25CCF7', ''),
(95, 'Tampa', 2, 0, 'rgba(160,159,237,1)', ''),
(96, 'Pandeiro', 4, 1, 'rgba(128,212,255,1)', ''),
(97, 'Saxofone', 1, 1, 'rgba(251,165,204,1)', ''),
(98, 'Microfone', 4, 1, 'rgba(142,236,200,1)', ''),
(99, 'Qualquer', 1, 0, 'rgba(160,159,237,1)', ''),
(100, 'Qualquer', 2, 0, 'rgba(247,206,123,1)', ''),
(101, 'Pandeiro', 2, 1, 'rgba(247,206,123,1)', ''),
(102, 'Pandeiro', 2, 0, 'rgba(251,165,204,1)', ''),
(103, 'Som', 2, 0, 'rgba(247,206,123,1)', ''),
(104, 'teste', 2, 0, 'rgba(160,159,237,1)', ''),
(105, 'tes2', 1, 0, 'rgba(142,236,200,1)', ''),
(106, 'r', 2, 0, 'rgba(251,165,204,1)', ''),
(107, 'w', 2, 0, 'rgba(251,165,204,1)', ''),
(108, 'af', 2, 0, 'rgba(160,159,237,1)', ''),
(109, 'AFA', 2, 0, 'rgba(247,206,123,1)', ''),
(110, 'AF', 1, 0, 'rgba(128,212,255,1)', ''),
(111, 'afafg', 2, 0, 'rgba(160,159,237,1)', ''),
(112, 'faf', 2, 0, 'rgba(251,165,204,1)', ''),
(113, 'Pincel', 2, 1, 'rgba(142,236,200,1)', ''),
(114, 'Tambor', 1, 1, 'rgba(142,236,200,1)', ''),
(115, '', 0, 0, 'rgba(251,165,204,1)', ''),
(116, '', 0, 0, 'rgba(142,236,200,1)', ''),
(117, '', 0, 0, 'rgba(160,159,237,1)', ''),
(118, '', 0, 0, 'rgba(247,206,123,1)', ''),
(119, '', 0, 0, 'rgba(160,159,237,1)', ''),
(120, 'Novo', 2, 0, 'rgba(251,165,204,1)', ''),
(121, 'Novo2', 2, 0, 'rgba(160,159,237,1)', ''),
(122, 'novo', 2, 0, 'rgba(247,206,123,1)', ''),
(123, 'novo3', 2, 0, 'rgba(160,159,237,1)', ''),
(124, 'gag', 2, 0, 'rgba(142,236,200,1)', ''),
(125, 'Chocalho', 11, 1, 'rgba(247,206,123,1)', ''),
(126, 'Cavaquinho', 1, 1, 'rgba(128,212,255,1)', ''),
(127, 'afa', 2, 0, 'rgba(160,159,237,1)', ''),
(128, 'agf', 2, 0, 'rgba(247,206,123,1)', ''),
(129, 'faf', 2, 0, 'rgba(247,206,123,1)', ''),
(130, 'afa', 2, 0, 'rgba(128,212,255,1)', ''),
(131, 'afjalkfj', 2, 1, 'rgba(247,206,123,1)', ''),
(132, 'afa', 2, 1, 'rgba(160,159,237,1)', ''),
(133, 'fakj', 2, 0, 'rgba(247,206,123,1)', ''),
(134, '', 0, 0, 'rgba(247,206,123,1)', '8cfbd130cab15378097b6d5a098ad2dc.png'),
(135, '', 0, 0, 'rgba(142,236,200,1)', 'ed8c85dbdbcb0ffdb0ff7e3b21d388f6.png'),
(136, '', 0, 0, 'rgba(247,206,123,1)', '755b347b8359ef4daedd75bb2f93de75.png'),
(137, '', 2, 0, 'rgba(142,236,200,1)', '0ad8ce83251ee7275720e25243dce105.png'),
(138, '', 2147483647, 0, 'rgba(128,212,255,1)', 'a2f11c240c74d99045930e72bdf49983.jpg'),
(139, 'fajakfjk', 2147483647, 0, 'rgba(160,159,237,1)', '76d6ee3b25921425ae944f633c615240.png'),
(140, 'teste', 5, 0, 'rgba(128,212,255,1)', '732874a01fb764bdfabc7595bbae9322.png'),
(141, 'Agora deu bom', 10, 1, 'rgba(251,165,204,1)', '0198a4e44623085bb9756064ba946279.jpg'),
(142, 'Violaos', 5, 1, 'rgba(251,165,204,1)', '4ff82a55c124036fc17c276dea9065e1.jpg'),
(143, 'Flauta', 2, 0, 'rgba(247,206,123,1)', 'c42acd705cc40b63c707200a4f0222f3.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbobjetossala`
--

CREATE TABLE `tbobjetossala` (
  `codobjetossala` int(11) NOT NULL,
  `codsala` int(11) NOT NULL,
  `codobjeto` int(11) NOT NULL,
  `quantidadeobjetosala` int(11) NOT NULL,
  `statusObjSala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbobjetossala`
--

INSERT INTO `tbobjetossala` (`codobjetossala`, `codsala`, `codobjeto`, `quantidadeobjetosala`, `statusObjSala`) VALUES
(23, 34, 96, 0, 1),
(24, 35, 98, 0, 1),
(25, 36, 114, 0, 1),
(26, 36, 125, 0, 1),
(27, 36, 126, 0, 1),
(28, 37, 113, 0, 1),
(29, 39, 98, 0, 0),
(30, 40, 131, 0, 0),
(31, 42, 96, 2, 0),
(32, 42, 96, 2, 0),
(33, 42, 98, 1, 0),
(34, 42, 98, 0, 0),
(35, 43, 125, 1, 0),
(36, 44, 125, 0, 0),
(37, 45, 126, 1, 0),
(38, 46, 126, 0, 0),
(39, 48, 126, 1, 0),
(40, 48, 126, 0, 0),
(41, 49, 126, 1, 1),
(42, 50, 98, 2, 0),
(43, 50, 114, 1, 0),
(44, 50, 126, 1, 0),
(45, 50, 142, 0, 0),
(46, 50, 142, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsala`
--

CREATE TABLE `tbsala` (
  `codsala` int(11) NOT NULL,
  `nomesala` varchar(30) NOT NULL,
  `codstatussala` int(11) NOT NULL,
  `coddisponibilidadereservasala` int(11) NOT NULL,
  `descricaosala` varchar(80) NOT NULL,
  `imagemsala` text NOT NULL,
  `cortabela` text NOT NULL,
  `statussala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbsala`
--

INSERT INTO `tbsala` (`codsala`, `nomesala`, `codstatussala`, `coddisponibilidadereservasala`, `descricaosala`, `imagemsala`, `cortabela`, `statussala`) VALUES
(3, '', 1, 1, '', '', '#0abde3', 0),
(4, '', 1, 1, '', '', '#e84393', 0),
(7, 'Sala de artes', 1, 1, 'asfas', '', '#fc5c65', 0),
(8, 'alkfjaklj22', 1, 1, 'gjaklgjlkajfgakl', '', '#fd9644', 0),
(9, '', 1, 1, '', '', '#1dd1a1', 0),
(10, 'novo', 1, 1, 'faÃ§fafd', '', '#1dd1a1', 0),
(11, 'kjfajf', 1, 1, 'fkajsfklajsklfa', '', '#0abde3', 0),
(12, '', 1, 1, '', '', '#e84393', 0),
(13, 'afasfga', 1, 1, 'afgasfgas', '', '#fc5c65', 0),
(14, 'FKASJFKLSA', 1, 1, 'fasfasf', '', '#0abde3', 0),
(15, 'Aaa', 1, 1, 'faksfalsfa', '', '#e84393', 0),
(16, 'agag', 1, 1, 'fasfgasfa', '', '#e84393', 0),
(17, 'afsda2', 1, 1, 'fasfasdf', '', '#e84393', 0),
(18, 'akfjak2', 1, 1, 'fkjaskfj', '', '#e84393', 0),
(19, 'slfl2', 1, 1, 'jfalfja', '', '#0abde3', 0),
(20, 'ag', 1, 1, 'fasf', '', '#0abde3', 0),
(21, 'amfn', 1, 1, 'fkas', '', '#1dd1a1', 0),
(22, 'alkgj', 1, 1, 'jfklafmaj', '', '#e84393', 0),
(23, 'alkgj', 1, 1, 'klfklasjkl', '', '#0abde3', 0),
(24, '', 1, 1, '', '', '#e84393', 0),
(25, 'aklfj', 1, 1, 'klfkajsfkl', '', 'rgba(160,159,237,1)', 1),
(26, 'lksfj', 1, 1, 'fkjaskfasl', '', '#0abde3', 0),
(27, 'lÃ§a', 1, 1, 'kfglajsl', '', '#0abde3', 0),
(28, 'aklfg', 1, 1, 'kfjklaf', '', '#e84393', 0),
(29, 'aklf', 1, 1, 'lkjfaklsfkjlasklf', '', '#0abde3', 0),
(30, 'Mikhael', 1, 1, 'asfksafa', '', 'rgba(160,159,237,1)', 1),
(31, 'Sala nova', 1, 1, 'saladesc', '367dbc9f9962557a68f8ccc8ebb28eb4.png', 'rgba(247,206,123,1)', 1),
(32, 'salads', 1, 1, 'fdfs', 'c8666a47d95ba4b0fdc4d0a6491fa49f.jpg', 'rgba(251,165,204,1)', 0),
(33, 'nonss', 1, 1, 'fdgfdfg', 'de6440323b526e1d877466aed6f0fe9e.jpg', 'rgba(128,212,255,1)', 1),
(34, 'sasfsd', 1, 1, 'fgdgd', 'nenhuma', 'rgba(251,165,204,1)', 1),
(35, 'cadastrou', 1, 1, 'olhaso', 'nenhuma', 'rgba(142,236,200,1)', 1),
(36, 'numsei', 1, 1, 'fggfdgdf', 'nenhuma', 'rgba(251,165,204,1)', 1),
(37, 'lobjs', 1, 1, 'grdfhgdf', 'nenhuma', 'rgba(142,236,200,1)', 1),
(38, 'lobjs', 1, 1, 'grdfhgdf', 'nenhuma', 'rgba(247,206,123,1)', 0),
(39, 'fdgdfgdfg', 1, 1, 'fgdfgdfgdfg', 'nenhuma', 'rgba(251,165,204,1)', 0),
(40, 'fdgdfgdfg', 1, 1, 'fgdfgdfgdfg', 'nenhuma', 'rgba(251,165,204,1)', 0),
(41, 'hola', 1, 1, 'test', 'nenhuma', 'rgba(247,206,123,1)', 0),
(42, 'hola', 1, 1, 'test', 'nenhuma', 'rgba(128,212,255,1)', 0),
(43, 'test', 1, 1, 'gfgf', 'nenhuma', 'rgba(160,159,237,1)', 0),
(44, 'test', 1, 1, 'gfgf', 'nenhuma', 'rgba(247,206,123,1)', 0),
(45, 'Testbug', 1, 1, 'gfdkjhnfghfg', 'nenhuma', 'rgba(142,236,200,1)', 0),
(46, 'Testbug', 1, 1, 'gfdkjhnfghfg', 'nenhuma', 'rgba(160,159,237,1)', 0),
(47, 'cav', 1, 1, 'fgdgd', 'nenhuma', 'rgba(247,206,123,1)', 0),
(48, 'cav', 1, 1, 'fgdgd', 'nenhuma', 'rgba(142,236,200,1)', 0),
(49, 'Testagora', 1, 1, 'fdgf', 'nenhuma', 'rgba(160,159,237,1)', 1),
(50, 'tenissals', 1, 1, 'fdsgdf', 'nenhuma', 'rgba(160,159,237,1)', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatusagendamento`
--

CREATE TABLE `tbstatusagendamento` (
  `codstatusagendamento` int(11) NOT NULL,
  `statusagendamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbstatusagendamento`
--

INSERT INTO `tbstatusagendamento` (`codstatusagendamento`, `statusagendamento`) VALUES
(1, 'confirmado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatusevento`
--

CREATE TABLE `tbstatusevento` (
  `codstatusevento` int(11) NOT NULL,
  `statusevento` int(11) NOT NULL,
  `codevento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatusobjetosala`
--

CREATE TABLE `tbstatusobjetosala` (
  `codstatusobjetosala` int(11) NOT NULL,
  `codobjetossala` int(11) NOT NULL,
  `statusobjeotosala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatussala`
--

CREATE TABLE `tbstatussala` (
  `codstatussala` int(11) NOT NULL,
  `statussala` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbstatussala`
--

INSERT INTO `tbstatussala` (`codstatussala`, `statussala`) VALUES
(1, 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipousuario`
--

CREATE TABLE `tbtipousuario` (
  `codtipousuario` int(11) NOT NULL,
  `codusuario` int(11) NOT NULL,
  `niveltipousuario` int(11) NOT NULL DEFAULT '0' COMMENT '0 para visitante, 1 para funcionario, 2 para coordenador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `codusuario` int(11) NOT NULL,
  `nomeusuario` varchar(40) NOT NULL,
  `datanascimentousuario` date NOT NULL,
  `cpfusuario` varchar(14) NOT NULL,
  `logradourousuario` varchar(80) NOT NULL,
  `numeroresidenciausuario` int(11) NOT NULL,
  `complementousuario` varchar(15) NOT NULL,
  `bairrousuario` varchar(80) NOT NULL,
  `cepusuario` varchar(9) NOT NULL,
  `residencialusuario` varchar(14) NOT NULL,
  `celularusuario` varchar(15) NOT NULL,
  `sexousuario` varchar(30) NOT NULL,
  `emailusuario` varchar(100) NOT NULL,
  `senhausuario` varchar(20) NOT NULL,
  `cidadeusuario` varchar(30) NOT NULL,
  `nivelusuario` int(11) NOT NULL,
  `dataCadastro` date NOT NULL,
  `meioConheceu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`codusuario`, `nomeusuario`, `datanascimentousuario`, `cpfusuario`, `logradourousuario`, `numeroresidenciausuario`, `complementousuario`, `bairrousuario`, `cepusuario`, `residencialusuario`, `celularusuario`, `sexousuario`, `emailusuario`, `senhausuario`, `cidadeusuario`, `nivelusuario`, `dataCadastro`, `meioConheceu`) VALUES
(18, 'adm', '0000-00-00', '', '', 0, '', '', '0', '0', '0', '', 'adm', 'adm', '', 1, '0000-00-00', ''),
(19, 'adm', '2001-11-11', '0', 'a', 0, '0', '0', '0', '0', '0', '0', 'a', 'adm', 'a', 1, '0000-00-00', ''),
(20, 'Mikhael', '0000-00-00', '503.207.998-75', 'Rua Arroio Arapongas', 365, '24AA', 'Conjunto Habitacional Santa Et', '8485440', '2147483647', '0', 'Ma', 'mikael@hotmail.com', '', 'SÃ£o Paulo', 0, '2018-01-22', 'TV/Jornais'),
(21, 'Mikazl', '0000-00-00', '503.207.998-73', 'Rua Arroio Arapongas', 365, '24AA', 'Conjunto Habitacional Santa Et', '8485440', '2147483647', '0', 'Ma', 'mikhael@hotmail.com', '11111111111111', 'SÃ£o Paulo', 0, '2018-02-22', 'Redes Sociais'),
(28, 'Guilherme Santos Lopes', '0000-00-00', '503.208.222-75', 'Rua Arroio Arapongas', 365, 'Apt 24A', 'Conjunto Habitacional Santa Et', '8485440', '(11) 1111-1111', '(11) 11111-1111', 'Masculino', 'gui@hotmail.com', '11111111111111', 'São Paulo', 0, '2018-02-22', 'Sites'),
(29, 'Gui', '0000-00-00', '503.999.999-99', 'Rua Arroio Arapongas', 365, 'Apt 24A', 'Conjunto Habitacional Santa Etelvina III', '8485440', '(11) 1111-1111', '(11) 11111-1111', 'Masculino', 'gui2@hotmail.com', 'gui12345', 'São Paulo', 0, '2018-03-22', 'Por amigos ou conhecidos'),
(30, 'Mikahel', '0000-00-00', '084.854.234-24', 'Rua Arroio Arapongas', 365, 'Apt 24A', 'Conjunto Habitacional Santa Etelvina III', '08485-440', '(11) 1111-1111', '(11) 11111-1111', 'Masculino', 'mikahel@hotmail.com', '11111111111111', 'São Paulo', 0, '2018-05-22', 'Outros'),
(33, 'Rafa', '2018-09-03', '503.207.889-22', 'Rua Arroio Arapongas', 365, 'Apt 24A', 'Conjunto Habitacional Santa Etelvina III', '08485-440', '(11) 1111-1111', '(11) 11111-1111', 'Masculino', 'rafa@hotmail.com', '11111111111111', 'São Paulo', 0, '2018-12-22', 'Outros'),
(34, 'Lucas', '2018-09-28', '504.222.222-22', 'Rua Arroio Arapongas', 365, 'Apt 24A', 'Conjunto Habitacional Santa Etelvina III', '08485-440', '(11) 1111-1111', '(11) 11111-1111', 'Masculino', 'lucas@live.comn', '11111111111111', 'São Paulo', 0, '2018-10-22', 'Outros');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbagendamento`
--
ALTER TABLE `tbagendamento`
  ADD PRIMARY KEY (`codagendamento`),
  ADD KEY `codusuario` (`idusuario`),
  ADD KEY `codstatusagendamento` (`codstatusagendamento`),
  ADD KEY `codsala` (`codsala`);

--
-- Indexes for table `tbatividade`
--
ALTER TABLE `tbatividade`
  ADD PRIMARY KEY (`codatividade`),
  ADD KEY `codsala` (`codsalaFk`);

--
-- Indexes for table `tbdisponibilidadereservasala`
--
ALTER TABLE `tbdisponibilidadereservasala`
  ADD PRIMARY KEY (`coddisponibilidadereservasala`);

--
-- Indexes for table `tbevento`
--
ALTER TABLE `tbevento`
  ADD PRIMARY KEY (`codevento`),
  ADD KEY `codsala` (`codsala`);

--
-- Indexes for table `tbobjeto`
--
ALTER TABLE `tbobjeto`
  ADD PRIMARY KEY (`codobjeto`);

--
-- Indexes for table `tbobjetossala`
--
ALTER TABLE `tbobjetossala`
  ADD PRIMARY KEY (`codobjetossala`),
  ADD KEY `codsala` (`codsala`);

--
-- Indexes for table `tbsala`
--
ALTER TABLE `tbsala`
  ADD PRIMARY KEY (`codsala`),
  ADD KEY `coddisponibilidadereservasala` (`coddisponibilidadereservasala`),
  ADD KEY `codstatussala` (`codstatussala`);

--
-- Indexes for table `tbstatusagendamento`
--
ALTER TABLE `tbstatusagendamento`
  ADD PRIMARY KEY (`codstatusagendamento`);

--
-- Indexes for table `tbstatusevento`
--
ALTER TABLE `tbstatusevento`
  ADD PRIMARY KEY (`codstatusevento`),
  ADD KEY `codevento` (`codevento`);

--
-- Indexes for table `tbstatusobjetosala`
--
ALTER TABLE `tbstatusobjetosala`
  ADD PRIMARY KEY (`codstatusobjetosala`),
  ADD KEY `codobjetossala` (`codobjetossala`);

--
-- Indexes for table `tbstatussala`
--
ALTER TABLE `tbstatussala`
  ADD PRIMARY KEY (`codstatussala`);

--
-- Indexes for table `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  ADD PRIMARY KEY (`codtipousuario`),
  ADD KEY `codusuario` (`codusuario`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`codusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbagendamento`
--
ALTER TABLE `tbagendamento`
  MODIFY `codagendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `tbatividade`
--
ALTER TABLE `tbatividade`
  MODIFY `codatividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbdisponibilidadereservasala`
--
ALTER TABLE `tbdisponibilidadereservasala`
  MODIFY `coddisponibilidadereservasala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbevento`
--
ALTER TABLE `tbevento`
  MODIFY `codevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbobjeto`
--
ALTER TABLE `tbobjeto`
  MODIFY `codobjeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `tbobjetossala`
--
ALTER TABLE `tbobjetossala`
  MODIFY `codobjetossala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbsala`
--
ALTER TABLE `tbsala`
  MODIFY `codsala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbstatusagendamento`
--
ALTER TABLE `tbstatusagendamento`
  MODIFY `codstatusagendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbstatusevento`
--
ALTER TABLE `tbstatusevento`
  MODIFY `codstatusevento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbstatusobjetosala`
--
ALTER TABLE `tbstatusobjetosala`
  MODIFY `codstatusobjetosala` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbstatussala`
--
ALTER TABLE `tbstatussala`
  MODIFY `codstatussala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  MODIFY `codtipousuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbatividade`
--
ALTER TABLE `tbatividade`
  ADD CONSTRAINT `tbatividade_ibfk_1` FOREIGN KEY (`codsalaFk`) REFERENCES `tbsala` (`codsala`);

--
-- Limitadores para a tabela `tbevento`
--
ALTER TABLE `tbevento`
  ADD CONSTRAINT `tbevento_ibfk_1` FOREIGN KEY (`codsala`) REFERENCES `tbsala` (`codsala`);

--
-- Limitadores para a tabela `tbobjetossala`
--
ALTER TABLE `tbobjetossala`
  ADD CONSTRAINT `tbobjetossala_ibfk_1` FOREIGN KEY (`codsala`) REFERENCES `tbsala` (`codsala`);

--
-- Limitadores para a tabela `tbsala`
--
ALTER TABLE `tbsala`
  ADD CONSTRAINT `tbsala_ibfk_1` FOREIGN KEY (`coddisponibilidadereservasala`) REFERENCES `tbdisponibilidadereservasala` (`coddisponibilidadereservasala`),
  ADD CONSTRAINT `tbsala_ibfk_2` FOREIGN KEY (`codstatussala`) REFERENCES `tbstatussala` (`codstatussala`);

--
-- Limitadores para a tabela `tbstatusevento`
--
ALTER TABLE `tbstatusevento`
  ADD CONSTRAINT `tbstatusevento_ibfk_1` FOREIGN KEY (`codevento`) REFERENCES `tbevento` (`codevento`);

--
-- Limitadores para a tabela `tbstatusobjetosala`
--
ALTER TABLE `tbstatusobjetosala`
  ADD CONSTRAINT `tbstatusobjetosala_ibfk_1` FOREIGN KEY (`codobjetossala`) REFERENCES `tbobjetossala` (`codobjetossala`);

--
-- Limitadores para a tabela `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  ADD CONSTRAINT `tbtipousuario_ibfk_1` FOREIGN KEY (`codusuario`) REFERENCES `tbusuario` (`codusuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
