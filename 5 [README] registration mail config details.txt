--------------------------------------------------------------------------------
ADD/OVERWRITE THIS SNIPPET IN php.ini LOCATED IN path/of/xampp/php/ DIRECTORY
--------------------------------------------------------------------------------

[mail function]

SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = vamsiedgroom@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"

--------------------------------------------------------------------------------
ADD/OVERWRITE THIS IN sendmail.ini LOCATED IN path/of/xampp/sendmail/ DIRECTORY
--------------------------------------------------------------------------------

[sendmail]

smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=vamsiedgroom@gmail.com
auth_password=edgroom@123
force_sender=vamsiedgroom@gmail.com

--------------------------------------------------------------------------------