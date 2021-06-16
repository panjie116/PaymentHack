<?php 

require './includes/config.php';

session_start();





 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Payment page</title>

 	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="./css/main.css">

 </head>
 <body>
  

<h3>Payment page</h3>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary callMpamba" data-toggle="modal" data-target="#Mpamba">
  Mpamba
</button>
<button type="button" class="btn btn-primary callAirtel" data-toggle="modal" data-target="#Airtel">
  Airtel Money
</button>

<!-- Modal 1-->
<div class="modal fade" id="Airtel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Airtel money</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
			  <div class="form-group row">
			    <div class="col-sm-10">
			      <input type="text" class="form-control" placeholder="reference number" id="inputPassword">
			    </div>
			  </div>
			   <button type="button" class="btn btn-primary">Confirm payment</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>

<!-- Modal 2-->

<div class="modal fade" id="Mpamba" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">TNM Mpamba</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="reference number" id="inputPassword">
          </div>
        </div>
         <button type="button" class="btn btn-primary">Confirm payment</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

 </body>
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js" ></script>


<script>
$('.callAirtel').on('click',function(){
    $('.modal-body').load('GetAirtel.php',function(){
        $('#myModal').modal({show:true});
    });
});
</script>


<script>
$('.callMpamba').on('click',function(){
    $('.modal-body').load('GetMpamba.php',function(){
        $('#myModal').modal({show:true});
    });
});
</script>


 </html>