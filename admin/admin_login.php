<?php  

# =========================================
# 
# name:     admin/admin_login.php
# 
# =========================================
# 
# purpose:  this is the login page for the admin
#           in the admin dir. it changes the 
#           include areas
#           
#           
# 
# =========================================




// start session to access
// user variables IF logged in
session_start();

include ('../includes/config.inc.php');


// IF is logged in
// redirect to ADMIN index.php
// and avoid re-signing in.
if (isset($_SESSION['managerName'])) {
  header('location: index.php');
  exit();
}

// 
// IF user submitted a form post . submit,
// the global $_POST should be set with
// data from that form field, look below for the `form` element
// 
// set `$managerName` and `$managerPassword` to 
// the submitted form fields
// 

if (isset($_POST['adminUsername']) && isset($_POST['adminPassword'])) {

  $managerName      = preg_replace('#[^A-Za-z0-9]#i','',$_POST["adminUsername"]);
  $managerPassword  = preg_replace('#[^A-Za-z0-9]#i','',$_POST["adminPassword"]);

  # connect to database
  include ('../includes/connect.inc.php');

  // 
  // prepare a query, after connection to db
  // NOTICE current connection is NOT dependent
  // on the form submitted verification fields
  // 
  // this step makes sure this is a valid
  // registered admin user from the db.
  // 

  $result = mysqli_query($mysqli, 
  "SELECT *
  FROM 
    `admin` 
  WHERE 
    adminName='$managerName' 
  AND 
    adminPass='$managerPassword'
  LIMIT 
    1"); // end of sql

  // 
  // a variable that checks if any 
  // returns come from the query, 
  // if true || 1 
  // the grab admin id from the db and
  // assign that value to `$id`. - use it in the
  // following `if statement`.
  // 
  // remember a session variable must be 
  // known to allow access to `admin/index.php`
  // 

  $existCount = mysqli_num_rows($result);

  if ($existCount == 1) {

    // echo "admin login query count exists!";

    // 
    while ($row = mysqli_fetch_array($result)) {
      // grab users db id field value
      // 
      // new var = db var value
      $id = $row['adminId'];
      $description = $row['adminDescription'];
      // echo "foundn user id from query.";
    }

    // 
    // populate _SESSION variables 
    // known to allow access to `admin/index.php`
    // 

    $_SESSION['managerId'] = $id;
    $_SESSION['managerDescription'] = $description;
    $_SESSION['managerName'] = $managerName;
    $_SESSION['managerPassword'] = $managerPassword;

    // 
    // redirect user to access admin/index.php
    // 
    header('location: index.php');
    
    exit();

  } else {
    echo '<div style="position: fixed; top: 0; left: 0; width: 200px; z-ondex: 999;" class="alert alert-error">Information is incorrent, please try again <a href="index.php" title=""></a></div>';
    // exit out to prevent user from seeing
    // admin panel
    exit();
  }
}



# local / page variables
$page_title = 'Admin Login Page';
$page_description = "This is the $page_title demo page.";

# head
include ('../includes/head.inc.php');

// html5 nu checked

?>


<!--  ADMIN/ADMIN LOGIN
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section id="admin-login" class="section">
    <div class="container">
      <div class="row section-header">
        <h2 class="section-title text-info">Admin Login Page</h2>
      </div>
      <form method="post" action="admin_login.php">
        <div class="row">
          <div class="six columns offset-by-three panel">
            <div>
              <label for="adminUsername">Admin Username</label>
              <input class="u-full-width" type="text" placeholder="admin@mailbox.com" name="adminUsername" id="adminUsername">
            </div>
            <div>
              <label for="adminPassword">Admin Password</label>
              <input class="u-full-width" type="password" name="adminPassword" id="adminPassword">
            </div>
            <div>
              <input class="u-full-width button-primary" type="submit" name="submit_form">
            </div>
            <div>
              <input class="u-full-width" type="reset" name="reset_form">
            </div>
            <p>
              This is for Admin Users only, please log in <a href="<?php echo $baseDir; ?>login.php">here</a> if you are a regular user or go back to website <a href="<?php echo $baseDir; ?>home.php">homepage</a>.
            </p>
          </div>
        </div>
      </form>
    </div>
  </section>

<?php  
# close connection
mysqli_close($mysqli); 

include ('../includes/footer.inc.php');