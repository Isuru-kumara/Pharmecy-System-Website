-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 04:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(54, 'prabod pubudu', 'ict071', '827ccb0eea8a706c4c34a16891f84e7b'),
(55, 'isuru kumara', 'kumara', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `Quantity` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(9, 'Dental Care  ', 'add_category8138.jpg', 'yes', 'yes'),
(10, 'Pet Care', 'add_category1928.jpg', 'yes', 'yes'),
(17, 'Eye Care ', 'add_category9611.jpg', 'yes', 'yes'),
(18, 'Hair Care', 'add_category2103.jpg', 'yes', 'yes'),
(19, 'Mother & Baby Care', 'add_category7664.jpg', 'yes', 'yes'),
(20, 'Skin care', 'add_category7687.jpg', 'yes', 'yes'),
(21, 'Vitamin & supplements  ', 'add_category4906.jpg', 'yes', 'yes'),
(22, 'Medicine', 'add_category8431.jpg', 'yes', 'yes'),
(23, 'Intimacy', 'add_category1631.jpg', 'yes', 'yes'),
(24, 'Medical devices ', 'add_category8064.jpg', 'yes', 'yes'),
(25, 'Medical instrument', 'add_category4711.jpg', 'yes', 'yes'),
(26, 'First aid ', 'add_category993.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `customer_city`) VALUES
(3, 'fdssd', 'gdssssss', 'sfsdfds', 'sfsd', 'sgsd'),
(4, 'dsfs', 'dsfds', 'sfddf', 'dsfsd', 'dsf'),
(5, 'ass', 'dsads', 'sdsd', 'dsads', 'sdadsa'),
(6, 're', 'gf', 'fg', 'g', 'ggf'),
(7, 're', 'gf', 'fg', 'g', 'ggf'),
(8, 'sadd', 'sdasd', 'sadsa', 'sadas', 'sdas'),
(9, 'pra', 'ds', 'bod', 'sasds', 'sda'),
(10, '', '', '', '', ''),
(11, '', '', '', '', ''),
(12, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(10) UNSIGNED NOT NULL,
  `titile` varchar(100) NOT NULL,
  `descrption` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `number_of_product` int(11) NOT NULL,
  `Discount_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `titile`, `descrption`, `price`, `image_name`, `category_id`, `featured`, `active`, `number_of_product`, `Discount_rate`) VALUES
(22, 'Oral-B Pro - Expert          ', 'Oral-B Pro-Expert is a toothpaste developed with dentists, for healthier, stronger teeth starting from day 1*. It protects areas dentists check most: cavities, dental plaque, gum problems, tooth sensitivity, stains, bad breath, tartar and enamel erosion.', '380.00', 'new_medic_img2448.jpg', 9, 'yes', 'no', 150, 5),
(23, 'Oral-B Santin Tape    ', 'Oral-B Satin Tape instantly feels different as it releases a burst of mint freshness on contact. Its unique wide satin-like ribbon provides comfort in handling. It effectively cleans out plaque and particles between teeth, which helps to keep teeth and gums healthy.', '400.00', 'new_medic_img598.jpg', 9, 'yes', 'yes', 150, 0),
(24, 'Corsodyl    ', 'The active ingredient, chlorhexidine digluconate acts rapidly, to kill the bacteria that cause plaque within 30 seconds. It also forms a protective antibacterial layer over the teeth and gums to prevent plaque build up for up to 12 hours.', '380.00', 'new_medic_img2226.jpg', 9, 'yes', 'yes', 117, 4),
(25, 'Fixodent Plus    ', 'Creates a food seal that helps prevent food particles from getting beneath the dentures. 75% Thinner nozzle allows for superior food seal and easy application in continuous lines. Acts as a cushion between gums and dentures, allowing for a customized fit.', '500.00', 'new_medic_img2540.jpg', 9, 'yes', 'yes', 143, 35),
(27, 'Steradent Active Fresh    ', 'Around the denture killing 99.9% of bacteria. Provides a powerful in depth clean removing 50% more plaque than brushing alone. Use twice daily, Steradent Active Fresh will leave your dentures feeling perfectly clean.\"gdfgf-', '400.00', 'new_medic_img1077.jpg', 9, 'yes', 'yes', 133, 0),
(29, 'seabond        ', 'Sea Bond Denture Adhesive works differently. The cushiony, soft seal gives you all day hold without the ooze and mess of denture pastes.', '560.00', 'add_medicine718.jpg', 9, 'yes', 'yes', 120, 35),
(30, 'Dextracin eye and ear drops  ', 'Treatment for an eye or for an ear complicated by infections caused by organisms sensitive to neomycin. Eye drops Initially 1-2 drops 1-2 hourly but, after it will reduce dosage to 1 drop 4 hourly.\r\n', '419.00', 'add_medicine100.jpg', 17, 'yes', 'yes', 200, 0),
(31, 'Betoptic    ', 'Betoptic Ophthalmic Solution has been shown to be effective in lowering intraocular pressure and is indicated in the treatment of ocular hypertension and chronic open-angle glaucoma. \r\n', '1040.00', 'add_medicine4509.jpg', 17, 'yes', 'yes', 230, 2),
(32, 'Retino cream   ', 'This medication is used to decrease the number and severity of acne pimples and promote quick healing of pimples that do develop. Tretinoin belongs to a class of medications called retinoids.', '480.00', 'add_medicine9741.jpg', 17, 'yes', 'yes', 180, 45),
(33, 'Fluorescein sodium injection  ', 'One 5ml ampule of fluorescein sodium 100ml to be injected by this diagnostic tool, intravenously into the antecubital vein after taking precautions to avoid extravasation.\r\n', '580.00', 'add_medicine5331.jpg', 17, 'yes', 'yes', 183, 0),
(34, 'Chloramphenicol eye ointment   ', 'Chloramphenicol ophthalmic preparations are used to treat infections of the eye. This medicine may be given alone or with other medicines that are taken by mouth for eye infections.\r\n', '740.00', 'add_medicine9567.jpg', 17, 'yes', 'yes', 220, 5),
(35, 'Cycloporine ophthalmic emulsion  ', 'Ophthalmic cyclosporine is used to increase tear production in people with dry eye disease. It works by decreasing swelling in the eye to allow for tear production.', '680.00', 'add_medicine3640.jpg', 17, 'yes', 'yes', 25, 0),
(36, 'Tugain solution  ', 'Tugain 5% solution is a medicine used to treat common hereditary hair loss. It can prevent further hair loss and help hair to re-grow. It works by increasing blood flow to the hair follicles on your scalp, which prevents hair cell death and also enhances new hair growth.\r\n', '580.00', 'add_medicine4741.jpg', 18, 'yes', 'yes', 20, 0),
(37, 'Minoxidil topical solution USP 3  ', 'Morr 3% Solution is a medicine used to treat common hereditary hair loss. It can prevent further hair loss and help hair to re-grow. It works by increasing blood flow to the hair follicles on your scalp, which prevents hair cell death and also enhances new hair growth.', '640.00', 'add_medicine3563.jpg', 18, 'yes', 'yes', 35, 0),
(38, 'Minoxidil topical solution USP 5  ', 'Minoxidil is used to stimulate hair growth and to slow balding. It is most effective for people under 40 years of age whose hair loss is recent. Minoxidil has no effect on receding hairlines. It does not cure baldness; most new hair is lost within a few months after the drug is stopped.\r\n', '480.00', 'add_medicine3005.jpg', 18, 'yes', 'yes', 65, 0),
(39, 'Minoxidil topical solution USP 2 box  ', 'Minoxidil solution and foam are used to help hair growth in the treatment of male pattern baldness. It is not used for baldness at the front of the scalp or receding hairline in men. The foam and 2 percent minoxidil solution is also used to help hair growth in women with thinning hair.', '380.00', 'add_medicine5833.jpg', 18, 'yes', 'yes', 24, 0),
(40, 'Cliclopirox and zic pyrithione shampoo  ', 'Ciclopirox + Zinc pyrithione is used for the treatment and prevention of dandruff. Leave the shampoo on for three to five minutes before rinsing. Take care to avoid getting it in your eyes. If accidental exposure occurs, rinse immediately with plenty of water.', '640.00', 'add_medicine9181.jpg', 18, 'yes', 'yes', 34, 0),
(41, 'Finasteride tablets USP 1  ', 'Finasteride tablets USP is a medication used to treat symptoms of benign prostatic hyperplasia (BPH) in men with an enlarged prostate. Finasteride tablets USP may also be used to reduce the need for surgery related to BPH in men with an enlarged prostate.', '580.00', 'add_medicine533.jpg', 18, 'yes', 'yes', 51, 0),
(42, 'Kitzyme tabs    ', 'Fishy flavor Your cat means the world to you show them you care by feeding these healthy, yummy tablets. They are specially formulated to contain B-complex vitamins and minerals important to your cats health and fitness.\r\n ', '80.00', 'new_medic_img555.jpg', 10, 'yes', 'yes', 0, 0),
(43, 'Quadracoat   ', ' Omega Fatty Acids are required for a shiny coat, healthy skin and much more. Proves as an excellent supplement for boosting skin and coat texture for race horses and show champion dogs.\r\n', '1400.00', 'new_medic_img1522.jpg', 10, 'yes', 'yes', 5, 12),
(44, 'Frontline spray     ', 'Affections with sensitive-to-Fipronil-parasites, dogs and cats above 5kg weight. Purpose for dog and cat : Remove and kill crushing lice. - For dog : Treatment and prevention of chips and ticks infections - For cat : Treatment and preventions of chips infections\r\n ', '3080.00', 'new_medic_img1912.jpg', 10, 'yes', 'yes', 4, 25),
(45, 'Vetzyme stress powder   ', ' Vetzyme Stress Powder 150g is a specially formulated supplement that provides essential vitamins and minerals needed by puppies and kittens in particular, for good bone and muscle health. Excellent to use for cats and dogs of all ages, this Stress Powder helps to maintain optimum health through all stages of growth. \r\n', '2500.00', 'add_medicine1177.jpg', 10, 'yes', 'yes', 55, 12),
(46, 'Vetzyme B+E tabs    ', ' Vetzyme B + E has been specifically formulated to help promote activity and all round good health, important for any dog, in particular for working breeds. These tablets combine the B-complex vitamins together with vitamin E, selenium and zinc. Feeding these tasty tablets will help to keep your dog alert and ready for action\r\n', '40.00', 'add_medicine932.jpg', 10, 'yes', 'yes', 97, 0),
(47, 'petstar canny cap tab   ', ' Vitamin and Mineral supplement for healthy growth, muscle tone and shiny coat', '1000.00', 'add_medicine9850.jpg', 10, 'yes', 'yes', 76, 0),
(48, 'petstar canny brew tab   ', 'Daily Multi-Vitamin and Mineral Support\r\n', '1040.00', 'add_medicine7574.jpg', 10, 'yes', 'yes', 68, 0),
(49, 'pedigree adult chicken vegetable   ', 'PEDIGREE Chicken & Vegetables is a healthy and complete meal for your adult dog, packed with proteins (from chicken) & vitamins (from vegetables).\r\n', '80.00', 'add_medicine5951.jpg', 10, 'yes', 'yes', 80, 0),
(50, 'Baby face & nose wipes   ', ' Organic biodegradable eco-friendly baby nose wipes', '900.00', 'add_medicine2149.jpg', 19, 'yes', 'yes', 26, 0),
(51, 'Blanket for mommy and baby   ', 'Pack Maternity Robe and Matching Baby Swaddle Blanket with Hat Headband Set, Stretchy Knitted Delivery Nursing Dress with Pockets and Receiving Blanket for Mummy and Baby (Pink Flower)', '5400.00', 'add_medicine8761.jpg', 19, 'yes', 'yes', 20, 14),
(52, 'Splash baby wipes   ', 'Splash baby care baby wipes', '480.00', 'add_medicine512.png', 19, 'yes', 'yes', 25, 0),
(53, 'Heliocare SPF gel   ', 'Dermatologically tested Soap free & pH. balanced Ideal for newborns and adults Easy grip 400ml pump pack Naturally fragranced.', '5400.00', 'add_medicine262.jpg', 19, 'yes', 'yes', 15, 17),
(54, 'Baby cheramy baby diappers (XL)    ', 'Cute New Seasonal Diaper Designs Available Now. High Quality And Low Prices For You While Eco-Friendly For The Environment.', '1200.00', 'add_medicine9943.jpg', 19, 'yes', 'yes', 15, 12),
(55, 'Baby cheramy baby diappers (L)  ', 'Cute New Seasonal Diaper Designs Available Now. High Quality And Low Prices For You While Eco-Friendly For The Environment.', '1100.00', 'add_medicine4518.jpg', 19, 'yes', 'yes', 24, 5),
(56, 'Baby cheramy baby diappers (M)   ', 'Cute New Seasonal Diaper Designs Available Now. High Quality And Low Prices For You While Eco-Friendly For The Environment.', '800.00', 'add_medicine5008.jpg', 19, 'yes', 'yes', 40, 0),
(57, 'GNC luster & LUM beauty detox  ', 'This cream cleans body of toxins and supports metabolism and digestion. It features antioxidants to support healthy skin which contains 5 grams of fiber with zero added sugar.', '8900.00', 'add_medicine2619.jpg', 21, 'yes', 'yes', 55, 35),
(58, '21st centuary arthi-flex dietary  ', 'Taken daily, will nourish cartilage and lubricate joints to improve flexibility, comfort and range of motion. For best results, take 4 tablets daily, 2 in the morning and 2 in the afternoon, with meals will be useful.\r\n', '4400.00', 'add_medicine7448.jpg', 21, 'yes', 'yes', 19, 16),
(59, 'GNC COD liver omega 3  ', 'Cod liver oil contains vitamin A, a vital nutrient for immune system function, cellular growth, eye health, and reproduction. It is also rich in omega-3 fatty acids, which decrease blood clot formation and reduce inflammation in the body.\r\n', '3880.00', 'add_medicine9469.jpg', 21, 'yes', 'yes', 20, 12),
(60, 'Natures way adult vitagummies  ', 'Gummy vitamins are chewable vitamins that have a texture and taste similar to gummy candies and come in a variety of flavors, colors, and shapes. Taking 2-3 pastilles per day will be useful to adults.\r\n', '7500.00', 'add_medicine7751.jpg', 21, 'yes', 'yes', 30, 11),
(61, 'Swisse UB HS cranberry cap  ', 'Swisse Ultiboost High Strength Cranberry supports urinary tract health, including bladder and kidney health. This premium quality formula also provides relief from symptoms of medically diagnosed cystitis, including itching and frequent, burning urination.\r\n', '4400.00', 'add_medicine7907.jpg', 21, 'yes', 'yes', 24, 10),
(62, 'Swisse hair nutrition for men  ', 'Swisse Ultiboost Hair Nutrition for Men supports healthy male hair growth, and maintains scalp and hair follicle health.', '5800.00', 'add_medicine1882.jpg', 21, 'yes', 'yes', 10, 12),
(63, 'Paula liquid exfoliant   ', 'The choice has become a cult favorite among beauty and skin care enthusiasts, and this liquid exfoliant live up to the hype.', '1900.00', 'add_medicine5545.jpg', 20, 'yes', 'yes', 5, 4),
(64, 'Cerave foaming facial cleanser   ', 'Gentle yet effective, this foaming facial cleanser is purported to be one of the best skin care products for people with oily or combination skin.', '1800.00', 'add_medicine6172.jpg', 20, 'yes', 'yes', 25, 5),
(65, 'Mighty patch   ', 'With more than 40,000 reviews this mighty patch is one of the best skin care products out there, especially for those with acne-prone skin or cystic acne.\r\n', '2180.00', 'add_medicine1596.jpg', 20, 'yes', 'yes', 32, 6),
(66, 'Origins Clear improvement   ', 'People who are prone to care and have bigger pores say this moisturizer significantly reduced the appearance of their pores and cleared their skin.', '3500.00', 'add_medicine6395.jpg', 20, 'yes', 'yes', 28, 7),
(67, 'Cerave hydrating facial cleanser  ', 'With nearly 50,000 reviews, this hydrating facial cleanser is highly praised by people with dry and sensitive skin.', '1400.00', 'add_medicine8385.jpg', 20, 'yes', 'yes', 35, 3),
(68, 'B-Hydra intensive hydration serum  ', 'Packed with hydrating ingredients, like provitamin B5 and Sodium Hyaluronate, this lightweight serum offers a boost of hydration for dry skin or dry patches.\r\n', '1800.00', 'add_medicine6247.jpg', 20, 'yes', 'yes', 42, 3),
(69, 'Align ', 'Vitafusion Prenatal Gummies help support mom & baby health needs with one serving providing folate, 50 mg DHA, and vitamins A, C, D, and E. And do not forget, thses delicious raspberry lemonade flavored gummies have no iron so they are easy on your tummy too.', '3100.00', 'add_medicine2561.jpg', 21, 'yes', 'yes', 32, 8),
(70, 'Garden of life ', 'Align believes that wile change is not always easy, it is inevitable. An ancient adage says,\" A journey of a thousand miles begins with a single step.\" This still holds true today, especially when it comes to health and wellness ', '5500.00', 'add_medicine5328.jpg', 21, 'yes', 'yes', 45, 10),
(71, 'Himalayan chandra ', 'Using the included neti spoon, place one level scoop (¼ tsp) in your Neti-Pot with warm sterile water. Perform the nasal wash as directed in your Neti Pot instructions.  ', '1500.00', 'add_medicine6138.jpg', 21, 'yes', 'yes', 56, 2),
(72, 'SmartyPants ', 'Vitamin Code RAW B-Complex is whole food nutrition, specifically formulated to include high potencies of eight whole food complexed B Vitamins  \r\n', '5800.00', 'add_medicine1690.jpg', 21, 'yes', 'yes', 28, 11),
(73, 'Vitacost-Vitamin-A ', ' For children 4 years of age and older, take four (4) gummies daily. May be taken with or without food. Chew each gummy thoroughly. \r\n', '4500.00', 'add_medicine2413.jpg', 21, 'yes', 'yes', 27, 13),
(74, 'Vitafusion Prenatal ', ' Vitamin A refers to two fat-soluble compounds: 1) preformed vitamin A (retinol) and 2) pro-vitamin A (carotenoids). Preformed vitamin A is found in animal products, such as liver and dairy products. Carotenoids, on the other hand, are derived from orange and green fruits and vegetables, including sweet potatoes, spinach, carrots and cantaloupe.', '600.00', 'add_medicine4915.jpg', 21, 'yes', 'yes', 54, 0),
(75, 'Minimal access instrument ', 'It is used for sealing & cutting of vessels & tissues. It can access minimal locations inside the abdomen without invasive or open surgery.\r\n', '1900.00', 'add_medicine2520.jpg', 25, 'yes', 'yes', 26, 5),
(76, 'Holding instruments durer elevator ', 'The elevator is used in Spine Surgery, as well as in laparoscopic surgery, when a retraction of the abdominal wall from the abdominal cavity is necessary without sutures to hold it closed.\r\n', '1400.00', 'add_medicine6570.jpg', 25, 'yes', 'no', 35, 12),
(77, 'Radiant warmer temperature probe ', 'Noninvasive monitoring of skin temperature probes has been a practice in neonatal intensive care units for decades. Incubators and radiant warmers use STP readings to determine the heat output to maintain normothermia.\r\n', '2800.00', 'add_medicine123.jpg', 25, 'yes', 'yes', 32, 8),
(78, 'Iris hooks ', 'The Iris Retractors, specially Flexible Iris Retractors are the optimal temporary implant for use with patients who have cataract, contracted pupils or Intraoperative Floppy Iris Syndrome. \r\n', '1900.00', 'add_medicine7642.jpg', 25, 'yes', 'yes', 28, 8),
(79, 'Plastic sergical products for ent surgery ', 'Instruments typically used in ENT procedures include Cannulas, needles, and needle holders. Chisels, curettes, and osteotomes. Picks, knives, and probes.', '3400.00', 'add_medicine3575.jpg', 25, 'yes', 'yes', 13, 10),
(80, 'Lasek trephine & well ', 'This trephine is used to cut through the epithelium during LASEK surgery. It features a 270 degree semi-sharp, recalibrated edge for the creation of an epithelial flap with a 90 degree hinge and alcohol well on the opposite end to assist with loosening the epithelium. ', '1800.00', 'add_medicine572.jpg', 25, 'yes', 'yes', 54, 3),
(81, 'Stamina condoms (3 condoms) ', 'A condom containing Benzocaine along the inner surface of the condom, that helps delay the climax and prolong sexual excitement for longer lasting lovemaking.\r\n', '280.00', 'add_medicine1723.jpg', 23, 'yes', 'yes', 608, 2),
(82, 'Durex pleasure me condoms 24 pack ', 'The Durex Pleasure Me range will help you reach new heights of sexual stimulation with a condom. Featuring an exciting ribbed and dotted design, you will experience enhanced pleasure as well as an improved comfy fit without any of the unpleasant taste, smell or feel of regular condoms.Dermatologically tested.\r\n', '340.00', 'add_medicine1957.jpg', 23, 'yes', 'yes', 30, 0),
(83, 'Sathuta studded condom ', 'Sathuta studded condom- 3 Pcs\r\n', '380.00', 'add_medicine8860.png', 23, 'yes', 'yes', 100, 0),
(84, 'Folic acid tablets  ', 'Folic acid tablets  BP 1mg F-A-one 90 tablet', '480.00', 'add_medicine1134.png', 23, 'yes', 'yes', 96, 0),
(85, 'Cupid tablets 100mg- delay pills ', 'Cupid tablets 100mg- delay pills', '840.00', 'add_medicine3551.png', 23, 'yes', 'yes', 85, 0),
(86, 'Emergency contraceptive pill ', 'Lot of 5 postinor plan B emergency contraceptive pill avoid pregnancy.', '3580.00', 'add_medicine3862.png', 23, 'yes', 'yes', 20, 4),
(87, 'Digital Blood Pressure Device', 'Welch allyn vital pro bp 3400 digital bp devices  \r\nCapture fast, accurate readings in the palm of your hand with the same enhanced technology found in Welch Allyn vital pro signs devices.\r\n', '75580.00', 'add_medicine3211.jpg', 24, 'yes', 'yes', 5, 39),
(88, 'spot vital signs device  ', 'Welch Allyn spot vital signs 4400 device gives you a simple, all-in-one touchscreen solution for measuring patient vital signs including temperature, blood pressure, pulse rate.\r\n', '155640.00', 'add_medicine2449.jpg', 24, 'yes', 'yes', 92, 42),
(89, 'Global wearable medical device ', 'Global wearable medical devices includes diagnostic devices, therapeutic devices, watches, wristbands, clothing, ear wears and other devices which display readings.', '6480.00', 'add_medicine5452.jpg', 24, 'yes', 'yes', 20, 28),
(90, 'Accu-check active blood glucose meter ', 'The Accu-check active blood glucose meter delivers accurate results easy to use and upgraded with no coding feature. IT has an acceptable accuracy with the sensitivity of 81%.', '8380.00', 'add_medicine6729.jpg', 24, 'yes', 'yes', 16, 25),
(91, ' Rossmax handheld pulse oximeter  ', 'The Rossmax Fingertip Pulse Oximeter is renown for its Swiss design and quality, and is a quick and effective way to check how well your heart is pumping oxygen through your body.', '16640.00', 'add_medicine2069.jpg', 24, 'yes', 'yes', 3, 32),
(92, 'Rossmax V3 suction unit ', 'Includes tracheostomized patients, minor surgical applications and post-operative therapy in home-care and hospital. A Comprehensive dashboard with ergonomic view angle also there.', '40580.00', 'add_medicine9500.jpg', 24, 'yes', 'yes', 24, 35),
(93, 'bandage ', 'A bandage is used in combination with a dressing where a wound is present. ', '150.00', 'add_medicine5386.jpg', 26, 'yes', 'yes', 98, 0),
(94, 'white cotton gauze bandage ', 'A roller bandage is used to secure a dressing in place. ', '250.00', 'add_medicine6726.jpg', 26, 'yes', 'yes', 86, 0),
(95, 'triangular bandage ', 'A triangular bandage is used as an arm sling or as a pad to control bleeding.\r\n', '275.00', 'add_medicine1798.jpg', 26, 'yes', 'yes', 95, 0),
(96, 'Betadine surgical scrub - 50ml ', 'Betadine 7.5% Surgical Scrub is used for the treatment and prevention of infections in wounds and cuts. It kills the harmful microbes and controls their growth, thereby preventing infections in the affected area.', '220.00', 'add_medicine3484.jpg', 26, 'yes', 'yes', 76, 0),
(97, 'cotton wool roll ', 'Cotton balls have multiple uses in the medical field including cleaning out wounds with Hydrogen Peroxide or Iodine, cleaning minor cuts and skin irritations, and stopping blood after an injection is given or blood withdrawn.\r\n', '250.00', 'add_medicine605.jpg', 26, 'yes', 'yes', 65, 0),
(98, 'Scissor ', 'Scissors are used both for emergency care such as cutting tissue to release a wound, and for medical care. Toothless, medical scissors are specially designed to accurately cut bandages, dressings and compresses safely.', '350.00', 'add_medicine1905.jpg', 26, 'yes', 'yes', 88, 0),
(99, 'Antiseptic wipes ', 'Alcohol pads and antiseptic towelettes are used by health care professionals and patients for preparation of the skin prior to injection, as well as in first aid to decrease germs in minor cuts, scrapes and burns. \r\n', '500.00', 'add_medicine271.jpeg', 26, 'yes', 'yes', 56, 0),
(100, 'Gauze pads ', 'First Aid Gauze pads are ideal for cleaning and covering cuts, scrapes, grazes and minor burns. These pads are highly absorbent and designed to draw fluids away from the wound site and help clean dirt and germs from the injured area.\r\n', '420.00', 'add_medicine4971.jpg', 26, 'yes', 'yes', 61, 0),
(102, 'Instant cold pack  ', 'Ice can decrease swelling and inflammation and help stop bleeding. The cold restricts blood circulation, which in turn can numb the pain. It can also help limit any bruising. ', '560.00', 'add_medicine5256.jpg', 26, 'yes', 'yes', 59, 0),
(103, 'pad ', ' ', '113.00', 'add_medicine4584.jpg', 19, 'yes', 'yes', 78, 0),
(104, 'Atrovent ipratropium bromide ', ' Ipratropium is used to control and prevent symptoms like wheezing and shortness of breath caused by ongoing lung diseases.', '344.00', 'add_medicine4965.jpg', 22, 'yes', 'no', 546, 1),
(105, 'Prednisolone tablets', 'This medicine is used to treat a wide range of health problems including allergies, blood disorders, skin diseases, inflammation, infections and certain cancers. \r\n', '450.00', 'add_medicine5640.png', 22, 'yes', 'yes', 60, 0),
(106, 'Salbutamol inhalation', 'Salbutamol is used to relieve symptoms of asthma and other conditions such as chest tightness, wheezing and coughing in adults and children aged 4 years and over. \r\n', '600.00', 'add_medicine5742.jpg', 22, 'yes', 'yes', 35, 0),
(107, 'Salmetarol suifate', 'Salmeterol is indicated in the treatment of asthma with an inhaled corticosteroid, prevention of exercise induced bronchospasm, and the maintenance of airflow obstruction.', '350.00', 'add_medicine4473.jpg', 22, 'yes', 'yes', 10, 0),
(108, 'Theophylline', 'Theophylline is used to treat lung diseases such as asthma, bronchitis, emphysema. It must be used regularly to prevent wheezing and shortness of breath.\r\n', '450.00', 'add_medicine8044.jpg', 9, 'yes', 'yes', 40, 0),
(109, 'Empagliflozin jardiance', 'Jardiance is an oral diabetes medicine that helps control blood sugar levels. Empagliflozin works by helping the kidneys get rid of glucose from your bloodstream. \r\n', '250.00', 'add_medicine7616.jpg', 22, 'yes', 'yes', 45, 0),
(110, 'Gliclazide Modified', 'Gliclazide is used when diet, exercise, and weight reduction have not been found to control blood glucose well enough without medication.\r\n', '720.00', 'add_medicine2937.jpg', 22, 'yes', 'yes', 15, 0),
(111, ' Insulin MIXTARD ', 'Mixtard 30 Penfill is a combination of two medicines, and used in the treatment of diabetes mellitus to improve blood sugar control.\r\n', '540.00', 'add_medicine2020.bmp', 22, 'yes', 'yes', 50, 0),
(112, 'Metformin', 'Metformin is used to treat high blood sugar levels that aided to insulin produced by the pancreas is not able to get sugar into the cells of the body where it can work properly.\r\n', '250.00', 'add_medicine7942.jpg', 22, 'yes', 'yes', 45, 0),
(113, 'Sitagliptin Phosphate Tablets', 'This is used with a proper diet and exercise program and possibly with other medications to control high blood sugar, which helps to prevent kidney damage, blindness, nerve problems, loss of limbs, and sexual function problems.\r\n\r\n', '435.00', 'add_medicine8527.jpg', 22, 'yes', 'yes', 38, 0),
(114, 'Atorva', 'Atorva 10 MG Tablet reduces the production of cholesterol in your liver and helps to lower cholesterol levels in your blood. ', '530.00', 'add_medicine8065.jpg', 22, 'yes', 'yes', 35, 0),
(115, 'Rosuvas', 'Rosuvas 10 Tablet works by reducing the amount of “bad” cholesterol and raising the amount of “good” cholesterol in your blood. ', '340.00', 'add_medicine2570.jpg', 22, 'yes', 'yes', 53, 0),
(116, 'Losartan', 'Losartan belongs to a group of drugs called angiotensin II receptor antagonists. It keeps blood vessels from narrowing, which lowers blood pressure and improves blood flow.', '340.00', 'add_medicine6914.jpg', 22, 'yes', 'yes', 42, 0),
(117, 'Propranolol', 'Propranolol is used to treat tremors, angina (chest pain), hypertension (high blood pressure), heart rhythm disorders, and other heart or circulatory conditions. It is also used to treat or prevent heart attack, and to reduce the severity and frequency of migraine headaches.', '580.00', 'add_medicine1917.jpg', 22, 'yes', 'yes', 65, 0),
(118, 'Famotidine', 'Famotidine is used to treat and prevent ulcers in the stomach and intestines. It also treats conditions in which the stomach produces too much acid, such as Zollinger-Ellison syndrome.', '420.00', 'add_medicine9589.jpeg', 22, 'yes', 'yes', 60, 0),
(119, 'Ethambutol', 'Ethambutol is used to treat tuberculosis (TB), and is usually given together with at least one other tuberculosis medicine. Ethambutol may also be used for purposes not listed in this medication guide.', '540.00', 'add_medicine2616.jpg', 22, 'yes', 'yes', 75, 0),
(120, ' Metolozone. ', 'Metolozone is diuretics (water pills) tablets used to treat excess accumulation of swelling or fluid in the body. This medicines are available only with your doctor’s prescription.\r\n', '875.00', 'add_medicine3895.jpg', 21, 'yes', 'yes', 75, 0),
(121, 'Domperidone tablet', 'This is an anti-sickness medicine, which indicated for the relief of the symptoms of vomiting. It is used to treat nausea (feeling sick) and vomiting. It is also prescribed to treat symptoms of excessive fullness, and stomach pain for people. \r\n', '760.00', 'add_medicine7375.jpg', 22, 'yes', 'yes', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_name` varchar(200) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(30) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_postalCode` varchar(255) NOT NULL,
  `Discount_rate` int(11) NOT NULL,
  `net_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `products_name`, `product_price`, `image_name`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `customer_city`, `customer_postalCode`, `Discount_rate`, `net_total`) VALUES
(83, 'Emergency contraceptive pill', '3580.00', 'add_medicine3862.png', 2, '7160.00', '2022-07-20 02:43:10', 'delivered', 'hasitha danajaya', '0775565891', 'dananjaya@gmail.com', 'gotaGO gama', 'Mathara', '14500', 0, 7160),
(84, 'Stamina condoms (3 condoms) ', '280.00', 'add_medicine1723.jpg', 200, '56000.00', '2022-07-20 02:54:03', 'delivered', 'thilanga dumidu', '0715489612', 'dumidu@gmail.com', 'No 486/1, Henegedara', 'kurunagala', '45789', 2, 54880),
(87, 'Finasteride tablets USP 1  ', '580.00', 'add_medicine533.jpg', 14, '8120.00', '2022-07-20 09:39:38', 'delivered', 'uvini randinithi', '0708963123', 'randinithi@gmail.com', 'No:301,Nawela,amunumulla', 'walimada', '90200', 0, 8120),
(88, 'Corsodyl    ', '380.00', 'new_medic_img2226.jpg', 2, '760.00', '2022-07-20 11:38:19', 'ordered', 'Rashmi dileka', '0789765432', 'dileka234@gmail.com', 'Gonagala,passara', 'Badulla', '90500', 4, 730),
(89, 'Vetzyme B+E tabs    ', '40.00', 'add_medicine932.jpg', 3, '120.00', '2022-07-20 11:50:32', 'ordered', 'Thusith Deshan ', '0713456732', 'deshan543@gmail.com', '25 , Molligoda waththa, Hapugala', 'Galle', '90345', 0, 120),
(90, 'Corsodyl    ', '380.00', 'new_medic_img2226.jpg', 1, '380.00', '2022-07-21 07:39:36', 'ordered', 'prabod', '123456', 'example@.com', 'horana', 'kurunagala', '12300', 4, 365),
(91, 'Kitzyme tabs    ', '80.00', 'new_medic_img555.jpg', 1, '80.00', '2022-07-21 01:50:38', 'ordered', 'dfs', '', '', '', '', '', 0, 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
