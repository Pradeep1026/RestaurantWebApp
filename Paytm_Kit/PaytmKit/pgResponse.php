<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Billing status</title>
	<style>
		 	body {
 					background-image: url("../../images/slider1.png");
 					background-color: #cccccc;
					background-position: center;
					background-repeat: no-repeat;
					background-size: cover;
					position: relative;
					text-align: center;
			}
			table {
				background-color: #fff;
			}
			h1,h2,h3{
				color: #fff;
			}
			button {
				border: none;
				color: black;
				padding: 10px 30px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 14px;
				background-color: #4CAF50; /* Green */
			}
			button:hover {
				cursor: pointer;
				color: #fff;
				font-size: 16px;
			}
		 </style>
 </head>
 <body>
	<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$paytmChecksum = "";
	$paramList = array();
	$isValidChecksum = "FALSE";

	$paramList = $_POST;
	$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

	//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
	$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


	if($isValidChecksum == "TRUE") {
		echo "<h3>Checksum matched and following are the transaction details:</h3>" . "<br/>";
		if ($_POST["STATUS"] == "TXN_SUCCESS") {
			echo "<h2>Transaction status is success</h2>" . "<br/>";
			//Process your transaction here as success transaction.
			//Verify amount & order id received from Payment gateway with your application's order id and amount.
		}
		else {
			echo "<h1>Transaction status is failure</h1>" . "<br/>";
		}

		if (isset($_POST) && count($_POST)>0 )
		{ 
			?>
			<table border="1" align = "center" style = "margin-top : 10px; text-align : left">
			<tbody>
				<tr>
					<th>Label</th>
					<th>Value</th>
				</tr>
			<?php
			foreach($_POST as $paramName => $paramValue) {
			?>
					<tr>
					<td> <label><?php echo $paramName ?> ::*</label></td>
					<td> <label><?php echo $paramValue ?> </label> </td>
				</tr>
			<?php
			}
			?>
			</tbody>
			</table>
			<?php
		}
		

	}
	else {
		echo "<b>Checksum mismatched.</b>";
		//Process transaction as suspicious.
	}

	?>
</body>
	<br/><a href="http://localhost:8080/RESTAURENT/"><button>Go to home page</button></a>
</html>