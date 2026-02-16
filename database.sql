CREATE DATABASE UNEPSkillsPortal;
GO

USE UNEPSkillsPortal;

CREATE TABLE EducationLevels (
    Id INT PRIMARY KEY IDENTITY,
    LevelName VARCHAR(100) NOT NULL
);

CREATE TABLE DutyStations (
    Id INT PRIMARY KEY IDENTITY,
    StationName VARCHAR(100) NOT NULL
);

CREATE TABLE SoftwareExpertise (
    Id INT PRIMARY KEY IDENTITY,
    SoftwareName VARCHAR(100) NOT NULL
);

CREATE TABLE Languages (
    Id INT PRIMARY KEY IDENTITY,
    LanguageName VARCHAR(100) NOT NULL
);

CREATE TABLE Staff (
    Id INT PRIMARY KEY IDENTITY,
    IndexNumber VARCHAR(50),
    FullNames VARCHAR(150),
    Email VARCHAR(150),
    CurrentLocation VARCHAR(100),
    EducationLevelId INT,
    DutyStationId INT,
    RemoteAvailability BIT,
    SoftwareExpertiseId INT,
    SoftwareExpertiseLevel VARCHAR(50),
    LanguageId INT,
    LevelOfResponsibility VARCHAR(100),

    FOREIGN KEY (EducationLevelId) REFERENCES EducationLevels(Id),
    FOREIGN KEY (DutyStationId) REFERENCES DutyStations(Id),
    FOREIGN KEY (SoftwareExpertiseId) REFERENCES SoftwareExpertise(Id),
    FOREIGN KEY (LanguageId) REFERENCES Languages(Id)
);
