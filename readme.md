# Survey Api

This Survey Api is made with Laravel Lumen which is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Installation
1. Clone repository using git
2. Go inside repository directory "cd survey-api"
3. Install dependencies using Composer "composer install"
4. Setup database credentials in .env file from sample file .env.example
4. Setup tables into your database running command `php artisan migrate`
5. Setup Apache virtual host or directly server by "php -S localhost:8080 -t public"
6. Start your MySQL server to serve database.



## Methods

### [http://localhost:8080/user](#)
_Get all users_

- Method: **GET**

| REQUEST PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
|  - | - | - |


| RESPONSE PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| success | boolean | Request successful or not |
| message | string | Error message case not successful |
| data | array | Array of [User Object](#user-object) |


### [http://localhost:8080/user](#)
_Create new user_

- Method: **POST**

| REQUEST PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| name | STRING | Name/Full Name |
| username | STRING | User's unique username (required|unique) | 
| email | STRING | Email address (required|unique) |
| group | STRING | Category/group |
| remember_token | STRING | Remember Token |
| active | INT | Active or unactive user |


| RESPONSE PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| success | boolean | Request successful or not |
| message | string | Error message case not successful |
| data | array | [User Object](#user-object) |



### [http://localhost:8080/user/:ID](#)
_Get specific user details_

- Method: **GET**

| REQUEST PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
|  - | - | - |


| RESPONSE PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| success | boolean | Request successful or not |
| message | string | Error message case not successful |
| data | array | [User Object](#user-object) |



### [http://localhost:8080/user/:ID](#)
_Update specific user details_

- Method: **PUT**

| REQUEST PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| name | STRING | Name/Full Name |
| username | STRING | User's unique username | 
| email | STRING | Email address |
| group | STRING | Category/group |
| remember_token | STRING | Remember Token |
| active | INT | Active or unactive user |


| RESPONSE PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| success | boolean | Request successful or not |
| message | string | Error message case not successful |
| data | array | [User Object](#user-object) |


### [http://localhost:8080/user/:ID](#)
_Delete specific user from database_

- Method: **DELETE**

| REQUEST PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| id | INT | User ID to delete |


| RESPONSE PARAM | TYPE | DESCRIPTION |
| --- | --- | --- |
| success | boolean | Request successful or not |
| message | string | Error message case not successful |
| data | array | [User Object](#user-object) |




## Test Case with Postman
### CRUD test cases

#### Surveys
1. GET request usages (R)
	eg: http://localhost:8080/survey

2. POST request usages (C)
	eg: http://localhost:8080/survey?name=Are these helpful?&description=Analytics for customer satifaction.&start_date=2017-01-14&end_date=2017-12-28&no_of_question=0&extra&active=1

3. PUT request usages (U)
	eg: http://localhost:8080/survey?description=Analytics for customer satifaction.

4. DELETE request usages (D)
	eg: http://localhost:8080/survey/2?id=2


#### Users
1. GET request usages (R)
	eg: http://localhost:8080/user

2. POST request usages (C)
	eg: http://localhost:8080/user?name=John&username=john123&email=john@example.com&group=team&password=1234567890&remember_token=0&active=1

3. PUT request usages (U)
	eg: http://localhost:8080/user?password=ER#31234qo0o

4. DELETE request usages (D)
	eg: http://localhost:8080/user/2?id=2




## JSON Objects

<a name="user-object"></a>
### User

| Property | Type | Description |
| --- | --- | --- |
| id | INT | User ID |
| name | STRING | Name/Full Name |
| username | STRING | User's unique username |
| email | STRING | Email address |
| group | STRING | Category/group |
| remember_token | STRING | Remember Token |
| active | INT | Active or unactive user |
| created_at | DATETIME | System created time |
| updated_at | DATETIME | System updated time |


<a name="survey-object"></a>
### Survey

| Property | Type | Description |
| --- | --- | --- |
| id | INT | Survey ID |
| name | STRING | Survey Name |
| description | STRING | Survey Description |
| start_date | DATETIME | Survey Start Date |
| end_date | DATETIME | Survey End Date |
| no_of_question | INT | Number of questions in Survey |
| extra | STRING | Extra information about Survey |
| active | INT | Active or unactive user |
| created_at | DATETIME | System created time |
| updated_at | DATETIME | System updated time |



## Contributors

Please send me a pull request if you want to extend this module and have crazy thoughts.


