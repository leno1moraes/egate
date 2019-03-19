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

          <a href="/admin/students">
            <button type="button" class="btn btn-secondary" >Voltar</button><br><br>
          </a>

          <h3 class="box-title">Editar Usuário</h3>
        </div>
        <!-- /.box-header -->

        <!-- form start -->
        <form role="form" action="/admin/student/update/<?php echo htmlspecialchars( $student["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">

              <div class="form-group">
                <label for="desname">Nome</label>
                <input type="text" class="form-control" id="desname" name="desname" placeholder="Digite o Nome" value="<?php echo htmlspecialchars( $student["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
              </div>
  
              <div class="form-group">
                <label for="desregistr">Matrícula</label>
                <input type="text" class="form-control" id="desregistr" name="desregistr" placeholder="Digite a Matrícula" value="<?php echo htmlspecialchars( $student["desregistr"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
              </div>            
  
              <div class="form-group">
                  <label for="desid1">CPF</label>
                  <input type="text" class="form-control" id="desid1" name="desid1" placeholder="Digite o CPF" value="<?php echo htmlspecialchars( $student["desid1"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
              </div>
  
              <div class="form-group">
                  <label for="desid2">Código do Ticket</label>
                  <input type="text" class="form-control" id="desid2" name="desid2" placeholder="Digite o RG" value="<?php echo htmlspecialchars( $student["desid2"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>            
  
              <div class="form-group">
                  <label for="desphonotice">Telefone para aviso</label>
                  <input type="text" class="form-control" id="desphonotice" name="desphonotice" placeholder="Digite o Telefone" value="<?php echo htmlspecialchars( $student["desphonotice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
              </div>               
  
              <div class="form-group">
                <label for="desemailnotice">E-mail para aviso</label>
                <input type="email" class="form-control" id="desemailnotice" name="desemailnotice" placeholder="Digite o e-mail" value="<?php echo htmlspecialchars( $student["desemailnotice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
              </div>
  
              <div class="form-group">
                  <label for="desperiodo">Período</label>
                  <select class="form-control" id="desperiodo" name="desperiodo">
                    <option value="0"></option>
                    
                    <?php if( $student["desperiodo"] == '1'  ){ ?>
                    <option value="1" selected>1º A</option>
                    <?php }else{ ?>
                    <option value="1">1º A</option>
                    <?php } ?>

                    
                    <?php if( $student["desperiodo"] == '2'  ){ ?>
                    <option value="2" selected>1º B</option>
                    <?php }else{ ?>
                    <option value="2">1º B</option>
                    <?php } ?>

                    <?php if( $student["desperiodo"] == '3'  ){ ?>
                    <option value="3" selected>2º A</option>
                    <?php }else{ ?>
                    <option value="3">2º A</option>
                    <?php } ?>

                    <?php if( $student["desperiodo"] == '4'  ){ ?>
                    <option value="4" selected>2º B</option>
                    <?php }else{ ?>
                    <option value="4">2º B</option>
                    <?php } ?>

                    <?php if( $student["desperiodo"] == '5'  ){ ?>
                    <option value="5" selected>3º A</option>
                    <?php }else{ ?>
                    <option value="5">3º A</option>
                    <?php } ?>

                    <?php if( $student["desperiodo"] == '6'  ){ ?>
                    <option value="6" selected>3º B</option>
                    <?php }else{ ?>
                    <option value="6">3º B</option>
                    <?php } ?>
                    
                  </select>
                  <!--<input type="email" class="form-control" id="desperiodo" name="desperiodo" placeholder="Digite o e-mail" required>-->
              </div>
  
              <div class="checkbox">
                  <label>
                    <input type="checkbox" id="desstatus" name="desstatus" value="1" <?php if( $student["desstatus"] == 1 ){ ?>checked<?php } ?>> <bold>Permissão para Entrar</bold>
                  </label>
              </div>
              <br>
                          
              <div class="form-group">
                <input type="hidden" id="fident" name="fident" value="0">

                <label for="file" class="btn btn-primary"> Enviar Foto
                  <input type="file" class="form-control" id="file" style="display: none;" name="file">
                </label>

                <button type="button" id="delPhoto" name="delPhoto" class="btn btn-danger">Deletar Foto</button>
  
                <div class="box box-widget">
                    <div class="box-body">
                      <img class="img-responsive" id="image-preview" <?php if( $student["dephoto"] == '1'  ){ ?> src="/res/photo-student/student-<?php echo htmlspecialchars( $student["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.jpg" <?php }else{ ?> src="/res/avatar-profile.png" <?php } ?> alt="Photo" width="100" height="100" style="margin: -5px 0px 0px 120px">   
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