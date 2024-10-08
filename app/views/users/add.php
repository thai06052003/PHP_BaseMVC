<?php
echo !empty($msg) ? $msg : false;
?>
<form action="<?php echo _WEB_ROOT; ?>/home/post_user" method="post" class="form-control">
    <div class="">
        <input type="text" name="fullname" placeholder="Full name..." value="<?php echo old('fullname') ?>"><br>
        <?php echo form_error('fullname') ?>
    </div>
    <div class="">
        <input type="text" name="age" placeholder="Age..." value="<?php echo old('age') ?>"><br>
        <?php echo form_error('age') ?>
    </div>
    <div class="">
        <input type="text" name="email" placeholder="Email..." value="<?php echo old('email') ?>"><br>
        <?php echo form_error('email') ?>
    </div>
    <div class="">
        <input type="password" name="password" placeholder="Password..."><br>
        <?php echo form_error('password') ?>
    </div>
    <div class="">
        <input type="password" name="confirm_password" placeholder="Confirm password..."><br>
        <?php echo form_error('confirm_password') ?>
    </div>
    <button type="submit">Xác nhận</button>
</form>