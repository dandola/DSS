
 <?php include APPPATH.'views/common/header.php'?>

<div id="wrapper">
   <?php  include APPPATH.'views/home/nav.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                       <?php foreach ($env_vars as $env_var) {?>
                      <form action="<?php echo base_url('manage_env_var/edit_env_var')?>" method="post">
                          <div class="col-md-4 col-md-offset-4">
                              <input name='id' value='<?php echo $env_var->id ?>' hidden> 
                               <div class="form-group">
                                  <label>Tên biến: </label>
                                  <input class="form-control" name="name" value='<?php echo $env_var->name ?>' required placeholder="Nhập tên biến"/>
                               </div>
                               <div class="form-group">
                                  <label>Ký hiệu:</label>
                                  <input class="form-control" name="type" value='<?php echo $env_var->type ?>' required placeholder="Ký hiệu..."/>
                              </div>
                               <div class="form-group">
                                  <label>Trọng số: </label>
                                  <input class="form-control" name="weight" value='<?php echo $env_var->weight ?>' type="number" step="0.01" required placeholder="Trọng số của biến..."/>
                              </div>                         
                              <div class="form-group">
                                  <button class="btn btn-warning btn-lg" type="submit"><li class="fa fa-send"></li> Gửi</button>
                              </div>
                          </div>  
                          
                      </form>
                      <?php } ?>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php include APPPATH.'views/common/footer.php'?>