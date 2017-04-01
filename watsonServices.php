<?php

watsonNaturalLanguageUnderstanding();
//This traslates text from source languge to target langage. words in text must be seprated by "+".
function watsonLanguageTranslate ($sourcelanguage,$targetLanguage,$text){
$curl = curl_init();
	$username = 'e42e3020-6ab2-4db6-862b-08283b7d8ebf';
    $password ='Ek4cpXsiNsk0';
    $headers = array('Authorization: Basic '. base64_encode($username.':'.$password));
	curl_setopt_array($curl, array(
		CURLOPT_HTTPHEADER=>$headers,
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL =>"https://gateway.watsonplatform.net/language-translator/api/v2/translate?source=".$sourcelanguage."&target=".$targetLanguage."&text=".$text,
	    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
	    CURLOPT_VERBOSE=>TRUE,
	    CURLOPT_SSL_VERIFYPEER=>FALSE,
));
$resp = curl_exec($curl);
curl_close($curl);
echo $resp;
}
function watsonNaturalLanguageUnderstanding (){
	$curl = curl_init();
	$username = '3d9cc69c-f78d-44bc-98c6-de5093146e7a';
    $password ='FCSQ7u4irTrw';
    $headers = array('Authorization: Basic '. base64_encode($username.':'.$password));
	curl_setopt_array($curl, array(
		CURLOPT_HTTPHEADER=>$headers,
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL =>"https://gateway.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2017-02-27&text=I%20still%20have%20a%20dream%2C%20a%20dream%20deeply%20rooted%20in%20the%20American%20dream%20%E2%80%93%20one%20day%20this%20nation%20will%20rise%20up%20and%20live%20up%20to%20its%20creed%2C%20%22We%20hold%20these%20truths%20to%20be%20self%20evident%3A%20that%20all%20men%20are%20created%20equal.&features=sentiment,keywords",
	    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
	    CURLOPT_VERBOSE=>TRUE,
	    CURLOPT_SSL_VERIFYPEER=>FALSE,
));
$resp = curl_exec($curl);
curl_close($curl);
echo $resp;
}

?>