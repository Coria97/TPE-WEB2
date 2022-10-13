{include 'header.tpl'}
  <div class="row row-cols-3 g-6">
    {foreach from=$marcas item=$marca}
        <div class="container my-3">
          <div class="card text-center" style="width: 18rem;">
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title">{$marca->nombre}</h5>
                  <div class="d-grid gap-2">
                    <a href='marca/{$marca->id_marca}' class="btn btn-primary">Ver productos</a>
                    {if $logged}
                      <form method="POST" action="marca/{$marca->id_marca}/editar">
                        <div class="d-grid gap-2">
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="nombre">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                      </form>
                      <a href='marca/{$marca->id_marca}/borrar' class="btn btn-primary">Borrar</a>
                    {/if}
                  </div>
                </div>
              </div> 
          </div>
        </div>  
    {/foreach}
    {if $logged}
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
    {/if}
  </div>
{include 'footer.tpl'}