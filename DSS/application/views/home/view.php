 <?php include APPPATH.'views/common/header.php'?>

 
<div id="wrapper">

    <!-- Navigation -->
   <?php include "nav.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-info">Yêu cầu bạn điền đầy đủ thông tin phía dưới</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!--  <div class="row"> -->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-warning">
                        <i class="fa fa-clock-o fa-fw"></i> <span >Các yêu cầu đầu vào</span>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form id="show_result" method="post" enctype="multipart/form-data">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Thông tin cá nhân</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <div role="form">
                                                <div class="form-group">
                                                    <label>Họ và tên</label>
                                                    <input class="form-control" required name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Giới tính</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" id="optionsRadios1" value="1" checked>nam
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" id="optionsRadios2" value="0">nữ
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Điểm thi đại học của bạn</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <div role="form">
                                                <div class="form-group">
                                                    <label>Điểm Toán</label>
                                                    <input class="form-control" type="number" step="0.1" required name="math" >
                                                   <!--  <small class=" text-danger">&nbsp;*Bắt buộc</small> -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Điểm lý</label>
                                                    <input class="form-control" type="number" step="0.1" required name="physics" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Điểm Hoá</label>
                                                    <input class="form-control" type="number" step="0.1" required name="other" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Điểm vùng được cộng</label>
                                                    <input class="form-control" type="number" step="0.5" required name="area_point" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Điểm ưu tiên</label>
                                                    <input class="form-control" type="number" step="0.5" required name="prior">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"><i class="fa fa-home"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Chọn trường</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <div class="form-group">
                                                <label>Trường bạn đã chọn là:</label>
                                                <select name="school_id" class="form-control school_id">  
                                                 <option value="0" selected disabled> Chọn trường</option> 
                                                   <?php foreach($schools as $school){ ?>
                                                   <option value="<?php echo $school->id; ?>"><?php echo $school->name ?></option>
                                                   <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-inverted">
                                    <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">

                                            <h4 class="timeline-title">Sở thích - Nguyện vọng</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <div class="form-group">
                                                <label>lựa chọn các Ngành mà bạn muốn vào</label>
                                                <select multiple="multiple" name="majors[]" class="form-control major">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="row text-center">
                                <button  type="submit"  class="btn btn-success btn-lg">Xem kết quả</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <div class="row"  id="show" style="display: none;">
                    <div class="row text-center">
                        <a href="<?php base_url('main');?>"><div class="btn btn-danger"> reset</div></a>
                    </div>
                    <div class="col-md-10">
                        <div id="result">

                            
                        </div>
                    </div>
                </div>
                </div>


            </div>


        </div>
    </div>


<?php include APPPATH.'views/common/footer.php' ?>
<?php include "script.php" ?>
