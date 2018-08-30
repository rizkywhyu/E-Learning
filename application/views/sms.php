<?php
        $fields_string  =   "";
        $fields     =   array(
                            'api_key'       =>  'f54636bd',
                            'api_secret'    =>  '3c48c3f22710779d',
                            'to'            =>  '+6281299005693',
                            'from'          =>  "Sekolah",
                            'text'          =>  "Anda telah melakukan ujian"
        );
        $url        =   "https://rest.nexmo.com/sms/json";

        //url-ify the data for the POST
	foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.$value.'&'; 
            }
	rtrim($fields_string, '&');

		//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

	//execute post
	$result = curl_exec($ch);
	//close connection
	curl_close($ch);

        echo "<pre>";
        print_r($result); 
        echo "</pre>";
?>