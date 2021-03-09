<?php
$p_id_invoice=time();
$p_cust_id_cliente='28750';//Id del comercio propietario de la aplicación
$p_key='af04fefb93b097b697b1ebf39fd656eb1e29a40a';//p_key del comercio propietario de la aplicación
$p_amount='200000';
$p_tax="0";
$p_base="0";
$p_currency_code='cop';
$p_description = 'Prueba Split Payment PHP';

$p_signature= md5($p_cust_id_cliente.'^'.$p_key.'^'.$p_id_invoice.'^'.$p_amount.'^'.$p_currency_code);

$p_split_type='01';// 01 Fijo | 02 Porcentual
$p_split_merchant_receiver='28750';//Id Comercio dueño del producto o servicio
$p_split_primary_receiver='28750';//Id del cliente recibidor primario (App, Maketplace, Tienda, etc)
$p_split_primary_receiver_fee='20000';//Comisión del recibidor primario (App,Maketplace,Tienda,etc)
$p_split_receivers=array();
//$p_signature_receivers Y $p_split_receivers SOLO ES NECESARIO SI SON MÁS DE UN RECIBIDOR 
$p_signature_receivers="";
$p_split_receivers = array(
    array('id'=>'76926','fee'=>'30000'),
    array('id'=>'9375','fee'=>'50000')
);

foreach($p_split_receivers as $receiver){
    $p_signature_receivers.=$receiver['id'].'^'.$receiver['fee'];
}

$p_signature_split=md5($p_split_type.'^'.$p_split_merchant_receiver.'^'.$p_split_primary_receiver.'^'.$p_split_primary_receiver_fee.'^'.$p_signature_receivers);

?>

<!--<form id="frm_botonePayco" name="frm_botonePayco" method="post" action="http://localhost:8000/splitpayments" target="_blank">-->
<form id="frm_botonePayco" name="frm_botonePayco" method="post" action="https://secure2.epayco.io/splitpayments.php" target="_blank">
<input name="p_cust_id_cliente" type="hidden" value="<?php echo $p_cust_id_cliente ?>">
<input name="p_key" type="hidden" value="<?php echo $p_key ?>">
<input name="p_id_invoice" type="hidden" value="<?php  echo $p_id_invoice ?>">
<input name="p_description" type="hidden" value="<?php  echo $p_description ?>">
<h3>Tipos Moneda</h3>
<ul>
  <li>cop o COP</li>
  <li>usd o USD</li>
</ul>
</br>
<input name="p_currency_code" type="text">
<input name="p_amount" id="p_amount" type="hidden" value="<?php echo $p_amount ?>">
<input name="p_tax" id="p_tax" type="hidden" value="0">
<input name="p_amount_base" id="p_amount_base" type="hidden" value="0">
<input name="p_test_request" type="hidden" value="true">
<input name="p_url_response" type="hidden" value="">
<input name="p_url_confirmation" type="hidden" value="">
<input name="p_signature" type="hidden" id="signature"  value="<?php echo $p_signature ?>" />
<input name="p_split_type" type="hidden" value="<?php echo $p_split_type ?>">
<input name="p_split_merchant_receiver" type="hidden" value="<?php echo $p_split_merchant_receiver ?>">
<input name="p_split_primary_receiver" type="hidden" value="<?php echo $p_split_primary_receiver ?>">
<input name="p_split_primary_receiver_fee" type="hidden" value="<?php echo $p_split_primary_receiver_fee ?>">
<input name="p_split_receivers[0][id]" type="hidden" value="<?php echo $p_split_receivers[0]['id'] ?>">
<input name="p_split_receivers[0][fee]" type="hidden" value="<?php echo $p_split_receivers[0]['fee'] ?>"> 
<input name="p_signature_split" type="hidden" value="<?php echo $p_signature_split ?>">
<input type="image" id="imagen" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn1.png" />
</form>