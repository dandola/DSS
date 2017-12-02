 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() ?>">Trợ giúp thí sinh lựa chọn ngành nghề</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <?php if($this->session->userdata('login')) {?>
            <li><?php echo $this->session->userdata('login')?></li>
            <li><a href="<?php echo base_url('login/logout');?>">Đăng xuất</a><li>
            <?php } else{ ?>
            <li><a href="<?php echo base_url('login') ?>">Đăng nhập</a></li>
            <?php }?>
            <!-- <li><a href="">Đăng xuất</a></li> -->
        </ul>

        <!-- /.navbar-header -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo base_url('') ?>"><i class="fa fa-dashboard fa-fw"></i> Tư vấn Ngành nghề</a>
                    </li>
                    <?php if($this->session->userdata('login')){ ?>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> Quản lý Ngành<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('manage_major')?>">Thông tin Ngành</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('add_major')?>">Thêm</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-th"></i> Quản lý biến môi trường<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('manage_env_var')?>">Thông tin Biến</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('add_env_var')?>">Thêm</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-home"></i> Quản lý Trường<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('manage_school')?>">Thông tin Trường</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('add_school')?>">Thêm</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>