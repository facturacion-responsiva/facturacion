<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   function fs_marcar_todo()
   {
      $("#f_agrupar_cli input[name='idalbaran[]']").prop('checked', true);
   }
   function fs_marcar_nada()
   {
      $("#f_agrupar_cli input[name='idalbaran[]']").prop('checked', false);
   }
   $(document).ready(function() {
      document.f_agrupar_alb.ac_cliente.focus();
      $("#ac_cliente").autocomplete({
         serviceUrl: '<?php echo $fsc->url();?>',
         paramName: 'buscar_cliente',
         onSelect: function (suggestion) {
            if(suggestion)
            {
               if(document.f_agrupar_alb.codcliente.value != suggestion.data && suggestion.data != '')
               {
                  document.f_agrupar_alb.codcliente.value = suggestion.data;
               }
            }
         }
      });
   });
</script>

<form name="f_agrupar_alb" action="<?php echo $fsc->url();?>" method="post" class="form">
   <?php if( $fsc->cliente ){ ?>

   <input type="hidden" name="codcliente" value="<?php echo $fsc->cliente->codcliente;?>"/>
   <?php }else{ ?>

   <input type="hidden" name="codcliente"/>
   <?php } ?>

   <div class="container">
      <div class="row">
         <div class="col-xs-12">
            <div class="btn-group">
            <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

               <?php if( $value1->type=='button' ){ ?>

               <a href="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>" class="btn btn-sm btn-default"><?php echo $value1->text;?></a>
               <?php } ?>

            <?php } ?>

            </div>
            <div class="page-header">
               <h1>
                  <a class="btn btn-xs btn-default" href="index.php?page=ventas_albaranes">
                     <span class="glyphicon glyphicon-arrow-left"></span>
                  </a>
                  <span class="glyphicon glyphicon-duplicate"></span>
                  Agrupar <?php  echo FS_ALBARANES;?>

                  <a class="btn btn-xs btn-default" href="<?php echo $fsc->url();?>" title="Recargar la página">
                     <span class="glyphicon glyphicon-refresh"></span>
                  </a>
               </h1>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-5">
            <div class="form-group">
               Cliente:
               <div class="input-group">
                  <?php if( $fsc->cliente ){ ?>

                  <input class="form-control" type="text" name="ac_cliente" value="<?php echo $fsc->cliente->nombre;?>" id="ac_cliente" placeholder="Buscar" autocomplete="off"/>
                  <?php }else{ ?>

                  <input class="form-control" type="text" name="ac_cliente" id="ac_cliente" placeholder="Buscar" autocomplete="off"/>
                  <?php } ?>

                  <span class="input-group-btn">
                     <button class="btn btn-default" type="button" onclick="document.f_agrupar_alb.ac_cliente.value='';document.f_agrupar_alb.ac_cliente.focus();">
                        <span class="glyphicon glyphicon-edit"></span>
                     </button>
                  </span>
               </div>
            </div>
         </div>
         <div class="col-sm-3">
            Serie:
            <select name="codserie" class="form-control">
            <?php $loop_var1=$fsc->serie->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

				   <?php if( $value1->codserie==$fsc->codserie ){ ?>

				   <option value="<?php echo $value1->codserie;?>" selected=""><?php echo $value1->descripcion;?></option>
				   <?php }else{ ?>

				   <option value="<?php echo $value1->codserie;?>"><?php echo $value1->descripcion;?></option>
				   <?php } ?>

				<?php } ?>

            </select>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Desde:
               <input type="text" name="desde" class="form-control datepicker" value="<?php echo $fsc->desde;?>"/>
            </div>
         </div>
         <div class="col-sm-2">
            <div class="form-group">
               Hasta:
               <input type="text" name="hasta" class="form-control datepicker" value="<?php echo $fsc->hasta;?>"/>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-5">
            <div class="form-group">
               Observaciones:
               <input type="text" name="observaciones" class="form-control" value="<?php echo $fsc->observaciones;?>"/>
            </div>
         </div>
         <div class="col-sm-7 text-right">
            <br/>
            <button type="submit" class="btn btn-sm btn-primary" onclick="this.disabled=true;this.form.submit();">
               <span class="glyphicon glyphicon-search"></span> &nbsp; Buscar
            </button>
         </div>
      </div>
   </div>
</form>

