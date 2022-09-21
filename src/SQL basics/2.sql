
-- How many persons work here --
SELECT COUNT(*) AS 'Number of people' FROM employees;

-- persons who were hired between 2010 and 2020 --
SELECT CONCAT(first_name, ' ', last_name) AS full_name, hire_date
FROM employees
WHERE hire_date BETWEEN '2010-01-01' AND '2020-01-01';

-- Retrieve title and salary where salary > 5000 --
SELECT DISTINCT title, salary FROM titles t JOIN salaries s
ON t.emp_no = s.emp_no
WHERE salary > 5000
ORDER BY salary DESC;

-- A person with the lowest salary --
SELECT CONCAT(first_name, ' ', last_name) AS full_name, MIN(salary) AS salary
FROM salaries s JOIN employees e on s.emp_no = e.emp_no
WHERE salary = (SELECT MIN(salary) FROM salaries);

-- Retrieve full name, title and salary where salary > 5000 --
SELECT CONCAT(first_name, ' ', last_name) AS full_name, title, salary
FROM titles t JOIN salaries s ON t.emp_no = s.emp_no
JOIN employees e ON s.emp_no = e.emp_no
WHERE salary > 6000;

-- Average salary for title --
SELECT title, AVG(salary) AS 'Average salary' FROM salaries s JOIN titles t ON s.emp_no = t.emp_no
GROUP BY title;

-- Retrieve persons, title with average salary > 6500 --
SELECT CONCAT(first_name, ' ', last_name) AS full_name, title, AVG(salary) AS 'Average salary'
FROM salaries s JOIN titles t ON s.emp_no = t.emp_no
JOIN employees e on s.emp_no = e.emp_no
GROUP BY title
HAVING AVG(salary) > 6500
ORDER BY title;

UPDATE titles SET title = 'web-developer' WHERE title = 'developer';

DELETE FROM departments WHERE dept_name = 'Advertisement';
