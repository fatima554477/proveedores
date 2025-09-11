







<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar13" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar13" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; EMPRESA QUE CONTACTÓ A ESTE PROVEEDOR</p></strong></div>


<div  id="mensajeproveedorDE2">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $proveedordeporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $proveedordeporcentaje ; ?>%</div></div>
									</div>
							
	        <div id="target13" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
		  
		  

<?php                                                                   
$querycontras = $proveedoresC->listado_empresas2ba();
?>
<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<form class="row g-3 needs-validation was-validated" id="PROVEEDORDEform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


<table class="table table-striped table-bordered" style="width:100%"  id='' name=''>

<tr style="text-align:center">
<th width="15%"style="background:#c9e8e8">SELECCIONAR: </th>
<th width="15%"style="background:#c9e8e8">NOMBRE O RAZÓN SOCIAL DE LA EMPRESA: </th>
<th width="20%"style="background:#c9e8e8">NOMBRE COMERCIAL DE LA EMPRESA:</th>

</tr>
<?php
while($row = mysqli_fetch_array($querycontras))
{
$querycontras2 = $proveedoresC->variable_comborelacion($row["id"]);
?>
<tr style='background:#f5f9fc;text-align:center'>
<td style="text-align:center" >

<input type="checkbox" style="width:20%" class="form-check-input" name="SELECCIONAPROVEEDOR[]" id="SELECCIONAPROVEEDOR" value="<?php echo $row["id"]; ?>" <?php if($querycontras2=='si'){ echo 'checked=""';} ?>/> 


</td>
<td ><?php echo $row["NFE_INFORMACION"]; ?></td>
<td ><?php echo $row["NCE_INFORMACION"]; ?></td>

</tr>
<?php
}
?>

<input type="hidden" value="hproveedorDE" name="hproveedorDE"/>

<tr>
<td><?php if($conexion->variablespermisos('','PROVEEDOR_DE','guardar')=='si'){ ?>

<button class="btn btn-sm btn-outline-success px-5"   type="button" id="enviarproveedorDE">GUARDAR</button><div style="
 position: absolute;
    top: 78%; 
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
    1px 30px 60px rgba(16,16,16,0.4);"


id="mensajeproveedorDE"/></td>

</tr><?php } ?>

</table>

</form>
</tbody>

</div>
</div>





</div>
</div>
</div>
