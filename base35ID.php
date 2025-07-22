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


function show_generate_ID($num) {
    global $ID_DIC;
    $id = "";
    echo "Original decimal: $num <br>";
    echo "The remainder and corresponding characters are: <br><br>";
    while ($num > 35){
        echo "Quotient to be divided: $num";
        echo "<br>"; 
        $remainder = $num % 35;
        $num = intdiv($num, 35);
        if ($remainder == 0){
            $remainder = 35;
            $num -= 1;
        }
        echo "Remainder after dividing by 35: $remainder";
        echo "<br>";
        $id .= $ID_DIC[$remainder];
        $last_char = $ID_DIC[$remainder];
        echo "Corresponds to: $last_char <br>";
        $code = strrev($id);
        echo "Our code is now: $code";
        echo "<br><hr>";
        }
    $first_char = $ID_DIC[$num];
    echo "Our (last number) first char: $first_char <br><hr>";
    $id .= $ID_DIC[$num];
    $full_code = strrev($id);
    echo "Our full code is $full_code";
    return (strrev($id));
}

?>
