<?php
require 'database.php';

$conn = new Database();

$create_sql = "
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';


--
-- Table structure for table `kioskuser`
--

CREATE TABLE `kioskuser` (
  `userNo` int(11) NOT NULL,
  `studid` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kioskuser`
--

INSERT INTO `kioskuser` (`userNo`, `studid`, `password`) VALUES
(1, '2014-0069-G', '55');

-- --------------------------------------------------------

--
-- Table structure for table `studidsubjid`
--

CREATE TABLE `studidsubjid` (
  `studid` varchar(11) NOT NULL,
  `subjid` int(11) NOT NULL,
  `subjfgrade` decimal(10,0) NOT NULL,
  `subjcomp` varchar(10) NOT NULL,
  `creditearned` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studpersonalinfotbl`
--

CREATE TABLE `studpersonalinfotbl` (
  `studID` varchar(11) NOT NULL,
  `studLname` varchar(50) NOT NULL,
  `studFname` varchar(50) NOT NULL,
  `studMname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studpersonalinfotbl`
--

INSERT INTO `studpersonalinfotbl` (`studID`, `studLname`, `studFname`, `studMname`) VALUES
('2014-0069-G', 'NORDOG', 'Aidazen', 'Allertse');

-- --------------------------------------------------------

--
-- Table structure for table `subjcodtbl`
--

CREATE TABLE `subjcodtbl` (
  `subjcod` varchar(15) NOT NULL,
  `subjname` varchar(25) NOT NULL,
  `subjtitle` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjectsoffered`
--

CREATE TABLE `subjectsoffered` (
  `syear` varchar(9) NOT NULL,
  `semno` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `subjectcode` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudappraisal`
--

CREATE TABLE `tblstudappraisal` (
  `studid` varchar(11) NOT NULL,
  `sy` varchar(9) NOT NULL,
  `term` int(11) NOT NULL,
  `fund` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `amount` decimal(5,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudpayment`
--

CREATE TABLE `tblstudpayment` (
  `studid` varchar(11) NOT NULL,
  `sy` varchar(9) NOT NULL,
  `term` int(11) NOT NULL,
  `orno` bigint(20) NOT NULL,
  `fund` int(11) NOT NULL,
  `account` varchar(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kioskuser`
--
ALTER TABLE `kioskuser`
  ADD PRIMARY KEY (`userNo`),
  ADD UNIQUE KEY `studid` (`studid`),
  ADD UNIQUE KEY `userNo` (`userNo`);

--
-- Indexes for table `studidsubjid`
--
ALTER TABLE `studidsubjid`
  ADD PRIMARY KEY (`studid`,`subjid`);

--
-- Indexes for table `studpersonalinfotbl`
--
ALTER TABLE `studpersonalinfotbl`
  ADD PRIMARY KEY (`studID`),
  ADD UNIQUE KEY `studID_2` (`studID`),
  ADD KEY `studID` (`studID`);

--
-- Indexes for table `subjcodtbl`
--
ALTER TABLE `subjcodtbl`
  ADD PRIMARY KEY (`subjcod`);

--
-- Indexes for table `tblstudappraisal`
--
ALTER TABLE `tblstudappraisal`
  ADD PRIMARY KEY (`studid`,`sy`,`term`,`fund`);

--
-- Indexes for table `tblstudpayment`
--
ALTER TABLE `tblstudpayment`
  ADD PRIMARY KEY (`studid`,`sy`,`term`,`orno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";

$insert_sql="
INSERT INTO `kioskuser` (`userNo`, `studid`, `password`) VALUES
(1, '2014-0069-G', '55');

INSERT INTO `studpersonalinfotbl` (`studID`, `studLname`, `studFname`, `studMname`) VALUES
('2014-0069-G', 'NORDOG', 'Aidazen', 'Allertse');

";

$conn->$exec($create_sql);
$conn->$exec($insert_sql);

?>