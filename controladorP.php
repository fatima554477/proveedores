<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/proveedores/class.epcinnP.php");

$proveedoresC = NEW accesoclase();
$conexion = NEW colaboradores();

$enviarOTROS_PRODUCTOS = isset($_POST["enviarOTROS_PRODUCTOS"])?$_POST["enviarOTROS_PRODUCTOS"]:"";
$VALIDADIRECCIONEP1 = isset($_POST["VALIDADIRECCIONEP1"])?$_POST["VALIDADIRECCIONEP1"]:"";
$VALIDAMETODOPAGO = isset($_POST["VALIDAMETODOPAGO"])?$_POST["VALIDAMETODOPAGO"]:"";
$validaNOMBRECONTACTO1 = isset($_POST["validaNOMBRECONTACTO1"])?$_POST["validaNOMBRECONTACTO1"]:"";
$validaNOMBRECONTACTO2 = isset($_POST["validaNOMBRECONTACTO2"])?$_POST["validaNOMBRECONTACTO2"]:"";
$validaNOMBRECONTACTO3 = isset($_POST["validaNOMBRECONTACTO3"])?$_POST["validaNOMBRECONTACTO3"]:"";
$validaINFOPRODSERV = isset($_POST["validaINFOPRODSERV"])?$_POST["validaINFOPRODSERV"]:"";
$validaDATOSPROVEEDORES = isset($_POST["validaDATOSPROVEEDORES"])?$_POST["validaDATOSPROVEEDORES"]:"";
$validaOTROSDOCUMENTOS = isset($_POST["validaOTROSDOCUMENTOS"])?$_POST["validaOTROSDOCUMENTOS"]:"";
$validaDIROFICINASBODEGAS = isset($_POST["validaDIROFICINASBODEGAS"])?$_POST["validaDIROFICINASBODEGAS"]:"";
$validaDATOSBANCARIOS1 = isset($_POST["validaDATOSBANCARIOS1"])?$_POST["validaDATOSBANCARIOS1"]:"";
$validaDATOSBANCARIOS2 = isset($_POST["validaDATOSBANCARIOS2"])?$_POST["validaDATOSBANCARIOS2"]:"";
$validaREFERENCIASCOMERCIALES1 = isset($_POST["validaREFERENCIASCOMERCIALES1"])?$_POST["validaREFERENCIASCOMERCIALES1"]:"";
$validaREFERENCIASCOMERCIALES2 = isset($_POST["validaREFERENCIASCOMERCIALES2"])?$_POST["validaREFERENCIASCOMERCIALES2"]:"";
$validaREFERENCIASCOMERCIALES3 = isset($_POST["validaREFERENCIASCOMERCIALES3"])?$_POST["validaREFERENCIASCOMERCIALES3"]:"";
$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:"";
$ENVIARRdatosbancario1p = isset($_POST["ENVIARRdatosbancario1p"])?$_POST["ENVIARRdatosbancario1p"]:"";
$borra_datos_bancario1 = isset($_POST["borra_datos_bancario1"])?$_POST["borra_datos_bancario1"]:"";
$ENVIARotroservicios1 = isset($_POST["ENVIARotroservicios1"])?$_POST["ENVIARotroservicios1"]:"";
$borraotrosservicios = isset($_POST["borraotrosservicios"])?$_POST["borraotrosservicios"]:"";
$hLIGA_PRODUCTOS = isset($_POST["hLIGA_PRODUCTOS"])?$_POST["hLIGA_PRODUCTOS"]:"";
$ENVIARLIGAervicios1 = isset($_POST["ENVIARLIGAervicios1"])?$_POST["ENVIARLIGAervicios1"]:"";
$borraligaservicios = isset($_POST["borraligaservicios"])?$_POST["borraligaservicios"]:"";
$hPRESENTACION_PRODUCTOS = isset($_POST["hPRESENTACION_PRODUCTOS"])?$_POST["hPRESENTACION_PRODUCTOS"]:"";
$ENVIApresenervicios1 = isset($_POST["ENVIApresenervicios1"])?$_POST["ENVIApresenervicios1"]:"";
$borrapreseservicios = isset($_POST["borrapreseservicios"])?$_POST["borrapreseservicios"]:"";
$ENVIAOTROSdocuu1 = isset($_POST["ENVIAOTROSdocuu1"])?$_POST["ENVIAOTROSdocuu1"]:"";
$borraotrosdocuu = isset($_POST["borraotrosdocuu"])?$_POST["borraotrosdocuu"]:"";
$ENVIACONTACTPRO = isset($_POST["ENVIACONTACTPRO"])?$_POST["ENVIACONTACTPRO"]:"";
$borracontactprovee = isset($_POST["borracontactprovee"])?$_POST["borracontactprovee"]:"";
$ENVIARBODEGAPRO = isset($_POST["ENVIARBODEGAPRO"])?$_POST["ENVIARBODEGAPRO"]:"";
$borrabodegasprovee = isset($_POST["borrabodegasprovee"])?$_POST["borrabodegasprovee"]:"";
$ENVIARreferenciaPRO = isset($_POST["ENVIARreferenciaPRO"])?$_POST["ENVIARreferenciaPRO"]:"";
$borrareferenprovee = isset($_POST["borrareferenprovee"])?$_POST["borrareferenprovee"]:"";
$OTROSPRO_ENVIAR_IMAIL = isset($_POST["OTROSPRO_ENVIAR_IMAIL"])?$_POST["OTROSPRO_ENVIAR_IMAIL"]:"";
$ENVIAR_EMAIL_OTROSDOCU = isset($_POST["ENVIAR_EMAIL_OTROSDOCU"])?$_POST["ENVIAR_EMAIL_OTROSDOCU"]:"";
$EMAIL_RESENTACION_PRODUCTOS = isset($_POST["EMAIL_RESENTACION_PRODUCTOS"])?$_POST["EMAIL_RESENTACION_PRODUCTOS"]:"";
$SERVI_ENVIAR_IMAIL = isset($_POST["SERVI_ENVIAR_IMAIL"])?$_POST["SERVI_ENVIAR_IMAIL"]:"";
$LIGAPRO_ENVIAR_IMAIL = isset($_POST["LIGAPRO_ENVIAR_IMAIL"])?$_POST["LIGAPRO_ENVIAR_IMAIL"]:"";
$PDIRECCIONF_ENVIAR_IMAIL = isset($_POST["PDIRECCIONF_ENVIAR_IMAIL"])?$_POST["PDIRECCIONF_ENVIAR_IMAIL"]:"";
$METODOPAGO_ENVIAR_IMAIL = isset($_POST["METODOPAGO_ENVIAR_IMAIL"])?$_POST["METODOPAGO_ENVIAR_IMAIL"]:"";
$BODEGAS_ENVIAR_IMAIL = isset($_POST["BODEGAS_ENVIAR_IMAIL"])?$_POST["BODEGAS_ENVIAR_IMAIL"]:"";
$CONTACTOP_ENVIAR_IMAIL = isset($_POST["CONTACTOP_ENVIAR_IMAIL"])?$_POST["CONTACTOP_ENVIAR_IMAIL"]:"";
$DAbancaPRO_ENVIAR_IMAIL = isset($_POST["DAbancaPRO_ENVIAR_IMAIL"])?$_POST["DAbancaPRO_ENVIAR_IMAIL"]:"";
$REFE_ENVIAR_IMAIL = isset($_POST["REFE_ENVIAR_IMAIL"])?$_POST["REFE_ENVIAR_IMAIL"]:"";
$DATOSPROVEE_ENVIAR_IMAIL = isset($_POST["DATOSPROVEE_ENVIAR_IMAIL"])?$_POST["DATOSPROVEE_ENVIAR_IMAIL"]:"";
$hproveedorDE = isset($_POST["hproveedorDE"])?$_POST["hproveedorDE"]:"";
$validaDOCUMENTOSFISCAL = isset($_POST["validaDOCUMENTOSFISCAL"])?$_POST["validaDOCUMENTOSFISCAL"]:"";
$ENVIAFISCAL = isset($_POST["ENVIAFISCAL"])?$_POST["ENVIAFISCAL"]:"";
$borradocufiscal = isset($_POST["borradocufiscal"])?$_POST["borradocufiscal"]:"";
$ENVIAR_EMAIL_DOCUFISCAL = isset($_POST["ENVIAR_EMAIL_DOCUFISCAL"])?$_POST["ENVIAR_EMAIL_DOCUFISCAL"]:"";
$DOCUMENTO_FISCAL = isset($_POST["DOCUMENTO_FISCAL"])?$_POST["DOCUMENTO_FISCAL"]:"";
$enviarnuevo_FISCAL = isset($_POST["enviarnuevo_FISCAL"])?$_POST["enviarnuevo_FISCAL"]:"";
$BORRARNUEVOFISCAL = isset($_POST["BORRARNUEVOFISCAL"])?$_POST["BORRARNUEVOFISCAL"]:"";
$IPnuevodocumento = isset($_POST["IPnuevodocumento"])?$_POST["IPnuevodocumento"]:"";
$hCALIFICACION = isset($_POST["hCALIFICACION"])?$_POST["hCALIFICACION"]:"";//hCALIFICACION
$enviarCALIFICACION = isset($_POST["enviarCALIFICACION"])?$_POST["enviarCALIFICACION"]:"";
$IpCALIFICACION = isset($_POST["IpCALIFICACION"])?$_POST["IpCALIFICACION"]:"";
$borra_CALIFICACION = isset($_POST["borra_CALIFICACION"])?$_POST["borra_CALIFICACION"]:"";
$EMAIL_CALIFICACION = isset($_POST["EMAIL_CALIFICACION"])?$_POST["EMAIL_CALIFICACION"]:"";
$MOTIVO_NUEVO = isset($_POST["MOTIVO_NUEVO"])?$_POST["MOTIVO_NUEVO"]:"";
$enviarnuevo_MOTIVO = isset($_POST["enviarnuevo_MOTIVO"])?$_POST["enviarnuevo_MOTIVO"]:"";
$BORRARMOTIVO = isset($_POST["BORRARMOTIVO"])?$_POST["BORRARMOTIVO"]:"";
$IPnuevomotivo = isset($_POST["IPnuevomotivo"])?$_POST["IPnuevomotivo"]:"";


if($MOTIVO_NUEVO =='MOTIVO_NUEVO' or $enviarnuevo_MOTIVO == 'enviarnuevo_MOTIVO'){
$nuevo_motivo = isset($_POST["nuevo_motivo"])?$_POST["nuevo_motivo"]:"";
$MOTIVO_NUEVO = isset($_POST["MOTIVO_NUEVO"])?$_POST["MOTIVO_NUEVO"]:""; 
$IPnuevomotivo = isset($_POST["IPnuevomotivo"])?$_POST["IPnuevomotivo"]:"";

echo $proveedoresC->nuevomotivo($nuevo_motivo , $MOTIVO_NUEVO,$enviarnuevo_MOTIVO,$IPnuevomotivo);
}

elseif($BORRARMOTIVO == 'BORRARMOTIVO'){
	$borra_id_NUEVO = isset($_POST["borra_id_NUEVO"])?$_POST["borra_id_NUEVO"]:"";
		
	echo $proveedoresC->BORRARMOTIVO($borra_id_NUEVO);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");


}

///////////////////////////////////////////////////////////////////////////////////////////////////
if($hCALIFICACION == 'hCALIFICACION' or $enviarCALIFICACION=='enviarCALIFICACION'){
	  

$DOCUMENTO_CALIFICACION = isset($_POST["DOCUMENTO_CALIFICACION"])?$_POST["DOCUMENTO_CALIFICACION"]:"";
$ADJUNTO_CALIFICACION = isset($_POST["ADJUNTO_CALIFICACION"])?$_POST["ADJUNTO_CALIFICACION"]:"";
$OBSERVACIONES_CALIFICACION = isset($_POST["OBSERVACIONES_CALIFICACION"])?$_POST["OBSERVACIONES_CALIFICACION"]:"";                                 
$FECHA_CALIFICACION = isset($_POST["FECHA_CALIFICACION"])?$_POST["FECHA_CALIFICACION"]:"";
$hCALIFICACION = isset($_POST["hCALIFICACION"])?$_POST["hCALIFICACION"]:""; 



echo $proveedoresC->CALIFICACION( $DOCUMENTO_CALIFICACION ,$ADJUNTO_CALIFICACION, $OBSERVACIONES_CALIFICACION , $FECHA_CALIFICACION , $hCALIFICACION,$IpCALIFICACION,$enviarCALIFICACION );



}
   elseif($EMAIL_CALIFICACION ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_CALIFICACION=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['CALIFICACIONe'])?$_POST['CALIFICACIONe']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                      
