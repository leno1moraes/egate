<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Estudantes
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="#">Estudantes</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="/admin/student/create" class="btn btn-success">Cadastrar Estudante</a>
              <div class="box-tools">
                
                <form action="/admin/users">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </form>

              </div>
            </div>

            <div class="box-body no-padding">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome</th>
                    <th>Telefone de Aviso</th>
                    <th>E-mail de Aviso</th>
                    <th>Período</th>
                    <th> Permissão</th>
                    <th style="width: 100px">Foto</th>
                    <th style="width: 240px">&nbsp;</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $counter1=-1;  if( isset($students) && ( is_array($students) || $students instanceof Traversable ) && sizeof($students) ) foreach( $students as $key1 => $value1 ){ $counter1++; ?>
                  <tr>
                    <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desphonotice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["desemailnotice"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>
                      <?php if( $value1["desperiodo"] == '1'  ){ ?>
                        1º A
                      <?php } ?>                      
                      <?php if( $value1["desperiodo"] == '2'  ){ ?>
                        1º B
                      <?php } ?> 
                      <?php if( $value1["desperiodo"] == '3'  ){ ?>
                        2º A
                      <?php } ?>                              
                      <?php if( $value1["desperiodo"] == '4'  ){ ?>
                        2º B
                      <?php } ?>                         
                      <?php if( $value1["desperiodo"] == '5'  ){ ?>
                        3º A
                      <?php } ?>                         
                      <?php if( $value1["desperiodo"] == '6'  ){ ?>
                        3º B
                      <?php } ?>
                    </td>
                    <td><?php if( $value1["desstatus"] == '1'  ){ ?> ATIVO <?php }else{ ?> INATIVO <?php } ?> </td>    
                    <td>                      
                      <img class="img-responsive" id="image-preview" <?php if( $value1["dephoto"] == '1'  ){ ?> src="/res/photo-student/student-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.jpg" <?php }else{ ?> src="/res/avatar-profile.png" <?php } ?> alt="Photo" width="30" height="30">            
                    </td>                 
                    <td>
                      <a href="/admin/student/update/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="#" class="btn btn-default btn-xs"><i class="fa fa-unlock"></i> Alterar Senha</a>
                      <a href="/admin/student/delete/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->

            <!--
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">                
                <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                <li><a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          -->

          </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->