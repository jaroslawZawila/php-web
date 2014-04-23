CREATE DATABASE  IF NOT EXISTS `caketest`;
USE `caketest`;

DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `postcode` varchar(45) NOT NULL,
  `houseno` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `contracts`;
CREATE TABLE `contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`customers_id`),
  KEY `fk_contracts_customers1` (`customers_id`),
  CONSTRAINT `fk_contracts_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `docs`;
CREATE TABLE `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`customers_id`),
  KEY `fk_docs_customers1` (`customers_id`),
  CONSTRAINT `fk_docs_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `baths` int(11) NOT NULL,
  `garden` varchar(45) NOT NULL,
  `parking` varchar(45) NOT NULL,
  `hometype` varchar(45) NOT NULL,
  `year` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `featured` varchar(45) NOT NULL,
  `hide` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) NOT NULL,
  `houseno` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `addtype` varchar(45) NOT NULL DEFAULT 'sale',
  PRIMARY KEY (`id`),
  KEY `fk_properties_customers1` (`customers_id`),
  CONSTRAINT `fk_properties_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

CREATE TABLE `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `properties_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'NEW',
  `comment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`properties_id`,`customers_id`),
  KEY `fk_offers_properties1` (`properties_id`),
  KEY `fk_offers_customers1` (`customers_id`),
  CONSTRAINT `fk_offers_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_offers_properties1` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  `docs` varchar(45) DEFAULT NULL,
  `properties_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_documents_properties1` (`properties_id`),
  CONSTRAINT `fk_documents_properties1` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `master` varchar(45) DEFAULT NULL,
  `properties_id` int(11) NOT NULL,
  `url` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photos_properties` (`properties_id`),
  CONSTRAINT `fk_photos_properties` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `message` varchar(2500) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'NEW',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `requestdetails`;
CREATE TABLE `requestdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `requests_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`requests_id`),
  KEY `fk_requestdetails_requests1` (`requests_id`),
  CONSTRAINT `fk_requestdetails_requests1` FOREIGN KEY (`requests_id`) REFERENCES `requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `viewings`;
CREATE TABLE `viewings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `properties_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`properties_id`,`customers_id`),
  KEY `fk_viewings_properties1` (`properties_id`),
  KEY `fk_viewings_customers1` (`customers_id`),
  CONSTRAINT `fk_viewings_customers1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_viewings_properties1` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `fname` varchar(45) NOT NULL,
  `sname` varchar(45) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `compensation` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `nin` varchar(10) NOT NULL,
  `sdate` varchar(45) DEFAULT NULL,
  `fdate` varchar(45) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO acos VALUES (1,NULL,NULL,NULL,'controllers',1,154),(2,1,NULL,NULL,'Customers',2,9),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'view',5,6),(5,2,NULL,NULL,'add',7,8),(6,1,NULL,NULL,'Docs',10,21),(7,6,NULL,NULL,'index',11,12),(8,6,NULL,NULL,'view',13,14),(9,6,NULL,NULL,'add',15,16),(10,6,NULL,NULL,'edit',17,18),(11,6,NULL,NULL,'delete',19,20),(12,1,NULL,NULL,'Documents',22,33),(13,12,NULL,NULL,'index',23,24),(14,12,NULL,NULL,'view',25,26),(15,12,NULL,NULL,'add',27,28),(16,12,NULL,NULL,'edit',29,30),(17,12,NULL,NULL,'delete',31,32),(18,1,NULL,NULL,'Groups',34,47),(19,18,NULL,NULL,'index',35,36),(20,18,NULL,NULL,'view',37,38),(21,18,NULL,NULL,'add',39,40),(22,18,NULL,NULL,'edit',41,42),(23,18,NULL,NULL,'delete',43,44),(24,18,NULL,NULL,'initDB',45,46),(25,1,NULL,NULL,'Home',48,53),(26,25,NULL,NULL,'index',49,50),(27,25,NULL,NULL,'adminhome',51,52),(28,1,NULL,NULL,'Offers',54,65),(29,28,NULL,NULL,'index',55,56),(30,28,NULL,NULL,'view',57,58),(31,28,NULL,NULL,'update',59,60),(32,28,NULL,NULL,'editComment',61,62),(33,28,NULL,NULL,'add',63,64),(34,1,NULL,NULL,'Pages',66,69),(35,34,NULL,NULL,'display',67,68),(36,1,NULL,NULL,'Photos',70,75),(37,36,NULL,NULL,'create',71,72),(38,36,NULL,NULL,'delete',73,74),(39,1,NULL,NULL,'Properties',76,103),(40,39,NULL,NULL,'saleprices',77,78),(41,39,NULL,NULL,'letprices',79,80),(42,39,NULL,NULL,'buildquery',81,82),(43,39,NULL,NULL,'featureds',83,84),(44,39,NULL,NULL,'tolet',85,86),(45,39,NULL,NULL,'forsell',87,88),(46,39,NULL,NULL,'index',89,90),(47,39,NULL,NULL,'lists',91,92),(48,39,NULL,NULL,'view',93,94),(49,39,NULL,NULL,'add',95,96),(50,39,NULL,NULL,'edit',97,98),(51,39,NULL,NULL,'manage',99,100),(52,39,NULL,NULL,'update_description',101,102),(53,1,NULL,NULL,'Requestdetails',104,107),(54,53,NULL,NULL,'add',105,106),(55,1,NULL,NULL,'Requests',108,119),(56,55,NULL,NULL,'index',109,110),(57,55,NULL,NULL,'view',111,112),(58,55,NULL,NULL,'applyStatus',113,114),(59,55,NULL,NULL,'add',115,116),(60,55,NULL,NULL,'edit',117,118),(61,1,NULL,NULL,'Staffs',120,131),(62,61,NULL,NULL,'index',121,122),(63,61,NULL,NULL,'view',123,124),(64,61,NULL,NULL,'add',125,126),(65,61,NULL,NULL,'edit',127,128),(66,61,NULL,NULL,'terminate',129,130),(67,1,NULL,NULL,'Users',132,143),(68,67,NULL,NULL,'add',133,134),(69,67,NULL,NULL,'edit',135,136),(70,67,NULL,NULL,'delete',137,138),(71,67,NULL,NULL,'login',139,140),(72,67,NULL,NULL,'logout',141,142),(73,1,NULL,NULL,'Viewings',144,151),(74,73,NULL,NULL,'index',145,146),(75,73,NULL,NULL,'add',147,148),(76,73,NULL,NULL,'edit',149,150),(77,1,NULL,NULL,'AclExtras',152,153);
INSERT INTO aros VALUES (1,NULL,'Group',1,NULL,1,4),(2,NULL,'Group',2,NULL,5,6),(3,1,'User',1,NULL,2,3);
INSERT INTO aros_acos VALUES (1,1,1,'1','1','1','1'),(2,2,1,'1','1','1','0'),(3,3,1,'1','1','1','1');
INSERT INTO groups VALUES (1,'admin','2014-04-22 11:38:43','2014-04-22 11:38:43'),(2,'staff','2014-04-22 11:38:48','2014-04-22 11:38:48');
INSERT INTO users VALUES (1,'admin','b682ff05a69e817a747c86fea8626124e6c6277a',1,'2014-04-22 11:39:01','2014-04-22 11:39:01');
