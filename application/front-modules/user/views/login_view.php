<?php echo form_error('<div class="error">', '</div>'); ?>


		<?php //echo CI_VERSION; ?>

<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>css/sb-admin.css">



<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo base_url('user/login'); ?>" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo set_value('email'); ?>" id="email" autofocus>
                                <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo set_value('password'); ?>" id="password">
                                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                            </div>
							<div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-xm btn-info btn-block"><i class="fa fa-user"></i> Login</button>
  							<?php echo $error; ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>