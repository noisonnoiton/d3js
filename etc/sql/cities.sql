create table cities_table (
	idx int(11) auto_increment,
	
	label char(20),
    population int(11) default '0',
    country char(20),
    x int(10) default '0',
    y int(10) default '0',
    
	primary key(idx)
);
-- insert into cities_table values('','label','population','country','x','y');
insert into cities_table values('','San Francisco','750000','USA','37','-122');
insert into cities_table values('','Fresno','500000','USA','36','-119');
insert into cities_table values('','Lahore','12500000','Pakistan','31','74');
insert into cities_table values('','Karachi','13000000','Pakistan','24','67');
insert into cities_table values('','Rome','2500000','Italy','41','12');
insert into cities_table values('','Naples','1000000','Italy','40','14');
insert into cities_table values('','Rio','12300000','Brazil','-22','-43');
insert into cities_table values('','Sao Paolo','12300000','Brazil','-23','-46');
