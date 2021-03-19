<font color='red'>本篇博客会不定时更新</font>
### [组合两个表](https://leetcode-cn.com/problems/combine-two-tables/)
```
SELECT a.FirstName,a.LastName,b.City,b.State from Person a left join Address b USING(PersonID);
SElECT a.FirstName,a.LastName,b.City,b.State from Person a left join Address b on a.PersonID=b.PersonID;
```
可以使用```USING()```这个语法
### [第二高的薪水](https://leetcode-cn.com/problems/second-highest-salary/)
```
SELECT IFNULL((SELECT DISTINCT Salary FROM Employee order by Salary desc limit 1 offset 1),null) AS SecondHighestSalary
```
第一个```SELECT```后面是没有加括号的，写的时候可以先不用写最外层的```SELECT```,下班里面的写好，里面的```SELECT```得到的是一个值，```IFNULL```函数再对这个值进行判断得出来一个值，但是这个值不能输出到页面上，需要最外面的```SELECT```选中
```DISTINCT```是放到```SELECT```之后的,而且只能放到字段的最前面，是没有括号的
### [第N高的薪水](https://leetcode-cn.com/problems/nth-highest-salary/)
```
CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
    SET N:= N-1;
    RETURN(
        SELECT Salary from Employee group by Salary order by Salary DESC limit N,1
    );
END
```
注意```函数```的使用,```函数```和Go的```函数```类似是参数和返回值类型是写到```后面```的,```GROUP BY```放到```ORDER BY```之前
### [分数排名](https://leetcode-cn.com/problems/rank-scores/)
```
select a.Score as Score,
(select count(distinct b.Score) from Scores b where b.Score >= a.Score) as 'rank'
from Scores a
order by a.Score DESC
```
里面的```SELECT```得到的是RANK，这个RANK是通过外部的字段比较得到的，理解上可以从每一个行来理解，```SELECT```的是每一行的数据
起别名的时候字段不要忘记加别名.字段
### [连续出现的数字](https://leetcode-cn.com/problems/consecutive-numbers/)
```
select distinct l1.Num as ConsecutiveNums from 
Logs l1,
Logs l2,
Logs l3
where l1.Id = l2.Id-1
and l2.Id = l3.Id-1
and l1.Num = l2.Num
and l2.Num = l3.Num
```
 一个表可以多次使用
### [超过经理收入的员工](https://leetcode-cn.com/problems/employees-earning-more-than-their-managers/)
```
select a.Name  Employee 
from Employee a ,Employee b 
where a.ManagerId = b.Id
and a.Salary>b.Salary
```
一个表可以多次使用
### [查找重复的电子邮箱](https://leetcode-cn.com/problems/duplicate-emails/)
```
select Email
from Person
group by Email
having count(Email)>1

select Email from
(select Email,count(Email) num from Person group by Email) a
where a.num >1
```
一个查询的结果给另外一个查询使用

[从不订购的客户](https://leetcode-cn.com/problems/customers-who-never-order/)
```
select Name Customers from Customers where Customers.Id not in
(select CustomerId from Orders)
```
select 语句又当not in的集合
