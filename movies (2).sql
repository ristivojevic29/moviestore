-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 08:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `idAnketa` int(10) NOT NULL,
  `pitanje` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aktivna` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`idAnketa`, `pitanje`, `aktivna`) VALUES
(1, 'How often do you watch movies?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE `filmovi` (
  `idFilma` int(10) NOT NULL,
  `naziv_filma` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cena_filma` decimal(30,2) NOT NULL,
  `putanja_slike` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alt_slike` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `sati` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idKategorije` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`idFilma`, `naziv_filma`, `cena_filma`, `putanja_slike`, `alt_slike`, `opis`, `sati`, `idKategorije`) VALUES
(1, 'End Game', '39.80', 'assets/images/end-game.jpg', 'endGame', 'A secret Service agent and a news reporter investigate the conspiracy behind the assassination of the President.', '2019-05-25 11:45:56', 1),
(2, 'Avatar', '59.70', 'assets/images/avatar_movie.jpg', 'avatar', 'When his brother is killed in a robbery, paraplegic Marine Jake Sully decides to take his place in a mission on the distant world of Pandora. There he learns of greedy corporate figurehead Parker Selfridge\'s intentions of driving off the native humanoid \"Na\'vi\" in order to mine for the precious material scattered throughout their rich woodland. In exchange for the spinal surgery that will fix his legs, Jake gathers intel for the cooperating military unit spearheaded by gung-ho Colonel Quaritch, while simultaneously attempting to infiltrate the Na\'vi people with the use of an \"avatar\" identity. While Jake begins to bond with the native tribe and quickly falls in love with the beautiful alien Neytiri, the restless Colonel moves forward with his ruthless extermination tactics, forcing the soldier to take a stand - and fight back in an epic battle for the fate of Pandora. ', '2019-05-25 11:45:56', 4),
(3, 'Black Swan', '39.90', 'assets/images/black-swan.jpg', 'blackSwan', 'Nina (Portman) is a ballerina in a New York City ballet company whose life, like all those in her profession, is completely consumed with dance. She lives with her obsessive former ballerina mother Erica (Hershey) who exerts a suffocating control over her. When artistic director Thomas Leroy (Cassel) decides to replace prima ballerina Beth MacIntyre (Ryder) for the opening production of their new season, Swan Lake, Nina is his first choice. But Nina has competition: a new dancer, Lily (Kunis), who impresses Leroy as well. Swan Lake requires a dancer who can play both the White Swan with innocence and grace, and the Black Swan, who represents guile and sensuality. Nina fits the White Swan role perfectly but Lily is the personification of the Black Swan. As the two young dancers expand their rivalry into a twisted friendship, Nina begins to get more in touch with her dark side - a recklessness that threatens to destroy her.', '2019-05-25 11:45:56', 5),
(4, 'Seven', '34.50', 'assets/images/seven7.jpg', 'seven', 'A film about two homicide detectives\' (Morgan Freeman and Brad Pitt) desperate hunt for a serial killer who justifies his crimes as absolution for the world\'s ignorance of the Seven Deadly Sins. The movie takes us from the tortured remains of one victim to the next as the sociopathic \"John Doe\" (Kevin Spacey) sermonizes to Detectives Somerset and Mills -- one sin at a time. The sin of Gluttony comes first and the murderer\'s terrible capacity is graphically demonstrated in the dark and subdued tones characteristic of film noir. The seasoned and cultured but jaded Somerset researches the Seven Deadly Sins in an effort to understand the killer\'s modus operandi while the bright but green and impulsive Detective Mills (Pitt) scoffs at his efforts to get inside the mind of a killer...', '2019-05-25 11:45:56', 3),
(5, 'Insidious', '44.50', 'assets/images/insidious1.png', 'insidious', 'A gripping story of a family in search of help for their son, Dalton, who fell into a coma after a mysterious incident in the attic. Little do they know that there is much more to this endless sleep than meets the eye as they explore the paranormal, and rediscover the past; the key to getting their son back once and for all.', '2019-05-25 11:45:56', 6),
(6, 'Zombieland', '34.50', 'assets/images/zoombie.jpg', 'zombilenad', 'Searching for family. In the early twenty-first century, zombies have taken over America. A shy and inexperienced college student in Texas has survived by following his 30 rules: such as \"look in the back seat,\" \"double-tap,\" \"avoid public restrooms.\" He decides to travel to Ohio to see if his parents are alive. He gets a ride with a boisterous zombie-hating good-old boy headed for Florida, and soon they confront a young woman whose sister has been bitten by a zombie and wants to be put out of her misery. The sisters were headed to an LA amusement park they\'ve heard is zombie free. Can the kid from Ohio get to his family? And what about rule thirty one? ', '2019-05-25 11:45:56', 2),
(7, 'Glass', '60.50', 'assets/images/glass.jpg', 'glass', 'After pursuing Kevin Wendell Crumb and the multiple identities that reside within. David Dunn finds himself locked in a mental hospital alongside his archenemy, Elijah Price and must contend with a psychiatrist who is out to prove the trio do not actually possess superhuman abilities ', '2019-05-25 11:45:56', 7),
(8, 'John Wick 3', '34.70', 'assets/images/john3.jpg', 'JohnWick', 'In this third installment of the adrenaline-fueled action franchise, skilled assassin John Wick (Keanu Reeves) returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin\'s guild, the High Table, John Wick is excommunicado, but the world\'s most ruthless hit men and women await his every turn.', '2019-05-25 11:45:56', 1),
(9, 'The Hobbit', '56.50', 'assets/images/hobbit.jpg', 'theHobbit', 'Bilbo Baggins is swept into a quest to reclaim the lost Dwarf Kingdom of Erebor from the fearsome dragon Smaug. Approached out of the blue by the wizard Gandalf the Grey, Bilbo finds himself joining a company of thirteen dwarves led by the legendary warrior, Thorin Oakenshield. Their journey will take them into the Wild; through treacherous lands swarming with Goblins and Orcs, deadly Wargs and Giant Spiders, Shapeshifters and Sorcerers. Although their goal lies to the East and the wastelands of the Lonely Mountain first they must escape the goblin tunnels, where Bilbo meets the creature that will change his life forever ... Gollum. Here, alone with Gollum, on the shores of an underground lake, the unassuming Bilbo Baggins not only discovers depths of guile and courage that surprise even him, he also gains possession of Gollum\'s \"precious\" ring that holds unexpected and useful qualities ... A simple, gold ring that is tied to the fate of all Middle-earth in ways Bilbo cannot begin to ...', '2019-05-25 11:45:56', 4),
(10, 'Prisoners', '64.50', 'assets/images/prisoners.jpg', 'prisoners', 'How far would you go to protect your family? Keller Dover is facing every parent\'s worst nightmare. His six-year-old daughter, Anna, is missing, together with her young friend, Joy, and as minutes turn to hours, panic sets in. The only lead is a dilapidated RV that had earlier been parked on their street. Heading the investigation, Detective Loki arrests its driver, Alex Jones, but a lack of evidence forces his release. As the police pursue multiple leads and pressure mounts, knowing his child\'s life is at stake the frantic Dover decides he has no choice but to take matters into his own hands. But just how far will this desperate father go to protect his family? ', '2019-05-25 11:45:56', 3),
(11, 'Hereditary', '52.30', 'assets/images/hereditary.jpg', 'hereditary', 'When the matriarch of the Graham family passes away, her daughter\'s family begins to unravel cryptic and increasingly terrifying secrets about their ancestry.', '2019-05-25 11:45:56', 6),
(12, 'Leave No Trace', '66.80', 'assets/images/leaveNoTrace.jpg', 'leaveNotrace', 'Will (Ben Foster) and his teenage daughter, Tom (Thomasin Harcourt McKenzie), have lived off the grid for years in the forests of Portland, Oregon. When their idyllic life is shattered, both are put into social services. After clashing with their new surroundings, Will and Tom set off on a harrowing journey back to their wild homeland. The film is directed by Debra Granik from a script adapted by Granik and Anne Rosellini. ', '2019-05-25 11:45:56', 5),
(13, 'Shutter Island', '39.90', 'assets/images/shutter.jpg', 'ShutterIsland', 'It\'s 1954, and up-and-coming U.S. marshal Teddy Daniels is assigned to investigate the disappearance of a patient from Boston\'s Shutter Island Ashecliffe Hospital. He\'s been pushing for an assignment on the island for personal reasons, but before long he wonders whether he hasn\'t been brought there as part of a twisted plot by hospital doctors whose radical treatments range from unethical to illegal to downright sinister. Teddy\'s shrewd investigating skills soon provide a promising lead, but the hospital refuses him access to records he suspects would break the case wide open. As a hurricane cuts off communication with the mainland, more dangerous criminals \"escape\" in the confusion, and the puzzling, improbable clues multiply, Teddy begins to doubt everything - his memory, his partner, even his own sanity.', '2019-05-25 11:45:56', 7),
(14, 'Mystic River', '44.40', 'assets/images/mystic.jpg', 'MysticRiver', 'In the summer of 1975 in a neighborhood in Boston, 3 kids, Dave Boyle and two of his friends, Jimmy and Sean, are playing on the sidewalk when Dave gets abducted by two men and endures several days of sexual abuse. Eventually, Dave escapes traumatized throughout adulthood. Jimmy is an ex-con and a father of three, whose daughter Katie, is found dead and Dave becomes the number one suspect. Sean is a homicide detective, investigating Katie\'s murder, ends up finding himself faced with past and present demons as more is uncovered about Katie\'s murder. Learning Katie had a boyfriend, ballistics later turn up a gun belonging to the father, which then puts her boyfriend as the suspect. Will Sean find out who killed Katie? Will Jimmy make it through the investigation? And will Dave ever find out what really happened when he was abducted? ', '2019-05-25 11:45:56', 7),
(15, 'Hot Fuzz', '51.50', 'assets/images/hotFuzz.jpg', 'HotFUzz', 'Top London cop, PC Nicholas Angel is good. Too good. And to stop the rest of his team looking bad, he is reassigned to the quiet town of Sandford. He is paired with Danny Butterman, who endlessly questions him on the action lifestyle. Everything seems quiet for Angel, until two actors are found decapitated. It is called an accident, but Angel isn\'t going to accept that, especially when more and more people turn up dead. Angel and Danny clash with everyone, whilst trying to uncover the truth behind the mystery of the apparent \"accidents\".', '2019-05-25 11:45:56', 2),
(16, 'Wedding Crashers', '34.50', 'assets/images/wedding.jpg', 'WeddingCrashers', 'Two friends, John (played by Owen Wilson) and Jeremy (Vince Vaughn), crash weddings to pick up women. One day they crash the wedding of the daughter of the Treasury Secretary, Secretary Cleary (Christopher Walken). Instead of short-term flings they end up being invited to the Clearys\' island estate, and potentially meet the loves of their lives... ', '2019-05-25 11:45:56', 2),
(17, 'Dark Knight', '47.50', 'assets/images/darkKnight.jpg', 'DarkKnight', 'Set within a year after the events of Batman Begins, Batman, Lieutenant James Gordon, and new district attorney Harvey Dent successfully begin to round up the criminals that plague Gotham City until a mysterious and sadistic criminal mastermind known only as the Joker appears in Gotham, creating a new wave of chaos. Batman\'s struggle against the Joker becomes deeply personal, forcing him to \"confront everything he believes\" and improve his technology to stop him. A love triangle develops between Bruce Wayne, Dent and Rachel Dawes.', '2019-05-25 11:45:56', 1),
(18, 'The Conjuring', '47.50', 'assets/images/conjuring.jpg', 'TheConjuring', 'In 1971, Carolyn and Roger Perron move their family into a dilapidated Rhode Island farm house and soon strange things start happening around it with escalating nightmarish terror. In desperation, Carolyn contacts the noted paranormal investigators, Ed and Lorraine Warren, to examine the house. What the Warrens discover is a whole area steeped in a satanic haunting that is now targeting the Perron family wherever they go. To stop this evil, the Warrens will have to call upon all their skills and spiritual strength to defeat this spectral menace at its source that threatens to destroy everyone involved.', '2019-05-25 11:45:56', 6),
(19, 'The Bourne Identity', '29.50', 'assets/images/bourne.jpg', 'TheBourneIdentity', 'Based very loosely on Robert Ludlum\'s novel, the Bourne Identity is the story of a man whose wounded body is discovered by fishermen who nurse him back to health. He can remember nothing and begins to try to rebuild his memory based on clues such as a Swiss bank account, the number of which is implanted in his hip. He soon realizes that he is being hunted and takes off with Marie on a search to find out who he is - and why he is being hunted. ', '2019-05-25 11:45:56', 3),
(20, 'Matrix', '39.60', 'assets/images/matrix.jpg', 'matrix', 'Thomas A. Anderson is a man living two lives. By day he is an average computer programmer and by night a hacker known as Neo. Neo has always questioned his reality, but the truth is far beyond his imagination. Neo finds himself targeted by the police when he is contacted by Morpheus, a legendary computer hacker branded a terrorist by the government. Morpheus awakens Neo to the real world, a ravaged wasteland where most of humanity have been captured by a race of machines that live off of the humans\' body heat and electrochemical energy and who imprison their minds within an artificial reality known as the Matrix. As a rebel against the machines, Neo must return to the Matrix and confront the agents: super-powerful computer programs devoted to snuffing out Neo and the entire human rebellion.', '2019-05-25 11:45:56', 4),
(21, 'The Godfather', '42.40', 'assets/images/1553005434_kum1.png', 'GodFather', 'When the aging head of a famous crime family decides to transfer his position to one of his subalterns, a series of unfortunate events start happening to the family, and a war begins between all the well-known families leading to insolence, deportation, murder and revenge, and ends with the favorable successor being finally chosen.', '2019-05-25 11:45:56', 5),
(26, 'Van Helsing', '25.50', 'assets/images/1553006309_vanHelsing.jpg', 'VanHelsing', 'Van Helsing is in the world to rid all evil, even if not everyone agrees with him. The Vatican sends the monster hunter and his ally, Carl, to Transylvania. They have been sent to this land to stop the powerful Count Dracula. Whilst there they join forces with a Gypsy Princess called Anna Valerious, who is determined to end an ancient curse on her family by destroying the vampire. They just don\'t know how! ', '2019-05-25 11:45:56', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idKategorije` int(10) NOT NULL,
  `nazivKategorije` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idKategorije`, `nazivKategorije`) VALUES
