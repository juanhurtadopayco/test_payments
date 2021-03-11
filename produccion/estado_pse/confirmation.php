<?php

$data = json_decode(file_get_contents('php://input'), true);

$refPayco = $_POST["x_ref_payco"] ? $_POST["x_ref_payco"] : $data["x_ref_payco"];
$transactionState = $_POST["x_transaction_state"] ? $_POST["x_transaction_state"] : $data["x_transaction_state"];
$transactionDate = $_POST["x_transaction_date"] ? $_POST["x_transaction_date"] : $data["x_transaction_date"];

$file = fopen("log.txt", "a") or die("Unable to open file!");
$content = time() . " | $refPayco | $transactionState | $transactionDate \n";
fwrite($file, $content);
fclose($file);





