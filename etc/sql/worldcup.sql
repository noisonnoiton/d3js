create table worldcup_table (
	idx int(11) auto_increment,
	
	team char(20),
	region char(20),
	win int(10) default '0',
	loss int(10) default '0',
	draw int(10) default '0',
	points int(10) default '0',
	gf int(10) default '0',
	ga int(10) default '0',
	cs int(10) default '0',
	yc int(10) default '0',
	rc int(10) default '0',
	primary key(idx)
);
-- insert into worldcup_table values('','team','region','win','loss','draw','points','gf','ga','cs','yc','rc');
insert into worldcup_table values('','Netherlands','UEFA','6','0','1','18','12','6','2','23','1');
insert into worldcup_table values('','Spain','UEFA','6','0','1','18','8','2','5','8','0');
insert into worldcup_table values('','Germany','UEFA','5','0','2','15','16','5','3','10','1');
insert into worldcup_table values('','Argentina','CONMEBOL','4','0','1','12','10','6','2','8','0');
insert into worldcup_table values('','Uruguay','CONMEBOL','3','2','2','11','11','8','3','13','2');
insert into worldcup_table values('','Brazil','CONMEBOL','3','1','1','10','9','4','2','9','2');
insert into worldcup_table values('','Ghana','CAF','2','2','1','8','5','4','1','12','0');
insert into worldcup_table values('','Japan','AFC','2','1','1','7','4','2','2','4','0');