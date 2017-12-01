
 <?php include APPPATH.'views/common/header.php'?>

<div id="wrapper">
   <?php  include APPPATH.'views/home/nav.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm ngành</h1>
                <?php if(isset($str)){?>
                  <span><?php echo $str;?></span>
                <?php }?>
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
                      <form action="<?php echo base_url('post_add_major')?>" method="post">
                        <div class="col-md-4 col-md-offset-1">
                               <div class="form-group">
                                  <label>Tên Ngành: </label>
                                  <input class="form-control" name="name" required placeholder="Nhập tên ngành"/>
                              </div>
                               <div class="form-group">
                                  <label>Ký hiệu:</label>
                                  <input class="form-control" name="sign" required placeholder="Ký hiệu..."/>
                              </div>
                               <div class="form-group">
                                  <label>Điểm chuẩn 2016:</label>
                                  <input class="form-control" name="reference_1" type="number" step="0.25" required placeholder="Điểm chuẩn 2016"/>
                              </div>
                              <div class="form-group">
                                  <label>Điểm chuẩn 2017:</label>
                                  <input class="form-control" name="reference_2" type="number" step="0.25" required placeholder="Điểm chuẩn 2017"/>
                              </div>
                              <div class="form-group">
                                  <label>Chỉ tiêu:</label>
                                  <input class="form-control" type="number" name="amount" required placeholder="Chỉ tiêu của ngành"/>
                              </div>

                          </div>
                          <div class="col-md-4 col-md-offset-1">
                           <div class="form-group">
                                  <label>Cơ hội làm việc:</label>
                                  <input class="form-control" type="number" step="0.01" name="work_opportunity" required />
                              </div>
                               <div class="form-group">
                                  <label>Tỉ lệ nam:</label>
                                  <input class="form-control" type="number" step="0.01" name="rate_of_male" required placeholder="Tỷ lệ nam/toàn ngành"/>
                              </div>
                               <div class="form-group">
                                  <label>Logo: </label>
                                  <input class="form-control" name="logo"/>
                              </div>
                               <div class="form-group">
                                  <label>Thuộc Trường: </label>
                                  <select class="form-control" name="school_id">
                                    <?php foreach ($schools as $school) {?>
                                    <option value="<?php echo $school->id; ?>"><?php echo $school->name;?></option>
                                    <?php }?>
                                  </select>
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