<?php /* Smarty version Smarty-3.1.15, created on 2014-03-18 16:09:13
         compiled from "application/views/skin/admin/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:452922295328538916f534-64312583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0589f2213a5d91a08ccbd46c2105807c0c9076bf' => 
    array (
      0 => 'application/views/skin/admin/content.tpl',
      1 => 1386775527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '452922295328538916f534-64312583',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53285389180cf8_44984876',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53285389180cf8_44984876')) {function content_53285389180cf8_44984876($_smarty_tpl) {?>		<div class="content">
			<?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>

		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="<?php echo js_url();?>
admin/scripts.js"></script>
	</body>
</html>
<?php }} ?>
