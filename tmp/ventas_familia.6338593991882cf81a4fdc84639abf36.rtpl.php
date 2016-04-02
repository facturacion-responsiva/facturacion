<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<?php if( $fsc->familia ){ ?>

<script type="text/javascript">
   $(document).ready(function() {
      $("#b_eliminar_familia").click(function(event) {
         event.preventDefault();
         if( confirm("¿Estas seguro de que deseas eliminar esta familia?") )
         {
            window.location.href = "index.php?page=ventas_familias&delete=<?php echo $fsc->familia->codfamilia;?>";
         }
      });
   });
</script>

<form action="<?php echo $fsc->url();?>" method="post" class="form">
   <input type="hidden" name="cod" value="<?php echo $fsc->familia->codfamilia;?>"/>
   <div class="container-fluid">
      <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
         <div class="col-sm-8">
            <a class="btn btn-sm btn-default" href="<?php echo $fsc->url();?>" title="Recargar la página">
               <span class="glyphicon glyphicon-refresh"></span>
            </a>
            <?php if( $fsc->madre ){ ?>

            <a class="btn btn-sm btn-default" href="<?php echo $fsc->madre->url();?>" title="<?php echo $fsc->madre->descripcion;?>">
               <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Madre
            </a>
            <?php }else{ ?>

            <a class="btn btn-sm btn-default" href="index.php?page=ventas_familias">
               <span class="glyphicon glyphicon-arrow-left"></span> &nbsp; Familias
            </a>
            <?php } ?>

            <div class="btn-group">
               <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  Subfamilias <span class="caret"></span>
               </button>
               <ul class="dropdown-menu" role="menu">
                  <?php $loop_var1=$fsc->familia->hijas(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <li><a href="<?php echo $value1->url();?>"><?php echo $value1->descripcion;?></a></li>
                  <?php }else{ ?>

                  <li><a href="#">Ninguna</a></li>
                  <?php } ?>

                  <li role="presentation" class="divider"></li>
                  <li><a href="index.php?page=ventas_familias&madre=<?php echo $fsc->familia->codfamilia;?>">Nueva subfamilia</a></li>
                  <?php if( $fsc->familia->madre ){ ?>

                  <li><a href="index.php?page=ventas_familias&madre=<?php echo $fsc->familia->madre;?>">Nueva familia hermana</a></li>
                  <?php } ?>

               </ul>
            </div>
            <div class="btn-group">
            <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

               <?php if( $value1->type=='button' ){ ?>

               <a href="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>" class="btn btn-sm btn-default"><?php echo $value1->text;?></a>
               <?php } ?>

            <?php } ?>

            </div>
         </div>
         <div class="col-sm-4 text-right">
            <a class="btn btn-sm btn-success" href="index.php?page=ventas_familias#nueva" title="Nueva familia">
               <span class="glyphicon glyphicon-plus"></span>
            </a>
            <div class="btn-group">
               <?php if( $fsc->allow_delete ){ ?>

               <a href="#" id="b_eliminar_familia" class="btn btn-sm btn-danger">
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
               Descripción:
               <input class="form-control" type="text" name="descripcion" value="<?php echo $fsc->familia->descripcion;?>" autocomplete="off"/>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               Familia madre:
               <select name="madre" class="form-control">
                  <option value="---">Ninguna</option>
                  <option value="---">-----</option>
                  <?php $loop_var1=$fsc->familia->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                     <?php if( $value1->codfamilia==$fsc->familia->codfamilia ){ ?>

                     <?php }elseif( $value1->madre==$fsc->familia->codfamilia ){ ?>

                     <?php }elseif( $fsc->familia->madre==$value1->codfamilia ){ ?>

                     <option value="<?php echo $value1->codfamilia;?>" selected=""><?php echo $value1->nivel;?><?php echo $value1->descripcion;?></option>
                     <?php }else{ ?>

                     <option value="<?php echo $value1->codfamilia;?>"><?php echo $value1->nivel;?><?php echo $value1->descripcion;?></option>
                     <?php } ?>

                  <?php } ?>

               </select>
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
            <span class="hidden-xs badge"><?php echo $fsc->total_familia();?></span>
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
            <iframe src="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>&cod=<?php echo $fsc->familia->codfamilia;?>" width="100%" height="600" frameborder="0"></iframe>
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