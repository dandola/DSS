 <?php include APPPATH.'views/common/header.php'?>
<?php ?>

<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                        <form  name="myForm" action="<?php echo base_url('Login') ?>"  onsubmit="return check()" method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input class="form-control"  placeholder="Nhập tên tài khoản..." name="account_name" type="text" required autofocus>
                                    <!-- <small class="text-danger"> *Bạn chưa nhập tên tài khoản</small> -->
                                </div>
                                <div class="form-group">
                                   <?php echo form_open('form'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="form-control" placeholder="Mật khẩu..." name="password" type="password" required>
                                    <!-- <small class="text-danger"> *Bạn chưa nhập mật khẩu</small> -->
                                </div>
                                <div class="form-group">
                                    <label>
                                       <span class="text-danger"><small> <?php echo validation_errors(); ?></small></span>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="form-control btn btn-info"  type="submit">Đăng Nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include APPPATH.'views/common/footer.php'?>
<script>
    function check(){
            var account_name=document.forms["myForm"]["account_name"].value;
            var password=document.forms["myForm"]["password"].value;
            account_name=account_name.trim();
            password=password.trim();
            if(account_name==""){
                alert("Vui lòng nhập lại tên tài khoản");
                return false;
            }else if(password==""){
                alert("Vui lòng nhập lại mật khẩu");
                return false;
            }else{
                return true;
            }
        }


</script>