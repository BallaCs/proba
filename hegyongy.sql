-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Már 29. 15:49
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
(1, 'csalad'),
(2, 'munka'),
(3, 'Csani'),
(4, 'Csenge'),
(5, 'Geri'),
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
(11, '', NULL),
(12, '', NULL),
(13, '', NULL),
(14, 'assets/kepek/5c9e1ee1e702c3.84600899.jpg', 0),
(15, 'assets/kepek/5c9e1f30295250.89479299.jpg', 3),
(16, 'assets/kepek/5c9e1f72d59af7.51661776.jpg', 9),
(17, 'assets/kepek/5c9e25b5448199.56348097.jpg', 3);

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
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `post`
--

INSERT INTO `post` (`Post_ID`, `cim`, `szoveg`, `Kep_ID`, `vers`, `datum`) VALUES
(1, 'cim', 'In sed nulla nulla. Vivamus sit amet tellus ut metus vulputate lacinia nec at purus. Sed eget purus urna. Nulla facilisi. Suspendisse eu pharetra tortor, eget ultrices eros. Phasellus eu elit sit amet est eleifend hendrerit ac vel nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis efficitur augue. Nulla vitae tellus risus. Morbi et cursus nunc, molestie aliquet leo.', 9, 1, '2019-03-29'),
(2, 'cim2', 'Donec vulputate dolor vel tortor vehicula posuere. Phasellus hendrerit fermentum felis, aliquam tincidunt justo venenatis et. Vivamus nec semper justo. Quisque mattis imperdiet nibh, et efficitur enim bibendum at. Aenean vel lorem eu elit ullamcorper scelerisque. Curabitur quis blandit metus. Maecenas vitae libero neque. Maecenas ut leo et tortor cursus ornare id at nibh. Aliquam elit eros, egestas eget nibh vitae, dapibus auctor justo.', 10, 0, '2019-03-22'),
(3, '', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 11, 0, '2019-03-29'),
(4, '', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 12, 0, '2019-03-29'),
(5, '', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 13, 1, '2019-03-29'),
(6, '', 'Morbi pharetra ipsum quis eros porta, vel viverra augue vehicula. Maecenas fringilla nibh quis eros viverra ultrices. Aenean euismod venenatis pretium. Aliquam blandit efficitur metus, eget sagittis velit laoreet sollicitudin. Proin dapibus purus id odio consectetur, et sodales metus volutpat. Pellentesque non ante molestie, suscipit lorem vitae, viverra orci. Vestibulum sem erat, convallis sit amet feugiat eu, volutpat at diam. Aenean nec leo vel est molestie convallis eu sed lorem. Pellentesque fringilla nunc nec augue eleifend, vel ultricies felis fermentum. Fusce rhoncus, justo vitae scelerisque ullamcorper, sem sem pharetra elit, id vulputate tellus velit vel ante. Integer tincidunt, magna non faucibus fermentum, lectus justo vulputate justo, vitae porta sapien metus non magna. Maecenas sapien metus, tempor nec erat ac, convallis facilisis velit.', 0, 0, '2019-03-29'),
(7, 'cim3', '', 0, 0, '2019-03-29'),
(8, '', '', 14, 1, '2019-03-29'),
(9, '', '', 15, 0, '2019-03-29'),
(10, '', '', 16, 0, '2019-03-29'),
(11, 'Vers', 'Roses are grey.\r\nViolets are grey.\r\nI am a dog.', 17, 1, '2019-03-29'),
(12, 'sfdds', '', 0, 0, '2019-03-27');

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
  MODIFY `Kep_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `post`
--
ALTER TABLE `post`
  MODIFY `Post_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
