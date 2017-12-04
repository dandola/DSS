
 <?php include APPPATH.'views/common/header.php'?>
 <style>
     #dataTables-example_paginate, #dataTables-example_filter{
         text-align: right;
     }
 </style>
<div id="wrapper">
   <?php  include APPPATH.'views/home/nav.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách các biến môi trường</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Thông tin biến môi trường
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr align="center">
                                <th>id</th>
                                <th>Tên biến</th>
                                <th>ký hiệu</th>
                                <th>trọng số</th>
                                <td>Xoá</td>
                                <td>Sửa</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($env_vars as $env_var){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $env_var->id; ?></td>
                                <td><?php echo $env_var->name; ?></td>
                                <td><?php echo $env_var->type; ?></td>
                                <td class="center"><?php echo $env_var->weight; ?></td>
                                <td class="text-center"><a href="<?php echo base_url('delete_env_var');?>/<?php echo $env_var->id;?>"><button class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không');"><li class="fa fa-trash-o"></li></button></a></td>
                                <td class="text-center"><a href="<?php echo base_url('edit_env_var'); ?>/<?php echo $env_var->id;?>"><button class="btn btn-warning"><li class="fa fa-edit"></li></button></a></td>
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