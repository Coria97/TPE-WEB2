<?php
/* Smarty version 4.2.1, created on 2022-10-10 19:57:55
  from 'D:\Xampp\htdocs\Tp\templates\formLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63445d238cfb69_15460079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cced0502452b8cb917014efa3a5eace15beb195e' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\Tp\\templates\\formLogin.tpl',
      1 => 1665424035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63445d238cfb69_15460079 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="mt-5 w-25 mx-auto">
    <?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
        <form method="POST" action="validate">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" required class="form-control" id="password" name="password">
            </div>
            <?php if ($_smarty_tpl->tpl_vars['error']->value) {?> 
                <div class="alert alert-danger mt-3">
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

                </div>
            <?php }?>
            <button type="submit" class="btn btn-primary mt-3">Log in</button>
        </form>
    <?php } else { ?>
        <p> ya se encuentra logueado </p>
        <a href="logout" class="btn btn-primary mt-3">Log out</a>
    <?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
