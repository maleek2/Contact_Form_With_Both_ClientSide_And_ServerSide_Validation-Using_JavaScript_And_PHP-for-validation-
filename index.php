<?php 
/*method 1.

N/B; The PHP tags for this method are commentend in the HTML tags.So make sure to uncomment it if you are using this method!! 
You can find the commented PHP code on line 94, 100,108 and 114.
.
.
.
.
print_r($_POST); 
$email_error=''; 
$subject_error=''; 
$content_error=''; 
$output=''; 

if(isset($_POST["submit"])){
  if(empty($_POST["email"])){
    $email_error="<p>Please Enter Email Address</p>";
  }
  else{
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
      $email_error="<p>Invalid Email format</p>";
    }
  }
  if(empty($_POST["subject"])){
    $subject_error="<p>Please Enter a subject</p>";
  }
  if(empty($_POST['content'])){
    $content_error="<p>Please Enter a content</p>"; 
  }
  if($email_error==""&&$subject_error==""&&$content_error==""){
    $output='<p><label> OutPut </label></p>
    <p>Email is'.$_POST["email"].'</p>
    <p> Subject is'.$_POST["subject"].'</p>
    <p> Subject is'.$_POST["content"].'</p>'; 

  }
   
 
}*/


$error =""; 
if($_POST){
 if(!$_POST["email"]){
   $error.=("An email address is required.<br>"); 
 }
 else{
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    $error="<p>Invalid Email format</p>";
  }
}
 if(!$_POST["subject"]){
  $error.=("A subject wasn't entered.<br>"); 
}
if(!$_POST["content"]){
  $error.=("Content is empty.<br>"); 
}

if($error !=""){
  $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>'.$error.'</div>'; 
}



}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript"src="Jquery/jquery.min.js"> </script>
</head>
<body>
<div class="container">
  <div id ="error">
  <?php echo $error; ?>
  </div>
  
  <h1> Get in touch with Me!!! </h1>
  <form method="post">

    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      <span class="text alert-danger"><?php //echo $email_error;?></span>
    </div>

    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" id="subject" placeholder="Enter Title" name ="subject">
      <span class="text-danger"><?php //echo $subject_error;?></span>
    </div>



    <div class="form-group">
      <label for="text">Ask Me anything!!</label>
      <textarea class="form-control" id="content" rows="3" name="content"></textarea>
      <span class="text danger"><?php //echo $content_error;?></span>
    </div>


    <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
    <div class="text-danger"> 
      <?php //echo $output; ?>
    </div>
  </form>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script type="text/javascript">
  
$("form").submit(function(e){
        e.preventDefault();

        var error = ""; 
        if($("#subject").val()==""){
          error += "<p> The subject field is required</p>"; 
        }
        if($("#content").val()==""){
          error += "<p> The content field is required</p>"; 
        }
        if($("#email").val()==""){
          error += "<p> The email field is required</p>"; 
        }
        if(error!=""){
          $("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s) in your form:</strong>'+error+' </div>'); 
        }
        else{

          $("form").unbind("submit").submit();
          //unbinding the submit fuction created on line 43; 
        }
       
    });


 
  
  </script>
  
</body>
</html>