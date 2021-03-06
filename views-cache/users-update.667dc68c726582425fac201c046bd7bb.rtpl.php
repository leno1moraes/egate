<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">



        <div class="box-header with-border">

          <a href="/admin/users">
            <button type="button" class="btn btn-secondary" >Voltar</button><br><br>
          </a>

          <h3 class="box-title">Editar Usuário</h3>
        </div>
        <!-- /.box-header -->

        <!-- form start -->
        <form role="form" action="/admin/users/update/<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="desnome">Nome</label>
              <input type="text" class="form-control" id="desnome" name="desnome" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $user["desnome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="deslogin">Login</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Digite o login"  value="<?php echo htmlspecialchars( $user["deslogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" name="desstatus" value="1" <?php if( $user["desstatus"] == 1 ){ ?>checked<?php } ?>> Status
              </label>
            </div>
           

            <div class="form-group">
              <input type="hidden" id="fident" name="fident" value="0">

              <label for="file" class="btn btn-primary"> Enviar Foto
                <input type="file" class="form-control" id="file" style="display: none;" name="file">                 
              </label>

              <button type="button" id="delPhoto" name="delPhoto" class="btn btn-danger">Deletar Foto</button>

              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive" id="image-preview" <?php if( $user["desurl"] == '1'  ){ ?> src="/res/photo-profile/profile-<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.jpg" <?php }else{ ?> src="/res/avatar-profile.png" <?php } ?> alt="Photo" width="100" height="100" style="margin: -5px 0px 0px 120px">   
                </div>

                

              </div>

              
            </div> 
  

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>

      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  document.querySelector('#file').addEventListener('change', function(){
    
    var file = new FileReader();
  
    file.onload = function() {
      
      document.querySelector('#image-preview').src = file.result;
  
    }
  
    file.readAsDataURL(this.files[0]);

  });


  document.querySelector('#delPhoto').addEventListener('click', function(){    
    //alert("Entrei aqui");
    $('#fident').val("1");
    $('#file').val("");
    document.querySelector('#image-preview').src = "/res/avatar-profile.png";
  });

  </script>