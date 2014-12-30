create or replace function verifProgrammation (text,int,text,int) returns integer 
as
'
  declare f_titre alias for $1;
  declare f_salle alias for $2;
  declare f_seance alias for $3;
  declare f_client alias for $4;
  declare retour integer;
  declare id integer;
  declare id2 integer;
begin
    retour=1;
    select into id id_prog from programmation where pfilm = f_titre and psalle=f_salle and pseance=f_seance;
    if found then
        select into id2 id_ticket from ticket where id_prog = id;
        if found then
            insert into achat (id_client, id_ticket,date_achat) values (f_client, id2, CURRENT_DATE);
        else
            retour=0;
        end if;
    else
        retour=0;
    end if;
  
  return retour;
end;
'
language 'plpgsql';
