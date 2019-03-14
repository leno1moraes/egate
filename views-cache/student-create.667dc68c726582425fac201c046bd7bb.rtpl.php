<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Estudantes
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Usuários</a></li>
    <li class="active"><a href="#">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">

        <div class="box-header with-border">
          
          
          <a href="/admin/students">
            <button type="button" class="btn btn-secondary" >Voltar</button>
          </a>
          <br><br>
          <!--
          <div class="alert-success alert-dismissible" style="margin: 10px">
            <p>Cadastrado com sucesso</p>
          </div>
          -->

          <h3 class="box-title">Cadastrar Estudante</h3>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/student/create" method="post" enctype="multipart/form-data">
          <div class="box-body">

            <div class="form-group">
              <label for="desname">Nome</label>
              <input type="text" class="form-control" id="desname" name="desname" placeholder="Digite o Nome" required>
            </div>

            <div class="form-group">
              <label for="desregistr">Matrícula</label>
              <input type="text" class="form-control" id="desregistr" name="desregistr" placeholder="Digite a Matrícula" required>
            </div>            

            <div class="form-group">
                <label for="desid1">CPF</label>
                <input type="text" class="form-control" id="desid1" name="desid1" placeholder="Digite o CPF" required>
            </div>

            <div class="form-group">
                <label for="desid2">RG (opcional)</label>
                <input type="text" class="form-control" id="desid2" name="desid2" placeholder="Digite o RG">
            </div>            

            <div class="form-group">
                <label for="desphonotice">Telefone para aviso</label>
                <input type="text" class="form-control" id="desphonotice" name="desphonotice" placeholder="Digite o Telefone" required>
            </div>               

            <div class="form-group">
              <label for="desemailnotice">E-mail para aviso</label>
              <input type="email" class="form-control" id="desemailnotice" name="desemailnotice" placeholder="Digite o e-mail" required>
            </div>

            <div class="form-group">
                <label for="desperiodo">Período</label>
                <input type="email" class="form-control" id="desperiodo" name="desperiodo" placeholder="Digite o e-mail" required>
            </div>

            <div class="checkbox">
                <label>
                  <input type="checkbox" name="desstatus" checked> <bold>Status</bold>
                </label>
            </div>
            <br>
                        
            <div class="form-group">

              <label for="file" class="btn btn-primary"> Enviar Foto
                <input type="file" class="form-control" id="file" style="display: none;" name="file">
              </label>

              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive" id="image-preview" src="/res/avatar-profile.png" alt="Photo" width="100" height="100" style="margin: -50px 0px 0px 120px"> 
                </div>
              </div>

            </div>    

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
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
  </script>