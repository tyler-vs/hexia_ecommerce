<?php  

# =========================================
# 
# name:     admin/inventory_list.php
# 
# =========================================
# 
# purpose:  this is an `admin page` that lists out
#           the inventory from the d.b.
#           
#           
# 
# =========================================


// start the session required,
// 
session_start();


// include env. variables and functions
// 
include ('../includes/config.inc.php');


// check to see if user account has
// a session started, 
// 
if (!isset($_SESSION['managerName'])) {
  // redirect to admin_login.php
  // `if` SESSION manager is not avail.
  // 
  header('location: admin_login.php');
  // stop executing script
  // 
  exit();
}

// debugging var must be on
// 




// secuity:
// check that manager session value is in the database.
// 
// 
// maybe use an array here, foreach ???
// 

// safe way - null
// $managerDescription  = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["managerDescription"]);
// 
// $managerDescription  =  $_SESSION["managerDescription"]; // unsafe

$managerID = preg_replace('#[^0-9]#i','',$_SESSION["managerId"]);

$managerName      = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION["managerName"]);
$managerPassword  = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION["managerPassword"]);


# php config file, connect to d.b.
include ('../includes/connect.inc.php');

// $result = mysqli_query($mysqli, 
//   "SELECT *
//   FROM 
//     `admin` 
//   WHERE 
//     adminName='$managerName'
//   AND 
//     adminPass='$managerPassword'
//   LIMIT 
//     1");

// $existCount = mysqli_num_rows($result);


// // 
// // if no one in that query is found then send an error message
// // and exit
// // 
// if ($existCount == 0) {
//   echo '<div style="position: fixed; top: 0; left: 0; width: 200px; z-ondex: 999;" class="alert alert-error">Information is incorrent, please try again <a href="index.php" title=""></a></div>';
//   exit();
// }


##
#
# product list
#
#
##


$product_list = '';

$result = mysqli_query($mysqli, "SELECT * FROM `products`");

$productCount = mysqli_num_rows($result);

if ($productCount > 0) {
  while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    // concatenate,
    $product_list .= "$id <br>";
  }
} else {
  $product_list = '<div style="position: fixed; top: 0; left: 0; width: 200px; z-ondex: 999;" class="alert alert-error">you have no products in the db.</div>';
}



if ($Dbugging == true) {
  // 
  // reafs out variables
  // for given variable for paramenter 
  // 
  readOut($product_list);
}


# local / page variables
$page_title = 'Admin Inventory List Page';
$page_description = "This is the $page_title demo page.";

# head
include ('../includes/head.inc.php');

?>


<!-- Admin All Inventory Section Template
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section id="admin-inventory" class="section">
    <div class="container">
      <div class="row section-header">
        <h2 class="section-title"><span class="text-muted"><?php echo $managerName; ?>'s</span> Inventory</h2>
      </div>
      <div class="row">
        <div class="five columns panel">
          <h2>all inventory.</h2>
          <hr>
          <?php echo $product_list; ?>
          <hr>
          <a href="logout.php" class="button">Logout Unset</a>
        </div>
        <div class="seven columns">
          <p>nothing on this side yet.</p>
        </div>
      </div>
    </div>
  </section>

<?php  
# close connection
mysqli_close($mysqli); 
# grab footer
include ('../includes/footer.inc.php');