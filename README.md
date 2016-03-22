# php_crud_authentication

A PHP app to authenticate users without using any frameworks.

## Database Setup

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1

CREATE TABLE `list` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `details` text NOT NULL,
 `date_posted` varchar(30) NOT NULL,
 `time_posted` time NOT NULL,
 `date_edited` varchar(30) NOT NULL,
 `time_edited` time NOT NULL,
 `public` varchar(5) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1
