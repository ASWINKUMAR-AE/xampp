TYPE=VIEW
query=select `v`.`volunteerId` AS `volunteerId`,`v`.`fullName` AS `fullName`,`c`.`centreId` AS `centreId`,`c`.`centreName` AS `centreName`,`c`.`location` AS `location` from (`drms_db`.`volunteers` `v` join `drms_db`.`centres` `c` on(`v`.`centre_id` = `c`.`centreId`))
md5=726786f6cfcc863db41b21de7cf0cc47
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=0001777360003983504
create-version=2
source=SELECT \n          v.volunteerId,\n          v.fullName,\n          c.centreId,\n          c.centreName,\n          c.location\n      FROM volunteers v\n      JOIN centres c ON v.centre_id = c.centreId
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `v`.`volunteerId` AS `volunteerId`,`v`.`fullName` AS `fullName`,`c`.`centreId` AS `centreId`,`c`.`centreName` AS `centreName`,`c`.`location` AS `location` from (`drms_db`.`volunteers` `v` join `drms_db`.`centres` `c` on(`v`.`centre_id` = `c`.`centreId`))
mariadb-version=100432
