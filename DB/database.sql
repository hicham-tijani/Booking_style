
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adulti` int NOT NULL,
  `bambini` int NOT NULL,
  `trasporto` varchar(25) NOT NULL,
  `classe` varchar(25) NOT NULL,
  `one_trip` boolean NOT NULL,
  `roundtrip` boolean NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

