### DataBase
dbconfig: 'common/dbconfig.php'
```sql
CREATE TABLE sky_content
{
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content text NOT NULL,
	time int NOT NULL
}