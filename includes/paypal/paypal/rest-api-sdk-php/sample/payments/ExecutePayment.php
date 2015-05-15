<?php
	
	require __DIR__ . '/../bootstrap.php';
	use PayPal\Api\ExecutePayment;
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;

	// ### Approval Status
	// Determine if the user approved the payment or not
	if (isset($_GET['success']) && $_GET['success'] == 'true') {
	
	    // Get the payment Object by passing paymentId
	    // payment id was previously stored in session in
	    // CreatePaymentUsingPayPal.php
	    $paymentId = $_GET['paymentId'];
	    $payment = Payment::get($paymentId, $apiContext);
	
	    // ### Payment Execute
	    // PaymentExecution object includes information necessary
	    // to execute a PayPal account payment.
	    // The payer_id is added to the request query parameters
	    // when the user is redirected from paypal back to your site
	    $execution = new PaymentExecution();
	    $execution->setPayerId($_GET['PayerID']);
	    
	    if(
	    		(isset($_REQUEST['pkg'])) &&
	    		($_REQUEST['pkg']>0)
	    	){
			header('Location: http://www.elartedesabervivir.com/index.php?content=paquetes&id='.$_REQUEST['pkg']."&ps=1");
		}else{
			header('Location: http://www.elartedesabervivir.com/mi-cuenta/mi-pedido');
		}
	
	} else {
		
		if(
	    		(isset($_REQUEST['pkg'])) &&
	    		($_REQUEST['pkg']>0)
	    	){
			header('Location: http://www.elartedesabervivir.com/index.php?content=paquetes&id='.$_REQUEST['pkg']."&ps=0");
		}else{
			header('Location: http://www.elartedesabervivir.com/mi-cuenta/mi-pedido');
		}
		
	}
