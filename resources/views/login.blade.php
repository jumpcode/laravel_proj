@extends('layout')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="secure">Secure Login form</div>
<Form action='account/login' method='POST' 'id'='myform'>
<div class="control-group">
  <div class="controls">
     <input type="text" placeholder="Email" class="form-control span6">
  </div>
</div>
<div class="control-group">
  <div class="controls">
    <input type="password" class="form-control span6" placeholder="Please Enter your password">
  </div>
</div>
<button class="send-btn">Login</button>
</Form>

<script type="text/javascript">
$(document).ready(function(){
  $('.send-btn').click(function(){            
    $.ajax({
      url: 'login',
      type: "post",
      data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
      success: function(data){
        alert(data);
      }
    });      
  }); 
});
</script>