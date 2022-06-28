-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28-Jun-2022 às 11:20
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id19125896_cinema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Atores`
--

CREATE TABLE `Atores` (
  `IdAtor` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sexo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DataNascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Atores`
--

INSERT INTO `Atores` (`IdAtor`, `Nome`, `Sexo`, `DataNascimento`) VALUES
(5, 'Johnny Depp', 'MASCULINO', '1963-06-09'),
(7, 'Helena Bonham Carter', 'OUTROS', '1967-05-25'),
(8, 'Eliot Page', 'TRANSGENERO', '1989-06-28'),
(9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `CinemaFilme`
--

CREATE TABLE `CinemaFilme` (
  `IdCinemaFilme` int(11) NOT NULL,
  `IdCinema` int(11) DEFAULT NULL,
  `IdFilme` int(11) DEFAULT NULL,
  `IdDia` int(11) DEFAULT NULL,
  `IdHora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `CinemaFilme`
--

INSERT INTO `CinemaFilme` (`IdCinemaFilme`, `IdCinema`, `IdFilme`, `IdDia`, `IdHora`) VALUES
(1, 1, 6, 7, 14),
(3, 1, 6, 3, 10),
(4, 5, 5, 3, 3),
(6, 5, 5, 3, 6),
(7, 1, 5, 3, 5),
(8, 1, 9, 1, 11),
(9, 1, 9, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cinemas`
--

CREATE TABLE `Cinemas` (
  `IdCinema` int(11) NOT NULL,
  `NomeCinema` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Rua` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Numero` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CEP` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IdCidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Cinemas`
--

INSERT INTO `Cinemas` (`IdCinema`, `NomeCinema`, `Rua`, `Numero`, `CEP`, `IdCidade`) VALUES
(1, 'Cinetopia Poá', 'Rua do Cinema', '113', '0865320', 1),
(5, 'Cinetopia Mogi das Cruzes', 'Rua de Mogi', '123', '08565-320', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Classificacoes`
--

CREATE TABLE `Classificacoes` (
  `IdClassificacao` int(11) NOT NULL,
  `Classificacao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Classificacoes`
--

INSERT INTO `Classificacoes` (`IdClassificacao`, `Classificacao`) VALUES
(1, 'Livre para todas as idades'),
(2, 'Não recomendado para menores de 10 anos'),
(3, 'Não recomendado para menores de 12 anos'),
(4, 'Não recomendado para menores de 14 anos'),
(5, 'Não recomendado para menores de 16 anos'),
(6, 'Proibida a entrada de menores de 18 anos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Dias`
--

CREATE TABLE `Dias` (
  `IdDia` int(11) NOT NULL,
  `Dia` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Dias`
--

INSERT INTO `Dias` (`IdDia`, `Dia`) VALUES
(1, 'Todos os Dias'),
(2, 'Segunda-Feira'),
(3, 'Terça-Feira'),
(4, 'Quarta-Feira'),
(5, 'Quinta-Feira'),
(6, 'Sexta-Feira'),
(7, 'Sábado'),
(8, 'Domingo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Diretores`
--

CREATE TABLE `Diretores` (
  `IdDiretor` int(11) NOT NULL,
  `NomeDiretor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Diretores`
--

INSERT INTO `Diretores` (`IdDiretor`, `NomeDiretor`) VALUES
(1, 'Tim Burton'),
(2, 'Steven Spielberg'),
(3, 'Quentin Tarantino'),
(4, 'Lais Costa ST');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Filmes`
--

CREATE TABLE `Filmes` (
  `IdFilme` int(11) NOT NULL,
  `Titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Descricao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Duracao` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Produtora` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lancamento` date DEFAULT NULL,
  `IdGenero` int(11) DEFAULT NULL,
  `IdClassificacao` int(11) DEFAULT NULL,
  `IdIdioma` int(11) DEFAULT NULL,
  `IdDiretor` int(11) DEFAULT NULL,
  `Ator1` int(11) DEFAULT NULL,
  `Ator2` int(11) DEFAULT NULL,
  `Ator3` int(11) DEFAULT NULL,
  `Foto` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Filmes`
--

INSERT INTO `Filmes` (`IdFilme`, `Titulo`, `Descricao`, `Duracao`, `Produtora`, `Lancamento`, `IdGenero`, `IdClassificacao`, `IdIdioma`, `IdDiretor`, `Ator1`, `Ator2`, `Ator3`, `Foto`) VALUES
(5, 'Teste 2 - O retorno', 'Outra tratativa', '1h48', 'Lais', '2022-06-27', 3, 2, 2, 2, 9, 9, 9, 'https://static3.tcdn.com.br/img/img_prod/460977/teste_100485_1_cbc226c7d23a19c784fb4752ffe61337.png'),
(6, 'Bastardos Inglórios', 'Teste de atualização', '1h02', 'Disney', '2022-06-01', 3, 3, 2, 3, 9, 9, 9, 'https://br.web.img2.acsta.net/medias/nmedia/18/90/43/36/20096333.jpg'),
(9, 'Alice no País das Maravilhas', 'Alice cai no buraco do coelho.', '1h48', 'Disney', '2010-02-28', 2, 1, 1, 1, 9, 9, 9, 'https://upload.wikimedia.org/wikipedia/pt/thumb/f/ff/Alice-In-Wonderland-Theatrical-Poster.jpg/250px-Alice-In-Wonderland-Theatrical-Poster.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Generos`
--

CREATE TABLE `Generos` (
  `IdGenero` int(11) NOT NULL,
  `Genero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Generos`
--

INSERT INTO `Generos` (`IdGenero`, `Genero`) VALUES
(1, 'Animação'),
(2, 'Ação e Aventura'),
(3, 'Drama'),
(4, 'Comédia Romantica'),
(5, 'Romance'),
(6, 'Comédia'),
(7, 'Ficção científica'),
(8, 'Drama');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Horas`
--

CREATE TABLE `Horas` (
  `IdHora` int(11) NOT NULL,
  `Hora` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Horas`
--

INSERT INTO `Horas` (`IdHora`, `Hora`) VALUES
(1, '10:00'),
(2, '11:00'),
(3, '12:00'),
(4, '13:00'),
(5, '14:00'),
(6, '15:00'),
(7, '16:00'),
(8, '17:00'),
(9, '18:00'),
(10, '19:00'),
(11, '20:00'),
(12, '21:00'),
(13, '22:00'),
(14, '23:00'),
(15, '00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Idiomas`
--

CREATE TABLE `Idiomas` (
  `IdIdioma` int(11) NOT NULL,
  `Idioma` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Idiomas`
--

INSERT INTO `Idiomas` (`IdIdioma`, `Idioma`) VALUES
(1, 'Português'),
(2, 'Espanhol'),
(3, 'Inglês'),
(4, 'Francês'),
(5, 'Alemão'),
(6, 'Coreano'),
(7, 'Japonês'),
(8, 'Chinês');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Municipios`
--

CREATE TABLE `Municipios` (
  `IdCidade` int(11) NOT NULL,
  `Cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UF` char(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `Municipios`
--

INSERT INTO `Municipios` (`IdCidade`, `Cidade`, `UF`) VALUES
(1, 'Poá', 'SP'),
(2, 'Suzano', 'SP'),
(3, 'São Paulo', 'SP'),
(4, 'Mogi Das Cruzes', 'SP'),
(5, 'Ferraz de Vasconcelos', 'SP'),
(6, 'Itaquequecetuba', 'SP'),
(7, 'Guararema', 'SP'),
(8, 'Biritiba Mirim', 'SP'),
(9, 'Belo Horizonte', 'BH'),
(10, 'Rio de Janeiro', 'RJ'),
(11, 'Salvador', 'BA'),
(12, 'Vitória', 'ES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Programacoes`
--

CREATE TABLE `Programacoes` (
  `Idprogramacao` int(11) NOT NULL,
  `IdDia` int(11) DEFAULT NULL,
  `IdHora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Atores`
--
ALTER TABLE `Atores`
  ADD PRIMARY KEY (`IdAtor`);

--
-- Índices para tabela `CinemaFilme`
--
ALTER TABLE `CinemaFilme`
  ADD PRIMARY KEY (`IdCinemaFilme`),
  ADD KEY `IdCinema` (`IdCinema`),
  ADD KEY `IdFilme` (`IdFilme`),
  ADD KEY `IdDia` (`IdDia`),
  ADD KEY `IdHora` (`IdHora`);

--
-- Índices para tabela `Cinemas`
--
ALTER TABLE `Cinemas`
  ADD PRIMARY KEY (`IdCinema`),
  ADD KEY `IdCidade` (`IdCidade`);

--
-- Índices para tabela `Classificacoes`
--
ALTER TABLE `Classificacoes`
  ADD PRIMARY KEY (`IdClassificacao`);

--
-- Índices para tabela `Dias`
--
ALTER TABLE `Dias`
  ADD PRIMARY KEY (`IdDia`);

--
-- Índices para tabela `Diretores`
--
ALTER TABLE `Diretores`
  ADD PRIMARY KEY (`IdDiretor`);

--
-- Índices para tabela `Filmes`
--
ALTER TABLE `Filmes`
  ADD PRIMARY KEY (`IdFilme`),
  ADD KEY `IdGenero` (`IdGenero`),
  ADD KEY `IdClassificacao` (`IdClassificacao`),
  ADD KEY `IdIdioma` (`IdIdioma`),
  ADD KEY `IdDiretor` (`IdDiretor`),
  ADD KEY `Ator1` (`Ator1`),
  ADD KEY `Ator2` (`Ator2`),
  ADD KEY `Ator3` (`Ator3`);

--
-- Índices para tabela `Generos`
--
ALTER TABLE `Generos`
  ADD PRIMARY KEY (`IdGenero`);

--
-- Índices para tabela `Horas`
--
ALTER TABLE `Horas`
  ADD PRIMARY KEY (`IdHora`);

--
-- Índices para tabela `Idiomas`
--
ALTER TABLE `Idiomas`
  ADD PRIMARY KEY (`IdIdioma`);

--
-- Índices para tabela `Municipios`
--
ALTER TABLE `Municipios`
  ADD PRIMARY KEY (`IdCidade`);

--
-- Índices para tabela `Programacoes`
--
ALTER TABLE `Programacoes`
  ADD PRIMARY KEY (`Idprogramacao`),
  ADD KEY `IdDia` (`IdDia`),
  ADD KEY `IdHora` (`IdHora`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Atores`
--
ALTER TABLE `Atores`
  MODIFY `IdAtor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `CinemaFilme`
--
ALTER TABLE `CinemaFilme`
  MODIFY `IdCinemaFilme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `Cinemas`
--
ALTER TABLE `Cinemas`
  MODIFY `IdCinema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Classificacoes`
--
ALTER TABLE `Classificacoes`
  MODIFY `IdClassificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `Dias`
--
ALTER TABLE `Dias`
  MODIFY `IdDia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `Diretores`
--
ALTER TABLE `Diretores`
  MODIFY `IdDiretor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `Filmes`
--
ALTER TABLE `Filmes`
  MODIFY `IdFilme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `Generos`
--
ALTER TABLE `Generos`
  MODIFY `IdGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `Horas`
--
ALTER TABLE `Horas`
  MODIFY `IdHora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `Idiomas`
--
ALTER TABLE `Idiomas`
  MODIFY `IdIdioma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `Municipios`
--
ALTER TABLE `Municipios`
  MODIFY `IdCidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `Programacoes`
--
ALTER TABLE `Programacoes`
  MODIFY `Idprogramacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `CinemaFilme`
--
ALTER TABLE `CinemaFilme`
  ADD CONSTRAINT `CinemaFilme_ibfk_1` FOREIGN KEY (`IdCinema`) REFERENCES `Cinemas` (`IdCinema`),
  ADD CONSTRAINT `CinemaFilme_ibfk_2` FOREIGN KEY (`IdFilme`) REFERENCES `Filmes` (`IdFilme`),
  ADD CONSTRAINT `CinemaFilme_ibfk_3` FOREIGN KEY (`IdDia`) REFERENCES `Dias` (`IdDia`),
  ADD CONSTRAINT `CinemaFilme_ibfk_4` FOREIGN KEY (`IdHora`) REFERENCES `Horas` (`IdHora`);

--
-- Limitadores para a tabela `Cinemas`
--
ALTER TABLE `Cinemas`
  ADD CONSTRAINT `Cinemas_ibfk_1` FOREIGN KEY (`IdCidade`) REFERENCES `Municipios` (`IdCidade`);

--
-- Limitadores para a tabela `Filmes`
--
ALTER TABLE `Filmes`
  ADD CONSTRAINT `Filmes_ibfk_1` FOREIGN KEY (`IdGenero`) REFERENCES `Generos` (`IdGenero`),
  ADD CONSTRAINT `Filmes_ibfk_2` FOREIGN KEY (`IdClassificacao`) REFERENCES `Classificacoes` (`IdClassificacao`),
  ADD CONSTRAINT `Filmes_ibfk_3` FOREIGN KEY (`IdIdioma`) REFERENCES `Idiomas` (`IdIdioma`),
  ADD CONSTRAINT `Filmes_ibfk_4` FOREIGN KEY (`IdDiretor`) REFERENCES `Diretores` (`IdDiretor`),
  ADD CONSTRAINT `Filmes_ibfk_5` FOREIGN KEY (`Ator1`) REFERENCES `Atores` (`IdAtor`),
  ADD CONSTRAINT `Filmes_ibfk_6` FOREIGN KEY (`Ator2`) REFERENCES `Atores` (`IdAtor`),
  ADD CONSTRAINT `Filmes_ibfk_7` FOREIGN KEY (`Ator3`) REFERENCES `Atores` (`IdAtor`);

--
-- Limitadores para a tabela `Programacoes`
--
ALTER TABLE `Programacoes`
  ADD CONSTRAINT `Programacoes_ibfk_1` FOREIGN KEY (`IdDia`) REFERENCES `Dias` (`IdDia`),
  ADD CONSTRAINT `Programacoes_ibfk_2` FOREIGN KEY (`IdHora`) REFERENCES `Horas` (`IdHora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
