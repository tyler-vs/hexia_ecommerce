<?php 

# ========================================= #\
# 
#   NOT USED NOW.
# 
# ========================================= #\
# 
# 
# name:     includes/connect.inc.php
# 
# =========================================
# 
# purpose:  this file allows a connection via mysql
#           to connect to the database
#           
#           **please revise when moving the location of database. **
# 
# ========================================= #/

// 
// this allows a connection but does not
// interact with the submitted username or password
// with login forms ... yet :[.
// 

# 
# #mysql_connect variables
#

$db_servername  = 'localhost';
$db_name        = 'hexia_db_2';
$db_username    = 'ecom_dev';
$db_password    = 'knights4321';



# 
# #mysql connect
# 

$mysqli = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

if (mysqli_connect_errno($mysqli)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
  // echo "db connection success";




















