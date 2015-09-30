<?php 


# ========================================= #\
# 
# name:     config.inc.php
# 
# =========================================
# 
# purpose:  setup environment variables
#           for the e-commerce store.
#           
#           mysql db connect
#           
#           
#           written in procedural!
# 
# directory:
# 
#           - #site variables
#           - #mysql_connect variables
#           - #mysql connect
# 
# ========================================= #/



# CHANGE THIS WHEN GOING LIVE!
# this will change relative links for `src` and `href`
# to absolute links, great when using admin/ directory
$baseDir = 'http://localhost:8888/individual_assignment_3_v.2/dig4530c_hexia_ecommerce/';


// $Dbugging for debug output function
// 
// set to false to turn off.
$Dbugging = 'true';

function readOut($var) {
  echo '<div style="font-size: 12px; position: fixed; bottom: 0; right: 0; max-width: 300px; height: 200px; z-index: 999; background: #101010; color: #d7d7d7; padding: 10px; margin: 0; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;">';
  echo "<pre>";
  print_r($var);
  echo "</pre>";
  echo '</div>';
}


# #site variables
$site_title = 'Hexia Monthly';
$site_author = 'HexiaAdminBossGuy';

