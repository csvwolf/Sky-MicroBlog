###Default Password
Login Password: `Kurama`

### DataBase
dbconfig: 'common/dbconfig.php'
```sql
CREATE TABLE sky_contents
{
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content text NOT NULL,
	time int NOT NULL
}
```

###Error List:
> database error: 数据库连接失败
>
> sql error: 执行数据库语句失败
> 
> not login: 未登录
> 
> content missing: 表单内容缺失
> 
> success: 空降成功