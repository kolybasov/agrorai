<!doctype html>
<html lang="uk">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex,nofollow">
        <meta name="author" content="Mykola Basov">
        <link rel="shortcut icon" href="<?php echo img_url()?>favicon.ico">
        <title>Авторизація | Агрорай</title>
        <link rel="stylesheet" href="<?php echo css_url()?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo css_url()?>admin/style.css">
    </head>
    <body>
        <div class="container">
            <div class="panel panel-success login">
                <div class="panel-heading">
                    <h3 class="panel-title">Будь ласка, авторизуйтеся!</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $login = array(
                        'name'	=> 'login',
                        'id'	=> 'login',
                        'value' => set_value('login'),
                        'maxlength'	=> 80,
                        'size'	=> 30,
                        'class' => 'form-control'
                    );
                    if ($login_by_username AND $login_by_email) {
                        $login_label = 'E-mail або логін';
                    } else if ($login_by_username) {
                        $login_label = 'Логін';
                    } else {
                        $login_label = 'E-mail';
                    }
                    $password = array(
                        'name'	=> 'password',
                        'id'	=> 'password',
                        'size'	=> 30,
                        'class' => 'form-control'
                    );
                    $remember = array(
                        'name'	=> 'remember',
                        'id'	=> 'remember',
                        'value'	=> 1,
                        'checked'	=> set_value('remember')
                    );
                    ?>
                    <?php echo form_open($this->uri->uri_string()); ?>
                    <div class="form-group">
                        <?php echo form_label($login_label, $login['id']); ?>
                        <?php echo form_input($login); ?>
                   </div>
                        <?php echo form_error($login['name']); ?>
                        <?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
                    <div class="form-group">
                        <?php echo form_label('Пароль', $password['id']); ?>
                        <?php echo form_password($password); ?>
                    </div>
                        <?php echo form_error($password['name']); ?>
                        <?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
                    <div class="checkbox">
                        <label><?php echo form_checkbox($remember); ?>&nbsp;Запам'ятати мене</label>
                    </div>
                    <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('admin/auth/register/', 'Реєстрація'); ?>
                    <br>
                    <button type="submit" class="btn btn-success btn-sm">Увійти</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </body>
</html>