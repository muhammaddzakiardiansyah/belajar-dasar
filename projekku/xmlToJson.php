<?php

$simpleXml = '<?xml version="1.0" encoding="UTF-8" ?>
<root>
	<employees>
		<employee>
			<id>1</id>
			<firstName>Tom</firstName>
			<lastName>Cruise</lastName>
			<photo>https://pbs.twimg.com/profile_images/735509975649378305/B81JwLT7.jpg</photo>
		</employee>
		<employee>
			<id>2</id>
			<firstName>Maria</firstName>
			<lastName>Sharapova</lastName>
			<photo>https://pbs.twimg.com/profile_images/786423002820784128/cjLHfMMJ_400x400.jpg</photo>
		</employee>
		<employee>
			<id>3</id>
			<firstName>James</firstName>
			<lastName>Bond</lastName>
			<photo>https://pbs.twimg.com/profile_images/664886718559076352/M00cOLrh.jpg</photo>
		</employee>
	</employees>
</root>';

$xmlToString = simplexml_load_string($simpleXml);

// var_dump($xmlToString);
$xmlToJson = json_encode($xmlToString);

// var_dump($xmlToArray);
echo $xmlToJson;