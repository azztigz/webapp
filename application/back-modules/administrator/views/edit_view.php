
<input type="hidden" name="admin_id" value="<?php echo $admin->admin_idPK;?>">
<div class="form-group">
	<label>Email</label>
	<input type="email" name="email" class="form-control" id="InputEmail1" placeholder="Email" value="<?php echo $admin->admin_email;?>" disabled>
	<div id="eemail" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Password</label>
	<input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" value="<?php echo html_escape($admin->admin_password);?>">
	<div id="epassword" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Firstname</label>
	<input type="text" name="fname" class="form-control" id="InputFname" placeholder="Firstname" value="<?php echo html_escape($admin->admin_fname);?>">
	<div id="efname" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Lastname</label>
	<input type="text" name="lname" class="form-control" id="InputLname" placeholder="Lastname" value="<?php echo html_escape($admin->admin_lname);?>">
	<div id="elname" style="display:none;"></div>
</div>

