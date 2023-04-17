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

<div class="mySlides fade">
  
  <img src="images/banner-5.webp" style="width:100%">
  
</div>

<div class="mySlides fade">

  <img src="images/banner-4.webp" style="width:100%">
  
</div>

<div class="mySlides fade">
  
  <img src="images/banner-3.webp" style="width:100%">
 
</div>

<div class="mySlides fade">
  
  <img src="images/banner-2.webp" style="width:100%">
  
</div>

<div class="mySlides fade">
  
  <img src="images/banner-1.webp" style="width:100%">
  
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<script>
  //Initializes a variable "slideIndex" to keep track of the current slide.
let slideIndex = 0;
showSlides();
function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    // Hides all the slides by setting their display property to "none".
    slides[i].style.display = "none";  
  }
  //Resets "slideIndex" to 1 if it becomes greater than the number of slides.
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    // Updates the display property of the current slide and its corresponding dot to "block" and adds "active" class to the dot for styling.
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

// Takes a parameter "n" to specify the number of slides to move forward or backward.
function plusSlides(n) {
  // Updates the "slideIndex" variable accordingly.
  slideIndex += n;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (slideIndex > slides.length) {slideIndex = 1}
  if (slideIndex < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  // Hides all the slides and removes "active" class from all the dots.
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  // Displays the current slide and adds "active" class to its corresponding dot.
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

// Takes a parameter "n" to specify the slide number to navigate to.
function currentSlide(n) {
  // Updates the "slideIndex" variable accordingly.
  slideIndex = n;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (slideIndex > slides.length) {slideIndex = 1}
  if (slideIndex < 1) {slideIndex = slides.length}
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