(1, 'ACTION'),
(2, 'COMEDY'),
(3, 'THRILLER'),
(4, 'SCI-FI'),
(5, 'DRAMA'),
(6, 'HORROR'),
(7, 'MYSTERY');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(10) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `aktivan` bit(1) NOT NULL,
  `datum_registracije` datetime NOT NULL,
  `idUloge` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `email`, `lozinka`, `aktivan`, `datum_registracije`, `idUloge`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', 'e66055e8e308770492a44bf16e875127', b'0', '2019-03-19 00:00:00', 1),
(2, 'Korisnik', 'Korisnik', 'korisnik@gmail.com', 'bce0fe6b32f31982124e9bf38bf6ecf6', b'0', '2019-03-19 23:46:39', 2),
(3, 'Jovan', 'Jovanovic', 'jovanovic@gmail.com', '511d8db30af42a78e91ced10a327ea8e', b'0', '2019-03-20 22:28:25', 2),
(6, 'Bane', 'Jovanovic', 'bane@gmail.com', 'a735adbe602165e289c030426fec6c8e', b'0', '2019-03-21 01:19:11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_odgovor`
--

CREATE TABLE `korisnik_odgovor` (
  `idKorisnik` int(10) NOT NULL,
  `idOdgovor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(10) NOT NULL,
  `linkName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `linkValue` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `linkName`, `linkValue`) VALUES
(1, 'Home', 'index.php'),
(2, 'Login', 'login.php'),
(3, 'Register', 'register.php'),
(4, 'Checkout', 'checkout.php'),
(5, 'Author', 'author.php'),
(6, 'Contact', 'contact.php'),
(7, 'Sitemap', 'sitemap.xml'),
(8, 'Documentation', 'documentation.pdf'),
(9, 'Survey', 'survey.php');

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `id` int(10) NOT NULL,
  `idAnketa` int(10) NOT NULL,
  `odgovor` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id`, `idAnketa`, `odgovor`) VALUES
(1, 1, 'Every Day'),
(2, 1, 'Every Week'),
(3, 1, 'Every Month');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `idUloge` int(10) NOT NULL,
  `nazivUloge` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`idUloge`, `nazivUloge`) VALUES
(1, 'Admin'),
(2, 'Korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`idAnketa`);

--
-- Indexes for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD PRIMARY KEY (`idFilma`),
  ADD KEY `idUloge` (`idKategorije`),
  ADD KEY `idFilma` (`idFilma`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idUloge` (`idUloge`);

--
-- Indexes for table `korisnik_odgovor`
--
ALTER TABLE `korisnik_odgovor`
  ADD PRIMARY KEY (`idKorisnik`,`idOdgovor`),
  ADD KEY `idOdgovor` (`idOdgovor`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAnketa` (`idAnketa`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `idAnketa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `filmovi`
--
ALTER TABLE `filmovi`
  MODIFY `idFilma` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idKategorije` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloge` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD CONSTRAINT `filmovi_ibfk_1` FOREIGN KEY (`idKategorije`) REFERENCES `kategorije` (`idKategorije`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`idUloge`) REFERENCES `uloge` (`idUloge`);

--
-- Constraints for table `korisnik_odgovor`
--
ALTER TABLE `korisnik_odgovor`
  ADD CONSTRAINT `korisnik_odgovor_ibfk_2` FOREIGN KEY (`idOdgovor`) REFERENCES `odgovori` (`id`),
  ADD CONSTRAINT `korisnik_odgovor_ibfk_3` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD CONSTRAINT `odgovori_ibfk_1` FOREIGN KEY (`idAnketa`) REFERENCES `anketa` (`idAnketa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
