<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-header">
            <h1>Ecuador</h1>
            <p class="help-block">
               Este plugin está en desarrollo. Por ahora se ha añadido el <b>Plan contable de Ecuador</b>
               para que puedas importarlo en los ejercicios. Pruébalo ;-)
            </p>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-6">
         <a href="<?php echo $fsc->url();?>&opcion=moneda" class="btn btn-block btn-default">
            <span class="badge">1</span> &nbsp;
            Establecer DÓLAR EE.UU. como moneda por defecto
         </a>
      </div>
      <div class="col-sm-6">
         <a href="<?php echo $fsc->url();?>&opcion=pais" class="btn btn-block btn-default">
            <span class="badge">2</span> &nbsp;
            Establecer Ecuador como pais por defecto
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <br/>
         <a href="index.php?page=contabilidad_ejercicio&cod=<?php echo $fsc->empresa->codejercicio;?>" target="_blank" class="btn btn-sm btn-block btn-default">
            <span class="badge">3</span> &nbsp;
            Importar los datos contables
         </a>
      </div>
   </div>
</div>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>