
<input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
<div class="form-group">
	<label>Email</label>
	<input type="email" name="email" class="form-control" id="InputEmail1" placeholder="Email" value="<?php echo html_escape($user->user_email);?>" disabled>
	<div id="eemail" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Password</label>
	<input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" value="<?php echo html_escape($user->user_password);?>">
	<div id="epassword" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Firstname</label>
	<input type="text" name="fname" class="form-control" id="InputFname" placeholder="Firstname" value="<?php echo html_escape($user->user_fname);?>">
	<div id="efname" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Lastname</label>
	<input type="text" name="lname" class="form-control" id="InputLname" placeholder="Lastname" value="<?php echo html_escape($user->user_lname);?>">
	<div id="elname" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Birthday</label>
    <div class='input-group date' id='datetimepicker2' data-date-format="YYYY-MM-DD">
        <input type='text' class="form-control" name="bdate" placeholder="Birthdate" value="<?php echo $user->user_bdate;?>" />
        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
	<div id="bdate" style="display:none;"></div>
</div>
<div class="form-group">
	<label>Phone Number</label>
	<input type="text" name="phone" class="form-control" id="InputPhone" placeholder="Phone Number" value="<?php echo html_escape($user->user_phone);?>">
	<div id="ephone" style="display:none;"></div>
</div>
<div class="form-group">
	<textarea name="address" class="form-control" id="InputTextarea" placeholder="Address" rows="3" Placeholder="Address"><?php echo html_escape($user->user_address);?></textarea>
	<div id="address" style="display:none;"></div>
</div>

<script>
	$(function() {
		$('#datetimepicker2').datetimepicker({
            pickTime: false
        });
	});
</script>