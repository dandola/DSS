
 <?php include APPPATH.'views/common/header.php'?>

<div id="wrapper">
   <?php  include APPPATH.'views/home/nav.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm trường đại học</h1>
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
                      <form action="<?php echo base_url('post_add_school')?>" method="post">
                        <div class="col-md-4 col-md-offset-4">
                               <div class="form-group">
                                  <label>Tên trường: </label>
                                  <input class="form-control" name="name" required placeholder="Nhập tên trường..."/>
                              </div>
                               <div class="form-group">
                                  <label>Địa chỉ:</label>
                                  <input class="form-control" name="address" required placeholder="Điạ chỉ trường..."/>
                              </div>
                               <div class="form-group">
                                  <label>Logo: </label>
                                  <input class="form-control" name="logo" required placeholder="logo..."/>
                              </div>                         
                              <div class="form-group">
                                  <button class="btn btn-warning btn-lg" type="submit"><li class="fa fa-send"></li> Gửi</button>
                              </div>
                          </div>
                      </form>
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