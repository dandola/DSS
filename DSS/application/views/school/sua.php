
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
                       <?php foreach ($schools as $school) {?>
                      <form action="<?php echo base_url('manage_school/edit_school')?>" method="post">
                          <div class="col-md-4 col-md-offset-4">
                              <input name='id' value='<?php echo $school->id ?>' hidden> 
                               <div class="form-group">
                                  <label>Tên trường: </label>
                                  <input class="form-control" name="name" value='<?php echo $school->name ?>' required placeholder="Nhập tên trường..."/>
                               </div>
                               <div class="form-group">
                                  <label>Địa chỉ:</label>
                                  <input class="form-control" name="address" value='<?php echo $school->address ?>' required placeholder="Địa chỉ trường..."/>
                              </div>
                               <div class="form-group">
                                  <label>Logo: </label>
                                  <input class="form-control" name="logo" value='<?php echo $school->logo ?>'  placeholder="Logo..."/>
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