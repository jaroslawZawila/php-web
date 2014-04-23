USE `caketest`;
INSERT INTO `caketest`.`customers` (`id`, `type`, `firstname`, `surname`, `postcode`, `houseno`, `street`, `city`, `email`, `phone`) VALUES ('2', 'Landlord', 'firstname', 'surname', 'xx1 2xx', '1', 'Street', 'City', 'email@r.com', '123456');
INSERT INTO `caketest`.`properties` (`id`, `price`, `beds`, `baths`, `garden`, `parking`, `hometype`, `year`, `status`, `featured`, `hide`, `description`, `postcode`, `houseno`, `street`, `city`, `customers_id`, `addtype`) VALUES ('12', '1', '1', '1', 'no', 'no', 'flat', '2011', 'sale', 'no', 'no', '', 'xx1 1xx', '1', 'street', 'city', '2', 'for sale');
INSERT INTO `caketest`.`photos` (`id`, `description`, `master`, `properties_id`, `url`) VALUES ('3', 'description', 'yes', '12', 'url');
