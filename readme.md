### Introduce
A useless single-person microblog.

At first, I want to make a chatting room like DRRR, but something wrong with my mind...so, just what you see.

###Default Password：
Login Password: `Kurama`

### Testing：
Chrome & Firefox

### DataBase：
dbconfig: 'common/dbconfig.php'
```sql
CREATE TABLE sky_contents
(
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	content text NOT NULL,
	time int NOT NULL
)
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

###Fix：
> 未知错误：It is not safe to rely on the system's timezone settings. 

In `php.ini`, set the `date.timezone = "Asia/Shanghai"` or other timezone.

###Screenshot：
![SkyMicroBlog1](http://zhpech.b0.upaiyun.com/github/SkyMicroBlog1.png)
![SkyMicroBlog2](http://zhpech.b0.upaiyun.com/github/SkyMicroBlog2.png)