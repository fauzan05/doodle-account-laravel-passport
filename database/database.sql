use simple_todolist;
show tables;
select * from users;
select * from categories;
select * from todos;
delete from categories where id = 1;
rollback;
drop database simple_todolist;