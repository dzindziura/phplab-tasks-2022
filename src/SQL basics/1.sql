DROP DATABASE IF EXISTS employees;
CREATE DATABASE IF NOT EXISTS employees;
USE employees;

DROP TABLE IF EXISTS dept_emp,
dept_manager,
titles,
salaries,
employees,
departments;

CREATE TABLE employees (
  emp_no INT NOT NULL,
  birth_date DATE NOT NULL,
  first_name VARCHAR(14) NOT NULL,
  last_name VARCHAR(16) NOT NULL,
  gender ENUM ('M', 'F') NOT NULL,
  hire_date DATE NOT NULL,
  PRIMARY KEY (emp_no)
);

CREATE TABLE departments (
  dept_no CHAR(4) NOT NULL,
  dept_name VARCHAR(40) NOT NULL,
  PRIMARY KEY (dept_no),
  UNIQUE KEY (dept_name)
);

CREATE TABLE dept_emp (
  emp_no INT NOT NULL,
  dept_no CHAR(4) NOT NULL,
  from_date DATE NOT NULL,
  to_date DATE NOT NULL,
  FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE,
  FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,
  PRIMARY KEY (emp_no, dept_no)
);

CREATE TABLE dept_manager (
  emp_no INT NOT NULL,
  dept_no CHAR(4) NOT NULL,
  from_date DATE NOT NULL,
  to_date DATE NOT NULL,
  FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE,
  FOREIGN KEY (dept_no) REFERENCES departments (dept_no) ON DELETE CASCADE,
  PRIMARY KEY (emp_no, dept_no)
);

CREATE TABLE titles (
  emp_no INT NOT NULL,
  title VARCHAR(50) NOT NULL,
  from_date DATE NOT NULL,
  to_date DATE,
  FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE,
  PRIMARY KEY (emp_no, title, from_date)
);

CREATE TABLE salaries (
  emp_no INT NOT NULL,
  salary INT NOT NULL,
  from_date DATE NOT NULL,
  to_date DATE NOT NULL,
  FOREIGN KEY (emp_no) REFERENCES employees (emp_no) ON DELETE CASCADE,
  PRIMARY KEY (emp_no, from_date)
);

INSERT INTO employees(
    emp_no,
    birth_date,
    first_name,
    last_name,
    gender,
    hire_date
  )
VALUES (
    1,
    '1987-12-13',
    'Andrii',
    'Vakariuk',
    'M',
    '2018-01-01'
  ),
  (
    2,
    '1967-02-15',
    'Taras',
    'Fedorenko',
    'M',
    '2008-01-01'
  ),
  (
    3,
    '1977-10-24',
    'Olha',
    'Shevchuk',
    'F',
    '2015-01-01'
  ),
  (
    4,
    '1995-07-04',
    'Marharyta',
    'Nechai',
    'F',
    '2019-01-01'
  ),
  (
    5,
    '1985-11-18',
    'Pavlo',
    'Maruniak',
    'M',
    '2017-01-01'
  );

INSERT INTO departments(dept_no, dept_name)
VALUES (1, 'Management'),
  (2, 'Marketing'),
  (3, 'Development'),
  (4, 'Recruiting'),
  (5, 'Advertisement');

INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date)
VALUES (1, 1, '2018-01-01', curdate()),
  (2, 3, '2012-01-01', curdate()),
  (3, 2, '2017-01-01', curdate()),
  (4, 4, '2019-01-01', curdate()),
  (5, 3, '2017-01-01', curdate());

INSERT INTO dept_manager(dept_no, emp_no, from_date, to_date)
VALUES (1, 1, '2018-01-01', curdate()),
  (3, 2, '2017-01-01', curdate()),
  (2, 3, '2017-01-01', curdate()),
  (4, 4, '2012-01-01', curdate()),
  (3, 5, '2019-01-01', curdate());

INSERT INTO titles(emp_no, title, from_date, to_date)
VALUES (1, 'manager', '2018-01-01', curdate()),
  (2, 'developer', '2012-01-01', curdate()),
  (3, 'marketing manager', '2017-01-01', curdate()),
  (4, 'recruiter', '2019-01-01', curdate()),
  (5, 'developer', '2017-01-01', curdate());

INSERT INTO salaries(emp_no, salary, from_date, to_date)
VALUES (1, 5000, '2018-01-01', curdate()),
  (2, 9000, '2012-01-01', curdate()),
  (3, 7000, '2017-01-01', curdate()),
  (4, 6000, '2019-01-01', curdate()),
  (5, 9500, '2017-01-01', curdate());