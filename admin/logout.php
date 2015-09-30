<?php 


print_r($_SESSION);


session_destroy();



print_r($_SESSION);

echo 'You are logged out!. <a href="admin_login.php" title="">Log back in</a>';

// $w1 = new EvTimer(2, 0, function(){
//   header('location: admin_login.php');
// });


// Ev::run(Ev::RUN_ONCE);


