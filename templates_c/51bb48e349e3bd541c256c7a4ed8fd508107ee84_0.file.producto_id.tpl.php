<?php
/* Smarty version 4.2.1, created on 2022-10-10 21:48:01
  from 'D:\Xampp\htdocs\Tp\templates\producto_id.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634476f16828d4_23446701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51bb48e349e3bd541c256c7a4ed8fd508107ee84' => 
    array (
      0 => 'D:\\Xampp\\htdocs\\Tp\\templates\\producto_id.tpl',
      1 => 1665430057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634476f16828d4_23446701 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="row row-cols-3 g-6">
        <div class="container my-3">
            <div class="card text-center" style="width: 18rem;">
                <div class="col">
                    <img src="./images/remera.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre;?>
</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_smarty_tpl->tpl_vars['producto']->value->nombre_marca;?>
</h6>
                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['producto']->value->tipo;?>
</p>
                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['producto']->value->precio;?>
</p>
                        <div class="d-grid gap-2">
                        <a href="producto" class="btn btn-primary">Volver</a>
                        <?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        <?php } else { ?>
                            <form method="POST" action="producto/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
/editar">
                                <div class="d-grid gap-2">
                                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="nombre">
                                    <input class="form-control" type="text" id="tipo" name="tipo" placeholder="tipo">
                                    <input class="form-control" type="text" id="precio" name="precio" placeholder="precio">
                                    <input class="form-control" type="text" id="foto" name="foto" placeholder="foto">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </form>
                            <a href='producto/<?php echo $_smarty_tpl->tpl_vars['producto']->value->id_producto;?>
/borrar' class="btn btn-primary">Borrar</a>
                        <?php }?>
                    </div>
                </div>
            </div> 
        </div>
    </div>  

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
