# start session to access session variables
// session_start();


if (!isset($_SESSION['manager'])) {
  // goes to admin/index.php NOT _base_dir_/index.php
  header('location: index.php');
  exit();
}


// if ( $result = mysqli_query($mysqli, "SELECT * FROM `products` WHERE Featured=1 LIMIT 1")) { 
// if ( $row = mysqli_fetch_assoc($result) ) {

# conditional to check for submit button from `admin login form`

if (isset($_POST['adminUsername']) && isset($_POST['adminPassword'])) {

  # grab entered data from the `admin sign in` `form`

  $managerName      = preg_replace('#[^A-Za-z0-9]#¡','',$_POST["adminUsername"]);
  $managerPassword  = preg_replace('#[^A-Za-z0-9]#¡','',$_POST["adminPassword"]);

  # php config file
  # allows connection to mysql
  

  $result = mysqli_query($mysqli, "SELECT * FROM `admin` WHERE adminName='$managerName' AND adminPass='$managerPassword' LIMIT 1");

  # see if this admin user is in the database

  $existCount = mysql_num_rows($result);

  # if user IS an admin, then use `while` to add SESSION variables
  # for consisitent variables.
  if ($existCount == 1) {

    while ( $row = mysqli_fetch_assoc($result) ) {
      $id = $row['id'];
    }

    # add admin db info to SESSION variables
    $_SESSION['id'] = $id;
    $_SESSION['manager'] = $managerName;
    $_SESSION['password'] = $managerPassword;

    header('location: index.php');
    exit();

  } else {
    echo "Does not work";
    exit()
  }
}



$existCount = mysql_num_rows($result);



# check to see if this manager / admin actually exists or not.