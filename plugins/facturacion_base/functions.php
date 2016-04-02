<?php

/*
 * This file is part of FacturaSctipts
 * Copyright (C) 2015-2016  Carlos Garcia Gomez  neorazorx@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

function fs_tipos_id_fiscal()
{
   return array(FS_CIFNIF,'Pasaporte','DNI','NIF','CIF','CUIT');
}

function remote_printer()
{
   if( isset($_REQUEST['terminal']) )
   {
      require_model('terminal_caja.php');
      
      $t0 = new terminal_caja();
      $terminal = $t0->get($_REQUEST['terminal']);
      if($terminal)
      {
         echo $terminal->tickets;
         
         $terminal->tickets = '';
         $terminal->save();
      }
      else
         echo 'ERROR: terminal no encontrado.';
   }
}

