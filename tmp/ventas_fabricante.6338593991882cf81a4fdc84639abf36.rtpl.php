<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<?php if( $fsc->fabricante ){ ?>

<script type="text/javascript">
   $(document).ready(function() {
      $("#b_eliminar_fabricante").click(function(event) {
         event.preventDefault();
         if( confirm("¿Estas seguro de que deseas eliminar este fabricante?") )
         {
            window.location.href = "index.php?page=ventas_fabricantes&delete=<?php echo $fsc->fabricante->codfabricante;?>";
         }
      });
   });
</script>

<form action="<?php echo $fsc->url();?>" method="post" class="form">
   <input type="hidden" name="cod" value="<?php echo $fsc->fabricante->codfabricante;?>"/>
   <div class="container-fluid">
      <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
         <div class="col-sm-8">
            <a class="btn btn-sm btn-default" href="<?php echo $fsc->url();?>" title="Recargar la página">
               <span class="glyphicon glyphicon-refresh"></span>
            </a>
            <a class="btn btn-sm btn-default" href="index.php?page=ventas_fabricantes">
               <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Fabricantes
            </a>
            <div class="btn-group">
            <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

               <?php if( $value1->type=='button' ){ ?>

               <a href="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>" class="btn btn-sm btn-default"><?php echo $value1->text;?></a>
               <?php } ?>

            <?php } ?>

            </div>
         </div>
         <div class="col-sm-4 text-right">
            <a class="btn btn-sm btn-success" href="index.php?page=ventas_fabricantes#nuevo" title="Nuevo fabricante">
               <span class="glyphicon glyphicon-plus"></span>
            </a>
            <div class="btn-group">
               <?php if( $fsc->allow_delete ){ ?>

               <a href="#" id="b_eliminar_fabricante" class="btn btn-sm btn-danger">
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
      <div class="row">
         <div class="col-sm-8">
            <div class="form-group">
               Nombre:
               <input class="form-control" type="text" name="nombre" value="<?php echo $fsc->fabricante->nombre;?>" autocomplete="off"/>
            </div>
         </div>
      </div>
   </div>
</form>

<div role="tabpanel">
   <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active">
         <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
            Artículos
            <span class="hidden-xs badge"><?php echo $fsc->total_fabricante();?></span>
         </a>
      </li>
      <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

         <?php if( $value1->type=='tab' ){ ?>

         <li role="presentation">
            <a href="#ext_<?php echo $value1->name;?>" aria-controls="ext_<?php echo $value1->name;?>" role="tab" data-toggle="tab"><?php echo $value1->text;?></a>
         </li>
         <?php } ?>

      <?php } ?>

   </ul>
   <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
         <div class="table-responsive">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th class="text-left">Referencia + Descripción</th>
                     <th class="text-right">Coste</th>
                     <th class="text-right">Precio</th>
                     <th class="text-right">Stock</th>
                  </tr>
               </thead>
               <?php $loop_var1=$fsc->articulos; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

               <tr class="clickableRow<?php if( $value1->bloqueado ){ ?> danger<?php }elseif( $value1->stockfis<$value1->stockmin ){ ?> warning<?php } ?>" href="<?php echo $value1->url();?>">
                  <td><a href="<?php echo $value1->url();?>"><?php echo $value1->referencia;?></a> <?php echo $value1->descripcion();?></td>
                  <td class="text-right"><?php echo $fsc->show_precio($value1->preciocoste(), FALSE, TRUE, FS_NF0_ART);?></td>
                  <td class="text-right">
                     <span title="actualizado el <?php echo $value1->factualizado;?>"><?php echo $fsc->show_precio($value1->pvp, FALSE, TRUE, FS_NF0_ART);?></span>
                  </td>
                  <td class="text-right"><?php echo $value1->stockfis;?></td>
               </tr>
               <?php }else{ ?>

               <tr class="warning">
                  <td colspan="5">Ningún artículo encontrado.</td>
               </tr>
               <?php } ?>

            </table>
         </div>
         <ul class="pager">
            <?php if( $fsc->anterior_url()!='' ){ ?>

            <li class="previous">
               <a href="<?php echo $fsc->anterior_url();?>">
                  <span class="glyphicon glyphicon-chevron-left"></span> &nbsp; Anteriors
               </a>
            </li>
            <?php } ?>

            
            <?php if( $fsc->siguiente_url()!='' ){ ?>

            <li class="next">
               <a href="<?php echo $fsc->siguiente_url();?>">
                  Siguientes &nbsp; <span class="glyphicon glyphicon-chevron-right"></span>
               </a>
            </li>
            <?php } ?>

         </ul>
      </div>
      <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

         <?php if( $value1->type=='tab' ){ ?>

         <div role="tabpanel" class="tab-pane" id="ext_<?php echo $value1->name;?>">
            <iframe src="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>&cod=<?php echo $fsc->fabricante->codfabricante;?>" width="100%" height="600" frameborder="0"></iframe>
         </div>
         <?php } ?>

      <?php } ?>

   </div>
</div>

<?php }else{ ?>

<div class="thumbnail">
   <img src="view/img/fuuu_face.png" alt="fuuuuu"/>
</div>
<?php } ?>


<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>