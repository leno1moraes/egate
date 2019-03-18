<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Visor de Fluxo
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active"><a href="#">Visor de Fluxo</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
                
                <div class="box-header">
                  <div class="box-tools">                    
    
                  </div>
                </div>
                <br><br>

                <div class="box-body no-padding">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px; text-align: center;">Painel de Visualização</th>
                      </tr>
                    </thead>    
                    <tbody>     

                      <?php $counter1=-1;  if( isset($loglive) && ( is_array($loglive) || $loglive instanceof Traversable ) && sizeof($loglive) ) foreach( $loglive as $key1 => $value1 ){ $counter1++; ?>
                      <tr align="center">
                        <td> 
                          <img class="img-responsive" id="image-preview" <?php if( $value1["dephoto"] == '1'  ){ ?> src="/res/photo-student/student-<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.jpg" <?php }else{ ?> src="/res/avatar-profile.png" <?php } ?> alt="Photo" width="100" height="100">   
                        </td>                
                      </tr>
                      
                      <tr>
                        <td> <b>Estudante</b> <input type="text" class="form-control" id="desname" name="desname" value="<?php echo htmlspecialchars( $value1["desname"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly> </td>                
                      </tr>
                      
                      <tr>
                        <td> <b>Período</b> <input type="text" class="form-control" id="data" name="data" value="<?php echo htmlspecialchars( $value1["data"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly> </td>                
                      </tr>                      

                      <tr>
                        <td> <b>E-mail de Aviso</b> <input type="text" class="form-control" id="desemailnotice" name="desemailnotice" value="<?php echo htmlspecialchars( $value1["desemailnotice"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly> </td>                
                      </tr>
                      
                      <tr>
                        <td> <b>Status</b> <input type="text" class="form-control" id="desmessage" name="desmessage" value="<?php echo htmlspecialchars( $value1["desmessage"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly> </td>                
                      </tr>

                      <?php } ?>
                    </tbody>
                  </table>

                </div>                    
                
                <div class="box-footer clearfix">

                </div>


              </div>
          </div>
        </div>
      </div>
    
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->