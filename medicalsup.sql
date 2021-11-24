-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 03:55 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalsup`
--

-- --------------------------------------------------------

--
-- Table structure for table `medical_bill`
--

CREATE TABLE `medical_bill` (
  `bill_id` int(5) NOT NULL,
  `bill_date_in` date DEFAULT NULL,
  `bill_no` text DEFAULT NULL,
  `bill_send_no` text DEFAULT NULL,
  `bill_order_no` text DEFAULT NULL,
  `bill_order_date` date DEFAULT NULL,
  `bill_date_approve` date DEFAULT NULL,
  `bill_budget_id` int(3) DEFAULT NULL,
  `bill_purchase_id` int(3) DEFAULT NULL,
  `bill_company_id` int(3) DEFAULT NULL,
  `bill_cost` decimal(10,2) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_bill`
--

INSERT INTO `medical_bill` (`bill_id`, `bill_date_in`, `bill_no`, `bill_send_no`, `bill_order_no`, `bill_order_date`, `bill_date_approve`, `bill_budget_id`, `bill_purchase_id`, `bill_company_id`, `bill_cost`, `create_at`) VALUES
(1, '2021-11-01', 'ยอดยกมา', 'ยอดยกมา', 'ยอดยกมา', '2021-11-01', '2021-11-01', 3, 8, 21, '192938.41', '2021-11-12 03:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `medical_budget`
--

CREATE TABLE `medical_budget` (
  `bud_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `bud_name` text NOT NULL,
  `bud_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_budget`
--

INSERT INTO `medical_budget` (`bud_id`, `bud_name`, `bud_total`) VALUES
(001, 'เงินประกันสุขภาพถ้วนหน้า', '2000000.00'),
(002, 'เงินบริจาค', '0.00'),
(003, 'ยอดยกมา', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `medical_company`
--

CREATE TABLE `medical_company` (
  `comp_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `comp_name` text DEFAULT NULL,
  `comp_address` text DEFAULT NULL,
  `comp_tel` varchar(10) DEFAULT NULL,
  `comp_zipcode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_company`
--

INSERT INTO `medical_company` (`comp_id`, `comp_name`, `comp_address`, `comp_tel`, `comp_zipcode`) VALUES
(01, 'N.Tech supply', '47/69-70 ถ.โชตนา ต.ช้างเผือก อ.เมือง จ.เชียงใหม่', NULL, '50300'),
(02, 'Instrument Lab', '47/33-34 ถ.โชตนา ต.ช้างเผือก อ.เมือง จ.เชียงใหม่', NULL, '50300'),
(03, 'C.I.S Technical', '48/132 ม.12 ต.ลำลูกกา อ.ลำลูกกา จ.ปทุมธานี', NULL, '12150'),
(04, 'Science Med', '30/6 ซอยรามคำแหง 21 แขวงพลับพลา เขตวังทองหลาง กรุงเทพฯ', NULL, '10310'),
(05, 'Medica Co.', '25/17 ม.12 ต.บึงคำพร้อย อ.ลำลูกกา จ.ปทุมธานี', NULL, '12150'),
(06, 'เอส เอ โมเดิร์น ไลน์', '88/126 ม.1 ต.บางระทึก อ.สามพราน จ.นครปฐม', NULL, '73210'),
(07, 'VR support', '78/91 ม.2 ต.โสธร อ.เมือง จ.ฉะเชิงเทรา', NULL, '24000'),
(08, 'จีแอล มาร์เก็ตติ้ง', '233/175 ม.15 ต.สันปูเลย อ.ดอยสะเก็ด จ.เชียงใหม่', NULL, '50220'),
(09, 'วากัส เมดิเซีย', '39/78 บ้านเดอะกรีน ถ.พหลโยธิน ซ.11 ต.ปากเพรียว อ.เมือง จ.สระบุรี', NULL, '18000'),
(10, 'เอฟ.ซี.พี. จำกัด', '45 ม.4 ต.คลองอุดมชลจร อ.เมืองฉะเชิงเทรา จ.ฉะเชิงเทรา', NULL, '24000'),
(11, 'โอเร็กซ์ เทรดดิ้ง จำกัด', '39/491 ซอยรัตนาธิเบศร์ 3 ม.1 ถนนรัตนาธิเบศร์ ต.ตลาดขวัญ อ.เมืองนนทบุรี จ.นนทบุรี', NULL, '11000'),
(12, 'ดีเคเอสเอช (ประเทศไทย) จำกัด', '2106 ถนนสุขุมวิท แขวงบางจาก เขตพระโขนง กรุงเทพฯ', NULL, '10260'),
(13, 'บอร์เนียว เมดิคัล จำกัด', '677 ถนนอ่อนนุช แขวงประเวศ เขตประเวศ กรุงเทพฯ', NULL, '10250'),
(14, 'ห้างหุ้นส่วนจำกัด ดี เอช ซี เทรดดิ้ง', '442/1 ม.10 ต.บ้านสวน อ.เมือง จ.ชลบุรี', NULL, '20000'),
(15, 'ร้าน ษ.ภัทรเวช', '29 ม.4 ต.ห้วยแก้ว อ.แม่ออน จ.เชียงใหม่', NULL, '50130'),
(16, 'แอม เบส พลัส จำกัด', '111/246 ม.9 ต.บางพูด อ.ปากเกร็ด จ.นนทบุรี', NULL, '11120'),
(17, 'บริษัท โพส เฮลท์ แคร์ จำกัด', 'สำนักงานใหญ่ : 1 ซอยรามอินทรา 107 ถนนรามอินทรา แขวงคันนายาว เขตคันนายาว กรุงเทพฯ', NULL, '10230'),
(18, 'บริษัท นำวิวัฒน์การช่าง(1992) จำกัด', '995/5 ม.9 ถ.ประชาอุทิศ-คู่สร้าง ต.ในคลองบางปลากด อ.พระสมุทรเจดีย์ จ.สมุทรปราการ', NULL, '10290'),
(19, 'ห้างหุ้นส่วนจำกัดจุฑาวรรตน์(สำนักงานใหญ่)', '22 ซอย พัฒนาการ 20 แยก 6 แขวงสวนหลวง กรุงเทพมหานคร', NULL, '10250'),
(20, 'Northernmed supply', '156/18 ม.1 ต.บวกค้าง อ.สันกำแพง จ.เชียงใหม่', NULL, '50130'),
(21, 'ยอดยกมา', 'โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medical_data`
--

CREATE TABLE `medical_data` (
  `med_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `med_group` varchar(10) DEFAULT NULL,
  `med_code` varchar(100) DEFAULT NULL,
  `med_name` text DEFAULT NULL,
  `med_type` varchar(100) DEFAULT NULL,
  `med_content` text DEFAULT NULL,
  `med_unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_data`
--

INSERT INTO `medical_data` (`med_id`, `med_group`, `med_code`, `med_name`, `med_type`, `med_content`, `med_unit`) VALUES
(001, NULL, 'A206', 'Disposable syringe 50 CC(บริจาค)', 'pcs', '', 'ชิ้น'),
(002, NULL, '0000015', 'Alutab', 'tab', '300 mg', 'เม็ด'),
(003, NULL, '0000018', 'Bisacodyl', 'tab', '5 mg', 'เม็ด'),
(004, NULL, '0000031', 'Digoxin', 'tab', '0.25 mg', 'เม็ด'),
(005, NULL, '0000038', 'Diosmin', 'tab', '500 mg', 'เม็ด'),
(006, NULL, '0000039', 'Domperidone', 'tab', '10 mg', 'เม็ด'),
(007, NULL, '0000054', 'Hyoscine', 'tab', '10 mg', 'เม็ด'),
(008, NULL, '0000075', 'Omeprazole', 'cap', '20 mg', 'เม็ด'),
(009, NULL, '0000076', 'ORS เด็ก', 'pwr', '', 'ซอง'),
(010, NULL, '0000077', 'ORS ผู้ใหญ่', 'pwr', '', 'ซอง'),
(011, NULL, '0000094', 'Ranitidine', 'tab', '150 mg', 'เม็ด'),
(012, NULL, '0000098', 'Simethicone', 'tab', '80 mg', 'เม็ด'),
(013, NULL, '0000143', 'Hyoscine inj.', 'amp', '20 mg/ ml', 'amp'),
(014, NULL, '0000151', 'Metoclopramide inj.', 'amp', '10 mg/2 ml', 'amp'),
(015, NULL, '0000163', 'Ranitidine inj.', 'amp', '50 mg/2 ml', 'amp'),
(016, NULL, '0000200', 'Podophyllin', 'pai', '15 ml', 'ขวด'),
(017, NULL, '0000212', 'Proctosedyl suppository', 'sup', '7.5mg + 250 mg', 'อัน'),
(018, NULL, '0000223', 'Unison Enema เด็ก 20 ml', 'sol', '15 mg/100 ml', 'กล่อง'),
(019, NULL, '0000224', 'Unison Enema ผู้ใหญ่ 100 ml', 'sol', '15 mg / 100 ml', 'กล่อง'),
(020, NULL, '0000228', 'Antacid gel 240 ml', 'sus', '(918+300+ 60)mg', 'ขวด'),
(021, NULL, '0000234', 'Domperidone syrup', 'syr', '5 mg/5 ml', 'ขวด'),
(022, NULL, '0000238', 'Hyoscine syrup', 'syr', '5 mg/ 5 ml', 'ขวด'),
(023, NULL, '0000242', 'MOM suspension', 'sus', '1.2 gm/15 ml', 'ขวด'),
(024, NULL, '0000244', 'Mixt.Carminative 180 ml', 'mix', '1.80 ml', 'ขวด'),
(025, NULL, '0000248', 'Sodium bicarbonate syrup', 'syr', '50 mg+0.01 ml', 'ขวด'),
(026, NULL, '0000286', 'Diosmin (GDH)', 'tab', '(450+50) mg', 'เม็ด'),
(027, NULL, '0000294', 'Misoprostol', 'Tab', '200 mcg', 'เม็ด'),
(028, NULL, '0000312', 'Alutab (ALMATAB)', 'tab', '300 mg', 'เม็ด'),
(029, NULL, '0000324', 'Hyoscine (แบบแผง)', 'Tab', '10 mg', 'เม็ด'),
(030, NULL, '0000330', 'Omeprazole (GPO)', 'Cap', '20 mg', 'เม็ด'),
(031, NULL, '0000331', 'Ranitidine (1000 เม็ด)', 'Tab', '150 mg', 'เม็ด'),
(032, NULL, '0000351', 'Activated charcoal (Ultracarbon)', 'Cap', '260 mg', 'เม็ด'),
(033, NULL, '0000377', 'MOM suspension (240 ml)', 'Sus', '240 ml', 'ขวด'),
(034, NULL, '0000406', 'Domperidone (500 เม็ด)', 'Tab', '10 mg', 'เม็ด'),
(035, NULL, '0000417', 'Omeprazole inj.', 'pwr', '40 mg/10 ml', 'กล่อง'),
(036, NULL, '0000427', 'Lactulose', 'syr', '100 ml', 'ขวด'),
(037, NULL, '0000011', 'Amlodipine', 'tab', '10 mg', 'เม็ด'),
(038, NULL, '0000014', 'Atenolol', 'tab', '50 mg', 'เม็ด'),
(039, NULL, '0000016', 'Aspirin', 'tab', '81 mg', 'เม็ด'),
(040, NULL, '0000017', 'Aspirin', 'tab', '300 mg', 'เม็ด'),
(041, NULL, '0000041', 'Enalapril', 'tab', '5 mg', 'เม็ด'),
(042, NULL, '0000042', 'Enalapril', 'tab', '20 mg', 'เม็ด'),
(043, NULL, '0000049', 'Gemfibrozil', 'cap', '300 mg', 'เม็ด'),
(044, NULL, '0000053', 'Hydrochlorothiazide', 'tab', '50 mg', 'เม็ด'),
(045, NULL, '0000061', 'Isosorbide dinitrate', 'tab', '10 mg', 'เม็ด'),
(046, NULL, '0000062', 'Isosorbide dinitrate', 'SL', '5 mg', 'เม็ด'),
(047, NULL, '0000072', 'Nifedipine', 'cap', '10 mg', 'แคปซูล'),
(048, NULL, '0000081', 'Prazocin', 'tab', '2 mg', 'เม็ด'),
(049, NULL, '0000092', 'Propranolol', 'tab', '10 mg', 'เม็ด'),
(050, NULL, '0000099', 'Simvastatin', 'tab', '10 mg', 'เม็ด'),
(051, NULL, '0000100', 'Spironolactone', 'tab', '25 mg', 'เม็ด'),
(052, NULL, '0000116', 'Methyldopa', 'tab', '250 mg', 'เม็ด'),
(053, NULL, '0000117', 'Adenosine inj.', 'via', '6 mg/2 ml', 'vial'),
(054, NULL, '0000118', 'Adrenaline inj.', 'amp', '1 mg/ml', 'amp'),
(055, NULL, '0000125', 'Atropine inj.', 'amp', '0.6 mg/ ml', 'amp'),
(056, NULL, '0000133', 'Digoxin inj.', 'amp', '0.25 mg/ ml', 'amp'),
(057, NULL, '0000136', 'Dopamine inj.', 'amp', '250 mg/ 10 ml', 'amp'),
(058, NULL, '0000137', 'Furosemide inj.', 'amp', '20 mg/2 ml', 'amp'),
(059, NULL, '0000138', 'Furosemide inj.', 'via', '250 mg/25 ml', 'vial'),
(060, NULL, '0000144', '1%Lidocaine inj.', 'via', '', 'vial'),
(061, NULL, '0000145', '2% Lidocaine inj.', 'via', '', 'vial'),
(062, NULL, '0000147', '10% Magnesium sulfate inj.', 'amp', '10%', 'amp'),
(063, NULL, '0000148', '50% Magnesium sulfate inj.', 'amp', '50 %', 'amp'),
(064, NULL, '0000290', 'Furosemide', 'Tab', '40 mg.', 'เม็ด'),
(065, NULL, '0000298', 'transamin inj.', 'inj', '250 mg/5 ml', 'amp'),
(066, NULL, '0000326', 'Enalapril 20 mg (100 tab)', 'tab', '20 mg', 'เม็ด'),
(067, NULL, '0000328', 'Doxazocin', 'Tab', '2 mg', 'เม็ด'),
(068, NULL, '0000342', 'Isodil (SIAM)', 'Tab', '10 mg', 'เม็ด'),
(069, NULL, '0000381', 'Gemfibrozil (1000 เม็ด)', 'Cap', '300 mg', 'เม็ด'),
(070, NULL, '0000382', 'Clopidogrel', 'Tab', '75 mg', 'เม็ด'),
(071, NULL, '0000391', 'Amlodipine', 'Tab', '10 mg', 'เม็ด'),
(072, NULL, '0000399', 'Levophed inj.', 'Amp', '4 mg/ ml', 'vial'),
(073, NULL, '0000435', 'Atenolol', 'Tab', '100 mg', 'เม็ด'),
(074, NULL, '0000439', 'Furosemide', '500', 'mg', 'เม็ด'),
(075, NULL, '0000449', 'Nicardipine inj.', 'Inj', '2 mg/2ml', 'amp'),
(076, NULL, '453', 'simvastatin', 'tab', '20 mg', 'เม็ด'),
(077, NULL, '0000546', 'Gemfibrozil (500 เม็ด)', 'Cap', '300 mg', 'เม็ด'),
(078, NULL, '0000548', 'Captopril', 'Tab', '25 mg', 'เม็ด'),
(079, NULL, '0000601', 'amiodarone', 'inj', '150 mg/3ml', 'ไวอัล'),
(080, NULL, '0000603', 'spironolactone', 'tab', '100 mg', 'กล่อง'),
(081, NULL, '0000553', 'Furosemide 500 mg (500 เม็ด)', 'Tab', '500 mg', 'เม็ด'),
(082, NULL, '0000623', 'Fenofibrate', 'Cap', '100 mg', 'เม็ด'),
(083, NULL, '0000626', 'Propranolol (1000 เม็ด)', 'Tab', '10 mg', 'เม็ด'),
(084, NULL, '0000002', 'Ambroxol', 'tab', '30 mg', 'เม็ด'),
(085, NULL, '0000003', 'Acetylcysteine', 'pwr', '200 mg', 'ซอง'),
(086, NULL, '0000010', 'Aminophylline', 'tab', '100 mg', 'เม็ด'),
(087, NULL, '0000025', 'Chlorpheniramine', 'tab', '4 mg', 'เม็ด'),
(088, NULL, '0000026', 'Cetirizine', 'tab', '10 mg', 'เม็ด'),
(089, NULL, '0000030', 'Dextromethorphan', 'tab', '15 mg', 'เม็ด'),
(090, NULL, '0000055', 'Hydroxyzine', 'tab', '10 mg', 'เม็ด'),
(091, NULL, '0000096', 'Salbutamol', 'tab', '2 mg', 'เม็ด'),
(092, NULL, '0000103', 'Theophylline SR', 'tab', '200 mg', 'เม็ด'),
(093, NULL, '0000107', 'Triprolidine+ Pseudoephedrine', 'tab', '2.5 + 60 mg', 'เม็ด'),
(094, NULL, '0000119', 'Aminophylline inj.', 'amp', '250 mg/10 ml', 'amp'),
(095, NULL, '0000128', 'CPM inj.', 'amp', '10 mg/ ml', 'amp'),
(096, NULL, '0000167', 'Terbutaline inj.', 'amp', '0.5 mg/ml', 'amp'),
(097, NULL, '0000188', 'Aromatic ammonia 450 ml', 'spi', '2.5 gm+ 7 ml', 'ขวด'),
(098, NULL, '0000190', 'Berodual FORTE', 'NB', '1.25 mg+0.50 mg', 'หลอด'),
(099, NULL, '0000191', 'Berodual Inhaler', 'MDI', '20mcg+50mcg', 'หลอด'),
(100, NULL, '0000192', 'Budesonide Inhaler', 'MDI', '200 mcg', 'หลอด'),
(101, NULL, '0000216', 'Salbutamol Solution', 'sol', '5 mg/ml', 'ขวด'),
(102, NULL, '0000217', 'Salbutamol Inhaler', 'MDI', '2 mg/ml', 'หลอด'),
(103, NULL, '0000226', 'Ammon carbonate syrup', 'syr', '0.02 gm+0.25 ml', 'ขวด'),
(104, NULL, '0000229', 'Brown mixture 60 ml', 'mix', '0.6 ml+1.2 mg', 'ขวด'),
(105, NULL, '0000230', 'Brown mixture 180 ml', 'mix', '0.6 ml+1.2 mg', 'ขวด'),
(106, NULL, '0000231', 'CPM syr', 'syr', '2 mg/ 5 ml', 'ขวด'),
(107, NULL, '0000237', 'Guaifenesin syrup', 'syr', '100 mg/5 ml', 'ขวด'),
(108, NULL, '0000243', 'Mist.scill.ammon', 'mix', '0.67 ml+0.10 gm', 'ขวด'),
(109, NULL, '0000247', 'Salbutamol syrup', 'syr', '2 mg /5 ml', 'ขวด'),
(110, NULL, '0000250', 'Triprolidine+Pseudoephedrine syrup', 'syr', '(1.25+30)mg', 'ขวด'),
(111, NULL, '0000283', 'Acetylcysteine (Sea pharm)', 'pwr', '200 mg', 'ซอง'),
(112, NULL, '0000366', 'Fexofenadrine', 'Tab', '60 mg', 'เม็ด'),
(113, NULL, '0000385', 'Cetirizine (500 เม็ด)', 'Tab', '10 mg', 'เม็ด'),
(114, NULL, '0000394', 'Ambroxol', 'Tab', '30 mg', 'เม็ด'),
(115, NULL, '0000409', 'CPM (1000 เม็ด )', 'Tab', '4 mg', 'เม็ด'),
(116, NULL, '0000425', 'Salmeterol/Fluticasone', 'Inh', '25+125 mcg', 'หลอด'),
(117, NULL, '0000433', 'Ambroxol syrup', 'syr', '30 mg/5 ml', 'ขวด'),
(118, NULL, '0000545', 'Salbutamol (1000 เม็ด)', 'Tab', '2 mg', 'เม็ด'),
(119, NULL, '0000550', 'Brompheniramine+Phenylephrine', 'Tab', '4+10 mg', 'เม็ด'),
(120, NULL, '0000551', 'Dextromethorphan (1000 เม็ด)', 'Tab', '15 mg', 'เม็ด'),
(121, NULL, '0000607', 'Ambroxol (1000 เม็ด)', 'Tab', '30 mg', 'เม็ด'),
(122, NULL, '0000006', 'Alprazolam', 'tab', '0.25 mg', 'เม็ด'),
(123, NULL, '0000007', 'AMA', 'tab', '50+25 mg', 'เม็ด'),
(124, NULL, '0000008', 'Amitryptylline', 'tab', '10 mg', 'เม็ด'),
(125, NULL, '0000009', 'Amitryptylline', 'tab', '25 mg', 'เม็ด'),
(126, NULL, '0000019', 'Carbamazepine', 'tab', '200 mg', 'เม็ด'),
(127, NULL, '0000021', 'Cafergot', 'tab', '100 mg', 'เม็ด'),
(128, NULL, '0000023', 'Cinnarizine', 'tab', '25 mg', 'เม็ด'),
(129, NULL, '0000024', 'Chlordiazepoxide', 'cap', '10 mg', 'แคปซูล'),
(130, NULL, '0000029', 'Clozapine', 'tab', '100 mg', 'เม็ด'),
(131, NULL, '0000032', 'Diazepam', 'tab', '2 mg', 'เม็ด'),
(132, NULL, '0000033', 'Diazepam', 'tab', '5 mg', 'เม็ด'),
(133, NULL, '0000037', 'Dimenhydrinate', 'tab', '50 mg', 'เม็ด'),
(134, NULL, '0000047', 'Fluoxetine', 'cap', '20 mg', 'เม็ด'),
(135, NULL, '0000051', 'Haloperidol', 'tab', '2 mg', 'เม็ด'),
(136, NULL, '0000052', 'Haloperidol', 'tab', '5 mg', 'เม็ด'),
(137, NULL, '0000060', 'Imipramine', 'tab', '25 mg', 'เม็ด'),
(138, NULL, '0000065', 'Lorazepam', 'tab', '0.5 mg', 'เม็ด'),
(139, NULL, '0000078', 'Paracetamol', 'tab', '325 mg', 'เม็ด'),
(140, NULL, '0000079', 'Paracetamol', 'tab', '500 mg', 'เม็ด'),
(141, NULL, '0000082', 'Phenobarbital', 'tab', '60 mg', 'เม็ด'),
(142, NULL, '0000083', 'Phenytoin', 'cap', '100 mg', 'เม็ด'),
(143, NULL, '0000089', 'Perphenazine', 'tab', '8 mg', 'เม็ด'),
(144, NULL, '0000102', 'Tramadol', 'cap', '50 mg', 'แคปซูล'),
(145, NULL, '0000104', 'Trifluoroperazine', 'tab', '5 mg', 'เม็ด'),
(146, NULL, '0000105', 'Trihexyphenidyl', 'tab', '2 mg', 'เม็ด'),
(147, NULL, '0000106', 'Trihexyphenidyl', 'tab', '5 mg', 'เม็ด'),
(148, NULL, '0000114', 'Sodium valproate', 'tab', '500 mg', 'เม็ด'),
(149, NULL, '0000127', 'Chlorpromazine inj.', 'amp', '50 mg/2ml', 'amp'),
(150, NULL, '0000135', 'Diazepam inj.', 'amp', '10 mg/2 ml', 'amp'),
(151, NULL, '0000141', 'Haloperidol inj.', 'amp', '5 mg/ ml', 'amp'),
(152, NULL, '0000142', 'Haloperidol inj.(DEPO)', 'amp', '50 mg/ ml', 'amp'),
(153, NULL, '0000153', 'Morphine inj.', 'amp', '10 mg/ml', 'amp'),
(154, NULL, '0000158', 'Paracetamol inj.', 'amp', '300 mg/2 ml', 'amp'),
(155, NULL, '0000161', 'Pethidine inj.', 'amp', '50 mg/ml', 'amp'),
(156, NULL, '0000245', 'Paracetamol suspension', 'sus', '120 mg/ 5 ml', 'ขวด'),
(157, NULL, '0000249', 'Sodium valproate syrup', 'syr', '200 mg/ml', 'ขวด'),
(158, NULL, '0000280', 'Dimenhydrinate', 'inj', '50 mg', 'amp'),
(159, NULL, '0000284', 'Fluoxetine (Pharminar)', 'tab', '20 mg', 'เม็ด'),
(160, NULL, '0000285', 'Lorazepam (GDH )', 'tab', '0.5 mg', 'เม็ด'),
(161, NULL, '0000332', 'Phenytoin_Prompt (POND\'s)', 'Cap', '100 mg', 'เม็ด'),
(162, NULL, '0000337', 'Dimenhydrinate (500 เม็ด)', 'tab', '50 mg', 'เม็ด'),
(163, NULL, '0000343', 'Risperidone', 'Tab', '1 mg', 'เม็ด'),
(164, NULL, '0000344', 'Risperidone', 'Tab', '2 mg', 'เม็ด'),
(165, NULL, '0000345', 'Sertraline', 'Tab', '50 mg', 'เม็ด'),
(166, NULL, '0000348', 'Tramadol (500 เม็ด)', 'tab', '50 mg', 'เม็ด'),
(167, NULL, '0000349', 'Cafergot (Original)', 'tab', '100 mg', 'เม็ด'),
(168, NULL, '0000350', 'Lithium carbonate', 'Cap', '300 mg', 'เม็ด'),
(169, NULL, '0000362', 'Dilantin Infatab', 'Tab', '50 mg', 'เม็ด'),
(170, NULL, '0000365', 'Amitryptyline(1000 เม็ด)', 'Tab', '10 mg', 'เม็ด'),
(171, NULL, '0000368', 'Perphenazine', 'Tab', '4 mg', 'เม็ด'),
(172, NULL, '0000374', 'Haloperidol Solution', 'Sol', '2 mg/ml', 'ขวด'),
(173, NULL, '0000386', 'Clozapine (500 เม็ด)', 'Tab', '100 mg', 'เม็ด'),
(174, NULL, '0000392', 'Cafergot (200 เม็ด)', 'Tab', '', 'เม็ด'),
(175, NULL, '0000410', 'Alprazolam (100 เม็ด)', 'Tab', '0.25 mg', 'เม็ด'),
(176, NULL, '0000415', 'Diazepam 2 (1000 เม็ด)', 'Tab', '2 mg', 'เม็ด'),
(177, NULL, '0000434', 'Chloral hydrate', 'syr', '100 mg/ml', 'ซอง'),
(178, NULL, '0000437', 'Trihexyphenidyl (1000เม็ด)', 'Tab', '2 mg', 'เม็ด'),
(179, NULL, '0000442', 'Nortriptyline', 'Tab', '10 mg', 'เม็ด'),
(180, NULL, '0000443', 'Nortriptyline', 'Tab', ' 25 mg', 'เม็ด'),
(181, NULL, '000446', 'Betahistine mesylate', 'Tab', '6 mg', 'เม็ด'),
(182, NULL, '0000447', 'Fluphenazine decanoate inj.', 'inj', '25 mg/1 ml', 'amp'),
(183, NULL, '0000448', 'Clonazepam', 'Tab', '0.5 mg', 'เม็ด'),
(184, NULL, '0000552', 'Tramadol (250 เม็ด)', 'Cap', '50 mg', 'เม็ด'),
(185, NULL, '0000600', 'tramadol', 'inj', '50mg', 'แอมพูล'),
(186, NULL, '0000605', 'Phenytoin SR', 'Cap', '100 mg', 'เม็ด'),
(187, NULL, '0000609', 'Lorazepam (1 mg)', '1', 'mg', 'เม็ด'),
(188, NULL, '0000614', 'Sod.valproate (ยา refer)', 'Tab', '500 mg', 'เม็ด'),
(189, NULL, '0000624', 'Paracetamol (500 เม็ด)', 'Tab', '325 mg', 'เม็ด'),
(190, NULL, '0000004', 'Acyclovir', 'tab', '400 mg', 'เม็ด'),
(191, NULL, '0000012', 'Amoxycillin', 'cap', '250 mg', 'เม็ด'),
(192, NULL, '0000013', 'Amoxycillin', 'cap', '500 mg', 'เม็ด'),
(193, NULL, '0000022', 'Chloroquine phosphate', 'tab', '250 mg', 'เม็ด'),
(194, NULL, '0000028', 'Co-trimoxazole', 'tab', '400+80 mg', 'เม็ด'),
(195, NULL, '0000035', 'Dicloxacillin', 'cap', '250 mg', 'แคปซูล'),
(196, NULL, '0000036', 'Diethylcarbamazine', 'tab', '300 mg', 'เม็ด'),
(197, NULL, '0000040', 'Doxycycline', 'cap', '100 mg', 'แคปซูล'),
(198, NULL, '0000048', 'Fluconazole', 'cap', '200 mg', 'แคปซูล'),
(199, NULL, '0000059', 'Itraconazole', 'cap', '100 mg', 'แคปซูล'),
(200, NULL, '0000063', 'Ketoconazole', 'tab', '200 mg', 'เม็ด'),
(201, NULL, '0000066', 'Mebendazole', 'tab', '100 mg', 'เม็ด'),
(202, NULL, '0000070', 'Metronidazole', 'tab', '200 mg', 'เม็ด'),
(203, NULL, '0000071', 'Niclosamide', 'tab', '500 mg', 'เม็ด'),
(204, NULL, '0000073', 'Norfloxacin', 'tab', '400 mg', 'เม็ด'),
(205, NULL, '0000087', 'Penicillin V', 'tab', '125 mg', 'เม็ด'),
(206, NULL, '0000088', 'Penicillin V', 'tab', '250 mg', 'เม็ด'),
(207, NULL, '0000091', 'Primaquine', 'tab', '15 mg', 'เม็ด'),
(208, NULL, '0000093', 'Quinine', 'tab', '300 mg', 'เม็ด'),
(209, NULL, '0000095', 'Roxitromycin', 'tab', '150 mg', 'เม็ด'),
(210, NULL, '0000115', 'Ofloxacin', 'tab', '200 mg', 'เม็ด'),
(211, NULL, '0000120', 'Ampicillin inj.', 'via', '\"1 GM', 'vial'),
(212, NULL, '0000121', 'Ampicillin inj.', 'via', '1 GM\"', 'vial'),
(213, NULL, '0000122', 'Ampicillin inj.', 'via', '500 mg', 'vial'),
(214, NULL, '0000129', 'Ceftriaxone inj.', 'via', '250 mg', 'vial'),
(215, NULL, '0000130', 'Cloxacillin inj.', 'via', '1 GM', 'vial'),
(216, NULL, '0000131', 'Chloramphenicol inj.', 'via', '1 GM', 'vial'),
(217, NULL, '0000139', 'Gentamicin inj.', 'amp', '1 GM', 'amp'),
(218, NULL, '0000152', 'Metronidazole inj.', 'via', '80 mg/ 2 ml', 'vial'),
(219, NULL, '0000160', 'Penicillin G sodium inj.', 'via', '500 mg/100 ml', 'vial'),
(220, NULL, '0000184', '70% Alcohol 30 ml', 'sol', '5 mu/vial', 'ขวด'),
(221, NULL, '0000185', '70% Alcohol  450 ml', 'sol', '70%', 'ขวด'),
(222, NULL, '0000186', '90% Alcohol', 'sol', '70%', 'ถัง'),
(223, NULL, '0000187', 'Acyclovir cream', 'cre', '90%', 'ซอง'),
(224, NULL, '0000202', 'Formaline 450 ml', 'sol', '5%W/W', 'ขวด'),
(225, NULL, '0000203', 'Gentian violet', 'sol', '450 ml', 'ขวด'),
(226, NULL, '0000204', 'Glutaraldehyde', 'sol', '30 ml', 'แกลลอน'),
(227, NULL, '0000206', 'Hibiscrub', 'sol', '5000 ml', 'แกลลอน'),
(228, NULL, '0000207', 'Hydrogen peroxide 450 ml', 'sol', '5000 ml', 'ขวด'),
(229, NULL, '0000210', 'Nystatin oral suspension', 'sus', '6%W/V', 'ขวด'),
(230, NULL, '0000214', 'Povidine paint 450 ml', 'sol', '100,000 unit/ml', 'ขวด'),
(231, NULL, '0000215', 'Povidine scrub 500 ml', 'sol', '10% W/V', 'ขวด'),
(232, NULL, '0000227', 'Amoxycillin dry  syrup', 'syr', '7.5 gm/100 ml', 'ขวด'),
(233, NULL, '0000232', 'Co-trimoxazole suspension', 'sus', '125 mg/5 ml', 'ขวด'),
(234, NULL, '0000233', 'Dicloxacillin syrup', 'syr', '(200+40)mg', 'ขวด'),
(235, NULL, '0000235', 'Erythromycin dry syrup', 'syr', '62.5 mg/ 5 ml', 'ขวด'),
(236, NULL, '0000241', 'Mebendazole suspension', 'sus', '125 mg/5 ml', 'ขวด'),
(237, NULL, '0000246', 'Penicillin V syrup', 'syr', '100 mg/5 ml', 'ขวด'),
(238, NULL, '0000277', 'Amoxiciilin + Clavulanic acid', 'tab', '125 mg / 5 ml', 'กล่อง'),
(239, NULL, '0000278', 'Amoxicillin + Clavulanic acid', 'syr', '(875+125)mg', 'ขวด'),
(240, NULL, '0000279', 'Ciprofloxacin', 'tab', '(125+31.25)mg', 'เม็ด'),
(241, NULL, '0000289', 'Quinine inj.', 'amp', '250 mg', 'amp'),
(242, NULL, '0000297', 'Povidine scrub 450 ml', 'sol', '600 mg/2 ml', 'ขวด'),
(243, NULL, '0000316', 'AZT syrup', 'syr', '7.5 gm/100 ml', 'ขวด'),
(244, NULL, '0000317', 'GPO-virZ 250', 'tab', '10 mg/ml', 'ขวด'),
(245, NULL, '0000318', 'GPO-virS 30', 'tab', '250 mg', 'ขวด'),
(246, NULL, '0000319', 'Lamivudine (3TC)', 'tab', '30 mg', 'ขวด'),
(247, NULL, '0000320', 'Nevirapine (NVP)', 'tab', '150 mg', 'ขวด'),
(248, NULL, '0000321', 'Stavudine  (d4T)', 'cap', '200 mg', 'ขวด'),
(249, NULL, '0000322', 'Zidovudine (AZT)', 'cap', '30 mg', 'ขวด'),
(250, NULL, '0000327', '70% Alcohol (ขนาด 60 ซีซี)', 'sol', '100 mg', 'ขวด'),
(251, NULL, '0000329', 'Albendazole suspension', 'sus', '70%', 'ขวด'),
(252, NULL, '0000347', 'Metronidazole (1000 เม็ด)', 'Tab', '200 mg/ 5 ml', 'เม็ด'),
(253, NULL, '0000353', 'Ciprofloxacin (500 เม็ด )', 'Tab', '200 mg', 'เม็ด'),
(254, NULL, '0000361', 'Artesunate', 'Tab', '250 mg', 'เม็ด'),
(255, NULL, '0000369', 'Pyrazinamide', 'Tab', '50 mg', 'เม็ด'),
(256, NULL, '0000370', 'Isoniazid', 'Tab', '500 mg', 'เม็ด'),
(257, NULL, '0000371', 'Ethambutol', 'Tab', '100 mg', 'เม็ด'),
(258, NULL, '0000372', 'Rifampicin', 'Cap', '400 mg', 'เม็ด'),
(259, NULL, '0000373', 'Rifampicin', 'Cap', '300 mg', 'เม็ด'),
(260, NULL, '0000380', 'Rimstar  4 - FDC', 'Tab', '450 mg', 'เม็ด'),
(261, NULL, '0000383', 'Fluconazole(50เม็ด)', 'Cap', '150+75+400+275', 'แคปซูล'),
(262, NULL, '0000387', 'Penicillin V (500 เม็ด)', 'Tab', '200 mg', 'เม็ด'),
(263, NULL, '0000390', 'Norfloxacin', 'Tab', '250 mg', 'เม็ด'),
(264, NULL, '0000404', 'Metronidazole suspension', 'Sus', '400 mg', 'ขวด'),
(265, NULL, '0000416', 'Cephalexin', 'Cap', '200 mg/5 ml', 'เม็ด'),
(266, NULL, '0000418', 'Thiamphenicol', 'Tab', '250 mg', 'เม็ด'),
(267, NULL, '0000419', 'Cefotaxime inj.', 'via', '500 mg', 'vial'),
(268, NULL, '0000422', 'Penicillin V', 'tab', '1 GM', 'เม็ด'),
(269, NULL, '0000423', 'Oseltamivir', 'Cap', '125 mg', 'เม็ด'),
(270, NULL, '0000426', 'Amoxicillin Forte syrup', 'syr', '75 mg', 'ขวด'),
(271, NULL, '0000431', 'Norfloxacin', 'Tab', '250 mg/5 ml', 'เม็ด'),
(272, NULL, '0000432', 'Cephalexin syrup', 'syr', '100 mg', 'ขวด'),
(273, NULL, '0000436', 'Cefazolin', 'inj', '125 mg/5 ml', 'vial'),
(274, NULL, '0000440', 'Amoxicillin+clavulanic acid', 'syr', '1 GM', 'ขวด'),
(275, NULL, '0000444', 'Thiamphenicol (1000 เม็ด)', 'Tab', '228.5 mg/5 ml', 'เม็ด'),
(276, NULL, '0000450', 'Lopinavir/Ritonavir', 'Tab', '250 mg', 'ขวด'),
(277, NULL, '0000451', 'Tenofovir', 'Tab', '200+50 mg', 'ขวด'),
(278, NULL, '0000452', 'Efavirenz', 'Tab', '150 mg', 'ขวด'),
(279, NULL, '0000549', 'Clindamycin', 'Cap', '600 mg', 'เม็ด'),
(280, NULL, '0000602', 'Amoxiciilin + Clavulanic acid', 'inj', '300 mg', 'ไวอัล'),
(281, NULL, '0000604', 'clindamycin', 'inj', '1.2 gm', 'ไวอัล'),
(282, NULL, '0000612', 'Isoniazid + Rifampicin', 'Tab', '600 mg/4ml', 'เม็ด'),
(283, NULL, '0000050', 'Glibenclamide', 'tab', '150 + 300 mg', 'เม็ด'),
(284, NULL, '0000064', 'L - thyroxine', 'tab', '5 mg', 'เม็ด'),
(285, NULL, '0000069', 'Metformin', 'tab', '0.1 mg', 'เม็ด'),
(286, NULL, '0000074', 'Norethisterone', 'tab', '500 mg', 'เม็ด'),
(287, NULL, '0000084', 'Propylthiouracil', 'tab', '5 mg', 'เม็ด'),
(288, NULL, '0000085', 'Prednisolone', 'tab', '50 mg', 'เม็ด'),
(289, NULL, '0000086', 'Conjugated estrogen', 'tab', '5 mg', 'เม็ด'),
(290, NULL, '0000132', 'Dexamethasone inj.', 'amp', '0.625 mg', 'amp'),
(291, NULL, '0000155', 'NPH insulin', 'via', '4 mg/ ml', 'vial'),
(292, NULL, '0000164', 'RI insulin', 'via', '100 iu/ml', 'vial'),
(293, NULL, '0000168', 'Triamcinolone acetate inj.', 'via', '100 iu/ml', 'vial'),
(294, NULL, '0000325', 'Premarin (original)', 'Tab', '10 mg/ml', 'เม็ด'),
(295, NULL, '0000355', 'Glipizide', 'Tab', '0.625 mg', 'เม็ด'),
(296, NULL, '0000367', 'L- thyroxin ( SPS)', 'Tab', '5 mg', 'เม็ด'),
(297, NULL, '0000389', 'Mixtard Insulin', 'via', '0.1 mg', 'vial'),
(298, NULL, '0000441', 'Methimazole', 'tab', '100 iu/ml', 'เม็ด'),
(299, NULL, '0000547', 'Prednisolone (1000 เม็ด)', 'Tab', '5 mg', 'เม็ด'),
(300, NULL, '0000043', 'Ethinylestradiol+Levonorgestrel', 'tab', '5 mg', 'แผง'),
(301, NULL, '0000044', 'Lynestrenol', 'tab', '0.03+0.15 mg', 'แผง'),
(302, NULL, '0000149', 'Medroxyprogesterone inj.(DMPA)', 'via', '0.5 mg', 'vial'),
(303, NULL, '0000150', 'Methylergometrine inj.', 'amp', '150 mg/3 ml', 'amp'),
(304, NULL, '0000157', 'Oxytocin inj.', 'amp', '0.2 mg/ml', 'amp'),
(305, NULL, '0000165', 'Sulprostone inj.(Nalador)', 'amp', '10 u/ml', 'amp'),
(306, NULL, '0000199', 'Clotrimazole tab', 'Vag', '500 mcg/amp', 'เม็ด'),
(307, NULL, '0000282', 'Etonogestrel  (Etoplan)', 'inj', '100 mg', 'กล่อง'),
(308, NULL, '0000352', 'Methotrexate', 'Tab', '68 mg', 'เม็ด'),
(309, NULL, '0000020', 'Calcium carbonate', 'cap', '2.5 mg', 'แคปซูล'),
(310, NULL, '0000045', 'Ferrous fumarate', 'tab', '835 mg', 'เม็ด'),
(311, NULL, '0000046', 'Folic acid', 'tab', '200 mg', 'เม็ด'),
(312, NULL, '0000068', 'Multivitamin', 'tab', '5 mg', 'เม็ด'),
(313, NULL, '0000101', 'Sodium bicarbonate', 'tab', '', 'เม็ด'),
(314, NULL, '0000109', 'VitaminB 1-6-12', 'tab', '300 mg', 'เม็ด'),
(315, NULL, '0000110', 'Vitamin B complex', 'tab', '', 'เม็ด'),
(316, NULL, '0000111', 'Vitamin C', 'tab', '', 'เม็ด'),
(317, NULL, '0000112', 'Vitamin C', 'tab', '100 mg', 'เม็ด'),
(318, NULL, '0000126', 'Calcium gluconate inj.', 'amp', '500 mg', 'amp'),
(319, NULL, '0000140', 'Glucose 50% inj.', 'amp', '', 'amp'),
(320, NULL, '0000156', '7.5% Sodium bicarbonate inj.', 'amp', '', 'amp'),
(321, NULL, '0000162', 'Potassium chloride inj.(KCl )', 'amp', '7.5% in 50 ml', 'amp'),
(322, NULL, '0000169', 'VitaminB complex inj.', 'amp', '20 mEq/10 ml', 'amp'),
(323, NULL, '0000170', 'VitaminK 1 mg inj (เด็ก)', 'amp', '', 'amp'),
(324, NULL, '0000171', 'VitaminK 10 mg inj.(ผู้ใหญ่)', 'amp', '1 mg/0.5 ml', 'amp'),
(325, NULL, '0000172', '5% D/N/3 500 ml', 'ขวด', '10 mg/ ml', 'ขวด'),
(326, NULL, '0000173', 'NSS 3 ml', 'NB', '', 'NB'),
(327, NULL, '0000174', 'SWI 10 ml', 'NB', '', 'NB'),
(328, NULL, '0000175', 'NSS irrigate 1000 ml', 'ขวด', '', 'ขวด'),
(329, NULL, '0000176', 'NSS 1000 ml', 'ขวด', '', 'ขวด'),
(330, NULL, '0000177', '5%D/N/2 1000 ml', 'ขวด', '', 'ขวด'),
(331, NULL, '0000178', '5%D/NSS 1000 ml', 'ขวด', '', 'ขวด'),
(332, NULL, '0000179', 'Ringer lactate solution 1000 ml', 'ขวด', '', 'ขวด'),
(333, NULL, '0000180', '5%D/N/5 500 ml', 'ขวด', '', 'ขวด'),
(334, NULL, '0000181', '5% D/W 500 ml', 'ขวด', '', 'ขวด'),
(335, NULL, '0000182', '5% D/W 100 ml', 'ขวด', '', 'ขวด'),
(336, NULL, '0000183', 'NSS 100 ml', 'ขวด', '', 'ขวด'),
(337, NULL, '0000236', 'Ferrous fumarate (Fer-dex)', 'sus', '', 'ขวด'),
(338, NULL, '0000240', 'MTV syrup', 'syr', '45 mg/0.6 ml', 'ขวด'),
(339, NULL, '0000281', 'Potassium Chloride', 'tab', '-', 'เม็ด'),
(340, NULL, '0000299', 'Haemaccel', 'sol', '500 mg', 'ขวด'),
(341, NULL, '0000300', 'Ca.Polystyrene sulfonate', 'pwr', '500 ml', 'ซอง'),
(342, NULL, '0000301', 'VitaminB 6', 'tab', '5 gm', 'เม็ด'),
(343, NULL, '0000303', 'Water for Irrigate 1000 ml', 'sol', '10 mg', 'ขวด'),
(344, NULL, '0000311', 'Sodium bicarbonate inj.(NaHCO3)', 'inj', '1000 ml', 'amp'),
(345, NULL, '0000314', 'Triferdine 150', 'tab', '7.5%', 'เม็ด'),
(346, NULL, '0000315', 'Iodine GPO 150', 'tab', '0.15+60.81+0.4', 'เม็ด'),
(347, NULL, '0000333', 'K Elixir (1 mEq/ml)', 'Mix', '0.15 mg', 'ขวด'),
(348, NULL, '0000375', 'VitaminB1-6-12(Douzabox)', 'Tab', '240 ml', 'เม็ด'),
(349, NULL, '0000388', 'NSS 500 ml', 'ขวด', '', 'ขวด'),
(350, NULL, '0000393', 'Vitamin B 6 (50 mg)', 'Tab', '', 'เม็ด'),
(351, NULL, '0000407', 'Calcium carbonate ( 500 เม็ด)', 'Cap', '50 mg', 'เม็ด'),
(352, NULL, '0000412', 'Obimin - AZ', 'Tab', '835 mg', 'เม็ด'),
(353, NULL, '0000414', 'Obimin -AZ (30 เม็ด)', 'Tab', 'AZ', 'เม็ด'),
(354, NULL, '0000420', 'Ringer ACETATE solution', 'sol', '', 'ขวด'),
(355, NULL, '0000554', 'SWI 100 ml', 'Sol', '1000 ml', 'ขวด'),
(356, NULL, '0000005', 'Allopurinol', 'tab', '100 ml', 'เม็ด'),
(357, NULL, '0000027', 'Colchicine', 'tab', '100 mg', 'เม็ด'),
(358, NULL, '0000034', 'Diclofenac', 'tab', '0.6 mg', 'เม็ด'),
(359, NULL, '0000056', 'Ibuprofen', 'tab', '25 mg', 'เม็ด'),
(360, NULL, '0000057', 'Ibuprofen', 'tab', '200 mg', 'เม็ด'),
(361, NULL, '0000058', 'Indomethacin', 'cap', '400 mg', 'เม็ด'),
(362, NULL, '0000067', 'Mefenamic acid', 'cap', '25 mg', 'เม็ด'),
(363, NULL, '0000080', 'Paracetamol +Orphendrine', 'tab', '250 mg', 'เม็ด'),
(364, NULL, '0000090', 'Piroxicam', 'cap', '450+35 mg', 'แคปซูล'),
(365, NULL, '0000097', 'Serratiopeptidase', 'tab', '10 mg', 'เม็ด'),
(366, NULL, '0000108', 'Tolperisone', 'tab', '5 mg', 'เม็ด'),
(367, NULL, '0000134', 'Diclofenac inj.', 'amp', '50 mg', 'amp'),
(368, NULL, '0000209', 'Methylsalicylate balm', 'cre', '75 mg/ 2 ml', 'หลอด'),
(369, NULL, '0000225', 'ขี้ผึ้ง แก้ปวด ลดบวม', 'oin', '30 gm', 'ขวด'),
(370, NULL, '0000239', 'Ibuprofen syrup', 'syr', '15 gm', 'ขวด'),
(371, NULL, '0000295', 'Colchicine (กล่องละ 1000 เม็ด )', 'Tab', '100 mg / 5 ml', 'เม็ด'),
(372, NULL, '0000304', 'Tolperisone_ 1000 tab', 'tab', '0.6 mg', 'เม็ด'),
(373, NULL, '0000323', 'Norgesic (แบบแผง)', 'Tab', '50 mg', 'เม็ด'),
(374, NULL, '0000341', 'Diclofanac (1000 เม็ด )', 'Tab', '450 + 35 mg', 'เม็ด'),
(375, NULL, '0000346', 'Serratiopeptidase (500 เม็ด)', 'Tab', '25 mg', 'เม็ด'),
(376, NULL, '0000428', 'Naproxen Na', 'Tab', '5 mg', 'เม็ด'),
(377, NULL, '0000445', 'Mefenamic (1000 เม็ด)', 'Cap', '275 mg', 'เม็ด'),
(378, NULL, '0000454', 'หญ้าหนวดแมว(100 เม็ด)', 'Cap', '250 mg', 'เม็ด'),
(379, NULL, '0000608', 'Naproxen (250)', 'Tab', '400 mg', 'เม็ด'),
(380, NULL, '0000189', 'Artificial Tear', 'sol', '250 mg', 'กล่อง'),
(381, NULL, '0000196', 'Chloramphenicol eye drop', 'sol', '-', 'ขวด'),
(382, NULL, '0000197', 'Chlor-tetracycline eye ointment', 'oin', '5 mg/ ml', 'หลอด'),
(383, NULL, '0000201', 'Dex - oph', 'sol', '10 mg/gm', 'ขวด'),
(384, NULL, '0000205', 'Hista - oph( Antazoline )', 'sol', '1 mg+3.5 mg', 'ขวด'),
(385, NULL, '0000213', 'Poly - oph', 'sol', '10 ml', 'ขวด'),
(386, NULL, '0000288', 'Hista-oph (Thai P.D chemical )', 'sol', '5 ml', 'ขวด'),
(387, NULL, '0000302', 'Tetracaine HCl EYE drop', 'sol', '10 ml', 'ขวด'),
(388, NULL, '0000384', 'Oxytetracycline Eye ointment', 'oin', '0.5%', 'หลอด'),
(389, NULL, '0000195', 'Chloramphenicol *EAR* drop', 'sol', '3.5 GM', 'ขวด'),
(390, NULL, '0000221', 'TA oral paste', 'cre', '10 mg/ml', 'ซอง'),
(391, NULL, '0000292', 'Glycerin', 'syr', '0.10%', 'ขวด'),
(392, NULL, '0000293', 'Rhinocort Aqua nasal spray', 'sol', '450 g', 'ขวด'),
(393, NULL, '0000296', 'Sodium hypochlorite', 'Sol', '64 mcg/dose', 'แกลลอน'),
(394, NULL, '0000310', 'Concentrate Mouth wash', 'sol', '10% w/w', 'ขวด'),
(395, NULL, '0000340', 'Glycerin Borax', 'sol', '450 ml', 'ขวด'),
(396, NULL, '0000413', 'Bunase nasal spray', 'sol', '100 g.', 'ขวด'),
(397, NULL, '0000193', 'Calamine lotion', 'lot', '100 mcg/dose', 'กล่อง'),
(398, NULL, '0000194', 'Clobetasol cream', 'cre', '15%W/V', 'กระปุก'),
(399, NULL, '0000198', 'Clotrimazole cream', 'cre', '0.05%gm/100 gm', 'กระปุก'),
(400, NULL, '0000211', 'Prednisolone cream', 'cre', '10 mg/gm', 'หลอด'),
(401, NULL, '0000218', 'Scabicide emulsion (Benzyl benzoate)', 'emu', '0.02% W/W', 'ขวด'),
(402, NULL, '0000219', 'Silver- sulfadiazine cream', 'cre', '25 gm/ 100 ml', 'กระปุก'),
(403, NULL, '0000220', '0.1% TA cream', 'cre', '1 gm/100 ml', 'กระปุก'),
(404, NULL, '0000222', 'Whitfield ointment 15 gm', 'oin', '0.1 gm/100 gm', 'กล่อง'),
(405, NULL, '0000339', 'Clobetasol cream (5 กรัม)', 'cre', '6%W/W+ 3%W/W', 'หลอด'),
(406, NULL, '0000364', 'Clotrimazole cream(หลอด)', 'Cre', '0.05 GM', 'หลอด'),
(407, NULL, '0000424', '10% Urea cream', 'cre', '5 gm.', 'กระปุก'),
(408, NULL, '0000438', '0.02% TA cream', 'cre', '10%', 'หลอด'),
(409, NULL, '0000166', 'Tetanus vaccine', 'amp', '5 gm', 'amp'),
(410, NULL, '0000313', 'Hepatitis B vaccine (HB)', 'inj', '', 'vial'),
(411, NULL, '0000338', 'PCEC vaccine', 'via', '20 mcg/ml', 'vial'),
(412, NULL, '0000354', 'Tetanus Toxoid (MASU)', 'Amp', '1 ml', 'amp'),
(413, NULL, '0000378', 'BCG vaccine', 'inj', '', 'vial'),
(414, NULL, '0000379', 'HBV vaccine', 'inj', ' 1 ml', 'vial'),
(415, NULL, '0000615', 'DTP vaccine', 'Via', ' 1 ml', 'ไวอัล'),
(416, NULL, '0000616', 'J.E.vaccine(Live-attennated)', 'Via', '10 doses', 'ไวอัล'),
(417, NULL, '0000617', 'DTP+HB vaccine', 'via', '1 dose', 'ไวอัล'),
(418, NULL, '0000618', 'IPV vaccine', 'via', '10 doses', 'ไวอัล'),
(419, NULL, '0000619', 'Bivalent OPV', 'via', '10 doses', 'ไวอัล'),
(420, NULL, '0000621', 'dT vaccine', 'via', '10 doses', 'ไวอัล'),
(421, NULL, '0000622', 'MMR vaccine (single dose)', 'via', '10 doses', 'ไวอัล'),
(422, NULL, '0000146', '1% Lidocaine C adrenaline inj.', 'via', '1 dose', 'vial'),
(423, NULL, '0000208', '2%Lidocaine viscous 100 ml', 'sol', '', 'ขวด'),
(424, NULL, '0000309', '2%Xylocaine viscous (รพ.สวนดอก)', 'sol', '20 mg/ ml', 'ขวด'),
(425, NULL, '0000363', '2% Lidocaine viscous (รพ.นครพิงค์)', 'Sol', '20 mg/ml', 'ขวด'),
(426, NULL, '0000123', 'Anti-venum งูเขียวหางไหม้', 'via', '60 ซีซี', 'vial'),
(427, NULL, '0000124', 'Anti- venum งูเห่า', 'via', '', 'vial'),
(428, NULL, '0000154', 'Naloxone inj.', 'amp', '', 'amp'),
(429, NULL, '0000159', 'Pralidoxime inj. (2-PAM)', 'via', '0.4 mg/ ml', 'vail'),
(430, NULL, '0000287', 'Activated charcoal', 'pwr', '1GM', 'กระปุก'),
(431, NULL, '0000421', 'Anti-venin งูทับสมิงคลา', 'Sol', '', 'vial'),
(432, NULL, '0000555', 'Anti-venin Hemato polyvalent', 'Inj', '', 'vial'),
(433, NULL, '0000613', 'Anti-venin งูกะปะ', 'via', '', 'vial'),
(434, NULL, '0000113', 'Mybacin', 'LOZ', '', 'ซอง'),
(435, NULL, '0000251', 'ยาอมมะแว้ง', 'tab', '', 'กล่อง'),
(436, NULL, '0000252', 'ยาอมรสกานพลู', 'Loz', '', 'ขวด'),
(437, NULL, '0000253', 'ขมิ้นชัน', 'cap', '', 'แคปซูล'),
(438, NULL, '0000254', 'เพชรสังฆาต', 'cap', '500 mg', 'แคปซูล'),
(439, NULL, '0000255', 'ฟ้าทะลายโจร', 'cap', '500 mg', 'แคปซูล'),
(440, NULL, '0000256', 'ยาตำรับสหัสธารา', 'cap', '350 mg', 'แคปซูล'),
(441, NULL, '0000257', 'ยาตำรับลดการอยากอาหาร', 'cap', '350 mg', 'แคปซูล'),
(442, NULL, '0000258', 'ชาชงรางจืดผสมใบเตย', 'ชา', '400 mg', 'กล่อง'),
(443, NULL, '0000259', 'ชาชงหญ้าดอกขาว', 'ชา', '', 'กล่อง'),
(444, NULL, '0000260', 'มะขามแขก', 'cap', '', 'แคปซูล'),
(445, NULL, '0000261', 'เสลดพังพอนกลีเซอรีน', 'sol', '300 mg', 'ขวด'),
(446, NULL, '0000305', 'มหาหิงสุ์', 'sol', '', 'ขวด'),
(447, NULL, '0000306', 'ยาแก้ไอน้ำฝาง', 'syr', '', 'ขวด'),
(448, NULL, '0000307', 'ยาธาตุอบเชย', 'syr', '240 ml', 'ขวด'),
(449, NULL, '0000308', 'ยาหอมเนาวโกศ', 'ผง', '240 ml', 'ขวด'),
(450, NULL, '0000334', 'ขมิ้นชัน (บรรจุ 200\'s)', 'cap', '30 กรัม', 'แคปซูล'),
(451, NULL, '0000335', 'เพชรสังฆาต (บรรจุ 100 \'s)', 'cap', '500 mg', 'แคปซูล'),
(452, NULL, '0000336', 'ยาตำรับสหัสธารา (บรรจุ 100\'s)', 'cap', '500 mg', 'แคปซูล'),
(453, NULL, '0000356', 'เพชรสังฆาต (กล่อง)', 'Cap', '350 mg', 'เม็ด'),
(454, NULL, '0000357', 'เถาวัลย์เปรียง (กล่อง)', 'Cap', '300 mg', 'เม็ด'),
(455, NULL, '0000358', 'ยาตำรับสหัสธารา (กล่อง)', 'Cap', '300 mg', 'เม็ด'),
(456, NULL, '0000359', 'ฟ้าทะลายโจร (200 เม็ด/กล่อง)', 'Cap', '400 mg', 'เม็ด'),
(457, NULL, '0000360', 'มะขามแขก (200 เม็ด /กล่อง)', 'Cap', '350 mg', 'เม็ด'),
(458, NULL, '0000376', 'ว่านชักมดลูก', 'Cap', '300 mg', 'เม็ด'),
(459, NULL, '0000395', 'ฟ้าทะลายโจร', 'Cap', '400 mg', 'เม็ด'),
(460, NULL, '0000396', 'มะขามแขก', 'Cap', '500 mg', 'เม็ด'),
(461, NULL, '0000397', 'ยาธาตุอบเชย', 'Syr', '330 mg', 'ขวด'),
(462, NULL, '0000398', 'ยาแก้ไอมะขามป้อม', 'SYR', '120 ml', 'ขวด'),
(463, NULL, '0000400', 'ยาขิง', 'Cap', '60 ml', 'เม็ด'),
(464, NULL, '0000401', 'ยาปลูกไฟธาตุ', 'Cap', '500 mg', 'เม็ด'),
(465, NULL, '0000402', 'เสลดพังพอนทิงเจอร์', 'Tin', '', 'ขวด'),
(466, NULL, '0000403', 'หญ้าหนวดแมว', 'Cap', '', 'เม็ด'),
(467, NULL, '0000408', 'ว่านชักมดลูก', 'Cap', '400 mg', 'เม็ด'),
(468, NULL, '0000411', 'ขมิ้นชัน (100 เม็ด)', 'Cap', '400 mg', 'เม็ด'),
(469, NULL, '0000429', 'มะระขี้นก', 'Cap', '500 mg', 'เม็ด'),
(470, NULL, '0000430', 'เห็ดหลินจือ', 'Cap', '350 mg', 'เม็ด'),
(471, NULL, '0000606', 'มะระขี้นก', 'cap', '250 mg', 'เม็ด'),
(472, NULL, '0000610', 'ยาอมสมุนไพร หญ้าดอกขาว', 'Loz', '500 mg', 'ซอง'),
(473, NULL, '0000625', 'ยาธาตุอบเชย (อู่ทอง)', 'Syr', '200 mg', 'ขวด'),
(474, NULL, '0000001', 'Albendazole', 'tab', '250 ml', 'เม็ด'),
(475, NULL, '0000611', 'ชาชงหญ้าหนวดแมว', 'ชา', '200 mg', 'กล่อง'),
(476, NULL, 'A223', 'ถุงมือ Disposeble No.S(บริจาค)', 'box', '2 gm.', 'กล่อง'),
(477, NULL, 'A224', 'ถุงมือ Sterile No.6.5(บริจาค)', 'คู่', '', 'คู่'),
(478, NULL, 'A231', 'ถุงมือ Sterile No.7.5(บริจาค)', 'คู่', '', 'คู่'),
(479, NULL, 'A001', 'ถุงมือ Sterile No.6.5', 'คู่', '', 'คู่'),
(480, NULL, 'A002', 'ถุงมือ Sterile No.7', 'คู่', '', 'คู่'),
(481, NULL, 'A003', 'ถุงมือ Sterile No.7.5', 'คู่', '', 'คู่'),
(482, NULL, 'A004', 'ถุงมือ Non-Sterile No.6.5', 'คู่', '', 'คู่'),
(483, NULL, 'A279', 'ถุงมือ Disposable #M(บริจาค)', 'box', '', 'กล่อง'),
(484, NULL, 'A281', 'NST paper(152x150x150sh)', 'พับ', '', 'พับ'),
(485, NULL, 'A282', 'ถุงมือ Disposable #XS (บริจาค)', 'box', '', 'กล่อง'),
(486, NULL, 'A283', 'ถุงมือ Disposable #L(บริจาค)', 'box', '', 'กล่อง'),
(487, NULL, 'A005', 'ถุงมือ Disposeble No.S', 'box', '', 'box'),
(488, NULL, 'A006', 'ถุงมือ Disposeble No.M', 'box', '', 'box'),
(489, NULL, 'A237', 'Mask(บริจาค)', 'box', '', 'กล่อง'),
(490, NULL, 'A238', 'Maskผ้า(บริจาค)', 'box', '', 'กล่อง'),
(491, NULL, 'A247', 'ข้อต่อ T-Piece(บริจาค)', 'อัน', '', 'อัน'),
(492, NULL, 'A248', 'Mask N-95(บริจาค)', 'pcs', '', 'ชิ้น'),
(493, NULL, 'A007', 'Mask disposable', 'box', '', 'box'),
(494, NULL, 'A008', 'เข็มเย็บแผล Cutting1/2 No.18', 'โหล', '', 'โหล'),
(495, NULL, 'A009', 'เข็มเย็บแผล Cutting1/2 No.40', 'โหล', '', 'โหล'),
(496, NULL, 'A010', 'เข็มเย็บแผล Cutting1/2 No.45', 'โหล', '', 'โหล'),
(497, NULL, 'A011', 'เข็มเย็บแผล Cutting3/8 No.21', 'โหล', '', 'โหล'),
(498, NULL, 'A012', 'เข็มเย็บแผล Cutting3/8 No.24', 'โหล', '', 'โหล'),
(499, NULL, 'A013', 'เข็มเย็บแผล Cutting3/8 No.28', 'โหล', '', 'โหล'),
(500, NULL, 'A014', 'เข็มเย็บแผล Cutting3/8 No.32', 'โหล', '', 'โหล'),
(501, NULL, 'A015', 'เข็มเย็บแผล Round 1/2 No.18', 'โหล', '', 'โหล'),
(502, NULL, 'A016', 'เข็มเย็บแผล Round 1/2 No.32', 'โหล', '', 'โหล'),
(503, NULL, 'A017', 'เข็มเย็บแผล Round 1/2 No.36', 'โหล', '', 'โหล'),
(504, NULL, 'A018', 'เข็มเย็บแผล Round 1/2 No.40', 'โหล', '', 'โหล'),
(505, NULL, 'A019', 'เข็มเย็บแผล Round 1/2 No.45', 'โหล', '', 'โหล'),
(506, NULL, 'A020', 'เข็มเย็บแผล Round 3/8 No.18', 'โหล', '', 'โหล'),
(507, NULL, 'A021', 'เข็มเย็บแผล Round 3/8 No.24', 'โหล', '', 'โหล'),
(508, NULL, 'A022', 'เข็มเย็บแผล Round 3/8 No.36', 'โหล', '', 'โหล'),
(509, NULL, 'A023', 'เข็มเย็บแผล Round 3/8 No.40', 'โหล', '', 'โหล'),
(510, NULL, 'A024', 'เข็มเย็บแผล Round 3/8 No.45', 'โหล', '', 'โหล'),
(511, NULL, 'A245', 'Nylon No.4/0', 'box', '', 'กล่อง'),
(512, NULL, 'A025', 'Nylon No.2/0', 'box', '', 'box'),
(513, NULL, 'A026', 'Nylon No.3/0', 'box', '', 'box'),
(514, NULL, 'A027', 'Nylon No.5/0', 'box', '', 'box'),
(515, NULL, 'A184', 'Disposable Needle No.25 11/2\"', 'box', '', 'กล่อง'),
(516, NULL, 'A028', 'Chromic Catgut No.2/0 26mm', 'box', '', 'box'),
(517, NULL, 'A029', 'Chromic Catgut No.2/0 37mm', 'box', '', 'box'),
(518, NULL, 'A030', 'Chromic Catgut No.3/0 26mm', 'box', '', 'box'),
(519, NULL, 'A031', 'Chromic Catgut No.4/0 20mm', 'box', '', 'box'),
(520, NULL, 'A181', 'เข็มเย็บแผล Cutting 1/2 No.28', 'โหล', '', 'โหล'),
(521, NULL, 'A182', 'Black Braided Silk 1/0', 'rol', '', 'ม้วน'),
(522, NULL, 'A254', 'Spore Test(บริจาค)', 'box', '', 'กล่อง'),
(523, NULL, 'A255', 'Black Braided Silk 3/0', 'rol', '', 'ม้วน'),
(524, NULL, 'A032', 'Silk Roll No.2/0', 'rol', '', 'rol'),
(525, NULL, 'A033', 'Silk Roll No.3/0', 'rol', '', 'rol'),
(526, NULL, 'A034', 'ใบมีดผ่าตัดแบบคาร์บอน No.11', 'box', '', 'box'),
(527, NULL, 'A035', 'ใบมีดผ่าตัดแบบคาร์บอน No.15', 'box', '', 'box'),
(528, NULL, 'A177', 'Diaposable Needle 27x1/2\"', 'box', '', 'box'),
(529, NULL, 'A192', 'เข็มเจาะไขสันหลัง NO.20', 'อัน', '', 'อัน'),
(530, NULL, 'A193', 'เข็มเจาะไขสันหลัง NO.22', 'อัน', '', 'อัน'),
(531, NULL, 'A199', 'Disposable needle No.18 1\" 1/2(บริจาค)', 'box', '', 'กล่อง'),
(532, NULL, 'A200', 'Disposable needle No.25 1\"(บริจาค)', 'box', '', 'กล่อง'),
(533, NULL, 'A036', 'Disposable Needle No.18 11/2\"', 'box', '', 'box'),
(534, NULL, 'A037', 'Disposable Needle No.22 1\"', 'box', '', 'box'),
(535, NULL, 'A038', 'Disposable Needle No.24 1\"', 'box', '', 'box'),
(536, NULL, 'A039', 'Disposable Needle No.24 11/2\"', 'box', '', 'box'),
(537, NULL, 'A040', 'Disposable Needle No.25 1\"', 'box', '', 'box'),
(538, NULL, 'A041', 'Disposable Needle No.26 1\"', 'box', '', 'box'),
(539, NULL, 'A042', 'สก๊าวเวน No.27', 'box', '', 'box'),
(540, NULL, 'A214', 'Medicut No.22(บริจาค)', 'pcs', '', 'ชิ้น'),
(541, NULL, 'A215', 'Medicut No.24(บริจาค)', 'pcs', '', 'ชิ้น'),
(542, NULL, 'A043', 'Medicut No.18', 'pcs', '', 'ชิ้น'),
(543, NULL, 'A044', 'Medicut No.20', 'pcs', '', 'ชิ้น'),
(544, NULL, 'A045', 'Medicut No.22', 'pcs', '', 'ชิ้น'),
(545, NULL, 'A046', 'Medicut No.24', 'pcs', '', 'ชิ้น'),
(546, NULL, 'A183', 'Syringe Ball No.6 (150 cc)', 'อัน', '', 'อัน'),
(547, NULL, 'A201', 'Disposable syringe 1 CC ติดเข็ม(บริจาค)', 'pcs', '', 'ชิ้น'),
(548, NULL, 'A202', 'Disposable syringe 3 CC(บริจาค)', 'pcs', '', 'ชิ้น'),
(549, NULL, 'A203', 'Disposable syringe 5 CC(บริจาค)', 'pcs', '', 'ชิ้น'),
(550, NULL, 'A204', 'Disposable syringe 10 CC(บริจาค)', 'pcs', '', 'ชิ้น'),
(551, NULL, 'A205', 'Disposable syringe 20 CC(บริจาค)', 'pcs', '', 'ชิ้น'),
(552, NULL, 'A274', 'Syringe แก้ว 50 CC(หัวกลาง)', 'อัน', '', 'อัน'),
(553, NULL, 'A047', 'Disposable Syringe 1 cc', 'pcs', '', 'ชิ้น'),
(554, NULL, 'A048', 'Disposable Syringe 3 cc', 'pcs', '', 'ชิ้น'),
(555, NULL, 'A049', 'Disposable Syringe 5 cc', 'pcs', '', 'ชิ้น'),
(556, NULL, 'A050', 'Disposable Syringe 10 cc', 'pcs', '', 'ชิ้น'),
(557, NULL, 'A051', 'Disposable Syringe 20 cc', 'pcs', '', 'ชิ้น'),
(558, NULL, 'A052', 'Disposable Syringe 50 cc', 'pcs', '', 'ชิ้น'),
(559, NULL, 'A053', 'Disposable Syringe 50 cc Irrigation', 'pcs', '', 'ชิ้น'),
(560, NULL, 'A207', '3-way stopcock(บริจาค)', 'box', '', 'กล่อง'),
(561, NULL, 'A208', 'Extension tube 18\"(บริจาค)', 'box', '', 'กล่อง'),
(562, NULL, 'A212', 'Injection Plug(บริจาค)', 'pcs', '', 'ชิ้น'),
(563, NULL, 'A218', 'Set IV Adult(บริจาค)', 'set', '', 'ชิ้น'),
(564, NULL, 'A219', 'Set IV Child(บริจาค)', 'pcs', '', 'ชิ้น'),
(565, NULL, 'A054', 'Injection plug', 'pcs', '', 'ชิ้น'),
(566, NULL, 'A055', '3-way stopcock', 'box', '', 'box'),
(567, NULL, 'A056', 'Extension tube 18\"', 'box', '', 'box'),
(568, NULL, 'A057', 'Set IV Adult', 'set', '', 'ชิ้น'),
(569, NULL, 'A058', 'Set IV child', 'set', '', 'ชิ้น'),
(570, NULL, 'A059', 'Set ให้เลือด', 'set', '', 'set'),
(571, NULL, 'A271', 'Guide endo #S', 'pcs', '', 'pcs'),
(572, NULL, 'A272', 'Guide endo #M', 'pcs', '', 'pcs'),
(573, NULL, 'A273', 'Guide endo #L', 'pcs', '', 'pcs'),
(574, NULL, 'A060', 'ET.Tube No.2.0', 'pcs', '', 'pcs'),
(575, NULL, 'A061', 'ET.Tube No.2.5', 'pcs', '', 'pcs'),
(576, NULL, 'A062', 'ET.Tube No.3.0', 'pcs', '', 'pcs'),
(577, NULL, 'A063', 'ET.Tube No.3.5', 'pcs', '', 'pcs'),
(578, NULL, 'A064', 'ET.Tube No.4.0', 'pcs', '', 'pcs'),
(579, NULL, 'A065', 'ET.Tube No.4.5', 'pcs', '', 'pcs'),
(580, NULL, 'A066', 'ET.Tube No.5.0', 'pcs', '', 'pcs'),
(581, NULL, 'A067', 'ET.Tube No.5.5', 'pcs', '', 'pcs'),
(582, NULL, 'A068', 'ET.Tube No.6.0', 'pcs', '', 'pcs'),
(583, NULL, 'A069', 'ET.Tube No.6.5', 'pcs', '', 'pcs'),
(584, NULL, 'A070', 'ET.Tube No.7.0', 'pcs', '', 'pcs'),
(585, NULL, 'A071', 'ET.Tube No.7.5', 'pcs', '', 'pcs'),
(586, NULL, 'A072', 'ET.Tube No.8.0', 'pcs', '', 'pcs'),
(587, NULL, 'A222', 'Urine bag เทล่าง(บริจาค)', 'pcs', '', 'ชิ้น'),
(588, NULL, 'A073', 'Urine bag เทล่าง', 'pcs', '', 'ชิ้น'),
(589, NULL, 'A074', 'Urine collector เด็ก', 'box', '', 'box'),
(590, NULL, 'A228', 'Foley\'s catheter No.10(บริจาค)', 'pcs', '', 'ชิ้น'),
(591, NULL, 'A075', 'Foley\'s catheter No.8', 'pcs', '', 'pcs'),
(592, NULL, 'A076', 'Foley\'s catheter No.10', 'pcs', '', 'pcs'),
(593, NULL, 'A077', 'Foley\'s catheter No.12', 'pcs', '', 'pcs'),
(594, NULL, 'A078', 'Foley\'s catheter No.14', 'pcs', '', 'pcs'),
(595, NULL, 'A079', 'Foley\'s catheter No.16', 'pcs', '', 'pcs'),
(596, NULL, 'A080', 'Foley\'s catheter No.18', 'pcs', '', 'pcs'),
(597, NULL, 'A081', 'Foley\'s catheter 3-way No.18', 'pcs', '', 'pcs'),
(598, NULL, 'A234', 'NG. Tube No.14(บริจาค)', 'pcs', '', 'ชิ้น'),
(599, NULL, 'A082', 'NG. Tube No.8', 'pcs', '', 'pcs'),
(600, NULL, 'A083', 'NG. Tube No.10', 'pcs', '', 'pcs'),
(601, NULL, 'A084', 'NG. Tube No.12', 'pcs', '', 'pcs'),
(602, NULL, 'A085', 'NG. Tube No.14', 'pcs', '', 'pcs'),
(603, NULL, 'A086', 'NG. Tube No.16', 'pcs', '', 'pcs'),
(604, NULL, 'A087', 'NG. Tube No.18', 'pcs', '', 'pcs'),
(605, NULL, 'A229', 'Suction Tube No.12(บริจาค)', 'pcs', '', 'ชิ้น'),
(606, NULL, 'A230', 'Suction Tube No.14(บริจาค)', 'pcs', '', 'ชิ้น'),
(607, NULL, 'A088', 'Suction Tube No.6', 'pcs', '', 'pcs'),
(608, NULL, 'A089', 'Suction Tube No.8', 'pcs', '', 'pcs'),
(609, NULL, 'A090', 'Suction Tube No.10', 'pcs', '', 'pcs'),
(610, NULL, 'A091', 'Suction Tube No.12', 'pcs', '', 'pcs'),
(611, NULL, 'A092', 'Suction Tube No.14', 'pcs', '', 'pcs'),
(612, NULL, 'A093', 'Suction Tube No.16', 'pcs', '', 'pcs'),
(613, NULL, 'A209', 'Fizomo 10x10cm(บริจาค)', 'box', '', 'กล่อง'),
(614, NULL, 'A259', 'micropore 1\"', 'box', '', 'กล่อง'),
(615, NULL, 'A094', 'Transpore 1/2\"', 'pcs', '', 'ชิ้น'),
(616, NULL, 'A095', 'Transpore 1\"', 'pcs', '', 'ชิ้น'),
(617, NULL, 'A096', 'micropore 1/2\"', 'box', '', 'box'),
(618, NULL, 'A097', 'Plasterผ้า', 'pcs', '', 'ม้วน'),
(619, NULL, 'A098', 'Fizomo 10x10cm', 'box', '', 'box'),
(620, NULL, 'A210', 'Gauze bandage 3\"(บริจาค)', 'pcs', '', 'ชิ้น'),
(621, NULL, 'A211', 'Conform bandage 2\"(บริจาค)', 'pcs', '', 'ชิ้น'),
(622, NULL, 'A227', 'Gauze pad 3x3\"(บริจาค)', 'ห่อ', '', 'ห่อ'),
(623, NULL, 'A257', 'Vaseline Gauze 3\"x3\"', 'box', '', 'กล่อง'),
(624, NULL, 'A099', 'Gauze bandage 2\"x6yds', 'pcs', '', 'ชิ้น'),
(625, NULL, 'A100', 'Gauze bandage 3\"x6yds', 'pcs', '', 'ชิ้น'),
(626, NULL, 'A101', 'Gauze bandage 4\"x6yds', 'pcs', '', 'ชิ้น'),
(627, NULL, 'A102', 'Gauze bandage 6\"x6yds', 'pcs', '', 'ชิ้น'),
(628, NULL, 'A103', 'Gauze pad 2x2\"', 'ห่อ', '', 'ห่อ'),
(629, NULL, 'A104', 'Gauze pad 3x3\"', 'ห่อ', '', 'ห่อ'),
(630, NULL, 'A105', 'Gauze 36\"x100 หลา ตัด 3 ท่อน', 'rol', '', 'rol'),
(631, NULL, 'A106', 'เฝือก 3\"', 'box', '', 'box'),
(632, NULL, 'A107', 'เฝือก 4\"', 'box', '', 'box'),
(633, NULL, 'A108', 'เฝือก 6\"', 'pcs', '', 'pcs'),
(634, NULL, 'A109', 'สำลีรองเฝือก 3\"x4yds.', 'โหล', '', 'โหล'),
(635, NULL, 'A110', 'สำลีรองเฝือก 4\"x4yds.', 'โหล', '', 'โหล'),
(636, NULL, 'A111', 'สำลีรองเฝือก 6\"x4yds.', 'โหล', '', 'โหล'),
(637, NULL, 'A112', 'Pro splint 4\"', 'rol', '', 'rol'),
(638, NULL, 'A113', 'Pro splint 6\"', 'rol', '', 'rol'),
(639, NULL, 'A114', 'Elastic bandage 3\"', 'pcs', '', 'ชิ้น'),
(640, NULL, 'A115', 'Elastic bandage 4\"', 'pcs', '', 'ชิ้น'),
(641, NULL, 'A116', 'Elastic bandage 6\"', 'pcs', '', 'ชิ้น'),
(642, NULL, 'A117', 'ตาข่ายสวมนิ้วผู้ใหย่ Fixnet No.0.5', 'box', '', 'box'),
(643, NULL, 'A176', 'Soft collar size L', 'pcs', '', 'pcs'),
(644, NULL, 'A118', 'Soft collar size S', 'pcs', '', 'pcs'),
(645, NULL, 'A119', 'Soft collar size M', 'pcs', '', 'pcs'),
(646, NULL, 'A120', 'Hard collar size S', 'pcs', '', 'pcs'),
(647, NULL, 'A121', 'Hard collar size M', 'pcs', '', 'pcs'),
(648, NULL, 'A122', 'Hard collar size L', 'pcs', '', 'pcs'),
(649, NULL, 'A123', 'Arm Sling No.S', 'pcs', '', 'pcs'),
(650, NULL, 'A124', 'Arm Sling No.M', 'pcs', '', 'pcs'),
(651, NULL, 'A125', 'Arm Sling No.L', 'pcs', '', 'pcs'),
(652, NULL, 'A126', 'Arm Sling No.XL', 'pcs', '', 'pcs'),
(653, NULL, 'A127', 'Wrist support No.M', 'pcs', '', 'pcs'),
(654, NULL, 'A128', 'Wrist support No.L', 'pcs', '', 'pcs'),
(655, NULL, 'A258', 'LS Support No.XXL', 'อัน', '', 'อัน'),
(656, NULL, 'A129', 'LS.support No.S', 'pcs', '', 'pcs'),
(657, NULL, 'A130', 'LS.support No.M', 'pcs', '', 'pcs'),
(658, NULL, 'A131', 'LS.support No.L', 'pcs', '', 'pcs'),
(659, NULL, 'A132', 'LS.support No.XL', 'pcs', '', 'pcs'),
(660, NULL, 'A133', 'ชุดดึงไหปลาร้า No.L', 'pcs', '', 'pcs'),
(661, NULL, 'A134', 'ชุดดึงไหปลาร้า No.XL', 'pcs', '', 'pcs'),
(662, NULL, 'A135', 'Air way No.0 60mm สีดำ', 'pcs', '', 'pcs'),
(663, NULL, 'A136', 'Air way No.1 70mm สีขาว', 'pcs', '', 'pcs'),
(664, NULL, 'A137', 'Air way No.2 80mm สีเขียว', 'pcs', '', 'pcs'),
(665, NULL, 'A138', 'Air way No.3 90mm สีเหลือง', 'pcs', '', 'pcs'),
(666, NULL, 'A139', 'Air way No.4 100mm สีแดง', 'pcs', '', 'pcs'),
(667, NULL, 'A140', 'Syringe ball No.1', 'box', '', 'box'),
(668, NULL, 'A141', 'Autoclave tepe 3/4', 'rol', '', 'rol'),
(669, NULL, 'A142', 'Autoclave tepe 1/2', 'pcs', '', 'pcs'),
(670, NULL, 'A194', 'ใบมีดผ่าตัดคาร์บอน เบอร์ 12', 'box', '', 'กล่อง'),
(671, NULL, 'A195', 'ซอง Sterile 6\" x 200 m', 'rol', '', 'ม้วน'),
(672, NULL, 'A256', 'ซอง Sterile 12\" ขอบเรียบ', 'rol', '', 'ม้วน'),
(673, NULL, 'A270', 'ซอง Sterile 4\" ขอบเรียบ', 'rol', '', 'roll'),
(674, NULL, 'A143', 'ซอง Sterile 3\" ขอบเรียบ', 'rol', '', 'rol'),
(675, NULL, 'A144', 'ซอง Sterile 10\" ขอบเรียบ', 'pcs', '', 'pcs'),
(676, NULL, 'A226', 'สำลีก้อนเล็ก 0.35gm(บริจาค)', 'ถุง', '', 'ถุง'),
(677, NULL, 'A239', 'สำลีม้วน(บริจาค)', 'rol', '', 'ม้วน'),
(678, NULL, 'A145', 'สำลีก้อนเล็ก 0.35gm', 'ถุง', '', 'ถุง'),
(679, NULL, 'A146', 'สำลีก้อนใหญ่ 1.4gm', 'ถุง', '', 'ถุง'),
(680, NULL, 'A147', 'สำลีม้วน', 'rol', '', 'rol'),
(681, NULL, 'A148', 'Attest', 'box', '', 'box'),
(682, NULL, 'A149', 'Bowie Dick test pack', 'box', '', 'box'),
(683, NULL, 'A216', 'Oxygen canular Child(บริจาค)', 'อัน', '', 'อัน'),
(684, NULL, 'A217', 'Oxygen canular Adult(บริจาค)', 'อัน', '', 'อัน'),
(685, NULL, 'A150', 'Oxygen canular เด็ก size M', 'set', '', 'ชิ้น'),
(686, NULL, 'A151', 'Oxygen canular adult size L', 'set', '', 'ชิ้น'),
(687, NULL, 'A232', 'oxygen Mask c bag ผู้ใหญ่(บริจาค)', 'set', '', 'set'),
(688, NULL, 'A233', 'oxygen Mask c bag เด็ก(บริจาค)', 'set', '', 'set'),
(689, NULL, 'A152', 'oxygen Mask c bag เด็ก', 'set', '', 'set'),
(690, NULL, 'A153', 'oxygen Mask c bag ผู้ใหญ่', 'set', '', 'set'),
(691, NULL, 'A220', 'Set พ่นยา เด็ก(บริจาค)', 'set', '', 'ชุด'),
(692, NULL, 'A221', 'Set พ่นยา ผู้ใหญ่(บริจาค)', 'set', '', 'ชุด'),
(693, NULL, 'A154', 'Set พ่นยา เด็ก', 'set', '', 'set'),
(694, NULL, 'A155', 'Set พ่นยา ผู้ใหญ่', 'set', '', 'set'),
(695, NULL, 'A156', 'oxygen tubing', 'set', '', 'set'),
(696, NULL, 'A225', 'ไม้พันสำลี(บริจาค)', 'ถุง', '', 'ถุง'),
(697, NULL, 'A157', 'ไม้ pap smear แบบ C', 'box', '', 'box'),
(698, NULL, 'A158', 'ไม้กดลิ้น', 'box', '', 'box'),
(699, NULL, 'A159', 'ไม้พันสำลี', 'ห่อ', '', 'ห่อ'),
(700, NULL, 'A160', 'K-Y jelly', 'pcs', '', 'หลอด'),
(701, NULL, 'A161', 'Ultra sound gel', 'gal', '', 'gal'),
(702, NULL, 'A235', 'LATEX TUBE #204', 'rol', '', 'ม้วน'),
(703, NULL, 'A236', 'LATEX TUBE # 204', 'rol', '', 'ม้วน'),
(704, NULL, 'A244', 'Vaseline Gauze 4x4\" x8ply', 'box', '', 'กล่อง'),
(705, NULL, 'A265', 'LATEX TUBE #200 DURA', 'rol', '', 'rol'),
(706, NULL, 'A266', 'DIWA Type 5 Indicator Strip', 'แพค', '', 'แพค'),
(707, NULL, 'A267', 'Tergezyme', 'แกล', '', 'แกลลอน'),
(708, NULL, 'A268', 'FIIN-BT220 หลอดทดสอบทางชีวภาพ ไอน้ำ อ่านผล 3 hr', 'box', '', 'กล่อง'),
(709, NULL, 'A269', 'FIIN-IT26SBL ตัวชี้วัดทางเคมี ไอน้ำ Type 5', 'ซอง', '', 'ซอง'),
(710, NULL, 'A278', 'Shoe cover(บริจาค)', 'คู่', '', 'คู่'),
(711, NULL, 'A162', 'Bactigras 10x10cm', 'box', '', 'box'),
(712, NULL, 'A163', 'Eye pad size M', 'ห่อ', '', 'ห่อ'),
(713, NULL, 'A164', 'Finger tip', 'pcs', '', 'pcs'),
(714, NULL, 'A165', 'Red dot ผู้ใหญ่', 'ซอง', '', 'ซอง'),
(715, NULL, 'A190', 'ป้ายข้อมือเด็ก', 'box', '', 'กล่อง'),
(716, NULL, 'A191', 'ป้ายข้อมือผู้ใหญ่', 'box', '', 'กล่อง'),
(717, NULL, 'A196', 'Tegaderm 5x7 cm.', 'box', '', 'กล่อง'),
(718, NULL, 'A240', 'GAS supply Line-210 cm(บริจาค)', 'อัน', '', 'อัน'),
(719, NULL, 'A241', 'Resuscitation kit-No Mask-singleuse(บริเจาค)', 'อัน', '', 'อัน'),
(720, NULL, 'A242', 'FIIN-IT26SBL ตัวทดสอบหม้อนึ่ง(บริจาค)', 'อัน', '', 'อัน'),
(721, NULL, 'A243', 'Multifunction Adult Radiolucent Electr Pad(บริจาค)', 'pcs', '', 'ชิ้น'),
(722, NULL, 'A246', 'เครื่องวัดอุณหภูมิระบบตัวเลข รักแร้ 30 วิ(บริจาค)', 'อัน', '', 'อัน'),
(723, NULL, 'A249', 'ชุดหมี(บริจาค)', 'ชุด', '', 'ชุด'),
(724, NULL, 'A250', 'แว่นตา(บริจาค)', 'pcs', '', 'ชิ้น'),
(725, NULL, 'A251', 'กาวน์กันน้ำ(บริจาค)', 'ชุด', '', 'ชุด'),
(726, NULL, 'A252', 'ขวด ICD(พลาสติก)(บริจาค)', 'ขวด', '', 'ขวด'),
(727, NULL, 'A253', 'สาย Neo Puff(บริจาค)', 'ชุด', '', 'ชุด'),
(728, NULL, 'A260', 'ชุดทำแผลสเตอร์ไรด์', 'box', '', 'กล่อง'),
(729, NULL, 'A261', 'สำลีก้อนชุบแอลกอฮอล์', 'box', '', 'กล่อง'),
(730, NULL, 'A262', 'Plastic กันเปื้อนสีฟ้า ใช้แล้วทิ้ง', 'pcs', '', 'ชิ้น'),
(731, NULL, 'A275', 'Isolation gown L(บริจาค)', 'ชุด', '', 'ชุด'),
(732, NULL, 'A276', 'CPE GOWN(บริจาค)', 'ชุด', '', 'ชุด'),
(733, NULL, 'A277', 'ถุงมือล้วงรก #L', 'คู่', '', 'คู่'),
(734, NULL, 'A166', 'Bed pan', 'pcs', '', 'pcs'),
(735, NULL, 'A167', 'แก้วยาน้ำ', 'box', '', 'box'),
(736, NULL, 'A168', 'แป้งคลุกถุงมือ', 'ถุง', '', 'ถุง'),
(737, NULL, 'A169', 'Urinol', 'pcs', '', 'pcs'),
(738, NULL, 'A170', 'ถุงรองรับเลือด', 'ใบ', '', 'ใบ'),
(739, NULL, 'A185', 'Chromic Catgut No.3/0 24mm', 'box', '', 'โหล'),
(740, NULL, 'A186', 'กระดาษ EKG 210x140x200sh', 'พับ', '', 'พับ'),
(741, NULL, 'A263', 'EKG 210x295x150', 'rim', '', 'rim'),
(742, NULL, 'A264', 'EKG 210x140x200', 'rim', '', 'rim'),
(743, NULL, 'A171', 'EKG paper', 'rim', '', 'rim'),
(744, NULL, 'A172', 'Ultrasound paper', 'box', '', 'box'),
(745, NULL, 'A173', 'Umbilical catheter', 'pcs', '', 'pcs'),
(746, NULL, 'A197', 'Umbilical catheter No.3.5', 'pcs', '', 'ชิ้น'),
(747, NULL, 'A198', 'Umbilical catheter No.5', 'pcs', '', 'ชิ้น'),
(748, NULL, 'A174', 'DHC Scan class5', 'box', '', 'box'),
(749, NULL, 'A175', 'NST Paper', 'พับ', '', 'พับ'),
(750, NULL, 'A280', 'NST paper(110x100x150sh)', 'พับ', '', 'พับ'),
(751, NULL, 'A178', 'Thoracic catheter No.32', 'pcs', '', 'pcs'),
(752, NULL, 'A187', 'ขวดแก้วปากกว้างสีชา จุกแก้ว ขนาด 125 มล.', 'ขวด', '', 'ขวด'),
(753, NULL, 'A188', 'Thoracic catheter No.24', 'อัน', '', 'อัน'),
(754, NULL, 'A189', 'Thoracic catheter No.28', 'อัน', '', 'อัน'),
(755, NULL, 'A179', 'ถุงมือล้วงรก #S', 'คู่', '', 'คู่'),
(756, NULL, 'A180', 'ถุงมือล้วงรก #M', 'คู่', '', 'คู่');

-- --------------------------------------------------------

--
-- Table structure for table `medical_department`
--

CREATE TABLE `medical_department` (
  `dept_id` int(3) NOT NULL,
  `dept_code` varchar(10) DEFAULT NULL,
  `dept_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_department`
--

INSERT INTO `medical_department` (`dept_id`, `dept_code`, `dept_name`) VALUES
(1, 'ADM01', 'งานบริหาร'),
(2, 'DEN01', 'ฝ่ายทันตกรรม'),
(3, 'DIS01', 'ห้องจ่ายยา'),
(4, 'ERR01', 'ตัดจ่ายจากความผิดพลาด'),
(5, 'HUA01', 'สอ.ห้วยบง'),
(6, 'HUA02', 'สสช.ห้วยปู'),
(7, 'KUN01', 'สสช. ขุนแม่รวม'),
(8, 'LAB01', 'พยาธิวิทยา'),
(9, 'LAO01', 'สอ.แม่ละอุป'),
(10, 'LBR01', 'ห้องคลอด'),
(11, 'MAD01', 'สอ.แม่แดด'),
(12, 'OPD01', 'งานผู้ป่วยนอก'),
(13, 'OPD04', 'กายภาพบำบัด'),
(14, 'PUS01', 'กลุ่มงานเวชกรรมสังคม'),
(15, 'SUP01', 'หน่วยจ่ายกลาง'),
(16, 'TAL01', 'สอ.แม่ตะละ'),
(17, 'TMD01', 'แพทย์แผนไทย'),
(18, 'WAR01', 'ตึกผู้ป่วยใน'),
(19, 'XRA01', 'รังสี'),
(20, 'TES01', 'ยอดยกมา');

-- --------------------------------------------------------

--
-- Table structure for table `medical_order`
--

CREATE TABLE `medical_order` (
  `order_id` int(5) NOT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_dept_id` varchar(10) DEFAULT NULL,
  `order_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_order_list`
--

CREATE TABLE `medical_order_list` (
  `list_id` int(11) NOT NULL,
  `list_order_id` int(5) DEFAULT NULL,
  `list_order_no` varchar(50) DEFAULT NULL,
  `list_store_id` int(5) DEFAULT NULL,
  `list_amount` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_purchase`
--

CREATE TABLE `medical_purchase` (
  `pur_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `pur_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_purchase`
--

INSERT INTO `medical_purchase` (`pur_id`, `pur_name`) VALUES
(01, 'ไม่ระบุ'),
(02, 'วิธีตกลงราคา'),
(03, 'วิธีสอบราคา'),
(04, 'วิธีประกวดราคา'),
(05, 'วิธีพิเศษ'),
(06, 'วิธีกรณีพิเศษ'),
(07, 'e-auction'),
(08, 'ยอดยกมา');

-- --------------------------------------------------------

--
-- Table structure for table `medical_store`
--

CREATE TABLE `medical_store` (
  `store_id` int(5) NOT NULL,
  `bill_id` int(5) DEFAULT NULL,
  `store_med_code` varchar(50) DEFAULT NULL,
  `store_amount` varchar(255) DEFAULT NULL,
  `store_price` decimal(10,2) DEFAULT NULL,
  `store_total` decimal(10,2) DEFAULT NULL,
  `store_expire` date DEFAULT NULL,
  `store_lot_no` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_store`
--

INSERT INTO `medical_store` (`store_id`, `bill_id`, `store_med_code`, `store_amount`, `store_price`, `store_total`, `store_expire`, `store_lot_no`, `create_at`) VALUES
(1, 1, 'A001', '331', '17.00', '5627.00', '2024-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(2, 1, 'A003', '90', '18.00', '1620.00', '2023-12-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(3, 1, 'A005', '219', '165.00', '36135.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(4, 1, 'A013', '1', '210.00', '210.00', '2027-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(5, 1, 'A014', '1', '210.00', '210.00', '2027-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(6, 1, 'A015', '1', '210.00', '210.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(7, 1, 'A021', '1', '210.00', '210.00', '2021-08-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(8, 1, 'A022', '1', '210.00', '210.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(9, 1, 'A023', '1', '210.00', '210.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(10, 1, 'A024', '1', '210.00', '210.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(11, 1, 'A025', '2', '440.00', '880.00', '2026-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(12, 1, 'A026', '1', '440.00', '440.00', '2025-08-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(13, 1, 'A027', '3', '440.00', '1320.00', '2024-12-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(14, 1, 'A028', '2', '530.00', '1060.00', '2026-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(15, 1, 'A029', '2', '530.00', '1060.00', '2025-11-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(16, 1, 'A031', '1', '530.00', '530.00', '2026-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(17, 1, 'A034', '1', '320.00', '320.00', '2026-02-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(18, 1, 'A035', '1', '320.00', '320.00', '2024-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(19, 1, 'A037', '26', '43.50', '1131.00', '2026-07-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(20, 1, 'A038', '11', '43.50', '478.50', '2025-09-30', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(21, 1, 'A039', '25', '43.50', '1087.50', '2026-01-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(22, 1, 'A040', '50', '43.50', '2175.00', '2026-07-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(23, 1, 'A042', '1', '350.00', '350.00', '2024-02-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(24, 1, 'A047', '9400', '1.91', '17980.00', '2025-09-19', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(25, 1, 'A048', '6300', '1.06', '6665.40', '2026-06-30', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(26, 1, 'A049', '2800', '1.25', '3500.00', '2026-03-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(27, 1, 'A050', '1700', '2.10', '3570.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(28, 1, 'A051', '200', '3.56', '712.00', '2025-08-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(29, 1, 'A052', '120', '9.57', '1148.00', '2026-06-30', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(30, 1, 'A054', '960', '4.00', '3840.00', '2023-12-08', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(31, 1, 'A055', '2', '340.00', '680.00', '2026-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(32, 1, 'A057', '400', '9.63', '3852.00', '2025-11-30', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(33, 1, 'A058', '155', '14.70', '2278.50', '2024-09-30', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(34, 1, 'A059', '9', '19.00', '171.00', '2023-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(35, 1, 'A073', '30', '10.50', '315.00', '2026-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(36, 1, 'A074', '2', '325.00', '650.00', '2024-10-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(37, 1, 'A075', '8', '25.00', '200.00', '2024-11-07', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(38, 1, 'A076', '20', '25.00', '500.00', '2024-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(39, 1, 'A077', '10', '14.50', '145.00', '2024-11-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(40, 1, 'A078', '20', '14.50', '290.00', '2026-02-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(41, 1, 'A079', '20', '14.50', '290.00', '2025-10-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(42, 1, 'A081', '6', '55.00', '330.00', '2021-10-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(43, 1, 'A082', '11', '7.00', '77.00', '2026-01-25', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(44, 1, 'A083', '9', '6.40', '57.60', '2024-03-04', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(45, 1, 'A084', '12', '7.00', '84.00', '2023-12-02', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(46, 1, 'A085', '9', '7.00', '63.00', '2025-04-27', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(47, 1, 'A086', '4', '7.00', '28.00', '2026-07-22', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(48, 1, 'A087', '3', '7.00', '21.00', '2126-04-26', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(49, 1, 'A089', '70', '2.65', '185.50', '2026-08-16', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(50, 1, 'A091', '9', '2.80', '25.20', '2021-11-09', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(51, 1, 'A092', '30', '2.65', '79.50', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(52, 1, 'A093', '6', '2.65', '15.90', '2025-10-08', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(53, 1, 'A094', '108', '9.58', '1035.00', '2026-04-27', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(54, 1, 'A098', '4', '160.00', '640.00', '2026-07-20', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(55, 1, 'A100', '96', '4.67', '448.00', '2024-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(56, 1, 'A105', '3', '650.00', '1950.00', '2023-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(57, 1, 'A106', '2', '630.00', '1260.00', '2025-11-10', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(58, 1, 'A107', '2', '860.00', '1720.00', '2026-01-14', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(59, 1, 'A109', '4', '300.00', '1200.00', '2025-08-24', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(60, 1, 'A110', '3', '370.00', '1110.00', '2025-08-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(61, 1, 'A111', '1', '540.00', '540.00', '2025-08-24', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(62, 1, 'A114', '48', '13.75', '660.00', '2026-01-04', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(63, 1, 'A115', '48', '14.58', '700.00', '2026-01-04', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(64, 1, 'A116', '48', '24.17', '1160.00', '2025-04-24', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(65, 1, 'A118', '6', '140.00', '840.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(66, 1, 'A119', '5', '140.00', '700.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(67, 1, 'A123', '11', '24.80', '272.80', '2025-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(68, 1, 'A124', '9', '24.80', '223.20', '2023-09-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(69, 1, 'A125', '6', '24.80', '148.80', '2023-09-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(70, 1, 'A129', '2', '420.00', '840.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(71, 1, 'A134', '4', '550.00', '2200.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(72, 1, 'A135', '5', '15.00', '75.00', '2024-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(73, 1, 'A136', '1', '15.00', '15.00', '2023-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(74, 1, 'A137', '10', '15.00', '150.00', '2024-11-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(75, 1, 'A138', '2', '15.00', '30.00', '2024-11-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(76, 1, 'A139', '1', '15.00', '15.00', '2024-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(77, 1, 'A141', '30', '78.00', '2340.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(78, 1, 'A143', '1', '350.00', '350.00', '2024-11-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(79, 1, 'A145', '25', '120.00', '3000.00', '2025-05-20', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(80, 1, 'A146', '14', '120.00', '1680.00', '2024-06-10', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(81, 1, 'A151', '18', '10.50', '189.00', '2026-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(82, 1, 'A152', '10', '29.00', '290.00', '2024-02-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(83, 1, 'A153', '23', '27.00', '621.00', '2025-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(84, 1, 'A154', '9', '35.00', '315.00', '2024-09-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(85, 1, 'A155', '10', '31.50', '315.00', '2025-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(86, 1, 'A158', '7', '75.00', '525.00', '2025-05-10', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(87, 1, 'A159', '68', '14.50', '986.00', '2025-11-14', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(88, 1, 'A160', '3', '170.00', '510.00', '2023-09-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(89, 1, 'A161', '1', '470.00', '470.00', '2024-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(90, 1, 'A163', '1', '150.00', '150.00', '2023-07-03', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(91, 1, 'A164', '34', '25.00', '850.00', '2025-01-13', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(92, 1, 'A165', '1', '760.00', '760.00', '2023-02-02', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(93, 1, 'A176', '10', '140.00', '1400.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(94, 1, 'A178', '5', '180.00', '900.00', '2024-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(95, 1, 'A179', '1', '240.00', '240.00', '2024-01-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(96, 1, 'A180', '1', '240.00', '240.00', '2024-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(97, 1, 'A182', '1', '248.00', '248.00', '2025-01-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(98, 1, 'A183', '5', '90.00', '450.00', '2026-03-03', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(99, 1, 'A184', '22', '44.50', '979.00', '2024-08-31', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(100, 1, 'A188', '2', '180.00', '360.00', '2023-04-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(101, 1, 'A189', '5', '180.00', '900.00', '2024-08-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(102, 1, 'A197', '5', '95.00', '475.00', '2025-11-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(103, 1, 'A217', '200', '9.00', '1800.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(104, 1, 'A220', '100', '31.50', '3150.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(105, 1, 'A221', '100', '31.50', '3150.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(106, 1, 'A223', '40', '170.00', '6800.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(107, 1, 'A229', '810', '0.00', '0.01', '2022-06-19', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(108, 1, 'A230', '104', '0.00', '0.00', '2021-06-29', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(109, 1, 'A232', '50', '27.00', '1350.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(110, 1, 'A233', '36', '22.50', '810.00', '2023-05-15', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(111, 1, 'A234', '12', '0.00', '0.00', '2023-03-16', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(112, 1, 'A237', '256', '68.58', '17556.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(113, 1, 'A245', '3', '440.00', '1320.00', '2025-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(114, 1, 'A260', '4', '190.00', '760.00', '2023-03-29', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(115, 1, 'A261', '1', '800.00', '800.00', '2022-07-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(116, 1, 'A270', '1', '449.00', '449.00', '2025-07-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(117, 1, 'A271', '5', '180.00', '900.00', '2024-03-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(118, 1, 'A272', '2', '180.00', '360.00', '2023-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(119, 1, 'A273', '1', '180.00', '180.00', '2023-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(120, 1, 'A277', '1', '240.00', '240.00', '2023-06-01', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(121, 1, 'A279', '40', '151.00', '6040.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(122, 1, 'A282', '20', '151.00', '3020.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08'),
(123, 1, 'A283', '20', '151.00', '3020.00', '0000-00-00', 'ยอดยกมา 64', '2021-11-12 03:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `medical_type`
--

CREATE TABLE `medical_type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_type`
--

INSERT INTO `medical_type` (`type_id`, `type_name`, `type_report`) VALUES
(001, 'เวชภัณฑ์มิใช่ยา (บริจาค)', '02'),
(002, 'เวชภัณฑ์มิใช่ยา', '02'),
(003, 'รายการทดสอบ', '01');

-- --------------------------------------------------------

--
-- Table structure for table `medical_unit`
--

CREATE TABLE `medical_unit` (
  `unit_id` int(3) NOT NULL,
  `unit_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_unit`
--

INSERT INTO `medical_unit` (`unit_id`, `unit_name`) VALUES
(1, 'กล่อง'),
(2, 'ชิ้น'),
(3, 'ขวด'),
(4, 'แพ็ค');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(5) NOT NULL,
  `status_color` text DEFAULT NULL,
  `status_icon` text DEFAULT NULL,
  `status_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`status_id`, `status_color`, `status_icon`, `status_text`) VALUES
(1, 'danger', 'spinner fa-spin', 'รอดำเนินการ'),
(2, 'success', 'check-circle', 'ดำเนินการแล้ว'),
(3, 'warning', 'times-circle', 'ยกเลิกรายการ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_bill`
--
ALTER TABLE `medical_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `medical_budget`
--
ALTER TABLE `medical_budget`
  ADD PRIMARY KEY (`bud_id`);

--
-- Indexes for table `medical_company`
--
ALTER TABLE `medical_company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `medical_data`
--
ALTER TABLE `medical_data`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `medical_department`
--
ALTER TABLE `medical_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `medical_order`
--
ALTER TABLE `medical_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `medical_order_list`
--
ALTER TABLE `medical_order_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `medical_purchase`
--
ALTER TABLE `medical_purchase`
  ADD PRIMARY KEY (`pur_id`);

--
-- Indexes for table `medical_store`
--
ALTER TABLE `medical_store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `medical_type`
--
ALTER TABLE `medical_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `medical_unit`
--
ALTER TABLE `medical_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_bill`
--
ALTER TABLE `medical_bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_budget`
--
ALTER TABLE `medical_budget`
  MODIFY `bud_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_company`
--
ALTER TABLE `medical_company`
  MODIFY `comp_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `medical_data`
--
ALTER TABLE `medical_data`
  MODIFY `med_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=757;

--
-- AUTO_INCREMENT for table `medical_department`
--
ALTER TABLE `medical_department`
  MODIFY `dept_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medical_order`
--
ALTER TABLE `medical_order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_order_list`
--
ALTER TABLE `medical_order_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_purchase`
--
ALTER TABLE `medical_purchase`
  MODIFY `pur_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_store`
--
ALTER TABLE `medical_store`
  MODIFY `store_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `medical_type`
--
ALTER TABLE `medical_type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_unit`
--
ALTER TABLE `medical_unit`
  MODIFY `unit_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `status_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