$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('DOCUMENTO_CALIFICACION, OBSERVACIONES_CALIFICACION, FECHA_CALIFICACION ',

'NOMBRE ,OBSERVACIONES,FECHA', '02CALIFICACION',  " where idRelacion = '".$_SESSION['id'] ."' ".$query2/*nuevo*/ );


$html = $conexion->html2('CALIFICACIÓN',$MANDA_INFORMACION );
$logo = $conexion->variables_informacionfiscal_logo();
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}

  

if($borra_CALIFICACION == 'borra_CALIFICACION' ){

$borra_califi = isset($_POST["borra_califi"])?$_POST["borra_califi"]:"";
echo $proveedoresC->borra_CALIFICACION( $borra_califi );
}	  
//include_once (__ROOT1__."/includes/crea_funciones.php"); 



//enviarnuevo_FISCAL
if($DOCUMENTO_FISCAL =='DOCUMENTO_FISCAL' or $enviarnuevo_FISCAL == 'enviarnuevo_FISCAL'){
$nuevo_documento = isset($_POST["nuevo_documento"])?$_POST["nuevo_documento"]:"";
$DOCUMENTO_FISCAL = isset($_POST["DOCUMENTO_FISCAL"])?$_POST["DOCUMENTO_FISCAL"]:""; 
$IPnuevodocumento = isset($_POST["IPnuevodocumento"])?$_POST["IPnuevodocumento"]:"";

echo $proveedoresC->nuevodocumento($nuevo_documento , $DOCUMENTO_FISCAL,$enviarnuevo_FISCAL,$IPnuevodocumento);
}

elseif($BORRARNUEVOFISCAL == 'BORRARNUEVOFISCAL'){
	$borra_id_NUEVOD = isset($_POST["borra_id_NUEVOD"])?$_POST["borra_id_NUEVOD"]:"";
		
	echo $proveedoresC->BORRARNUEVOFISCAL($borra_id_NUEVOD);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");


}

elseif($enviarOTROS_PRODUCTOS =='enviarOTROS_PRODUCTOS' or $ENVIARotroservicios1 == 'ENVIARotroservicios1'){
	
if( $_FILES["PRODUCTO_O_SERVICIO_10"] == true){
$PRODUCTO_O_SERVICIO_10 = $conexion->solocargar("PRODUCTO_O_SERVICIO_10");
}if($PRODUCTO_O_SERVICIO_10=='2' or $PRODUCTO_O_SERVICIO_10=='' or $PRODUCTO_O_SERVICIO_10=='1'){
	 $PRODUCTO_O_SERVICIO_101 = '';
} else{
 $PRODUCTO_O_SERVICIO_101 = $PRODUCTO_O_SERVICIO_10;
}



$PRODUCTO_O_SERVICIO_9 = isset($_POST["PRODUCTO_O_SERVICIO_9"])?$_POST["PRODUCTO_O_SERVICIO_9"]:"";
$PRODUCTO_O_SERVICIO_11 = isset($_POST["PRODUCTO_O_SERVICIO_11"])?$_POST["PRODUCTO_O_SERVICIO_11"]:"";
$PRODUCTO_O_SERVICIO_12 = isset($_POST["PRODUCTO_O_SERVICIO_12"])?$_POST["PRODUCTO_O_SERVICIO_12"]:"";
$PRODUCTO_O_SERVICIO_13 = isset($_POST["PRODUCTO_O_SERVICIO_13"])?$_POST["PRODUCTO_O_SERVICIO_13"]:"";
$PRODUCTO_O_SERVICIO_14 = isset($_POST["PRODUCTO_O_SERVICIO_14"])?$_POST["PRODUCTO_O_SERVICIO_14"]:"";
$PRODUCTO_O_SERVICIO_15 = isset($_POST["PRODUCTO_O_SERVICIO_15"])?$_POST["PRODUCTO_O_SERVICIO_15"]:"";
$PRODUCTO_O_SERVICIO_16 = isset($_POST["PRODUCTO_O_SERVICIO_16"])?$_POST["PRODUCTO_O_SERVICIO_16"]:"";
$PRODUCTO_O_SERVICIO_17 = isset($_POST["PRODUCTO_O_SERVICIO_17"])?$_POST["PRODUCTO_O_SERVICIO_17"]:"";
$PRODUCTO_O_SERVICIO_18 = isset($_POST["PRODUCTO_O_SERVICIO_18"])?$_POST["PRODUCTO_O_SERVICIO_18"]:"";
$PRODUCTO_O_SERVICIO_19 = isset($_POST["PRODUCTO_O_SERVICIO_19"])?$_POST["PRODUCTO_O_SERVICIO_19"]:"";
$PRODUCTO_O_SERVICIO_20 = isset($_POST["PRODUCTO_O_SERVICIO_20"])?$_POST["PRODUCTO_O_SERVICIO_20"]:"";
$IPotrosproductosservp = isset($_POST["IPotrosproductosservp"])?$_POST["IPotrosproductosservp"]:"";
$borraotrosservicios = isset($_POST["borraotrosservicios"])?$_POST["borraotrosservicios"]:"";
echo $proveedoresC->enviarOTROS_PRODUCTOS ( $PRODUCTO_O_SERVICIO_9 , $PRODUCTO_O_SERVICIO_101 , $PRODUCTO_O_SERVICIO_11 , $PRODUCTO_O_SERVICIO_12 , $PRODUCTO_O_SERVICIO_13 , $PRODUCTO_O_SERVICIO_14 , $PRODUCTO_O_SERVICIO_15 , $PRODUCTO_O_SERVICIO_16 , $PRODUCTO_O_SERVICIO_17 , $PRODUCTO_O_SERVICIO_18 , $PRODUCTO_O_SERVICIO_19 , $PRODUCTO_O_SERVICIO_20 , $ENVIARotrosproductosp,
	$IPotrosproductosservp ,$ENVIARotroservicios1);		
}	

