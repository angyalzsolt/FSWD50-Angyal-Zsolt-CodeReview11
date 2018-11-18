-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Nov 18. 20:57
-- Kiszolgáló verziója: 10.1.36-MariaDB
-- PHP verzió: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `cr11_angyalzsolt_travelmatic`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `concert`
--

CREATE TABLE `concert` (
  `concert_id` int(11) NOT NULL,
  `concert_name` varchar(50) NOT NULL,
  `concert_date` date NOT NULL,
  `concert_time` date NOT NULL,
  `concert_price` int(11) NOT NULL,
  `fk_location_id` int(11) NOT NULL,
  `fk_web_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `concert`
--

INSERT INTO `concert` (`concert_id`, `concert_name`, `concert_date`, `concert_time`, `concert_price`, `fk_location_id`, `fk_web_address`) VALUES
(5, 'TEST', '2018-11-06', '2018-11-14', 100, 6, 7),
(6, 'ACDC', '2018-11-02', '2018-11-29', 200, 8, 8),
(7, 'Solomun', '2018-11-04', '2018-11-10', 300, 9, 7);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `image`
--

INSERT INTO `image` (`image_id`, `image_url`) VALUES
(9, 'https://cdn.pixabay.com/photo/2018/10/01/20/38/meteora-3717220_960_720.jpg'),
(10, 'https://cdn.stocksnap.io/img-thumbs/960w/N0KS0SFLO2.jpg'),
(11, 'https://cdn.stocksnap.io/img-thumbs/960w/6ZMXTUJ92C.jpg'),
(12, 'https://cdn.stocksnap.io/img-thumbs/960w/X3Z67W9XV4.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `zip` int(11) NOT NULL,
  `fk_image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `location`
--

INSERT INTO `location` (`location_id`, `country`, `city`, `street`, `zip`, `fk_image_id`) VALUES
(6, 'Hungary', 'Salgotarjan', 'Nyarfa 2 ', 3100, 9),
(7, 'Hungary', 'Szombathely', 'Ernuszt Kelemen 48', 9700, 11),
(8, 'Austria', 'Vienna', 'Haupt', 1010, 12),
(9, 'Spain', 'Barcelon', 'Main', 2010, 11);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `restaurant_tel_num` int(11) NOT NULL,
  `restaurant_type` varchar(50) NOT NULL,
  `restaurant_shortdesc` varchar(300) NOT NULL,
  `fk_location_id` int(11) NOT NULL,
  `fk_web_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_tel_num`, `restaurant_type`, `restaurant_shortdesc`, `fk_location_id`, `fk_web_address`) VALUES
(20, 'Pizzeria', 5454545, 'italien', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget lectus tincidunt quam vehicula bibendum. Vestibulum ut ultrices magna. Suspendisse sodales, odio ut viverra faucibus, arcu elit faucibus sapien', 7, 10),
(21, 'Gekko', 2147483647, 'Pub', 'Lorem ipsum textLorem ipsum textLorem ipsum textLorem ipsum textLorem ipsum textLorem ipsum textLorem ipsum text', 8, 11),
(24, 'aldkjlj', 23424, 'dslmnsdfln', 'lskdfjlsfdls', 8, 11);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `things_to_do`
--

CREATE TABLE `things_to_do` (
  `things_id` int(11) NOT NULL,
  `things_name` varchar(50) NOT NULL,
  `things_type` varchar(50) NOT NULL,
  `thing_shortdesc` varchar(200) NOT NULL,
  `fk_web_address` int(11) NOT NULL,
  `fk_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `things_to_do`
--

INSERT INTO `things_to_do` (`things_id`, `things_name`, `things_type`, `thing_shortdesc`, `fk_web_address`, `fk_location_id`) VALUES
(7, 'TEST', 'testy type', 'adahkashd aksh dahsdas hd.ahsd ahsdl hsa hdasdh la', 10, 7),
(9, 'BigMuseum', 'good', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget lectus t', 7, 8),
(10, 'Cinema', 'film', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget lectus tincidunt quam vehicula bibendum. Vestibulum ut ultrices magna. Suspendisse sodales,', 8, 6);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userRole` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`userId`, `userName`, `userEmail`, `userPass`, `userRole`) VALUES
(2, 'test', 'test@test.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 2),
(3, 'Admin Test', 'a@a.com', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `web_address`
--

CREATE TABLE `web_address` (
  `web_address_id` int(11) NOT NULL,
  `web_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `web_address`
--

INSERT INTO `web_address` (`web_address_id`, `web_url`) VALUES
(7, 'https://www.google.com/'),
(8, 'https://www.facebook.com/'),
(9, 'https://angular.io/'),
(10, 'https://slack.com/'),
(11, 'www.youtube.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`concert_id`),
  ADD KEY `fk_location_id` (`fk_location_id`),
  ADD KEY `fk_web_address` (`fk_web_address`);

--
-- A tábla indexei `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- A tábla indexei `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `fk_image_id` (`fk_image_id`);

--
-- A tábla indexei `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `fk_location_id` (`fk_location_id`),
  ADD KEY `fk_web_address` (`fk_web_address`);

--
-- A tábla indexei `things_to_do`
--
ALTER TABLE `things_to_do`
  ADD PRIMARY KEY (`things_id`),
  ADD KEY `fk_location_id` (`fk_location_id`),
  ADD KEY `fk_web_address` (`fk_web_address`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- A tábla indexei `web_address`
--
ALTER TABLE `web_address`
  ADD PRIMARY KEY (`web_address_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `concert`
--
ALTER TABLE `concert`
  MODIFY `concert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `things_to_do`
--
ALTER TABLE `things_to_do`
  MODIFY `things_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `web_address`
--
ALTER TABLE `web_address`
  MODIFY `web_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `concert_ibfk_2` FOREIGN KEY (`fk_web_address`) REFERENCES `web_address` (`web_address_id`);

--
-- Megkötések a táblához `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_image_id` FOREIGN KEY (`fk_image_id`) REFERENCES `image` (`image_id`),
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`fk_image_id`) REFERENCES `image` (`image_id`);

--
-- Megkötések a táblához `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`fk_web_address`) REFERENCES `web_address` (`web_address_id`);

--
-- Megkötések a táblához `things_to_do`
--
ALTER TABLE `things_to_do`
  ADD CONSTRAINT `things_to_do_ibfk_1` FOREIGN KEY (`fk_location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `things_to_do_ibfk_2` FOREIGN KEY (`fk_web_address`) REFERENCES `web_address` (`web_address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
