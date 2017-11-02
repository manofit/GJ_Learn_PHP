<?php

//添加年，月，日，时，分，秒到一个日期
$date = date_create("2013-03-15");
date_add($date, date_interval_create_from_date_string("40 days"));
echo date_format($date, "Y-m-d");//2013-04-24 

//返回一个根据指定格式进行格式化的新的Datetime对象
$date = date_create_from_format("j-M-Y", "15-Mar-2013");
echo date_format($date, "Y/m/d");//2013/03/15 

//返回一个格式化日期的时间对象
$date = date_create("2013-03-15");
echo date_format($date, "Y/m/d");//2013/03/15 

//设置一个新的时间
$date = date_create();
date_date_set($date, 2020, 10, 30);
echo date_format($date, "Y/m/d");//2020/10/30 

//返回默认时区
echo date_default_timezone_get();//Asia/Shanghai

//设置默认时区
date_default_timezone_set("Asia/Shanghai");
echo date_default_timezone_get();//Asia/Shanghai

//返回两个日期之间的差值
$date1 = date_create("2013-03-15");
$date2 = date_create("2013-12-12");
$diff = date_diff($date1, $date2);
echo $diff->format("%R%a days");//+272 days 

//格式化时间间隔
echo date_interval_format($diff, "%R%a days");//+272 days 

//修改时间戳
$date = date_create("2013-05-01");
date_modify($date, "+15 days");
echo date_format($date, "Y/m/d");//2013/05/16

//从指定时间减去年，月，日，时，分，秒
$date = date_create("2013-03-15");
date_sub($date, date_interval_create_from_date_string("40 days"));
echo date_format($date, "Y-m-d");//2013-02-03 

//设置时间
date_time_set($date, 12, 20, 55);
echo date_format($date, "Y-m-d H:i:s");//2013-05-01 12:20:55

//修改时间戳
$date = date_create("2013-05-01");
date_modify($date, "+15 days");
echo date_format($date, "Y-m-d");

//返回unix时间戳
$date = date_create();
echo date_timestamp_get($date);//1495506703

//返回基于unix时间戳的日期和时间
$date = date_create();
date_timestamp_set($date, 1371803321);
echo date_format($date, "U = Y-m-d H:i:s");//1371803321 = 2013-06-21 04:28:41 

?>