<?php /* Smarty version Smarty-3.1.15, created on 2014-03-18 16:09:18
         compiled from "application/views/skin/admin/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11907270925328538e294178-50122278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '602cbee35dce7c02875753128b7dccf60f6d5036' => 
    array (
      0 => 'application/views/skin/admin/orders.tpl',
      1 => 1386712502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11907270925328538e294178-50122278',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'p' => 0,
    'o' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5328538e5d4850_86602562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5328538e5d4850_86602562')) {function content_5328538e5d4850_86602562($_smarty_tpl) {?>        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-11">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>
</h3>
                            </div>
                            <div class="panel-body">
                                <div class="control-bar btn-group">
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url();?>
admin/orders/all">Всі</a>
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url();?>
admin/orders/new">Нові</a>
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url();?>
admin/orders/archive">Архів</a>
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all"></th>
                                        <th>П.І.Б.</th>
                                        <th>Товар</th>
                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['o']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['i']->value['is_new']==0) {?><tr><?php } else { ?><tr class="success"><?php }?>
                                        <td><input type="checkbox" name="selector" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['order_id'];?>
"></td>
                                        <td><a href="<?php echo base_url();?>
admin/order/<?php echo $_smarty_tpl->tpl_vars['i']->value['order_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value['pib'];?>
</a></td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['i']->value['commodity']=='bean') {?>Cоєва макуха<?php } else { ?>Cоєва олія<?php }?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['date'];?>
</td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<script src="<?php echo js_url();?>
jquery-1.10.2.min.js"></script>
		<script src="<?php echo js_url();?>
admin/scripts.js"></script>
	</body>
</html><?php }} ?>
