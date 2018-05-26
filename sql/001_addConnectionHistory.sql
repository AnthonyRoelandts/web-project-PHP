create table membre_connections
(
  id int auto_increment primary key,
  membre_id int not null,
  start datetime not null,
  end datetime null,
  constraint FK_MEMBRE foreign key (membre_id) references membre (id)
)
;

create index FK_MEMBRE
  on membre_connections (membre_id)
;