<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row alert"  style="margin: 10px">
      <div class="alert alert-success" style="display:none"></div>
      <div class="alert alert-error" style="display:none"></div>
  </div>
  <h2> <?=$title?></h2>
  <form class="form-horizontal" action="<?=$action?>" method="POST" id="frm_student">
    <input type="hidden" class="form-control" id="id" name="id" value=<?=$fields["id"]?>>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name :</label>
      
      <div class="col-sm-7">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value=<?=$fields["name"]?>>
      </div>
      <div class="col-sm-3">
      </div>

    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email :</label>
      <div class="col-sm-7">          
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value=<?=$fields["email"]?>>
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact :</label>
      <div class="col-sm-7">          
        <input type="text" class="form-control" id="contact" placeholder="Enter Contact" name="contact" value=<?=$fields["contact"]?>>
      </div>
      <div class="col-sm-3">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" id="btn_submit" class="btn btn-default">Submit</button>
        <a href="<?=base_url("student") ?>" class="btn btn-primary">Cancel</a>
      </div>
    </div>
  </form>
</div>

<script> 
var API_BASEPATH="http://127.0.0.1/rnd/agondaliya/marwadi/resetapi/api";
var SITE_BASEPATH="http://127.0.0.1/rnd/agondaliya/marwadi/resetapi";
var MODULE="student";
$(document).ready(function(){
    var init=function(){
      $(".alert-success").hide();
      $(".alert-error").hide();
    }

    $("#btn_submit").click(function(){
      requestFunction();
    });
    var requestFunction=function(){
        
      console.log( $( "#frm_student" ).serializeArray() );
      var formdata=$( "#frm_student" ).serializeArray();
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_BASEPATH+"/student",
            "method": "POST",
            "headers": {
                "Content-Type": "application/x-www-form-urlencoded",                
                }            
            };
            settings.data=formdata;
            $.ajax(settings).done(function (response) {
               console.log(response);
               if(response.status=="success"){
                  $(".alert-success").html("Recored added successfully");
                  $(".alert-success").show()
                  setTimeout(function() {
                    location.href=SITE_BASEPATH+"/"+MODULE;
                  }, 1000);   
               }else{
                  $(".alert-error").html(response.msg);
                  $(".alert-error").show()
               }
            });
    }
    init();
    

    
});
</script>
</body>
</html>
