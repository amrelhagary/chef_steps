<?php
/**
 * Generate randoms emails with duplicates
 */
$alp = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
    'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
    't', 'u', 'v', 'w', 'x', 'y', 'z');

$domain = array("com", "net");

$email_list = array();
$dup_per = 50;
$c = 100000 * 0.5;
$i = 0;


while($i < 100000){
    $email = generate_rand_email();
    if($i < $c) {
        $email_list[] = $email;
        $email_list[] = $email;
        $i+=2;
    }else{
        $email_list[] = $email;
        $i++;
    }
}

file_put_contents(__DIR__.'/../fixtures/email_list.json', json_encode($email_list));

function generate_rand_email() {
    global $alp, $domain;
    $size = sizeof($alp);
    $first_part_length = rand(3,10);
    $send_part_length = rand(3,10);
    $dom = $domain[rand(0, sizeof($domain)-1)];

    $first_part_str = $second_part_str = "";
    for($i = 0; $i < $first_part_length; $i++) {
        $first_part_str .= $alp[rand(0, $size - 1)];
    }

    for($j = 0; $j < $send_part_length; $j++) {
        $second_part_str .= $alp[rand(0, $size - 1)];
    }

    return $first_part_str . '@' . $second_part_str . '.' .$dom;

}