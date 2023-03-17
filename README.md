# PHP_mini_project_Dockerized_with_standards

\*\*install and setup the php/mysql containers
--docker-compose up -d --build --force-recreate

\*\*install dependencies
-- docker exec -it your_php_container_id composer install

# create mysql tables

/_/_ open the mysql bash with this commands:
-- docker exec -it your_mysql_container_id bash
-- mysql -uphp -pphp
then run all queries located inside /migrations folder

# execute cs fixer for formating

-- docker exec -it your_php_container_id bash
-- vendor/bin/phpstan analyse app tests
