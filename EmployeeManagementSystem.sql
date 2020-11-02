CREATE DATABASE Sprint2DB;


USE Sprint2DB;

CREATE TABLE IF NOT EXISTS `employees` (
`eid` int(10) NOT NULL,
`pid` int(10) DEFAULT NULL,
`ename` VARCHAR(50) NOT NULL
);



INSERT INTO `employees` (`eid`, `pid`, `ename`)
VALUES(1, 2, 'John'),
(2, 1, 'Nick'),
(3, 1, 'Michael'), 
(4, 4, 'Amelia'), 
(5, 3, 'Lebron'), 
(6, 3, 'Josh'),
(7, 1, 'Susan');

CREATE TABLE IF NOT EXISTS `projects` (
`pid` INT(10) NOT NULL,
`pname` VARCHAR(50) NOT NULL
);

INSERT INTO `projects` (`pid`, `pname`)
VALUES(1, 'PHP'),
(2,'JAVA'),(3, 'Ruby'), (4, 'Python');

ALTER TABLE `employees`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `pid` (`pid`);


ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`);


ALTER TABLE `employees`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `projects`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `employees`
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `projects` (`pid`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

 
        
 