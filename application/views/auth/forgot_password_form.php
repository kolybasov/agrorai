<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <meta name="author" content="Я таки хочу тут імена :-)">
    <link rel="shortcut icon" href="<?php echo img_url()?>favicon.ico">
    <title>Відновлення паролю | Агрорай</title>
    <link rel="stylesheet" href="<?php echo css_url()?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo css_url()?>admin/style.css">
</head>
<body>
<div class="container">
    <div class="panel panel-primary login">
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
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'E-mail або логін';
} else {
	$login_label = 'E-mail';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
	<div class="control-group">
		<?php echo form_label($login_label, $login['id']); ?>
		<?php echo form_input($login); ?>
	</div>
    <?php echo form_error($login['name']); ?>
    <?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?><br>
    <button type="submit" class="btn btn-primary">Отримати новий пароль</button>
    <?php echo form_close(); ?>
        </div>
    </div>
</div>
</body>
</html>