
 <?php include APPPATH.'views/common/header.php'?>

<div id="wrapper">
   <?php  include APPPATH.'views/home/nav.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách trường đại học</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Thông tin trường đai học
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Tên trường</th>
                                <th>địa chỉ</th>
                                <th>logo</th>
                                <td>Xoá</td>
                                <td>Sửa</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($schools as $school){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $school->id; ?></td>
                                <td><?php echo $school->name; ?></td>
                                <td><?php echo $school->address; ?></td>
                                <td ><?php echo $school->logo; ?></td>
                                <td ><a href="<?php echo base_url('delete_school');?>/<?php echo $school->id;?>"><button class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không');"><li class="fa fa-trash-o"></li></button></a></td>
                                <td><a href="<?php echo base_url('edit_school'); ?>/<?php echo $school->id;?>"><button class="btn btn-warning"><li class="fa fa-edit"></li></button></a></td>
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
