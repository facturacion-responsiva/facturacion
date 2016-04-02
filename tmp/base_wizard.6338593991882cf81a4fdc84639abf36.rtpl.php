<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<?php if( $fsc->step==2 ){ ?>

<script type="text/javascript" src="<?php echo $fsc->get_js_location('provincias.js');?>"></script>
<form name="f_empresa" action="<?php echo $fsc->page->url();?>" method="post" class="form" role="form">
   <div class="container">
      <?php if( $fsc->bad_password ){ ?>

      <div class="row">
         <div class="col-sm-12">
            <div class="page-header">
               <h1>
                  <span class="glyphicon glyphicon-warning-sign"></span>
                  Contraseña no segura
               </h1>
               <p class="help-block">
                  Si esta instalación está disponible públicamente, es recomendable
                  que cambies la contraseña.
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-3">
            <div class="form-group">
               <input class="form-control" type="password" name="npassword" maxlength="32" placeholder="nueva contraseña" autofocus />
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               <input class="form-control" type="password" name="npassword2" maxlength="32" placeholder="repite la contraseña"/>
            </div>
         </div>
      </div>
      <?php } ?>

      <div class="row">
         <div class="col-sm-12">
            <div class="page-header">
               <h1>
                  <span class="glyphicon glyphicon-edit"></span>
                  Datos de la empresa / Autónomo
               </h1>
               <p class="help-block">
                  Bienvenido al asiente de instalación de facturacion_base, el plugin
                  de FacturaScripts que integra la facturación y contabilidad básica.
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-5">
            <div class="form-group">
               Nombre:
               <input class="form-control" type="text" name="nombre" value="<?php echo $fsc->empresa->nombre;?>" autocomplete="off" autofocus />
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               Nombre Corto:
               <input class="form-control" type="text" name="nombrecorto" value="<?php echo $fsc->empresa->nombrecorto;?>" autocomplete="off"/>
               <p class="help-block">Para mostrar en el menú.</p>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               <?php  echo FS_CIFNIF;?>:
               <input class="form-control" type="text" name="cifnif" value="<?php echo $fsc->empresa->cifnif;?>" autocomplete="off"/>
               <p class="help-block">
                  <?php  echo FS_CIFNIF;?> es el identificador fiscal. Si en tu país se llama de otra forma, puedes traducirlo más adelante.
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-3">
            <div class="form-group">
               <a href="<?php echo $fsc->pais->url();?>">País</a>:
               <select name="codpais" class="form-control">
                  <?php $loop_var1=$fsc->pais->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1->codpais;?>"<?php if( $fsc->empresa->codpais == $value1->codpais ){ ?> selected=""<?php } ?>><?php echo $value1->nombre;?></option>
                  <?php } ?>

               </select>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               <div class="text-capitalize"><?php  echo FS_PROVINCIA;?>:</div>
               <input id="ac_provincia" class="form-control" type="text" name="provincia" value="<?php echo $fsc->empresa->provincia;?>"/>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               Ciudad:
               <input class="form-control" type="text" name="ciudad" value="<?php echo $fsc->empresa->ciudad;?>" autocomplete="off"/>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               Código Postal:
               <input class="form-control" type="text" name="codpostal" value="<?php echo $fsc->empresa->codpostal;?>" autocomplete="off"/>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-8">
            <div class="form-group">
               Dirección:
               <input class="form-control" type="text" name="direccion" value="<?php echo $fsc->empresa->direccion;?>" autocomplete="off"/>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               Administrador de la empresa:
               <input class="form-control" type="text" name="administrador" value="<?php echo $fsc->empresa->administrador;?>" autocomplete="off"/>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <div class="form-group">
               Teléfono:
               <input class="form-control" type="text" name="telefono" value="<?php echo $fsc->empresa->telefono;?>" autocomplete="off"/>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               Fax:
               <input class="form-control" type="text" name="fax" value="<?php echo $fsc->empresa->fax;?>" autocomplete="off"/>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               Web:
               <input class="form-control" type="text" name="web" value="<?php echo $fsc->empresa->web;?>" autocomplete="off"/>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 text-right">
            <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
               <span class="glyphicon glyphicon-ok"></span> &nbsp; Continuar
            </button>
         </div>
      </div>
   </div>
