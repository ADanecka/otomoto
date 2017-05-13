-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Maj 2017, 19:33
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `otomoto`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `idcat` int(11) NOT NULL,
  `nazwakat` varchar(64) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`idcat`, `nazwakat`) VALUES
(1, 'Osobowy'),
(2, 'Dostawczy'),
(3, 'SUV');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochod`
--

CREATE TABLE `samochod` (
  `idcar` int(11) NOT NULL,
  `marka` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `pojsiln` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `mocsiln` int(11) NOT NULL,
  `rokprod` int(11) NOT NULL,
  `przebieg` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `opis` varchar(3000) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie` varchar(512) COLLATE utf8_polish_ci NOT NULL,
  `idcat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `samochod`
--

INSERT INTO `samochod` (`idcar`, `marka`, `model`, `pojsiln`, `mocsiln`, `rokprod`, `przebieg`, `cena`, `opis`, `zdjecie`, `idcat`) VALUES
(2, 'Polonez', 'Caro', '3.0 BiTurbo', 300, 1990, 350660, 5000, 'Samochód dla kolekcjonera, jeżdżony tylko do kościoła, normalnie igła!!', 'polonez.jpg', 1),
(4, 'Citroen', 'C5', '1.9', 120, 2004, 160000, 10000, 'Kombi, przestronny, bardzo dobrze się prowadzi.', 'citr', 1),
(7, 'Mercedes', 'AMG', '3.5 Benzyna', 320, 2016, 10000, 86999, 'Fajny ten samochód!', 'merc', 1),
(22, 'Citroen', 'Jumper', '3.0 Diesiel', 180, 2011, 185000, 66000, 'Dostawczak wysokiej klasy', 'citrjump.jpg', 2),
(24, 'Lublin', '3', '2.9 Diesel', 100, 1998, 201050, 3100, 'Super Lublin, sprzedaje, bo nie stać mnie na utrzymanie tego cacuszka.', 'lublin.jpg', 2),
(27, 'BMW', 'X5', '3.0 Benzyna', 240, 2014, 20000, 159999, 'BMW, samochód z charakterem', 'bmw.jpg', 3),
(29, 'Mercedes', 'Klasa A', '1.8 Benzyna', 110, 2007, 140000, 18500, 'Sprawny, szybki, przyjemny na drogach. Nie czuć polskich ulic.', 'YmtktkpTURBXy9jMGEyMGVmNDc1MDAxYzYyYzJjNTRjMzRmZGNhYzJmNy5qcGeSlQMADM0CWM0BUZMFzQMgzQHC.jpg', 1),
(37, 'Audi', 'Q5 S-Line', '3.5 TURBO', 240, 2016, 10000, 10000, 'Fajny samochód, czarny, skórzana tapicera, wszystko pięknie i ładnie pachnie w środku. Tylko choinki Wunderbaum.', 'audi.jpg', 3),
(45, 'VW', 'Golf mk4', '2.0 Benzyna + LPG', 110, 2004, 240000, 2000, 'Siemaneczko mordeczki, z tej strony Seba! Dzisiaj pod mlotek musze wystawic swoja wierna milosc, czylo Golfa 4. Samochod po naprawie, wgiela sie felga i urwal wachac jak driftowalem pod Tesco, ale teraz smiga jak Ferdynand Kiepski do monopolowego. Spala malo, za dwie dyhy morzna smignonc sie poopolac czy wypic bro nad Rio de Zegrzynerio i spowrotem i zostanie jeszcze na poruszanie sie po rejonie. Siedzenia troche zaplamione kebabem, bo czesto jedlim z ziomeczkami jak kwadrat byl zajety. Mam fajne dodatki pod lusterko w srodku auta- kula taneczna i rozowe kosci. Wiencej nie powiem, bo nie znam sie na samochodah, ale ten muj samochod chodzi jak igla. Sprzedaje, bo mósze miec na alimanty na dziecko. Jezeli jakies pytania o tej rakiecie, walic do mnie smialo! ELOOOO !!!!1! (L)', 'comment_h98VxXUC9xy1qJfNoeyYXNMplPUNhhrT.jpg', 1),
(46, 'Peugeot', 'Partner 1.6HDI', '1.5 DIESEL', 80, 2007, 210000, 12900, 'Peugeot Partner 1.6 HDI posiada: wspomaganie kierownicy, poduszka powietrzna kierowcy, klimatyzacja, dopuszczalna ładowność do 800 kg. Samochód godny polecenia. Sprawdzi się w każdej firmie. Serdecznie zapraszam do zakupu.', 'peugo.jpg', 2),
(47, 'Opel', 'Insignia TURBO', '2.0 Benzyna', 220, 2010, 199000, 34500, 'POJAZD ZAREJESTROWANY W KRAJU CENA SAMOCHODU ZAWIERA WSZYSTKIE OPŁATY SKARBOWEJ. Samochód sprowadzony z Niemiec, posiadał tylko jednego właściciela, udokumentowany przebieg pojazdu (rachunki za wszystkie wykonane przeglądy i naprawy), komplet kół zimowych ze stalowymi felgami, pojazd świeżo po wymianie oleju oraz filtrów.', '841566855_1_1080x720_opel-insignia-cosmo-salon-polska-lpg-dodatkowy-komplet-felg-wiel-bialystok.jpg', 1),
(48, 'Opel', 'Insignia', '1.9 Diesel', 140, 2011, 210000, 32000, 'POJAZD ZAREJESTROWANY W KRAJU CENA SAMOCHODU ZAWIERA WSZYSTKIE OPŁATY SKARBOWEJ. Samochód sprowadzony z Niemiec, posiadał tylko jednego właściciela, udokumentowany przebieg pojazdu (rachunki za wszystkie wykonane przeglądy i naprawy).', 'ins.jpg', 1),
(49, 'Volvo', 'XC 50', '2.5 Benzyna', 164, 2012, 140200, 54000, 'Wyposażenie(ABS, Asystent parkowania, Czujnik deszczu, Elektrochromatyczne lusterka boczne, Elektryczne szyby tylne, ESP (stabilizacja toru jazdy), Isofix, Kurtyny powietrzne, Poduszka powietrzna kierowcy, Przyciemniane szyby, Światła przeciwmgielne, Tempomat, Alufelgi, CD, Czujnik zmierzchu, Elektrochromatyczne lusterko wsteczne, Elektrycznie ustawiane fotele, Klimatyzacja dwustrefowa, Podgrzewane lusterka boczne, Poduszka powietrzna pasażera, Radio fabryczne, Światła Xenonowe, Wielofunkcyjna kierownica, ASR (kontrola trakcji), Centralny zamek, Czujniki parkowania tylne, Elektryczne szyby przednie, Elektrycznie ustawiane lusterka, Immobilizer, Komputer pokładowy, Podgrzewane przednie siedzenia, Poduszki boczne przednie, Relingi dachowe, Tapicerka skórzana, Wspomaganie kierownicy), Nawigacja\r\nWięcej informacji udzielam telefonicznie', 'volvo.jpg', 3),
(50, 'Żuk ', 'A-11B', '2.5 Diesel', 80, 1999, 350000, 1500, 'SPRZEDAM!! Samochód dostawczy ŻUK 1999rok 2.5 diesel z skrzynia. Opłacony zarejestrowany w Polsce, w pełni sprawny technicznie. Dobrze się prowadzi.', 'zuk.JPG', 2),
(51, 'Fiat', '126p', '1.3 (chyba Benzyna)', 75, 1991, 324800, 2100, 'Witom sanowanych Państwa! Dzisioj chcem wam se cos zaprezentować, mianowicia MALUCHAA!! Sprzedam tego dziada jak najszybcioj, rok produkcji 1991r. Auto na chodzie, garażowane w stodole. Jestem pierwszym i pewnie jedynym właścicielem, jak siem teraz na sprzedo. OC jest, AC nie brałem, bo komu by sie chcialo tego zloma krasc. Następne badanie techniczne 26.04. 2018roku (nie wiem jak przeszedl). Jezdzone po zakupy, do kosciola i po pasze dla kruf. Polecam!', '847599263_1_1080x720_fiat-126p-fsm-1991r.jpg', 1),
(52, 'Polonez', 'Truck', '1.9 Diesel', 70, 2001, 245600, 1500, 'Witom po raz kolejny! Dzisiaj państwu chcem zaprezentować nadzwyczajnego i jedynego w swoim swoistym rodzaju- Poloneza Trucka. Samochód stal w stodole, uzywany do wywozenia obornika i innych typu takich rzeczy. Badania sie skonczyly, ale kto by sie tam przyjmowal. Samochod zapala jak mu sie zachce, takze jezeli jestes osoba ciagle sie spozniajaca odradzam!! Ten samochod jest pewny jak to, że go uda mi sie go komus upchnac. 70 koni pod zrzartą przez rdzę maską, także moc jest!! Kolor 16lat temu był biały, a teraz zmienia się jak kamaleon w odcien brązu. Fotele wygodne, wypierdziane i starte! Mimo wszystko samochod jak rakieta, moze wybuchnac. Serio moze wybuchnac, bo jakiegos przewoda znalazlem pod nim ostatnio, chyba od oleju. Polecam!! ', '840188475_2_1080x720_w-pelni-sprawny-truck-19-diesel-bemowo-2001r-dodaj-zdjecia.jpg', 2),
(54, 'VW', 'Passat ', '1.9 Diesel', 150, 2006, 300000, 6000, 'Super samochód!', 'pobrane.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `iduser` int(11) NOT NULL,
  `imie` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `ulica` varchar(120) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(120) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(120) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(120) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`iduser`, `imie`, `nazwisko`, `email`, `telefon`, `ulica`, `miasto`, `login`, `haslo`) VALUES
(1, 'Janusz', 'Nowak', 'nowak@gmail.com', 665776554, 'Towarowa 81/70', 'Radom', 'nowak12', 'nowakhaslo'),
(4, 'Piotr', 'Skoniecki', 'piotrek213@vp.pl', 665767484, 'Targowa 81/70', 'WARSZAWA', 'cyka', 'duu'),
(6, 'Seba', 'Mordzinski', 'seba@gmail.com', 665767484, 'Stalowa 50/ 3', 'WARSZAWA', 'seba123', 'legia'),
(7, 'Kajetan', 'Kajetanowicz', 'kajtek@vp.pl', 656787655, 'Wyscigowa 12/12', 'Sosnowiec', 'kajetan12', 'kajetan'),
(8, 'Ździsław', 'Kędzierzynowski', 'kedzik@starysamochod.pl', 667887999, 'Zukowska 12', 'RADOM', 'starysamochod', 'zdzislaw'),
(9, 'Oskar', 'Michałowski', 'slayer8600@op.pl', 665887556, 'Cwelska 2/3', 'Warszawa', 'slayer8600', 'oskar123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wystawauto`
--

CREATE TABLE `wystawauto` (
  `idwystaw` int(11) NOT NULL,
  `idcars` int(11) NOT NULL,
  `idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wystawauto`
--

INSERT INTO `wystawauto` (`idwystaw`, `idcars`, `idusers`) VALUES
(13, 22, 4),
(14, 2, 1),
(15, 7, 1),
(19, 37, 1),
(28, 45, 6),
(29, 4, 4),
(31, 27, 4),
(32, 29, 1),
(33, 46, 1),
(34, 47, 7),
(35, 48, 7),
(36, 49, 7),
(37, 50, 8),
(38, 51, 8),
(39, 52, 8),
(40, 24, 8),
(42, 54, 9);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`idcat`);

--
-- Indexes for table `samochod`
--
ALTER TABLE `samochod`
  ADD PRIMARY KEY (`idcar`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `wystawauto`
--
ALTER TABLE `wystawauto`
  ADD PRIMARY KEY (`idwystaw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `idcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `samochod`
--
ALTER TABLE `samochod`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `wystawauto`
--
ALTER TABLE `wystawauto`
  MODIFY `idwystaw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
