
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">      <link rel="stylesheet" href="css/animate.min.css">
      
  

<h1>Scroll to trigger the effects</h1>

<div class="scroll-animation revealedBox goRight">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-4.jpg" alt="image" />
  <span></span> 
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox goLeft">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-1.jpg" alt="image" />
  <span></span> 
  <span></span>  
  <span></span>  
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox goRight">
  <div class="contentBox"><p>It also work with text (or any) box</p></div>
  <span></span> 
  <span></span>  
  <span></span> 
  <span></span> 
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox goTop">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-3.jpg" alt="image" />
  <span></span> 
  <span></span> 
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox goBottom">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-2.jpg" alt="image" />
  <span></span> 
  <span></span>  
  <span></span> 
  <span></span> 
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox goRight">
  <div class="contentBox"><p>Just add "revealedBox" and "go/back+Direction" classes on your DIV, and place .contenu with max five span inside</p></div>
  <span></span> 
  <span></span>  
  <span></span> 
  <span></span> 
  <span></span>  
 </div> 

<h1>Scroll more to discover more effects</h1>

<div class="scroll-animation revealedBox backRight">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-4.jpg" alt="image" />
  <span></span> 
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox backLeft">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-1.jpg" alt="image" />
  <span></span> 
  <span></span>  
  <span></span>  
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox backBottom">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-3.jpg" alt="image" />
  <span></span> 
  <span></span>  
  <span></span>  
  <span></span>  
  <span></span>  
 </div> 

<div class="scroll-animation revealedBox backTop">
  <img class="contentBox" src="http://lorempixel.com/output/cats-q-c-640-480-2.jpg" alt="image" /> 
  <span></span>  
 </div> 

<h1>Thank you for watching&nbsp;!</h1>
<script>
$('.revealedBox').each(function(i){ 

var childrenSpan = $(this).children('span').length;

$(this).addClass('childrenSpan-' + childrenSpan);  

if($(window).scrollTop() + $(window).height() > $(this).offset().top + $(this).outerHeight() ){ 
  $(this).addClass('revealedBox-in');       
}   

}); 

$(window).scroll(function() { 
$('.revealedBox').each(function(i){  
if($(window).scrollTop() + $(window).height() > $(this).offset().top ){ 
  $(this).addClass('revealedBox-in');       
}   
}); 

});


</script>