<!-- previous and next buttons -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>firstpage</title>

  </head>
 
  <body>
 
 <!-- slider html code  -->
 <div class="slideshow-container">

<!-- images are added for the slider  -->
<div class="mySlides fade">
  <img class="slideimg" src="images/banner-1.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-2.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-3.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-4.webp">
</div>

<div class="mySlides fade">
  <img class="slideimg" src="images/banner-5.webp">
</div>
</div>

<br>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
<!-- nevigation dots  -->
<div style="text-align:center">
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>

</div>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

</script>
</body>
</html>
