<?php
/* if (!empty($errors)) {

    echo '<pre>';
    print_r($errors);
    echo '</pre>';
} */
echo !empty($msg) ? $msg : false;
?>
<form action="<?php echo _WEB_ROOT; ?>/home/post_user" method="post" class="form-control">
    <div class="">
        <input type="text" name="fullname" placeholder="Full name..." value="<?php echo !empty($old['fullname']) ? $old['fullname'] : false ?>"><br>
        <span style="color: red;"><?php echo ((!empty($errors)) && array_key_exists('fullname', $errors)) ? $errors['fullname'] : false ?></span>
    </div>
    <div class="">
        <input type="text" name="age" placeholder="Age..." value="<?php echo !empty($old['age']) ? $old['age'] : false ?>"><br>
        <span style="color: red;"><?php echo ((!empty($errors)) && array_key_exists('age', $errors)) ? $errors['age'] : false ?></span>
    </div>
    <div class="">
        <input type="text" name="email" placeholder="Email..." value="<?php echo !empty($old['email']) ? $old['email'] : false ?>"><br>
        <span style="color: red;"><?php echo ((!empty($errors)) && array_key_exists('email', $errors)) ? $errors['email'] : false ?></span>
    </div>
    <div class="">
        <input type="password" name="password" placeholder="Password..."><br>
        <span style="color: red;"><?php echo ((!empty($errors)) && array_key_exists('password', $errors)) ? $errors['password'] : false ?></span>
    </div>
    <div class="">
        <input type="password" name="confirm_password" placeholder="Confirm password..."><br>
        <span style="color: red;"><?php echo ((!empty($errors)) && array_key_exists('confirm_password', $errors)) ? $errors['confirm_password'] : false ?></span>
    </div>
    <button type="submit">Xác nhận</button>
</form>