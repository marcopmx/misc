<?php
$ID_DIC = [1=>"1", 2=>"2", 3=>"3", 4=>"4", 5=>"5", 6=>"6", 7=>"7", 8=>"8", 9=>"9", 10=>"A", 11=>"B", 12=>"C", 13=>"D", 14=>"E", 15=>"F",
16=>"G", 17=>"H", 18=>"I", 19=>"J", 20=>"K", 21=>"L", 22=>"M", 23=>"N", 24=>"O", 25=>"P", 26=>"Q", 27=>"R", 28=>"S", 29=>"T",
30=>"U", 31=>"V", 32=>"W", 33=>"X", 34=>"Y", 35=>"Z"];
$MAX_BASE = 35;
    
function generate_ID($num) {
        global $ID_DIC;
        $id = "";
        $num_digits = strlen((string)$num);
        while ($num > 35){
                $remainder = $num % 35;
                $num = intdiv($num, 35);
                if ($remainder == 0){
                        $remainder = 35;
                        $num -= 1;
                }
                $id .= $ID_DIC[$remainder];
        }
        $id .= $ID_DIC[$num];
        return (strrev($id));
}
function translate_ID($id_str) {
        global $ID_DIC;
        global $MAX_BASE;
        $backwards_dic = array_flip($ID_DIC);
        $str_len = strlen($id_str);
        $id = 0;
        for ($i = 0; $i < $str_len; $i++){
                $cur_char = substr($id_str, $str_len - $i - 1, 1);
                $id += ($backwards_dic[$cur_char] * pow($MAX_BASE, $i));
        }
        return $id;
}
?>
