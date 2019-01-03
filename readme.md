# Survey Api

This Survey Api is made with Laravel Lumen which is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Installation
1. Clone repository using git
2. Go inside repository directory "cd survey-api"
3. Install dependencies using Composer "composer install"
4. Setup database credentials in .env file from sample file .env.sample
4. Setup tables into your database running command `php artian migrate`
5. Setup Apache virtual host or directly server by "php -S localhost:8080 -t public"

## Test Case with Postman
### CRUD test cases
1. GET request usages (R)
	eg: http://localhost:8080/surveys

2. POST request usages (C)
	eg: http://localhost:8080/surveys?name=Are these helpful?&description=Analytics for customer satifaction.&start_date=2017-01-14&end_date=2017-12-28&no_of_question=0&extra&active=1

3. PUT request usages (U)
	eg: http://localhost:8080/surveys?description=Analytics for customer satifaction.

4. DELETE request usages (D)
	eg: http://localhost:8080/surveys/2?id=2



## Contributors

Please send me a pull request if you want to extend this module and have crazy thoughts.

## License

GPL
