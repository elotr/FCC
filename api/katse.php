<?php


    $countA = 0;
    $countB = 0;

    $arrayA = array(5, 3, 6);
    $arrayB = array(6, 3, 4);

    for ($i = 0; $i < sizeof($arrayA); $i++) {

        if ($arrayA[$i] > $arrayB[$i]) {
            $countA++;
        }

        if ($arrayB[$i] > $arrayA[$i]) {
            $countB++;
        }
    }


    $result = $countA . " " . $countB;
    echo $result;
