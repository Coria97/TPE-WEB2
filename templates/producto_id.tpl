{include 'header.tpl'}

    <div class="row row-cols-3 g-6">
        <div class="container my-3">
            <div class="card text-center" style="width: 18rem;">
                <div class="col">
                    <img src="./images/remera.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{$producto->nombre}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{$producto->nombre_marca}</h6>
                        <p class="card-text">{$producto->tipo}</p>
                        <p class="card-text">{$producto->precio}</p>
                        <div class="d-grid gap-2">
                        <a href="producto" class="btn btn-primary">Volver</a>
                        {if !$logged}
                            <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        {else}
                            <form method="POST" action="producto/{$producto->id_producto}/editar">
                                <div class="d-grid gap-2">
                                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="nombre">
                                    <input class="form-control" type="text" id="tipo" name="tipo" placeholder="tipo">
                                    <input class="form-control" type="text" id="precio" name="precio" placeholder="precio">
                                    <input class="form-control" type="text" id="foto" name="foto" placeholder="foto">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </form>
                            <a href='producto/{$producto->id_producto}/borrar' class="btn btn-primary">Borrar</a>
                        {/if}
                    </div>
                </div>
            </div> 
        </div>
    </div>  

{include 'footer.tpl'}

