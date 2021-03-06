<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Gate</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/res/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/res/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/res/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition bg-light">
<div class="wrapper">

  <div class="">
    <a href="/admin">Voltar para <b>e-</b>Gate</a>
  </div>
  <br><br>

  <div class="col-md-6 box-body no-padding">

      <table class="table table-bordered">
        <thead>
          <tr class="bg-primary">
            <th style="width: 10px; text-align: center;">Painel de Visualização</th>
          </tr>
        </thead>    
        <tbody>

          
          <tr align="center">
            <td> 
              <img class="img-responsive" id="imagepreview" name="imagepreview" src="/res/avatar-profile.png" alt="Photo" width="100" height="100">   
            </td>                
          </tr>
          
          <tr>
            <td> <b>Estudante</b> <input type="text" class="form-control" id="iptvfdesname" name="iptvfdesname" readonly> </td>                
          </tr>
          
          <tr>
            <td> <b>Período</b> <input type="text" class="form-control" id="iptvfdata" name="iptvfdata" readonly> </td>                
          </tr>                      

          <tr>
            <td> <b>E-mail de Aviso</b> <input type="text" class="form-control" id="iptvfdesemailnotice" name="iptvfdesemailnotice" readonly> </td>                
          </tr>
          
          <tr>
            <td> <b>Status</b> <input type="text" class="form-control" id="iptvfdesmessage" name="iptvfdesmessage" readonly> </td>                
          </tr>                      
          

        </tbody>
      </table>

    </div>   


  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="/res/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/res/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/res/admin/plugins/iCheck/icheck.min.js"></script>

<script>

    	function getContent(timestamp) {		        
			
    		var queryString = {'timestamp' : timestamp};
    		
        	$.get('/gateserver/gate.php', 
            	  queryString,            	  
            	  function(data){             	           

              	  var obj = jQuery.parseJSON(data);
              		                 				
                  $('#iptvfdesname').val(obj.desname);
                  
                  $('#iptvfdata').val(new Date(obj.data).toLocaleString());

                  $('#iptvfdesemailnotice').val(obj.desemailnotice);
 
                  $('#iptvfdesmessage').val(obj.desmessage);

                  if (obj.dephoto == "1") {
                    $('#imagepreview').attr('src', '/res/photo-student/student-'+obj.idest+'.jpg');

                  }else{
                    $('#imagepreview').attr('src', '/res/avatar-profile.png');
                  }


               	/*$.ajax({
         		        url: "pagegetimage.php",
         		        type: "get",
         		        data: {"id": obj.id} ,
         		        success: function (response) {   
         		        	$("#responseImage").attr("src",response);         		        	
         		        },
         		        error: function(jqXHR, textStatus, errorThrown) {
         		           console.log(textStatus, errorThrown);
         		        }
         		    });*/						    				       
          });                     		          
    	}         
        
    	$(document).ready (function(){	    
        setInterval(getContent, 1000);    	          
      });  

  /*$(document).ready (function(){	     	          
    $('#iptvfdesname').click(function(){
      alert("Teste 2 Aqui 2");
    });             
  });*/  
</script>

</body>
</html>
