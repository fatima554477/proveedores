<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023
*/
 
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";	
	
	class accesoclase extends colaboradores{
 
	/* ═════════════════════════════════════════════════════════════
	   HELPERS PRIVADOS DE BITÁCORA
	   ═════════════════════════════════════════════════════════════ */
	private function nombre_usuario_bitacora_proveedor(){
		foreach (array('NOMBREUSUARIO','nombreusuario','usuario') as $key) {
			if(!empty($_SESSION[$key])){ return $_SESSION[$key]; }
		}
		if(!empty($_SESSION['idem'])){ return 'ID:'.$_SESSION['idem']; }
		return 'SIN_USUARIO';
	}
 
	private function registrar_bitacora_proveedor($idProveedor, $tipoMovimiento, $detalle){
		$conn = $this->db();
		$idProveedor    = intval($idProveedor);
		$tipoMovimiento = mysqli_real_escape_string($conn, $tipoMovimiento);
		$detalle        = mysqli_real_escape_string($conn, $detalle);
		$usuario        = mysqli_real_escape_string($conn, $this->nombre_usuario_bitacora_proveedor());
 
		mysqli_query($conn, "CREATE TABLE IF NOT EXISTS 02PROVEEDORES_BITACORA (
			id int(11) NOT NULL AUTO_INCREMENT,
			id_proveedor int(11) NOT NULL,
			tipo_movimiento varchar(50) NOT NULL,
			detalle text,
			usuario varchar(255) DEFAULT NULL,
			fecha_hora datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (id),
			KEY idx_id_proveedor (id_proveedor),
			KEY idx_fecha_hora (fecha_hora)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
 
		// Evita duplicados inmediatos del mismo evento (mismo proveedor/tipo/detalle/usuario)
		// cuando por UI o doble submit se dispara la misma acción casi al mismo tiempo.
		$queryDuplicado = mysqli_query($conn, "SELECT id FROM 02PROVEEDORES_BITACORA
			WHERE id_proveedor = '".$idProveedor."'
			  AND tipo_movimiento = '".$tipoMovimiento."'
			  AND detalle = '".$detalle."'
			  AND usuario = '".$usuario."'
			  AND fecha_hora >= (NOW() - INTERVAL 5 SECOND)
			LIMIT 1");
		if($queryDuplicado && mysqli_num_rows($queryDuplicado) > 0){
			return;
		}

		mysqli_query($conn, "INSERT INTO 02PROVEEDORES_BITACORA
			(id_proveedor, tipo_movimiento, detalle, usuario, fecha_hora)
		VALUES ('".$idProveedor."', '".$tipoMovimiento."', '".$detalle."', '".$usuario."', NOW())");
	}
 
	private function construir_detalle_cambios($anterior, $actual, $mapaCampos){
		$cambios = array();
		foreach($mapaCampos as $campo => $etiqueta){
			$valorAnterior = isset($anterior[$campo]) ? trim((string)$anterior[$campo]) : '';
			$valorActual   = isset($actual[$campo])   ? trim((string)$actual[$campo])   : '';
			if($valorAnterior !== $valorActual){
				$cambios[] = $etiqueta.': "'.$valorAnterior.'" → "'.$valorActual.'"';
			}
		}
		return $cambios;
	}
 
	/* ═════════════════════════════════════════════════════════════
	   FOTOS DE PRODUCTOS / LOGO
	   ═════════════════════════════════════════════════════════════ */
	public function variables_informacionfiscal_logo($identificador){
		$conn = $this->db();
		$variablequery = "select ADJUNTAR_LOGO_INFORMACION from 03docs_info_fiscal where idRelacion = '".$identificador."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['ADJUNTAR_LOGO_INFORMACION'];
	}
 
	/* ═════════════════════════════════════════════════════════════
	   OTROS PRODUCTOS Y SERVICIOS
	   ═════════════════════════════════════════════════════════════ */
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
 
	public function enviarOTROS_PRODUCTOS($PRODUCTO_O_SERVICIO_9,$PRODUCTO_O_SERVICIO_10,$PRODUCTO_O_SERVICIO_11,$PRODUCTO_O_SERVICIO_12,$PRODUCTO_O_SERVICIO_13,$PRODUCTO_O_SERVICIO_14,$PRODUCTO_O_SERVICIO_15,$PRODUCTO_O_SERVICIO_16,$PRODUCTO_O_SERVICIO_17,$PRODUCTO_O_SERVICIO_18,$PRODUCTO_O_SERVICIO_19,$PRODUCTO_O_SERVICIO_20,$ENVIARotrosproductosp,$IPotrosproductosservp,$ENVIARotroservicios1){
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
 
			$var1 = "update 02otrosproveedores set PRODUCTO_O_SERVICIO_9 = '".$PRODUCTO_O_SERVICIO_9."' ,
			PRODUCTO_O_SERVICIO_11 = '".$PRODUCTO_O_SERVICIO_11."' , PRODUCTO_O_SERVICIO_12 = '".$PRODUCTO_O_SERVICIO_12."' , PRODUCTO_O_SERVICIO_13 = '".$PRODUCTO_O_SERVICIO_13."' , PRODUCTO_O_SERVICIO_14 = '".$PRODUCTO_O_SERVICIO_14."' , PRODUCTO_O_SERVICIO_15 = '".$PRODUCTO_O_SERVICIO_15."' , PRODUCTO_O_SERVICIO_16 = '".$PRODUCTO_O_SERVICIO_16."' , PRODUCTO_O_SERVICIO_17 = '".$PRODUCTO_O_SERVICIO_17."' , PRODUCTO_O_SERVICIO_18 = '".$PRODUCTO_O_SERVICIO_18."' , PRODUCTO_O_SERVICIO_19 = '".$PRODUCTO_O_SERVICIO_19."' , PRODUCTO_O_SERVICIO_20 = '".$PRODUCTO_O_SERVICIO_20."'  where id = '".$IPotrosproductosservp."' ; ";
			$var2 = "insert into 02otrosproveedores (PRODUCTO_O_SERVICIO_9,PRODUCTO_O_SERVICIO_10,PRODUCTO_O_SERVICIO_11,PRODUCTO_O_SERVICIO_12,PRODUCTO_O_SERVICIO_13,PRODUCTO_O_SERVICIO_14,PRODUCTO_O_SERVICIO_15,PRODUCTO_O_SERVICIO_16,PRODUCTO_O_SERVICIO_17,PRODUCTO_O_SERVICIO_18,PRODUCTO_O_SERVICIO_19,PRODUCTO_O_SERVICIO_20,idRelacion) values ('".$PRODUCTO_O_SERVICIO_9."','".$PRODUCTO_O_SERVICIO_10."','".$PRODUCTO_O_SERVICIO_11."','".$PRODUCTO_O_SERVICIO_12."','".$PRODUCTO_O_SERVICIO_13."','".$PRODUCTO_O_SERVICIO_14."','".$PRODUCTO_O_SERVICIO_15."','".$PRODUCTO_O_SERVICIO_16."','".$PRODUCTO_O_SERVICIO_17."','".$PRODUCTO_O_SERVICIO_18."','".$PRODUCTO_O_SERVICIO_19."','".$PRODUCTO_O_SERVICIO_20."','".$session."');";
 
			if($ENVIARotroservicios1=='ENVIARotroservicios1'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizaron otros productos/servicios del proveedor.'
					.' Producto principal: '.$PRODUCTO_O_SERVICIO_9
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresaron otros productos/servicios del proveedor.'
					.' Producto principal: '.$PRODUCTO_O_SERVICIO_9
				);
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
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		// Obtener dato antes de borrar
		$rowBorrar = mysqli_fetch_array(mysqli_query($conn,"select PRODUCTO_O_SERVICIO_9, idRelacion from 02otrosproveedores where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02otrosproveedores where id = '".$id."' ");
		if($rowBorrar){
			$this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION',
				'Se eliminó registro de otros productos/servicios (ID:'.$id.').'
				.' Producto: '.$rowBorrar['PRODUCTO_O_SERVICIO_9']
			);
		}
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   LIGA DE PRODUCTOS
	   ═════════════════════════════════════════════════════════════ */
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
 
	public function enviarligaPROD($PRODUCTO_O_SERVICIO_LIGA,$PRODUCTO_SERVICIO_LIGA,$LIGA_SERVICIO_OBSERVACIONES,$ULTIMA_CARGA_LIGA,$hLIGA_PRODUCTOS,$IPLIGAproductosservp,$ENVIARLIGAervicios1){
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02ligaproveedor set PRODUCTO_O_SERVICIO_LIGA = '".$PRODUCTO_O_SERVICIO_LIGA."' ,PRODUCTO_SERVICIO_LIGA = '".$PRODUCTO_SERVICIO_LIGA."' , LIGA_SERVICIO_OBSERVACIONES = '".$LIGA_SERVICIO_OBSERVACIONES."' , ULTIMA_CARGA_LIGA = '".$ULTIMA_CARGA_LIGA."' , hLIGA_PRODUCTOS = '".$hLIGA_PRODUCTOS."' where id = '".$IPLIGAproductosservp."' ; ";
			$var2 = "insert into 02ligaproveedor (PRODUCTO_O_SERVICIO_LIGA,PRODUCTO_SERVICIO_LIGA,LIGA_SERVICIO_OBSERVACIONES,ULTIMA_CARGA_LIGA,hLIGA_PRODUCTOS,idRelacion) values('".$PRODUCTO_O_SERVICIO_LIGA."','".$PRODUCTO_SERVICIO_LIGA."','".$LIGA_SERVICIO_OBSERVACIONES."','".$ULTIMA_CARGA_LIGA."','".$hLIGA_PRODUCTOS."','".$_SESSION['idPROV']."');";
 
			if($ENVIARLIGAervicios1=='ENVIARLIGAervicios1'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó liga de producto/servicio (ID:'.$IPLIGAproductosservp.').'
					.' Producto: '.$PRODUCTO_O_SERVICIO_LIGA
					.' | Liga: '.$PRODUCTO_SERVICIO_LIGA
					.' | Observaciones: '.$LIGA_SERVICIO_OBSERVACIONES
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó liga de producto/servicio.'
					.' Producto: '.$PRODUCTO_O_SERVICIO_LIGA
					.' | Liga: '.$PRODUCTO_SERVICIO_LIGA
					.' | Observaciones: '.$LIGA_SERVICIO_OBSERVACIONES
				);
				return "Ingresado";
			}
		}else{
			echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; 
		}
    }
 
	public function listadoligaproductosyserv(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02ligaproveedor where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function listadoligaproductosyserv2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02ligaproveedor where id='".$id."' "); }
 
	public function borraLIGAservicios($id){
		$conn = $this->db();
		$rowBorrar = mysqli_fetch_array(mysqli_query($conn,"select PRODUCTO_O_SERVICIO_LIGA, idRelacion from 02ligaproveedor where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02ligaproveedor where id='".$id."' ");
		if($rowBorrar){
			$this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION',
				'Se eliminó liga de producto/servicio (ID:'.$id.').'
				.' Producto: '.$rowBorrar['PRODUCTO_O_SERVICIO_LIGA']
			);
		}
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   PRESENTACIÓN DE PRODUCTOS
	   ═════════════════════════════════════════════════════════════ */
	public function variable_presentacionpro(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02presentacionproduc where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_presentacionpro(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02presentacionproduc where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function enviarPRESENTAP($PRODUCTO_PRESENTA,$PRESENTACION_VIDEO,$PRESENTACION_OBSERVACIONES,$PRODUCTO_PRESENTACION_FECHA,$IPPRESSproductosservp,$ENVIApresenervicios1){
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02presentacionproduc set PRODUCTO_PRESENTA = '".$PRODUCTO_PRESENTA."' , PRESENTACION_OBSERVACIONES = '".$PRESENTACION_OBSERVACIONES."' , PRODUCTO_PRESENTACION_FECHA = '".$PRODUCTO_PRESENTACION_FECHA."' where id = '".$IPPRESSproductosservp."' ; ";
			$var2 = "insert into 02presentacionproduc (PRODUCTO_PRESENTA,PRESENTACION_VIDEO,PRESENTACION_OBSERVACIONES,PRODUCTO_PRESENTACION_FECHA,idRelacion) values('".$PRODUCTO_PRESENTA."','".$PRESENTACION_VIDEO."','".$PRESENTACION_OBSERVACIONES."','".$PRODUCTO_PRESENTACION_FECHA."','".$_SESSION['idPROV']."');";
 
			if($ENVIApresenervicios1=='ENVIApresenervicios1'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó presentación de producto (ID:'.$IPPRESSproductosservp.').'
					.' Producto: '.$PRODUCTO_PRESENTA
					.' | Observaciones: '.$PRESENTACION_OBSERVACIONES
					.' | Fecha: '.$PRODUCTO_PRESENTACION_FECHA
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó presentación de producto.'
					.' Producto: '.$PRODUCTO_PRESENTA
					.' | Observaciones: '.$PRESENTACION_OBSERVACIONES
					.' | Fecha: '.$PRODUCTO_PRESENTACION_FECHA
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function listadopresentaproductosyserv(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02presentacionproduc where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function listadopresentaproductosyserv2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02presentacionproduc where id='".$id."' "); }
 
	public function borrapreseservicios($id){
		$conn = $this->db();
		$rowBorrar = mysqli_fetch_array(mysqli_query($conn,"select PRODUCTO_PRESENTA, idRelacion from 02presentacionproduc where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02presentacionproduc where id='".$id."' ");
		if($rowBorrar){
			$this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION',
				'Se eliminó presentación de producto (ID:'.$id.').'
				.' Producto: '.$rowBorrar['PRODUCTO_PRESENTA']
			);
		}
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   NUEVO DOCUMENTO
	   ═════════════════════════════════════════════════════════════ */
	public function variable_nuevodocumentotodos(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02NUEVODOCUMENTO order by id desc"); }
	public function variable_nuevodocumento(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02NUEVODOCUMENTO where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_nuevodocumento(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02NUEVODOCUMENTO where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function nuevodocumento($nuevo_documento,$DOCUMENTO_FISCAL,$enviarnuevo_FISCAL,$IPnuevodocumento){
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02NUEVODOCUMENTO set nuevo_documento = '".$nuevo_documento."' , DOCUMENTO_FISCAL = '".$DOCUMENTO_FISCAL."' where id = '".$IPnuevodocumento."' ; ";
			$var2 = "insert into 02NUEVODOCUMENTO (nuevo_documento,DOCUMENTO_FISCAL,idRelacion) values('".$nuevo_documento."','".$DOCUMENTO_FISCAL."','".$session."');";
 
			if($enviarnuevo_FISCAL=='enviarnuevo_FISCAL'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó nuevo documento (ID:'.$IPnuevodocumento.').'
					.' Tipo: '.$nuevo_documento
					.' | Documento fiscal: '.$DOCUMENTO_FISCAL
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó nuevo documento.'
					.' Tipo: '.$nuevo_documento
					.' | Documento fiscal: '.$DOCUMENTO_FISCAL
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function listadoNUEVODOCUMENTO(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02NUEVODOCUMENTO order by id desc "); }
	public function listadoNUEVODOCUMENTO2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02NUEVODOCUMENTO where id='".$id."' "); }
 
	public function BORRARNUEVOFISCAL($id){
		$conn = $this->db();
		$rowBorrar = mysqli_fetch_array(mysqli_query($conn,"select nuevo_documento, idRelacion from 02NUEVODOCUMENTO where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02NUEVODOCUMENTO where id='".$id."' ");
		if($rowBorrar){
			$this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION',
				'Se eliminó nuevo documento (ID:'.$id.').'
				.' Tipo: '.$rowBorrar['nuevo_documento']
			);
		}
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   DOCUMENTOS FISCALES / LEGALES
	   ═════════════════════════════════════════════════════════════ */
	public function variable_documentosfiscales(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02DOCUMENTOSFISCALES where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_documentosfiscales(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02DOCUMENTOSFISCALES where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function documentofiscal($DOCUMENTO_LEGAL,$ADJUNTAR_DOCUMENTO_LEGAL,$ADJUNTAR_DOCUMENTO_OBSERVACIONES,$FECHA_ULTIMA_DOCUMEN,$validaDOCUMENTOSFISCAL,$IPdocumentosfiscales,$ENVIAFISCAL){
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02DOCUMENTOSFISCALES set DOCUMENTO_LEGAL = '".$DOCUMENTO_LEGAL."' , ADJUNTAR_DOCUMENTO_OBSERVACIONES = '".$ADJUNTAR_DOCUMENTO_OBSERVACIONES."' , FECHA_ULTIMA_DOCUMEN = '".$FECHA_ULTIMA_DOCUMEN."' where id = '".$IPdocumentosfiscales."' ; ";
			$var2 = "insert into 02DOCUMENTOSFISCALES (DOCUMENTO_LEGAL,ADJUNTAR_DOCUMENTO_LEGAL,ADJUNTAR_DOCUMENTO_OBSERVACIONES,FECHA_ULTIMA_DOCUMEN,idRelacion) values('".$DOCUMENTO_LEGAL."','".$ADJUNTAR_DOCUMENTO_LEGAL."','".$ADJUNTAR_DOCUMENTO_OBSERVACIONES."','".$FECHA_ULTIMA_DOCUMEN."','".$session."');";
 
			if($ENVIAFISCAL=='ENVIAFISCAL'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó documento fiscal/legal (ID:'.$IPdocumentosfiscales.').'
					.' Tipo: '.$DOCUMENTO_LEGAL
					.' | Observaciones: '.$ADJUNTAR_DOCUMENTO_OBSERVACIONES
					.' | Fecha: '.$FECHA_ULTIMA_DOCUMEN
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó documento fiscal/legal.'
					.' Tipo: '.$DOCUMENTO_LEGAL
					.' | Observaciones: '.$ADJUNTAR_DOCUMENTO_OBSERVACIONES
					.' | Fecha: '.$FECHA_ULTIMA_DOCUMEN
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function listadoDOCUMENTOSFISCALES(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02DOCUMENTOSFISCALES where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function listadoDOCUMENTOSFISCALES2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02DOCUMENTOSFISCALES where id='".$id."' "); }
 
	public function borradocufiscal($id){
		$conn = $this->db();
		$rowBorrar = mysqli_fetch_array(mysqli_query($conn,"select DOCUMENTO_LEGAL, idRelacion from 02DOCUMENTOSFISCALES where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02DOCUMENTOSFISCALES where id='".$id."' ");
		if($rowBorrar){
			$this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION',
				'Se eliminó documento fiscal/legal (ID:'.$id.').'
				.' Tipo: '.$rowBorrar['DOCUMENTO_LEGAL']
			);
		}
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   DIRECCIÓN PROVEEDOR 1  (ya tenía bitácora; se enriquece)
	   ═════════════════════════════════════════════════════════════ */
	public function variable_DIRECCIONP1(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02direccionproveedor1 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_DIRECCIONP1(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02direccionproveedor1 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function direccionproveedor1($P_NOMBRE_COMERCIAL_EMPRESA,$P_NOMBRE_FISCAL_RS_EMPRESA,$P_RFC_MTDP,$P_REGIMEN_FISCAL_MTDP,$_P_METODO_DE_PAGO,$P_FORMADE_PAGO,$P_USO_CFDI,$FISICA_MORAL,$P_DIRECCION_FISCAL_EMPRESA,$P_EDIFICIO_EMPRESA,$P_CALLE_EMPRESA,$P_NUMERO_EXTERIOR_EMPRESA,$P_NUMERO_INTERIOR_EMPRESA,$P_NUMERO_OFICINA_EMPRESA,$P_COLONIA_EMPRESA,$P_ALCALDIA_EMPRESA,$P_C_P_EMPRESA,$P_CIUDAD_EMPRESA,$P_ESTADO_EMPRESA,$P_PAIS_EMPRESA,$dircasa11,$P_UBICACION_MAPA_1,$P_TELEFONO_1_EMPRESA,$P_TELEFONO_2_EMPRESA,$P_WHATSAPP_EMPRESA_1,$P_IMAIL_EMPRESA,$P_PAGINA_WEB_EMPRESA,$P_NOMBRE_APP_EMPRESA){
		$conn    = $this->db();
		$existe  = $this->revisar_DIRECCIONP1();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
 
		$datosNuevos = array(
			'P_NOMBRE_COMERCIAL_EMPRESA'=>$P_NOMBRE_COMERCIAL_EMPRESA,'P_NOMBRE_FISCAL_RS_EMPRESA'=>$P_NOMBRE_FISCAL_RS_EMPRESA,
			'P_RFC_MTDP'=>$P_RFC_MTDP,'P_REGIMEN_FISCAL_MTDP'=>$P_REGIMEN_FISCAL_MTDP,'_P_METODO_DE_PAGO'=>$_P_METODO_DE_PAGO,
			'P_FORMADE_PAGO'=>$P_FORMADE_PAGO,'P_USO_CFDI'=>$P_USO_CFDI,'FISICA_MORAL'=>$FISICA_MORAL,
			'P_DIRECCION_FISCAL_EMPRESA'=>$P_DIRECCION_FISCAL_EMPRESA,'P_CALLE_EMPRESA'=>$P_CALLE_EMPRESA,
			'P_NUMERO_EXTERIOR_EMPRESA'=>$P_NUMERO_EXTERIOR_EMPRESA,'P_COLONIA_EMPRESA'=>$P_COLONIA_EMPRESA,
			'P_CIUDAD_EMPRESA'=>$P_CIUDAD_EMPRESA,'P_ESTADO_EMPRESA'=>$P_ESTADO_EMPRESA,'P_PAIS_EMPRESA'=>$P_PAIS_EMPRESA,
			'P_TELEFONO_1_EMPRESA'=>$P_TELEFONO_1_EMPRESA,'P_IMAIL_EMPRESA'=>$P_IMAIL_EMPRESA,'P_PAGINA_WEB_EMPRESA'=>$P_PAGINA_WEB_EMPRESA
		);
		$mapaCamposBitacora = array(
			'P_NOMBRE_COMERCIAL_EMPRESA'=>'Nombre comercial','P_NOMBRE_FISCAL_RS_EMPRESA'=>'Nombre fiscal',
			'P_RFC_MTDP'=>'RFC','P_REGIMEN_FISCAL_MTDP'=>'Régimen fiscal','_P_METODO_DE_PAGO'=>'Método de pago',
			'P_FORMADE_PAGO'=>'Forma de pago','P_USO_CFDI'=>'Uso CFDI','FISICA_MORAL'=>'Persona física/moral',
			'P_DIRECCION_FISCAL_EMPRESA'=>'Dirección fiscal','P_CALLE_EMPRESA'=>'Calle',
			'P_NUMERO_EXTERIOR_EMPRESA'=>'Número exterior','P_COLONIA_EMPRESA'=>'Colonia',
			'P_CIUDAD_EMPRESA'=>'Ciudad','P_ESTADO_EMPRESA'=>'Estado','P_PAIS_EMPRESA'=>'País',
			'P_TELEFONO_1_EMPRESA'=>'Teléfono principal','P_IMAIL_EMPRESA'=>'Email','P_PAGINA_WEB_EMPRESA'=>'Página web'
		);
 
		if($session != ''){
			$var1 = "update 02direccionproveedor1 set P_NOMBRE_COMERCIAL_EMPRESA='".$P_NOMBRE_COMERCIAL_EMPRESA."',P_NOMBRE_FISCAL_RS_EMPRESA='".$P_NOMBRE_FISCAL_RS_EMPRESA."',P_RFC_MTDP='".$P_RFC_MTDP."',P_REGIMEN_FISCAL_MTDP='".$P_REGIMEN_FISCAL_MTDP."',_P_METODO_DE_PAGO='".$_P_METODO_DE_PAGO."',P_FORMADE_PAGO='".$P_FORMADE_PAGO."',P_USO_CFDI='".$P_USO_CFDI."',FISICA_MORAL='".$FISICA_MORAL."',P_DIRECCION_FISCAL_EMPRESA='".$P_DIRECCION_FISCAL_EMPRESA."',P_EDIFICIO_EMPRESA='".$P_EDIFICIO_EMPRESA."',P_CALLE_EMPRESA='".$P_CALLE_EMPRESA."',P_NUMERO_EXTERIOR_EMPRESA='".$P_NUMERO_EXTERIOR_EMPRESA."',P_NUMERO_INTERIOR_EMPRESA='".$P_NUMERO_INTERIOR_EMPRESA."',P_NUMERO_OFICINA_EMPRESA='".$P_NUMERO_OFICINA_EMPRESA."',P_COLONIA_EMPRESA='".$P_COLONIA_EMPRESA."',P_ALCALDIA_EMPRESA='".$P_ALCALDIA_EMPRESA."',P_C_P_EMPRESA='".$P_C_P_EMPRESA."',P_CIUDAD_EMPRESA='".$P_CIUDAD_EMPRESA."',P_ESTADO_EMPRESA='".$P_ESTADO_EMPRESA."',P_PAIS_EMPRESA='".$P_PAIS_EMPRESA."',dircasa11='".$dircasa11."',P_UBICACION_MAPA_1='".$P_UBICACION_MAPA_1."',P_TELEFONO_1_EMPRESA='".$P_TELEFONO_1_EMPRESA."',P_TELEFONO_2_EMPRESA='".$P_TELEFONO_2_EMPRESA."',P_WHATSAPP_EMPRESA_1='".$P_WHATSAPP_EMPRESA_1."',P_IMAIL_EMPRESA='".$P_IMAIL_EMPRESA."',P_PAGINA_WEB_EMPRESA='".$P_PAGINA_WEB_EMPRESA."',P_NOMBRE_APP_EMPRESA='".$P_NOMBRE_APP_EMPRESA."' where idRelacion='".$session."' ;";
			$var2 = "insert into 02direccionproveedor1 (P_NOMBRE_COMERCIAL_EMPRESA,P_NOMBRE_FISCAL_RS_EMPRESA,P_RFC_MTDP,P_REGIMEN_FISCAL_MTDP,_P_METODO_DE_PAGO,P_FORMADE_PAGO,P_USO_CFDI,FISICA_MORAL,P_DIRECCION_FISCAL_EMPRESA,P_EDIFICIO_EMPRESA,P_CALLE_EMPRESA,P_NUMERO_EXTERIOR_EMPRESA,P_NUMERO_INTERIOR_EMPRESA,P_NUMERO_OFICINA_EMPRESA,P_COLONIA_EMPRESA,P_ALCALDIA_EMPRESA,P_C_P_EMPRESA,P_CIUDAD_EMPRESA,P_ESTADO_EMPRESA,P_PAIS_EMPRESA,dircasa11,P_UBICACION_MAPA_1,P_TELEFONO_1_EMPRESA,P_TELEFONO_2_EMPRESA,P_WHATSAPP_EMPRESA_1,P_IMAIL_EMPRESA,P_PAGINA_WEB_EMPRESA,P_NOMBRE_APP_EMPRESA,idRelacion) values('".$P_NOMBRE_COMERCIAL_EMPRESA."','".$P_NOMBRE_FISCAL_RS_EMPRESA."','".$P_RFC_MTDP."','".$P_REGIMEN_FISCAL_MTDP."','".$_P_METODO_DE_PAGO."','".$P_FORMADE_PAGO."','".$P_USO_CFDI."','".$FISICA_MORAL."','".$P_DIRECCION_FISCAL_EMPRESA."','".$P_EDIFICIO_EMPRESA."','".$P_CALLE_EMPRESA."','".$P_NUMERO_EXTERIOR_EMPRESA."','".$P_NUMERO_INTERIOR_EMPRESA."','".$P_NUMERO_OFICINA_EMPRESA."','".$P_COLONIA_EMPRESA."','".$P_ALCALDIA_EMPRESA."','".$P_C_P_EMPRESA."','".$P_CIUDAD_EMPRESA."','".$P_ESTADO_EMPRESA."','".$P_PAIS_EMPRESA."','".$dircasa11."','".$P_UBICACION_MAPA_1."','".$P_TELEFONO_1_EMPRESA."','".$P_TELEFONO_2_EMPRESA."','".$P_WHATSAPP_EMPRESA_1."','".$P_IMAIL_EMPRESA."','".$P_PAGINA_WEB_EMPRESA."','".$P_NOMBRE_APP_EMPRESA."','".$session."');";
 
			if($existe>=1){
				$datosAnteriores = $this->variable_DIRECCIONP1();
				$cambios = $this->construir_detalle_cambios($datosAnteriores,$datosNuevos,$mapaCamposBitacora);
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				mysqli_query($conn,"update 02usuarios set nommbrerazon='".$P_NOMBRE_COMERCIAL_EMPRESA."' where id='".$session."' ;") or die('P156'.mysqli_error($conn));
				$detalleBitacora = 'Se actualizó información de dirección y datos fiscales del proveedor.';
				if(!empty($cambios)) $detalleBitacora .= ' Cambios: '.implode(' | ',$cambios);
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',$detalleBitacora);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				mysqli_query($conn,"update 02usuarios set nommbrerazon='".$P_NOMBRE_COMERCIAL_EMPRESA."' where id='".$session."' ;") or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se registró información inicial de dirección y datos fiscales del proveedor.'
					.' Nombre comercial: '.$P_NOMBRE_COMERCIAL_EMPRESA
					.' | RFC: '.$P_RFC_MTDP
					.' | Régimen: '.$P_REGIMEN_FISCAL_MTDP
					.' | Ciudad: '.$P_CIUDAD_EMPRESA
					.' | Estado: '.$P_ESTADO_EMPRESA
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	/* ═════════════════════════════════════════════════════════════
	   MÉTODO DE PAGO / CONVENIO
	   ═════════════════════════════════════════════════════════════ */
	public function revisar_metodopagoproveedor(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'SELECT id FROM 02metodopago WHERE idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return isset($row['id'])?$row['id']:null; }
 
	public function metodopagoproveedor($P_CONDICIONES_DE_PAGO,$P_LIMITE_DE_CREDITO,$P_FECHA_INICIO_NUEVO_CONVENIO,$P_FECHA_FINALIZACION_CONVENIO,$P_PORCENTAJE_COMISION_OTORGA,$CONVENIO_PROVEEDOR,$OBSERVACIONES_CONVENIO,$ULTIMA_CARGA_CONVENIO,$CONVENIO_DOPROVEEDOR,$ENVIACONVENIO,$ipconvenio){
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		$VALIDAMETODOPAGO = isset($VALIDAMETODOPAGO)?$VALIDAMETODOPAGO:'';
 
		if($session != ''){
			$var1 = "UPDATE 02metodopago SET P_CONDICIONES_DE_PAGO='".$P_CONDICIONES_DE_PAGO."',P_LIMITE_DE_CREDITO='".$P_LIMITE_DE_CREDITO."',P_FECHA_INICIO_NUEVO_CONVENIO='".$P_FECHA_INICIO_NUEVO_CONVENIO."',P_FECHA_FINALIZACION_CONVENIO='".$P_FECHA_FINALIZACION_CONVENIO."',P_PORCENTAJE_COMISION_OTORGA='".$P_PORCENTAJE_COMISION_OTORGA."',CONVENIO_PROVEEDOR='".$CONVENIO_PROVEEDOR."',OBSERVACIONES_CONVENIO='".$OBSERVACIONES_CONVENIO."',ULTIMA_CARGA_CONVENIO='".$ULTIMA_CARGA_CONVENIO."',VALIDAMETODOPAGO='".$VALIDAMETODOPAGO."' WHERE id='".$ipconvenio."' ;";
			$var2 = "INSERT INTO 02metodopago (P_CONDICIONES_DE_PAGO,P_LIMITE_DE_CREDITO,P_FECHA_INICIO_NUEVO_CONVENIO,P_FECHA_FINALIZACION_CONVENIO,P_PORCENTAJE_COMISION_OTORGA,CONVENIO_PROVEEDOR,OBSERVACIONES_CONVENIO,ULTIMA_CARGA_CONVENIO,CONVENIO_DOPROVEEDOR,idRelacion) VALUES ('".$P_CONDICIONES_DE_PAGO."','".$P_LIMITE_DE_CREDITO."','".$P_FECHA_INICIO_NUEVO_CONVENIO."','".$P_FECHA_FINALIZACION_CONVENIO."','".$P_PORCENTAJE_COMISION_OTORGA."','".$CONVENIO_PROVEEDOR."','".$OBSERVACIONES_CONVENIO."','".$ULTIMA_CARGA_CONVENIO."','".$CONVENIO_DOPROVEEDOR."','".$_SESSION['idPROV']."');";
 
			if($ENVIACONVENIO=='ENVIACONVENIO'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó método de pago / convenio (ID:'.$ipconvenio.').'
					.' Condiciones: '.$P_CONDICIONES_DE_PAGO
					.' | Límite crédito: '.$P_LIMITE_DE_CREDITO
					.' | Hay convenio: '.$CONVENIO_PROVEEDOR
					.' | Vigencia: '.$P_FECHA_INICIO_NUEVO_CONVENIO.' al '.$P_FECHA_FINALIZACION_CONVENIO
					.' | % Comisión: '.$P_PORCENTAJE_COMISION_OTORGA
					.' | Observaciones: '.$OBSERVACIONES_CONVENIO
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó método de pago / convenio.'
					.' Condiciones: '.$P_CONDICIONES_DE_PAGO
					.' | Límite crédito: '.$P_LIMITE_DE_CREDITO
					.' | Hay convenio: '.$CONVENIO_PROVEEDOR
					.' | Vigencia: '.$P_FECHA_INICIO_NUEVO_CONVENIO.' al '.$P_FECHA_FINALIZACION_CONVENIO
					.' | % Comisión: '.$P_PORCENTAJE_COMISION_OTORGA
					.' | Observaciones: '.$OBSERVACIONES_CONVENIO
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	public function listadoCONDICIONES(){ $conn=$this->db(); return mysqli_query($conn,"SELECT * FROM 02metodopago WHERE idRelacion='".$_SESSION['idPROV']."' ORDER BY id DESC "); }
	public function listadoCONDICIONES2($id){ $conn=$this->db(); return mysqli_query($conn,"SELECT * FROM 02metodopago WHERE id='".$id."' "); }
 
	public function borraMETODODP($id){
		$conn = $this->db();
		$rowBorrar = mysqli_fetch_array(mysqli_query($conn,"SELECT P_CONDICIONES_DE_PAGO, idRelacion FROM 02metodopago WHERE id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"DELETE FROM 02metodopago WHERE id='".$id."' ");
		if($rowBorrar){
			$this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION',
				'Se eliminó método de pago/convenio (ID:'.$id.').'
				.' Condiciones: '.$rowBorrar['P_CONDICIONES_DE_PAGO']
			);
		}
		return "<p style='color:green; font-size:25px;'>ELEMENTO BORRADO</p>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   CONTACTOS PROVEEDOR
	   ═════════════════════════════════════════════════════════════ */
	public function variable_contactosPRO(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02contactosprovee where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_contactosPRO(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02contactosprovee where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function enviarNOMBRECONTACTO1($DEPARTAMENTO_CONTACTO,$NOMBRE_CONTACTO_PROVEE,$CEL_CONTACTO_PROVEE,$TELEFONO_CONTACPROVEE,$NUMERO_EXTENSION_PROVEE,$EMAIL_CONTACTO_PROVEE,$OBSERVACIONES_PROVEE,$FECHA_CONTACTOS_PROVEE,$TARJETA_PRE,$validaNOMBRECONTACTO1,$IPcontactosproveedores,$ENVIACONTACTPRO){
		$conn    = $this->db();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02contactosprovee set DEPARTAMENTO_CONTACTO='".$DEPARTAMENTO_CONTACTO."',NOMBRE_CONTACTO_PROVEE='".$NOMBRE_CONTACTO_PROVEE."',CEL_CONTACTO_PROVEE='".$CEL_CONTACTO_PROVEE."',TELEFONO_CONTACPROVEE='".$TELEFONO_CONTACPROVEE."',EMAIL_CONTACTO_PROVEE='".$EMAIL_CONTACTO_PROVEE."',NUMERO_EXTENSION_PROVEE='".$NUMERO_EXTENSION_PROVEE."',OBSERVACIONES_PROVEE='".$OBSERVACIONES_PROVEE."',FECHA_CONTACTOS_PROVEE='".$FECHA_CONTACTOS_PROVEE."',TARJETA_PRE='".$TARJETA_PRE."',validaNOMBRECONTACTO1='".$validaNOMBRECONTACTO1."' where id='".$IPcontactosproveedores."' ;";
			$var2 = "insert into 02contactosprovee (DEPARTAMENTO_CONTACTO,NOMBRE_CONTACTO_PROVEE,CEL_CONTACTO_PROVEE,TELEFONO_CONTACPROVEE,EMAIL_CONTACTO_PROVEE,NUMERO_EXTENSION_PROVEE,OBSERVACIONES_PROVEE,FECHA_CONTACTOS_PROVEE,TARJETA_PRE,validaNOMBRECONTACTO1,idRelacion) values('".$DEPARTAMENTO_CONTACTO."','".$NOMBRE_CONTACTO_PROVEE."','".$CEL_CONTACTO_PROVEE."','".$TELEFONO_CONTACPROVEE."','".$EMAIL_CONTACTO_PROVEE."','".$NUMERO_EXTENSION_PROVEE."','".$OBSERVACIONES_PROVEE."','".$FECHA_CONTACTOS_PROVEE."','".$TARJETA_PRE."','".$validaNOMBRECONTACTO1."','".$_SESSION['idPROV']."');";
 
			if($ENVIACONTACTPRO=='ENVIACONTACTPRO'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó contacto (ID:'.$IPcontactosproveedores.').'
					.' Nombre: '.$NOMBRE_CONTACTO_PROVEE
					.' | Departamento: '.$DEPARTAMENTO_CONTACTO
					.' | Cel: '.$CEL_CONTACTO_PROVEE
					.' | Tel: '.$TELEFONO_CONTACPROVEE
					.' | Email: '.$EMAIL_CONTACTO_PROVEE
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó nuevo contacto.'
					.' Nombre: '.$NOMBRE_CONTACTO_PROVEE
					.' | Departamento: '.$DEPARTAMENTO_CONTACTO
					.' | Cel: '.$CEL_CONTACTO_PROVEE
					.' | Tel: '.$TELEFONO_CONTACPROVEE
					.' | Email: '.$EMAIL_CONTACTO_PROVEE
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function listadocontactospro(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02contactosprovee where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function listadocontactospro2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02contactosprovee where id='".$id."' "); }
 
	public function borracontactprovee($id){
		$conn = $this->db();
		$rowBorrar = mysqli_fetch_array(mysqli_query($conn,"select NOMBRE_CONTACTO_PROVEE, DEPARTAMENTO_CONTACTO, idRelacion from 02contactosprovee where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02contactosprovee where id='".$id."' ");
		if($rowBorrar){
			$this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION',
				'Se eliminó contacto (ID:'.$id.').'
				.' Nombre: '.$rowBorrar['NOMBRE_CONTACTO_PROVEE']
				.' | Departamento: '.$rowBorrar['DEPARTAMENTO_CONTACTO']
			);
		}
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   CONTACTO VENTAS 2
	   ═════════════════════════════════════════════════════════════ */
	public function variable_contactoventasP2(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02contacto_ventas2 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_contactoventasP2(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02contacto_ventas2 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function contactoventasproveedor2($P_NOMBRE_DEL_CONTACTO_CF,$P_NOMBRE_DEL_CONTACTO_NP,$P_NOMBRE_DEL_CONTACTO_EDE,$P_NUMERO_CEL_CONTACTO_CF,$P_NUMERO_CEL_CONTACTO_NP,$P_NUMERO_CEL_CONTACTO_EDE,$P_NUMERO_OFICINA_CF,$P_NUMERO_OFICINA_NP,$P_NUMERO_OFICINA_EDE,$P_NUMERO_EXTENSION_CF,$P_NUMERO_EXTENSION_NP,$P_NUMERO_EXTENSION_EDE,$P_IMAIL_CONTACTO_CF,$P_IMAIL_CONTACTO_NP,$P_IMAIL_CONTACTO_EDE){
		$conn    = $this->db();
		$existe  = $this->revisar_contactoventasP2();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02contacto_ventas2 set P_NOMBRE_DEL_CONTACTO_CF='".$P_NOMBRE_DEL_CONTACTO_CF."',P_NOMBRE_DEL_CONTACTO_NP='".$P_NOMBRE_DEL_CONTACTO_NP."',P_NOMBRE_DEL_CONTACTO_EDE='".$P_NOMBRE_DEL_CONTACTO_EDE."',P_NUMERO_CEL_CONTACTO_CF='".$P_NUMERO_CEL_CONTACTO_CF."',P_NUMERO_CEL_CONTACTO_NP='".$P_NUMERO_CEL_CONTACTO_NP."',P_NUMERO_CEL_CONTACTO_EDE='".$P_NUMERO_CEL_CONTACTO_EDE."',P_NUMERO_OFICINA_CF='".$P_NUMERO_OFICINA_CF."',P_NUMERO_OFICINA_NP='".$P_NUMERO_OFICINA_NP."',P_NUMERO_OFICINA_EDE='".$P_NUMERO_OFICINA_EDE."',P_NUMERO_EXTENSION_CF='".$P_NUMERO_EXTENSION_CF."',P_NUMERO_EXTENSION_NP='".$P_NUMERO_EXTENSION_NP."',P_NUMERO_EXTENSION_EDE='".$P_NUMERO_EXTENSION_EDE."',P_IMAIL_CONTACTO_CF='".$P_IMAIL_CONTACTO_CF."',P_IMAIL_CONTACTO_NP='".$P_IMAIL_CONTACTO_NP."',P_IMAIL_CONTACTO_EDE='".$P_IMAIL_CONTACTO_EDE."' where idRelacion='".$session."' ;";
			$var2 = "insert into 02contacto_ventas2 (P_NOMBRE_DEL_CONTACTO_CF,P_NOMBRE_DEL_CONTACTO_NP,P_NOMBRE_DEL_CONTACTO_EDE,P_NUMERO_CEL_CONTACTO_CF,P_NUMERO_CEL_CONTACTO_NP,P_NUMERO_CEL_CONTACTO_EDE,P_NUMERO_OFICINA_CF,P_NUMERO_OFICINA_NP,P_NUMERO_OFICINA_EDE,P_NUMERO_EXTENSION_CF,P_NUMERO_EXTENSION_NP,P_NUMERO_EXTENSION_EDE,P_IMAIL_CONTACTO_CF,P_IMAIL_CONTACTO_NP,P_IMAIL_CONTACTO_EDE,idRelacion) values('".$P_NOMBRE_DEL_CONTACTO_CF."','".$P_NOMBRE_DEL_CONTACTO_NP."','".$P_NOMBRE_DEL_CONTACTO_EDE."','".$P_NUMERO_CEL_CONTACTO_CF."','".$P_NUMERO_CEL_CONTACTO_NP."','".$P_NUMERO_CEL_CONTACTO_EDE."','".$P_NUMERO_OFICINA_CF."','".$P_NUMERO_OFICINA_NP."','".$P_NUMERO_OFICINA_EDE."','".$P_NUMERO_EXTENSION_CF."','".$P_NUMERO_EXTENSION_NP."','".$P_NUMERO_EXTENSION_EDE."','".$P_IMAIL_CONTACTO_CF."','".$P_IMAIL_CONTACTO_NP."','".$P_IMAIL_CONTACTO_EDE."','".$session."');";
 
			if($existe>=1){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizaron contactos de ventas (sección 2).'
					.' Contacto CF: '.$P_NOMBRE_DEL_CONTACTO_CF
					.' | Contacto NP: '.$P_NOMBRE_DEL_CONTACTO_NP
					.' | Contacto EDE: '.$P_NOMBRE_DEL_CONTACTO_EDE
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresaron contactos de ventas (sección 2).'
					.' Contacto CF: '.$P_NOMBRE_DEL_CONTACTO_CF
					.' | Contacto NP: '.$P_NOMBRE_DEL_CONTACTO_NP
					.' | Contacto EDE: '.$P_NOMBRE_DEL_CONTACTO_EDE
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	/* ═════════════════════════════════════════════════════════════
	   CONTACTO VENTAS 3
	   ═════════════════════════════════════════════════════════════ */
	public function variable_contactoventasP3(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02contacto_ventas3 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_contactoventasP3(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02contacto_ventas3 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function contactoventasproveedor3($P_NOMBRE_DEL_CONTACTO_CF_2,$P_NOMBRE_DEL_CONTACTO_NP_2,$P_NOMBRE_DEL_CONTACTO_EDE_2,$P_NUMERO_CEL_CONTACTO_CF_2,$P_NUMERO_CEL_CONTACTO_NP_2,$P_NUMERO_CEL_CONTACTO_EDE_2,$P_NUMERO_OFICINA_CF_2,$P_NUMERO_OFICINA_NP_2,$P_NUMERO_OFICINA_EDE_2,$P_NUMERO_EXTENSION_CF_2,$P_NUMERO_EXTENSION_NP_2,$P_NUMERO_EXTENSION_EDE_2,$P_IMAIL_CONTACTO_CF_2,$P_IMAIL_CONTACTO_NP_2,$P_IMAIL_CONTACTO_EDE_2){
		$conn    = $this->db();
		$existe  = $this->revisar_contactoventasP3();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02contacto_ventas3 set P_NOMBRE_DEL_CONTACTO_CF_2='".$P_NOMBRE_DEL_CONTACTO_CF_2."',P_NOMBRE_DEL_CONTACTO_NP_2='".$P_NOMBRE_DEL_CONTACTO_NP_2."',P_NOMBRE_DEL_CONTACTO_EDE_2='".$P_NOMBRE_DEL_CONTACTO_EDE_2."',P_NUMERO_CEL_CONTACTO_CF_2='".$P_NUMERO_CEL_CONTACTO_CF_2."',P_NUMERO_CEL_CONTACTO_NP_2='".$P_NUMERO_CEL_CONTACTO_NP_2."',P_NUMERO_CEL_CONTACTO_EDE_2='".$P_NUMERO_CEL_CONTACTO_EDE_2."',P_NUMERO_OFICINA_CF_2='".$P_NUMERO_OFICINA_CF_2."',P_NUMERO_OFICINA_NP_2='".$P_NUMERO_OFICINA_NP_2."',P_NUMERO_OFICINA_EDE_2='".$P_NUMERO_OFICINA_EDE_2."',P_NUMERO_EXTENSION_CF_2='".$P_NUMERO_EXTENSION_CF_2."',P_NUMERO_EXTENSION_NP_2='".$P_NUMERO_EXTENSION_NP_2."',P_NUMERO_EXTENSION_EDE_2='".$P_NUMERO_EXTENSION_EDE_2."',P_IMAIL_CONTACTO_CF_2='".$P_IMAIL_CONTACTO_CF_2."',P_IMAIL_CONTACTO_NP_2='".$P_IMAIL_CONTACTO_NP_2."',P_IMAIL_CONTACTO_EDE_2='".$P_IMAIL_CONTACTO_EDE_2."' where idRelacion='".$session."' ;";
			$var2 = "insert into 02contacto_ventas3 (P_NOMBRE_DEL_CONTACTO_CF_2,P_NOMBRE_DEL_CONTACTO_NP_2,P_NOMBRE_DEL_CONTACTO_EDE_2,P_NUMERO_CEL_CONTACTO_CF_2,P_NUMERO_CEL_CONTACTO_NP_2,P_NUMERO_CEL_CONTACTO_EDE_2,P_NUMERO_OFICINA_CF_2,P_NUMERO_OFICINA_NP_2,P_NUMERO_OFICINA_EDE_2,P_NUMERO_EXTENSION_CF_2,P_NUMERO_EXTENSION_NP_2,P_NUMERO_EXTENSION_EDE_2,P_IMAIL_CONTACTO_CF_2,P_IMAIL_CONTACTO_NP_2,P_IMAIL_CONTACTO_EDE_2,idRelacion) values('".$P_NOMBRE_DEL_CONTACTO_CF_2."','".$P_NOMBRE_DEL_CONTACTO_NP_2."','".$P_NOMBRE_DEL_CONTACTO_EDE_2."','".$P_NUMERO_CEL_CONTACTO_CF_2."','".$P_NUMERO_CEL_CONTACTO_NP_2."','".$P_NUMERO_CEL_CONTACTO_EDE_2."','".$P_NUMERO_OFICINA_CF_2."','".$P_NUMERO_OFICINA_NP_2."','".$P_NUMERO_OFICINA_EDE_2."','".$P_NUMERO_EXTENSION_CF_2."','".$P_NUMERO_EXTENSION_NP_2."','".$P_NUMERO_EXTENSION_EDE_2."','".$P_IMAIL_CONTACTO_CF_2."','".$P_IMAIL_CONTACTO_NP_2."','".$P_IMAIL_CONTACTO_EDE_2."','".$session."');";
 
			if($existe>=1){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizaron contactos de ventas (sección 3).'
					.' Contacto CF: '.$P_NOMBRE_DEL_CONTACTO_CF_2
					.' | Contacto NP: '.$P_NOMBRE_DEL_CONTACTO_NP_2
					.' | Contacto EDE: '.$P_NOMBRE_DEL_CONTACTO_EDE_2
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresaron contactos de ventas (sección 3).'
					.' Contacto CF: '.$P_NOMBRE_DEL_CONTACTO_CF_2
					.' | Contacto NP: '.$P_NOMBRE_DEL_CONTACTO_NP_2
					.' | Contacto EDE: '.$P_NOMBRE_DEL_CONTACTO_EDE_2
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	/* ═════════════════════════════════════════════════════════════
	   PRODUCTOS / SERVICIOS
	   ═════════════════════════════════════════════════════════════ */
	public function variable_productosservicios(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02productosservicios where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_productosservicios(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02productosservicios where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function productosservicios2($PROVEEDOR_DE_EPC,$PROVEEDOR_DE_INNOVAC,$PROVEEDOR_DE_JUST,$CALIFICACIONPSG,$CALIFICACION_TR,$MOTIVO_CALIFICACION,$CIUDAD_SERVICIO,$PAIS_SERVICIO,$PFECHA_ULTIMACOMPRA,$PFECHA_ACTUA_DOCUM,$PCONTACTADO_POR,$P_OTRO,$PLIGA_FOTOS_VIDEOS,$PRODUCTO_O_SERVICIO,$PRODUCTO_O_SERVICIO_2,$PRODUCTO_O_SERVICIO_3,$PRODUCTO_O_SERVICIO_4,$PRODUCTO_O_SERVICIO_5,$PRODUCTO_O_SERVICIO_6,$PRODUCTO_O_SERVICIO_7,$PRODUCTO_O_SERVICIO_8){
		$conn    = $this->db();
		$existe  = $this->revisar_productosservicios();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			$var1 = "update 02productosservicios set PROVEEDOR_DE_EPC='".$PROVEEDOR_DE_EPC."',PROVEEDOR_DE_INNOVAC='".$PROVEEDOR_DE_INNOVAC."',PROVEEDOR_DE_JUST='".$PROVEEDOR_DE_JUST."',CALIFICACIONPSG='".$CALIFICACIONPSG."',CALIFICACION_TR='".$CALIFICACION_TR."',MOTIVO_CALIFICACION='".$MOTIVO_CALIFICACION."',CIUDAD_SERVICIO='".$CIUDAD_SERVICIO."',PAIS_SERVICIO='".$PAIS_SERVICIO."',PFECHA_ULTIMACOMPRA='".$PFECHA_ULTIMACOMPRA."',PFECHA_ACTUA_DOCUM='".$PFECHA_ACTUA_DOCUM."',PCONTACTADO_POR='".$PCONTACTADO_POR."',P_OTRO='".$P_OTRO."',PLIGA_FOTOS_VIDEOS='".$PLIGA_FOTOS_VIDEOS."',PRODUCTO_O_SERVICIO='".$PRODUCTO_O_SERVICIO."',PRODUCTO_O_SERVICIO_2='".$PRODUCTO_O_SERVICIO_2."',PRODUCTO_O_SERVICIO_3='".$PRODUCTO_O_SERVICIO_3."',PRODUCTO_O_SERVICIO_4='".$PRODUCTO_O_SERVICIO_4."',PRODUCTO_O_SERVICIO_5='".$PRODUCTO_O_SERVICIO_5."',PRODUCTO_O_SERVICIO_6='".$PRODUCTO_O_SERVICIO_6."',PRODUCTO_O_SERVICIO_7='".$PRODUCTO_O_SERVICIO_7."',PRODUCTO_O_SERVICIO_8='".$PRODUCTO_O_SERVICIO_8."' where idRelacion='".$session."' ;";
			$var2 = "insert into 02productosservicios (PROVEEDOR_DE_EPC,PROVEEDOR_DE_INNOVAC,PROVEEDOR_DE_JUST,CALIFICACIONPSG,CALIFICACION_TR,MOTIVO_CALIFICACION,CIUDAD_SERVICIO,PAIS_SERVICIO,PFECHA_ULTIMACOMPRA,PFECHA_ACTUA_DOCUM,PCONTACTADO_POR,P_OTRO,PLIGA_FOTOS_VIDEOS,PRODUCTO_O_SERVICIO,PRODUCTO_O_SERVICIO_2,PRODUCTO_O_SERVICIO_3,PRODUCTO_O_SERVICIO_4,PRODUCTO_O_SERVICIO_5,PRODUCTO_O_SERVICIO_6,PRODUCTO_O_SERVICIO_7,PRODUCTO_O_SERVICIO_8,idRelacion) values('".$PROVEEDOR_DE_EPC."','".$PROVEEDOR_DE_INNOVAC."','".$PROVEEDOR_DE_JUST."','".$CALIFICACIONPSG."','".$CALIFICACION_TR."','".$MOTIVO_CALIFICACION."','".$CIUDAD_SERVICIO."','".$PAIS_SERVICIO."','".$PFECHA_ULTIMACOMPRA."','".$PFECHA_ACTUA_DOCUM."','".$PCONTACTADO_POR."','".$P_OTRO."','".$PLIGA_FOTOS_VIDEOS."','".$PRODUCTO_O_SERVICIO."','".$PRODUCTO_O_SERVICIO_2."','".$PRODUCTO_O_SERVICIO_3."','".$PRODUCTO_O_SERVICIO_4."','".$PRODUCTO_O_SERVICIO_5."','".$PRODUCTO_O_SERVICIO_6."','".$PRODUCTO_O_SERVICIO_7."','".$PRODUCTO_O_SERVICIO_8."','".$session."');";
 
			if($existe>=1){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó información de productos/servicios del proveedor.'
					.' Servicio principal: '.$PRODUCTO_O_SERVICIO
					.' | Ciudad: '.$CIUDAD_SERVICIO
					.' | País: '.$PAIS_SERVICIO
					.' | Calificación PSG: '.$CALIFICACIONPSG
					.' | Calificación TR: '.$CALIFICACION_TR
					.' | Motivo: '.$MOTIVO_CALIFICACION
					.' | Contactado por: '.$PCONTACTADO_POR
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó información de productos/servicios del proveedor.'
					.' Servicio principal: '.$PRODUCTO_O_SERVICIO
					.' | Ciudad: '.$CIUDAD_SERVICIO
					.' | País: '.$PAIS_SERVICIO
					.' | Contactado por: '.$PCONTACTADO_POR
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	// productosservicios (versión reducida - misma lógica)
	public function productosservicios($PROVEEDOR_DE_EPC,$PROVEEDOR_DE_INNOVAC,$PROVEEDOR_DE_JUST,$CALIFICACIONPSG,$CALIFICACION_TR,$MOTIVO_CALIFICACION,$CIUDAD_SERVICIO,$PAIS_SERVICIO,$PFECHA_ULTIMACOMPRA,$PFECHA_ACTUA_DOCUM,$PCONTACTADO_POR,$P_OTRO){
		return $this->productosservicios2($PROVEEDOR_DE_EPC,$PROVEEDOR_DE_INNOVAC,$PROVEEDOR_DE_JUST,$CALIFICACIONPSG,$CALIFICACION_TR,$MOTIVO_CALIFICACION,$CIUDAD_SERVICIO,$PAIS_SERVICIO,$PFECHA_ULTIMACOMPRA,$PFECHA_ACTUA_DOCUM,$PCONTACTADO_POR,$P_OTRO,'','','','','','','','','');
	}
 
	/* ═════════════════════════════════════════════════════════════
	   ADJUNTOS / DOCUMENTOS LEGALES  (upload)
	   ═════════════════════════════════════════════════════════════ */
	public function variablesadjuntosproveedor(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02adjuntardocumentos where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_adjuntosproveedor(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02adjuntardocumentos where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function sologuardarproveedor($campo,$nuevonombre){
		$conn    = $this->db();
		$existe  = $this->revisar_adjuntosproveedor();
		$session = isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session != ''){
			if($existe>=1){
				mysqli_query($conn,"update 02adjuntardocumentos set ".$campo."='".$nuevonombre."' where idRelacion='".$_SESSION['idPROV']."' ");
			}else{
				mysqli_query($conn,"insert into 02adjuntardocumentos (idRelacion) values('".$_SESSION['idPROV']."') ");
				mysqli_query($conn,"update 02adjuntardocumentos set ".$campo."='".$nuevonombre."' where idRelacion='".$_SESSION['idPROV']."' ");
			}
			$this->registrar_bitacora_proveedor($session,'ADJUNTO',
				'Se adjuntó archivo en campo "'.$campo.'".'
				.' Archivo: '.$nuevonombre
			);
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	public function cargarproveedor($archivo){
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		opendir($nombre_carpeta);
		$nombretemp=$_FILES[$archivo]["tmp_name"]; $nombrearchivo=$_FILES[$archivo]["name"];
		$extension=explode('.',$nombrearchivo); $cuenta=count($extension)-1;
		$nuevonombre=$archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		if(in_array(strtolower($extension[$cuenta]),array('pdf','gif','jpeg','jpg','png'))){
			if(move_uploaded_file($nombretemp,$nombre_carpeta.'/'.$nuevonombre)){
				chmod($nombre_carpeta.'/'.$nuevonombre,0755);
				$this->sologuardarproveedor($archivo,$nuevonombre);
				return trim($nuevonombre);
			}else{ return "1"; }
		}else{ return "2"; }
	}
 
	/* ─── INFOPRODUCTOS (upload) ─── */
	public function variablesINFOPRODUCTOS(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02productosservicios where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_INFOPRODUCTOS(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02productosservicios where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function sologuardarINFOPRODUCTOS($campo,$nuevonombre){
		$conn=$this->db(); $existe=$this->revisar_INFOPRODUCTOS(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			if($existe>=1){ mysqli_query($conn,"update 02productosservicios set ".$campo."='".$nuevonombre."' where idRelacion='".$_SESSION['idPROV']."' "); }
			else{ mysqli_query($conn,"insert into 02productosservicios (idRelacion) values('".$_SESSION['idPROV']."') "); mysqli_query($conn,"update 02productosservicios set ".$campo."='".$nuevonombre."' where idRelacion='".$_SESSION['idPROV']."' "); }
			$this->registrar_bitacora_proveedor($session,'ADJUNTO','Se adjuntó imagen/info de producto en campo "'.$campo.'". Archivo: '.$nuevonombre);
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	public function cargarINFOPRODUCTOS($archivo){
		$nombre_carpeta=__ROOT2__.'/includes/archivos'; opendir($nombre_carpeta);
		$nombretemp=$_FILES[$archivo]["tmp_name"]; $nombrearchivo=$_FILES[$archivo]["name"];
		$extension=explode('.',$nombrearchivo); $cuenta=count($extension)-1;
		$nuevonombre=$archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		if(in_array(strtolower($extension[$cuenta]),array('pdf','gif','jpeg','jpg','png'))){
			if(move_uploaded_file($nombretemp,$nombre_carpeta.'/'.$nuevonombre)){ chmod($nombre_carpeta.'/'.$nuevonombre,0755); $this->sologuardarINFOPRODUCTOS($archivo,$nuevonombre); return trim($nuevonombre); }else{ return "1"; }
		}else{ return "2"; }
	}
 
	/* ═════════════════════════════════════════════════════════════
	   OTROS DOCUMENTOS
	   ═════════════════════════════════════════════════════════════ */
	public function variable_OTROSDOCUMENTOS(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02otrosdocumentos where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_OTROSDOCUMENTOS(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02otrosdocumentos where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function OTROSDOCUMENTOS($F_PADJUNTAR_OTRO_DOCUMENTO_4_1,$F_PADJUNTAR_OTRO_DOCUMENTO_5_1,$F_PADJUNTAR_OTRO_DOCUMENTO_6_1,$F_PADJUNTAR_OTRO_DOCUMENTO_7_1,$F_PADJUNTAR_OTRO_DOCUMENTO_8_1,$F_PADJUNTAR_OTRO_DOCUMENTO_9_1,$F_PADJUNTAR_OTRO_DOCUMENTO_10_1,$F_PADJUNTAR_OTRO_DOCUMENTO_11_1,$F_PADJUNTAR_OTRO_DOCUMENTO_12_1,$IPotrosdocumentosservp,$ENVIAOTROSdocuu1){
		$conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02otrosdocumentos set F_PADJUNTAR_OTRO_DOCUMENTO_4_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_4_1."',F_PADJUNTAR_OTRO_DOCUMENTO_6_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_6_1."',F_PADJUNTAR_OTRO_DOCUMENTO_7_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_7_1."',F_PADJUNTAR_OTRO_DOCUMENTO_8_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_8_1."',F_PADJUNTAR_OTRO_DOCUMENTO_9_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_9_1."',F_PADJUNTAR_OTRO_DOCUMENTO_10_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_10_1."',F_PADJUNTAR_OTRO_DOCUMENTO_11_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_11_1."',F_PADJUNTAR_OTRO_DOCUMENTO_12_1='".$F_PADJUNTAR_OTRO_DOCUMENTO_12_1."' where id='".$IPotrosdocumentosservp."' ;";
			$var2="insert into 02otrosdocumentos (F_PADJUNTAR_OTRO_DOCUMENTO_4_1,F_PADJUNTAR_OTRO_DOCUMENTO_5_1,F_PADJUNTAR_OTRO_DOCUMENTO_6_1,F_PADJUNTAR_OTRO_DOCUMENTO_7_1,F_PADJUNTAR_OTRO_DOCUMENTO_8_1,F_PADJUNTAR_OTRO_DOCUMENTO_9_1,F_PADJUNTAR_OTRO_DOCUMENTO_10_1,F_PADJUNTAR_OTRO_DOCUMENTO_11_1,F_PADJUNTAR_OTRO_DOCUMENTO_12_1,idRelacion) values('".$F_PADJUNTAR_OTRO_DOCUMENTO_4_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_5_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_6_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_7_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_8_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_9_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_10_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_11_1."','".$F_PADJUNTAR_OTRO_DOCUMENTO_12_1."','".$session."');";
 
			if($ENVIAOTROSdocuu1=='ENVIAOTROSdocuu1'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION','Se actualizaron otros documentos (ID:'.$IPotrosdocumentosservp.').');
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO','Se ingresaron otros documentos del proveedor.');
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	public function listadootrosdocuumentos(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02otrosdocumentos where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function listadootrosdocuumentos2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02otrosdocumentos where id='".$id."' "); }
 
	public function borraotrosdocuu($id){
		$conn=$this->db();
		$rowBorrar=mysqli_fetch_array(mysqli_query($conn,"select idRelacion from 02otrosdocumentos where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02otrosdocumentos where id='".$id."' ");
		if($rowBorrar) $this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION','Se eliminaron otros documentos (ID:'.$id.').');
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	public function sologuardarOTROSDOCUMENTOS($campo,$nuevonombre){
		$conn=$this->db(); $existe=$this->revisar_OTROSDOCUMENTOS(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			if($existe>=1){ mysqli_query($conn,"update 02otrosdocumentos set ".$campo."='".$nuevonombre."' where idRelacion='".$_SESSION['idPROV']."' "); }
			else{ mysqli_query($conn,"insert into 02otrosdocumentos (idRelacion) values('".$_SESSION['idPROV']."') "); mysqli_query($conn,"update 02otrosdocumentos set ".$campo."='".$nuevonombre."' where idRelacion='".$_SESSION['idPROV']."' "); }
			$this->registrar_bitacora_proveedor($session,'ADJUNTO','Se adjuntó otro documento en campo "'.$campo.'". Archivo: '.$nuevonombre);
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	public function cargarOTROSDOCUMENTOS($archivo){
		$nombre_carpeta=__ROOT2__.'/includes/archivos'; opendir($nombre_carpeta);
		$nombretemp=$_FILES[$archivo]["tmp_name"]; $nombrearchivo=$_FILES[$archivo]["name"];
		$extension=explode('.',$nombrearchivo); $cuenta=count($extension)-1;
		$nuevonombre=$archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		if(in_array(strtolower($extension[$cuenta]),array('pdf','gif','jpeg','jpg','png'))){
			if(move_uploaded_file($nombretemp,$nombre_carpeta.'/'.$nuevonombre)){ chmod($nombre_carpeta.'/'.$nuevonombre,0755); $this->sologuardarOTROSDOCUMENTOS($archivo,$nuevonombre); return trim($nuevonombre); }else{ return "1"; }
		}else{ return "2"; }
	}
 
	/* ═════════════════════════════════════════════════════════════
	   DIR OFICINAS / BODEGAS
	   ═════════════════════════════════════════════════════════════ */
	public function variable_DIROFICINASBODEGAS(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02DIROFICINASBODEGAS where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_DIROFICINASBODEGAS(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02DIROFICINASBODEGAS where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function enviarDIROFICINASBODEGAS($P_EDIFICIO_OSB,$P_CALLE_OSB,$P_NUMERO_EXTERIOR_OSB,$P_NUMERO_INTERIOR_OSB,$P_NUMERO_OFICINA_OSB,$P_COLONIA_OSB,$P_ALCALDIA_OSB,$P_CP_OSB,$P_CIUDAD_OSB,$P_ESTADO_OSB,$P_PAIS_OSB,$P_UBICACION_MAPA_OSB,$P_TELEFONO_OSB_1,$P_TELEFONO_OSB_2,$P_IMAIL_CONTACTO_OSB_1,$P_NUMERO_EXTENCION_OSB_1,$IPbodegasproveedores,$ENVIARBODEGAPRO){
		$conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02DIROFICINASBODEGAS set P_EDIFICIO_OSB='".$P_EDIFICIO_OSB."',P_CALLE_OSB='".$P_CALLE_OSB."',P_NUMERO_EXTERIOR_OSB='".$P_NUMERO_EXTERIOR_OSB."',P_NUMERO_INTERIOR_OSB='".$P_NUMERO_INTERIOR_OSB."',P_NUMERO_OFICINA_OSB='".$P_NUMERO_OFICINA_OSB."',P_COLONIA_OSB='".$P_COLONIA_OSB."',P_ALCALDIA_OSB='".$P_ALCALDIA_OSB."',P_CP_OSB='".$P_CP_OSB."',P_CIUDAD_OSB='".$P_CIUDAD_OSB."',P_ESTADO_OSB='".$P_ESTADO_OSB."',P_PAIS_OSB='".$P_PAIS_OSB."',P_UBICACION_MAPA_OSB='".$P_UBICACION_MAPA_OSB."',P_TELEFONO_OSB_1='".$P_TELEFONO_OSB_1."',P_TELEFONO_OSB_2='".$P_TELEFONO_OSB_2."',P_IMAIL_CONTACTO_OSB_1='".$P_IMAIL_CONTACTO_OSB_1."',P_NUMERO_EXTENCION_OSB_1='".$P_NUMERO_EXTENCION_OSB_1."' where id='".$IPbodegasproveedores."' ;";
			$var2="insert into 02DIROFICINASBODEGAS (P_EDIFICIO_OSB,P_CALLE_OSB,P_NUMERO_EXTERIOR_OSB,P_NUMERO_INTERIOR_OSB,P_NUMERO_OFICINA_OSB,P_COLONIA_OSB,P_ALCALDIA_OSB,P_CP_OSB,P_CIUDAD_OSB,P_ESTADO_OSB,P_PAIS_OSB,P_UBICACION_MAPA_OSB,P_TELEFONO_OSB_1,P_TELEFONO_OSB_2,P_IMAIL_CONTACTO_OSB_1,P_NUMERO_EXTENCION_OSB_1,idRelacion) values('".$P_EDIFICIO_OSB."','".$P_CALLE_OSB."','".$P_NUMERO_EXTERIOR_OSB."','".$P_NUMERO_INTERIOR_OSB."','".$P_NUMERO_OFICINA_OSB."','".$P_COLONIA_OSB."','".$P_ALCALDIA_OSB."','".$P_CP_OSB."','".$P_CIUDAD_OSB."','".$P_ESTADO_OSB."','".$P_PAIS_OSB."','".$P_UBICACION_MAPA_OSB."','".$P_TELEFONO_OSB_1."','".$P_TELEFONO_OSB_2."','".$P_IMAIL_CONTACTO_OSB_1."','".$P_NUMERO_EXTENCION_OSB_1."','".$session."');";
 
			if($ENVIARBODEGAPRO=='ENVIARBODEGAPRO'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó dirección de oficina/bodega (ID:'.$IPbodegasproveedores.').'
					.' Calle: '.$P_CALLE_OSB.' '.$P_NUMERO_EXTERIOR_OSB
					.' | Col: '.$P_COLONIA_OSB
					.' | Ciudad: '.$P_CIUDAD_OSB
					.' | Estado: '.$P_ESTADO_OSB
					.' | País: '.$P_PAIS_OSB
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó dirección de oficina/bodega.'
					.' Calle: '.$P_CALLE_OSB.' '.$P_NUMERO_EXTERIOR_OSB
					.' | Col: '.$P_COLONIA_OSB
					.' | Ciudad: '.$P_CIUDAD_OSB
					.' | Estado: '.$P_ESTADO_OSB
					.' | País: '.$P_PAIS_OSB
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function listadoBODEGASpro(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02DIROFICINASBODEGAS where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function listadoBODEGASpro2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02DIROFICINASBODEGAS where id='".$id."' "); }
 
	public function borrabodegasprovee($id){
		$conn=$this->db();
		$rowBorrar=mysqli_fetch_array(mysqli_query($conn,"select P_CALLE_OSB, P_CIUDAD_OSB, idRelacion from 02DIROFICINASBODEGAS where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02DIROFICINASBODEGAS where id='".$id."' ");
		if($rowBorrar) $this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION','Se eliminó dirección de oficina/bodega (ID:'.$id.'). Calle: '.$rowBorrar['P_CALLE_OSB'].' | Ciudad: '.$rowBorrar['P_CIUDAD_OSB']);
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   DATOS BANCARIOS 1
	   ═════════════════════════════════════════════════════════════ */
	public function variable_DATOSBANCARIOS1(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02DATOSBANCARIOS1 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_DATOSBANCARIOS1(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02DATOSBANCARIOS1 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function enviarDATOSBANCARIOS1($P_TIPO_DE_MONEDA_1,$P_INSTITUCION_FINANCIERA_1,$P_NUMERO_DE_CUENTA_DB_1,$P_NUMERO_CLABE_1,$P_NUMERO_DE_SUCURSAL_1,$P_NUMERO_IBAN_1,$P_NUMERO_CUENTA_SWIFT_1,$FOTO_ESTADO_PROVEE,$ULTIMA_CARGA_DATOBANCA,$OBSERVACIONES_D,$ENVIARRdatosbancario1p,$IPdatosbancario1p){
		$conn=$this->db(); $existe=$this->revisar_DATOSBANCARIOS1(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:0;
		$variable_check=''; $valor_check='';
		if($existe==0 || $existe==''){ $variable_check=" checkbox, "; $valor_check=" 'si', "; }
 
		if($session!=''){
			$var1="update 02DATOSBANCARIOS1 set P_TIPO_DE_MONEDA_1='".$P_TIPO_DE_MONEDA_1."',P_INSTITUCION_FINANCIERA_1='".$P_INSTITUCION_FINANCIERA_1."',P_NUMERO_DE_CUENTA_DB_1='".$P_NUMERO_DE_CUENTA_DB_1."',P_NUMERO_CLABE_1='".$P_NUMERO_CLABE_1."',P_NUMERO_DE_SUCURSAL_1='".$P_NUMERO_DE_SUCURSAL_1."',P_NUMERO_IBAN_1='".$P_NUMERO_IBAN_1."',P_NUMERO_CUENTA_SWIFT_1='".$P_NUMERO_CUENTA_SWIFT_1."',ULTIMA_CARGA_DATOBANCA='".$ULTIMA_CARGA_DATOBANCA."',OBSERVACIONES_D='".$OBSERVACIONES_D."' where id='".$IPdatosbancario1p."' ;";
			$var2="insert into 02DATOSBANCARIOS1 (P_TIPO_DE_MONEDA_1,P_INSTITUCION_FINANCIERA_1,P_NUMERO_DE_CUENTA_DB_1,P_NUMERO_CLABE_1,P_NUMERO_DE_SUCURSAL_1,P_NUMERO_IBAN_1,P_NUMERO_CUENTA_SWIFT_1,FOTO_ESTADO_PROVEE,ULTIMA_CARGA_DATOBANCA,OBSERVACIONES_D,".$variable_check." idRelacion) values('".$P_TIPO_DE_MONEDA_1."','".$P_INSTITUCION_FINANCIERA_1."','".$P_NUMERO_DE_CUENTA_DB_1."','".$P_NUMERO_CLABE_1."','".$P_NUMERO_DE_SUCURSAL_1."','".$P_NUMERO_IBAN_1."','".$P_NUMERO_CUENTA_SWIFT_1."','".$FOTO_ESTADO_PROVEE."','".$ULTIMA_CARGA_DATOBANCA."','".$OBSERVACIONES_D."',".$valor_check." '".$session."');";
 
			if($ENVIARRdatosbancario1p=='ENVIARRdatosbancario1p'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizaron datos bancarios (ID:'.$IPdatosbancario1p.').'
					.' Banco: '.$P_INSTITUCION_FINANCIERA_1
					.' | Moneda: '.$P_TIPO_DE_MONEDA_1
					.' | Cuenta: '.substr($P_NUMERO_DE_CUENTA_DB_1,0,4).'****'
					.' | CLABE: '.substr($P_NUMERO_CLABE_1,0,4).'****'
					.' | Observaciones: '.$OBSERVACIONES_D
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresaron datos bancarios.'
					.' Banco: '.$P_INSTITUCION_FINANCIERA_1
					.' | Moneda: '.$P_TIPO_DE_MONEDA_1
					.' | Cuenta: '.substr($P_NUMERO_DE_CUENTA_DB_1,0,4).'****'
					.' | CLABE: '.substr($P_NUMERO_CLABE_1,0,4).'****'
					.' | Observaciones: '.$OBSERVACIONES_D
				);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function Listado_datos_bancariosPRO(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02DATOSBANCARIOS1 where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function Listado_datos_bancariosPRO2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02DATOSBANCARIOS1 where id='".$id."' "); }
 
	function borra_datos_bancario1($id){
		$conn=$this->db();
		$rowBorrar=mysqli_fetch_array(mysqli_query($conn,"select P_INSTITUCION_FINANCIERA_1, idRelacion from 02DATOSBANCARIOS1 where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02DATOSBANCARIOS1 where id='".$id."' ");
		if($rowBorrar) $this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION','Se eliminaron datos bancarios (ID:'.$id.'). Banco: '.$rowBorrar['P_INSTITUCION_FINANCIERA_1']);
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ─── DATOS BANCARIOS 2 ─── */
	public function variable_DATOSBANCARIOS2(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02DATOSBANCARIOS2 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_DATOSBANCARIOS2(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02DATOSBANCARIOS2 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function DATOSBANCARIOS2($P_TIPO_DE_MONEDA_2,$P_INSTITUCION_FINANCIERA_2,$P_NUMERO_DE_CUENTA_DB_2,$P_NUMERO_CLABE_2,$P_NUMERO_DE_SUCURSAL_2,$P_NUMERO_IBAN_2,$P_NUMERO_CUENTA_SWIFT_2){
		$conn=$this->db(); $existe=$this->revisar_DATOSBANCARIOS2(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02DATOSBANCARIOS2 set P_TIPO_DE_MONEDA_2='".$P_TIPO_DE_MONEDA_2."',P_INSTITUCION_FINANCIERA_2='".$P_INSTITUCION_FINANCIERA_2."',P_NUMERO_DE_CUENTA_DB_2='".$P_NUMERO_DE_CUENTA_DB_2."',P_NUMERO_CLABE_2='".$P_NUMERO_CLABE_2."',P_NUMERO_DE_SUCURSAL_2='".$P_NUMERO_DE_SUCURSAL_2."',P_NUMERO_IBAN_2='".$P_NUMERO_IBAN_2."',P_NUMERO_CUENTA_SWIFT_2='".$P_NUMERO_CUENTA_SWIFT_2."' where idRelacion='".$session."' ;";
			$var2="insert into 02DATOSBANCARIOS2 (P_TIPO_DE_MONEDA_2,P_INSTITUCION_FINANCIERA_2,P_NUMERO_DE_CUENTA_DB_2,P_NUMERO_CLABE_2,P_NUMERO_DE_SUCURSAL_2,P_NUMERO_IBAN_2,P_NUMERO_CUENTA_SWIFT_2,idRelacion) values('".$P_TIPO_DE_MONEDA_2."','".$P_INSTITUCION_FINANCIERA_2."','".$P_NUMERO_DE_CUENTA_DB_2."','".$P_NUMERO_CLABE_2."','".$P_NUMERO_DE_SUCURSAL_2."','".$P_NUMERO_IBAN_2."','".$P_NUMERO_CUENTA_SWIFT_2."','".$session."');";
 
			if($existe>=1){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION','Se actualizaron datos bancarios secundarios. Banco: '.$P_INSTITUCION_FINANCIERA_2.' | Moneda: '.$P_TIPO_DE_MONEDA_2);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO','Se ingresaron datos bancarios secundarios. Banco: '.$P_INSTITUCION_FINANCIERA_2.' | Moneda: '.$P_TIPO_DE_MONEDA_2);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	public function datos_bancario_default($pasarDID,$pasarD_text){
		$conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$check_active=$conn->prepare("SELECT id FROM 02DATOSBANCARIOS1 WHERE idRelacion=? AND checkbox='si'");
			$check_active->bind_param("s",$session); $check_active->execute(); $check_active->store_result();
			$active_count=$check_active->num_rows; $check_active->close();
 
			$update_current=$conn->prepare("UPDATE 02DATOSBANCARIOS1 SET checkbox=? WHERE id=?");
			$update_current->bind_param("ss",$pasarD_text,$pasarDID); $update_current->execute(); $update_current->close();
 
			if($pasarD_text=='si'){
				$deselect_others=$conn->prepare("UPDATE 02DATOSBANCARIOS1 SET checkbox='no' WHERE idRelacion=? AND id!=?");
				$deselect_others->bind_param("ss",$session,$pasarDID); $deselect_others->execute(); $deselect_others->close();
			}elseif($active_count<=1){
				$activate_last=$conn->prepare("UPDATE 02DATOSBANCARIOS1 SET checkbox='si' WHERE idRelacion=? ORDER BY id DESC LIMIT 1");
				$activate_last->bind_param("s",$session); $activate_last->execute(); $activate_last->close();
			}
 
			$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
				'Se cambió cuenta bancaria predeterminada (ID:'.$pasarDID.'). Estado: '.$pasarD_text
			);
			echo "Actualizado: ".$pasarD_text;
		}else{ echo "TU SESIÓN HA TERMINADO"; }
	}
 
	/* ═════════════════════════════════════════════════════════════
	   REFERENCIAS COMERCIALES 1
	   ═════════════════════════════════════════════════════════════ */
	public function variable_REFERENCIASCOMERCIALES1(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02REFERENCIASCOMERCIALES1 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_REFERENCIASCOMERCIALES1(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02REFERENCIASCOMERCIALES1 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function REFERENCIASCOMERCIALES1($P_NOMBRE_EMPRESA_RC_1,$P_NOMBRE_CONTACTO_RC_1,$P_CELULAR_CONTACTO_RC_1,$P_TELEFONO_EMPRESA_RC_1,$P_NUMERO_EXTENSION_RC_1,$P_IMAIL_CONTACTO_RC_1,$P_PAGINA_WEB_RC_1,$ULTIMA_CARGA_REFEprovee,$IPdatosREFEP1p,$ENVIARreferenciaPRO){
		$conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02REFERENCIASCOMERCIALES1 set P_NOMBRE_EMPRESA_RC_1='".$P_NOMBRE_EMPRESA_RC_1."',P_NOMBRE_CONTACTO_RC_1='".$P_NOMBRE_CONTACTO_RC_1."',P_CELULAR_CONTACTO_RC_1='".$P_CELULAR_CONTACTO_RC_1."',P_TELEFONO_EMPRESA_RC_1='".$P_TELEFONO_EMPRESA_RC_1."',P_NUMERO_EXTENSION_RC_1='".$P_NUMERO_EXTENSION_RC_1."',P_IMAIL_CONTACTO_RC_1='".$P_IMAIL_CONTACTO_RC_1."',P_PAGINA_WEB_RC_1='".$P_PAGINA_WEB_RC_1."',ULTIMA_CARGA_REFEprovee='".$ULTIMA_CARGA_REFEprovee."' where id='".$IPdatosREFEP1p."' ;";
			$var2="insert into 02REFERENCIASCOMERCIALES1 (P_NOMBRE_EMPRESA_RC_1,P_NOMBRE_CONTACTO_RC_1,P_CELULAR_CONTACTO_RC_1,P_TELEFONO_EMPRESA_RC_1,P_NUMERO_EXTENSION_RC_1,P_IMAIL_CONTACTO_RC_1,P_PAGINA_WEB_RC_1,ULTIMA_CARGA_REFEprovee,idRelacion) values('".$P_NOMBRE_EMPRESA_RC_1."','".$P_NOMBRE_CONTACTO_RC_1."','".$P_CELULAR_CONTACTO_RC_1."','".$P_TELEFONO_EMPRESA_RC_1."','".$P_NUMERO_EXTENSION_RC_1."','".$P_IMAIL_CONTACTO_RC_1."','".$P_PAGINA_WEB_RC_1."','".$ULTIMA_CARGA_REFEprovee."','".$_SESSION['idPROV']."');";
 
			if($ENVIARreferenciaPRO=='ENVIARreferenciaPRO'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION','Se actualizó referencia comercial 1 (ID:'.$IPdatosREFEP1p.'). Empresa: '.$P_NOMBRE_EMPRESA_RC_1.' | Contacto: '.$P_NOMBRE_CONTACTO_RC_1.' | Email: '.$P_IMAIL_CONTACTO_RC_1);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO','Se ingresó referencia comercial 1. Empresa: '.$P_NOMBRE_EMPRESA_RC_1.' | Contacto: '.$P_NOMBRE_CONTACTO_RC_1.' | Email: '.$P_IMAIL_CONTACTO_RC_1);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function listadoREFERENCIApro(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02REFERENCIASCOMERCIALES1 where idRelacion='".$_SESSION['idPROV']."' order by id desc "); }
	public function listadoREFERENCIApro2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02REFERENCIASCOMERCIALES1 where id='".$id."' "); }
 
	public function borrareferenprovee($id){
		$conn=$this->db();
		$rowBorrar=mysqli_fetch_array(mysqli_query($conn,"select P_NOMBRE_EMPRESA_RC_1, idRelacion from 02REFERENCIASCOMERCIALES1 where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02REFERENCIASCOMERCIALES1 where id='".$id."' ");
		if($rowBorrar) $this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION','Se eliminó referencia comercial 1 (ID:'.$id.'). Empresa: '.$rowBorrar['P_NOMBRE_EMPRESA_RC_1']);
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   REFERENCIAS COMERCIALES 2 y 3
	   ═════════════════════════════════════════════════════════════ */
	public function variable_REFERENCIASCOMERCIALES2(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02REFERENCIASCOMERCIALES2 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_REFERENCIASCOMERCIALES2(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02REFERENCIASCOMERCIALES2 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function REFERENCIASCOMERCIALES2($P_NOMBRE_EMPRESA_RC_2,$P_NOMBRE_CONTACTO_RC_2,$P_CELULAR_CONTACTO_RC_2,$P_TELEFONO_EMPRESA_RC_2,$P_NUMERO_EXTENSIO_CONTACTO_RC_2,$P_IMAIL_RC_2,$P_PAGINA_WEB_RC_2){
		$conn=$this->db(); $existe=$this->revisar_REFERENCIASCOMERCIALES2(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02REFERENCIASCOMERCIALES2 set P_NOMBRE_EMPRESA_RC_2='".$P_NOMBRE_EMPRESA_RC_2."',P_NOMBRE_CONTACTO_RC_2='".$P_NOMBRE_CONTACTO_RC_2."',P_CELULAR_CONTACTO_RC_2='".$P_CELULAR_CONTACTO_RC_2."',P_TELEFONO_EMPRESA_RC_2='".$P_TELEFONO_EMPRESA_RC_2."',P_NUMERO_EXTENSIO_CONTACTO_RC_2='".$P_NUMERO_EXTENSIO_CONTACTO_RC_2."',P_IMAIL_RC_2='".$P_IMAIL_RC_2."',P_PAGINA_WEB_RC_2='".$P_PAGINA_WEB_RC_2."' where idRelacion='".$session."' ;";
			$var2="insert into 02REFERENCIASCOMERCIALES2 (P_NOMBRE_EMPRESA_RC_2,P_NOMBRE_CONTACTO_RC_2,P_CELULAR_CONTACTO_RC_2,P_TELEFONO_EMPRESA_RC_2,P_NUMERO_EXTENSIO_CONTACTO_RC_2,P_IMAIL_RC_2,P_PAGINA_WEB_RC_2,idRelacion) values('".$P_NOMBRE_EMPRESA_RC_2."','".$P_NOMBRE_CONTACTO_RC_2."','".$P_CELULAR_CONTACTO_RC_2."','".$P_TELEFONO_EMPRESA_RC_2."','".$P_NUMERO_EXTENSIO_CONTACTO_RC_2."','".$P_IMAIL_RC_2."','".$P_PAGINA_WEB_RC_2."','".$session."');";
 
			if($existe>=1){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION','Se actualizó referencia comercial 2. Empresa: '.$P_NOMBRE_EMPRESA_RC_2.' | Contacto: '.$P_NOMBRE_CONTACTO_RC_2);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO','Se ingresó referencia comercial 2. Empresa: '.$P_NOMBRE_EMPRESA_RC_2.' | Contacto: '.$P_NOMBRE_CONTACTO_RC_2);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	public function variable_REFERENCIASCOMERCIALES3(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02REFERENCIASCOMERCIALES3 where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_REFERENCIASCOMERCIALES3(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02REFERENCIASCOMERCIALES3 where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function REFERENCIASCOMERCIALES3($P_NOMBRE_EMPRESA_RC_3,$P_NOMBRE_CONTACTO_RC_3,$P_CELULAR_CONTACTO_RC_3,$P_TELEFONO_EMPRESA_RC_3,$P_NUMERO_EXTENSION_RC_3,$P_IMAIL_RC_3,$P_PAGINA_WEB_RC_3){
		$conn=$this->db(); $existe=$this->revisar_REFERENCIASCOMERCIALES3(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02REFERENCIASCOMERCIALES3 set P_NOMBRE_EMPRESA_RC_3='".$P_NOMBRE_EMPRESA_RC_3."',P_NOMBRE_CONTACTO_RC_3='".$P_NOMBRE_CONTACTO_RC_3."',P_CELULAR_CONTACTO_RC_3='".$P_CELULAR_CONTACTO_RC_3."',P_TELEFONO_EMPRESA_RC_3='".$P_TELEFONO_EMPRESA_RC_3."',P_NUMERO_EXTENSION_RC_3='".$P_NUMERO_EXTENSION_RC_3."',P_IMAIL_RC_3='".$P_IMAIL_RC_3."',P_PAGINA_WEB_RC_3='".$P_PAGINA_WEB_RC_3."' where idRelacion='".$session."' ;";
			$var2="insert into 02REFERENCIASCOMERCIALES3 (P_NOMBRE_EMPRESA_RC_3,P_NOMBRE_CONTACTO_RC_3,P_CELULAR_CONTACTO_RC_3,P_TELEFONO_EMPRESA_RC_3,P_NUMERO_EXTENSION_RC_3,P_IMAIL_RC_3,P_PAGINA_WEB_RC_3,idRelacion) values('".$P_NOMBRE_EMPRESA_RC_3."','".$P_NOMBRE_CONTACTO_RC_3."','".$P_CELULAR_CONTACTO_RC_3."','".$P_TELEFONO_EMPRESA_RC_3."','".$P_NUMERO_EXTENSION_RC_3."','".$P_IMAIL_RC_3."','".$P_PAGINA_WEB_RC_3."','".$session."');";
 
			if($existe>=1){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION','Se actualizó referencia comercial 3. Empresa: '.$P_NOMBRE_EMPRESA_RC_3.' | Contacto: '.$P_NOMBRE_CONTACTO_RC_3);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO','Se ingresó referencia comercial 3. Empresa: '.$P_NOMBRE_EMPRESA_RC_3.' | Contacto: '.$P_NOMBRE_CONTACTO_RC_3);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
	}
 
	/* ═════════════════════════════════════════════════════════════
	   CALIFICACIÓN
	   ═════════════════════════════════════════════════════════════ */
	public function CALIFICACION($DOCUMENTO_CALIFICACION,$ADJUNTO_CALIFICACION,$OBSERVACIONES_CALIFICACION,$FECHA_CALIFICACION,$hCALIFICACION,$IpCALIFICACION,$enviarCALIFICACION){
		$conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02CALIFICACION set DOCUMENTO_CALIFICACION='".$DOCUMENTO_CALIFICACION."',OBSERVACIONES_CALIFICACION='".$OBSERVACIONES_CALIFICACION."',hCALIFICACION='".$hCALIFICACION."' where id='".$IpCALIFICACION."' ;";
			$var2="insert into 02CALIFICACION (DOCUMENTO_CALIFICACION,ADJUNTO_CALIFICACION,OBSERVACIONES_CALIFICACION,FECHA_CALIFICACION,hCALIFICACION,idRelacion) values('".$DOCUMENTO_CALIFICACION."','".$ADJUNTO_CALIFICACION."','".$OBSERVACIONES_CALIFICACION."','".$FECHA_CALIFICACION."','".$hCALIFICACION."','".$session."');";
 
			if($enviarCALIFICACION=='enviarCALIFICACION'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
					'Se actualizó calificación (ID:'.$IpCALIFICACION.').'
					.' Tipo: '.$DOCUMENTO_CALIFICACION
					.' | Observaciones: '.$OBSERVACIONES_CALIFICACION
					.' | Fecha: '.$FECHA_CALIFICACION
				);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO',
					'Se ingresó calificación al proveedor.'
					.' Tipo: '.$DOCUMENTO_CALIFICACION
					.' | Observaciones: '.$OBSERVACIONES_CALIFICACION
					.' | Fecha: '.$FECHA_CALIFICACION
				);
				return "Ingresado";
			}
		}else{ echo "TU SESIÓN HA TERMINADO"; }
	}
 
	public function Listado_CALIFICACION(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02CALIFICACION WHERE idRelacion='".(isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'')."' order by id desc "); }
	public function Listado_CALIFICACION2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02CALIFICACION where id='".$id."' "); }
 
	public function borra_CALIFICACION($id){
		$conn=$this->db();
		$rowBorrar=mysqli_fetch_array(mysqli_query($conn,"select DOCUMENTO_CALIFICACION, idRelacion from 02CALIFICACION where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02CALIFICACION where id='".$id."' ");
		if($rowBorrar) $this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION','Se eliminó calificación (ID:'.$id.'). Tipo: '.$rowBorrar['DOCUMENTO_CALIFICACION']);
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   MOTIVO
	   ═════════════════════════════════════════════════════════════ */
	public function variable_nuevomotivotodos(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02MOTIVO order by id desc"); }
	public function variable_nuevomotivo(){ $conn=$this->db(); return mysqli_fetch_array(mysqli_query($conn,"select * from 02MOTIVO where idRelacion='".$_SESSION['idPROV']."' "),MYSQLI_ASSOC); }
	public function revisar_nuevomotivo(){ $conn=$this->db(); $row=mysqli_fetch_array(mysqli_query($conn,'select id from 02MOTIVO where idRelacion="'.$_SESSION['idPROV'].'" ') or die('P44'.mysqli_error($conn)),MYSQLI_ASSOC); return $row['id']; }
 
	public function nuevomotivo($nuevo_motivo,$MOTIVO_NUEVO,$enviarnuevo_MOTIVO,$IPnuevomotivo){
		$conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$var1="update 02MOTIVO set nuevo_motivo='".$nuevo_motivo."',MOTIVO_NUEVO='".$MOTIVO_NUEVO."' where id='".$IPnuevomotivo."' ;";
			$var2="insert into 02MOTIVO (nuevo_motivo,MOTIVO_NUEVO,idRelacion) values('".$nuevo_motivo."','".$MOTIVO_NUEVO."','".$session."');";
 
			if($enviarnuevo_MOTIVO=='enviarnuevo_MOTIVO'){
				mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'ACTUALIZACION','Se actualizó motivo (ID:'.$IPnuevomotivo.'). Motivo: '.$nuevo_motivo.' | Descripción: '.$MOTIVO_NUEVO);
				return "Actualizado";
			}else{
				mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
				$this->registrar_bitacora_proveedor($session,'INGRESO','Se ingresó motivo. Motivo: '.$nuevo_motivo.' | Descripción: '.$MOTIVO_NUEVO);
				return "Ingresado";
			}
		}else{ echo '<p class="fs-4">NO HAY UN PROVEEDOR SELECCIONADO</p>'; }
    }
 
	public function listadonuevomotivo(){ $conn=$this->db(); return mysqli_query($conn,"select * from 02MOTIVO order by id desc "); }
	public function listadonuevomotivo2($id){ $conn=$this->db(); return mysqli_query($conn,"select * from 02MOTIVO where id='".$id."' "); }
 
	public function BORRARMOTIVO($id){
		$conn=$this->db();
		$rowBorrar=mysqli_fetch_array(mysqli_query($conn,"select nuevo_motivo, idRelacion from 02MOTIVO where id='".$id."' "),MYSQLI_ASSOC);
		mysqli_query($conn,"delete from 02MOTIVO where id='".$id."' ");
		if($rowBorrar) $this->registrar_bitacora_proveedor($rowBorrar['idRelacion'],'CANCELACION','Se eliminó motivo (ID:'.$id.'). Motivo: '.$rowBorrar['nuevo_motivo']);
		return "<P style='color:green; font-size:25px;'>ELEMENTO BORRADO</P>";
	}
 
	/* ═════════════════════════════════════════════════════════════
	   PROVEEDOR DE / EMPRESA RELACIÓN
	   ═════════════════════════════════════════════════════════════ */
	public function listado_empresas2ba(){ $conn=$this->db(); return mysqli_query($conn,"select * from 03datosdelaempresa order by id desc"); }
 
	public function PROVEEDORDE($empresaIds){
		$session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:'';
		if($session!=''){
			$conn=$this->db();
			mysqli_query($conn,"delete from 02empresarelacion where idRelacionP='".$session."' ");
			$empresaIds=is_array($empresaIds)?$empresaIds:array();
			$nombresEmpresas=array();
			foreach($empresaIds as $empresaId){
				$empresaId=trim((string)$empresaId);
				if($empresaId===''){ continue; }
				mysqli_query($conn,"insert into 02empresarelacion(idRelacionP,idRelacionC) values('".$session."','".$empresaId."')");
				$rowEmp=mysqli_fetch_array(mysqli_query($conn,"SELECT nombre FROM 03datosdelaempresa WHERE id='".$empresaId."' LIMIT 1"),MYSQLI_ASSOC);
				if($rowEmp) $nombresEmpresas[]=$rowEmp['nombre'];
				else $nombresEmpresas[]='ID:'.$empresaId;
			}
			$this->registrar_bitacora_proveedor($session,'ACTUALIZACION',
				'Se actualizó la relación de empresas del proveedor.'
				.' Empresas asignadas: '.(!empty($nombresEmpresas)?implode(', ',$nombresEmpresas):'ninguna')
			);
			return "Ingresado";
		}else{ echo "NO HAY UN PROVEEDOR SELECCIONADO"; }
	}
 
	public function variable_comborelacion($idrelacion){ $conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:''; $row=mysqli_fetch_array(mysqli_query($conn,"select * from 02empresarelacion where idRelacionP='".$session."' and idRelacionC='".$idrelacion."' ")); return ($row['id']>=1)?'si':'no'; }
	public function variable_comborelacion1a(){ $conn=$this->db(); $session=isset($_SESSION['idPROV'])?$_SESSION['idPROV']:''; $row=mysqli_fetch_array(mysqli_query($conn,"select * from 02empresarelacion where idRelacionP='".$session."' ")); return ($row['idRelacionC']>=1)?$row['idRelacionC']:'no'; }
 
	} // fin clase
?>