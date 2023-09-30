-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 28 Ιουν 2022 στις 00:55:41
-- Έκδοση διακομιστή: 10.4.24-MariaDB
-- Έκδοση PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `earthquake_tracker`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `earthquakes`
--

CREATE TABLE `earthquakes` (
  `id` int(11) NOT NULL,
  `mag` float NOT NULL,
  `place` text NOT NULL,
  `time` bigint(20) NOT NULL,
  `url` text NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `depth` float NOT NULL,
  `alert` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `earthquakes`
--

INSERT INTO `earthquakes` (`id`, `mag`, `place`, `time`, `url`, `longitude`, `latitude`, `depth`, `alert`) VALUES
(1, 3.4, '6 km E of Elgin, South Carolina', 1656221514680, 'https://earthquake.usgs.gov/earthquakes/eventpage/se60400941', -80.7247, 34.1667, 3.52, ''),
(2, 5.6, '30 km NE of Kīsh, Iran', 1656128233976, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hk3w', 54.2613, 26.7253, 10, 'yellow'),
(3, 5.9, '46 km SW of Khōst, Afghanistan', 1655844876148, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hj3u', 69.5135, 33.0924, 10, 'red'),
(4, 3.9, '7 km E of Stillmore, Georgia', 1655539523720, 'https://earthquake.usgs.gov/earthquakes/eventpage/se60400186', -82.1405, 32.4525, 0.75, 'green'),
(5, 5.9, '248 km NW of Tianpeng, China', 1654795717691, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hg9p', 101.878, 32.3646, 15.96, 'yellow'),
(6, 5.6, '248 km NW of Tianpeng, China', 1654790606429, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hg8b', 101.841, 32.3357, 9.5, 'yellow'),
(7, 6.5, '108 km SSW of Tarauacá, Brazil', 1654649747293, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hfrj', -71.1844, -9.0479, 622, 'green'),
(8, 6.3, 'Rat Islands, Aleutian Islands, Alaska', 1654385892459, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hf1u', 178.301, 52.0696, 105, 'green'),
(9, 6.4, 'west of Macquarie Island', 1654348668209, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hexr', 148.695, -57.7326, 10, 'green'),
(10, 6.3, '128 km NW of Neiafu, Tonga', 1654348045914, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000hexp', -174.968, -17.9665, 237, 'green'),
(11, 4.14, '7km NW of Bay Point, CA', 1654171642230, 'https://earthquake.usgs.gov/earthquakes/eventpage/nc73740051', -122.008, 38.0765, 18.43, 'green'),
(12, 5.8, '48 km W of Linqiong, China', 1654074008401, 'https://earthquake.usgs.gov/earthquakes/eventpage/us7000he1h', 102.958, 30.3951, 12, 'yellow');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `earthquakes`
--
ALTER TABLE `earthquakes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `earthquakes`
--
ALTER TABLE `earthquakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
