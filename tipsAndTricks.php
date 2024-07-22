<?php
/**
 * SOme command that i did not know and found useful
*/

//Echo an array line by line
echo '<pre>'; print_r($_SERVER); echo '</pre>';

//Encode image_data
/*src="data:image/jpeg;base64,<?php echo base64_encode( $living->getImage()->getData() ); ?>"*/

//Date to string
$date = new DateTime();
$result =  $date->format('d-m-Y');

//Js
//
//console.log(window.innerWidth)