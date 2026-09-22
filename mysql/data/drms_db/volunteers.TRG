TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER after_volunteer_insert\n      AFTER INSERT ON volunteers\n      FOR EACH ROW\n      BEGIN\n          INSERT INTO activity_log (message, icon, color, createdAt, updatedAt)\n          VALUES (CONCAT(\'New volunteer registered: \', NEW.fullName), \'bi-person-plus\', \'text-success\', NOW(), NOW());\n      END'
sql_modes=1098907656
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='utf8mb4_general_ci'
created=1777360003994941
