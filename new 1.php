<?php
// $dect = json_decode(file_get_contents('php://input'));
$dect = json_decode(file_get_contents('https://api.telegram.org/bot239404202:AAHFPUcPy_hhUFPuSvvpR9Dm9CuDF5o6itM/getupdates'));

function RunMethod($method, $param) {
    
    $url = 'https://api.telegram.org/bot239404202:AAHFPUcPy_hhUFPuSvvpR9Dm9CuDF5o6itM/';
    $url .= $method . "?" .$param;
    return json_decode(file_get_contents($url));
}


function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( 'objectToArray', $object );
    }

	// -1001095033303
$result = objectToArray($dect);

$user_id = $result['message']['from']['id'];
$text = $result['message']['text'];
$textid = $result['message']['id'];

if ($text == "/start")
{
	$TXT = file_get_contents("http://b19bttst.rozblog.com/page/start")
	RunMethod("sendMessage", "chat_id=" . $user_id . "&text=" . $TXT)
}
else 
{
	$TXT = file_get_contents("http://b19bttst.rozblog.com/page/sended")
	RunMethod("sendMessage", "chat_id=" . $user_id . "&text=" . $TXT)
	$TXT2 = file_get_contents("http://b19bttst.rozblog.com/page/gid")
	RunMethod("forwardMessage", "chat_id=" . $TXT2 . "&from_chat_id=" . $user_id . "&message_id=" . $textid)
}
?>