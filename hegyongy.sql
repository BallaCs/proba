-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Ápr 07. 12:46
-- Kiszolgáló verziója: 10.1.37-MariaDB
-- PHP verzió: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hegyongy`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `album`
--

CREATE TABLE `album` (
  `Album_ID` int(6) NOT NULL,
  `albumNev` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `album`
--

INSERT INTO `album` (`Album_ID`, `albumNev`) VALUES
(1, 'CsalÃ¡d'),
(2, 'munka'),
(3, 'Csani'),
(4, 'Csenge'),
(6, 'Zsolti'),
(7, 'Apa'),
(8, 'Csani2'),
(9, 'EgyÃ©b');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kep`
--

CREATE TABLE `kep` (
  `Kep_ID` int(6) NOT NULL,
  `utvonal` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `Album_ID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kep`
--

INSERT INTO `kep` (`Kep_ID`, `utvonal`, `Album_ID`) VALUES
(1, 'assets/kepek/5c9ce916243558.95834161.jpg', NULL),
(2, 'assets/kepek/5c9cef976720c5.94972133.jpg', NULL),
(3, 'assets/kepek/5c9cf076c3d190.16727636.jpg', NULL),
(4, 'assets/kepek/5c9dff1228d8d9.95368979.jpg', NULL),
(5, 'assets/kepek/5c9e001dd8a464.43698754.jpg', NULL),
(6, 'assets/kepek/5c9e009133bc86.20807722.jpg', NULL),
(7, 'assets/kepek/5c9e01947047e9.27277837.jpg', NULL),
(8, 'assets/kepek/5c9e01a5d62362.66615814.jpg', NULL),
(9, 'assets/kepek/5c9e065bb77c07.01866992.jpg', NULL),
(10, 'assets/kepek/5c9e06ad0c8290.43983966.jpg', NULL),
(14, 'assets/kepek/5c9e1ee1e702c3.84600899.jpg', 0),
(15, 'assets/kepek/5c9e1f30295250.89479299.jpg', 3),
(16, 'assets/kepek/5c9e1f72d59af7.51661776.jpg', 9),
(17, 'assets/kepek/5c9e25b5448199.56348097.jpg', 3),
(18, 'assets/kepek/5c9f79267afed0.89628317.jpg', 3),
(20, 'assets/kepek/5c9fbca686ef60.45743524.jpg', 3),
(21, 'assets/kepek/5ca12e9306f503.70549799.jpg', 8),
(22, 'assets/kepek/5ca12f6dd5c158.10761246.jpg', 1),
(24, 'assets/kepek/5ca12f6debf182.87669063.jpg', 1),
(25, 'assets/kepek/5ca12f6e0807e9.25155969.jpg', 1),
(26, 'assets/kepek/5ca12f6e12b320.57029262.jpg', 6),
(27, 'assets/kepek/5ca12f6e205b45.69828692.jpg', 1),
(28, 'assets/kepek/5ca12f6e2b2a06.58089412.jpg', 1),
(29, 'assets/kepek/5ca12f6e3e1544.53656773.jpg', 1),
(37, 'assets/kepek/5ca3ad43b68127.94580529.jpg', 9),
(38, 'assets/kepek/5ca3add11da3e4.35807409.jpg', 8),
(39, 'assets/kepek/5ca3b0bde3cff8.09905651.jpg', 3),
(40, 'assets/kepek/5ca3b5f0e18317.97496754.jpg', 3),
(41, 'assets/kepek/5ca3b862b35da2.27487590.png', 6);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `linkmegoszt`
--

CREATE TABLE `linkmegoszt` (
  `Link_ID` int(6) NOT NULL,
  `link` varchar(250) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `tipus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `linkmegoszt`
--

INSERT INTO `linkmegoszt` (`Link_ID`, `link`, `tipus`) VALUES
(2, 'https://www.webslake.com/p/generating-link-preview-using-php/', 3),
(4, 'https://ujforras.hu/ufo-felszaz-hegedus-gyongyi-fotonaploja/', 3),
(5, 'https://ujforras.hu/megszunt-penznem/', 1),
(6, 'https://ujforras.hu/a-nap-amikor-nem-faj-semmi/', 1),
(7, 'https://ujforras.hu/komparasztika/', 1),
(8, 'https://ujforras.hu/a-fiusag-vasara/', 1),
(9, 'https://ujforras.hu/ebredes-utani-nyujtozas/', 1),
(10, 'https://ujforras.hu/catcher-in-the-reye/', 1),
(11, 'https://ujforras.hu/b-sz-triptychon/', 1),
(12, 'https://ujforras.hu/la-belle-indifference/', 1),
(13, 'https://ujforras.hu/hidasi-hegedus-gyongyi-intrauterin-fenyek/', 2),
(14, 'https://ujforras.hu/hegedus-gyongyi-grand-piano-sign/', 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `post`
--

CREATE TABLE `post` (
  `Post_ID` int(6) NOT NULL,
  `cim` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `szoveg` text COLLATE utf8_hungarian_ci,
  `Kep_ID` int(6) DEFAULT NULL,
  `vers` tinyint(1) DEFAULT NULL,
  `video` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `post`
--

INSERT INTO `post` (`Post_ID`, `cim`, `szoveg`, `Kep_ID`, `vers`, `video`, `datum`) VALUES
(3, 'CsanÃ¡d', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 37, 1, 'Ye1ir8MQS4w', '2019-03-30'),
(5, 'CsanÃ¡d', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 37, 0, '', '2019-03-30'),
(10, 'AkÃ¡rmi', 'Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 41, 0, '', '2019-03-31'),
(13, 'Valami', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 0, 1, '', '2019-03-21'),
(14, 'CsanÃ¡d', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 0, 1, '', '2019-04-01'),
(15, 'CÃ­m', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. ', 40, 0, '', '2019-04-02'),
(17, 'CsanÃ¡d4', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 0, 1, '', '2019-04-02');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerkeszto`
--

CREATE TABLE `szerkeszto` (
  `FelhasznaloNev` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `Jelszo` varchar(60) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szerkeszto`
--

INSERT INTO `szerkeszto` (`FelhasznaloNev`, `Jelszo`) VALUES
('root', 'dc76e9f0c0006e8f919e'),
('Bora', '01baa84e8e80cb590b41'),
('root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`Album_ID`);

--
-- A tábla indexei `kep`
--
ALTER TABLE `kep`
  ADD PRIMARY KEY (`Kep_ID`);

--
-- A tábla indexei `linkmegoszt`
--
ALTER TABLE `linkmegoszt`
  ADD PRIMARY KEY (`Link_ID`);

--
-- A tábla indexei `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `album`
--
ALTER TABLE `album`
  MODIFY `Album_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `kep`
--
ALTER TABLE `kep`
  MODIFY `Kep_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT a táblához `linkmegoszt`
--
ALTER TABLE `linkmegoszt`
  MODIFY `Link_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
