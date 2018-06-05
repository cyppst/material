<?php
$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
$id = 1;

$cachefile = $_SERVER['DOCUMENT_ROOT'] . '/tmp/' . date('M-d-Y') . '.json';
$cachetime = 1800;

if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
    if (file_get_contents($cachefile) == 1) onError();

} else {
    if (false === ($data = @file_get_contents('http://chaiyapoj.site/license?id=' . $id . '&url=' . $escaped_url))) {
        onError();
    } else {

        $file = fopen($cachefile, "w");
        fwrite($file, $data);
        fclose($file);

        if (file_get_contents($cachefile) == 1) onError();

    }

}


function onError()
{
    http_response_code(404);
    die();
}
