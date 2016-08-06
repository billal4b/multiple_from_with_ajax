<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php skill test</title>
    <link rel="stylesheet" type="text/css" href="resource/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="resource/css/bootstrap-theme.css">
	<script type="text/javascript" src="resource/js/bootstrap.js"></script>
	<script type="text/javascript" src="resource/js/jquery.min.js"></script>
    <script type="text/javascript">
    /**
    * @author Md. Billal Hossain
    */
      $(function(){
        $("#frm2").hide();  $("#frm1").show();
        
        function frm1(){
          	$("#general_info").click(function(){
	            if($("#name").val()==""){
	              alert("Name cannot be empty");
	                return false;
	            }
	            if ($("#email").val()=='' && $("#conEmail").val() == '') {
	                alert("Email required");
	                  return false;
	              }
	              if ($("#email").val() !== $("#conEmail").val()) {
	                alert("Email must be same");
	                return false;
	              }
	            if ($("#password").val()=='' && $("#conPassword").val() == '') {
	                alert("Password can not be empty");
	                return false;
	            }
	            if ($("#password").val() !== $("#conPassword").val()) {
	              alert("Password must be same");
	              return false;
	            }
	            $.ajax({
	              url:"saving_data.php",
	              type:"GET",
	              data:{
	                 name:$("#name").val(),
	                 email:$("#email").val(),
	                 conEmail:$("#conEmail").val(),
	                 password:$("#password").val(),
	                 conPassword:$("#conPassword").val(),
	                 table:"general_info"
	            	},
	            success : function(e){
	              $("#result").html(e);
	              $('#frm2').show();
	              $('#frm1').hide();
	            	}
	          	})
          	})
        }frm1()
        function frm2(){
          $("#contact_info").click(function(){
            //alert("sd")
            $.ajax({
              url:"saving_data.php",
              type:"GET",
              data:{
                 address1:$("#address1").val(),
                 address2:$("#address2").val(),
                 country:$("#country").val(),
                 phone:$("#phone").val(),
                 table:"contact_info"
            },
            success : function(e){
              o=String("success");
             if (e==o) {
               window.location="message.php";
             }else {
               $("#result").html(e);
             }
              $('#frm1').show();
              $('#frm2').hide();
            }
          })
          })
        }frm2()
      })
    </script>
</head>
<body>
      
<form action="" method="GET">
<div id="frm1" class="container">
	<div class="col-md-6 col-md-offset-2">
	    <div class="col-md-offset-4"><h1>General Info</h1></div>
	    <hr>	    
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Name:</label></div>
		       <div class="col-md-8"><input type="text" id="name" name="name" class="form-control input-sm"></div>
		    </div>
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Email:</label></div>
		       <div class="col-md-8"><input type="email" id="email" name="email" class="form-control input-sm"></div>
		    </div>
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Confirm Email:</label></div>
		       <div class="col-md-8"><input type="email" id="conEmail" name="cEmail" class="form-control input-sm"></div>
		    </div>
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Password:</label></div>
		       <div class="col-md-8"><input type="password" id="password" name="pass" class="form-control input-sm"></div>
		    </div>
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Confirm Password:</label></div>
		       <div class="col-md-8"><input type="password" id="conPassword" name="cPass" class="form-control input-sm"></div>
		    </div>
		    <input type="hidden" id="table" value="general_info">
		    <button type="button" id="general_info" class="btn btn-primary pull-right" style="padding: 6px 50px; background: #15b3f4;"> Next </button>
		</div>
	</div>
</div>

<div id="frm2" class="container">
	<div class="col-md-6 col-md-offset-2">
	    <div class="col-md-offset-4"><h1>Contact Info</h1></div>
	    <hr>
	    
	    
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Address1:</label></div>
		       <div class="col-md-8"><input type="text" id="address1" name="address1" class="form-control input-sm"></div>
		    </div>
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Address2:</label></div>
		       <div class="col-md-8"><input type="text" id="address2" name="address2" class="form-control input-sm"></div>
		    </div>
		    <div class="form-group row">
		       <div class="col-md-4"><label for="country" class="pull-right">Country:</label></div>
		       <div class="col-md-8">
		       		<select id="country" class="form-control">
			       		<option id="">--Select Country--</option>
			       		<?php
			       			$db = new mysqli('localhost','root','','skill_test');
			       			$country = $db->query("select country from country");
			       			while(list($country_name) = $country->fetch_row()){
			       				echo "<option value='$country_name'>$country_name</option>";
			       			}
			       			
			       		?>
			       </select>
			    </div>
		    </div>
		    <div class="form-group row">
		       <div class="col-md-4"><label class="pull-right">Phone:</label></div>
		       <div class="col-md-8"><input type="text" id="phone" name="phone" class="form-control input-sm"></div>
		    </div>
		    <input type="hidden" id="table" value="contact_info">
		    <button type="button" id="contact_info" class="btn btn-primary pull-right" style="padding: 6px 50px; background: #73d42c;"> Submit </button>
		</div>
	</div>
</div>
</form>
</body>
</html>
