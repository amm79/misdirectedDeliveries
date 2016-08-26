CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Customer ID number',
  `first_name` varchar(50) NOT NULL COMMENT 'Customers first name',
  `last_name` varchar(50) NOT NULL COMMENT 'Customers last name',
  `address` varchar(100) NOT NULL COMMENT 'Customers address',
  `zip_code` varchar(10) NOT NULL COMMENT 'Customers zip code',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `inventory` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Item ID',
  `name` varchar(100) NOT NULL COMMENT 'Item name',
  `price` decimal(10,2) NOT NULL COMMENT 'Item price',
  `quantity` int(11) NOT NULL COMMENT 'Stock amount',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Invoice number',
  `customer_id` int(11) NOT NULL COMMENT 'Customer ID',
  `total_price` decimal(10,2) NOT NULL COMMENT 'Total price',
  `status` tinyint(1) NOT NULL COMMENT 'If the order is shipped or not',
  PRIMARY KEY (`invoice_id`),
  KEY `FK_invoices_customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `orders` (
  `invoice_id` int(11) NOT NULL COMMENT 'Invoice ID',
  `customer_id` int(11) NOT NULL COMMENT 'Customer ID',
  `item_id` int(11) NOT NULL COMMENT 'Item ID',
  `quantity` int(11) NOT NULL COMMENT 'Quantity',
  `price` decimal(10,2) NOT NULL COMMENT 'Item price',
  KEY `FK_orders_invoice_id` (`invoice_id`),
  KEY `FK_orders_customer_id` (`customer_id`),
  KEY `FK_orders_item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `invoices`
  ADD CONSTRAINT `FK_invoices_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE;

ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_invoice_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orders_item_id` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`) ON UPDATE CASCADE;
  