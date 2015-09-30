<?php 

# !! !! !! NOT USED !! !! !!
# =========================================
# 
# NAME:     QUERY_SETUP.PHP
# 
# =========================================
# 
# purpose:  DEMO PHP SCRIPTS THAT MAY BE USED IN FUTURE
#           DATABASE CREATION.
#           
#           
# 
# ========================================= #/

// 
// variables

$errorMessage = "";



// start with an empty variable for db returns
$queryReturn = "";

// prepare the query
$sqlQuery = "SELECT * FROM `products`";

// see if there are any items from the query

$queryItems = mysql_num_rows($sqlQuery);


if ($queryItems > 0) {
  while ($row = mysql_fetch_assoc($sqlQuery)) {
    // 
    // output the query item returns here
    // 
    $productId              = $row['Id'];
    $productName            = $row['Name'];
    $productSKU             = $row['SKU'];
    $productDescription     = $row['Description'];
    $productImage           = $row['Image'];
    $productPrice           = $row['Price'];
    $productSale            = $row['Sale'];
    $productStock           = $row['Stock'];
    $productCost            = $row['Cost'];
    $productReviews         = $row['Review'];
    $productRating          = $row['Rating'];
    $productLikes           = $row['Likes'];
    $productDuration        = $row['Duration'];


  }
} else {
  $errorMessage = "There Are No Items from your Query.";
}












# 