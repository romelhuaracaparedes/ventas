<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Factura</title>




<style type="text/css">
@import url('fonts/BrixSansRegular.css');
@import url('fonts/BrixSansBlack.css');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
p, label, span, table{
	font-family: 'BrixSansRegular';
	font-size: 9pt;
}
.h2{
	font-family: 'BrixSansBlack';
	font-size: 16pt;
}
.h3{
	font-family: 'BrixSansBlack';
	font-size: 12pt;
	display: block;
	background: #47b1e0;
	color: #FFF;
	text-align: center;
	padding: 3px;
	margin-bottom: 5px;
}
#page_pdf{
	width: 95%;
	margin: 15px auto 10px auto;
}

#factura_head, #factura_cliente, #factura_detalle{
	width: 100%;
	margin-bottom: 10px;
}
.logo_factura{
	width: 25%;
}
.info_empresa{
	width: 50%;
	text-align: center;
}
.info_factura{
	width: 25%;
}
.info_cliente{
	width: 100%;
}
.datos_cliente{
	width: 100%;
}
.datos_cliente tr td{
	width: 50%;
}
.datos_cliente{
	padding: 10px 10px 0 10px;
}
.datos_cliente label{
	width: 75px;
	display: inline-block;
}
.datos_cliente p{
	display: inline-block;
}

.textright{
	text-align: right;
}
.textleft{
	text-align: left;
}
.textcenter{
	text-align: center;
}
.round{
	border-radius: 10px;
	border: 1px solid #0a4661;
	overflow: hidden;
	padding-bottom: 15px;
}
.round p{
	padding: 0 15px;
}

#factura_detalle{
	border-collapse: collapse;
}
#factura_detalle thead th{
	background: #382388;
	color: #FFF;
	padding: 5px;
}
#detalle_productos tr:nth-child(even) {
    background: #ededed;
}
#detalle_totales span{
	font-family: 'BrixSansBlack';
}
.nota{
	font-size: 8pt;
}
.label_gracias{
	font-family: verdana;
	font-weight: bold;
	font-style: italic;
	text-align: center;
	margin-top: 20px;
}
.anulada{
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translateX(-50%) translateY(-50%);
	opacity: 0.2;
}
</style>


</head>

<?php 

	$subtotal 	= 0;
	$iva 	 	= 18;
	$impuesto 	= 0;
	$tl_sniva   = 0;
	$total 		= 0;

 	$head = $header[0]; 

?>
<body>
<!-- <img class="anulada" src="img/anulado.png" alt="Anulada"> -->

<!-- <img class="anulada"  src="<?=base_url()?>/assets/img/borrador.png" alt="Borrador"> -->

<div id="page_pdf">
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>

					<img src="<?=base_url()?>/assets/img/brand/logo-light.png" alt="" border="0" width="150" height="50">
				</div>
			</td>
			<td class="info_empresa">
				<div>
					<span class="h2">SISTEMA VENTAS BRADESCO</span>
					<p>AYACUCHO</p>
					<p>Teléfono: +(502) 2222-3333</p>
					<p>Email: info@badresco.com</p>
				</div>
			</td>
			<td class="info_factura">
				<div class="round">
					<span class="h3">PROFORMA</span>
					<p>No. Pedido: <strong>0000<?php echo $head['id_venta'] ?></strong></p>
					<p>Fecha Pedido: <?php echo date("d-m-Y", strtotime($head['fecha_pedido']))  ?></p>
					<p>Fecha Pedido: <?php echo date("d-m-Y", strtotime($head['fecha_entrega']))  ?></p>
					<p>Vendedor: </p>
				</div>
			</td>
		</tr>
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="round">
					<span class="h3">Cliente</span>
					<table class="datos_cliente">
						<tr>
							<td><label>DNI:</label><p><?php echo $head['numero_documento'] ?></p></td>
							<td><label>Teléfono:</label> <p><?php echo $head['fecha_entrega'] ?></p></td>
						</tr>
						<tr>
							<td><label>Apellido y Nombres:</label> <p><?php echo $head['apellido_paterno'] ." ".$head['apellido_materno'] .", ".$head['nombres'] ?></p></td>
							<td><label>Dirección:</label> <p><?php echo $head['direccion'] ?></p></td>
						</tr>
					</table>
				</div>
			</td>

		</tr>
	</table>

	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px">Cant.</th>
					<th class="textleft">Descripción</th>
					<th class="textright" width="150px">Precio Unitario.</th>
					<th class="textright" width="150px"> Precio Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">
				<?php 

				foreach ($detail as $producto ) { ?>
					<tr>
						<td class="textcenter"><?php echo $producto['cantidad'] ?></td>
						<td><?php echo $producto['nombre_producto'] ?></td>
						<td class="textright"><?php echo $producto['precio'] ?></td>
						<td class="textright"><?php echo $producto['sub_total'] ?></td>
					</tr>
				<?php 

					$precio_total = $producto['sub_total'];
					$subtotal = round($subtotal + $precio_total, 2);
				} 

				$impuesto 	= round($subtotal * ($iva / 100), 2);
				$tl_sniva 	= round($subtotal - $impuesto,2 );
				$total 		= round($tl_sniva + $impuesto,2);

				?>

			</tbody>
			<tfoot id="detalle_totales">
				<tr>
					<td colspan="3" class="textright"><span><b>SUB TOTAL</b></span></td>
					<td class="textright"><span> <?php echo $tl_sniva;  ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span><b>IVA (18%)</b></span></td>
					<td class="textright"><span><?php echo $impuesto; ?></span></td>
				</tr>
				<tr>
					<td colspan="3" class="textright"><span><b>TOTAL</b></span></td>
					<td class="textright"><span><?php echo $total; ?></span></td>
				</tr>
		</tfoot>
	</table>
	<div>
		<p class="nota">Si usted tiene preguntas sobre esta factura, <br>pongase en contacto con nombre, teléfono y Email</p>
		<h4 class="label_gracias">¡Gracias por su Preferencia!</h4>
	</div>

</div>

</body>
</html>