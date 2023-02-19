CREATE SCHEMA `KhaneBank`;

CREATE TABLE `KhaneBank`.`Users` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserName` varchar(50) UNIQUE NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `UserLevel` int NOT NULL DEFAULT 0,
  `CreateDate` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `LastActeavity` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `Activation` boolean NOT NULL DEFAULT 0
);

CREATE TABLE `KhaneBank`.`LoginLogs` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `LoginDate` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `IP` varchar(15) NOT NULL
);

CREATE TABLE `KhaneBank`.`UserActivity` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `ActionID` int NOT NULL,
  `ActionDate` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP())
);

CREATE TABLE `KhaneBank`.`Actions` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `ActionDescribe` text NOT NULL,
  `Activation` boolean NOT NULL DEFAULT 1
);

CREATE TABLE `KhaneBank`.`Accesses` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `AccessName` varchar(50) NOT NULL,
  `Activation` boolean NOT NULL DEFAULT 1
);

CREATE TABLE `KhaneBank`.`Rolls` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `RollName` varchar(50) NOT NULL,
  `RollAccess` int NOT NULL DEFAULT 0,
  `Activation` boolean NOT NULL DEFAULT 0
);

CREATE TABLE `KhaneBank`.`Supporters` (
  `ID` int AUTO_INCREMENT,
  `SupporterUserID` int PRIMARY KEY,
  `SupporterOnline` boolean NOT NULL DEFAULT 0,
  `LastDateActivity` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `SupporterScore` int NOT NULL DEFAULT 0
);

CREATE TABLE `KhaneBank`.`Users_Supporters` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `SupporterUserID` int NOT NULL
);

ALTER TABLE `KhaneBank`.`Users_Supporters` ADD FOREIGN KEY (`UserID`) REFERENCES `KhaneBank`.`Users` (`ID`);

ALTER TABLE `KhaneBank`.`Users_Supporters` ADD FOREIGN KEY (`SupporterUserID`) REFERENCES `KhaneBank`.`Supporters` (`SupporterUserID`);

ALTER TABLE `KhaneBank`.`Supporters` ADD FOREIGN KEY (`SupporterUserID`) REFERENCES `KhaneBank`.`Users` (`ID`);

ALTER TABLE `KhaneBank`.`LoginLogs` ADD FOREIGN KEY (`UserID`) REFERENCES `KhaneBank`.`Users` (`ID`);

ALTER TABLE `KhaneBank`.`Accesses` ADD FOREIGN KEY (`ID`) REFERENCES `KhaneBank`.`Rolls` (`RollAccess`);

ALTER TABLE `KhaneBank`.`Rolls` ADD FOREIGN KEY (`ID`) REFERENCES `KhaneBank`.`Users` (`UserLevel`);

ALTER TABLE `KhaneBank`.`UserActivity` ADD FOREIGN KEY (`UserID`) REFERENCES `KhaneBank`.`Users` (`ID`);

ALTER TABLE `KhaneBank`.`Actions` ADD FOREIGN KEY (`ID`) REFERENCES `KhaneBank`.`UserActivity` (`ActionID`);
