<?php
echo !empty($msg) ? $msg : false;
HtmlHelper::formOpen('post', _WEB_ROOT.'/home/post_user', 'form-control');
HtmlHelper::input('<div>', '<br>'.form_error('fullname').'</div>', 'text', 'fullname', '', '', 'Fullname...', old('fullname'));
HtmlHelper::input('<div>', '<br>'.form_error('email').'</div>', 'text', 'email', '', '', 'Email...', old('email'));
HtmlHelper::input('<div>', '<br>'.form_error('age').'</div>', 'text', 'age', '', '', 'Age...', old('age'));
HtmlHelper::input('<div>', '<br>'.form_error('password').'</div>', 'password', 'password', '', '', 'Password...');
HtmlHelper::input('<div>', '<br>'.form_error('confirm_password').'</div>', 'password', 'confirm_password', '', '', 'Confirm_password...');
HtmlHelper::submit('Xác nhận');
HtmlHelper::formClose();
