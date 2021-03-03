<?php
$p_id_invoice = time();
$p_amount= '2';
$p_cust_id_cliente = "69205";
$p_key="0c27e930d74b928a18157165690e8229d574d976";
$p_currency_code = "usd";
$p_signature = md5($p_cust_id_cliente.'^'.$p_key.'^'.$p_id_invoice.'^'.$p_amount.'^'.$p_currency_code);
?>


<form id="frm_botonePayco" name="frm_botonePayco" method="post" action="https://secure.payco.co/checkout.php" target="_blank">
<input name="p_cust_id_cliente" type="hidden" value="<?php echo $p_cust_id_cliente ?>">
<input name="p_key" type="hidden" value="<?php echo $p_key ?>">
<input name="p_id_invoice" type="hidden" value="<?php echo $p_id_invoice ?>">
<input name="p_description" type="hidden" value="ePayco Test">
<input name="p_currency_code" type="hidden" value="usd">
<input name="p_amount" id="p_amount" type="hidden" value="<?php echo $p_amount ?>">
<input name="p_tax" id="p_tax" type="hidden" value="0">
<input name="p_amount_base" id="p_amount_base" type="hidden" value="<?php echo $p_amount ?>">
<input name="p_test_request" type="hidden" value="TRUE">
<input name="p_url_response" type="hidden" value="https://domain.com/response">
<input name="p_url_confirmation" type="hidden" value="">
<input name="p_signature" type="hidden" id="signature" value="<?php echo $p_signature ?>" />
<input name="p_billing_document"type="hidden" id="p_billing_document" value="10000000" />
<input name="p_billing_name"type="hidden" id="p_billing_name" value="PRUEBAS" />
<input name="p_billing_lastname"type="hidden" id="p_billing_lastname" value="TEST" />
<input name="p_billing_address"type="hidden" id="p_billing_address" value="Calle 10 # 104-50" />
<input name="p_billing_country"type="hidden" id="p_billing_country" value="CO" />
<input name="p_billing_email"type="hidden" id="p_billing_email" value="admin@payco.co" />
<input name="p_billing_phone"type="hidden" id="p_billing_phone" value="0000000" />
<input name="p_billing_cellphone"type="hidden" id="p_billing_cellphone" value="0000000000" />
<input type="image" id="imagen" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn1.png" />
</form>