elseif($OTROSPRO_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($OTROSPRO_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['servproduc'])?$_POST['servproduc']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('PRODUCTO_O_SERVICIO_9,PRODUCTO_O_SERVICIO_10,PRODUCTO_O_SERVICIO_11',

'NOMBRE DEL PRODUCTO O SERVICIO,FOTO ,OBSERVACIONES', '02otrosproveedores',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );



$variables = 'PRODUCTO_O_SERVICIO_10, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $proveedoresC->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'02otrosproveedores', " where idRelacion = '".$_SESSION['idPROV']."' ".$query2 );

$html = $proveedoresC->html2(' INFORMACIÓN DE PRODUCTOS O SERVICIOS',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}


elseif($borraotrosservicios == 'borraotrosservicios'){
	$borra_id_servis = isset($_POST["borra_id_servis"])?$_POST["borra_id_servis"]:"";
		
	echo $proveedoresC->borraotrosservicios($borra_id_servis);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}

elseif($VALIDADIRECCIONEP1 == 'VALIDADIRECCIONEP1'){

$P_NOMBRE_COMERCIAL_EMPRESA = isset($_POST["P_NOMBRE_COMERCIAL_EMPRESA"])?$_POST["P_NOMBRE_COMERCIAL_EMPRESA"]:"";
$P_NOMBRE_FISCAL_RS_EMPRESA = isset($_POST["P_NOMBRE_FISCAL_RS_EMPRESA"])?$_POST["P_NOMBRE_FISCAL_RS_EMPRESA"]:"";

$FISICA_MORAL = isset($_POST["FISICA_MORAL"])?$_POST["FISICA_MORAL"]:"";
$P_REGIMEN_FISCAL_MTDP = isset($_POST["P_REGIMEN_FISCAL_MTDP"])?$_POST["P_REGIMEN_FISCAL_MTDP"]:"";
$P_RFC_MTDP = isset($_POST["P_RFC_MTDP"])?$_POST["P_RFC_MTDP"]:"";
$_P_METODO_DE_PAGO = isset($_POST["_P_METODO_DE_PAGO"])?$_POST["_P_METODO_DE_PAGO"]:"";
$P_FORMADE_PAGO = isset($_POST["P_FORMADE_PAGO"])?$_POST["P_FORMADE_PAGO"]:"";
$P_USO_CFDI = isset($_POST["P_USO_CFDI"])?$_POST["P_USO_CFDI"]:"";
$P_DIRECCION_FISCAL_EMPRESA = isset($_POST["P_DIRECCION_FISCAL_EMPRESA"])?$_POST["P_DIRECCION_FISCAL_EMPRESA"]:"";
$P_EDIFICIO_EMPRESA = isset($_POST["P_EDIFICIO_EMPRESA"])?$_POST["P_EDIFICIO_EMPRESA"]:"";
$P_CALLE_EMPRESA = isset($_POST["P_CALLE_EMPRESA"])?$_POST["P_CALLE_EMPRESA"]:"";
$P_NUMERO_EXTERIOR_EMPRESA = isset($_POST["P_NUMERO_EXTERIOR_EMPRESA"])?$_POST["P_NUMERO_EXTERIOR_EMPRESA"]:"";
$P_NUMERO_INTERIOR_EMPRESA = isset($_POST["P_NUMERO_INTERIOR_EMPRESA"])?$_POST["P_NUMERO_INTERIOR_EMPRESA"]:"";
$P_NUMERO_OFICINA_EMPRESA = isset($_POST["P_NUMERO_OFICINA_EMPRESA"])?$_POST["P_NUMERO_OFICINA_EMPRESA"]:"";
$P_COLONIA_EMPRESA = isset($_POST["P_COLONIA_EMPRESA"])?$_POST["P_COLONIA_EMPRESA"]:"";
$P_ALCALDIA_EMPRESA = isset($_POST["P_ALCALDIA_EMPRESA"])?$_POST["P_ALCALDIA_EMPRESA"]:"";
$P_C_P_EMPRESA = isset($_POST["P_C_P_EMPRESA"])?$_POST["P_C_P_EMPRESA"]:"";
$P_CIUDAD_EMPRESA = isset($_POST["P_CIUDAD_EMPRESA"])?$_POST["P_CIUDAD_EMPRESA"]:"";
$P_ESTADO_EMPRESA = isset($_POST["P_ESTADO_EMPRESA"])?$_POST["P_ESTADO_EMPRESA"]:"";
$P_PAIS_EMPRESA = isset($_POST["P_PAIS_EMPRESA"])?$_POST["P_PAIS_EMPRESA"]:"";
$dircasa11 = isset($_POST["dircasa11"])?$_POST["dircasa11"]:"";
$P_UBICACION_MAPA_1 = isset($_POST["P_UBICACION_MAPA_1"])?$_POST["P_UBICACION_MAPA_1"]:"";
$P_TELEFONO_1_EMPRESA = isset($_POST["P_TELEFONO_1_EMPRESA"])?$_POST["P_TELEFONO_1_EMPRESA"]:"";
$P_TELEFONO_2_EMPRESA = isset($_POST["P_TELEFONO_2_EMPRESA"])?$_POST["P_TELEFONO_2_EMPRESA"]:"";
$P_WHATSAPP_EMPRESA_1 = isset($_POST["P_WHATSAPP_EMPRESA_1"])?$_POST["P_WHATSAPP_EMPRESA_1"]:"";
$P_IMAIL_EMPRESA = isset($_POST["P_IMAIL_EMPRESA"])?$_POST["P_IMAIL_EMPRESA"]:"";
$P_PAGINA_WEB_EMPRESA = isset($_POST["P_PAGINA_WEB_EMPRESA"])?$_POST["P_PAGINA_WEB_EMPRESA"]:"";
$P_NOMBRE_APP_EMPRESA = isset($_POST["P_NOMBRE_APP_EMPRESA"])?$_POST["P_NOMBRE_APP_EMPRESA"]:"";



	echo $proveedoresC->direccionproveedor1 ($P_NOMBRE_COMERCIAL_EMPRESA , $P_NOMBRE_FISCAL_RS_EMPRESA ,$P_RFC_MTDP , $P_REGIMEN_FISCAL_MTDP , $_P_METODO_DE_PAGO , $P_FORMADE_PAGO , $P_USO_CFDI ,$FISICA_MORAL,$P_DIRECCION_FISCAL_EMPRESA , $P_EDIFICIO_EMPRESA , $P_CALLE_EMPRESA , $P_NUMERO_EXTERIOR_EMPRESA , $P_NUMERO_INTERIOR_EMPRESA , $P_NUMERO_OFICINA_EMPRESA , $P_COLONIA_EMPRESA , $P_ALCALDIA_EMPRESA , $P_C_P_EMPRESA , $P_CIUDAD_EMPRESA , $P_ESTADO_EMPRESA , $P_PAIS_EMPRESA , $dircasa11 , $P_UBICACION_MAPA_1 , $P_TELEFONO_1_EMPRESA , $P_TELEFONO_2_EMPRESA , $P_WHATSAPP_EMPRESA_1 , $P_IMAIL_EMPRESA , $P_PAGINA_WEB_EMPRESA , $P_NOMBRE_APP_EMPRESA );
}	

/*PARA ENVIAR EMAIL*/
elseif($PDIRECCIONF_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($PDIRECCIONF_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';

$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION(
'P_NOMBRE_COMERCIAL_EMPRESA,P_NOMBRE_FISCAL_RS_EMPRESA,FISICA_MORAL,P_REGIMEN_FISCAL_MTDP,P_RFC_MTDP,_P_METODO_DE_PAGO,P_FORMADE_PAGO, P_USO_CFDI,P_EDIFICIO_EMPRESA,P_CALLE_EMPRESA,P_NUMERO_EXTERIOR_EMPRESA , P_NUMERO_INTERIOR_EMPRESA , 
P_NUMERO_OFICINA_EMPRESA,P_COLONIA_EMPRESA , P_ALCALDIA_EMPRESA , P_C_P_EMPRESA , 
P_CIUDAD_EMPRESA,P_ESTADO_EMPRESA , P_PAIS_EMPRESA , P_UBICACION_MAPA_1,P_TELEFONO_1_EMPRESA,P_TELEFONO_2_EMPRESA, P_WHATSAPP_EMPRESA_1 , P_IMAIL_EMPRESA , P_PAGINA_WEB_EMPRESA,P_NOMBRE_APP_EMPRESA',

 'NOMBRE COMERCIAL DE LA EMPRESA ,
NOMBRE FISCAL DE LA EMPRESA,
FISICA O MORAL,
RÉGIMEN FISCAL,
RFC,
METODO DE PAGO,
FORMA DE PAGO,
USO DE CFDI, 
EDIFICIO,
CALLE,
NÚMERO EXTERIOR,
NÚMERO INTERIOR,
NÚMERO DE OFICINA,
COLONIA,
ALCALDÍA,
C.P.,
CIUDAD,
ESTADO,
PAÍS,
UBICACIÓN EN EL MAPA,
TELÉFONO 1,
TELÉFONO 2,
WHATSAPP,
EMAIL,
PAGINA WEB,
NOMBRE DE LA APP,
OBSERVACIONES','02direccionproveedor1',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );


$html = $proveedoresC->html2(' INFORMACIÓN DE PRODUCTOS O SERVICIOS',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}
 
 
 
 
 
 
elseif($hLIGA_PRODUCTOS == 'hLIGA_PRODUCTOS' or $ENVIARLIGAervicios1 == 'ENVIARLIGAervicios1'){
	
	$PRODUCTO_O_SERVICIO_LIGA = isset($_POST["PRODUCTO_O_SERVICIO_LIGA"])?$_POST["PRODUCTO_O_SERVICIO_LIGA"]:"";
$PRODUCTO_SERVICIO_LIGA = isset($_POST["PRODUCTO_SERVICIO_LIGA"])?$_POST["PRODUCTO_SERVICIO_LIGA"]:"";
$LIGA_SERVICIO_OBSERVACIONES = isset($_POST["LIGA_SERVICIO_OBSERVACIONES"])?$_POST["LIGA_SERVICIO_OBSERVACIONES"]:"";
$ULTIMA_CARGA_LIGA = isset($_POST["ULTIMA_CARGA_LIGA"])?$_POST["ULTIMA_CARGA_LIGA"]:"";
$hLIGA_PRODUCTOS = isset($_POST["hLIGA_PRODUCTOS"])?$_POST["hLIGA_PRODUCTOS"]:""; 
$IPLIGAproductosservp = isset($_POST["IPLIGAproductosservp"])?$_POST["IPLIGAproductosservp"]:""; 

echo $proveedoresC->enviarligaPROD($PRODUCTO_O_SERVICIO_LIGA , $PRODUCTO_SERVICIO_LIGA , $LIGA_SERVICIO_OBSERVACIONES , $ULTIMA_CARGA_LIGA , $hLIGA_PRODUCTOS,$IPLIGAproductosservp ,$ENVIARLIGAervicios1 );	

}	

elseif($LIGAPRO_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($LIGAPRO_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['servproducliga'])?$_POST['servproducliga']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
    
$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('PRODUCTO_O_SERVICIO_LIGA,PRODUCTO_SERVICIO_LIGA,LIGA_SERVICIO_OBSERVACIONES',

'NOMBRE DEL PRODUCTO O SERVICIO,LIGA ,OBSERVACIONES', '02ligaproveedor',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );



$html = $proveedoresC->html2(' INFORMACIÓN DE PRODUCTOS O SERVICIOS',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}

elseif($borraligaservicios == 'borraligaservicios'){
	$borra_id_LIGA = isset($_POST["borra_id_LIGA"])?$_POST["borra_id_LIGA"]:"";
		
	echo $proveedoresC->borraLIGAservicios($borra_id_LIGA);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}








	
elseif($hPRESENTACION_PRODUCTOS == 'hPRESENTACION_PRODUCTOS' or $ENVIApresenervicios1 == 'ENVIApresenervicios1'){

	
if( $_FILES["PRESENTACION_VIDEO"] == true){
$PRESENTACION_VIDEO = $conexion->solocargar("PRESENTACION_VIDEO");
}if($PRESENTACION_VIDEO=='2' or $PRESENTACION_VIDEO=='' or $PRESENTACION_VIDEO=='1'){
	$PRESENTACION_VIDEO1="";
} else{
 $PRESENTACION_VIDEO1 = $PRESENTACION_VIDEO;
}

$PRODUCTO_PRESENTA = isset($_POST["PRODUCTO_PRESENTA"])?$_POST["PRODUCTO_PRESENTA"]:"";
$PRESENTACION_OBSERVACIONES = isset($_POST["PRESENTACION_OBSERVACIONES"])?$_POST["PRESENTACION_OBSERVACIONES"]:"";
$PRODUCTO_PRESENTACION_FECHA = isset($_POST["PRODUCTO_PRESENTACION_FECHA"])?$_POST["PRODUCTO_PRESENTACION_FECHA"]:"";
$IPPRESSproductosservp = isset($_POST["IPPRESSproductosservp"])?$_POST["IPPRESSproductosservp"]:"";


echo $proveedoresC->enviarPRESENTAP($PRODUCTO_PRESENTA ,$PRESENTACION_VIDEO1, $PRESENTACION_OBSERVACIONES , $PRODUCTO_PRESENTACION_FECHA , $IPPRESSproductosservp ,$ENVIApresenervicios1 );

}

elseif($EMAIL_RESENTACION_PRODUCTOS ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_RESENTACION_PRODUCTOS=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['servpresentacion'])?$_POST['servpresentacion']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('PRODUCTO_PRESENTA, PRESENTACION_VIDEO, PRESENTACION_OBSERVACIONES ',

'NOMBRE DEL PRODUCTO O SERVICIO,PRESENTACIÓN ,OBSERVACIONES', '02presentacionproduc',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );



$variables = 'PRESENTACION_VIDEO, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $proveedoresC->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'02presentacionproduc', " where idRelacion = '".$_SESSION['idPROV']."' ".$query2 );

$html = $proveedoresC->html2('    PRESENTACIÓN DE LOS PRODUCTOS O SERVICIOS QUE OFRECE EL PROVEEDOR',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
} 

elseif($borrapreseservicios == 'borrapreseservicios'){
	$borra_id_PRES = isset($_POST["borra_id_PRES"])?$_POST["borra_id_PRES"]:"";
		
	echo $proveedoresC->borrapreseservicios($borra_id_PRES);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}
	
elseif($validaOTROSDOCUMENTOS == 'validaOTROSDOCUMENTOS' or $ENVIAOTROSdocuu1 == 'ENVIAOTROSdocuu1'){
	
if( $_FILES["F_PADJUNTAR_OTRO_DOCUMENTO_5_1"] == true){
$F_PADJUNTAR_OTRO_DOCUMENTO_5_1 = $conexion->solocargar("F_PADJUNTAR_OTRO_DOCUMENTO_5_1");
}if($F_PADJUNTAR_OTRO_DOCUMENTO_5_1=='2' or $F_PADJUNTAR_OTRO_DOCUMENTO_5_1=='' or $F_PADJUNTAR_OTRO_DOCUMENTO_5_1=='1'){
	$F_PADJUNTAR_OTRO_DOCUMENTO_5_11="";
} else{
 $F_PADJUNTAR_OTRO_DOCUMENTO_5_11 = $F_PADJUNTAR_OTRO_DOCUMENTO_5_1;
}

$F_PADJUNTAR_OTRO_DOCUMENTO_4_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_4_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_4_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_6_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_6_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_6_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_7_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_7_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_7_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_8_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_8_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_8_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_9_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_9_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_9_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_10_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_10_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_10_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_11_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_11_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_11_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_12_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_12_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_12_1"]:"";
$F_PADJUNTAR_OTRO_DOCUMENTO_13_1 = isset($_POST["F_PADJUNTAR_OTRO_DOCUMENTO_13_1"])?$_POST["F_PADJUNTAR_OTRO_DOCUMENTO_13_1"]:"";
$IPotrosdocumentosservp = isset($_POST["IPotrosdocumentosservp"])?$_POST["IPotrosdocumentosservp"]:""; 
	
	/*if(  $F_PADJUNTAR_OTRO_DOCUMENTO_4_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_5_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_6_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_7_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_8_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_9_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_10_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_11_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_12_1 =="" or $F_PADJUNTAR_OTRO_DOCUMENTO_13_1 =="" ){
		echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";
	}else{*/
	echo $proveedoresC->OTROSDOCUMENTOS  ( $F_PADJUNTAR_OTRO_DOCUMENTO_4_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_5_11 , $F_PADJUNTAR_OTRO_DOCUMENTO_6_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_7_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_8_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_9_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_10_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_11_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_12_1 , $IPotrosdocumentosservp,$ENVIAOTROSdocuu1 );
		
}

elseif($ENVIAR_EMAIL_OTROSDOCU ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($ENVIAR_EMAIL_OTROSDOCU=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['otrosdocuu'])?$_POST['otrosdocuu']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('F_PADJUNTAR_OTRO_DOCUMENTO_4_1,F_PADJUNTAR_OTRO_DOCUMENTO_5_1,F_PADJUNTAR_OTRO_DOCUMENTO_6_1',

'NOMBRE DEL DOCUMENTO ,FOTO DEL DOCUMENTO, OBSERVACIONES', '02otrosdocumentos',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );

$variables = 'F_PADJUNTAR_OTRO_DOCUMENTO_5_1, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $proveedoresC->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'02otrosdocumentos', " where idRelacion = '".$_SESSION['idPROV']."' ".$query2 );

$html = $proveedoresC->html2('ADJUNTAR OTROS DOCUMENTOS O IMÁGENES',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}

elseif($borraotrosdocuu == 'borraotrosdocuu'){
	$borra_id_DOCUU = isset($_POST["borra_id_DOCUU"])?$_POST["borra_id_DOCUU"]:"";
		
	echo $proveedoresC->borraotrosdocuu($borra_id_DOCUU);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}
	
elseif($VALIDAMETODOPAGO == 'VALIDAMETODOPAGO'){
	

$P_CONDICIONES_DE_PAGO = isset($_POST["P_CONDICIONES_DE_PAGO"])?$_POST["P_CONDICIONES_DE_PAGO"]:"";
$P_LIMITE_DE_CREDITO = isset($_POST["P_LIMITE_DE_CREDITO"])?$_POST["P_LIMITE_DE_CREDITO"]:"";
$P_FECHA_INICIO_NUEVO_CONVENIO = isset($_POST["P_FECHA_INICIO_NUEVO_CONVENIO"])?$_POST["P_FECHA_INICIO_NUEVO_CONVENIO"]:"";
$P_FECHA_FINALIZACION_CONVENIO = isset($_POST["P_FECHA_FINALIZACION_CONVENIO"])?$_POST["P_FECHA_FINALIZACION_CONVENIO"]:"";
$P_PORCENTAJE_COMISION_OTORGA = isset($_POST["P_PORCENTAJE_COMISION_OTORGA"])?$_POST["P_PORCENTAJE_COMISION_OTORGA"]:"";


	echo $proveedoresC->metodopagoproveedor ($P_CONDICIONES_DE_PAGO , $P_LIMITE_DE_CREDITO , $P_FECHA_INICIO_NUEVO_CONVENIO , $P_FECHA_FINALIZACION_CONVENIO , $P_PORCENTAJE_COMISION_OTORGA );
}	

/*PARA ENVIAR EMAIL*/
elseif($METODOPAGO_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($METODOPAGO_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';

$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION(
'P_CONDICIONES_DE_PAGO , P_LIMITE_DE_CREDITO,P_FECHA_INICIO_NUEVO_CONVENIO , P_FECHA_FINALIZACION_CONVENIO , P_PORCENTAJE_COMISION_OTORGA ',

 'CONDICIONES DE PAGO,
LIMITE DE CREDITO,
FECHA DE INICIO NUEVO CONVENIO,
FECHA DE FINALIZACIÓN,
PORCENTAJE DE COMISIÓN
','02metodopago',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );


$html = $proveedoresC->html2(' INFORMACIÓN DE PRODUCTOS O SERVICIOS',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}
 




 
 elseif($validaDOCUMENTOSFISCAL == 'validaDOCUMENTOSFISCAL' or $ENVIAFISCAL == 'ENVIAFISCAL'){
	 
if( $_FILES["ADJUNTAR_DOCUMENTO_LEGAL"] == true){
$ADJUNTAR_DOCUMENTO_LEGAL = $conexion->solocargar("ADJUNTAR_DOCUMENTO_LEGAL");
}if($ADJUNTAR_DOCUMENTO_LEGAL=='2' or $ADJUNTAR_DOCUMENTO_LEGAL=='' or $ADJUNTAR_DOCUMENTO_LEGAL=='1'){
	$ADJUNTAR_DOCUMENTO_LEGAL1="";
} else{
 $ADJUNTAR_DOCUMENTO_LEGAL1 = $ADJUNTAR_DOCUMENTO_LEGAL;
}	 
	 
$DOCUMENTO_LEGAL = isset($_POST["DOCUMENTO_LEGAL"])?$_POST["DOCUMENTO_LEGAL"]:"";

$ADJUNTAR_DOCUMENTO_OBSERVACIONES = isset($_POST["ADJUNTAR_DOCUMENTO_OBSERVACIONES"])?$_POST["ADJUNTAR_DOCUMENTO_OBSERVACIONES"]:"";
$FECHA_ULTIMA_DOCUMEN = isset($_POST["FECHA_ULTIMA_DOCUMEN"])?$_POST["FECHA_ULTIMA_DOCUMEN"]:"";
$validaDOCUMENTOSFISCAL = isset($_POST["validaDOCUMENTOSFISCAL"])?$_POST["validaDOCUMENTOSFISCAL"]:"";
$IPdocumentosfiscales = isset($_POST["IPdocumentosfiscales"])?$_POST["IPdocumentosfiscales"]:""; 
//ENVIAFISCAL

//print_r($_POST);
	echo $proveedoresC->documentofiscal ($DOCUMENTO_LEGAL ,$ADJUNTAR_DOCUMENTO_LEGAL, $ADJUNTAR_DOCUMENTO_OBSERVACIONES , $FECHA_ULTIMA_DOCUMEN , $validaDOCUMENTOSFISCAL,$IPdocumentosfiscales,$ENVIAFISCAL);
}

elseif($ENVIAR_EMAIL_DOCUFISCAL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($ENVIAR_EMAIL_DOCUFISCAL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['fiscalesdocu'])?$_POST['fiscalesdocu']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('DOCUMENTO_LEGAL,ADJUNTAR_DOCUMENTO_LEGAL,ADJUNTAR_DOCUMENTO_OBSERVACIONES',

'NOMBRE DEL DOCUMENTO , DOCUMENTO, OBSERVACIONES', '02DOCUMENTOSFISCALES',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );

$variables = 'ADJUNTAR_DOCUMENTO_LEGAL, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $proveedoresC->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'02DOCUMENTOSFISCALES', " where idRelacion = '".$_SESSION['idPROV']."' ".$query2 );

$html = $proveedoresC->html2('DOCUMENTOS FISCALES DEL PROVEEDOR',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}

elseif($borradocufiscal == 'borradocufiscal'){
	$borra_id_FISCAL = isset($_POST["borra_id_FISCAL"])?$_POST["borra_id_FISCAL"]:"";
		
	echo $proveedoresC->borradocufiscal($borra_id_FISCAL);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
} 
	 

 
elseif($validaNOMBRECONTACTO1 == 'validaNOMBRECONTACTO1' or $ENVIACONTACTPRO == 'ENVIACONTACTPRO'){

	if( $_FILES["TARJETA_PRE"] == true){
$TARJETA_PRE = $conexion->solocargar("TARJETA_PRE");
}if($TARJETA_PRE=='2' or $TARJETA_PRE=='' or $TARJETA_PRE=='1'){
	 $TARJETA_PRE1 = '';
} 

	
$DEPARTAMENTO_CONTACTO = isset($_POST["DEPARTAMENTO_CONTACTO"])?$_POST["DEPARTAMENTO_CONTACTO"]:"";
$NOMBRE_CONTACTO_PROVEE = isset($_POST["NOMBRE_CONTACTO_PROVEE"])?$_POST["NOMBRE_CONTACTO_PROVEE"]:"";
$CEL_CONTACTO_PROVEE = isset($_POST["CEL_CONTACTO_PROVEE"])?$_POST["CEL_CONTACTO_PROVEE"]:"";
$TELEFONO_CONTACPROVEE = isset($_POST["TELEFONO_CONTACPROVEE"])?$_POST["TELEFONO_CONTACPROVEE"]:"";
$NUMERO_EXTENSION_PROVEE = isset($_POST["NUMERO_EXTENSION_PROVEE"])?$_POST["NUMERO_EXTENSION_PROVEE"]:"";
$EMAIL_CONTACTO_PROVEE = isset($_POST["EMAIL_CONTACTO_PROVEE"])?$_POST["EMAIL_CONTACTO_PROVEE"]:"";
$OBSERVACIONES_PROVEE = isset($_POST["OBSERVACIONES_PROVEE"])?$_POST["OBSERVACIONES_PROVEE"]:"";
$FECHA_CONTACTOS_PROVEE = isset($_POST["FECHA_CONTACTOS_PROVEE"])?$_POST["FECHA_CONTACTOS_PROVEE"]:"";
$validaNOMBRECONTACTO1 = isset($_POST["validaNOMBRECONTACTO1"])?$_POST["validaNOMBRECONTACTO1"]:"";
$IPcontactosproveedores = isset($_POST["IPcontactosproveedores"])?$_POST["IPcontactosproveedores"]:"";
	
	echo $proveedoresC->enviarNOMBRECONTACTO1   ( $DEPARTAMENTO_CONTACTO , $NOMBRE_CONTACTO_PROVEE ,$CEL_CONTACTO_PROVEE, $TELEFONO_CONTACPROVEE ,   $NUMERO_EXTENSION_PROVEE ,$EMAIL_CONTACTO_PROVEE, $OBSERVACIONES_PROVEE , $FECHA_CONTACTOS_PROVEE ,$TARJETA_PRE, $validaNOMBRECONTACTO1,$IPcontactosproveedores,$ENVIACONTACTPRO );
}

elseif($CONTACTOP_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($CONTACTOP_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['contacPROVEE'])?$_POST['contacPROVEE']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION(
'DEPARTAMENTO_CONTACTO,NOMBRE_CONTACTO_PROVEE,CEL_CONTACTO_PROVEE,TELEFONO_CONTACPROVEE,NUMERO_EXTENSION_PROVEE ,EMAIL_CONTACTO_PROVEE,OBSERVACIONES_PROVEE',

'DEPARTAMENTO,NOMBRE DEL CONTACTO,
CELULAR DEL CONTACTO,
TELÉFONO DIRECTO,                                    
NÚMERO DE EXTENSIÓN,
EMAIL DE CONTACTO,                                                                   
OBSERVACIONES,

','02contactosprovee',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );


$html = $proveedoresC->html2(' CONTACTOS',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}
 
elseif($borracontactprovee == 'borracontactprovee'){
	$borra_id_conp = isset($_POST["borra_id_conp"])?$_POST["borra_id_conp"]:"";
		
	echo $proveedoresC->borracontactprovee($borra_id_conp);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}

elseif($validaNOMBRECONTACTO2 == 'validaNOMBRECONTACTO2'){
	
$P_NOMBRE_DEL_CONTACTO_CF = isset($_POST["P_NOMBRE_DEL_CONTACTO_CF"])?$_POST["P_NOMBRE_DEL_CONTACTO_CF"]:"";
$P_NOMBRE_DEL_CONTACTO_NP = isset($_POST["P_NOMBRE_DEL_CONTACTO_NP"])?$_POST["P_NOMBRE_DEL_CONTACTO_NP"]:"";
$P_NOMBRE_DEL_CONTACTO_EDE = isset($_POST["P_NOMBRE_DEL_CONTACTO_EDE"])?$_POST["P_NOMBRE_DEL_CONTACTO_EDE"]:"";
$P_NUMERO_CEL_CONTACTO_CF = isset($_POST["P_NUMERO_CEL_CONTACTO_CF"])?$_POST["P_NUMERO_CEL_CONTACTO_CF"]:"";
$P_NUMERO_CEL_CONTACTO_NP = isset($_POST["P_NUMERO_CEL_CONTACTO_NP"])?$_POST["P_NUMERO_CEL_CONTACTO_NP"]:"";
$P_NUMERO_CEL_CONTACTO_EDE = isset($_POST["P_NUMERO_CEL_CONTACTO_EDE"])?$_POST["P_NUMERO_CEL_CONTACTO_EDE"]:"";
$P_NUMERO_OFICINA_CF = isset($_POST["P_NUMERO_OFICINA_CF"])?$_POST["P_NUMERO_OFICINA_CF"]:"";
$P_NUMERO_OFICINA_NP = isset($_POST["P_NUMERO_OFICINA_NP"])?$_POST["P_NUMERO_OFICINA_NP"]:"";
$P_NUMERO_OFICINA_EDE = isset($_POST["P_NUMERO_OFICINA_EDE"])?$_POST["P_NUMERO_OFICINA_EDE"]:"";
$P_NUMERO_EXTENSION_CF = isset($_POST["P_NUMERO_EXTENSION_CF"])?$_POST["P_NUMERO_EXTENSION_CF"]:"";
$P_NUMERO_EXTENSION_NP = isset($_POST["P_NUMERO_EXTENSION_NP"])?$_POST["P_NUMERO_EXTENSION_NP"]:"";
$P_NUMERO_EXTENSION_EDE = isset($_POST["P_NUMERO_EXTENSION_EDE"])?$_POST["P_NUMERO_EXTENSION_EDE"]:"";
$P_IMAIL_CONTACTO_CF = isset($_POST["P_IMAIL_CONTACTO_CF"])?$_POST["P_IMAIL_CONTACTO_CF"]:"";
$P_IMAIL_CONTACTO_NP = isset($_POST["P_IMAIL_CONTACTO_NP"])?$_POST["P_IMAIL_CONTACTO_NP"]:"";
$P_IMAIL_CONTACTO_EDE = isset($_POST["P_IMAIL_CONTACTO_EDE"])?$_POST["P_IMAIL_CONTACTO_EDE"]:"";
$validaNOMBRECONTACTO2 = isset($_POST["validaNOMBRECONTACTO2"])?$_POST["validaNOMBRECONTACTO2"]:""; 

	if( $P_NOMBRE_DEL_CONTACTO_CF =="" or $P_NOMBRE_DEL_CONTACTO_NP =="" or $P_NOMBRE_DEL_CONTACTO_EDE =="" or $P_NUMERO_CEL_CONTACTO_CF =="" or $P_NUMERO_CEL_CONTACTO_NP =="" or $P_NUMERO_CEL_CONTACTO_EDE =="" or $P_NUMERO_OFICINA_CF =="" or $P_NUMERO_OFICINA_NP =="" or $P_NUMERO_OFICINA_EDE =="" or $P_NUMERO_EXTENSION_CF =="" or $P_NUMERO_EXTENSION_NP =="" or $P_NUMERO_EXTENSION_EDE =="" or $P_IMAIL_CONTACTO_CF =="" or $P_IMAIL_CONTACTO_NP =="" or $P_IMAIL_CONTACTO_EDE =="" ){		
	echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";			
	}else{
	
	echo $proveedoresC->contactoventasproveedor2 ($P_NOMBRE_DEL_CONTACTO_CF , $P_NOMBRE_DEL_CONTACTO_NP , $P_NOMBRE_DEL_CONTACTO_EDE , $P_NUMERO_CEL_CONTACTO_CF , $P_NUMERO_CEL_CONTACTO_NP , $P_NUMERO_CEL_CONTACTO_EDE , $P_NUMERO_OFICINA_CF , $P_NUMERO_OFICINA_NP , $P_NUMERO_OFICINA_EDE , $P_NUMERO_EXTENSION_CF , $P_NUMERO_EXTENSION_NP , $P_NUMERO_EXTENSION_EDE , $P_IMAIL_CONTACTO_CF , $P_IMAIL_CONTACTO_NP , $P_IMAIL_CONTACTO_EDE  );
	}
	//include_once (__ROOT1__."/includes/crea_funciones.php");
}

elseif($validaNOMBRECONTACTO3 == 'validaNOMBRECONTACTO3'){
	
$P_NOMBRE_DEL_CONTACTO_CF_2 = isset($_POST["P_NOMBRE_DEL_CONTACTO_CF_2"])?$_POST["P_NOMBRE_DEL_CONTACTO_CF_2"]:"";
$P_NOMBRE_DEL_CONTACTO_NP_2 = isset($_POST["P_NOMBRE_DEL_CONTACTO_NP_2"])?$_POST["P_NOMBRE_DEL_CONTACTO_NP_2"]:"";
$P_NOMBRE_DEL_CONTACTO_EDE_2 = isset($_POST["P_NOMBRE_DEL_CONTACTO_EDE_2"])?$_POST["P_NOMBRE_DEL_CONTACTO_EDE_2"]:"";
$P_NUMERO_CEL_CONTACTO_CF_2 = isset($_POST["P_NUMERO_CEL_CONTACTO_CF_2"])?$_POST["P_NUMERO_CEL_CONTACTO_CF_2"]:"";
$P_NUMERO_CEL_CONTACTO_NP_2 = isset($_POST["P_NUMERO_CEL_CONTACTO_NP_2"])?$_POST["P_NUMERO_CEL_CONTACTO_NP_2"]:"";
$P_NUMERO_CEL_CONTACTO_EDE_2 = isset($_POST["P_NUMERO_CEL_CONTACTO_EDE_2"])?$_POST["P_NUMERO_CEL_CONTACTO_EDE_2"]:"";
$P_NUMERO_OFICINA_CF_2 = isset($_POST["P_NUMERO_OFICINA_CF_2"])?$_POST["P_NUMERO_OFICINA_CF_2"]:"";
$P_NUMERO_OFICINA_NP_2 = isset($_POST["P_NUMERO_OFICINA_NP_2"])?$_POST["P_NUMERO_OFICINA_NP_2"]:"";
$P_NUMERO_OFICINA_EDE_2 = isset($_POST["P_NUMERO_OFICINA_EDE_2"])?$_POST["P_NUMERO_OFICINA_EDE_2"]:"";
$P_NUMERO_EXTENSION_CF_2 = isset($_POST["P_NUMERO_EXTENSION_CF_2"])?$_POST["P_NUMERO_EXTENSION_CF_2"]:"";
$P_NUMERO_EXTENSION_NP_2 = isset($_POST["P_NUMERO_EXTENSION_NP_2"])?$_POST["P_NUMERO_EXTENSION_NP_2"]:"";
$P_NUMERO_EXTENSION_EDE_2 = isset($_POST["P_NUMERO_EXTENSION_EDE_2"])?$_POST["P_NUMERO_EXTENSION_EDE_2"]:"";
$P_IMAIL_CONTACTO_CF_2 = isset($_POST["P_IMAIL_CONTACTO_CF_2"])?$_POST["P_IMAIL_CONTACTO_CF_2"]:"";
$P_IMAIL_CONTACTO_NP_2 = isset($_POST["P_IMAIL_CONTACTO_NP_2"])?$_POST["P_IMAIL_CONTACTO_NP_2"]:"";
$P_IMAIL_CONTACTO_EDE_2 = isset($_POST["P_IMAIL_CONTACTO_EDE_2"])?$_POST["P_IMAIL_CONTACTO_EDE_2"]:"";
$productosySERVICIOS_ENVIAR_IMAIL = isset($_POST["productosySERVICIOS_ENVIAR_IMAIL"])?$_POST["productosySERVICIOS_ENVIAR_IMAIL"]:"";

	
	if($P_NOMBRE_DEL_CONTACTO_CF_2 =="" or $P_NOMBRE_DEL_CONTACTO_NP_2 =="" or $P_NOMBRE_DEL_CONTACTO_EDE_2 =="" or $P_NUMERO_CEL_CONTACTO_CF_2 =="" or $P_NUMERO_CEL_CONTACTO_NP_2 =="" or $P_NUMERO_CEL_CONTACTO_EDE_2 =="" or $P_NUMERO_OFICINA_CF_2 =="" or $P_NUMERO_OFICINA_NP_2 =="" or $P_NUMERO_OFICINA_EDE_2 =="" or $P_NUMERO_EXTENSION_CF_2 =="" or $P_NUMERO_EXTENSION_NP_2 =="" or $P_NUMERO_EXTENSION_EDE_2 =="" or $P_IMAIL_CONTACTO_CF_2 =="" or $P_IMAIL_CONTACTO_NP_2 =="" or $P_IMAIL_CONTACTO_EDE_2 =="" ){
	echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";
	}else{
	echo $proveedoresC->contactoventasproveedor3 ( $P_NOMBRE_DEL_CONTACTO_CF_2 , $P_NOMBRE_DEL_CONTACTO_NP_2 , $P_NOMBRE_DEL_CONTACTO_EDE_2 , $P_NUMERO_CEL_CONTACTO_CF_2 , $P_NUMERO_CEL_CONTACTO_NP_2 , $P_NUMERO_CEL_CONTACTO_EDE_2 , $P_NUMERO_OFICINA_CF_2 , $P_NUMERO_OFICINA_NP_2 , $P_NUMERO_OFICINA_EDE_2 , $P_NUMERO_EXTENSION_CF_2 , $P_NUMERO_EXTENSION_NP_2 , $P_NUMERO_EXTENSION_EDE_2 , $P_IMAIL_CONTACTO_CF_2 , $P_IMAIL_CONTACTO_NP_2 , $P_IMAIL_CONTACTO_EDE_2  );
	}
	//include_once (__ROOT1__."/includes/crea_funciones.php");	
}

elseif($validaINFOPRODSERV == 'validaINFOPRODSERV'){
	
$PROVEEDOR_DE_EPC = isset($_POST["PROVEEDOR_DE_EPC"])?1:0;
$PROVEEDOR_DE_INNOVAC = isset($_POST["PROVEEDOR_DE_INNOVAC"])?1:0;
$PROVEEDOR_DE_JUST = isset($_POST["PROVEEDOR_DE_JUST"])?1:0;
$CALIFICACIONPSG = isset($_POST["CALIFICACIONPSG"])?$_POST["CALIFICACIONPSG"]:"";
$CALIFICACION_TR = isset($_POST["CALIFICACION_TR"])?$_POST["CALIFICACION_TR"]:"";
$MOTIVO_CALIFICACION = isset($_POST["MOTIVO_CALIFICACION"])?$_POST["MOTIVO_CALIFICACION"]:"";
$CIUDAD_SERVICIO = isset($_POST["CIUDAD_SERVICIO"])?$_POST["CIUDAD_SERVICIO"]:"";
$PAIS_SERVICIO = isset($_POST["PAIS_SERVICIO"])?$_POST["PAIS_SERVICIO"]:"";
$PFECHA_ULTIMACOMPRA = isset($_POST["PFECHA_ULTIMACOMPRA"])?$_POST["PFECHA_ULTIMACOMPRA"]:"";
$PFECHA_ACTUA_DOCUM = isset($_POST["PFECHA_ACTUA_DOCUM"])?$_POST["PFECHA_ACTUA_DOCUM"]:"";
$PCONTACTADO_POR = isset($_POST["PCONTACTADO_POR"])?$_POST["PCONTACTADO_POR"]:"";
$P_OTRO = isset($_POST["P_OTRO"])?$_POST["P_OTRO"]:"";
$PLIGA_FOTOS_VIDEOS = isset($_POST["PLIGA_FOTOS_VIDEOS"])?$_POST["PLIGA_FOTOS_VIDEOS"]:"";
$PRODUCTO_O_SERVICIO = isset($_POST["PRODUCTO_O_SERVICIO"])?$_POST["PRODUCTO_O_SERVICIO"]:"";
$PRODUCTO_O_SERVICIO_2 = isset($_POST["PRODUCTO_O_SERVICIO_2"])?$_POST["PRODUCTO_O_SERVICIO_2"]:"";
$PRODUCTO_O_SERVICIO_3 = isset($_POST["PRODUCTO_O_SERVICIO_3"])?$_POST["PRODUCTO_O_SERVICIO_3"]:"";
$PRODUCTO_O_SERVICIO_4 = isset($_POST["PRODUCTO_O_SERVICIO_4"])?$_POST["PRODUCTO_O_SERVICIO_4"]:"";
$PRODUCTO_O_SERVICIO_5 = isset($_POST["PRODUCTO_O_SERVICIO_5"])?$_POST["PRODUCTO_O_SERVICIO_5"]:"";
$PRODUCTO_O_SERVICIO_6 = isset($_POST["PRODUCTO_O_SERVICIO_6"])?$_POST["PRODUCTO_O_SERVICIO_6"]:"";
$PRODUCTO_O_SERVICIO_7 = isset($_POST["PRODUCTO_O_SERVICIO_7"])?$_POST["PRODUCTO_O_SERVICIO_7"]:"";
$PRODUCTO_O_SERVICIO_8 = isset($_POST["PRODUCTO_O_SERVICIO_8"])?$_POST["PRODUCTO_O_SERVICIO_8"]:"";

	echo $proveedoresC->productosservicios  ( $PROVEEDOR_DE_EPC , $PROVEEDOR_DE_INNOVAC , $PROVEEDOR_DE_JUST , $CALIFICACIONPSG , $CALIFICACION_TR , $MOTIVO_CALIFICACION , $CIUDAD_SERVICIO , $PAIS_SERVICIO , $PFECHA_ULTIMACOMPRA , $PFECHA_ACTUA_DOCUM , $PCONTACTADO_POR , $P_OTRO , $PLIGA_FOTOS_VIDEOS , $PRODUCTO_O_SERVICIO , $PRODUCTO_O_SERVICIO_2 , $PRODUCTO_O_SERVICIO_3 , $PRODUCTO_O_SERVICIO_4 , $PRODUCTO_O_SERVICIO_5 , $PRODUCTO_O_SERVICIO_6 , $PRODUCTO_O_SERVICIO_7 , $PRODUCTO_O_SERVICIO_8 );
	
//include_once (__ROOT1__."/includes/crea_funciones.php");
}
/*PARA ENVIAR EMAIL*/
elseif($SERVI_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($SERVI_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('CALIFICACIONPSG,CALIFICACION_TR,MOTIVO_CALIFICACION,CIUDAD_SERVICIO,PAIS_SERVICIO,PFECHA_ULTIMACOMPRA,PFECHA_ACTUA_DOCUM,PCONTACTADO_POR,P_OTRO',

'CALIFICACIÓN DEL PRODUCTO O SERVICIO EN GENERAL,CALIFICACIÓN DEL TIEMPO DE RESPUESTA,MOTIVO DE LA CALIFICACIÓN,CIUDAD DONDE SE OTORGA EL SERVICIO,PAÍS DONDE SE OTORGA EL SERVICIO,FECHA DE ÚLTIMA COMPRA,FECHA DE ACTUALIZACIÓN DE DOCUMENTOS,CONTACTADO POR,OTRO', '02productosservicios',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );


$html = $proveedoresC->html2('INFORMACIÓN DE PRODUCTOS O SERVICIOS',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}

elseif($validaDIROFICINASBODEGAS == 'validaDIROFICINASBODEGAS' or $ENVIARBODEGAPRO == 'ENVIARBODEGAPRO'){

$P_EDIFICIO_OSB = isset($_POST["P_EDIFICIO_OSB"])?$_POST["P_EDIFICIO_OSB"]:"";
$P_CALLE_OSB = isset($_POST["P_CALLE_OSB"])?$_POST["P_CALLE_OSB"]:"";
$P_NUMERO_EXTERIOR_OSB = isset($_POST["P_NUMERO_EXTERIOR_OSB"])?$_POST["P_NUMERO_EXTERIOR_OSB"]:"";
$P_NUMERO_INTERIOR_OSB = isset($_POST["P_NUMERO_INTERIOR_OSB"])?$_POST["P_NUMERO_INTERIOR_OSB"]:"";
$P_NUMERO_OFICINA_OSB = isset($_POST["P_NUMERO_OFICINA_OSB"])?$_POST["P_NUMERO_OFICINA_OSB"]:"";
$P_COLONIA_OSB = isset($_POST["P_COLONIA_OSB"])?$_POST["P_COLONIA_OSB"]:"";
$P_ALCALDIA_OSB = isset($_POST["P_ALCALDIA_OSB"])?$_POST["P_ALCALDIA_OSB"]:"";
$P_CP_OSB = isset($_POST["P_CP_OSB"])?$_POST["P_CP_OSB"]:"";
$P_CIUDAD_OSB = isset($_POST["P_CIUDAD_OSB"])?$_POST["P_CIUDAD_OSB"]:"";
$P_ESTADO_OSB = isset($_POST["P_ESTADO_OSB"])?$_POST["P_ESTADO_OSB"]:"";
$P_PAIS_OSB = isset($_POST["P_PAIS_OSB"])?$_POST["P_PAIS_OSB"]:"";
$P_UBICACION_MAPA_OSB = isset($_POST["P_UBICACION_MAPA_OSB"])?$_POST["P_UBICACION_MAPA_OSB"]:"";
$P_TELEFONO_OSB_1 = isset($_POST["P_TELEFONO_OSB_1"])?$_POST["P_TELEFONO_OSB_1"]:"";
$P_TELEFONO_OSB_2 = isset($_POST["P_TELEFONO_OSB_2"])?$_POST["P_TELEFONO_OSB_2"]:"";
$P_IMAIL_CONTACTO_OSB_1 = isset($_POST["P_IMAIL_CONTACTO_OSB_1"])?$_POST["P_IMAIL_CONTACTO_OSB_1"]:"";
$P_NUMERO_EXTENCION_OSB_1 = isset($_POST["P_NUMERO_EXTENCION_OSB_1"])?$_POST["P_NUMERO_EXTENCION_OSB_1"]:""; 
$IPbodegasproveedores = isset($_POST["IPbodegasproveedores"])?$_POST["IPbodegasproveedores"]:"";	
	
		
		
	echo $proveedoresC->enviarDIROFICINASBODEGAS ( $P_EDIFICIO_OSB , $P_CALLE_OSB , $P_NUMERO_EXTERIOR_OSB , $P_NUMERO_INTERIOR_OSB , $P_NUMERO_OFICINA_OSB , $P_COLONIA_OSB , $P_ALCALDIA_OSB , $P_CP_OSB , $P_CIUDAD_OSB , $P_ESTADO_OSB , $P_PAIS_OSB , $P_UBICACION_MAPA_OSB , $P_TELEFONO_OSB_1 , $P_TELEFONO_OSB_2 , $P_IMAIL_CONTACTO_OSB_1 , $P_NUMERO_EXTENCION_OSB_1,$IPbodegasproveedores,$ENVIARBODEGAPRO );
	
}	

elseif($BODEGAS_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($BODEGAS_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['bodegaPRO'])?$_POST['bodegaPRO']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;                                     

}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('P_EDIFICIO_OSB,P_CALLE_OSB,P_NUMERO_EXTERIOR_OSB,P_NUMERO_INTERIOR_OSB,P_NUMERO_OFICINA_OSB,P_COLONIA_OSB,P_ALCALDIA_OSB,P_CP_OSB,P_CIUDAD_OSB,P_ESTADO_OSB,P_PAIS_OSB,P_UBICACION_MAPA_OSB,P_TELEFONO_OSB_1,P_TELEFONO_OSB_2,P_IMAIL_CONTACTO_OSB_1',

'EDIFICIO,CALLE,NÚMERO EXTERIOR,NÚMERO INTERIOR,NÚMERO DE OFICINA,COLONIA,ALCALDÍA,C.P,CIUDAD,ESTADO,PAÍS,UBICACIÓN EN EL MAPA,TELÉFONO 1,TELÉFONO 2,OBSERVACIONES','02DIROFICINASBODEGAS',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );



$html = $proveedoresC->html2('  DIRECCIÓN DE OFICINAS, SUCURSALES O BODEGAS',$MANDA_INFORMACION );
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}

elseif($borrabodegasprovee == 'borrabodegasprovee'){
	$borra_id_bodeP = isset($_POST["borra_id_bodeP"])?$_POST["borra_id_bodeP"]:"";
		
	echo $proveedoresC->borrabodegasprovee($borra_id_bodeP);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}






elseif($validaDATOSBANCARIOS1 == 'validaDATOSBANCARIOS1' or $ENVIARRdatosbancario1p == 'ENVIARRdatosbancario1p'){
	
	if( $_FILES["FOTO_ESTADO_PROVEE"] == true){
$FOTO_ESTADO_PROVEE = $conexion->solocargar("FOTO_ESTADO_PROVEE");
}if($FOTO_ESTADO_PROVEE=='2' or $FOTO_ESTADO_PROVEE=='' or $FOTO_ESTADO_PROVEE=='1'){
	 $FOTO_ESTADO_PROVEE1 = '';
} 

$P_TIPO_DE_MONEDA_1 = isset($_POST["P_TIPO_DE_MONEDA_1"])?$_POST["P_TIPO_DE_MONEDA_1"]:"";
$P_INSTITUCION_FINANCIERA_1 = isset($_POST["P_INSTITUCION_FINANCIERA_1"])?$_POST["P_INSTITUCION_FINANCIERA_1"]:"";
$P_NUMERO_DE_CUENTA_DB_1 = isset($_POST["P_NUMERO_DE_CUENTA_DB_1"])?$_POST["P_NUMERO_DE_CUENTA_DB_1"]:"";
$P_NUMERO_CLABE_1 = isset($_POST["P_NUMERO_CLABE_1"])?$_POST["P_NUMERO_CLABE_1"]:"";
$P_NUMERO_DE_SUCURSAL_1 = isset($_POST["P_NUMERO_DE_SUCURSAL_1"])?$_POST["P_NUMERO_DE_SUCURSAL_1"]:"";
$P_NUMERO_IBAN_1 = isset($_POST["P_NUMERO_IBAN_1"])?$_POST["P_NUMERO_IBAN_1"]:"";
$P_NUMERO_CUENTA_SWIFT_1 = isset($_POST["P_NUMERO_CUENTA_SWIFT_1"])?$_POST["P_NUMERO_CUENTA_SWIFT_1"]:"";
$ULTIMA_CARGA_DATOBANCA = isset($_POST["ULTIMA_CARGA_DATOBANCA"])?$_POST["ULTIMA_CARGA_DATOBANCA"]:"";
$OBSERVACIONES_D = isset($_POST["OBSERVACIONES_D"])?$_POST["OBSERVACIONES_D"]:"";
$IPdatosbancario1p = isset($_POST["IPdatosbancario1p"])?$_POST["IPdatosbancario1p"]:"";


	echo $proveedoresC->enviarDATOSBANCARIOS1($P_TIPO_DE_MONEDA_1 , $P_INSTITUCION_FINANCIERA_1 , $P_NUMERO_DE_CUENTA_DB_1 , $P_NUMERO_CLABE_1 ,$P_NUMERO_DE_SUCURSAL_1 , $P_NUMERO_IBAN_1 , $P_NUMERO_CUENTA_SWIFT_1, $FOTO_ESTADO_PROVEE,$ULTIMA_CARGA_DATOBANCA,$OBSERVACIONES_D,$ENVIARRdatosbancario1p,
	$IPdatosbancario1p );
	

}	

elseif($DAbancaPRO_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($DAbancaPRO_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['datosbancPRO'])?$_POST['datosbancPRO']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('P_TIPO_DE_MONEDA_1,P_INSTITUCION_FINANCIERA_1,P_NUMERO_DE_CUENTA_DB_1,P_NUMERO_CLABE_1,P_NUMERO_DE_SUCURSAL_1,P_NUMERO_IBAN_1,P_NUMERO_CUENTA_SWIFT_1,FOTO_ESTADO_PROVEE',

'TIPO DE MONEDA ,NOMBRE DE LA INSTITUCIÓN FINANCIERA,NUMERO DE CUENTA,CLABE,NÚMERO DE SUCURSAL,NUMERO IBAN,NUMERO DE CUENTA SWIFT,FOTO DE ESTADO DE CUENTA', '02DATOSBANCARIOS1',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );

$variables = 'FOTO_ESTADO_PROVEE, ';
// trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = $proveedoresC->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'02DATOSBANCARIOS1', " where idRelacion = '".$_SESSION['idPROV']."' ".$query2 );

$html = $proveedoresC->html2(' DATOS BANCARIOS',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');;
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}

elseif($borra_datos_bancario1 == 'borra_datos_bancario1'){
	$borra_id_bancaP = isset($_POST["borra_id_bancaP"])?$_POST["borra_id_bancaP"]:"";   
		
	echo $proveedoresC->borra_datos_bancario1($borra_id_bancaP);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}






elseif($validaDATOSBANCARIOS2 == 'validaDATOSBANCARIOS2'){

$P_TIPO_DE_MONEDA_2 = isset($_POST["P_TIPO_DE_MONEDA_2"])?$_POST["P_TIPO_DE_MONEDA_2"]:"";
$P_INSTITUCION_FINANCIERA_2 = isset($_POST["P_INSTITUCION_FINANCIERA_2"])?$_POST["P_INSTITUCION_FINANCIERA_2"]:"";
$P_NUMERO_DE_CUENTA_DB_2 = isset($_POST["P_NUMERO_DE_CUENTA_DB_2"])?$_POST["P_NUMERO_DE_CUENTA_DB_2"]:"";
$P_NUMERO_CLABE_2 = isset($_POST["P_NUMERO_CLABE_2"])?$_POST["P_NUMERO_CLABE_2"]:"";
$P_NUMERO_DE_SUCURSAL_2 = isset($_POST["P_NUMERO_DE_SUCURSAL_2"])?$_POST["P_NUMERO_DE_SUCURSAL_2"]:"";
$P_NUMERO_IBAN_2 = isset($_POST["P_NUMERO_IBAN_2"])?$_POST["P_NUMERO_IBAN_2"]:"";
$P_NUMERO_CUENTA_SWIFT_2 = isset($_POST["P_NUMERO_CUENTA_SWIFT_2"])?$_POST["P_NUMERO_CUENTA_SWIFT_2"]:"";
$validaDATOSBANCARIOS2 = isset($_POST["validaDATOSBANCARIOS2"])?$_POST["validaDATOSBANCARIOS2"]:""; 
	if($P_TIPO_DE_MONEDA_2 =="" or $P_INSTITUCION_FINANCIERA_2 =="" or $P_NUMERO_DE_CUENTA_DB_2 =="" or $P_NUMERO_CLABE_2 =="" or $P_NUMERO_DE_SUCURSAL_2 =="" or $P_NUMERO_IBAN_2 =="" or $P_NUMERO_CUENTA_SWIFT_2 =="" ){
		echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";
	}else{
	echo $proveedoresC->DATOSBANCARIOS2($P_TIPO_DE_MONEDA_2 , $P_INSTITUCION_FINANCIERA_2 , $P_NUMERO_DE_CUENTA_DB_2 , $P_NUMERO_CLABE_2 , $P_NUMERO_DE_SUCURSAL_2 , $P_NUMERO_IBAN_2 , $P_NUMERO_CUENTA_SWIFT_2  );
	}

	//include_once (__ROOT1__."/includes/crea_funciones.php");	
}

elseif($validaREFERENCIASCOMERCIALES1 == 'validaREFERENCIASCOMERCIALES1' or $ENVIARreferenciaPRO == 'ENVIARreferenciaPRO'){
	
$P_NOMBRE_EMPRESA_RC_1 = isset($_POST["P_NOMBRE_EMPRESA_RC_1"])?$_POST["P_NOMBRE_EMPRESA_RC_1"]:"";
$P_NOMBRE_CONTACTO_RC_1 = isset($_POST["P_NOMBRE_CONTACTO_RC_1"])?$_POST["P_NOMBRE_CONTACTO_RC_1"]:"";
$P_CELULAR_CONTACTO_RC_1 = isset($_POST["P_CELULAR_CONTACTO_RC_1"])?$_POST["P_CELULAR_CONTACTO_RC_1"]:"";
$P_TELEFONO_EMPRESA_RC_1 = isset($_POST["P_TELEFONO_EMPRESA_RC_1"])?$_POST["P_TELEFONO_EMPRESA_RC_1"]:"";
$P_NUMERO_EXTENSION_RC_1 = isset($_POST["P_NUMERO_EXTENSION_RC_1"])?$_POST["P_NUMERO_EXTENSION_RC_1"]:"";
$P_IMAIL_CONTACTO_RC_1 = isset($_POST["P_IMAIL_CONTACTO_RC_1"])?$_POST["P_IMAIL_CONTACTO_RC_1"]:"";
$P_PAGINA_WEB_RC_1 = isset($_POST["P_PAGINA_WEB_RC_1"])?$_POST["P_PAGINA_WEB_RC_1"]:"";
$ULTIMA_CARGA_REFEprovee = isset($_POST["ULTIMA_CARGA_REFEprovee"])?$_POST["ULTIMA_CARGA_REFEprovee"]:"";
$IPdatosREFEP1p = isset($_POST["IPdatosREFEP1p"])?$_POST["IPdatosREFEP1p"]:"";


	
	echo $proveedoresC->REFERENCIASCOMERCIALES1 ( $P_NOMBRE_EMPRESA_RC_1 , $P_NOMBRE_CONTACTO_RC_1 , $P_CELULAR_CONTACTO_RC_1 , $P_TELEFONO_EMPRESA_RC_1 , $P_NUMERO_EXTENSION_RC_1 , $P_IMAIL_CONTACTO_RC_1 , $P_PAGINA_WEB_RC_1,$ULTIMA_CARGA_REFEprovee, $IPdatosREFEP1p,$ENVIARreferenciaPRO );
}	
	
elseif($REFE_ENVIAR_IMAIL ==true){
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($REFE_ENVIAR_IMAIL=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['referenPRO'])?$_POST['referenPRO']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = "and (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
}                                                                   
/*nuevo variables_informacionfiscal_logo*/                           



$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION('P_NOMBRE_EMPRESA_RC_1,P_NOMBRE_CONTACTO_RC_1,P_CELULAR_CONTACTO_RC_1,P_TELEFONO_EMPRESA_RC_1,P_NUMERO_EXTENSION_RC_1,P_IMAIL_CONTACTO_RC_1,P_PAGINA_WEB_RC_1',

'NOMBRE DE LA EMPRESA,NOMBRE DEL CONTACTO ,CELULAR DEL CONTACTO,TELÉFONO DE LA EMPRESA,NÚMERO DE EXTENSIÓN DEL CONTACTO,CORREO ELECTRONICO,PAGÍNA WEB', '02REFERENCIASCOMERCIALES1',  " where idRelacion = '".$_SESSION['idPROV']."' 
".$query2/*nuevo*/ );


$html = $proveedoresC->html2(' REFERENCIAS COMERCIALES',$MANDA_INFORMACION );
//$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);
}


elseif($borrareferenprovee == 'borrareferenprovee'){
	$borra_id_REFEP = isset($_POST["borra_id_REFEP"])?$_POST["borra_id_REFEP"]:"";
		
	echo $proveedoresC->borrareferenprovee($borra_id_REFEP);
   	//include_once (__ROOT1__."/includes/crea_funciones.php");
}

elseif($validaREFERENCIASCOMERCIALES2 == 'validaREFERENCIASCOMERCIALES2'){
	
	
$P_NOMBRE_EMPRESA_RC_2 = isset($_POST["P_NOMBRE_EMPRESA_RC_2"])?$_POST["P_NOMBRE_EMPRESA_RC_2"]:"";
$P_NOMBRE_CONTACTO_RC_2 = isset($_POST["P_NOMBRE_CONTACTO_RC_2"])?$_POST["P_NOMBRE_CONTACTO_RC_2"]:"";
$P_CELULAR_CONTACTO_RC_2 = isset($_POST["P_CELULAR_CONTACTO_RC_2"])?$_POST["P_CELULAR_CONTACTO_RC_2"]:"";
$P_TELEFONO_EMPRESA_RC_2 = isset($_POST["P_TELEFONO_EMPRESA_RC_2"])?$_POST["P_TELEFONO_EMPRESA_RC_2"]:"";
$P_NUMERO_EXTENSIO_CONTACTO_RC_2 = isset($_POST["P_NUMERO_EXTENSIO_CONTACTO_RC_2"])?$_POST["P_NUMERO_EXTENSIO_CONTACTO_RC_2"]:"";
$P_IMAIL_RC_2 = isset($_POST["P_IMAIL_RC_2"])?$_POST["P_IMAIL_RC_2"]:"";
$P_PAGINA_WEB_RC_2 = isset($_POST["P_PAGINA_WEB_RC_2"])?$_POST["P_PAGINA_WEB_RC_2"]:"";

if($P_NOMBRE_EMPRESA_RC_2 =="" or $P_NOMBRE_CONTACTO_RC_2 =="" or $P_CELULAR_CONTACTO_RC_2 =="" or $P_TELEFONO_EMPRESA_RC_2 =="" or $P_NUMERO_EXTENSIO_CONTACTO_RC_2 =="" or $P_IMAIL_RC_2 =="" or $P_PAGINA_WEB_RC_2 =="" ){	
		echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";	
}else{
	echo $proveedoresC->REFERENCIASCOMERCIALES2 ( $P_NOMBRE_EMPRESA_RC_2 , $P_NOMBRE_CONTACTO_RC_2 , $P_CELULAR_CONTACTO_RC_2 , $P_TELEFONO_EMPRESA_RC_2 , $P_NUMERO_EXTENSIO_CONTACTO_RC_2 , $P_IMAIL_RC_2 , $P_PAGINA_WEB_RC_2 );

}

	
	
	//include_once (__ROOT1__."/includes/crea_funciones.php");
}

elseif($validaREFERENCIASCOMERCIALES3 == 'validaREFERENCIASCOMERCIALES3'){
$P_NOMBRE_EMPRESA_RC_3 = isset($_POST["P_NOMBRE_EMPRESA_RC_3"])?$_POST["P_NOMBRE_EMPRESA_RC_3"]:"";
$P_NOMBRE_CONTACTO_RC_3 = isset($_POST["P_NOMBRE_CONTACTO_RC_3"])?$_POST["P_NOMBRE_CONTACTO_RC_3"]:"";
$P_CELULAR_CONTACTO_RC_3 = isset($_POST["P_CELULAR_CONTACTO_RC_3"])?$_POST["P_CELULAR_CONTACTO_RC_3"]:"";
$P_TELEFONO_EMPRESA_RC_3 = isset($_POST["P_TELEFONO_EMPRESA_RC_3"])?$_POST["P_TELEFONO_EMPRESA_RC_3"]:"";
$P_NUMERO_EXTENSION_RC_3 = isset($_POST["P_NUMERO_EXTENSION_RC_3"])?$_POST["P_NUMERO_EXTENSION_RC_3"]:"";
$P_IMAIL_RC_3 = isset($_POST["P_IMAIL_RC_3"])?$_POST["P_IMAIL_RC_3"]:"";
$P_PAGINA_WEB_RC_3 = isset($_POST["P_PAGINA_WEB_RC_3"])?$_POST["P_PAGINA_WEB_RC_3"]:"";
$validaREFERENCIASCOMERCIALES3 = isset($_POST["validaREFERENCIASCOMERCIALES3"])?$_POST["validaREFERENCIASCOMERCIALES3"]:""; 
	if ( $P_NOMBRE_EMPRESA_RC_3 =="" or $P_NOMBRE_CONTACTO_RC_3 =="" or $P_CELULAR_CONTACTO_RC_3 =="" or $P_TELEFONO_EMPRESA_RC_3 =="" or $P_NUMERO_EXTENSION_RC_3 =="" or $P_IMAIL_RC_3 =="" or $P_PAGINA_WEB_RC_3 ==""  ){		
	echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";	
	}else{

	echo $proveedoresC->REFERENCIASCOMERCIALES3 ($P_NOMBRE_EMPRESA_RC_3 , $P_NOMBRE_CONTACTO_RC_3 , $P_CELULAR_CONTACTO_RC_3 , $P_TELEFONO_EMPRESA_RC_3 , $P_NUMERO_EXTENSION_RC_3 , $P_IMAIL_RC_3 , $P_PAGINA_WEB_RC_3  );
	}
	//include_once (__ROOT1__."/includes/crea_funciones.php");	
}

elseif($validaLISTADO == 'validaLISTADO'){
	
$usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
$nommbrerazon = isset($_POST["nommbrerazon"])?$_POST["nommbrerazon"]:"";
$contrasenia = isset($_POST["contrasenia"])?$_POST["contrasenia"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$validaLISTADO = isset($_POST["validaLISTADO"])?$_POST["validaLISTADO"]:""; 
	if( $usuario =="" or $nommbrerazon =="" or $contrasenia =="" or $email =="" ){
	echo "<P style='color:red; font-size:18px;'>FAVOR DE LLENAR TODOS LOS CAMPOS EN ROJO</p>";	
	}else{
	echo $proveedoresC->usuario2 ( $usuario , $nommbrerazon , $contrasenia , $email );
	}
		//include_once (__ROOT1__."/includes/crea_funciones.php");	
}



elseif($DATOSPROVEE_ENVIAR_IMAIL ==true){
	
$DATOSPROVEE_ENVIAR_IMAIL = isset($_POST["DATOSPROVEE_ENVIAR_IMAIL"])?$_POST["DATOSPROVEE_ENVIAR_IMAIL"]:"";
$F_PDESCARGAR_CONTRATO_PROVEEDORES_1 = isset($_POST["F_PDESCARGAR_CONTRATO_PROVEEDORES_1"])?$_POST["F_PDESCARGAR_CONTRATO_PROVEEDORES_1"]:"";
$F_PADJUNTAR_CONTRATO_FIRMADO_1 = isset($_POST["F_PADJUNTAR_CONTRATO_FIRMADO_1"])?$_POST["F_PADJUNTAR_CONTRATO_FIRMADO_1"]:"";
$F_PADJUNTAR_CONTRATO_FIRMADO_2_1 = isset($_POST["F_PADJUNTAR_CONTRATO_FIRMADO_2_1"])?$_POST["F_PADJUNTAR_CONTRATO_FIRMADO_2_1"]:"";
$F_PADJUNTAR_CONVENIOS_1 = isset($_POST["F_PADJUNTAR_CONVENIOS_1"])?$_POST["F_PADJUNTAR_CONVENIOS_1"]:"";
$ADJUNTAR_CONTRATO_INFORMACION_1 = isset($_POST["ADJUNTAR_CONTRATO_INFORMACION_1"])?$_POST["ADJUNTAR_CONTRATO_INFORMACION_1"]:"";
$F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_1 = isset($_POST["F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_1"])?$_POST["F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_1"]:"";
$F_PADJUNTAR_OPINION_CUMPLIMIENTO_1 = isset($_POST["F_PADJUNTAR_OPINION_CUMPLIMIENTO_1"])?$_POST["F_PADJUNTAR_OPINION_CUMPLIMIENTO_1"]:"";
$F_PADJUNTAR_REGIMEN_FISCAL_1 = isset($_POST["F_PADJUNTAR_REGIMEN_FISCAL_1"])?$_POST["F_PADJUNTAR_REGIMEN_FISCAL_1"]:"";
$F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_1 = isset($_POST["F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_1"])?$_POST["F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_1"]:"";
$F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_1 = isset($_POST["F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_1"])?$_POST["F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_1"]:"";
$F_PADJUNTAR_ACTA_CONSTITUTIVA_1 = isset($_POST["F_PADJUNTAR_ACTA_CONSTITUTIVA_1"])?$_POST["F_PADJUNTAR_ACTA_CONSTITUTIVA_1"]:"";
$F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_1 = isset($_POST["F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_1"])?$_POST["F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_1"]:"";
$F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_1 = isset($_POST["F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_1"])?$_POST["F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_1"]:"";


$variables = '';
$cadenacompleta ='';

if($F_PDESCARGAR_CONTRATO_PROVEEDORES_1 =='1'){
$F_PDESCARGAR_CONTRATO_PROVEEDORES_11 = 'F_PDESCARGAR_CONTRATO_PROVEEDORES, ';
$F_PDESCARGAR_CONTRATO_PROVEEDORES_11t = 'CONTRATO PARA LLENADO DE PROVEEDORES, ';
}
if($F_PADJUNTAR_CONTRATO_FIRMADO_1 =='1'){
$F_PADJUNTAR_CONTRATO_FIRMADO_11 = 'F_PADJUNTAR_CONTRATO_FIRMADO, ';
$F_PADJUNTAR_CONTRATO_FIRMADO_11t = 'ADJUNTAR CONTRATO FIRMADO, ';
}
if($F_PADJUNTAR_CONTRATO_FIRMADO_2_1 =='1'){
$F_PADJUNTAR_CONTRATO_FIRMADO_2_11 = 'F_PADJUNTAR_CONTRATO_FIRMADO_2, ';
$F_PADJUNTAR_CONTRATO_FIRMADO_2_11t = 'CONTRATO FIRMADO, ';
}
if($F_PADJUNTAR_CONVENIOS_1 =='1'){
$F_PADJUNTAR_CONVENIOS_11 = 'F_PADJUNTAR_CONVENIOS, ';
$F_PADJUNTAR_CONVENIOS_11t = 'CONVENIOS, ';
}
if($ADJUNTAR_CONTRATO_INFORMACION_1 =='1'){
$ADJUNTAR_CONTRATO_INFORMACION_11 = 'ADJUNTAR_CONTRATO_INFORMACION, ';
$ADJUNTAR_CONTRATO_INFORMACION_11t = 'CONTRATO INFORMACION, ';
}
if($F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_1 =='1'){
$F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_11 = 'F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL, ';
$F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_11t = 'CONSTANCIA DE SITUACION FISCAL, ';
}
if($F_PADJUNTAR_OPINION_CUMPLIMIENTO_1 =='1'){
$F_PADJUNTAR_OPINION_CUMPLIMIENTO_11 = 'F_PADJUNTAR_OPINION_CUMPLIMIENTO, ';
$F_PADJUNTAR_OPINION_CUMPLIMIENTO_11t = 'OPINION CUMPLIMIENTO, ';
}
if($F_PADJUNTAR_REGIMEN_FISCAL_1 =='1'){
$F_PADJUNTAR_REGIMEN_FISCAL_11 = 'F_PADJUNTAR_REGIMEN_FISCAL, ';
$F_PADJUNTAR_REGIMEN_FISCAL_11t = 'REGIMEN FISCAL, ';
}
if($F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_1 =='1'){
$F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_11 = 'F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO, ';
$F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_11t = 'COMPROBANTE DE DOMICILIO, ';
}
if($F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_1 =='1'){
$F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_11 = 'F_PADJUNTAR_ESTADO_CUENTA_BANCARIO, ';
$F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_11t = 'ESTADO CUENTA BANCARIO, ';
}
if($F_PADJUNTAR_ACTA_CONSTITUTIVA_1 =='1'){
$F_PADJUNTAR_ACTA_CONSTITUTIVA_11 = 'F_PADJUNTAR_ACTA_CONSTITUTIVA, ';
$F_PADJUNTAR_ACTA_CONSTITUTIVA_11t = 'ACTA CONSTITUTIVA, ';
}
if($F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_1 =='1'){
$F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_11 = 'F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL, ';
$F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_11t = 'PODER NOTARIAL REPRESENTANTE LEGAL, ';
}
if($F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_1 =='1'){
$F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_11 = 'F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL, ';
$F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_11t = 'PADJUNTAR IDENTIFICACION REPRESENTANTE LEGAL, ';
}
	





$variablesTitulos =$F_PDESCARGAR_CONTRATO_PROVEEDORES_11t.
$F_PADJUNTAR_CONTRATO_FIRMADO_11t.
$F_PADJUNTAR_CONTRATO_FIRMADO_2_11t.
$F_PADJUNTAR_CONVENIOS_11t.
$ADJUNTAR_CONTRATO_INFORMACION_11t.
$F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_11t.
$F_PADJUNTAR_OPINION_CUMPLIMIENTO_11t.
$F_PADJUNTAR_REGIMEN_FISCAL_11t.
$F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_11t.
$F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_11t.
$F_PADJUNTAR_ACTA_CONSTITUTIVA_11t.
$F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_11t.
$F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_11t;
 $variablesTitulos1 =substr($variablesTitulos, 0, -2);



$variables =  $F_PDESCARGAR_CONTRATO_PROVEEDORES_11.
$F_PADJUNTAR_CONTRATO_FIRMADO_11.
$F_PADJUNTAR_CONTRATO_FIRMADO_2_11.
$F_PADJUNTAR_CONVENIOS_11.
$ADJUNTAR_CONTRATO_INFORMACION_11.
$F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL_11.
$F_PADJUNTAR_OPINION_CUMPLIMIENTO_11.
$F_PADJUNTAR_REGIMEN_FISCAL_11.
$F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO_11.
$F_PADJUNTAR_ESTADO_CUENTA_BANCARIO_11.
$F_PADJUNTAR_ACTA_CONSTITUTIVA_11.
$F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL_11.
$F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL_11;
 $cadenacompleta =substr($variables, 0, -2);

$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($DATOSPROVEE_ENVIAR_IMAIL=>$NOMBRE_1);


if(strlen($variables)>2){
$Subject = 'DATOS SOLICITADOS';
$idlogo = $proveedoresC->variable_comborelacion1a();
$logo = $proveedoresC->variables_informacionfiscal_logo($idlogo);
$embebida = array('../includes/archivos/'.$logo => 'ver');

$MANDA_INFORMACION = $proveedoresC->MANDA_INFORMACION($cadenacompleta,
$variablesTitulos1,
'02adjuntardocumentos', " where idRelacion = '".$_SESSION['idPROV']."' ");

$html = $proveedoresC->html2('DATOS DE INFORMACIÓN FISCAL',$MANDA_INFORMACION );


$adjuntos = $proveedoresC->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'02adjuntardocumentos', " where idRelacion = '".$_SESSION['idPROV']."' ".$query2 );
	
	echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject);

}else{
	echo "SELECCIONA UNA CASILLA PARA ENVIAR EMAIL";
}

}

elseif($hproveedorDE =='hproveedorDE'){
$array = isset($_POST['SELECCIONAPROVEEDOR'])?$_POST['SELECCIONAPROVEEDOR']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= $array[$rrr].$or1;
}
}
	echo $proveedoresC->PROVEEDORDE($query1);
}




$pasarD_text = isset($_POST['pasarD_text'])?$_POST['pasarD_text']:'';
if($pasarD_text =='si' or $pasarD_text =='no'){
$pasarDID = isset($_POST['pasarDID'])?$_POST['pasarDID']:'';
$proveedoresC->datos_bancario_default($pasarDID,$pasarD_text);
}







if($_FILES['F_PPRESENTACION'] OR $_FILES['F_PFOTOS_PRODUCTOS']){
	
	foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargarINFOPRODUCTOS($ETQIETA);
}

}elseif( $_FILES['F_PDESCARGAR_CONTRATO_PROVEEDORES'] OR  $_FILES['F_PADJUNTAR_CONTRATO_FIRMADO'] OR  $_FILES['F_PADJUNTAR_CONTRATO_FIRMADO_2'] OR  $_FILES['F_PADJUNTAR_CONVENIOS'] OR  $_FILES['F_PADJUNTAR_CONSTANCIA_DE_SITUACION_FISCAL'] OR  $_FILES['F_PADJUNTAR_OPINION_CUMPLIMIENTO'] OR $_FILES['F_PADJUNTAR_REGIMEN_FISCAL'] OR  $_FILES['F_PADJUNTAR_COMPROBANTE_DE_DOMICILIO'] OR  $_FILES['F_PADJUNTAR_ESTADO_CUENTA_BANCARIO'] OR  $_FILES['F_PADJUNTAR_ACTA_CONSTITUTIVA'] OR  $_FILES['F_PADJUNTAR_PODER_NOTARIAL_REPRESENTANTE_LEGAL'] OR $_FILES['F_PADJUNTAR_IDENTIFICACION_REPRESENTANTE_LEGAL'] OR  $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO'] OR  $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_1'] OR $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_2'] OR  $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_3'] OR  $_FILES['ADJUNTAR_CONTRATO_INFORMACION'] ){
	
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargarproveedor($ETQIETA);
}

}elseif($_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_4']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_5']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_6']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_7']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_8']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_9']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_10']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_11']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_12']  or $_FILES['F_PADJUNTAR_OTRO_DOCUMENTO_13']){
	foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargarOTROSDOCUMENTOS($ETQIETA);
}
}




$IPotrosproductosservp = isset($_POST["IPotrosproductosservp"])?$_POST["IPotrosproductosservp"]:"";
if($IPotrosproductosservp == true and ( $_FILES["PRODUCTO_O_SERVICIO_10"]) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargar($ETQIETA,'02otrosproveedores','3',$IPotrosproductosservp);
}	

}

$IPPRESSproductosservp = isset($_POST["IPPRESSproductosservp"])?$_POST["IPPRESSproductosservp"]:"";
if($IPPRESSproductosservp == true and ( $_FILES["PRESENTACION_VIDEO"]) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargar($ETQIETA,'02presentacionproduc','3',$IPPRESSproductosservp);
}	

}

