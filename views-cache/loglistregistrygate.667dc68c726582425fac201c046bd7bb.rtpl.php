<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Estudantes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active"><a href="#">Estudantes</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
                
                <div class="box-header">
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
                <br><br>

                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 20px">Estudante</th>
                        <th style="width: 20px">Data</th>
                        <th style="width: 20px">Cod Ação</th>
                        <th style="width: 20px">Catraca</th>
                        <th style="width: 20px">Permissão</th>
                      </tr>
                    </thead>    
                    <tbody>
                      
                      <?php $counter1=-1;  if( isset($log) && ( is_array($log) || $log instanceof Traversable ) && sizeof($log) ) foreach( $log as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td> <?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                        <td> <?php echo htmlspecialchars( $value1["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                        <td> <?php echo htmlspecialchars( $value1["data"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                        <td> <?php echo htmlspecialchars( $value1["desaction"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                        <td> <?php echo htmlspecialchars( $value1["descode"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
                        <td> <?php echo htmlspecialchars( $value1["desmessage"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>                 
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