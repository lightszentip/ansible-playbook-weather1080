DROP TABLE IF EXISTS `daten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daten` (
  `id` bigint(20) NOT NULL,
  `timekey` datetime DEFAULT NULL,
  `tempin` double DEFAULT NULL,
  `tempout` double DEFAULT NULL,
  `feelslike` double DEFAULT NULL,
  `humidityin` double DEFAULT NULL,
  `humidityout` double DEFAULT NULL,
  `dewpoint` double DEFAULT NULL,
  `winddirection` varchar(10) DEFAULT NULL,
  `windavg` int(11) DEFAULT NULL,
  `windgust` int(11) DEFAULT NULL,
  `windchill` double DEFAULT NULL,
  `rain` double DEFAULT NULL,
  `abspressure` double DEFAULT NULL,
  `rainwhole` double DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
