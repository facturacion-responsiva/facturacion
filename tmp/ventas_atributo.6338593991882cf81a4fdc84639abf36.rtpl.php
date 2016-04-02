<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   function eliminar_valor(id)
   {
      if( confirm("¿Estas seguro de que deseas eliminar este valor?") )
      {
         window.location.href = "<?php echo $fsc->atributo->url();?>&delete_val="+id;
      }
   }
   $(document).ready(function() {
      $("#b_eliminar_atributo").click(function(event) {
         event.preventDefault();
         if( confirm("¿Estas seguro de que deseas eliminar este atributo?") )
         {
            window.location.href = "<?php echo $fsc->url();?>&delete=<?php echo $fsc->atributo->codatributo;?>";
         }
      });
   });
</script>

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-header">
            <h1>
               <a class="btn btn-xs btn-default" href="<?php echo $fsc->url();?>">
                  <span class="glyphicon glyphicon-arrow-left"></span>
               </a>
               <span class="glyphicon glyphicon-edit"></span>
               Atributo
               <small><?php echo $fsc->atributo->codatributo;?></small>
               <a class="btn btn-xs btn-default" href="<?php echo $fsc->atributo->url();?>" title="Recargar la página">
                  <span class="glyphicon glyphicon-refresh"></span>
               </a>
            </h1>
            <p class="help-block">
               Desde aquí puedes definir los valores posibles para este atributo.
            </p>
         </div>
      </div>
   </div>
   <form action="<?php echo $fsc->atributo->url();?>" method="post" class="form">
      <div class="row">
         <div class="col-sm-6">
            <input type="text" name="nombre" value="<?php echo $fsc->atributo->nombre;?>" class="form-control" autocomplete="off"/>
         </div>
         <div class="col-sm-6 text-right">
            <a class="btn btn-sm btn-success" href="<?php echo $fsc->url();?>#nuevo" title="Nuevo fabricante">
               <span class="glyphicon glyphicon-plus"></span>
            </a>
            <div class="btn-group">
               <?php if( $fsc->allow_delete ){ ?>

               <a href="#" id="b_eliminar_atributo" class="btn btn-sm btn-danger">
                  <span class="glyphicon glyphicon-trash"></span>
                  <span class="hidden-xs hidden-sm">&nbsp; Eliminar</span>
               </a>
               <?php } ?>

               <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
                  <span class="glyphicon glyphicon-floppy-disk"></span> &nbsp; Guardar
               </button>
            </div>
         </div>
      </div>
   </form>
   <div class="row">
      <div class="col-sm-12">
         <ul class="nav nav-tabs" style="margin-top: 10px; margin-bottom: 10px;">
            <li role="presentation" class="active">
               <a href="#">
                  <span class="glyphicon glyphicon-list"></span> &nbsp; Valores
                  <span class="badge"><?php echo count($fsc->resultados); ?></span>
               </a>
            </li>
         </ul>
         <?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

         <form action="<?php echo $fsc->atributo->url();?>" method="post" class="form">
            <input type="hidden" name="id" value="<?php echo $value1->id;?>"/>
            <div class="form-group">
               <div class="input-group">
                  <?php if( $fsc->allow_delete ){ ?>

                  <span class="input-group-btn">
                     <button class="btn btn-danger" type="button" title="Eliminar este valor" onclick="eliminar_valor('<?php echo $value1->id;?>')">
                        <span class="glyphicon glyphicon-trash"></span>
                     </button>
                  </span>
                  <?php } ?>

                  <input type="text" name="valor" value="<?php echo $value1->valor;?>" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                     <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-floppy-disk"></span>
                     </button>
                  </span>
               </div>
            </div>
         </form>
         <?php } ?>

         <form action="<?php echo $fsc->atributo->url();?>" method="post" class="form">
            <div class="input-group">
               <input type="text" name="nuevo_valor" class="form-control" placeholder="Nuevo valor..." autocomplete="off" required=""/>
               <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">
                     <span class="glyphicon glyphicon-floppy-disk"></span>
                  </button>
               </span>
            </div>
         </form>
      </div>
   </div>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>