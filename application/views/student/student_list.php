
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    
    <div class="row"  style="margin: 10px">
        <div class="col-sm-8">
                <h4>Manage Student</h4>
        </div>
        <div class="col-sm-4">
            <a href="" id="lnk" class="btn btn-success">Add</a>
        </div>
    </div>
    <div class="row">
    
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Action</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
            </thead>
            <tbody id="tbl_body">
               
            </tbody>
        </table>
    </div>
</div>

<script> 
var API_BASEPATH="http://127.0.0.1/rnd/agondaliya/marwadi/resetapi/api";
var SITE_BASEPATH="http://127.0.0.1/rnd/agondaliya/marwadi/resetapi";
var MODULE="student";
$(document).ready(function(){

    var requestFunction=function(){
        
        $("#lnk").attr("href",SITE_BASEPATH+"/"+MODULE+"/create");
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": API_BASEPATH+"/student",
            "method": "GET",
            "headers": {
                "Content-Type": "application/x-www-form-urlencoded",                
                }
            }

            $.ajax(settings).done(function (response) {
                if(response.status=="success"){
                    
                    fillTable(response.records);
                }
                
                
            });
    }
    var fillTable=function(records){
        // console.log(records);
        $.each( records, function( key, value ) {
            // console.log(value);
            // $.each( value, function( field, fieldData) {
                // console.log(field +":"+ fieldData);
            // });
                var html="";
                html+="<tr>";
                    html+="<td>"
                    html+="<a href='"+SITE_BASEPATH+"/"+MODULE+"/edit/"+value.id+"' class='btn btn-primary'>edit</a>"
                    html+="&nbsp;"
                    html+="<a href='"+SITE_BASEPATH+"/"+MODULE+"/delete/"+value.id+"' class='btn btn-danger'>delete</a>"
                    html+="</td>";
                    html+="<td>"+value.name+"</td>";
                    html+="<td>"+value.email+"</td>";
                    html+="<td>"+value.contact+"</td>";                    
                html+="</tr>";
                    $("#tbl_body").append(html);
            
        });
    }

    requestFunction();
});
</script>
</body>
</html>

