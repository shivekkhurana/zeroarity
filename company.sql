-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2012 at 10:20 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `equipments` varchar(2000) DEFAULT '',
  `images` varchar(2000) DEFAULT '',
  `caution` varchar(500) DEFAULT '',
  `alternate` int(1) NOT NULL COMMENT 'does the user needs to switch sides at half way point ?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `description`, `equipments`, `images`, `caution`, `alternate`) VALUES
(1, 'Recovery', 'Gain your strength back.', NULL, NULL, NULL, 0),
(2, 'Recover', 'Regain energy.', NULL, 'http://getrippednation.com/wp-content/uploads/2011/07/Recovery.jpg', NULL, 0),
(3, 'Knee Pushups', 'Lie down on the floor. Using your arms push the upper part of your body such that your knee keep touching the ground.', NULL, 'http://some-like-it-raw.com/wp-content/uploads/2012/03/knee-pushups.jpg', NULL, 0),
(4, 'Arm Curls', 'Stand in upright position with chest out and stomach tucked in. Fully extend your arms upto your hip bones. Now keeping your elbow fixed, lift the weight.', NULL, 'http://upload.wikimedia.org/wikipedia/commons/7/74/Dumbbell-Bicep-Curls.jpg', NULL, 0),
(5, 'Froggers', 'Start in in plank position. Keeping your hands fixed, jump so that your feet reach either sides of your hands.', NULL, 'http://media.tumblr.com/tumblr_ly8nzxXGhu1qcmrp8.jpg', NULL, 0),
(6, 'Duck Walks', 'Keep your feet in a straight line at maximum distance. Lunge down and move.', NULL, 'http://1.bp.blogspot.com/-6aP2ZI-kmEU/TVqOcf0vpGI/AAAAAAAAAew/KKDBfy9flGI/s1600/DuckWalkAjpg_00000005507.jpg', NULL, 0),
(7, 'High Knee Runs', 'Run on spot, while moving your knee as high as possible.', NULL, 'http://fitnessgurutraining.files.wordpress.com/2012/04/high-knees1.jpg', NULL, 0),
(8, 'Ab Crunch', 'Lie down facing the ceiling. Bend your legs and put your hands behind your head. Now push your upper body upto an angle of 45 degrees.', NULL, 'http://www.best-flat-stomach-exercises.com/images/abs-crunches.jpg', NULL, 0),
(9, 'Rollovers with mountain climbers', 'Starting in plank position, kick your knees upto you chest. After every round, rollover.', NULL, 'http://www.menshealth.com/mhlists/cms/uploads/1/1001-mountain-climber-483x300.jpg', NULL, 0),
(10, 'Side Plank', 'Lie down sideways with one feet over other. Push your hips as high as possible such that your arms are directly below your shoulders.', NULL, 'http://t2.gstatic.com/images?q=tbn:ANd9GcTebmtzJcXm4JqcJhquLGVcCQD1gv_3smgEkrsipTY9NAvjDjVumr0m5Ws0', NULL, 1),
(11, 'Bicycle Crunch', 'Lie down straight with your palms supporting head and elbows touching the ground. Touch your left knee with right elbow and alternate.', NULL, 'http://images.teamsugar.com/files/upl0/1/12981/03_2008/bicycle-crunches.jpg', NULL, 1),
(12, 'Squats', 'Stand in upright position. Keeping your chest open and back flat, bend down as if you are sitting on a chair and hold.', NULL, 'http://4.bp.blogspot.com/-daXQjYdVyqk/TxRd9QXcfSI/AAAAAAAAAQc/3qLLptvJyko/s1600/Squats2.jpg', NULL, 0),
(13, 'Vertical Leg Crunch', 'Lie down and kick you legs up making a right angle.', NULL, 'http://3.bp.blogspot.com/--gkUvJAERFA/T9SzzipN49I/AAAAAAAABNs/otysKs5ptVY/s1600/Vertical+Leg+Crunch.jpg', NULL, 0),
(14, 'Burpees', 'Starting in plank position, jump forward so that your kneecaps touch your chest. Then jump as high you can. Land back in launch position and jump back to plank.', NULL, 'http://media.tumblr.com/tumblr_m0nmyzVjdE1qcmrp8.jpg', NULL, 0),
(15, 'Side Lunge', 'Keep your legs apart (sideways) at maximum distance such that one leg is straight and other leg is bent. Drive weight down through your bent leg and alternate.', NULL, 'http://www.exrx.net/StretchImages/HipAdductors/SideLunge.jpg', NULL, 1),
(16, 'Knee Planck', 'Lie down with your chest on the ground. Now push up your upper body such that your arms are directly under your shoulders and knee are in contact with ground and hold.', NULL, 'http://tonishealthblog.files.wordpress.com/2011/01/modified-plank2.jpg', NULL, 0),
(17, 'Lateral Raise', 'Stand straight, with stomach tucked in and chest open. Hold weights in your hands and keep your arms towards either side of your body. Now raise and form a ''T'' shape.', NULL, 'http://photos.mensfitness.co.uk/images/library_UK_13/lateral_raise_6760_7.jpg', NULL, 0),
(18, 'Single Leg Reverse Fly', 'Bend down to posture as show in image, keeping your standing leg slightly bent and back flat. Now bring weights upto your shoulder level and apternate.', NULL, 'http://external.ak.fbcdn.net/safe_image.php?d=AQA1MlFRNLCQJfCb&url=http://platform.ak.fbcdn.net/www/app_full_proxy.php?app=214246478682326&v=1&size=p&cksum=688f17c2260b22c2e583190a12b5b731&src=http://i3.ytimg.com/vi/r6TFu3Nlct8/mqdefault.jpg', NULL, 1),
(19, 'Bench Press', 'Lie down with your back on a bench (or bed) and feet on ground. Lift weights directly above your shoulders.', NULL, 'http://www.menshealth.com/celebrity-fitness/uploads/kettlebell-bench-press.jpg', NULL, 0),
(20, 'Tate Press', 'Lie down on level ground (or bench). Hold weights such that your arms are vertical. Now bring weights to your chest.', NULL, 'http://www.bodybuilding.com/exercises/exerciseImages/sequences/226/Male/m/226_1.jpg, http://www.bodybuilding.com/exercises/exerciseImages/sequences/226/Male/m/226_2.jpg', NULL, 0),
(21, 'Side Run', 'Run sideways.', NULL, 'http://2.bp.blogspot.com/-lzFOM4arGjA/TdtDaZsHpHI/AAAAAAAAAqE/8MpCB3cEO9M/s400/workout6.jpg', NULL, 0),
(22, 'Jump On Spot', 'Jump on spot.', NULL, 'http://2.bp.blogspot.com/-65-nQZNUZQ8/T6AwIHU4Z5I/AAAAAAAABVI/Z-r4S2LX9xM/s1600/Jump+Squat.jpg', NULL, 0),
(23, 'Cobra', 'Lie down and push your upper body like a cobra. Hold.', NULL, 'http://cdn.vogue.com.au/media/article-steps/5/8/0/5849-1_asl.jpg', NULL, 1),
(24, 'Knee Plank Row', 'Start in knee plank position with dumbells in either hand. Now lift the weights one at a time such that your elbow passes your back.', NULL, 'http://static.ddmcdn.com/gif/back-strengthening-exercises-21.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_tags`
--

CREATE TABLE IF NOT EXISTS `exercise_tags` (
  `id` int(255) NOT NULL,
  `tag` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise_tags`
--

INSERT INTO `exercise_tags` (`id`, `tag`) VALUES
(4, 'arms'),
(10, 'abs'),
(10, 'butt'),
(10, 'core'),
(11, 'abs'),
(11, 'obliques'),
(13, 'abs'),
(18, 'shoulders'),
(21, 'cardio'),
(22, 'cardio'),
(23, 'abs'),
(17, 'shoulders'),
(17, 'arms'),
(8, 'abs'),
(8, 'shoulders'),
(14, 'shoulders'),
(14, 'legs'),
(16, 'arms'),
(16, 'shoulders'),
(9, 'abs'),
(9, 'arms'),
(9, 'shoulders'),
(3, 'arms'),
(3, 'chest'),
(6, 'butt'),
(6, 'legs'),
(7, 'cardio'),
(7, 'butt'),
(12, 'butt'),
(12, 'legs'),
(15, 'legs'),
(15, 'butt'),
(19, 'arms'),
(19, 'chest'),
(20, 'arms'),
(20, 'chest'),
(5, 'abs'),
(5, 'legs'),
(5, 'shoulders'),
(24, 'arms'),
(24, 'chest'),
(2, 'recover');

-- --------------------------------------------------------

--
-- Table structure for table `home_routines`
--

CREATE TABLE IF NOT EXISTS `home_routines` (
  `level` int(2) NOT NULL,
  `day` int(5) NOT NULL,
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_routines`
--

INSERT INTO `home_routines` (`level`, `day`, `id`, `name`) VALUES
(1, 1, 1, 'Abs Level 1'),
(1, 2, 4, 'Arms Level 1'),
(1, 3, 6, 'Shoulders Level 1'),
(1, 4, 2, 'Legs Level 1'),
(1, 5, 7, 'Cardio Level 1'),
(2, 1, 0, '#'),
(2, 2, 0, 'a'),
(2, 3, 0, 'a'),
(2, 4, 0, 'a'),
(2, 5, 0, 'a'),
(3, 1, 0, 'a'),
(3, 2, 0, 'a'),
(3, 3, 0, 'a'),
(3, 4, 0, 'a'),
(3, 5, 0, 'a'),
(4, 1, 0, 'a'),
(4, 2, 0, 'a'),
(4, 3, 0, 'a'),
(4, 4, 0, 'a'),
(4, 5, 0, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `seconds` int(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `email`, `seconds`, `date`) VALUES
(1, 'madhu.k.com', 45, '09.01.12');

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE IF NOT EXISTS `routines` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `level` varchar(100) NOT NULL,
  `exercises` varchar(2000) NOT NULL,
  `warmup` int(255) NOT NULL DEFAULT '1',
  `repeat` int(255) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `name`, `level`, `exercises`, `warmup`, `repeat`) VALUES
(1, 'Abs Level 1', 'level_1', '{"23":1, "7":1, "8":1, "9":1, "2":1}', 5, 3),
(2, 'Legs Level 1', 'level_1', '{"15":1, "12":1, "6":1, "2":1}', 5, 3),
(3, 'a', 'level_2', '{"7":"1"}', 1, 4),
(4, 'Arms Level 1', 'level_1', '{"3":"1","4":"1","24":"1","20":"1","2":"1"}', 5, 3),
(5, 'Warmup Level 1', 'level_1', '{"21":"1","12":"1","7":"1","5":"1","2":"1"}', 1, 1),
(6, 'Shoulders Level 1', 'level_1', '{"18":"1","17":"1","16":"1","3":"1","2":"1"}', 5, 3),
(7, 'Cardio Level 1', 'level_1', '{"22":"1","21":"1","12":"1","10":"1","2":"1"}', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `routine_tags`
--

CREATE TABLE IF NOT EXISTS `routine_tags` (
  `id` int(255) NOT NULL,
  `tag` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine_tags`
--

INSERT INTO `routine_tags` (`id`, `tag`) VALUES
(1, 'abs'),
(1, ' level1'),
(2, 'legs'),
(2, ' level1'),
(3, 'a'),
(4, 'arms'),
(5, 'warmup'),
(6, 'shoulders'),
(7, 'cardio');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
