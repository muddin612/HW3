-- CREATE DATABASE MSU_Movies
DROP DATABASE IF EXISTS MSU_Movies;
CREATE DATABASE MSU_Movies;
USE MSU_Movies;


-- CREATE TABLE Movie;
CREATE TABLE Movie (
MovieID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
MovieTitle varchar (30) NOT NULL,
ReleaseDate DATE NOT NULL,
Genre varchar(30) NOT NULL
);

-- Populate movie data

INSERT INTO Movie VALUES 
(1, 'Superman vs Batman', '2016-03-25', 'Action'),
(2, 'Deadpool', '2016-02-12', 'Comedy'),
(3, 'Furious 7', '2015-04-03', 'Thriller'),
(4, 'PK', '2014-12-19', 'Drama'),
(5, 'The Hangover', '2009-06-05', 'Comedy'),
(6, '3 Idiots', '2009-12-25', 'Drama'),
(7, 'Spectre', '2015-11-06', 'Thriller'),
(8, 'Batman Begins', '2005-06-15', 'Action'),
(9, 'The Dark Knight', '2008-07-18', 'Crime');


-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON MSU_Movies.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT
ON Movie
TO mgs_tester@localhost
IDENTIFIED BY 'pa55word';