$IPdatosbancario1p = isset($_POST["IPdatosbancario1p"])?$_POST["IPdatosbancario1p"]:"";
if($IPdatosbancario1p == true and ( $_FILES["FOTO_ESTADO_PROVEE"]) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargar($ETQIETA,'02DATOSBANCARIOS1','3',$IPdatosbancario1p);
}	

}

$IPotrosdocumentosservp = isset($_POST["IPotrosdocumentosservp"])?$_POST["IPotrosdocumentosservp"]:"";
if($IPotrosdocumentosservp == true and ( $_FILES["F_PADJUNTAR_OTRO_DOCUMENTO_5_1"]) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargar($ETQIETA,'02otrosdocumentos','3',$IPotrosdocumentosservp);
}	

}


$IPdocumentosfiscales = isset($_POST["IPdocumentosfiscales"])?$_POST["IPdocumentosfiscales"]:"";
if($IPdocumentosfiscales == true and ( $_FILES["ADJUNTAR_DOCUMENTO_LEGAL"]) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargar($ETQIETA,'02DOCUMENTOSFISCALES','3',$IPdocumentosfiscales);
}	

}


$IPcontactosproveedores = isset($_POST["IPcontactosproveedores"])?$_POST["IPcontactosproveedores"]:"";
if($IPcontactosproveedores == true and ( $_FILES["TARJETA_PRE"]) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $proveedoresC->cargar($ETQIETA,'02contactosprovee','3',$IPcontactosproveedores);
}	

}




?>