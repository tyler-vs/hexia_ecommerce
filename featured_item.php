<?php  

# php config file
include ('includes/config.inc.php');

# local / page variables
$page_title = 'Featured Item';
$page_description = "This is the $page_title demo page. It contains the featured item.";

include ('includes/head.inc.php');

// html5 nu checked

?>

  <!-- Featured Item Template
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section id="featured" class="section">
    <div class="container">
      <div class="row section-header">
        <h1 class="section-title">Featured Item</h1>
      </div>

      <?php  


      if ( $result = mysqli_query($mysqli, "SELECT * FROM `products` WHERE Featured=1 LIMIT 1")) { 

        if ( $row = mysqli_fetch_assoc($result) ) {
          echo '
            <div class="row">
              <div class="seven columns featured-item">
                <h2 class="featured-item_title">' . $row['Name'] . ' <span class="text-muted">100% Headshots.</span></h2>
                <p>' . $row['Description'] . ' <a href="product.php?' . $row['Id'] . '">See Product Specs</a>.
                </p>
                <p>
                  <span class="old-price"> $' . $row['MSRP'] . '</span> <strong class="new-price"> $' . $row['Sale'] . '</strong>
                </p>
              </div>
              <div class="five columns">
                <a href="product.php?' . $row['Id'] . '">
                  <img src="' . $row['Image'] . '" alt="an image of a cool product." class="u-max-full-width" />
                </a>
              </div>
            </div>';

            
        } else {
          echo '<div class="alert alert-error">No Featured Items.</div>';
        }
      }


      ?>
      
      <!-- <div class="row">
        <div class="seven columns featured-item">
          <h2 class="featured-item_title">The Autobot Gearbox. <span class="text-muted">100% Headshots.</span></h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil praesentium dignissimos cupiditate ad suscipit aut tempora repellat quis animi eos, eius corporis illo cumque, corrupti mollitia libero maiores modi quam.</p>
          <p>
            <span class="old-price">$549.99</span> <strong class="new-price text-muted">Now $449.99</strong>
          </p>
          <p><button class="button-primary">See specs</button></p>
        </div>
        <div class="five columns">
          <a href="#">
            <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/307033/10.jpg" alt="an image of a cool product." class="u-max-full-width" />
          </a>
        </div>

      </div> -->
    </div>
  </section>




<?php

# close connection
mysqli_close($mysqli); 
// $mysqli -> mysqli_close();
// echo "connection closed";

include ('includes/footer.inc.php');