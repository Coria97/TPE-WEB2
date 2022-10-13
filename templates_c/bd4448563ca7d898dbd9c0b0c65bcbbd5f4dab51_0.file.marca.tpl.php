<?php
/* Smarty version 4.2.1, created on 2022-10-13 23:03:32
  from 'D:\Xampp\htdocs\Tp\templates\marca.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63487d24cf6071_36868309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd4448563ca7d898dbd9c0b0c65bcbbd5f4dab51' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\Tp\\templates\\marca.tpl',
      1 => 1665695010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63487d24cf6071_36868309 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <div class="row row-cols-3 g-6">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['marcas']->value, 'marca');
$_smarty_tpl->tpl_vars['marca']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['marca']->value) {
$_smarty_tpl->tpl_vars['marca']->do_else = false;
?>
        <div class="container my-3">
          <div class="card text-center" style="width: 18rem;">
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['marca']->value->nombre;?>
</h5>
                  <div class="d-grid gap-2">
                    <a href='marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
' class="btn btn-primary">Ver productos</a>
                    <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                      <form method="POST" action="marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
/editar">
                        <div class="d-grid gap-2">
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="nombre">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                      </form>
                      <a href='marca/<?php echo $_smarty_tpl->tpl_vars['marca']->value->id_marca;?>
/borrar' class="btn btn-primary">Borrar</a>
                    <?php }?>
                  </div>
                </div>
              </div> 
          </div>
        </div>  
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
      <div class="container my-3">
        <div class="card text-center" style="width: 18rem;">
          <div class="col-auto">
            <div class="card-body">
            <form method="POST" action="marca/agregar">
              <div class="d-grid gap-2">
                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="nombre">
                <button type="submit" class="btn btn-primary">Agregar producto</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    <?php }?>
  </div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