</form>
<?php }elseif( $fsc->step==3 ){ ?>

<form name="f_empresa" action="<?php echo $fsc->page->url();?>" method="post" class="form" role="form">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-header">
               <h1>
                  <span class="glyphicon glyphicon-globe"></span>
                  Datos regionales
               </h1>
               <p class="help-block">
                  Ahora hay que seleccionar la moneda y traducir lo que necesites
               </p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-3">
            <div class="form-group">
               <a href="<?php echo $fsc->divisa->url();?>">Divisa</a>:
               <select name="coddivisa" class="form-control">
                  <?php $loop_var1=$fsc->divisa->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1->coddivisa;?>"<?php if( $fsc->empresa->coddivisa == $value1->coddivisa ){ ?> selected=""<?php } ?>><?php echo $value1->descripcion;?></option>
                  <?php } ?>

               </select>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               Decimales de los totales:
               <select name="nf0" class="form-control">
               <?php $loop_var1=$fsc->nf0(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1;?>"<?php if( $value1==$GLOBALS['config2']['nf0'] ){ ?> selected=""<?php } ?>><?php echo $value1;?></option>
               <?php } ?>

               </select>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               Decimales de los precios:
               <select name="nf0_art" class="form-control">
               <?php $loop_var1=$fsc->nf0(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1;?>"<?php if( $value1==$GLOBALS['config2']['nf0_art'] ){ ?> selected=""<?php } ?>><?php echo $value1;?></option>
               <?php } ?>

               </select>
            </div>
         </div>
         <div class="col-sm-3">
            <div class="form-group">
               Separador para los Decimales:
               <select name="nf1" class="form-control">
               <?php $loop_var1=$fsc->nf1(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $key1;?>"<?php if( $key1==$GLOBALS['config2']['nf1'] ){ ?> selected=""<?php } ?>><?php echo $value1;?></option>
               <?php } ?>

               </select>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <div class="form-group">
               Separador para los Millares:
               <select name="nf2" class="form-control">
                  <option value="">(Ninguno)</option>
                  <?php $loop_var1=$fsc->nf1(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $key1;?>"<?php if( $key1==$GLOBALS['config2']['nf2'] ){ ?> selected=""<?php } ?>><?php echo $value1;?></option>
                  <?php } ?>

               </select>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               Posición del símbolo divisa:
               <select name="pos_divisa" class="form-control">
                  <option value="right"<?php if( $GLOBALS['config2']['pos_divisa']=='right' ){ ?> selected=""<?php } ?>>123 <?php echo $fsc->simbolo_divisa();?></option>
                  <option value="left"<?php if( $GLOBALS['config2']['pos_divisa']=='left' ){ ?> selected=""<?php } ?>><?php echo $fsc->simbolo_divisa();?>123</option>
               </select>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <h2>Traducciones:</h2>
            <p class="help-block">
               Puedes traducir ciertos términos para adaptarlos a tu país o simplemente por comodidad.
            </p>
            <p class="help-block">
               FACTURA y FACTURAS se traducen únicamente en los documentos de ventas.
               FACTURA_SIMPLIFICADA se utiliza en los tickets.
               NUMERO2 es un campo disponible en todos los documentos de ventas y
               que puedes usar como quieras.
            </p>
         </div>
      </div>
      <div class="row">
         <?php $loop_var1=$fsc->traducciones(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

         <div class="col-sm-3">
            <div class="form-group">
               <span class="text-uppercase"><?php echo $value1['nombre'];?>:</span>
               <input class="form-control" type="text" name="<?php echo $value1['nombre'];?>" value="<?php echo $value1['valor'];?>" autocomplete="off"/>
            </div>
         </div>
         <?php } ?>

      </div>
      <div class="row">
         <div class="col-sm-12 text-right">
            <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
               <span class="glyphicon glyphicon-ok"></span> &nbsp; Continuar
            </button>
         </div>
      </div>
   </div>
