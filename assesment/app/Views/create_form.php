<html>
<head>
<style>
         .error {color: #FF0000;}
      </style>
	
</head>
<body>
<div class="row">
    <div class="col-lg-12">           
    <h2>Create New Route</h2>
     </div>
</div>
  

<form method = "post" action = "<?php echo base_url('assesment/public/CRUDController/create/new') ?>">
        Host Name     :<input type="text" name="hostname"> <br> <br> 
        SAP ID        :<input type="text" name="sapid"> <br><br> 
        Loop Back     :<input type="text" name="loopback"> <br> <br> 
        Mac Address ID:<input type="text" name="macaddress"> <br><br> 

        <input type="hidden" name="form_submitted" value="1" />
<br><br>
        <input type="submit" value="Submit">

    </form>
</body>
</html>