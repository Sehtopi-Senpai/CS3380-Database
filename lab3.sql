DROP TABLE IF EXISTS classes;

CREATE TABLE classes
(	name		VARCHAR(50),
	department	VARCHAR(50),
	course_id	VARCHAR(10),
	start		TIME(6),
	end		TIME(6),
	days		VARCHAR(10),
CONSTRAINT PKclasses PRIMARY KEY(course_id));

/*Inserting values into the table*/
INSERT INTO classes VALUES ('CALC', 'MATH', '01340', 010000, 015000, 'TTh');
INSERT INTO classes VALUES ('STAT2500', 'MATH', '01341', 030000, 035000, 'MWF');
INSERT INTO classes VALUES ('CALC2', 'MATH', '01342', 040000, 045000, 'MWF');
INSERT INTO classes VALUES ('CS3380', 'CS', '10132', 090000, 095000, 'MWF');
INSERT INTO classes VALUES ('CS1050', 'CS', '10133', 120000, 125000, 'TTh');
INSERT INTO classes VALUES ('CS2050', 'CS', '10134', 010000, 015000, 'MWF');
INSERT INTO classes VALUES ('INFOTC1001', 'IT', '12000', 010000, 015000, 'TTh');
INSERT INTO classes VALUES ('INFOTC1040', 'IT', '12001', 120000, 125000, 'MWF');
INSERT INTO classes VALUES ('INFOTC2610', 'IT', '12005', 120000, 125000, 'TTh');
INSERT INTO classes VALUES ('INFOTC2910', 'IT', '12014', 080000, 085000, 'MW');

/*Query the table with SELECT statements*/
/*Show all records in the classes table*/
SELECT * FROM classes;

/*Show the start time of all classes*/
SELECT start FROM classes;

/*Show all classes from specific department*/
SELECT * FROM classes WHERE department = 'MATH';

/*Show the name and course_id of all classes on MWF*/
SELECT name, course_id FROM classes WHERE days = 'MWF';

/*Show the length of all classes using TIMEDIFF()*/
SELECT TIMEDIFF(end, start) FROM classes;

/*Modify data using the UPDATE/DELETE statements*/
/*Change the days of a class with a specific course_id using UPDATE*/
UPDATE classes SET days = "TTh" WHERE course_id = '01341';

/*Update all MWF classes to start at 2:00 and end at 2:50*/
UPDATE classes SET start = '020000', end = '025000' WHERE days = 'MWF';

/*Update all classes in a specific department to have a new dept. name*/
/*UPDATE classes SET department = 'Computer Science' WHERE department = 'CS';

/*Rename one class, give it new course_id*/
UPDATE classes SET name = 'Calculus' WHERE name = 'CALC';
UPDATE classes SET course_id = '010101' WHERE course_id = '01340';

/*Delete all classes from department of your choice.*/
/*DELETE FROM classes WHERE department = 'Computer Science';

 
