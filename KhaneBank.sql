CREATE SCHEMA `KhaneBank`;

CREATE TABLE `KhaneBank`.`TBLUsers` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserName` varchar(50) UNIQUE NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `UserLevel` int NOT NULL DEFAULT 0,
  `CreateDate` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `LastActeavity` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `Activation` boolean NOT NULL DEFAULT 0
);

CREATE TABLE `KhaneBank`.`TBLLoginLogs` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `LoginDate` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `IP` varchar(15) NOT NULL
);

CREATE TABLE `KhaneBank`.`TBLUserActivity` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `ActionID` int NOT NULL,
  `ActionDate` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP())
);

CREATE TABLE `KhaneBank`.`TBLActions` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `ActionDescribe` text NOT NULL,
  `Activation` boolean NOT NULL DEFAULT 1
);

CREATE TABLE `KhaneBank`.`TBLAccesses` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `AccessName` varchar(50) NOT NULL,
  `Activation` boolean NOT NULL DEFAULT 1
);

CREATE TABLE `KhaneBank`.`TBLRolls` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `RollName` varchar(50) NOT NULL,
  `RollAccess` int NOT NULL DEFAULT 0,
  `Activation` boolean NOT NULL DEFAULT 0
);

CREATE TABLE `KhaneBank`.`TBLSupporters` (
  `SupporterUserID` int PRIMARY KEY,
  `SupporterOnline` boolean NOT NULL DEFAULT 0,
  `LastDateActivity` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP()),
  `SupporterScore` int NOT NULL DEFAULT 0
);

CREATE TABLE `KhaneBank`.`TBLUsersSupporters` (
  `ID` int PRIMARY KEY AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `SupporterUserID` int NOT NULL,
  `SupportDate` timestamp NOT NULL DEFAULT (CURRENT_TIMESTAMP())
);

ALTER TABLE `KhaneBank`.`TBLUsersSupporters` ADD CONSTRAINT `fk_UsersSupporters_UserID_Users(ID)` FOREIGN KEY (`UserID`) REFERENCES `KhaneBank`.`TBLUsers` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `KhaneBank`.`TBLUsersSupporters` ADD CONSTRAINT `fk_UsersSupporters_SupporterUserID_Supporters(SupporterUserID)` FOREIGN KEY (`SupporterUserID`) REFERENCES `KhaneBank`.`TBLSupporters` (`SupporterUserID`) ON UPDATE CASCADE;

ALTER TABLE `KhaneBank`.`TBLSupporters` ADD CONSTRAINT `fk_Supporters_SupporterUserID_Users(ID)` FOREIGN KEY (`SupporterUserID`) REFERENCES `KhaneBank`.`TBLUsers` (`ID`);

ALTER TABLE `KhaneBank`.`TBLLoginLogs` ADD CONSTRAINT `fk_LoginLogs_UserID_Users(ID)` FOREIGN KEY (`UserID`) REFERENCES `KhaneBank`.`TBLUsers` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `KhaneBank`.`TBLRolls` ADD CONSTRAINT `fk_Rolls_RollAccess_Accesses(ID)` FOREIGN KEY (`RollAccess`) REFERENCES `KhaneBank`.`TBLAccesses` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `KhaneBank`.`TBLUsers` ADD CONSTRAINT `fk_Users_UserLevel_Rolls(ID)` FOREIGN KEY (`UserLevel`) REFERENCES `KhaneBank`.`TBLRolls` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `KhaneBank`.`TBLUserActivity` ADD CONSTRAINT `fk_UserActivity_UserID_Users(ID)` FOREIGN KEY (`UserID`) REFERENCES `KhaneBank`.`TBLUsers` (`ID`) ON UPDATE CASCADE;

ALTER TABLE `KhaneBank`.`TBLUserActivity` ADD CONSTRAINT `fk_UserActivity_ActionID_Actions(ID)` FOREIGN KEY (`ActionID`) REFERENCES `KhaneBank`.`TBLActions` (`ID`) ON UPDATE CASCADE;
