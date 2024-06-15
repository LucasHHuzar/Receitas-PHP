-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 15-Jun-2024 às 23:16
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `receitas_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `user_id` varchar(30) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`user_id`, `categoria`) VALUES
('carlos', 'Bebidas'),
('carlos', 'Salgados'),
('carlos', 'Doces'),
('Lucas', 'Festa Junina'),
('Lucas', 'Bolos'),
('Lucas', 'Esfiha'),
('Lucas', 'Carnes'),
('Lucas', 'Aves'),
('Lucas', 'Saladas'),
('Lucas', 'Molhos'),
('Lucas', 'Massas'),
('Lucas', 'Churrasco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE `receitas` (
  `user_id` varchar(30) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `conteudo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`user_id`, `nome`, `categoria`, `file_path`, `conteudo`) VALUES
('carlos', 'Arroz de cuxá', 'Salgados', 'img/f_481776.jpg', 'O arroz de cuxá é um prato tradicional do Maranhão. Nesta receita, o chef Miau Caldas ensina como fazer a iguaria, que leva camarão seco, gergelim branco e arroz já cozido.\r\n\r\nDe origem maranhense, o arroz de cuxá é um prato que faz muito sucesso nas Festas Juninas! Por isso, no programa São João na Mesa, o chef Miau Caldas ensina o passo a passo da receita, que leva como ingrediente principal as folhas de vinagreira, conhecidas como cuxá!\r\n\r\nPara fazer a receita de arroz de cuxá, é muito simples: além da planta que é a estrela do prato, você vai precisar de arroz cozido, camarão seco, gergelim branco e temperos diversos. O chef avisa que a receita deve ser comida quente, e que este preparo rende 3 porções bem generosas. Vamos aprender? Confira o passo a passo completo a seguir:\r\n\r\nArroz de cuxá é feito com arroz já cozido — Foto: Globo\r\nArroz de cuxá é feito com arroz já cozido — Foto: Globo\r\n\r\nIngredientes\r\nArroz de cuxá\r\n200 gramas de folha de vinagreira \'cuxá\', cozida e batida na faca\r\nMeia xícara de azeite de coco babaçu, ou de azeite de oliva\r\nMeia cebola-roxa picada\r\n3 dentes de alho picados\r\n4 pimentas-de-cheiro picadas\r\nMeio pimentão amarelo picado\r\nMeia xícara de chá de cheiro-verde picado\r\n30 gramas de gergelim branco sem pele torrado\r\nSal a gosto\r\n1 tomate sem sementes picado\r\n500 gramas de arroz branco cozido\r\nCamarão seco a gosto\r\nModo de Preparo\r\nArroz de cuxá\r\n1\r\nAqueça a panela, coloque o azeite de coco de babaçu e comece refogando a cebola-roxa.\r\n2\r\nEm seguida, em fogo médio, acrescente o alho, o pimentão, o tomate em cubos e uma parte do camarão seco.\r\n3\r\nRefogue mais um pouco e junte o gergelim branco sem pele torrado à panela.\r\n4\r\nColoque as folhas de vinagreira, conhecidas como cuxá, batidas na faca, e, em seguida, a pimenta-de-cheiro e o cheiro-verde.\r\n5\r\nAcrescente o arroz cozido na panela, misturando com todos os ingredientes.\r\n6\r\nAjuste o sal se necessário.\r\n7\r\nDecore o prato com o restante dos camarões secos inteiros.\r\n8\r\nSeu arroz de cuxá está pronto para ser servido. Bom apetite!'),
('carlos', 'Bolo pé de moleque gigante: aprenda versão reduzid', 'Salgados', 'img/whatsapp-image-2023-06-10-at-104150.jpeg', 'Receita do tradicional do São João de Caruaru, bolo pé de moleque gigante é apresentado em versão reduzida para você fazer em casa: veja como preparar a iguaria que pesa originalmente duas toneladas!\r\n\r\n\"Hoje a gente vai ensinar você a fazer simplesmente o melhor bolo pé de moleque da vida. A gente já está com todos os ingredientes e vai ter o passo a passo para você fazer em casa\", anuncia o apresentador Beto Café, ao mostrar que está acompanhado pela Dona Maria Eugênia da Silva, a Maria do Bolo: \"Eu estou aqui abraçando simplesmente um patrimônio vivo de Caruaru\", ele comemora.\r\n\r\nO bolo pé de moleque é uma tradição no São João de Caruaru, durante o Circuito das Comidas Gigantes. Dona Maria do Bolo ensina a fazer a versão reduzida da iguaria, que originalmente pesa duas toneladas. \"Bolo para todo mundo comer, sair satisfeito e rindo\", ressalta a boleira. E para você preparar esse quitute incrível de Festa Junina, veja o passo a passo a seguir:\r\n\r\nBeto Café faz bolo pé de moleque gigante com dona Maria do Bolo — Foto: Globo\r\nBeto Café faz bolo pé de moleque gigante com dona Maria do Bolo — Foto: Globo\r\n\r\nIngredientes\r\nBolo pé de moleque\r\n100 gramas de chocolate em pó 50%\r\n100 gramas de coco ralado\r\nSal a gosto\r\n250 gramas de açúcar\r\n250 gramas de goiabada\r\n500 gramas de margarina\r\n6 ovos\r\n1 quilo de massa de mandioca\r\n500 gramas de castanha-de-caju\r\n100 gramas de cravo\r\n100 gramas de canela\r\n100 gramas de erva-doce\r\n4 litros de água\r\nModo de Preparo\r\nBolo pé de moleque\r\n1\r\nComece fazendo o caldo: ferva 4 litros de água com 100 gramas de cravo, 100 gramas de canela e 100 gramas de erva-doce, durante uma hora, ou até reduzir para aproximadamente 700 mililitros de xarope.\r\n2\r\nEm uma tigela, adicione o açúcar, a goiabada, a margarina, o chocolate em pó 50%, o coco ralado, os ovos, uma pitada generosa de sal, e, misturando aos poucos, coloque o xarope de cravo, canela e erva-doce.\r\n3\r\nTambém aos poucos, acrescente a massa de mandioca, incorporando aos demais ingredientes.\r\n4\r\nUnte uma forma e espalhe castanha-de-caju sobre ela.\r\n5\r\nDerrame a massa sobre a forma e cubra com mais castanhas-de-caju.\r\n6\r\nLeve ao forno preaquecido a 180 graus Célsius por aproximadamente 1 hora.'),
('carlos', 'Pé de moleque cremoso', 'Doces', 'img/mini_zxzzzzzxxxxxxxxxz.png', 'A influenciadora Michele Ykegaya arrasou no preparo do pé de moleque cremoso: o doce, que pode ser servido em copinhos, é perfeito para as Festas Juninas, festas infantis e para aquele encontro com os familiares ou amigos em casa. A receita rende 10 copinhos de 150 mililitros e é muito fácil de fazer. Confira o passo a passo!\r\n\r\nIngredientes\r\nPé de moleque cremoso\r\nTrês quartos de xícara de açúcar\r\n1 xícara de água\r\n1 colher de chá de bicarbonato de sódio\r\n1 lata de leite condensado\r\n2 xícaras de amendoim torrado\r\n1 pitada de sal\r\n1 caixinha de creme de leite\r\nModo de Preparo\r\nPé de moleque cremoso\r\n1\r\nEm uma panela coloque três quarto de xícara de açúcar e 1 xícara de água e espere derreter até virar caramelo.\r\n2\r\nAdicione 1 colher de chá de bicarbonato e misture bem.\r\n3\r\nDespeje 1 lata de leite condensado aos poucos, mexendo sempre.\r\n4\r\nJunte 2 xícaras de amendoim torrado, 1 pitada de sal e mexa até começar a desgrudar do fundo da panela.\r\n5\r\nPor último, coloque 1 caixinha de creme de leite e misture por mais 3 minutos. Desligue o fogo e sirva o pé de moleque cremoso em copinhos.'),
('carlos', 'Quentão', 'Bebids', 'img/receita-de-quentao.jpg', 'Aprenda como fazer quentão tradicional com ingredientes simples como cravo, canela, açúcar e gengibre. Uma receita tradicional do inverno e das festas juninas para a sua casa.\r\n\r\nPoucas coisas são melhores do que um quentão no friozinho, certo? Nesta versão tradicional, a bebida junina leva cachaça no preparo, porém, ela aceita ainda outras bebidas, como vinho, rum e até vodka. Esta é a grande diferença entre o quentão e o vinho quente, que não permite a alteração do ingrediente principal na receita.\r\n\r\nSimples de preparar, primeiro você começa a receita de quentão fervendo o açúcar com a água e as especiarias para depois acrescentar a cachaça. Depois, é só esquentar mais 5 minutinhos e servir. Aprenda o passo a passo da receita completa!\r\n\r\nIngredientes\r\nQuentão\r\n300 gramas de açúcar\r\n4 cravos-da-índia\r\n1 canela em pau\r\n7 gramas de gengibre picado\r\n90 mililitros de suco de limão\r\n30 mililitros de mel\r\n2 litros de água\r\n1 litro de cachaça\r\nModo de Preparo\r\nQuentão\r\n1\r\nEm uma panela, coloque o açúcar, os cravos-da-índia, a canela em pau, o gengibre picado, o suco de limão, o mel e a água.\r\n2\r\nMisture bem os ingredientes, ligue o fogo e deixe cozinhar por 15 minutos após levantar fervura.\r\n3\r\nDesligue o fogo e reserve.\r\n4\r\nCoe o caldo e adicione toda a cachaça na panela junto com ele.\r\n5\r\nAcenda novamente o fogo e aqueça por 5 minutos.\r\n6\r\nSua receita de quentão está finalizada! Saúde!'),
('Lucas', 'Bolo de coração', 'Bolos', 'img/Mini_cora_es2.png', 'Ingredientes\r\nBolo de coração\r\n170 gramas de iogurte natural\r\n90 mililitros de óleo\r\n4 ovos\r\n5 mililitros de essência de baunilha\r\n290 gramas de açúcar\r\n170 gramas de farinha de trigo\r\n10 gramas de fermento químico em pó\r\nÓleo para untar\r\nChantilly o quanto baste para cobrir\r\n\r\nModo de Preparo\r\nBolo de coração\r\n1\r\nEm uma tigela, coloque o iogurte natural, o óleo, os ovos, a essência de baunilha e bata com um fouet ou colher grande, misturando bem todos os ingredientes úmidos.\r\n2\r\nAcrescente o açúcar, a farinha de trigo, o fermento químico em pó e volte a misturar bem todos os ingredientes até ficar na consistência de massa.\r\n3\r\nDespeje a massa em uma forma forrada com papel-manteiga, untada com óleo e enfarinhada.\r\n4\r\nLeve ao forno a 180 graus Célsius por 40 minutos.\r\n5\r\nRetire do forno, corte em forma de coração.\r\n6\r\nCubra o bolo de coração com chantilly e decore com frutas.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `usuario`, `nome`, `senha`) VALUES
(1, 'Lucas', 'Lucas', '$2y$10$lMd6VnJdegPOstfmu4WHwO7FpcgbPyd2o74v78.l/UNrziK.HmA3C'),
(2, 'carlos', 'carlos', '$2y$10$c.tIZvWIsBKjIELKl3fy4ef/Vbr56xTOU9EDg86A4CfbO1CAxP4bS'),
(3, 'Andrew', 'Andrew', '$2y$10$rsPf3dDVr.IL152ler0ot.Vmm/5YIxpmH4PP3EDzqa/LFHOrxt3tq');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
