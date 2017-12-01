
 <?php include APPPATH.'views/common/header.php'?>

<div id="wrapper">
   <?php  include APPPATH.'views/home/nav.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách các ngành</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bảng quản lý dữ liệu các ngành
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Tên ngành</th>
                                <th>ký hiệu</th>
                                <th>điểm chuẩn 2016</th>
                                <th>điểm chuẩn 2017</th>
                                <th>chỉ tiêu</th>
                                <th>cơ hội làm việc</th>
                                <th>tỉ lệ nam</th>
                                <td>Xoá</td>
                                <td>Sửa</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($majors as $major){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $major->id; ?></td>
                                <td><?php echo $major->name; ?></td>
                                <td><?php echo $major->sign; ?></td>
                                <td class="center"><?php echo $major->reference_1; ?></td>
                                <td class="center"><?php echo $major->reference_2; ?></td>
                                <td><?php echo $major->amount; ?></td>
                                <td class="center"><?php echo $major->work_opportunity; ?></td>
                                <td class="center"><?php echo $major->rate_of_male;?></td>
                                <td><a href="<?php echo base_url('delete_major');?>/<?php echo $major->id;?>"><button class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không');"><li class="fa fa-trash-o"></li></button></a></td>
                                <td><a href="<?php echo base_url('edit_major'); ?>/<?php echo $major->id;?>"><button class="btn btn-warning"><li class="fa fa-edit"></li></button></a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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