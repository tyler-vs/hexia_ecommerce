<?php  

# php config file + php mysql connect
include ('includes/config.inc.php');




# local / page variables
$page_title = 'Homepage';
$page_description = "This is the $page_title demo page.";

# head html
include ('includes/head.inc.php');


?>

  <!-- <section id="hero" class="section">
    <div class="container">
      <div class="row">
        <div class="six columns">
          <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/307033/10.jpg" alt="" class="u-full-width">
        </div>
        <div class="six columns">
          <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/307033/10.jpg" alt="" class="u-full-width">
        </div>
      </div>
    </div>
  </section> -->



  <!-- Demo Section Template
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section id="demo" class="section">
    <div class="container">
      <div class="row section-header">
        <h2 class="section-title">Hexia Monthly</h2>
      </div>

      <div class="row">
        

        <div class="six columns">
          <p>
          Maecenas imperdiet interdum purus, ac tempor magna ornare ut. Fusce vel arcu ante. Suspendisse facilisis quam malesuada elit pharetra hendrerit. Morbi aliquam, justo at varius dignissim, lectus lacus vehicula dolor, elementum elementum urna ex et neque. Integer iaculis laoreet euismod. Sed rutrum urna quam. Curabitur pretium molestie turpis, in facilisis purus molestie in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras non aliquam nisi.
        </p>
        <p>
          Donec nunc dui, mollis ut egestas non, tempor porttitor orci. Proin eget purus lacus. Fusce posuere odio lorem, non tincidunt tortor sodales sit amet. Ut tempor tortor lectus, ut euismod velit maximus vitae. Ut sodales, velit sit amet iaculis faucibus, libero tellus aliquam nisl, non feugiat quam ex nec nulla. Vivamus odio urna, vulputate id efficitur quis, maximus vitae lacus. Donec a nulla rhoncus diam imperdiet hendrerit. Suspendisse sed finibus tortor.
        </p>
        <p>
          Proin elementum lectus urna, quis placerat quam facilisis nec. Etiam et feugiat quam. Donec augue eros, tempor sit amet urna eu, dignissim accumsan odio. Aliquam placerat dictum felis quis rutrum. Sed accumsan augue non lorem elementum, eget tempor felis gravida. Cras maximus, nisi non mollis hendrerit, augue orci efficitur justo, vitae imperdiet purus risus id justo. In turpis neque, imperdiet quis mollis at, iaculis ac lorem. Fusce non hendrerit dolor, eu mattis odio. Nulla ullamcorper pulvinar ultrices. Pellentesque tincidunt eget lorem vel rutrum. Etiam ac dolor aliquet, dignissim tellus nec, cursus mauris.
        </p>
        <p>
          Mauris pellentesque mauris ac metus porttitor, at bibendum lectus tincidunt. Etiam congue rutrum mi non dignissim. In quam orci, congue non scelerisque.
        </p>
        </div>
        <div class="six columns">
          <img src="<?php echo $baseDir; ?>img/demo.jpg" alt="" class="u-full-width">
          <img src="<?php echo $baseDir; ?>img/demo.jpg" alt="" class="u-full-width">
        </div>
      </div>
    </div>
  </section>


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
      
    </div>
  </section>


  <!-- Catalog Template
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section id="catalog" class="section">
    <div class="container">
      <div class="row section-header">
        <h1 class="section-title">Catalog</h1>
      </div>


      <div class="row">
        <ul class="catalog-list u-cf">


        <?php  


        // while( $row = mysqli_fetch_assoc($result) ) {
        //   echo '<li class="four columns catalog-item panel">
        //     <!-- product image -->
        //     <a href="#">
        //       <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/307033/10.jpg" alt="" class="u-max-full-width" />
        //     </a>
        //     <div class="catalog-item_detail">
        //       <div>
        //         <a href="#"> ' . $row['Name'] . '</a>
        //       </div>
        //       <div class="price-tag">
        //         <span class="old-price"> $' . $row['MSRP'] . '</span> <strong class="new-price"> $' . $row['Sale'] . '</strong>
        //       </div>
        //       <p>' . $row['Description'] .'</p>
        //       <p>
        //         <button class="button-primary u-full-width">Product Page</button>
        //       </p>
        //       <ul class="stats u-full-width">
        //         <li><a href="#">1,056 <span>Likes</span></a></li>
        //         <li><a href="#">5 <i class="fa fa-star"></i> <span>Rating</span></a></li>
        //         <li><a href="#">316 <span>Reviews</span></a></li>
        //       </ul>
        //     </div>
        //   </li>';  
        // }

        ?>


          <li class="four columns catalog-item panel">
            <a href="#">
              <img src="<?php echo $baseDir; ?>img/demo.jpg" alt="" class="u-max-full-width" />
            </a>
            <div class="catalog-item_detail">
              <div>
                <a href="#">3 Month Subscription</a>
              </div>
              <div class="price-tag">
                <span class="old-price">$55.00</span> <strong class="new-price"><sup>$</sup>49.99</strong>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione consequatur temporibus asperiores, qui ipsa ab eius, laborum.</p>
              <p>
                <button class="button-primary u-full-width">Product Page</button>
              </p>
              <ul class="stats u-full-width">
                <li><a href="#">1,056 <span>Likes</span></a></li>
                <li><a href="#">5 <i class="fa fa-star"></i> <span>Rating</span></a></li>
                <li><a href="#">316 <span>Reviews</span></a></li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
      <!-- pagination here -->
    </div>
  </section>


  <!-- Demo Section Template
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <section id="demo" class="section">
    <div class="container">
      <div class="row section-header">
        <h2 class="section-title">Section Title</h2>
      </div>
      <div class="row">
        <p>
          <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga amet quae ducimus sed quasi itaque architecto recusandae aspernatur nihil excepturi, non id maiores officia repellat debitis tempore, velit sunt voluptatibus.</span>
          <span>Deleniti eum ut cupiditate vel autem itaque, quibusdam nam earum aliquam ipsum obcaecati dicta, mollitia doloremque pariatur dolore quisquam a molestias sed corporis nulla voluptatem quam debitis harum. Alias, odio.</span>
          <span>Aspernatur nesciunt maxime in expedita quod vitae officia quo, incidunt minima voluptatibus consequuntur at iure sit sunt, non veritatis quidem maiores dicta deserunt adipisci alias nobis! Sint similique ullam illo.</span>
          <span>Ducimus quaerat enim saepe blanditiis nulla asperiores, inventore vel laborum dolor, officia facere ut itaque explicabo. Soluta, quis maiores commodi sapiente voluptate, amet repudiandae. Libero voluptates neque ad ducimus porro!</span>
        </p>
      </div>
    </div>
  </section>


<?php

# close connection
mysqli_close($mysqli); 
// $mysqli -> mysqli_close();
// echo "connection closed";

include ('includes/footer.inc.php');