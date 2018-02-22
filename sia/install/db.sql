-- ------------------------------ --
-- Creates the DB tables for the  -- 
-- SIA site control system        --
-- ------------------------------ --

-- Create the login table
CREATE TABLE `#___login` (
	`ID` int(50) NOT NULL AUTO_INCREMENT,
	`user_name` longtext NOT NULL,
    `user_mail` varchar(150) NOT NULL,
    `password` varchar(255) NOT NULL, 
    `user_level` tinytext NOT NULL,
    `created_on` datetime NOT NULL,
    `created_by` int(50) NOT NULL,
    `updated_on` datetime NOT NULL,
    `updated_by` int(50) NOT NULL,
    `last_login` datetime NOT NULL,
    `last_logged_IP` varchar(100) NOT NULL,
    PRIMARY KEY(`ID`),
    KEY(`created_by`),
    KEY(`updated_by`)
) DEFAULT CHARSET=latin1 ENGINE=InnoDB AUTO_INCREMENT=1;

-- Create the configs table
CREATE TABLE `#___configs` (
	`ID` int(50) AUTO_INCREMENT NOT NULL,
	`config_name` longtext NOT NULL,
    `config_value` longtext NOT NULL,
    `created_on` datetime NOT NULL,
    `created_by` int(50) NOT NULL,
    `updated_on` datetime NOT NULL,
    `updated_by` int(50) NOT NULL,
    `last_user_IP` varchar(100) NOT NULL,
    PRIMARY KEY(`ID`),
    KEY(`created_by`),
    KEY(`updated_by`)
) DEFAULT CHARSET=latin1 ENGINE=InnoDB AUTO_INCREMENT=1;

-- Create the options table
CREATE TABLE `#___options` (
	`ID` int(50) AUTO_INCREMENT NOT NULL,
	`option_name` longtext NOT NULL,
    `option_value` longtext NOT NULL,
    `option_for` tinytext NOT NULL,
    `created_on` datetime NOT NULL,
    `created_by` int(50) NOT NULL,
    `updated_on` datetime NOT NULL,
    `updated_by` int(50) NOT NULL,
    `last_user_IP` varchar(100) NOT NULL,
    PRIMARY KEY(`ID`),
    KEY(`created_by`),
    KEY(`updated_by`)
) DEFAULT CHARSET=latin1 ENGINE=InnoDB AUTO_INCREMENT=1;

-- Create the media table
CREATE TABLE `#___media` (
	`ID` int(50) AUTO_INCREMENT NOT NULL,
	`media_name` longtext NOT NULL,
    `media_title` longtext NOT NULL,
    `attached_to` int(50) NOT NULL,
    `media_url` longtext NOT NULL,
    `uploaded_on` datetime NOT NULL,
    `uploaded_by` int(50) NOT NULL,
    `updated_on` datetime NOT NULL,
    `updated_by` int(50) NOT NULL,
    `last_user_IP` varchar(100) NOT NULL,
    PRIMARY KEY(`ID`),
    KEY(`attached_to`),
    KEY(`uploaded_by`),
    KEY(`updated_by`)
) DEFAULT CHARSET=latin1 ENGINE=InnoDB AUTO_INCREMENT=1;

-- Create the posts table
CREATE TABLE `#___posts` (
	`ID` int(50) AUTO_INCREMENT NOT NULL,
	`post_title` longtext NOT NULL,
    `post_value` longtext NOT NULL,
    `post_type` int(50) NOT NULL,
    `post_images` longtext NOT NULL,
    `published` int(1) NOT NULL,
    `post_options` longtext NOT NULL,
   	`post_clicks` int(255) NULL,
    `created_on` datetime NOT NULL,
    `created_by` int(50) NOT NULL,
    `updated_on` datetime NOT NULL,
    `updated_by` int(50) NOT NULL,
    `last_user_IP` varchar(100) NOT NULL,
    PRIMARY KEY(`ID`),
    KEY(`post_type`),
    KEY(`created_by`),
    KEY(`updated_by`)
) DEFAULT CHARSET=latin1 ENGINE=InnoDB AUTO_INCREMENT=1;

-- Create the pages table
CREATE TABLE `#___pages` (
	`ID` int(50) AUTO_INCREMENT NOT NULL,
	`page_title` longtext NOT NULL,
    `page_value` longtext NOT NULL,
    `page_type` int(50) NOT NULL,
    `page_clicks` int(255) NULL,
    `published` int(1) NOT NULL,
    `page_options` longtext NOT NULL,
    `created_on` datetime NOT NULL,
    `created_by` int(50) NOT NULL,
    `updated_on` datetime NOT NULL,
    `updated_by` int(50) NOT NULL,
    `last_user_IP` varchar(100) NOT NULL,
    PRIMARY KEY(`ID`),
    KEY(`page_type`),
    KEY(`created_by`),
    KEY(`updated_by`)
) DEFAULT CHARSET=latin1 ENGINE=InnoDB AUTO_INCREMENT=1;

-- Create the metrics table
CREATE TABLE `#___metrics` (
	`ID` int(50) AUTO_INCREMENT NOT NULL,
	`user_IP` varchar(100) NOT NULL,
    `pages_visited` longtext NOT NULL,
    `user_system` longtext NOT NULL,
    `pages_clicks` int(255) NOT NULL,
    `post_options` longtext NOT NULL,
    `created_on` datetime NOT NULL,
    `created_by` int(100) NOT NULL,
    `updated_on` datetime NOT NULL,
    `updated_by` int(100) NOT NULL,
    PRIMARY KEY(`ID`)
) DEFAULT CHARSET=latin1 ENGINE=InnoDB AUTO_INCREMENT=1;