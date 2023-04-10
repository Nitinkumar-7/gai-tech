<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>HOME-PAGE</title>

  </head>
  <body>

    <?php 
    // navigationbar file is include here for navigation bar 
    @include 'navigationbar.php';
  
   
 $_SESSION['u_id'];
   
 $_SESSION['user_name'] ;
   
 $_SESSION['phone'];
    
   $_SESSION['registered'];

    // include file for slider 
   @include 'slider.php';
   
    $_SESSION['role_id'];
    ?>

    <!-- this is code for slider -->

    <!-- main section is added here  -->
    <main>

      <!-- top brand heading section  -->
      <h2>
        TOP BRAND
      </h2>

      <!-- brand image with aside text  -->
      <div class="brand_division">

        <section class="brandimg brand">
          <img class="banner" src="images/banner2.jpg" alt="">
        </section>

        <section class="brandtext brand">
          <h4>FASHION</h4>
          <p class="brand_paragraph"> off upto 65% </p>
        </section>

      </div>

      <!-- deals of the day heading section  -->
      <h2>
        DEALS OF THE DAY
      </h2>

      <!-- this section holds the best deals for customers  -->
      <section class="deals">

        <a href="women.php">
          <article class="division5 division ">
            <img
              src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/5d1b7ad3-c3ed-4ef9-a654-18231743d3cd1651484798059-Anouk-Inddus.jpg"
              alt="product" class="productdeal">
          </article>
        </a>

        <a href="women.php">
          <article class="division1 division">
            <img
              src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/f7575784-edbf-411f-acc0-51891ea7f4331651484798329-Inddus-_Varanga.jpg""
              alt="product" class="productdeal">
          </article>
        </a>

        <a href="women.php">
          <article class="division2 division">
            <img
              src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/ce40419d-6408-404e-9320-96e41aee1b791651484798300-Hrx-_Puma_-_More.jpg""
              alt="product" class="productdeal">
          </article>
        </a>

        <a href="men.php">
          <article class="division3 division">
            <img
              src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/764761e7-c505-459e-92a2-6c4387f9e2511651484798319-Hush_Puppies-_Arrow.jpg"
              alt="product" class="productdeal">
          </article>
        </a>

        <a href="men.php">

          <article class="division4 division">
            <img
              src="https://assets.myntassets.com/f_webp,w_140,c_limit,fl_progressive,dpr_2.0/assets/images/2022/5/2/2f424664-e746-4af1-b0e1-366ccb0f2c681651484798552-Red_Tape.jpg""
              alt="product" class="productdeal">
          </article>
        </a>
      </section>

      <!--- THIS IS HTML SECTION FOR CIRCLE IMAGES  .......................                    -->
      <h2>
        CATOGRIES TO BAGS
      </h2>

      <section class="catagories">
        <section class="flexcircles">
          <a href="women.php">
            <article class="box">
              <img src="images/fassion.jpg" alt="product" class="productimg">
              <div class="productname">GIRL TOPS</div>
            </article>
          </a>

          <a href="men.php">
            <article class="box">
              <img src="images/menroyal.jpg" alt="product" class="productimg">
              <div class="productname">SHERWANI</div>
            </article>
          </a>

          <a href="men.php">
            <article class="box">
              <img src="images/mblackcoat.jpg" alt="product" class="productimg">
              <div class="productname">COAT-PANT</div>
            </article>
          </a>

          <a href="women.php">
            <article class="box">
              <img src="images/lady.jpg" alt="product" class="productimg">
              <div class="productname">DRESSES</div>
            </article>
          </a>
          <!-- </section>
          <section class="flexcircles"> -->
          <a href="men.php">
            <article class="box">
              <img src="images/nike.jpg" alt="product" class="productimg">
              <div class="productname">SHOE</div>
            </article>
          </a>

          <a href="women.php">
            <article class="box">
              <img src="images/wladybagsbrown.jpg" alt="product" class="productimg">
              <div class="productname">LADIES-BAGS</div>
            </article>
          </a>

          <a href="men.php">
            <article class="box">
              <img src="images/mformalshirtsmultiple.jpg" alt="product" class="productimg">
              <div class="productname">SHIRT</div>
            </article>
          </a>

          <a href="kids.php">
            <article class="box">
              <img src="images/kcutedress.jpg" alt="product" class="productimg">
              <div class="productname"> KIDS WEAR</div>
            </article>
          </a>
        </section>
      </section>
    </main>
    <!-- main section ends  -->

    <!-- footer section  -->
    <?php
    @include 'footer.php';
    ?>
    <!-- footer ends  -->


  </body>
</html>