</form>
<?php }elseif( $fsc->step==4 ){ ?>

<form name="f_empresa" action="<?php echo $fsc->page->url();?>" method="post" class="form" role="form">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-header">
               <h1>
                  <span class="glyphicon glyphicon-edit"></span>
                  Datos de facturación
               </h1>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <div class="form-group">
               <a href="<?php echo $fsc->ejercicio->url();?>">Ejercicio contable</a>:
               <select name="codejercicio" class="form-control" autofocus >
                  <?php $loop_var1=$fsc->ejercicio->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1->codejercicio;?>"<?php if( $fsc->empresa->codejercicio == $value1->codejercicio ){ ?> selected=""<?php } ?>><?php echo $value1->nombre;?></option>
                  <?php } ?>

               </select>
               <p class="help-block">Sólo sirve para inicializar algunos campos.</p>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               <a href="<?php echo $fsc->serie->url();?>">Serie de facturación</a>:
               <select name="codserie" class="form-control">
                  <?php $loop_var1=$fsc->serie->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1->codserie;?>"<?php if( $fsc->empresa->codserie == $value1->codserie ){ ?> selected=""<?php } ?>><?php echo $value1->descripcion;?></option>
                  <?php } ?>

               </select>
               <p class="help-block">El <?php  echo FS_IRPF;?> se define en la serie.</p>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               Algoritmo de nuevo código:
               <select name="new_codigo" class="form-control">
                  <option value="eneboo"<?php if( $GLOBALS['config2']['new_codigo']=='eneboo' ){ ?> selected=''<?php } ?>>Compatible con Eneboo</option>
                  <option value="new"<?php if( $GLOBALS['config2']['new_codigo']=='new' ){ ?> selected=''<?php } ?>>TIPO + EJERCICIO + SERIE + NÚMERO</option>
               </select>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <div class="form-group">
               <a href="<?php echo $fsc->forma_pago->url();?>">Forma de pago predeterminada</a>:
               <select name="codpago" class="form-control">
                  <?php $loop_var1=$fsc->forma_pago->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1->codpago;?>"<?php if( $fsc->empresa->codpago == $value1->codpago ){ ?> selected=""<?php } ?>><?php echo $value1->descripcion;?></option>
                  <?php } ?>

               </select>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">
               <a href="<?php echo $fsc->almacen->url();?>">Almacén principal</a>:
               <select name="codalmacen" class="form-control">
                  <?php $loop_var1=$fsc->almacen->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo $value1->codalmacen;?>"<?php if( $fsc->empresa->codalmacen == $value1->codalmacen ){ ?> selected=""<?php } ?>><?php echo $value1->nombre;?></option>
                  <?php } ?>

               </select>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="checkbox">
               <label>
                  <input type="checkbox" name="contintegrada" value="TRUE"<?php if( $fsc->empresa->contintegrada ){ ?> checked="checked"<?php } ?>/>
                  Contabilidad integrada: conforme haces facturas se generan los asientos contables.
               </label>
            </div>
            <?php if( $fsc->empresa->codpais=='ESP' or $fsc->empresa->codpais=='ES' ){ ?>

            <div class="checkbox">
               <label>
                  <input type="checkbox" name="recequivalencia" value="TRUE"<?php if( $fsc->empresa->recequivalencia ){ ?> checked="checked"<?php } ?>/>
                  Aplicar recargo de equivalencia a tus compras.
               </label>
            </div>
            <?php } ?>

         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 text-right">
            <button class="btn btn-sm btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
               <span class="glyphicon glyphicon-ok"></span> &nbsp; Continuar
            </button>
         </div>
      </div>
   </div>
