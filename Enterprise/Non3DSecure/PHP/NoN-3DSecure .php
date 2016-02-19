<?php

try
{
	$ns   = "authenticate";
		 
	//Replace the merchantUID & merchantToken with the MyGate issues values
	$auth->merchantUID = 'F5785ECF-1EAE-40A0-9D37-93E2E8A4BAB3';
	$auth->merchantToken = 'A06033E6-43CF-471A-A985-E16442ED1FFF'; 
	$auth->actionTypeID = '1';
	$merchantReference = 'merchantReference_'. date('Ymd_His');
	
	$auth_vals = new SoapVar($auth, SOAP_ENC_OBJECT);
	
	$authenticate = new SoapHeader($ns,'authenticate',$auth_vals, false);
	
    $URL = 'http://api.mygateglobal.com/api/api.wsdl';

	$client = new SoapClient ($URL, array ('soap_version' => SOAP_1_2,
			'trace' => 1,
			'exceptions' => true));
	 $param = array (1=>'<xmlField>
			<mode>0</mode>
			<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
			<merchantReference>'.$merchantReference.'</merchantReference>
			<cardDetails>
				<cardHolder>Joe Bloggs</cardHolder>
				<cardNumber>4111111111111111</cardNumber>
				<expiryMonth>03</expiryMonth>
				<expiryYear>2020</expiryYear>
				<cvvNumber>123</cvvNumber>
			</cardDetails>
			<amount>12.34</amount>
			<billingDetails>
				<customerID>A132452345</customerID>
				<invoiceID>INV_1234</invoiceID>
				<contact>
					<firstName>firstName</firstName>
					<lastName>lastName</lastName>
					<company>company</company>
					<contactNumber>contactNumber</contactNumber>
					<email>name@somewebsite.com</email>
				</contact>
				<address>
					<address1>address1</address1>
					<address2>address2</address2>
					<address3>address3</address3>
					<suburb>suburb</suburb>
					<city>city</city>
					<postalCode>12345</postalCode>
					<country>ZA</country>
				</address>
			</billingDetails>
			<shippingDetails>
				<contact>
					<firstName>firstName</firstName>
					<lastName>lastName</lastName>
					<company>company</company>
					<contactNumber>contactNumber</contactNumber>
					<email>name@somewebsite.com</email>
				</contact>
				<address>
					<address1>address1</address1>
					<address2>address2</address2>
					<address3>address3</address3>
					<suburb>suburb</suburb>
					<city>city</city>
					<postalCode>12345</postalCode>
					<country>ZA</country>
				</address>
			</shippingDetails>
			<salesItems>
				<item>
					<description>description1</description>
					<unitPrice>12.34</unitPrice>
					<quantity>1</quantity>
					<totalAmount>12.34</totalAmount>
				</item>
				<item>
					<description>description2</description>
					<unitPrice>1.00</unitPrice>
					<quantity>2</quantity>
					<totalAmount>2.00</totalAmount>
				</item>
				<item>
					<description>description3</description>
					<unitPrice>1.00</unitPrice>
					<quantity>3</quantity>
					<totalAmount>3.00</totalAmount>
				</item>
			</salesItems>
			<userAgent>Test</userAgent>
			<browserHeader>Test</browserHeader>
			<ipAddress>
				<ipAddressv4>192.168.1.100</ipAddressv4>
			</ipAddress>
			<terminal>BoB</terminal>
			<businessRules>
				<doFraudValidation>false</doFraudValidation>
				<doAddressVerification>true</doAddressVerification>
				<doCardVerification>true</doCardVerification>
			</businessRules>
			</xmlField>',
			
			$Request ='<xmlField>
			<mode>0</mode>
			<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
			<merchantReference>'.$merchantReference.'</merchantReference>
			<cardDetails>
				<cardHolder>Joe Bloggs</cardHolder>
				<cardNumber>4111111111111111</cardNumber>
				<expiryMonth>03</expiryMonth>
				<expiryYear>2020</expiryYear>
				<cvNumber>123</cvNumber>
			</cardDetails>
			<amount>12.34</amount>
			<billingDetails>
				<customerID>A132452345</customerID>
				<invoiceID>INV_1234</invoiceID>
				<contact>
					<firstName>firstName</firstName>
					<lastName>lastName</lastName>
					<company>company</company>
					<contactNumber>contactNumber</contactNumber>
					<email>name@somewebsite.com</email>
				</contact>
				<address>
					<address1>address1</address1>
					<address2>address2</address2>
					<address3>address3</address3>
					<suburb>suburb</suburb>
					<city>city</city>
					<postalCode>12345</postalCode>
					<country>ZA</country>
				</address>
			</billingDetails>
			<shippingDetails>
				<contact>
					<firstName>firstName</firstName>
					<lastName>lastName</lastName>
					<company>company</company>
					<contactNumber>contactNumber</contactNumber>
					<email>name@somewebsite.com</email>
				</contact>
				<address>
					<address1>address1</address1>
					<address2>address2</address2>
					<address3>address3</address3>
					<suburb>suburb</suburb>
					<city>city</city>
					<postalCode>12345</postalCode>
					<country>ZA</country>
				</address>
			</shippingDetails>
			<salesItems>
				<item>
					<description>description1</description>
					<unitPrice>12.34</unitPrice>
					<quantity>1</quantity>
					<totalAmount>12.34</totalAmount>
				</item>
				<item>
					<description>description2</description>
					<unitPrice>1.00</unitPrice>
					<quantity>2</quantity>
					<totalAmount>2.00</totalAmount>
				</item>
				<item>
					<description>description3</description>
					<unitPrice>1.00</unitPrice>
					<quantity>3</quantity>
					<totalAmount>3.00</totalAmount>
				</item>
			</salesItems>
			<userAgent>Test</userAgent>
			<browserHeader>Test</browserHeader>
			<ipAddress>
				<ipAddressv4>192.168.1.100</ipAddressv4>
			</ipAddress>
			<terminal>BoB</terminal>
			<businessRules>
				<doFraudValidation>false</doFraudValidation>
				<doAddressVerification>true</doAddressVerification>
				<doCardVerification>true</doCardVerification>
			</businessRules>
			</xmlField>',
			
			2=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			9=>'<xmlField>
			<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
			<transactionAuth>
				<transactionIndex>'.$transactionID.'</transactionIndex>
			</transactionAuth>
			<verbalAuthCode>831000</verbalAuthCode>
			<merchantReference>'.$merchantReference.'</merchantReference>
			<amount>1.00</amount>
			<billingDetails>
				<customerID>A132452345</customerID>
				<invoiceID>INV_1234</invoiceID>
				<contact>
					<firstName>firstName</firstName>
					<lastName>lastName</lastName>
					<company>company</company>
					<contactNumber>contactNumber</contactNumber>
					<email>name@somewebsite.com</email>
				</contact>
				<address>
					<address1>address1</address1>
					<address2>address2</address2>
					<address3>address3</address3>
					<suburb>suburb</suburb>
					<city>city</city>
					<postalCode>12345</postalCode>
					<country>ZA</country>
				</address>
			</billingDetails>
			<shippingDetails>
				<contact>
					<firstName>firstName</firstName>
					<lastName>lastName</lastName>
					<company>company</company>
					<contactNumber>contactNumber</contactNumber>
					<email>name@somewebsite.com</email>
				</contact>
				<address>
					<address1>address1</address1>
					<address2>address2</address2>
					<address3>address3</address3>
					<suburb>suburb</suburb>
					<city>city</city>
					<postalCode>12345</postalCode>
					<country>ZA</country>
				</address>
			</shippingDetails>
			<salesItems>
				<item>
					<description>description1</description>
					<unitPrice>1.00</unitPrice>
					<quantity>1</quantity>
					<totalAmount>1.00</totalAmount>
				</item>
				<item>
					<description>description2</description>
					<unitPrice>1.00</unitPrice>
					<quantity>2</quantity>
					<totalAmount>2.00</totalAmount>
				</item>
				<item>
					<description>description3</description>
					<unitPrice>1.00</unitPrice>
					<quantity>3</quantity>
					<totalAmount>3.00</totalAmount>
				</item>
			</salesItems>
			<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			5=>'<xmlField>
			<mode>0</mode>
			<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
			<transactionAuth>
				<transactionIndex>'.$transactionID.'</transactionIndex>
			</transactionAuth>
			<merchantReference>'.$merchantReference.'</merchantReference>
			<cardDetails>
				<cardHolder>BoB</cardHolder>
				<cardNumber>4111111111111111</cardNumber>
				<expiryMonth>12</expiryMonth>
				<expiryYear>2018</expiryYear>
				<cvNumber>123</cvNumber>
			</cardDetails>
			<amount>1.00</amount>
			<billingDetails>
				<customerID>A132452345</customerID>
				<invoiceID>INV_1234</invoiceID>
				<contact>
				<firstName>Test</firstName>
				<lastName>Test</lastName>
				<company>Test</company>
				<contactNumber>Test</contactNumber>
				<email>name@somewebsite.com</email>
				</contact>
				<address>
				<address1>Test</address1>
				<address2>Test</address2>
				<address3>Test</address3>
				<suburb>Test</suburb>
				<city>Test</city>
				<postalCode>Test</postalCode>
				<country>Test</country>
				</address>
			</billingDetails>
			<salesItems>
				<item>
					<description>description1</description>
					<unitPrice>1.00</unitPrice>
					<quantity>1</quantity>
					<totalAmount>1.00</totalAmount>
				</item>
				<item>
					<description>description2</description>
					<unitPrice>1.00</unitPrice>
					<quantity>2</quantity>
					<totalAmount>2.00</totalAmount>
				</item>
				<item>
					<description>description3</description>
					<unitPrice>1.00</unitPrice>
					<quantity>3</quantity>
					<totalAmount>3.00</totalAmount>
				</item>
			</salesItems>
			<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			3=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
					<terminal>Terminal1 - David</terminal>
					<amount>0.50</amount>
				<billingDetails>
					<customerID>A132452345</customerID>
					<invoiceID>INV_1234</invoiceID>
					<contact>
						<firstName>Test</firstName>
						<lastName>Test</lastName>
						<company>Test</company>
						<contactNumber>Test</contactNumber>
						<email>name@somewebsite.com</email>
					</contact>
					<address>
						<address1>Test</address1>
						<address2>Test</address2>
						<address3>Test</address3>
						<suburb>Test</suburb>
						<city>Test</city>
						<postalCode>Test</postalCode>
						<country>Test</country>
					</address>
				</billingDetails>
				<shippingDetails>
					<contact>
						<firstName>Test</firstName>
						<lastName>Test</lastName>
						<company>Test</company>
						<contactNumber>Test</contactNumber>
						<email>name@somewebsite.com</email>
					</contact>
					<address>
						<address1>Test</address1>
						<address2>Test</address2>
						<address3>Test</address3>
						<suburb>Test</suburb>
						<city>Test</city>
						<postalCode>Test</postalCode>
						<country>Test</country>
					</address>
				</shippingDetails>
				<salesItems>
					<item>
						<description>Test</description>
						<unitPrice>Test</unitPrice>
						<quantity>Test</quantity>
						<totalAmount>Test</totalAmount>
					</item>
					<item>
						<description>Test</description>
						<unitPrice>Test</unitPrice>
						<quantity>Test</quantity>
						<totalAmount>Test</totalAmount>
					</item>
					<item>
						<description>Test</description>
						<unitPrice>Test</unitPrice>
						<quantity>Test</quantity>
						<totalAmount>Test</totalAmount>
					</item>
				</salesItems>
			</xmlField>',
			
			4=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			6=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			7=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			8=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>',
				
			11=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<mode>0</mode>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<cardDetails>
					<cardHolder>BoB</cardHolder>
					<cardNumber>4111111111111111</cardNumber>
					<expiryMonth>12</expiryMonth>
					<expiryYear>2018</expiryYear>
					<cvNumber>123</cvNumber>
				</cardDetails>
				<terminal>Terminal1 - David</terminal>
				<amount>0.50</amount>
				<billingDetails>
					<customerID>A132452345</customerID>
					<invoiceID>INV_1234</invoiceID>
					<contact>
						<firstName>Test</firstName>
						<lastName>Test</lastName>
						<company>Test</company>
						<contactNumber>Test</contactNumber>
						<email>name@somewebsite.com</email>
					</contact>
					<address>
						<address1>Test</address1>
						<address2>Test</address2>
						<address3>Test</address3>
						<suburb>Test</suburb>
						<city>Test</city>
						<postalCode>Test</postalCode>
						<country>Test</country>
					</address>
				</billingDetails>
				<salesItems>
					<item>
						<description>Test</description>
						<unitPrice>Test</unitPrice>
						<quantity>Test</quantity>
						<totalAmount>Test</totalAmount>
					</item>
					<item>
						<description>Test</description>
						<unitPrice>Test</unitPrice>
						<quantity>Test</quantity>
						<totalAmount>Test</totalAmount>
					</item>
					<item>
						<description>Test</description>
						<unitPrice>Test</unitPrice>
						<quantity>Test</quantity>
						<totalAmount>Test</totalAmount>
					</item>
				</salesItems>
			</xmlField>',
			
			12=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			13=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
					<transactionIndex>'.$transactionID.'</transactionIndex>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>',
			
			14=>'<xmlField>
				<mode>0</mode>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
				<processorDetails>
					<processorId>478</processorId>
					<merchantId>mygateTEST</merchantId>
					<transactionPwd>KeSFRD6BEr</transactionPwd>
				</processorDetails>
				<cardDetails>
					<cardHolder>BoB</cardHolder>
					<cardNumber>4000000000000002</cardNumber>
					<expiryMonth>01</expiryMonth>
					<expiryYear>2020</expiryYear>
				</cardDetails>
				<amount>126.00</amount>
				<userAgent>Test</userAgent>
				<browserHeader>Test</browserHeader>
				<ipAddress>
					<ipAddressv4>196.30.66.11</ipAddressv4>
				</ipAddress>
			</xmlField>',

			15=>'<xmlField>
				<applicationUID>A06033E6-43CF-471A-A985-E16442ED1FFF</applicationUID>
				<transactionAuth>
				 	<transactionIndex>'.trim ($_POST["MD"]).'</transactionIndex>
				 	<paresPayload>'.trim ($_POST["PaRes"]).'</paresPayload>
				</transactionAuth>
				<merchantReference>'.$merchantReference.'</merchantReference>
				<terminal>Terminal1 - David</terminal>
			</xmlField>');
	

	if (isset($_GET["Step"]))
		if ($_GET["Step"] == 2)
			$auth->actionTypeID = 15;
	$client->__setSoapHeaders(array($authenticate));
 	$arrResults = $client->execRequest ( new SoapVar ($param[$auth->actionTypeID], XSD_STRING) );
		
	if (isset($arrResults->tdsLookup->authRequired) && $arrResults->tdsLookup->authRequired == 'Y')
	{
		echo ("<form name=\"frmLaunchACS\" method=\"POST\" action=\" {$arrResults->tdsLookup->acsUrl} \">
				  <table align=\"center\"  width='50%' style=\"border:1px solid black;\">
					  <tr>
						  <td align=\"center\" colspan=\"2\" style=\"background-color:Red; font-size:16px;\"><font color=\"FFFFFF\">Posting data to the Issuer ACS server</font></td>
					  </tr>
					  <tr>
						  <td ><div align=\"right\">PaReq :</div></td>
						  <td ><textarea cols=\"50\" rows=\"5\" style=\"width:400\" name=\"PaReq\" > {$arrResults->tdsLookup->payload} </textarea></textarea></td>
				  </tr>
				  <tr>
					  <td ><div align=\"right\">TermUrl :</div></td>
					  <td ><input type=\"text\" style=\"width:400\" name=\"TermUrl\" value=\"http://api.mygateglobal.com/unitTest/mygateapi.php?Step=2\"/>
				</td>
				  </tr>
				  <tr>
					  <td ><div align=\"right\">Transaction Index</div></td>
					  <td ><input type=\"text\" style=\"width:400\" name=\"MD\" value=\" {$arrResults->uidTransactionIndex} \"/></td>
				  </tr>
				  <tr>
					  <td colspan=\"2\"><div align=\"center\">
						<input type=\"submit\" value=\"Submit Form\" style=\"width:250\" >
					  </div></td>
				  </tr>
			  </table>
			</form>
			");
	}
	
	echo '<br>=================================================<br>';
	echo '<br>                R E S U L T S<br>';
	echo '<br>=================================================<br>Status: ';
	var_dump ( $arrResults->status );
	echo '<br> uidTransactionIndex: ';
	var_dump ( $arrResults->uidTransactionIndex );
	echo '<br> Transaction Time: ';
	var_dump ( $arrResults->TransactionDateTime );
	echo '<br> warnings: ';
	var_dump ( $arrResults->warnings );
	echo '<br> errors: ';
	var_dump ( $arrResults->errors );
	echo '<br> fspMessage: ';
	var_dump ( $arrResults->fspMessage );
	echo '<br> tdsLookup: ';
	var_dump ( $arrResults->tdsLookup);
	echo '<br> tdsAuth: ';
	var_dump ( $arrResults->tdsAuth );
	echo '<br>=================================================<br>';
	echo ( htmlentities($Request));
	echo '<br>=================================================<br>';
	echo ( htmlentities( $client->__getLastResponse ()) );
}
catch ( Exception $fault )
{
	echo '<br>=================================================<br>';
	echo '<br>                S O A P - E R R O R<br>';
	echo '<br>=================================================<br>';
	print_r ( $fault );
	echo '<br>=================================================<br>';
	print_r ( htmlspecialchars ( $client->__getLastRequest () ) );
	echo '<br>=================================================<br>';
	print_r ( htmlspecialchars ( $client->__getLastResponse () ) );
	echo '<br>=================================================<br>';
	echo $fault->getMessage ();
}
?>