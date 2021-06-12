<?php 







 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Payment page</title>

 	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

 </head>
 <body>
  

<h3>Payment page</h3>


<form>
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
        <option disabled selected hidden >choose payment</option>
        <option value="1">Mpamba</option>
        <option value="2">Airtel money</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary">Change</button>
    </div>
  </div>
</form>

 </body>
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js" ></script>


 </html>