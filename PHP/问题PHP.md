## 下面的问题每天都要问自己两遍
#### 代码实现
- 单例模式
  [singleton.php](https://github.com/winslis2/Interview/blob/main/PHP/%E4%BB%A3%E7%A0%81%E5%AE%9E%E7%8E%B0/singleton.php)
- 快速排序
  [quicksort.php](https://github.com/winslis2/Interview/blob/main/PHP/%E4%BB%A3%E7%A0%81%E5%AE%9E%E7%8E%B0/quicksort.php)
- 约瑟夫环的实现 [lastremain.php](https://github.com/winslis2/Interview/blob/main/PHP/%E4%BB%A3%E7%A0%81%E5%AE%9E%E7%8E%B0/lastremain.php)
- 爬楼梯问题，使用斐波那契、for循环做 [fib](https://github.com/winslis2/Interview/blob/main/PHP/%E4%BB%A3%E7%A0%81%E5%AE%9E%E7%8E%B0/fib.php)
#### 数据库相关
- 数据库设计三范式？
  > `原子性`，不能在分解<br/>
 `唯一性` 要有唯一主键<br>
 `冗余性` 任何字段不能由其他字段派生出
  
- 事物的ACID特性是什么？具体的实现原理？
  > Atomicity `原子性` 使用undo log  删除变添加<br/>
  Durability `持久性` redo log mysql读写数据时用一个buff pool的，但是断电会导致buff数据丢失，所以增加redo log日志记录<br/>
  > Isolation `隔离性` MVCC多版本并发控制<br/>
  > Consistency `一致性`

- 数据库的四种隔离级别是？
> 读未提交、
> 读已提交、
> 可重复读（Mysql的默认模式）、
> 串行化
- innodb和myisam的区别？
  innodb支持事务、外键，索引和数据是放到一个文件中的，myisam不支持事物、外键
- 聚簇索引和非聚簇索引的区别？
> 聚簇索引：将数据和索引放到一起，找到索引就找到了数据
> 非聚簇索引 数据和索引没有在一起 ，要进行回表操作，扫描两遍索引树
- 覆盖索引
> 一个索引包含了（或覆盖了）满足查询语句中字段与条件的数据就叫做覆盖索引,通常使用联合索引进行覆盖，由于联合索引的节点存的是值，覆盖索引的好处是可以不进行回表操作
- mysql索引失效
- explian sql的参数
> type system>const>eq_ref>ref>range>index>all<br/>
> index是全索引扫描 all是遍历全表
- like 查询索引失效
>  xx% 不失效<br/>
>  %xx 失效<br/>
>  %xx% 失效
- abc联合索引 a=1 b>2 c=1
> 这个时候只走a的索引，b会使c失效
- B+树和B树的区别？

> B树范围查找到的时候会从叶子节点回跳到parent，然后在回跳到叶子节点这样会来回的横跳，也就是回旋查找的问题。
> B+树所有的相邻的叶子节点包含非叶子节点，使用链表进行结合，有一定的顺序，从而范围查询效率较高

- mysql索引匹配的最左原则
#### PHP基础
- 创建socket的步骤？
- echo print print_r var_dump的区别？
- include、require、include_once、require_once的区别？
- PHP的错误级别有哪些？
- PHP的垃圾回收机制
> php的变量的底层是使用zval结构体的，其中包括引用次数，如果引用次数为0就进行垃圾回收，为了防止循环引用的问题，引入了根缓冲机制，把循环引用的变量放到根缓冲区中，达到一定数量后就进行回收
- list函数使用应该注意的问题
- 如何处理数据丢包和粘包的
- PHP异步实现方式
- PHP-fpm怎么与nginx交互
> nginx接收到用户请求通过fastcgi协议和应用程序交互，php-fpm是fastcgi的实现，php-fpm可以让php-cgi（PHP解释器）处理数据然后返回给nginx，
> nginx可以使用tcp socket\uninx socket调用php-fpm,前者可以夸主机使用，后者只能单机使用
#### 消息对列
- Redis令牌桶做法
- 布隆过滤器
- Redis缓存穿透
> 用户恶意输入id像-1，-2直接越过redis访问数据库，解决办法可以进行验证或者IP拉黑处理
- Redis雪崩
> 大量缓存数据失效，解决办法设置缓存的时候时间设置随机，防止同一时间大量数据过期，加锁排队 
- Redis数据结构
> 谈到redis的时候要说基于内存的
> 字符串的底层数据结构是SDS（simple dynamic string）<br/>
free:还剩多少空间<br/>
len:字符串长度<br/>
buf:存放的字符数组<br/>
list和hash使用ziplist压缩表的形式<br/>
zset元素数量小于128，所有长度小于64时用ziplist,多了用跳表
#### 编程基础
- TCP粘包/拆包问题的解决
> 主要是在应用层根据相应的协议来解决的，可以在每一行添加换行符，也可以在header头中添加传输数据的长度
- 阻塞
- 七层网络模型
- 手机号邮箱的正则表达
#### 框架
- tp5的工作原理
#### Linux
- shell脚本统计IP访问次数
```
cat test.txt | awk '{print $2}' | sort | uniq -c | sort -n -r | head -n 1

```
- crontab的使用
cron
#### 其他
- ES的算法
> TF/IDF算法 TF(词频)：搜索文本中的各个词条在文档中出现的次数，出现越多就越相关<br/>
>IDF（逆向文件频率）
- 电话的正则
- 邮箱的正则


