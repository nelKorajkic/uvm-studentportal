<?php


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
return $resp;
}

//takes text and returns keywords and and sentiment from text file. text must have spaces. 
function watsonNaturalLanguageUnderstanding ($text){
	

	$curl = curl_init();
	$username = '3d9cc69c-f78d-44bc-98c6-de5093146e7a';
    $password ='FCSQ7u4irTrw';
    $headers = array('Authorization: Basic '. base64_encode($username.':'.$password));
	curl_setopt_array($curl, array(
		CURLOPT_HTTPHEADER=>$headers,
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL =>"https://gateway.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2017-02-27&text=".$text."&features=sentiment,keywords,entities",
	    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
	    CURLOPT_VERBOSE=>TRUE,
	    CURLOPT_SSL_VERIFYPEER=>FALSE,
));
$resp = curl_exec($curl);
curl_close($curl);
return $resp;
} 

?>