<div id="content">     
			<hr/>
			<strong>  <p class="mb-0 text-uppercase">
<img src="includes/contraer31.png" id="mostrar10" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar10" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;DATOS FISCALES DEL PROVEEDOR<div  id="mensajeDIRECEP2"><div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $direcciondeempresaporcentaje; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $direcciondeempresaporcentaje; ?>%</div>
								</div></div></strong>
	        <div id="target10" style="display:block;"  class="content2">
        <div class="card">
          <div class="card-body">
	<form class="row g-3 needs-validation was-validated" novalidate="" id="PDIRECEMPRE1form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
 
              <table class="table mb-0 table-striped">

                <tr>
            
                <th style="text-align:center" scope="col"> DIRECCIÓN FISCAL DEL PROVEEDOR</th>
                 </tr>

                            

                 
            
            


      <table class="table mb-0 table-striped">
      <tr>
               
               <th style="text-align:center" scope="col">DIRECCIÓN FISCAL DEL PROVEEDOR</th>
               <th style="text-align:center" scope="col">INFORMACIÓN </th>
           
               </tr>
               <tr>
    <th style="background:#ebf8fa;text-align:left" scope="col">NOMBRE COMERCIAL DE LA EMPRESA (PROVEEDOR):</th>
    <td  style="background:#ebf8fa;width: 700px"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_NOMBRE_COMERCIAL_EMPRESA; ?>" name="P_NOMBRE_COMERCIAL_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NOMBRE FISCAL O RAZÓN SOCIAL DE LA EMPRESA:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_NOMBRE_FISCAL_RS_EMPRESA; ?>" name="P_NOMBRE_FISCAL_RS_EMPRESA"></td>

    </tr>
							      <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">RFC:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_RFC_MTDP; ?>" name="P_RFC_MTDP"></td>

    </tr>
		<tr>
	                        <div class="col-md-4"style="background:#fbeee6">
                         <th style="background:#ebf8fa"> <strong><label for="validationCustom02" class="form-label">PERSONA FISICA O MORAL:</label></strong></th>
                         <td style="background:#ebf8fa"> <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="FISICA_MORAL">
                         <option selected="">SELECCIONA UNA OPCION</option>
                         <option style="background:#CEF6EC" <?php if($FISICA_MORAL=='FISICA'){echo "selected";} ?> value="FISICA">FISICA</option>
                         <option style="background:#BDBDBD" <?php if($FISICA_MORAL=='MORAL'){echo "selected";} ?>  value="MORAL">MORAL</option>
                         </select> </td></tr>
                          <div class="valid-feedback">Bien!</div>
                          </div>

	
         <tr>
    	  <div class="col-md-4"style="background:##ebf8fa">
    <th  style="background:#ebf8fa"><strong><label for="validationCustom02" class="form-label">RÉGIMEN FISCAL :</label></strong></th>
    <td  style="background:#ebf8fa"> <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="P_REGIMEN_FISCAL_MTDP"> >
    <option selected="">SELECCIONA UNA OPCION</option>
    <option style="background:#d9fbfc" <?php if($P_REGIMEN_FISCAL_MTDP=='601'){echo "selected";} ?> value="601"> 601 GENERAL DE LEY PERSONAS MORALES</option>
    <option style="background:#fcdcd9" <?php if($P_REGIMEN_FISCAL_MTDP=='603'){echo "selected";} ?> value="603">603 PERSONAS MORALES CON FINES NO LUCRATIVOS</option>
    <option style="background:#e0fcd9" <?php if($P_REGIMEN_FISCAL_MTDP=='605'){echo "selected";} ?> value="605"> 605 SUELDOS Y SALARIOS E INGRESOS ASIMILADOS A SALARIOS</option>
	<option style="background:#d9fcf3" <?php if($P_REGIMEN_FISCAL_MTDP=='606'){echo "selected";} ?> value="606">  606 ARRENDAMIENTO</option>
   <option style="background:#fbfcd9" <?php if($P_REGIMEN_FISCAL_MTDP=='607'){echo "selected";} ?> value="607"> 607 RÉGIMEN DE ENAJENACIÓN O ADQUISICIÓN DE BIENES</option>
    <option style="background:#d9e3fc" <?php if($P_REGIMEN_FISCAL_MTDP=='608'){echo "selected";} ?> value="608">608 DEMÁS INGRESOS</option>
	<option style="background:#fcd9fb" <?php if($P_REGIMEN_FISCAL_MTDP=='610'){echo "selected";} ?> value="610"> 610 RESIDENTES EN EL EXTRANJERO SIN ESTABLECIMIENTO PERMANENTE EN MÉXICO</option>
    <option style="background:#fcd9eb" <?php if($P_REGIMEN_FISCAL_MTDP=='611'){echo "selected";} ?> value="611"> 611 INGRESOS POR DIVIDENDOS (SOCIOS Y ACCIONISTAS)</option>
    <option style="background:#fcfad9" <?php if($P_REGIMEN_FISCAL_MTDP=='612'){echo "selected";} ?> value="612"> 612 PERSONAS FÍSICAS CON ACTIVIDADES EMPRESARIALES Y PROFESIONALES</option>
	<option style="background:#d9fce0" <?php if($P_REGIMEN_FISCAL_MTDP=='614'){echo "selected";} ?> value="614"> 614 INGRESOS POR INTERESES</option>
   <option style="background:#d9fcf6" <?php if($P_REGIMEN_FISCAL_MTDP=='615'){echo "selected";} ?> value="615"> 615 RÉGIMEN DE LOS INGRESOS POR OBTENCIÓN DE PREMIOS</option>
   	 <option style="background:#fcd9eb" <?php if($P_REGIMEN_FISCAL_MTDP=='616'){echo "selected";} ?> value="616"> 616 SIN OBLIGACIONES FISCALES</option>
    <option style="background:#e2fcd9" <?php if($P_REGIMEN_FISCAL_MTDP=='620'){echo "selected";} ?> value="620">620 SOCIEDADES COOPERATIVAS DE PRODUCCIÓN QUE OPTAN POR DIFERIR SUS INGRESOS</option>
	 <option style="background:#d9fcf1" <?php if($P_REGIMEN_FISCAL_MTDP=='621'){echo "selected";} ?> value="621">621 INCORPORACIÓN FISCAL</option>
     <option style="background:#dad9fc" <?php if($P_REGIMEN_FISCAL_MTDP=='622'){echo "selected";} ?> value="622">622 ACTIVIDADES AGRÍCOLAS, GANADERAS, SILVÍCOLAS Y PESQUERAS</option>
    <option style="background:#e4d9fc" <?php if($P_REGIMEN_FISCAL_MTDP=='623'){echo "selected";} ?> value="623">623 OPCIONAL PARA GRUPOS DE SOCIEDADES</option>
	 <option style="background:#f4d9fc" <?php if($P_REGIMEN_FISCAL_MTDP=='624'){echo "selected";} ?> value="624 COORDINADOS">624 COORDINADOS</option>
    <option style="background:#fcd9ec" <?php if($P_REGIMEN_FISCAL_MTDP=='625'){echo "selected";} ?> value="625"> 625 RÉGIMEN DE LAS ACTIVIDADES EMPRESARIALES CON INGRESOS A TRAVÉS DE PLATAFORMAS TECNOLÓGICAS</option>
    <option style="background:#fcd9e1" <?php if($P_REGIMEN_FISCAL_MTDP=='626'){echo "selected";} ?> value="626">626 RÉGIMEN SIMPLIFICADO DE CONFIANZA</option>
   </select> </td>
    <div class="valid-feedback">Bien!</div>
                          </div>   
						  
						  

	<tr>
	                        <div class="col-md-4"style="background:#fbeee6">
                         <th style="background:#ebf8fa"> <strong><label for="validationCustom02" class="form-label">METODO DE PAGO:</label></strong></th>
                         <td style="background:#ebf8fa"> <select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="_P_METODO_DE_PAGO">
                         <option selected="">SELECCIONA UNA OPCION</option>
                         <option style="background:#CEF6EC" <?php if($_P_METODO_DE_PAGO=='PUE'){echo "selected";} ?> value="PUE">PUE</option>
                         <option style="background:#BDBDBD" <?php if($_P_METODO_DE_PAGO=='PPD'){echo "selected";} ?>  value="PPD">PPD</option>
                         </select> </td></tr>
                          <div class="valid-feedback">Bien!</div>
                          </div>
						  
						  <tr>
						  
						                            <div class="col-md-4">
                          <th style="background:#ebf8fa"><strong><label for="validationCustom02" class="form-label">FORMA DE PAGO:</label></strong></th>
                          <td style="background:#ebf8fa"><select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="P_FORMADE_PAGO"> 
                         <option selected="">SELECCIONA UNA OPCION</option>
 <option style="background:#f2b4f5" <?php if($P_FORMADE_PAGO=='01'){echo "selected";} ?> value="01">01 EFECTIVO</option>
            <option style="background:#CEF6EC" <?php if($P_FORMADE_PAGO=='03'){echo "selected";} ?> value="03">O3 TRANSFERENCIA</option>
                         <option style="background:#BDBDBD" <?php if($P_FORMADE_PAGO=='04'){echo "selected";} ?> value="04">04 TARJETA DE CREDITO</option>
						 <option style="background:#f8dbd9" <?php if($P_FORMADE_PAGO=='28'){echo "selected";} ?> value="28">28 TARJETA DE DEBITO</option>
						<option style="background:#ecd9f8" <?php if($P_FORMADE_PAGO=='99'){echo "selected";} ?> value="99">99 POR DEFINIR</option>
                    
                         </select> </td>
                          <div class="valid-feedback">Bien!</div>
                          </div></tr>
						  
						  
						  
						  <tr>
						                            <div class="col-md-4"style="background:#d4f6c8">
                          <th style="background:#ebf8fa"><strong><label for="validationCustom02" class="form-label">USO DE CFDI:</label></strong></th>
                          <td style="background:#ebf8fa"><select class="form-select mb-3" aria-label="Default select example" id="validationCustom02" required="" name="P_USO_CFDI"> >
                         <option selected="">SELECCIONA UNA OPCION</option>
                         <option style="background:#CEF6EC" <?php if($P_USO_CFDI=='G01'){echo "selected";} ?>  value="G01">G01	ADQUISICIÓN DE MERCANCÍAS</option>
                         <option style="background:#BDBDBD" <?php if($P_USO_CFDI=='G02'){echo "selected";} ?> value="G02">G02	DEVOLUCIONES, DESCUENTOS O BONIFICACIONES</option>
                         <option style="background:#f6d2f7" <?php if($P_USO_CFDI=='G03'){echo "selected";} ?> value="G03">G03	GASTOS EN GENERAL</option>
                         <option style="background:#d1c7d1" <?php if($P_USO_CFDI=='101'){echo "selected";} ?> value="101">I01	CONSTRUCCIONES</option>
                         <option style="background:#c3f2f1" <?php if($P_USO_CFDI=='102'){echo "selected";} ?> value="102">I02	MOBILIARIO Y EQUIPO DE OFICINA POR INVERSIONES</option>
                         <option style="background:#b6f6de" <?php if($P_USO_CFDI=='103'){echo "selected";} ?> value="103">I03	EQUIPO DE TRANSPORTE</option>
                         <option style="background:#bdf6b6" <?php if($P_USO_CFDI=='104'){echo "selected";} ?> value="104">I04	EQUIPO DE CÓMPUTO Y ACCESORIOS</option>
                         <option style="background:#f2f6b6" <?php if($P_USO_CFDI=='105'){echo "selected";} ?> value="105">I05	DADOS, TROQUELES, MOLDES, MATRICES Y HERRAMENTAL</option>
                         <option style="background:#f3cbc9" <?php if($P_USO_CFDI=='106'){echo "selected";} ?> value="106">I06 COMUNICACIONES TELEFÓNICAS</option>
                         <option style="background:#e5c9f3" <?php if($P_USO_CFDI=='107'){echo "selected";} ?> value="107">I07	COMUNICACIONES SATELITALES</option>
                         <option style="background:#c9d7f3" <?php if($P_USO_CFDI=='108'){echo "selected";} ?> value="108">I08 OTRA MAQUINARIA Y EQUIPO</option>
                         <option style="background:#c9f3ea" <?php if($P_USO_CFDI=='D01'){echo "selected";} ?> value="D01">D01	HONORARIOS MÉDICOS, DENTALES Y GASTOS HOSPITALARIOS.</option>
                         <option style="background:#d8f3c9" <?php if($P_USO_CFDI=='D02'){echo "selected";} ?> value="D02">D02	GASTOS MÉDICOS POR INCAPACIDAD O DISCAPACIDAD</option>
                         <option style="background:#ebf994" <?php if($P_USO_CFDI=='D03'){echo "selected";} ?> value="D03">D03	GASTOS FUNERALES.</option>
                         <option style="background:#f2dacc" <?php if($P_USO_CFDI=='D04'){echo "selected";} ?> value="D04">D04 DONATIVOS</option>
                         <option style="background:#dfe0f2" <?php if($P_USO_CFDI=='D05'){echo "selected";} ?> value="D05">D05	INTERESES REALES EFECTIVAMENTE PAGADOS POR CRÉDITOS HIPOTECARIOS (CASA HABITACIÓN).</option>
                         <option style="background:#bdfab4" <?php if($P_USO_CFDI=='D06'){echo "selected";} ?> value="D06">D06	APORTACIONES VOLUNTARIAS AL SAR.</option>
                         <option style="background:#f3d9f7" <?php if($P_USO_CFDI=='D07'){echo "selected";} ?> value="D07">D07	PRIMAS POR SEGUROS DE GASTOS MÉDICOS.</option>
                         <option style="background:#f7e8d9" <?php if($P_USO_CFDI=='D08'){echo "selected";} ?> value="D08">D08 GASTOS DE TRANSPORTACIÓN ESCOLAR OBLIGATORIA.</option>
                         <option style="background:#ddd9f7" <?php if($P_USO_CFDI=='D09'){echo "selected";} ?> value="D09">D09	DEPÓSITOS EN CUENTAS PARA EL AHORRO, PRIMAS QUE TENGAN COMO BASE PLANES DE PENSIONES.</option>
                         <option style="background:#d9f7f4" <?php if($P_USO_CFDI=='D10'){echo "selected";} ?> value="D10">D10	PAGOS POR SERVICIOS EDUCATIVOS (COLEGIATURAS)</option>
                         <option style="background:#e0f7d9" <?php if($P_USO_CFDI=='CP01'){echo "selected";} ?> value="CP01">CP01	PAGOS</option>
                         <option style="background:#f7dfd9" <?php if($P_USO_CFDI=='CN01'){echo "selected";} ?> value="CN01">CN01	NÓMINA</option>
                         <option style="background:#e7d551" <?php if($P_USO_CFDI=='S01'){echo "selected";} ?> value="S01">S01	SIN EFECTOS FISCALES</option>
                         </select> </td>
                          <div class="valid-feedback">Bien!</div>
                          </div>
						  </tr>
	
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">EDIFICIO:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_EDIFICIO_EMPRESA; ?>" name="P_EDIFICIO_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">CALLE:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_CALLE_EMPRESA; ?>" name="P_CALLE_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NÚMERO EXTERIOR:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_NUMERO_EXTERIOR_EMPRESA; ?>" name="P_NUMERO_EXTERIOR_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NÚMERO INTERIOR:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_NUMERO_INTERIOR_EMPRESA; ?>" name="P_NUMERO_INTERIOR_EMPRESA"></td>
    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NÚMERO DE OFICINA:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_NUMERO_OFICINA_EMPRESA; ?>" name="P_NUMERO_OFICINA_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">COLONIA:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_COLONIA_EMPRESA; ?>" name="P_COLONIA_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">ALCALDÍA:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_ALCALDIA_EMPRESA; ?>" name="P_ALCALDIA_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">C.P:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_C_P_EMPRESA; ?>" name="P_C_P_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">CIUDAD:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_CIUDAD_EMPRESA; ?>" name="P_CIUDAD_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">ESTADO:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_ESTADO_EMPRESA; ?>" name="P_ESTADO_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">PAÍS:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_PAIS_EMPRESA; ?>" name="P_PAIS_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">UBICACIÓN EN EL MAPA (COPÍA EL LINK)  <a href="https://www.google.com.gt/maps/@<?php echo $valor1 ?>,<?php echo $valor2 ?>,15z" target="_blank">(GOOGLE MAPS)</a></th>
    <td  style="background:#ebf8fa"> <input type= text id="search_location" class="form-control" placeholder="Search location"  name="P_UBICACION_MAPA_1" value="<?php echo $P_UBICACION_MAPA_1; ?>"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">TELÉFONO 1:</th>
    <td  style="background:#ebf8fa"><input type="text" maxlength="20" class="form-control formato-numero"id="validationCustom03" required=""  value="<?php echo $P_TELEFONO_1_EMPRESA; ?>" name="P_TELEFONO_1_EMPRESA"  onkeyup="formato_telefono('P_TELEFONO_1_EMPRESA')"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">TELÉFONO 2:</th>
    <td  style="background:#ebf8fa"><input type="text" maxlength="20" class="form-control formato-numero" id="validationCustom03" required=""  value="<?php echo $P_TELEFONO_2_EMPRESA; ?>" name="P_TELEFONO_2_EMPRESA"  onkeyup="formato_telefono('P_TELEFONO_2_EMPRESA')"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">WHATSAPP:</th>
    <td  style="background:#ebf8fa"><input type="text" maxlength="20" class="form-control formato-numero"id="validationCustom03" required=""  value="<?php echo $P_WHATSAPP_EMPRESA_1; ?>" name="P_WHATSAPP_EMPRESA_1"  onkeyup="formato_telefono('P_WHATSAPP_EMPRESA_1')"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">EMAIL:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_IMAIL_EMPRESA; ?>" name="P_IMAIL_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">PÁGINA WEB:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_PAGINA_WEB_EMPRESA; ?>" name="P_PAGINA_WEB_EMPRESA"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NOMBRE DE LA APP:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $P_NOMBRE_APP_EMPRESA; ?>" name="P_NOMBRE_APP_EMPRESA"></td>

    </tr>


                    <tr>
							   
							   
                               <th style="text-align:center;background:#ebf8fa;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#ebf8fa">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="P_DIRECCION_FISCAL_EMPRESA">
           
           </td>   
                               
                                              
 
     <table><tr>
    <input type="hidden" value="VALIDADIRECCIONEP1" name="VALIDADIRECCIONEP1"/>


  <?php if($conexion->variablespermisos('','DIRECCION_EMPRESA_PROVEEDORES_1','guardar')=='si'){ ?>    
<td>

   <button class="btn btn-sm btn-outline-success px-5"   type="button" id="enviarDIRECEP">GUARDAR</button><div style="
 position: absolute;
    top: 92%; 
    right: 50%;
    transform: translate(50%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 2em;
    font-weight: 800;
    color: #f5f5f5;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);"  id="mensajeDIRECEP"></td><?php } ?>
          </tr> </table> 
          

           <table><tr>
          <?php if($conexion->variablespermisos('','DIRECCION_EMPRESA_PROVEEDORES_1','email')=='si'){ ?>
            <td style="width:500px" ><textarea style="float:right"placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES"   name="PDIRECCIONF_ENVIAR_IMAIL" id="PDIRECCIONF_ENVIAR_IMAIL"  class="form-control" aria-label="With textarea"><?php echo $PDIRECCIONF_ENVIAR_IMAIL; ?></textarea></td>
              <td> <button class="btn btn-sm btn-outline-success px-5"  type="button" id="enviarPDirfiscal">ENVIAR POR EMAIL</button> </td> <?php } ?>  
         
          </tr>
            </table> 
  </form>
     

</table>
</tbody>
</div>
</div>

</div>
</div>  
	  
	  
	  
	  
	  
	  
	  
	  