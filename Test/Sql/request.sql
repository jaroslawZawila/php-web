USE `caketest`;

SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE requests;
TRUNCATE TABLE requestdetails;
SET FOREIGN_KEY_CHECKS=1;

INSERT INTO `caketest`.`requests` (`id`, `name`, `email`, `phone`, `type`, `message`, `status`, `date`) VALUES ('1', 'name', 'test@test.com', '123456879', 'Tenant', 'message', 'NEW', '2014-04-04 22:02:10');
