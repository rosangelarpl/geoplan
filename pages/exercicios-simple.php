<?php
include_once "classes/Banco.php";
?>

<div class="section-exercicios spad">
  <div class="container">


<script type="text/javascript">
 
 $(document).ready(function() {
    $('label').click(function() {
        $('label').removeClass('worngans');
        $(this).addClass('worngans');
    });
});

</script>

<div class="scp-quizzes-main">
<div class="scp-quizzes-data">
  <h3>1. What is the output of the below c code?</h3>
    <pre>#include&lt;stdio.h> 
main() 
{
   int x = 5;
   
   if(x=5)
   { 
      if(x=5) printf("Fast");
   } 
   printf("learning");
}</pre>
<br/>
    <input type="radio"  name="question1">
       <label>1. Fastlearning</label><br/>
    
    <input type="radio" id="Fa" name="question1">
       <label for="Fa">2. learning</label><br/>
    
    <input type="radio" name="question1">
       <label>3. learningFast</label> <br/>
    
    <input type="radio" name="question1">
     <label>4. Fast</label> 
 </div>

  </div>
</div>

