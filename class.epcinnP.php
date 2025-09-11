<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023

*/
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";	
	
/*
class listadoproveedores extends colaboradores{
		
	public function listado2(){
		$conn = $this->db();

		$var = 'select *,02usuarios.id AS IDDD from 02usuarios, 02direccionproveedor1, 02metodopago where 02usuarios.id = 02direccionproveedor1.idRelacion and 02usuarios.id = 02metodopago.idRelacion 
		order by 02usuarios.id desc';
		
		$query = mysqli_query($conn,$var);
		echo "<table class='table mb-0 table-striped'><tr>
		<td>usuario</td>
		<td>RAZÓN SOCIAL</td>
		<td>EFC</td>
		<td>EMAIL</td>
		<td>Masiva</td>

		</tr>";
		while($row = mysqli_fetch_array($query)){
			echo '<tr>
		<td><a href="PROVEEDORES.php?idPROV='.$row['IDDD'].'">'.$row['usuario'].'</a></td>
		<td>'.$row['nommbrerazon'].' '.$row['nommbrerazon'].'</td>
		<td>'.$row['rfc'].'</td>
		<td>'.$row['email'].'</td>
		<td>
		<a href="'. $_SERVER['PHP_SELF']. '?idr1='.$row['id1'].'" target="_blank"><img src="includes/descargar.png"/></a></td>
		</tr>';
		}
		echo "</table>";		
	}	


	public function variablesusuario2($id){
		$conn = $this->db();
		$var = 'select * from 02usuarios
		where id='.$id.' order by id desc ';
		$query = mysqli_query($conn,$var);
		return $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
	}
	
	
	


	public function variableusuario2(){
		$conn = $this->db();
		$variablequery = "select * from 02usuarios where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_usuario2($idp){
		$conn = $this->db();
		$var1 = 'select id from 02usuarios where id =  "'.$idp.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}


	public function revisar_02direccionproveedor1($idp){
		$conn = $this->db();
		$var1 = 'select id from 02direccionproveedor1 where idRelacion =  "'.$idp.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}
	

	public function revisar_02metodopago($RFC){
		$conn = $this->db();
		$var1 = 'select id from 02metodopago where P_RFC_MTDP =  "'.$RFC.'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}	
	



	public function guardar_usuario2 ($usuario , $nommbrerazon , $contrasenia , $email , $rfc ){

		$conn = $this->db();		
		//$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		


		$existe3 = $this->revisar_02metodopago($rfc);
		$idwebc ='';
		

			if($existe3>=1){
		mysqli_query($conn,"update 02metodopago set P_RFC_MTDP = '".$rfc."' where idRelacion = '".$existe3."' ; ") or die('P156'.mysqli_error($conn));
		return "Actualizado";
		$idwebc = $existe3;
		}else{
		mysqli_query($conn,"insert into 02metodopago 
		( P_RFC_MTDP, idRelacion) values 
		( '".$rfc."' ,  '".$idwebc."' ); ") or die('P160'.mysqli_error($conn));
		$idwebc = mysqli_insert_id($conn);
		return "Ingresado";
		}		

		$existe2 = $this->revisar_02direccionproveedor1($idwebc);
			$existe1 = $this->revisar_usuario2($idwebc);		
		
		if($existe2>=1){
		mysqli_query($conn,"update 02direccionproveedor1 set P_NOMBRE_COMERCIAL_EMPRESA = '".$nommbrerazon."' where idRelacion = '".$idwebc."' ; ") or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,"insert into 02direccionproveedor1 ( P_NOMBRE_COMERCIAL_EMPRESA, idRelacion) values ( '".$nommbrerazon."' ,  '".$idwebc."' ); ") or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}

	
			if($existe1>=1){
		mysqli_query($conn, "update 02usuarios set usuario = '".$usuario."' , nommbrerazon = '".$nommbrerazon."' , contrasenia = '".$contrasenia."' , email = '".$email."' where idRelacion = '".$idwebc."' ; ") or die('P156'.mysqli_error($conn));
		return "Actualizado";
		//$idwebc = $existe1;
		}else{
		mysqli_query($conn,"insert into 02usuarios ( usuario, nommbrerazon, contrasenia, email, idRelacion) values ( '".$usuario."' , '".$nommbrerazon."' , '".$contrasenia."' , '".$email."' ,  '".$idwebc."' ); ") or die('P160'.mysqli_error($conn));
		//$idwebc = mysqli_insert_id($conn);
		//return "Ingresado";
		}	
		
		//}		
	}

	}

	*/
	
	class accesoclase extends colaboradores{



	//*FOTOS DE PRODUCTOS//*
	public function variables_informacionfiscal_logo($identificador){
		$conn = $this->db();
		$variablequery = "select ADJUNTAR_LOGO_INFORMACION from 03docs_info_fiscal where idRelacion = '".$identificador."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['ADJUNTAR_LOGO_INFORMACION'];
		
	}
	
	
	

	public function variableotrosprouctos(){
		$conn = $this->db();
		$variablequery = "select * from 02otrosproveedores where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_otrosproductos(){
		$conn = $this->db();
		$var1 = 'select id from 02otrosproveedores where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function enviarOTROS_PRODUCTOS ( $PRODUCTO_O_SERVICIO_9 , $PRODUCTO_O_SERVICIO_10 , $PRODUCTO_O_SERVICIO_11 , $PRODUCTO_O_SERVICIO_12 , $PRODUCTO_O_SERVICIO_13 , $PRODUCTO_O_SERVICIO_14 , $PRODUCTO_O_SERVICIO_15 , $PRODUCTO_O_SERVICIO_16 , $PRODUCTO_O_SERVICIO_17 , $PRODUCTO_O_SERVICIO_18 , $PRODUCTO_O_SERVICIO_19 , $PRODUCTO_O_SERVICIO_20 , $ENVIARotrosproductosp,
	$IPotrosproductosservp ,$ENVIARotroservicios1){
		$conn = $this->db();
		$existe = $this->revisar_otrosproductos();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02otrosproveedores set PRODUCTO_O_SERVICIO_9 = '".$PRODUCTO_O_SERVICIO_9."' ,
		PRODUCTO_O_SERVICIO_11 = '".$PRODUCTO_O_SERVICIO_11."' , PRODUCTO_O_SERVICIO_12 = '".$PRODUCTO_O_SERVICIO_12."' , PRODUCTO_O_SERVICIO_13 = '".$PRODUCTO_O_SERVICIO_13."' , PRODUCTO_O_SERVICIO_14 = '".$PRODUCTO_O_SERVICIO_14."' , PRODUCTO_O_SERVICIO_15 = '".$PRODUCTO_O_SERVICIO_15."' , PRODUCTO_O_SERVICIO_16 = '".$PRODUCTO_O_SERVICIO_16."' , PRODUCTO_O_SERVICIO_17 = '".$PRODUCTO_O_SERVICIO_17."' , PRODUCTO_O_SERVICIO_18 = '".$PRODUCTO_O_SERVICIO_18."' , PRODUCTO_O_SERVICIO_19 = '".$PRODUCTO_O_SERVICIO_19."' , PRODUCTO_O_SERVICIO_20 = '".$PRODUCTO_O_SERVICIO_20."'  where id = '".$IPotrosproductosservp."' ; ";
		
		$var2 = "insert into 02otrosproveedores ( PRODUCTO_O_SERVICIO_9, PRODUCTO_O_SERVICIO_10, PRODUCTO_O_SERVICIO_11, PRODUCTO_O_SERVICIO_12, PRODUCTO_O_SERVICIO_13, PRODUCTO_O_SERVICIO_14, PRODUCTO_O_SERVICIO_15, PRODUCTO_O_SERVICIO_16, PRODUCTO_O_SERVICIO_17, PRODUCTO_O_SERVICIO_18, PRODUCTO_O_SERVICIO_19, PRODUCTO_O_SERVICIO_20, idRelacion) values ( '".$PRODUCTO_O_SERVICIO_9."' , '".$PRODUCTO_O_SERVICIO_10."' , '".$PRODUCTO_O_SERVICIO_11."' , '".$PRODUCTO_O_SERVICIO_12."' , '".$PRODUCTO_O_SERVICIO_13."' , '".$PRODUCTO_O_SERVICIO_14."' , '".$PRODUCTO_O_SERVICIO_15."' , '".$PRODUCTO_O_SERVICIO_16."' , '".$PRODUCTO_O_SERVICIO_17."' , '".$PRODUCTO_O_SERVICIO_18."' , '".$PRODUCTO_O_SERVICIO_19."' , '".$PRODUCTO_O_SERVICIO_20."' , '".$session."' );  ";		
			
		if($ENVIARotroservicios1=='ENVIARotroservicios1'){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadootrosproductosyserv(){
		$conn = $this->db();

		$variablequery = "select * from 02otrosproveedores where idRelacion = '".$_SESSION['idPROV']."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function listadootrosproductosyserv2($id){
		$conn = $this->db();
		$variablequery = "select * from 02otrosproveedores  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function borraotrosservicios($id){
		$conn = $this->db();
		$variablequery = "delete from 02otrosproveedores where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
		






	
	//*LIGA DE PRODUCTOS//*
	public function variable_ligaproductos(){
		$conn = $this->db();
		$variablequery = "select * from 02ligaproveedor where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_ligaproductos(){
		$conn = $this->db();
		$var1 = 'select id from 02ligaproveedor where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function enviarligaPROD ($PRODUCTO_O_SERVICIO_LIGA , $PRODUCTO_SERVICIO_LIGA , $LIGA_SERVICIO_OBSERVACIONES , $ULTIMA_CARGA_LIGA , $hLIGA_PRODUCTOS, $IPLIGAproductosservp ,$ENVIARLIGAervicios1){
		$conn = $this->db();
		$existe = $this->revisar_ligaproductos();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02ligaproveedor set PRODUCTO_O_SERVICIO_LIGA = '".$PRODUCTO_O_SERVICIO_LIGA."' ,PRODUCTO_SERVICIO_LIGA = '".$PRODUCTO_SERVICIO_LIGA."' ,  LIGA_SERVICIO_OBSERVACIONES = '".$LIGA_SERVICIO_OBSERVACIONES."' , ULTIMA_CARGA_LIGA = '".$ULTIMA_CARGA_LIGA."' , hLIGA_PRODUCTOS = '".$hLIGA_PRODUCTOS."' where id = '".$IPLIGAproductosservp."' ; ";
		//ENVIAR_EMAIL_LIGA
		$var2 = "insert into 02ligaproveedor (PRODUCTO_O_SERVICIO_LIGA   , PRODUCTO_SERVICIO_LIGA   , LIGA_SERVICIO_OBSERVACIONES , ULTIMA_CARGA_LIGA  , hLIGA_PRODUCTOS, idRelacion )values('".$PRODUCTO_O_SERVICIO_LIGA."','".$PRODUCTO_SERVICIO_LIGA."','".$LIGA_SERVICIO_OBSERVACIONES."','".$ULTIMA_CARGA_LIGA."' , '".$hLIGA_PRODUCTOS."' , '".$_SESSION['idPROV']."');  ";		
			
		if($ENVIARLIGAervicios1=='ENVIARLIGAervicios1'){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadoligaproductosyserv(){
		$conn = $this->db();

		$variablequery = "select * from 02ligaproveedor where idRelacion =  '".$_SESSION['idPROV']."'  order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadoligaproductosyserv2($id){
		$conn = $this->db();
		$variablequery = "select * from 02ligaproveedor  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borraLIGAservicios($id){
		$conn = $this->db();
		$variablequery = "delete from 02ligaproveedor where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	
	
	
	
	
		
	
	
	
	
		//*PRESENTACION  DE PRODUCTOS//*
	

	public function variable_presentacionpro(){
		$conn = $this->db();
		$variablequery = "select * from 02presentacionproduc where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_presentacionpro(){
		$conn = $this->db();
		$var1 = 'select id from 02presentacionproduc where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function enviarPRESENTAP ($PRODUCTO_PRESENTA ,$PRESENTACION_VIDEO, $PRESENTACION_OBSERVACIONES , $PRODUCTO_PRESENTACION_FECHA , $IPPRESSproductosservp ,$ENVIApresenervicios1 ){
		$conn = $this->db();
		$existe = $this->revisar_presentacionpro();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			//PRESENTACION_VIDEO
		$var1 = "update 02presentacionproduc set PRODUCTO_PRESENTA = '".$PRODUCTO_PRESENTA."' ,
		
		PRESENTACION_OBSERVACIONES = '".$PRESENTACION_OBSERVACIONES."' , PRODUCTO_PRESENTACION_FECHA = '".$PRODUCTO_PRESENTACION_FECHA."' where id = '".$IPPRESSproductosservp."' ; ";
	
		$var2 = "insert into 02presentacionproduc  ( PRODUCTO_PRESENTA, PRESENTACION_VIDEO ,PRESENTACION_OBSERVACIONES, PRODUCTO_PRESENTACION_FECHA, idRelacion) values ( '".$PRODUCTO_PRESENTA."' , '".$PRESENTACION_VIDEO."' , '".$PRESENTACION_OBSERVACIONES."' , '".$PRODUCTO_PRESENTACION_FECHA."' , '".$_SESSION['idPROV']."');  ";	
			
		if($ENVIApresenervicios1=='ENVIApresenervicios1'){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadopresentaproductosyserv(){
		$conn = $this->db();

		$variablequery = "select * from 02presentacionproduc where idRelacion =  '".$_SESSION['idPROV']."'  order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadopresentaproductosyserv2($id){
		$conn = $this->db();
		$variablequery = "select * from 02presentacionproduc  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borrapreseservicios($id){
		$conn = $this->db();
		$variablequery = "delete from 02presentacionproduc where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	
	



			//*NUEVO DOCUMENTO//*

	public function variable_nuevodocumentotodos(){
		$conn = $this->db();
		$variablequery = "select * from 02NUEVODOCUMENTO order by id desc";
		return $arrayquery = mysqli_query($conn,$variablequery);
		// $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}
	

	public function variable_nuevodocumento(){
		$conn = $this->db();
		$variablequery = "select * from 02NUEVODOCUMENTO where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_nuevodocumento(){
		$conn = $this->db();
		$var1 = 'select id from 02NUEVODOCUMENTO where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function nuevodocumento ($nuevo_documento , $DOCUMENTO_FISCAL,$enviarnuevo_FISCAL,$IPnuevodocumento){
		$conn = $this->db();
		$existe = $this->revisar_nuevodocumento();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02NUEVODOCUMENTO set  nuevo_documento = '".$nuevo_documento."' , DOCUMENTO_FISCAL = '".$DOCUMENTO_FISCAL."' where id = '".$IPnuevodocumento."' ; ";
	
		$var2 = "insert into 02NUEVODOCUMENTO  (nuevo_documento, DOCUMENTO_FISCAL, idRelacion) values ( '".$nuevo_documento."' , '".$DOCUMENTO_FISCAL."' , '".$session."');  ";	
			
		if($enviarnuevo_FISCAL=='enviarnuevo_FISCAL'){	

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadoNUEVODOCUMENTO(){
		$conn = $this->db();

		$variablequery = "select * from 02NUEVODOCUMENTO order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadoNUEVODOCUMENTO2($id){
		$conn = $this->db();
		$variablequery = "select * from 02NUEVODOCUMENTO  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function BORRARNUEVOFISCAL($id){
		$conn = $this->db();
		$variablequery = "delete from 02NUEVODOCUMENTO where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
	
		//*documentos legales del proveedor//*
	

	public function variable_documentosfiscales(){
		$conn = $this->db();
		$variablequery = "select * from 02DOCUMENTOSFISCALES where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_documentosfiscales(){
		$conn = $this->db();
		$var1 = 'select id from 02DOCUMENTOSFISCALES where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}


	public function documentofiscal ($DOCUMENTO_LEGAL ,$ADJUNTAR_DOCUMENTO_LEGAL, $ADJUNTAR_DOCUMENTO_OBSERVACIONES , $FECHA_ULTIMA_DOCUMEN , $validaDOCUMENTOSFISCAL,$IPdocumentosfiscales,$ENVIAFISCAL){
		$conn = $this->db();
		$existe = $this->revisar_documentosfiscales();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			////ENVIAFISCAL
		$var1 = "update 02DOCUMENTOSFISCALES set  
		DOCUMENTO_LEGAL = '".$DOCUMENTO_LEGAL."' ,
		ADJUNTAR_DOCUMENTO_OBSERVACIONES = '".$ADJUNTAR_DOCUMENTO_OBSERVACIONES."' ,
		FECHA_ULTIMA_DOCUMEN = '".$FECHA_ULTIMA_DOCUMEN."' where id = '".$IPdocumentosfiscales."' ; ";
	
		$var2 = "insert into 02DOCUMENTOSFISCALES  (DOCUMENTO_LEGAL,ADJUNTAR_DOCUMENTO_LEGAL, ADJUNTAR_DOCUMENTO_OBSERVACIONES, FECHA_ULTIMA_DOCUMEN, idRelacion) values ( '".$DOCUMENTO_LEGAL."' , '".$ADJUNTAR_DOCUMENTO_LEGAL."' , '".$ADJUNTAR_DOCUMENTO_OBSERVACIONES."' , '".$FECHA_ULTIMA_DOCUMEN."' , '".$session."');  ";	
			
		if($ENVIAFISCAL=='ENVIAFISCAL'){	

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadoDOCUMENTOSFISCALES(){
		$conn = $this->db();

		$variablequery = "select * from 02DOCUMENTOSFISCALES where idRelacion =  '".$_SESSION['idPROV']."'  order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadoDOCUMENTOSFISCALES2($id){
		$conn = $this->db();
		$variablequery = "select * from 02DOCUMENTOSFISCALES  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borradocufiscal($id){
		$conn = $this->db();
		$variablequery = "delete from 02DOCUMENTOSFISCALES where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

/* DIRECCION PROVEEDOR*/ 


	public function variable_DIRECCIONP1(){
		$conn = $this->db();
		$variablequery = "select * from 02direccionproveedor1 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_DIRECCIONP1(){
		$conn = $this->db();
		$var1 = 'select id from 02direccionproveedor1 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function direccionproveedor1 ($P_NOMBRE_COMERCIAL_EMPRESA , $P_NOMBRE_FISCAL_RS_EMPRESA ,$P_RFC_MTDP , $P_REGIMEN_FISCAL_MTDP , $_P_METODO_DE_PAGO , $P_FORMADE_PAGO , $P_USO_CFDI ,$FISICA_MORAL,$P_DIRECCION_FISCAL_EMPRESA , $P_EDIFICIO_EMPRESA , $P_CALLE_EMPRESA , $P_NUMERO_EXTERIOR_EMPRESA , $P_NUMERO_INTERIOR_EMPRESA , $P_NUMERO_OFICINA_EMPRESA , $P_COLONIA_EMPRESA , $P_ALCALDIA_EMPRESA , $P_C_P_EMPRESA , $P_CIUDAD_EMPRESA , $P_ESTADO_EMPRESA , $P_PAIS_EMPRESA , $dircasa11 , $P_UBICACION_MAPA_1 , $P_TELEFONO_1_EMPRESA , $P_TELEFONO_2_EMPRESA , $P_WHATSAPP_EMPRESA_1 , $P_IMAIL_EMPRESA , $P_PAGINA_WEB_EMPRESA , $P_NOMBRE_APP_EMPRESA ){
		$conn = $this->db();
		$existe = $this->revisar_DIRECCIONP1();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02direccionproveedor1 set P_NOMBRE_COMERCIAL_EMPRESA = '".$P_NOMBRE_COMERCIAL_EMPRESA."' , P_NOMBRE_FISCAL_RS_EMPRESA = '".$P_NOMBRE_FISCAL_RS_EMPRESA."' ,P_RFC_MTDP = '".$P_RFC_MTDP."' , P_REGIMEN_FISCAL_MTDP = '".$P_REGIMEN_FISCAL_MTDP."' , _P_METODO_DE_PAGO = '".$_P_METODO_DE_PAGO."' , P_FORMADE_PAGO = '".$P_FORMADE_PAGO."' , P_USO_CFDI = '".$P_USO_CFDI."' , FISICA_MORAL = '".$FISICA_MORAL."' , P_DIRECCION_FISCAL_EMPRESA = '".$P_DIRECCION_FISCAL_EMPRESA."' , P_EDIFICIO_EMPRESA = '".$P_EDIFICIO_EMPRESA."' , P_CALLE_EMPRESA = '".$P_CALLE_EMPRESA."' , P_NUMERO_EXTERIOR_EMPRESA = '".$P_NUMERO_EXTERIOR_EMPRESA."' , P_NUMERO_INTERIOR_EMPRESA = '".$P_NUMERO_INTERIOR_EMPRESA."' , P_NUMERO_OFICINA_EMPRESA = '".$P_NUMERO_OFICINA_EMPRESA."' , P_COLONIA_EMPRESA = '".$P_COLONIA_EMPRESA."' , P_ALCALDIA_EMPRESA = '".$P_ALCALDIA_EMPRESA."' , P_C_P_EMPRESA = '".$P_C_P_EMPRESA."' , P_CIUDAD_EMPRESA = '".$P_CIUDAD_EMPRESA."' , P_ESTADO_EMPRESA = '".$P_ESTADO_EMPRESA."' , P_PAIS_EMPRESA = '".$P_PAIS_EMPRESA."' , dircasa11 = '".$dircasa11."' , P_UBICACION_MAPA_1 = '".$P_UBICACION_MAPA_1."' , P_TELEFONO_1_EMPRESA = '".$P_TELEFONO_1_EMPRESA."' , P_TELEFONO_2_EMPRESA = '".$P_TELEFONO_2_EMPRESA."' , P_WHATSAPP_EMPRESA_1 = '".$P_WHATSAPP_EMPRESA_1."' , P_IMAIL_EMPRESA = '".$P_IMAIL_EMPRESA."' , P_PAGINA_WEB_EMPRESA = '".$P_PAGINA_WEB_EMPRESA."' , P_NOMBRE_APP_EMPRESA = '".$P_NOMBRE_APP_EMPRESA."' where idRelacion = '".$session."' ; ";
		//FISICA_MORAL
		$var2 = "insert into 02direccionproveedor1  ( 
		P_NOMBRE_COMERCIAL_EMPRESA, P_NOMBRE_FISCAL_RS_EMPRESA, P_RFC_MTDP,
		P_REGIMEN_FISCAL_MTDP, _P_METODO_DE_PAGO, P_FORMADE_PAGO, 
		P_USO_CFDI, FISICA_MORAL, P_DIRECCION_FISCAL_EMPRESA, 
		P_EDIFICIO_EMPRESA, P_CALLE_EMPRESA, P_NUMERO_EXTERIOR_EMPRESA, P_NUMERO_INTERIOR_EMPRESA, P_NUMERO_OFICINA_EMPRESA, P_COLONIA_EMPRESA, P_ALCALDIA_EMPRESA, P_C_P_EMPRESA, P_CIUDAD_EMPRESA, 
		P_ESTADO_EMPRESA, P_PAIS_EMPRESA, dircasa11, 
		P_UBICACION_MAPA_1, P_TELEFONO_1_EMPRESA, P_TELEFONO_2_EMPRESA,
		P_WHATSAPP_EMPRESA_1, P_IMAIL_EMPRESA, P_PAGINA_WEB_EMPRESA, P_NOMBRE_APP_EMPRESA, idRelacion) values ( 
		'".$P_NOMBRE_COMERCIAL_EMPRESA."' , '".$P_NOMBRE_FISCAL_RS_EMPRESA."' , '". $P_RFC_MTDP."' , 
		'".$P_REGIMEN_FISCAL_MTDP."' , '".$_P_METODO_DE_PAGO."' , '".$P_FORMADE_PAGO."' ,
		'".$P_USO_CFDI."' , '".$FISICA_MORAL."', '".$P_DIRECCION_FISCAL_EMPRESA."' , 
		'".$P_EDIFICIO_EMPRESA."' , '".$P_CALLE_EMPRESA."' , '".$P_NUMERO_EXTERIOR_EMPRESA."' , 
		'".$P_NUMERO_INTERIOR_EMPRESA."' , '".$P_NUMERO_OFICINA_EMPRESA."' , '".$P_COLONIA_EMPRESA."' , 
		'".$P_ALCALDIA_EMPRESA."' , '".$P_C_P_EMPRESA."' , '".$P_CIUDAD_EMPRESA."' , 
		'".$P_ESTADO_EMPRESA."' , '".$P_PAIS_EMPRESA."' , '".$dircasa11."' , 
		'".$P_UBICACION_MAPA_1."' , '".$P_TELEFONO_1_EMPRESA."' ,'".$P_TELEFONO_2_EMPRESA."' , 
		'".$P_WHATSAPP_EMPRESA_1."' , '".$P_IMAIL_EMPRESA."' ,'".$P_PAGINA_WEB_EMPRESA."' ,
		'".$P_NOMBRE_APP_EMPRESA."' , '".$session."' );  ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}



/* metodo pago*/ 


	public function variable_metodopagoproveedor(){
		$conn = $this->db();
		$variablequery = "select * from 02metodopago where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_metodopagoproveedor(){
		$conn = $this->db();
		$var1 = 'select id from 02metodopago where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function metodopagoproveedor ($P_CONDICIONES_DE_PAGO , $P_LIMITE_DE_CREDITO , $P_FECHA_INICIO_NUEVO_CONVENIO , $P_FECHA_FINALIZACION_CONVENIO , $P_PORCENTAJE_COMISION_OTORGA ){
		$conn = $this->db();
		$existe = $this->revisar_metodopagoproveedor();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02metodopago set  P_CONDICIONES_DE_PAGO = '".$P_CONDICIONES_DE_PAGO."' , P_LIMITE_DE_CREDITO = '".$P_LIMITE_DE_CREDITO."' , P_FECHA_INICIO_NUEVO_CONVENIO = '".$P_FECHA_INICIO_NUEVO_CONVENIO."' , P_FECHA_FINALIZACION_CONVENIO = '".$P_FECHA_FINALIZACION_CONVENIO."' , P_PORCENTAJE_COMISION_OTORGA = '".$P_PORCENTAJE_COMISION_OTORGA."' , VALIDAMETODOPAGO = '".$VALIDAMETODOPAGO."' where idRelacion = '".$session."' ; ";
		
		$var2 = "insert into 02metodopago (  P_CONDICIONES_DE_PAGO, P_LIMITE_DE_CREDITO, P_FECHA_INICIO_NUEVO_CONVENIO, P_FECHA_FINALIZACION_CONVENIO, P_PORCENTAJE_COMISION_OTORGA, idRelacion) values ( '".$P_CONDICIONES_DE_PAGO."' , '".$P_LIMITE_DE_CREDITO."' , '".$P_FECHA_INICIO_NUEVO_CONVENIO."' , '".$P_FECHA_FINALIZACION_CONVENIO."' , '".$P_PORCENTAJE_COMISION_OTORGA."' , '".$session."' );  ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}


/* contacto  proveedor*/ 


	public function variable_contactosPRO(){
		$conn = $this->db();
		$variablequery = "select * from 02contactosprovee where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_contactosPRO(){
		$conn = $this->db();
		$var1 = 'select id from 02contactosprovee where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function enviarNOMBRECONTACTO1 ($DEPARTAMENTO_CONTACTO , $NOMBRE_CONTACTO_PROVEE ,$CEL_CONTACTO_PROVEE, $TELEFONO_CONTACPROVEE ,   $NUMERO_EXTENSION_PROVEE ,$EMAIL_CONTACTO_PROVEE, $OBSERVACIONES_PROVEE , $FECHA_CONTACTOS_PROVEE , $TARJETA_PRE,$validaNOMBRECONTACTO1,$IPcontactosproveedores,$ENVIACONTACTPRO){
		$conn = $this->db();
		$existe = $this->revisar_contactosPRO();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02contactosprovee set DEPARTAMENTO_CONTACTO = '".$DEPARTAMENTO_CONTACTO."' , NOMBRE_CONTACTO_PROVEE = '".$NOMBRE_CONTACTO_PROVEE."' ,CEL_CONTACTO_PROVEE = '".$CEL_CONTACTO_PROVEE."' , TELEFONO_CONTACPROVEE = '".$TELEFONO_CONTACPROVEE."' , EMAIL_CONTACTO_PROVEE = '".$EMAIL_CONTACTO_PROVEE."' , NUMERO_EXTENSION_PROVEE = '".$NUMERO_EXTENSION_PROVEE."' , OBSERVACIONES_PROVEE = '".$OBSERVACIONES_PROVEE."' , FECHA_CONTACTOS_PROVEE = '".$FECHA_CONTACTOS_PROVEE."' , TARJETA_PRE = '".$TARJETA_PRE."' ,  validaNOMBRECONTACTO1 = '".$validaNOMBRECONTACTO1."' where id = '".$IPcontactosproveedores."' ; ";


		$var2 = "insert into 02contactosprovee  (DEPARTAMENTO_CONTACTO, NOMBRE_CONTACTO_PROVEE,CEL_CONTACTO_PROVEE,  TELEFONO_CONTACPROVEE, EMAIL_CONTACTO_PROVEE, NUMERO_EXTENSION_PROVEE, OBSERVACIONES_PROVEE, FECHA_CONTACTOS_PROVEE,TARJETA_PRE, validaNOMBRECONTACTO1, idRelacion) values ( '".$DEPARTAMENTO_CONTACTO."' , '".$NOMBRE_CONTACTO_PROVEE."' , '".$CEL_CONTACTO_PROVEE."' , '".$TELEFONO_CONTACPROVEE."' , '".$EMAIL_CONTACTO_PROVEE."' , '".$NUMERO_EXTENSION_PROVEE."' , '".$OBSERVACIONES_PROVEE."' , '".$FECHA_CONTACTOS_PROVEE."' , '".$TARJETA_PRE."' , '".$validaNOMBRECONTACTO1."' , '".$_SESSION['idPROV']."');  ";		
			
		if($ENVIACONTACTPRO=='ENVIACONTACTPRO'){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadocontactospro(){
		$conn = $this->db();

		$variablequery = "select * from 02contactosprovee  where idRelacion = '".$_SESSION['idPROV']."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadocontactospro2($id){
		$conn = $this->db();
		$variablequery = "select * from 02contactosprovee  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borracontactprovee($id){
		$conn = $this->db();
		$variablequery = "delete from 02contactosprovee where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	

/* contacto ventas proveedor 2*/ 


	public function variable_contactoventasP2(){
		$conn = $this->db();
		$variablequery = "select * from 02contacto_ventas2 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_contactoventasP2(){
		$conn = $this->db();
		$var1 = 'select id from 02contacto_ventas2 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function contactoventasproveedor2 ($P_NOMBRE_DEL_CONTACTO_CF , $P_NOMBRE_DEL_CONTACTO_NP , $P_NOMBRE_DEL_CONTACTO_EDE , $P_NUMERO_CEL_CONTACTO_CF , $P_NUMERO_CEL_CONTACTO_NP , $P_NUMERO_CEL_CONTACTO_EDE , $P_NUMERO_OFICINA_CF , $P_NUMERO_OFICINA_NP , $P_NUMERO_OFICINA_EDE , $P_NUMERO_EXTENSION_CF , $P_NUMERO_EXTENSION_NP , $P_NUMERO_EXTENSION_EDE , $P_IMAIL_CONTACTO_CF , $P_IMAIL_CONTACTO_NP , $P_IMAIL_CONTACTO_EDE  ){
		$conn = $this->db();
		$existe = $this->revisar_contactoventasP2();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02contacto_ventas2 set P_NOMBRE_DEL_CONTACTO_CF = '".$P_NOMBRE_DEL_CONTACTO_CF."' , P_NOMBRE_DEL_CONTACTO_NP = '".$P_NOMBRE_DEL_CONTACTO_NP."' , P_NOMBRE_DEL_CONTACTO_EDE = '".$P_NOMBRE_DEL_CONTACTO_EDE."' , P_NUMERO_CEL_CONTACTO_CF = '".$P_NUMERO_CEL_CONTACTO_CF."' , P_NUMERO_CEL_CONTACTO_NP = '".$P_NUMERO_CEL_CONTACTO_NP."' , P_NUMERO_CEL_CONTACTO_EDE = '".$P_NUMERO_CEL_CONTACTO_EDE."' , P_NUMERO_OFICINA_CF = '".$P_NUMERO_OFICINA_CF."' , P_NUMERO_OFICINA_NP = '".$P_NUMERO_OFICINA_NP."' , P_NUMERO_OFICINA_EDE = '".$P_NUMERO_OFICINA_EDE."' , P_NUMERO_EXTENSION_CF = '".$P_NUMERO_EXTENSION_CF."' , P_NUMERO_EXTENSION_NP = '".$P_NUMERO_EXTENSION_NP."' , P_NUMERO_EXTENSION_EDE = '".$P_NUMERO_EXTENSION_EDE."' , P_IMAIL_CONTACTO_CF = '".$P_IMAIL_CONTACTO_CF."' , P_IMAIL_CONTACTO_NP = '".$P_IMAIL_CONTACTO_NP."' , P_IMAIL_CONTACTO_EDE = '".$P_IMAIL_CONTACTO_EDE."' where idRelacion = '".$session."' ; ";
		
		$var2 = "insert into 02contacto_ventas2 ( P_NOMBRE_DEL_CONTACTO_CF, P_NOMBRE_DEL_CONTACTO_NP, P_NOMBRE_DEL_CONTACTO_EDE, P_NUMERO_CEL_CONTACTO_CF, P_NUMERO_CEL_CONTACTO_NP, P_NUMERO_CEL_CONTACTO_EDE, P_NUMERO_OFICINA_CF, P_NUMERO_OFICINA_NP, P_NUMERO_OFICINA_EDE, P_NUMERO_EXTENSION_CF, P_NUMERO_EXTENSION_NP, P_NUMERO_EXTENSION_EDE, P_IMAIL_CONTACTO_CF, P_IMAIL_CONTACTO_NP, P_IMAIL_CONTACTO_EDE, idRelacion) values ( '".$P_NOMBRE_DEL_CONTACTO_CF."' , '".$P_NOMBRE_DEL_CONTACTO_NP."' , '".$P_NOMBRE_DEL_CONTACTO_EDE."' , '".$P_NUMERO_CEL_CONTACTO_CF."' , '".$P_NUMERO_CEL_CONTACTO_NP."' , '".$P_NUMERO_CEL_CONTACTO_EDE."' , '".$P_NUMERO_OFICINA_CF."' , '".$P_NUMERO_OFICINA_NP."' , '".$P_NUMERO_OFICINA_EDE."' , '".$P_NUMERO_EXTENSION_CF."' , '".$P_NUMERO_EXTENSION_NP."' , '".$P_NUMERO_EXTENSION_EDE."' , '".$P_IMAIL_CONTACTO_CF."' , '".$P_IMAIL_CONTACTO_NP."' , '".$P_IMAIL_CONTACTO_EDE."' , '".$session."' ); ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}		
	}


/* contacto ventas proveedor 3*/ 


	public function variable_contactoventasP3(){
		$conn = $this->db();
		$variablequery = "select * from 02contacto_ventas3 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_contactoventasP3(){
		$conn = $this->db();
		$var1 = 'select id from 02contacto_ventas3 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function contactoventasproveedor3 ( $P_NOMBRE_DEL_CONTACTO_CF_2 , $P_NOMBRE_DEL_CONTACTO_NP_2 , $P_NOMBRE_DEL_CONTACTO_EDE_2 , $P_NUMERO_CEL_CONTACTO_CF_2 , $P_NUMERO_CEL_CONTACTO_NP_2 , $P_NUMERO_CEL_CONTACTO_EDE_2 , $P_NUMERO_OFICINA_CF_2 , $P_NUMERO_OFICINA_NP_2 , $P_NUMERO_OFICINA_EDE_2 , $P_NUMERO_EXTENSION_CF_2 , $P_NUMERO_EXTENSION_NP_2 , $P_NUMERO_EXTENSION_EDE_2 , $P_IMAIL_CONTACTO_CF_2 , $P_IMAIL_CONTACTO_NP_2 , $P_IMAIL_CONTACTO_EDE_2  ){
		$conn = $this->db();
		$existe = $this->revisar_contactoventasP3();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02contacto_ventas3 set P_NOMBRE_DEL_CONTACTO_CF_2 = '".$P_NOMBRE_DEL_CONTACTO_CF_2."' , P_NOMBRE_DEL_CONTACTO_NP_2 = '".$P_NOMBRE_DEL_CONTACTO_NP_2."' , P_NOMBRE_DEL_CONTACTO_EDE_2 = '".$P_NOMBRE_DEL_CONTACTO_EDE_2."' , P_NUMERO_CEL_CONTACTO_CF_2 = '".$P_NUMERO_CEL_CONTACTO_CF_2."' , P_NUMERO_CEL_CONTACTO_NP_2 = '".$P_NUMERO_CEL_CONTACTO_NP_2."' , P_NUMERO_CEL_CONTACTO_EDE_2 = '".$P_NUMERO_CEL_CONTACTO_EDE_2."' , P_NUMERO_OFICINA_CF_2 = '".$P_NUMERO_OFICINA_CF_2."' , P_NUMERO_OFICINA_NP_2 = '".$P_NUMERO_OFICINA_NP_2."' , P_NUMERO_OFICINA_EDE_2 = '".$P_NUMERO_OFICINA_EDE_2."' , P_NUMERO_EXTENSION_CF_2 = '".$P_NUMERO_EXTENSION_CF_2."' , P_NUMERO_EXTENSION_NP_2 = '".$P_NUMERO_EXTENSION_NP_2."' , P_NUMERO_EXTENSION_EDE_2 = '".$P_NUMERO_EXTENSION_EDE_2."' , P_IMAIL_CONTACTO_CF_2 = '".$P_IMAIL_CONTACTO_CF_2."' , P_IMAIL_CONTACTO_NP_2 = '".$P_IMAIL_CONTACTO_NP_2."' , P_IMAIL_CONTACTO_EDE_2 = '".$P_IMAIL_CONTACTO_EDE_2."' where idRelacion = '".$session."' ; ";
		
		$var2 = "insert into 02contacto_ventas3 ( P_NOMBRE_DEL_CONTACTO_CF_2, P_NOMBRE_DEL_CONTACTO_NP_2, P_NOMBRE_DEL_CONTACTO_EDE_2, P_NUMERO_CEL_CONTACTO_CF_2, P_NUMERO_CEL_CONTACTO_NP_2, P_NUMERO_CEL_CONTACTO_EDE_2, P_NUMERO_OFICINA_CF_2, P_NUMERO_OFICINA_NP_2, P_NUMERO_OFICINA_EDE_2, P_NUMERO_EXTENSION_CF_2, P_NUMERO_EXTENSION_NP_2, P_NUMERO_EXTENSION_EDE_2, P_IMAIL_CONTACTO_CF_2, P_IMAIL_CONTACTO_NP_2, P_IMAIL_CONTACTO_EDE_2, idRelacion) values ( '".$P_NOMBRE_DEL_CONTACTO_CF_2."' , '".$P_NOMBRE_DEL_CONTACTO_NP_2."' , '".$P_NOMBRE_DEL_CONTACTO_EDE_2."' , '".$P_NUMERO_CEL_CONTACTO_CF_2."' , '".$P_NUMERO_CEL_CONTACTO_NP_2."' , '".$P_NUMERO_CEL_CONTACTO_EDE_2."' , '".$P_NUMERO_OFICINA_CF_2."' , '".$P_NUMERO_OFICINA_NP_2."' , '".$P_NUMERO_OFICINA_EDE_2."' , '".$P_NUMERO_EXTENSION_CF_2."' , '".$P_NUMERO_EXTENSION_NP_2."' , '".$P_NUMERO_EXTENSION_EDE_2."' , '".$P_IMAIL_CONTACTO_CF_2."' , '".$P_IMAIL_CONTACTO_NP_2."' , '".$P_IMAIL_CONTACTO_EDE_2."' , '".$session."' ); ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}		
	}



/* informacion de productos o servicios */ 


	public function variable_productosservicios(){
		$conn = $this->db();
		$variablequery = "select * from 02productosservicios where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_productosservicios(){
		$conn = $this->db();
		$var1 = 'select id from 02productosservicios where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function productosservicios2  ( $PROVEEDOR_DE_EPC , $PROVEEDOR_DE_INNOVAC , $PROVEEDOR_DE_JUST , $CALIFICACIONPSG , $CALIFICACION_TR , $MOTIVO_CALIFICACION , $CIUDAD_SERVICIO , $PAIS_SERVICIO , $PFECHA_ULTIMACOMPRA , $PFECHA_ACTUA_DOCUM , $PCONTACTADO_POR , $P_OTRO , $PLIGA_FOTOS_VIDEOS , $PRODUCTO_O_SERVICIO , $PRODUCTO_O_SERVICIO_2 , $PRODUCTO_O_SERVICIO_3 , $PRODUCTO_O_SERVICIO_4 , $PRODUCTO_O_SERVICIO_5 , $PRODUCTO_O_SERVICIO_6 , $PRODUCTO_O_SERVICIO_7 , $PRODUCTO_O_SERVICIO_8){
		$conn = $this->db();
		$existe = $this->revisar_productosservicios();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02productosservicios set PROVEEDOR_DE_EPC = '".$PROVEEDOR_DE_EPC."' , PROVEEDOR_DE_INNOVAC = '".$PROVEEDOR_DE_INNOVAC."' , PROVEEDOR_DE_JUST = '".$PROVEEDOR_DE_JUST."' , CALIFICACIONPSG = '".$CALIFICACIONPSG."' , CALIFICACION_TR = '".$CALIFICACION_TR."' , MOTIVO_CALIFICACION = '".$MOTIVO_CALIFICACION."' , CIUDAD_SERVICIO = '".$CIUDAD_SERVICIO."' , PAIS_SERVICIO = '".$PAIS_SERVICIO."' , PFECHA_ULTIMACOMPRA = '".$PFECHA_ULTIMACOMPRA."' , PFECHA_ACTUA_DOCUM = '".$PFECHA_ACTUA_DOCUM."' , PCONTACTADO_POR = '".$PCONTACTADO_POR."' , P_OTRO = '".$P_OTRO."' , PLIGA_FOTOS_VIDEOS = '".$PLIGA_FOTOS_VIDEOS."' , PRODUCTO_O_SERVICIO = '".$PRODUCTO_O_SERVICIO."' , PRODUCTO_O_SERVICIO_2 = '".$PRODUCTO_O_SERVICIO_2."' , PRODUCTO_O_SERVICIO_3 = '".$PRODUCTO_O_SERVICIO_3."' , PRODUCTO_O_SERVICIO_4 = '".$PRODUCTO_O_SERVICIO_4."' , PRODUCTO_O_SERVICIO_5 = '".$PRODUCTO_O_SERVICIO_5."' , PRODUCTO_O_SERVICIO_6 = '".$PRODUCTO_O_SERVICIO_6."' , PRODUCTO_O_SERVICIO_7 = '".$PRODUCTO_O_SERVICIO_7."' , PRODUCTO_O_SERVICIO_8 = '".$PRODUCTO_O_SERVICIO_8."' where idRelacion = '".$session."' ; ";
		
		$var2 = "insert into 02productosservicios ( PROVEEDOR_DE_EPC, PROVEEDOR_DE_INNOVAC, PROVEEDOR_DE_JUST, CALIFICACIONPSG, CALIFICACION_TR, MOTIVO_CALIFICACION, CIUDAD_SERVICIO, PAIS_SERVICIO, PFECHA_ULTIMACOMPRA, PFECHA_ACTUA_DOCUM, PCONTACTADO_POR, P_OTRO, PLIGA_FOTOS_VIDEOS, PRODUCTO_O_SERVICIO, PRODUCTO_O_SERVICIO_2, PRODUCTO_O_SERVICIO_3, PRODUCTO_O_SERVICIO_4, PRODUCTO_O_SERVICIO_5, PRODUCTO_O_SERVICIO_6, PRODUCTO_O_SERVICIO_7, PRODUCTO_O_SERVICIO_8,  idRelacion) values ( '".$PROVEEDOR_DE_EPC."' , '".$PROVEEDOR_DE_INNOVAC."' , '".$PROVEEDOR_DE_JUST."' , '".$CALIFICACIONPSG."' , '".$CALIFICACION_TR."' , '".$MOTIVO_CALIFICACION."' , '".$CIUDAD_SERVICIO."' , '".$PAIS_SERVICIO."' , '".$PFECHA_ULTIMACOMPRA."' , '".$PFECHA_ACTUA_DOCUM."' , '".$PCONTACTADO_POR."' , '".$P_OTRO."' , '".$PLIGA_FOTOS_VIDEOS."' , '".$PRODUCTO_O_SERVICIO."' , '".$PRODUCTO_O_SERVICIO_2."' , '".$PRODUCTO_O_SERVICIO_3."' , '".$PRODUCTO_O_SERVICIO_4."' , '".$PRODUCTO_O_SERVICIO_5."' , '".$PRODUCTO_O_SERVICIO_6."' , '".$PRODUCTO_O_SERVICIO_7."' , '".$PRODUCTO_O_SERVICIO_8."' , '".$session."' );  ";			
			
		if($existe>=1){	

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}		
	}


	public function productosservicios  ( $PROVEEDOR_DE_EPC , $PROVEEDOR_DE_INNOVAC , $PROVEEDOR_DE_JUST , $CALIFICACIONPSG , $CALIFICACION_TR , $MOTIVO_CALIFICACION , $CIUDAD_SERVICIO , $PAIS_SERVICIO , $PFECHA_ULTIMACOMPRA , $PFECHA_ACTUA_DOCUM , $PCONTACTADO_POR , $P_OTRO){
		$conn = $this->db();
		$existe = $this->revisar_productosservicios();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02productosservicios set PROVEEDOR_DE_EPC = '".$PROVEEDOR_DE_EPC."' , PROVEEDOR_DE_INNOVAC = '".$PROVEEDOR_DE_INNOVAC."' , PROVEEDOR_DE_JUST = '".$PROVEEDOR_DE_JUST."' , CIUDAD_SERVICIO = '".$CIUDAD_SERVICIO."' , PAIS_SERVICIO = '".$PAIS_SERVICIO."' , PCONTACTADO_POR = '".$PCONTACTADO_POR."'  , PLIGA_FOTOS_VIDEOS = '".$PLIGA_FOTOS_VIDEOS."' , PRODUCTO_O_SERVICIO = '".$PRODUCTO_O_SERVICIO."' , PRODUCTO_O_SERVICIO_2 = '".$PRODUCTO_O_SERVICIO_2."' , PRODUCTO_O_SERVICIO_3 = '".$PRODUCTO_O_SERVICIO_3."' , PRODUCTO_O_SERVICIO_4 = '".$PRODUCTO_O_SERVICIO_4."' , PRODUCTO_O_SERVICIO_5 = '".$PRODUCTO_O_SERVICIO_5."' , PRODUCTO_O_SERVICIO_6 = '".$PRODUCTO_O_SERVICIO_6."' , PRODUCTO_O_SERVICIO_7 = '".$PRODUCTO_O_SERVICIO_7."' , PRODUCTO_O_SERVICIO_8 = '".$PRODUCTO_O_SERVICIO_8."' where idRelacion = '".$session."' ; ";
		
		$var2 = "insert into 02productosservicios ( PROVEEDOR_DE_EPC, PROVEEDOR_DE_INNOVAC, PROVEEDOR_DE_JUST, CALIFICACIONPSG, CALIFICACION_TR, MOTIVO_CALIFICACION, CIUDAD_SERVICIO, PAIS_SERVICIO, PFECHA_ULTIMACOMPRA, PFECHA_ACTUA_DOCUM, PCONTACTADO_POR, P_OTRO, PLIGA_FOTOS_VIDEOS, PRODUCTO_O_SERVICIO, PRODUCTO_O_SERVICIO_2, PRODUCTO_O_SERVICIO_3, PRODUCTO_O_SERVICIO_4, PRODUCTO_O_SERVICIO_5, PRODUCTO_O_SERVICIO_6, PRODUCTO_O_SERVICIO_7, PRODUCTO_O_SERVICIO_8,  idRelacion) values ( '".$PROVEEDOR_DE_EPC."' , '".$PROVEEDOR_DE_INNOVAC."' , '".$PROVEEDOR_DE_JUST."' , '".$CALIFICACIONPSG."' , '".$CALIFICACION_TR."' , '".$MOTIVO_CALIFICACION."' , '".$CIUDAD_SERVICIO."' , '".$PAIS_SERVICIO."' , '".$PFECHA_ULTIMACOMPRA."' , '".$PFECHA_ACTUA_DOCUM."' , '".$PCONTACTADO_POR."' , '".$P_OTRO."' , '".$PLIGA_FOTOS_VIDEOS."' , '".$PRODUCTO_O_SERVICIO."' , '".$PRODUCTO_O_SERVICIO_2."' , '".$PRODUCTO_O_SERVICIO_3."' , '".$PRODUCTO_O_SERVICIO_4."' , '".$PRODUCTO_O_SERVICIO_5."' , '".$PRODUCTO_O_SERVICIO_6."' , '".$PRODUCTO_O_SERVICIO_7."' , '".$PRODUCTO_O_SERVICIO_8."' , '".$session."' );  ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}




	/*DOCUMENTOS LEGALES DEL PROVEEDOR*/

	public function variablesadjuntosproveedor(){
		$conn = $this->db();
		$variablequery = "select * from 02adjuntardocumentos where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery,MYSQLI_ASSOC);		
	}

	public function revisar_adjuntosproveedor(){
		$conn = $this->db();
		$var1 = 'select id from 02adjuntardocumentos where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function sologuardarproveedor($campo,$nuevonombre){
		$conn = $this->db();
		$existe = $this->revisar_adjuntosproveedor();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
		if($existe>=1){
		$variablequery1 = "update 02adjuntardocumentos set ".$campo." = '".$nuevonombre."' where idRelacion = '".$_SESSION['idPROV']."' ";
		mysqli_query($conn,$variablequery1);
		}else{
		$variablequery2 = "insert into 02adjuntardocumentos 
		(idRelacion) values ('".$_SESSION['idPROV']."') ";
		$variablequery3 = "update 02adjuntardocumentos set ".$campo." = '".$nuevonombre."' where idRelacion = '".$_SESSION['idPROV']."' ";
		mysqli_query($conn,$variablequery2);
		mysqli_query($conn,$variablequery3);
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}

	public function cargarproveedor($archivo)/*new file*/{
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];

		if( strtolower($extension[$cuenta]) == 'pdf' or strtolower($extension[$cuenta]) == 'gif' or strtolower($extension[$cuenta]) == 'jpeg' or strtolower($extension[$cuenta]) == 'jpg' or strtolower($extension[$cuenta]) == 'png'){ //gif o jpg
		/*if ($tamanyoarchivo <= $tamanyomax) { //archivo demasioado grande*/
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);		
		$this->sologuardarproveedor($archivo,$nuevonombre);
		return trim($nuevonombre);
		}else{
			return "1";
		}
		}else{
			return "2";
		}
	}


	/*DOCUMENTOS LEGALES DEL PROVEEDOR*/

	public function variablesINFOPRODUCTOS(){
		$conn = $this->db();
		$variablequery = "select * from 02productosservicios where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery,MYSQLI_ASSOC);		
	}

	public function revisar_INFOPRODUCTOS(){
		$conn = $this->db();
		$var1 = 'select id from 02productosservicios where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function sologuardarINFOPRODUCTOS($campo,$nuevonombre){
		$conn = $this->db();
		$existe = $this->revisar_INFOPRODUCTOS();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
		if($existe>=1){
		$variablequery1 = "update 02productosservicios set ".$campo." = '".$nuevonombre."' where idRelacion = '".$_SESSION['idPROV']."' ";
		mysqli_query($conn,$variablequery1);
		}else{
		$variablequery2 = "insert into 02productosservicios 
		(idRelacion) values ('".$_SESSION['idPROV']."') ";
		$variablequery3 = "update 02productosservicios set ".$campo." = '".$nuevonombre."' where idRelacion = '".$_SESSION['idPROV']."' ";
		mysqli_query($conn,$variablequery2);
		mysqli_query($conn,$variablequery3);
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}

	public function cargarINFOPRODUCTOS($archivo)/*new file*/{
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];

		if( strtolower($extension[$cuenta]) == 'pdf' or strtolower($extension[$cuenta]) == 'gif' or strtolower($extension[$cuenta]) == 'jpeg' or strtolower($extension[$cuenta]) == 'jpg' or strtolower($extension[$cuenta]) == 'png'){ //gif o jpg
		/*if ($tamanyoarchivo <= $tamanyomax) { //archivo demasioado grande*/
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);		
		$this->sologuardarINFOPRODUCTOS($archivo,$nuevonombre);
		return trim($nuevonombre);
		}else{
			return "1";
		}
		}else{
			return "2";
		}
	}



/*     OTROS DOCUMENTOS */ 


	public function variable_OTROSDOCUMENTOS(){
		$conn = $this->db();
		$variablequery = "select * from 02otrosdocumentos where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_OTROSDOCUMENTOS(){
		$conn = $this->db();
		$var1 = 'select id from 02otrosdocumentos where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function OTROSDOCUMENTOS  ($F_PADJUNTAR_OTRO_DOCUMENTO_4_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_5_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_6_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_7_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_8_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_9_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_10_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_11_1 , $F_PADJUNTAR_OTRO_DOCUMENTO_12_1 , $IPotrosdocumentosservp,$ENVIAOTROSdocuu1){
		$conn = $this->db();
		$existe = $this->revisar_OTROSDOCUMENTOS();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02otrosdocumentos set F_PADJUNTAR_OTRO_DOCUMENTO_4_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_4_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_6_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_6_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_7_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_7_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_8_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_8_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_9_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_9_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_10_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_10_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_11_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_11_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_12_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_12_1."' , F_PADJUNTAR_OTRO_DOCUMENTO_13_1 = '".$F_PADJUNTAR_OTRO_DOCUMENTO_13_1."' where id = '".$IPotrosdocumentosservp."' ; ";
		
		$var2 = "insert into 02otrosdocumentos (  F_PADJUNTAR_OTRO_DOCUMENTO_4_1, F_PADJUNTAR_OTRO_DOCUMENTO_5_1, F_PADJUNTAR_OTRO_DOCUMENTO_6_1, F_PADJUNTAR_OTRO_DOCUMENTO_7_1, F_PADJUNTAR_OTRO_DOCUMENTO_8_1, F_PADJUNTAR_OTRO_DOCUMENTO_9_1, F_PADJUNTAR_OTRO_DOCUMENTO_10_1, F_PADJUNTAR_OTRO_DOCUMENTO_11_1, F_PADJUNTAR_OTRO_DOCUMENTO_12_1, F_PADJUNTAR_OTRO_DOCUMENTO_13_1, idRelacion) values ( '".$F_PADJUNTAR_OTRO_DOCUMENTO_4_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_5_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_6_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_7_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_8_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_9_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_10_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_11_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_12_1."' , '".$F_PADJUNTAR_OTRO_DOCUMENTO_13_1."' , '".$session."' );  ";			
			
			if($ENVIAOTROSdocuu1=='ENVIAOTROSdocuu1'){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
		
		}

	public function listadootrosdocuumentos(){
		$conn = $this->db();

		$variablequery = "select * from 02otrosdocumentos where idRelacion =  '".$_SESSION['idPROV']."'  order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function listadootrosdocuumentos2($id){
		$conn = $this->db();
		$variablequery = "select * from 02otrosdocumentos  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}

	public function borraotrosdocuu($id){
		$conn = $this->db();
		$variablequery = "delete from 02otrosdocumentos where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}		
	

	public function sologuardarOTROSDOCUMENTOS($campo,$nuevonombre){
		$conn = $this->db();
		$existe = $this->revisar_OTROSDOCUMENTOS();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
		if($existe>=1){
		$variablequery1 = "update 02otrosdocumentos set ".$campo." = '".$nuevonombre."' where idRelacion = '".$_SESSION['idPROV']."' ";
		mysqli_query($conn,$variablequery1);
		}else{
		$variablequery2 = "insert into 02otrosdocumentos 
		(idRelacion) values ('".$_SESSION['idPROV']."') ";
		$variablequery3 = "update 02otrosdocumentos set ".$campo." = '".$nuevonombre."' where idRelacion = '".$_SESSION['idPROV']."' ";
		mysqli_query($conn,$variablequery2);
		mysqli_query($conn,$variablequery3);
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}

	public function cargarOTROSDOCUMENTOS($archivo)/*new file*/{
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];

		if( strtolower($extension[$cuenta]) == 'pdf' or strtolower($extension[$cuenta]) == 'gif' or strtolower($extension[$cuenta]) == 'jpeg' or strtolower($extension[$cuenta]) == 'jpg' or strtolower($extension[$cuenta]) == 'png'){ //gif o jpg
		/*if ($tamanyoarchivo <= $tamanyomax) { //archivo demasioado grande*/
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);		
		$this->sologuardarOTROSDOCUMENTOS($archivo,$nuevonombre);
		return trim($nuevonombre);
		}else{
			return "1";
		}
		}else{
			return "2";
		}
	}

/* DIR OFICINAS BODEGAS */ 


	public function variable_DIROFICINASBODEGAS(){
		$conn = $this->db();
		$variablequery = "select * from 02DIROFICINASBODEGAS where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_DIROFICINASBODEGAS(){
		$conn = $this->db();
		$var1 = 'select id from 02DIROFICINASBODEGAS where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function enviarDIROFICINASBODEGAS ($P_EDIFICIO_OSB , $P_CALLE_OSB , $P_NUMERO_EXTERIOR_OSB , $P_NUMERO_INTERIOR_OSB , $P_NUMERO_OFICINA_OSB , $P_COLONIA_OSB , $P_ALCALDIA_OSB , $P_CP_OSB , $P_CIUDAD_OSB , $P_ESTADO_OSB , $P_PAIS_OSB , $P_UBICACION_MAPA_OSB , $P_TELEFONO_OSB_1 , $P_TELEFONO_OSB_2 , $P_IMAIL_CONTACTO_OSB_1 , $P_NUMERO_EXTENCION_OSB_1,$IPbodegasproveedores,$ENVIARBODEGAPRO ){
		
		
		$conn = $this->db();
		$existe = $this->revisar_DIROFICINASBODEGAS();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02DIROFICINASBODEGAS set P_EDIFICIO_OSB = '".$P_EDIFICIO_OSB."' , P_CALLE_OSB = '".$P_CALLE_OSB."' , P_NUMERO_EXTERIOR_OSB = '".$P_NUMERO_EXTERIOR_OSB."' , P_NUMERO_INTERIOR_OSB = '".$P_NUMERO_INTERIOR_OSB."' , P_NUMERO_OFICINA_OSB = '".$P_NUMERO_OFICINA_OSB."' , P_COLONIA_OSB = '".$P_COLONIA_OSB."' , P_ALCALDIA_OSB = '".$P_ALCALDIA_OSB."' , P_CP_OSB = '".$P_CP_OSB."' , P_CIUDAD_OSB = '".$P_CIUDAD_OSB."' , P_ESTADO_OSB = '".$P_ESTADO_OSB."' , P_PAIS_OSB = '".$P_PAIS_OSB."' , P_UBICACION_MAPA_OSB = '".$P_UBICACION_MAPA_OSB."' , P_TELEFONO_OSB_1 = '".$P_TELEFONO_OSB_1."' , P_TELEFONO_OSB_2 = '".$P_TELEFONO_OSB_2."' , P_IMAIL_CONTACTO_OSB_1 = '".$P_IMAIL_CONTACTO_OSB_1."' , P_NUMERO_EXTENCION_OSB_1 = '".$P_NUMERO_EXTENCION_OSB_1."' where id = '".$IPbodegasproveedores."' ; ";
		
		
		$var2 = "insert into 02DIROFICINASBODEGAS ( P_EDIFICIO_OSB, P_CALLE_OSB, P_NUMERO_EXTERIOR_OSB, P_NUMERO_INTERIOR_OSB, P_NUMERO_OFICINA_OSB, P_COLONIA_OSB, P_ALCALDIA_OSB, P_CP_OSB, P_CIUDAD_OSB, P_ESTADO_OSB, P_PAIS_OSB,  P_UBICACION_MAPA_OSB, P_TELEFONO_OSB_1, P_TELEFONO_OSB_2, P_IMAIL_CONTACTO_OSB_1, P_NUMERO_EXTENCION_OSB_1, idRelacion) values ( '".$P_EDIFICIO_OSB."' , '".$P_CALLE_OSB."' , '".$P_NUMERO_EXTERIOR_OSB."' , '".$P_NUMERO_INTERIOR_OSB."' , '".$P_NUMERO_OFICINA_OSB."' , '".$P_COLONIA_OSB."' , '".$P_ALCALDIA_OSB."' , '".$P_CP_OSB."' , '".$P_CIUDAD_OSB."' , '".$P_ESTADO_OSB."' , '".$P_PAIS_OSB."' ,  '".$P_UBICACION_MAPA_OSB."' , '".$P_TELEFONO_OSB_1."' , '".$P_TELEFONO_OSB_2."' , '".$P_IMAIL_CONTACTO_OSB_1."' , '".$P_NUMERO_EXTENCION_OSB_1."' , '".$session."' );  ";			
			
			if($ENVIARBODEGAPRO=='ENVIARBODEGAPRO'){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadoBODEGASpro(){
		$conn = $this->db();

		$variablequery = "select * from 02DIROFICINASBODEGAS where idRelacion =  '".$_SESSION['idPROV']."'  order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadoBODEGASpro2($id){
		$conn = $this->db();
		$variablequery = "select * from 02DIROFICINASBODEGAS  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borrabodegasprovee($id){
		$conn = $this->db();
		$variablequery = "delete from 02DIROFICINASBODEGAS where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	











/* DATOS BANCARIOS 1 */ 


	public function variable_DATOSBANCARIOS1(){
		$conn = $this->db();
		$variablequery = "select * from 02DATOSBANCARIOS1 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_DATOSBANCARIOS1(){
		$conn = $this->db();
		$var1 = 'select id from 02DATOSBANCARIOS1 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function enviarDATOSBANCARIOS1 (
	$P_TIPO_DE_MONEDA_1 , $P_INSTITUCION_FINANCIERA_1 , $P_NUMERO_DE_CUENTA_DB_1 , $P_NUMERO_CLABE_1 , 
	$P_NUMERO_DE_SUCURSAL_1 , $P_NUMERO_IBAN_1 , $P_NUMERO_CUENTA_SWIFT_1,$FOTO_ESTADO_PROVEE,$ULTIMA_CARGA_DATOBANCA,$OBSERVACIONES_D, $ENVIARRdatosbancario1p,$IPdatosbancario1p ){
	
		$conn = $this->db();
		$existe = $this->revisar_DATOSBANCARIOS1();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:0;
		if($existe == 0 or $existe == ''){
			$variable_check = " checkbox, ";			
			$valor_check = " 'si', ";
			}
		if($session != ''){
			
		$var1 = "update 02DATOSBANCARIOS1 set P_TIPO_DE_MONEDA_1 = '".$P_TIPO_DE_MONEDA_1."' , P_INSTITUCION_FINANCIERA_1 = '".$P_INSTITUCION_FINANCIERA_1."' , P_NUMERO_DE_CUENTA_DB_1 = '".$P_NUMERO_DE_CUENTA_DB_1."' , P_NUMERO_CLABE_1 = '".$P_NUMERO_CLABE_1."' , P_NUMERO_DE_SUCURSAL_1 = '".$P_NUMERO_DE_SUCURSAL_1."' , P_NUMERO_IBAN_1 = '".$P_NUMERO_IBAN_1."' , P_NUMERO_CUENTA_SWIFT_1 = '".$P_NUMERO_CUENTA_SWIFT_1."' ,ULTIMA_CARGA_DATOBANCA = '".$ULTIMA_CARGA_DATOBANCA."' ,OBSERVACIONES_D = '".$OBSERVACIONES_D."'  where id = '".$IPdatosbancario1p."' ; ";
		
		
		 $var2 = "insert into 02DATOSBANCARIOS1 (P_TIPO_DE_MONEDA_1, P_INSTITUCION_FINANCIERA_1, P_NUMERO_DE_CUENTA_DB_1, P_NUMERO_CLABE_1, P_NUMERO_DE_SUCURSAL_1, P_NUMERO_IBAN_1, P_NUMERO_CUENTA_SWIFT_1,FOTO_ESTADO_PROVEE, ULTIMA_CARGA_DATOBANCA,OBSERVACIONES_D, ".$variable_check." idRelacion) values ( '".$P_TIPO_DE_MONEDA_1."' , '".$P_INSTITUCION_FINANCIERA_1."' , '".$P_NUMERO_DE_CUENTA_DB_1."' , '".$P_NUMERO_CLABE_1."' , '".$P_NUMERO_DE_SUCURSAL_1."' , '".$P_NUMERO_IBAN_1."' , '".$P_NUMERO_CUENTA_SWIFT_1."' , '".$FOTO_ESTADO_PROVEE."' , '".$ULTIMA_CARGA_DATOBANCA."' , '".$OBSERVACIONES_D."' , ".$valor_check." '".$session."' );  ";			
	
		if($ENVIARRdatosbancario1p=='ENVIARRdatosbancario1p'){	

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }



	public function Listado_datos_bancariosPRO(){
		$conn = $this->db();

		$variablequery = "select * from 02DATOSBANCARIOS1 where idRelacion = '".$_SESSION['idPROV']."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


        public function Listado_datos_bancariosPRO2($id){ $conn = $this->db(); $variablequery = "select * from 02DATOSBANCARIOS1 where id = '".$id."' "; return $arrayquery = mysqli_query($conn,$variablequery); }


         function borra_datos_bancario1($id){
		$conn = $this->db();
		$variablequery = "delete from 02DATOSBANCARIOS1 where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	


	   
/* DATOS BANCARIOS 2 */ 


	public function variable_DATOSBANCARIOS2(){
		$conn = $this->db();
		$variablequery = "select * from 02DATOSBANCARIOS2 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_DATOSBANCARIOS2(){
		$conn = $this->db();
		$var1 = 'select id from 02DATOSBANCARIOS2 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function DATOSBANCARIOS2 ( $P_TIPO_DE_MONEDA_2 , $P_INSTITUCION_FINANCIERA_2 , $P_NUMERO_DE_CUENTA_DB_2 , $P_NUMERO_CLABE_2 , $P_NUMERO_DE_SUCURSAL_2 , $P_NUMERO_IBAN_2 , $P_NUMERO_CUENTA_SWIFT_2){
		$conn = $this->db();
		$existe = $this->revisar_DATOSBANCARIOS2();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02DATOSBANCARIOS2 set P_TIPO_DE_MONEDA_2 = '".$P_TIPO_DE_MONEDA_2."' , P_INSTITUCION_FINANCIERA_2 = '".$P_INSTITUCION_FINANCIERA_2."' , P_NUMERO_DE_CUENTA_DB_2 = '".$P_NUMERO_DE_CUENTA_DB_2."' , P_NUMERO_CLABE_2 = '".$P_NUMERO_CLABE_2."' , P_NUMERO_DE_SUCURSAL_2 = '".$P_NUMERO_DE_SUCURSAL_2."' , P_NUMERO_IBAN_2 = '".$P_NUMERO_IBAN_2."' , P_NUMERO_CUENTA_SWIFT_2 = '".$P_NUMERO_CUENTA_SWIFT_2."' where idRelacion = '".$session."' ;";
		
		
		$var2 = "insert into 02DATOSBANCARIOS2 ( P_TIPO_DE_MONEDA_2, P_INSTITUCION_FINANCIERA_2, P_NUMERO_DE_CUENTA_DB_2, P_NUMERO_CLABE_2, P_NUMERO_DE_SUCURSAL_2, P_NUMERO_IBAN_2, P_NUMERO_CUENTA_SWIFT_2, idRelacion) values ( '".$P_TIPO_DE_MONEDA_2."' , '".$P_INSTITUCION_FINANCIERA_2."' , '".$P_NUMERO_DE_CUENTA_DB_2."' , '".$P_NUMERO_CLABE_2."' , '".$P_NUMERO_DE_SUCURSAL_2."' , '".$P_NUMERO_IBAN_2."' , '".$P_NUMERO_CUENTA_SWIFT_2."' , '".$session."' ); ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}		
	}

public function datos_bancario_default($pasarDID, $pasarD_text) {
    $conn = $this->db();
    $session = isset($_SESSION['idPROV']) ? $_SESSION['idPROV'] : '';
    
    if ($session != '') {
        // Verificar registros activos (usando consulta preparada)
        $check_active = $conn->prepare("SELECT id FROM 02DATOSBANCARIOS1 
                                       WHERE idRelacion = ? AND checkbox = 'si'");
        $check_active->bind_param("s", $session);
        $check_active->execute();
        $check_active->store_result();
        $active_count = $check_active->num_rows;
        $check_active->close();
        
        // Actualizar el registro específico
        $update_current = $conn->prepare("UPDATE 02DATOSBANCARIOS1 SET checkbox = ? 
                                         WHERE id = ?");
        $update_current->bind_param("ss", $pasarD_text, $pasarDID);
        $update_current->execute();
        $update_current->close();
        
        if ($pasarD_text == 'si') {
            // Deseleccionar otros registros
            $deselect_others = $conn->prepare("UPDATE 02DATOSBANCARIOS1 SET checkbox = 'no' 
                                              WHERE idRelacion = ? AND id != ?");
            $deselect_others->bind_param("ss", $session, $pasarDID);
            $deselect_others->execute();
            $deselect_others->close();
        } 
        else if ($active_count <= 1) {
            // Activar el último registro
            $activate_last = $conn->prepare("UPDATE 02DATOSBANCARIOS1 SET checkbox = 'si' 
                                            WHERE idRelacion = ? 
                                            ORDER BY id DESC LIMIT 1");
            $activate_last->bind_param("s", $session);
            $activate_last->execute();
            $activate_last->close();
        }
        
        echo "Actualizado: " . $pasarD_text;
    } else {
        echo "TU SESIÓN HA TERMINADO";
    }
}

/* REFERENCIAS COMERCIALES 1 */ 


	public function variable_REFERENCIASCOMERCIALES1(){
		$conn = $this->db();
		$variablequery = "select * from 02REFERENCIASCOMERCIALES1 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_REFERENCIASCOMERCIALES1(){
		$conn = $this->db();
		$var1 = 'select id from 02REFERENCIASCOMERCIALES1 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function REFERENCIASCOMERCIALES1 ( $P_NOMBRE_EMPRESA_RC_1 , $P_NOMBRE_CONTACTO_RC_1 , $P_CELULAR_CONTACTO_RC_1 , $P_TELEFONO_EMPRESA_RC_1 , $P_NUMERO_EXTENSION_RC_1 , $P_IMAIL_CONTACTO_RC_1 , $P_PAGINA_WEB_RC_1, $ULTIMA_CARGA_REFEprovee, $IPdatosREFEP1p, $ENVIARreferenciaPRO ){
		
		$conn = $this->db();
		$existe = $this->revisar_REFERENCIASCOMERCIALES1();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02REFERENCIASCOMERCIALES1 set P_NOMBRE_EMPRESA_RC_1 = '".$P_NOMBRE_EMPRESA_RC_1."' , P_NOMBRE_CONTACTO_RC_1 = '".$P_NOMBRE_CONTACTO_RC_1."' , P_CELULAR_CONTACTO_RC_1 = '".$P_CELULAR_CONTACTO_RC_1."' , P_TELEFONO_EMPRESA_RC_1 = '".$P_TELEFONO_EMPRESA_RC_1."' , P_NUMERO_EXTENSION_RC_1 = '".$P_NUMERO_EXTENSION_RC_1."' , P_IMAIL_CONTACTO_RC_1 = '".$P_IMAIL_CONTACTO_RC_1."' , P_PAGINA_WEB_RC_1 = '".$P_PAGINA_WEB_RC_1."' ,ULTIMA_CARGA_REFEprovee = '".$ULTIMA_CARGA_REFEprovee."'  where id = '".$IPdatosREFEP1p."' ; ";
		
		
		$var2 = "insert into 02REFERENCIASCOMERCIALES1 ( P_NOMBRE_EMPRESA_RC_1, P_NOMBRE_CONTACTO_RC_1, P_CELULAR_CONTACTO_RC_1, P_TELEFONO_EMPRESA_RC_1, P_NUMERO_EXTENSION_RC_1, P_IMAIL_CONTACTO_RC_1, P_PAGINA_WEB_RC_1,ULTIMA_CARGA_REFEprovee, idRelacion) values ( '".$P_NOMBRE_EMPRESA_RC_1."' , '".$P_NOMBRE_CONTACTO_RC_1."' , '".$P_CELULAR_CONTACTO_RC_1."' , '".$P_TELEFONO_EMPRESA_RC_1."' , '".$P_NUMERO_EXTENSION_RC_1."' , '".$P_IMAIL_CONTACTO_RC_1."' , '".$P_PAGINA_WEB_RC_1."' ,  '".$ULTIMA_CARGA_REFEprovee."' , '".$_SESSION['idPROV']."');  ";			
			
				if($ENVIARreferenciaPRO=='ENVIARreferenciaPRO'){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadoREFERENCIApro(){
		$conn = $this->db();

		$variablequery = "select * from 02REFERENCIASCOMERCIALES1 where idRelacion = '".$_SESSION['idPROV']."'  order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadoREFERENCIApro2($id){
		$conn = $this->db();
		$variablequery = "select * from 02REFERENCIASCOMERCIALES1  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borrareferenprovee($id){
		$conn = $this->db();
		$variablequery = "delete from 02REFERENCIASCOMERCIALES1 where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	










/* REFERENCIAS COMERCIALES 2 */ 


	public function variable_REFERENCIASCOMERCIALES2(){
		$conn = $this->db();
		$variablequery = "select * from 02REFERENCIASCOMERCIALES2 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_REFERENCIASCOMERCIALES2(){
		$conn = $this->db();
		$var1 = 'select id from 02REFERENCIASCOMERCIALES2 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function REFERENCIASCOMERCIALES2 (  $P_NOMBRE_EMPRESA_RC_2 , $P_NOMBRE_CONTACTO_RC_2 , $P_CELULAR_CONTACTO_RC_2 , $P_TELEFONO_EMPRESA_RC_2 , $P_NUMERO_EXTENSIO_CONTACTO_RC_2 , $P_IMAIL_RC_2 , $P_PAGINA_WEB_RC_2 ){
		$conn = $this->db();
		$existe = $this->revisar_REFERENCIASCOMERCIALES2();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02REFERENCIASCOMERCIALES2 set P_NOMBRE_EMPRESA_RC_2 = '".$P_NOMBRE_EMPRESA_RC_2."' , P_NOMBRE_CONTACTO_RC_2 = '".$P_NOMBRE_CONTACTO_RC_2."' , P_CELULAR_CONTACTO_RC_2 = '".$P_CELULAR_CONTACTO_RC_2."' , P_TELEFONO_EMPRESA_RC_2 = '".$P_TELEFONO_EMPRESA_RC_2."' , P_NUMERO_EXTENSIO_CONTACTO_RC_2 = '".$P_NUMERO_EXTENSIO_CONTACTO_RC_2."' , P_IMAIL_RC_2 = '".$P_IMAIL_RC_2."' , P_PAGINA_WEB_RC_2 = '".$P_PAGINA_WEB_RC_2."' where idRelacion = '".$session."' ; ";
		
		
		$var2 = "insert into 02REFERENCIASCOMERCIALES2 ( P_NOMBRE_EMPRESA_RC_2, P_NOMBRE_CONTACTO_RC_2, P_CELULAR_CONTACTO_RC_2, P_TELEFONO_EMPRESA_RC_2, P_NUMERO_EXTENSIO_CONTACTO_RC_2, P_IMAIL_RC_2, P_PAGINA_WEB_RC_2,  idRelacion) values ( '".$P_NOMBRE_EMPRESA_RC_2."' , '".$P_NOMBRE_CONTACTO_RC_2."' , '".$P_CELULAR_CONTACTO_RC_2."' , '".$P_TELEFONO_EMPRESA_RC_2."' , '".$P_NUMERO_EXTENSIO_CONTACTO_RC_2."' , '".$P_IMAIL_RC_2."' , '".$P_PAGINA_WEB_RC_2."' , '".$session."' ); ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}


    ///////////////////////////// /////////////////////////

    public function CALIFICACION($DOCUMENTO_CALIFICACION ,$ADJUNTO_CALIFICACION, $OBSERVACIONES_CALIFICACION , $FECHA_CALIFICACION , $hCALIFICACION,$IpCALIFICACION,    $enviarCALIFICACION){

    $conn = $this->db();
    $session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';  
    if($session != ''){                            

    $var1 = "update 02CALIFICACION  set


    DOCUMENTO_CALIFICACION= '".$DOCUMENTO_CALIFICACION."' , 
    OBSERVACIONES_CALIFICACION = '".$OBSERVACIONES_CALIFICACION."' ,  
    hCALIFICACION = '".$hCALIFICACION."'
    where id = '".$IpCALIFICACION."' ;  ";



    $var2 = "insert into 02CALIFICACION ( DOCUMENTO_CALIFICACION,ADJUNTO_CALIFICACION, OBSERVACIONES_CALIFICACION, FECHA_CALIFICACION, hCALIFICACION,         idRelacion) values ( '".$DOCUMENTO_CALIFICACION."' , '".$ADJUNTO_CALIFICACION."' , '".$OBSERVACIONES_CALIFICACION."' , '".$FECHA_CALIFICACION    ."' , '".$hCALIFICACION."' , '".$session."' ); ";		

    if($enviarCALIFICACION=='enviarCALIFICACION'){
    mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
    return "Actualizado";
  
}else{
    mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
    return "Ingresado";
}

}else{
    echo "TU SESIÓN HA TERMINADO";	
}

}


    public function Listado_CALIFICACION(){
    $session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';

    $conn = $this->db();
    $variablequery = "select * from 02CALIFICACION WHERE idRelacion = '".$session."' order by id desc ";
    return $arrayquery = mysqli_query($conn,$variablequery);
}	


     public function Listado_CALIFICACION2($id){
     $conn = $this->db();
     $variablequery = "select * from 02CALIFICACION  where id = '".$id."' ";
     return $arrayquery = mysqli_query($conn,$variablequery);
}






      public function borra_CALIFICACION($id){
      $conn = $this->db();
      $variablequery = "delete from 02CALIFICACION where id = '".$id."' ";
      $arrayquery = mysqli_query($conn,$variablequery);
      RETURN 
     "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
}



			//*NUEVO DOCUMENTO//*

	public function variable_nuevomotivotodos(){
		$conn = $this->db();
		$variablequery = "select * from 02MOTIVO order by id desc";
		return $arrayquery = mysqli_query($conn,$variablequery);
		// $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}
	

	public function variable_nuevomotivo(){
		$conn = $this->db();
		$variablequery = "select * from 02MOTIVO where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_nuevomotivo(){
		$conn = $this->db();
		$var1 = 'select id from 02MOTIVO where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function nuevomotivo ($nuevo_motivo ,$MOTIVO_NUEVO,$enviarnuevo_MOTIVO,$IPnuevomotivo){
		$conn = $this->db();
		$existe = $this->revisar_nuevomotivo();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02MOTIVO set  nuevo_motivo = '".$nuevo_motivo."' , MOTIVO_NUEVO = '".$MOTIVO_NUEVO."' where id = '".$IPnuevomotivo."' ; ";
	
		$var2 = "insert into 02MOTIVO  (nuevo_motivo, MOTIVO_NUEVO, idRelacion) values ( '".$nuevo_motivo."' , '".$MOTIVO_NUEVO."' , '".$session."');  ";	
			
		if($enviarnuevo_MOTIVO=='enviarnuevo_MOTIVO'){	

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }

	public function listadonuevomotivo(){
		$conn = $this->db();

		$variablequery = "select * from 02MOTIVO order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function listadonuevomotivo2($id){
		$conn = $this->db();
		$variablequery = "select * from 02MOTIVO  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function BORRARMOTIVO($id){
		$conn = $this->db();
		$variablequery = "delete from 02MOTIVO where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}







	public function variable_REFERENCIASCOMERCIALES3(){
		$conn = $this->db();
		$variablequery = "select * from 02REFERENCIASCOMERCIALES3 where idRelacion = '".$_SESSION['idPROV']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_REFERENCIASCOMERCIALES3(){
		$conn = $this->db();
		$var1 = 'select id from 02REFERENCIASCOMERCIALES3 where idRelacion =  "'.$_SESSION['idPROV'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function REFERENCIASCOMERCIALES3 ( $P_NOMBRE_EMPRESA_RC_3 , $P_NOMBRE_CONTACTO_RC_3 , $P_CELULAR_CONTACTO_RC_3 , $P_TELEFONO_EMPRESA_RC_3 , $P_NUMERO_EXTENSION_RC_3 , $P_IMAIL_RC_3 , $P_PAGINA_WEB_RC_3 ){
		$conn = $this->db();
		$existe = $this->revisar_REFERENCIASCOMERCIALES3();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			
		$var1 = "update 02REFERENCIASCOMERCIALES3 set P_NOMBRE_EMPRESA_RC_3 = '".$P_NOMBRE_EMPRESA_RC_3."' , P_NOMBRE_CONTACTO_RC_3 = '".$P_NOMBRE_CONTACTO_RC_3."' , P_CELULAR_CONTACTO_RC_3 = '".$P_CELULAR_CONTACTO_RC_3."' , P_TELEFONO_EMPRESA_RC_3 = '".$P_TELEFONO_EMPRESA_RC_3."' , P_NUMERO_EXTENSION_RC_3 = '".$P_NUMERO_EXTENSION_RC_3."' , P_IMAIL_RC_3 = '".$P_IMAIL_RC_3."' , P_PAGINA_WEB_RC_3 = '".$P_PAGINA_WEB_RC_3."'  where idRelacion = '".$session."' ;  ";
		
		
		$var2 = "insert into 02REFERENCIASCOMERCIALES3 ( P_NOMBRE_EMPRESA_RC_3, P_NOMBRE_CONTACTO_RC_3, P_CELULAR_CONTACTO_RC_3, P_TELEFONO_EMPRESA_RC_3, P_NUMERO_EXTENSION_RC_3, P_IMAIL_RC_3, P_PAGINA_WEB_RC_3, idRelacion) values ( '".$P_NOMBRE_EMPRESA_RC_3."' , '".$P_NOMBRE_CONTACTO_RC_3."' , '".$P_CELULAR_CONTACTO_RC_3."' , '".$P_TELEFONO_EMPRESA_RC_3."' , '".$P_NUMERO_EXTENSION_RC_3."' , '".$P_IMAIL_RC_3."' , '".$P_PAGINA_WEB_RC_3."' , '".$session."' ); ";			
			
		if($existe>=1){		

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
		}else{
		echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
	}

/* proveedor de */

		public function listado_empresas2ba(){
		$conn = $this->db(); 
		$variablequery = "select * from 03datosdelaempresa order by id desc"; 
		return $arrayquery = mysqli_query($conn,$variablequery); 
		}

		public function PROVEEDORDE($query1){
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';		
		if($session != ''){
		$conn = $this->db();				
		$variablequery = "delete from 02empresarelacion where idRelacionP = '".$session."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		
		$explotado = explode('or',$query1);
		$cuenta = count($explotado) - 1;
		for($rrr=0;$rrr<=$cuenta;$rrr++){
		$variablequery = "insert into 02empresarelacion(idRelacionP,idRelacionC)
		values('".$session."','".$explotado[$rrr]."')";
		$arrayquery = mysqli_query($conn,$variablequery); 
		}
		return "Ingresado"; 
		}else{
		echo "NO HAY UN PROVEEDOR SELECCIONADO";
		}
		}

		public function variable_comborelacion($idrelacion){
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';		
		
		$conn = $this->db();				
		$variablequery = "select * from 02empresarelacion where idRelacionP = '".$session."' and  idRelacionC = '".$idrelacion."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery);
		if($row['id']>=1){
		return "si";
		}else{
		return "no";			
		}
		
		}

		public function variable_comborelacion1a(){
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';		
		
		$conn = $this->db();				
		$variablequery = "select * from 02empresarelacion where idRelacionP = '".$session."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery);
		if($row['idRelacionC']>=1){
		return $row['idRelacionC'];
		}else{
		return "no";			
		}
		
		}



/*create TABLE `02empresarelacion` (
id int(100) AUTO_INCREMENT not null,
    idRelacion int(100) comment '',
    idRelacionP int(100) COMMENT 'numero usuario proveedor',
    idRelacionC int(100) comment 'numero del combo',    
    primary key(id)
)*/
/*create TABLE `03datossmtp` ( id int(100) AUTO_INCREMENT, Host varchar(100), Username varchar(100), Passwordd varchar(100), Port varchar(100), setFrom1 varchar(100), setFrom2 varchar(100), idRelacion varchar(100), primary key(id) ); */
	}



	?>