</form>
<?php }elseif( $fsc->step==5 ){ ?>

<div class="container">
   <?php if( $fsc->empresa->codpais=='ESP' or $fsc->empresa->codpais=='ES' ){ ?>

   <div class="row">
      <div class="col-sm-12">
         <div class="page-header">
            <h1>
               Fin
               <a href="<?php echo $fsc->url();?>&restart=TRUE" class="btn btn-xs btn-warning" title="Volver a empezar">
                  <span class="glyphicon glyphicon-lock"></span>
               </a>
            </h1>
            <p class="help-block">
               Ya has terminado la configuración del plugin. Si quieres hacer cambios
               en la configuración de la empresa, puedes ir a <b>Admin &gt; Empresa</b>.
            </p>
         </div>
         <?php if( $fsc->empresa->contintegrada ){ ?>

            <a href="index.php?page=contabilidad_ejercicio&cod=<?php echo $fsc->empresa->codejercicio;?>" target="_blank" class="btn btn-sm btn-block btn-info">
               <span class="glyphicon glyphicon-import"></span> &nbsp;
               importar los datos contables
            </a>
            <p class="help-block">
               Ahora es el momento de importar el plan contable, si todavía no lo
               has hecho.
            </p>
         <?php } ?>

      </div>
   </div>
   <?php }else{ ?>

   <div class="row">
      <div class="col-sm-12">
         <div class="page-header">
            <h1>
               Fin
               <a href="<?php echo $fsc->url();?>&restart=TRUE" class="btn btn-xs btn-warning" title="Volver a empezar">
                  <span class="glyphicon glyphicon-lock"></span>
               </a>
            </h1>
            <p class="help-block">
               Ahora es el momento de instalar el plugin específico para tu pais.
            </p>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-4">
         <a href="index.php?page=admin_home#descargas" class="btn btn-sm btn-block btn-default">
            <span class="glyphicon glyphicon-download-alt"></span> &nbsp;
            Argentina
         </a>
         <br/>
      </div>
      <div class="col-sm-4">
         <a href="index.php?page=admin_home#descargas" class="btn btn-sm btn-block btn-default">
            <span class="glyphicon glyphicon-download-alt"></span> &nbsp;
            Colombia
         </a>
         <br/>
      </div>
      <div class="col-sm-4">
         <a href="index.php?page=admin_home#descargas" class="btn btn-sm btn-block btn-default">
            <span class="glyphicon glyphicon-download-alt"></span> &nbsp;
            Ecuador
         </a>
         <br/>
      </div>
      <div class="col-sm-4">
         <a href="index.php?page=admin_home#descargas" class="btn btn-sm btn-block btn-default">
            <span class="glyphicon glyphicon-download-alt"></span> &nbsp;
            Panamá
         </a>
         <br/>
      </div>
      <div class="col-sm-4">
         <a href="index.php?page=admin_home#descargas" class="btn btn-sm btn-block btn-default">
            <span class="glyphicon glyphicon-download-alt"></span> &nbsp;
            Perú
         </a>
         <br/>
      </div>
      <div class="col-sm-4">
         <a href="index.php?page=admin_home#descargas" class="btn btn-sm btn-block btn-default">
            <span class="glyphicon glyphicon-download-alt"></span> &nbsp;
            República Dominicana
         </a>
         <br/>
      </div>
   </div>
   <?php } ?>

   <div class="row">
      <div class="col-sm-6">
         <h3>El menú ventas</h3>
         <div class="embed-responsive embed-responsive-16by9">
            <iframe width="420" height="315" src="https://www.youtube.com/embed/B7o9pfF4NYA" frameborder="0" allowfullscreen></iframe>
         </div>
         <p class="help-block">
            Dispones de tu catálogo de artículos, con sus familias y fabricantes,
            el listado de clientes y las facturas y <?php  echo FS_ALBARANES;?> de venta.
         </p>
         <h3>El menú compras</h3>
         <div class="embed-responsive embed-responsive-16by9">
            <iframe width="420" height="315" src="https://www.youtube.com/embed/PbmhKDzANkM" frameborder="0" allowfullscreen></iframe>
         </div>
         <p class="help-block">
            En este menú tienes el listado de proveedores y acreedores (lo acreedores
            son aquellos a los que les compras servicios, por ejemplo el proveedor
            de Internet), además de los listados de facturas y <?php  echo FS_ALBARANES;?> de compra.
         </p>
         <p class="help-block">
            <b>¿No lo necesitas?</b> Puedes desactivar todo lo que quieras desde la
            pestaña <b>menú</b> de Admin &gt; Panel de control.
         </p>
      </div>
      <div class="col-sm-6">
         <h3>
            <span class="glyphicon glyphicon-transfer"></span>
            ¿Necesitas copiar datos de tu antiguo software?
         </h3>
         <p class="help-block">
            Muchos programas permiten exportar datos a archivos CSV o Excel,
            si es el caso, puedes usar el plugin
            <a href="https://www.facturascripts.com/store/producto/plugin-importarexportar-csv/" target="_blank">
               Importar/Exportar CSV
            </a>
            para copiar esos datos a FacturaScripts.
         </p>
         <hr/>
         <h3>
            <span class="glyphicon glyphicon-envelope"></span>
            ¿Quieres enviar emails desde FacturaScripts?
         </h3>
         <p class="help-block">
            Puedes usar tu cuenta de gmail, hotmail o tu dominio personalizado
            para enviar documentos cómodamente desde FacturaScripts.
         </p>
         <a href="index.php?page=admin_empresa#email" target="_blank" class="btn btn-xs btn-default">
            <span class="glyphicon glyphicon-envelope"></span>
            &nbsp; Configuración de email
         </a>
         <hr/>
         <h3>¿Quieres cambiar el número de factura inicial?</h3>
         <p class="help-block">
            Si ya tienes facturas en otro programa y quieres empezar por un número
            concreto de factura, puedes modificar la numeración desde
            <b>Contabilidad &gt; Series</b>. Activa la <b>numeración personalizada</b>
            y elige el número inicial.
         </p>
         <a href="index.php?page=contabilidad_series&num_personalizada=TRUE" target="_blank" class="btn btn-xs btn-default">
            <span class="glyphicon glyphicon-cog"></span>
            &nbsp; Numeración personalizada
         </a>
      </div>
   </div>
</div>
<?php } ?>


<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>