<?php if( $fsc->resultados ){ ?>

<form id="f_agrupar_cli" action="<?php echo $fsc->url();?>" method="post" class="form">
   <input type="hidden" name="petition_id" value="<?php echo $fsc->random_string();?>"/>
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="table-responsive">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th class="text-left">Código + <?php  echo FS_NUMERO2;?></th>
                        <th class="text-left">Observaciones</th>
                        <th class="text-right">Neto</th>
                        <th class="text-right">Total</th>
                        <th class="text-right">Fecha</th>
                     </tr>
                  </thead>
                  <?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <tr<?php if( $value1->total<0 ){ ?> class="bg-warning"<?php } ?>>
                     <td>
                        <div>
                           <input type="checkbox" name="idalbaran[]" value="<?php echo $value1->idalbaran;?>" checked="checked"/>
                           <a href="<?php echo $value1->url();?>"><?php echo $value1->codigo;?></a> <?php echo $value1->numero2;?>

                        </div>
                     </td>
                     <td><?php echo $value1->observaciones_resume();?></td>
                     <td class="text-right"><?php echo $fsc->show_precio($value1->neto, $value1->coddivisa);?></td>
                     <td class="text-right"><?php echo $fsc->show_precio($value1->total, $value1->coddivisa);?></td>
                     <td class="text-right"><?php echo $value1->fecha;?></td>
                  </tr>
                  <?php } ?>

                  <tr>
                     <td colspan="2"></td>
                     <td class="text-right"><b><?php echo $fsc->show_precio($fsc->neto);?></b></td>
                     <td class="text-right"><b><?php echo $fsc->show_precio($fsc->total);?></b></td>
                     <td></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <div class="btn-group">
               <button class="btn btn-sm btn-default" type="button" onclick="fs_marcar_todo()" title="Marcar todo">
                  <span class="glyphicon glyphicon-check"></span>
               </button>
               <button class="btn btn-sm btn-default" type="button" onclick="fs_marcar_nada()" title="Desmarcar todo">
                  <span class="glyphicon glyphicon-unchecked"></span>
               </button>
            </div>
         </div>
         <div class="col-sm-6 text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_agrupar">
               <span class="glyphicon glyphicon-file"></span> &nbsp; Generar Factura
            </button>
         </div>
      </div>
   </div>
   <div class="modal" id="modal_agrupar" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <h4 class="modal-title">Generar factura</h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  Fecha de la factura:
                  <input class="form-control datepicker" type="text" name="fecha" value="<?php echo $fsc->today();?>" autocomplete="off"/>
               </div>
               <div class="checkbox">
                  <label>
                     <input type="checkbox" name="individuales" value="TRUE"/>
                     Generar facturas individuales
                  </label>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
                  <span class="glyphicon glyphicon-file"></span> &nbsp; Generar Factura
               </button>
            </div>
         </div>
      </div>
   </div>
</form>
<?php }elseif( $fsc->cliente ){ ?>

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-info">
            <div class="panel-heading">
               <h3 class="panel-title">Ayuda</h3>
            </div>
            <div class="panel-body">
               No se han encontrado resultados para esta búsqueda.
            </div>
         </div>
      </div>
   </div>
</div>
<?php }else{ ?>

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Ayuda</h3>
            </div>
            <div class="panel-body">
               Con esta herramienta puedes buscar y agrupar varios <?php  echo FS_ALBARANES;?>

               pendientes de un mismo cliente y generar una <?php  echo FS_FACTURA;?> (o una para cada uno).
               Si hay <?php  echo FS_ALBARANES;?> pendientes aparecerán los clientes aquí debajo
               para ahorrarte clics ;-)
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <?php $loop_var1=$fsc->pendientes(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <div class="col-sm-4">
         <a href="<?php echo $fsc->url();?>&codcliente=<?php echo $value1['codcliente'];?>&codserie=<?php echo $value1['codserie'];?>&desde=<?php echo $value1['desde'];?>" class="btn btn-sm btn-block <?php if( $value1['num']>1 ){ ?>btn-info<?php }else{ ?>btn-default<?php } ?>">
            <span class="glyphicon glyphicon-user"></span>
            &nbsp; <?php echo $value1['nombre'];?>

            <?php if( $value1['num']>1 ){ ?>&nbsp; (<?php echo $value1['num'];?>)<?php } ?>

         </a>
         <br/>
      </div>
      <?php } ?>

   </div>
</div>
<?php } ?>


<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>