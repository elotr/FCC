<?php

function file_get_contents_curl($url) {

    $ch = curl_init($url);
    //curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
    //curl_setopt( $ch, CURLOPT_HEADER, 0 );
//
    //curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
    //curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body

//
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt( $ch, CURLOPT_URL, $url );
    //curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);   // <<<<<<<================ kuidas seda normaalseks saab, et mööda ei hiiliks turvalisusest
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67");

    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpcode >= 400) {
        echo '<div class="alert alert-danger" role="alert">Esines tõrge, proovi hiljem uuesti!</div>';

        //$data = $httpcode;

        exit();
    }

    //echo $httpcode;
    //echo $data;
    return $data;

}


// PÄRINGU ESIMENE TULEMUS/LEHEKÜLG

if (isset($_GET['artist'])) {
   /* echo "Sisesta artisti nimi!";
}
else {*/

    //$music_url = 'https://api.discogs.com/database/search?artist=' . rawurlencode($_GET['artist']) . '&token=NClxarzQEgBvuauvyKkTKpZgeaPPVXcwMsMdRHPC';
    $music_url = 'https://api.discogs.com/database/search?type=artist&q=' . rawurlencode($_GET['artist']) . '&token=NClxarzQEgBvuauvyKkTKpZgeaPPVXcwMsMdRHPC';

    $music_json = file_get_contents_curl($music_url);

    echo $music_json;
    //echo $music_json;
//    $music_jada_formaadis = json_decode($music_json, true);
//
//    // KUI PÄRINGU TULEMUS ON 0
//    if ($music_jada_formaadis['pagination']['items'] == 0) {
//        echo '<div class="alert alert-warning" role="alert">Sellist artisti pole andmebaasis.</div>';
//        exit();
//    }
//
//    else {
//
//        $i = 0;
//
//        foreach ($music_jada_formaadis['results'] as $tulemus) {
//            echo '<li class="list-group-item">' . ($i += 1) . '<img class="img-thumbnail" src=" ' . $tulemus['thumb'] . ' " alt="">' . $tulemus['title'] . '  --  ' . $tulemus['year'] . '</li>';
//
//
//        }
//
//        //OBJEKT
//        /*foreach ($music_jada_formaadis->results as $tulemus) {
//            echo   '<div>' . ($i += 1) . '<img src=" ' . $tulemus->thumb . ' " alt="">' . $tulemus->title . '  --  ' . $tulemus->year . '</div>';
//
//        }*/
//
//    }
//
//    echo '<button type="submit" onclick="nupuke(this.value)" value="' . $music_jada_formaadis['pagination']['urls']['first'] . '" class="btn btn-info btn-sm butt" id="first">Esimene</button>';
//    echo '<button type="submit"  onclick="nupuke(this.value)" value="' . $music_jada_formaadis['pagination']['urls']['prev'] . '" class="btn btn-info btn-sm butt" id="prev">Eelmine</button>';
//    echo '<button type="submit" onclick="nupuke(this.value)" value="' . $music_jada_formaadis['pagination']['urls']['next'] . '" class="btn btn-info btn-sm butt" id="next">Järgmine</button>';
//    echo '<button type="submit"  onclick="nupuke(this.value)" value="' . $music_jada_formaadis['pagination']['urls']['last'] . '" class="btn btn-info btn-sm butt" id="last">Viimane</button>';

}


//PÄRINGU TEISED LEHEKÜLJED

if (isset($_GET['leht'])) {

    $lk = $_GET['leht'];

    $lehekylg_tulemus = file_get_contents_curl($lk);
    $lehekylg = json_decode($lehekylg_tulemus, true);

    if (!empty($lehekylg)) {

            $i = $lehekylg['pagination']['page'] * 50 - 50;

            //JADA
            foreach ($lehekylg['results'] as $tulemus) {
                echo '<li class="list-group-item">' . ($i += 1) . '<img class="img-thumbnail" src=" ' . $tulemus['thumb'] . ' " alt="">'  . $tulemus['title'] . '  --  ' . $tulemus['year'] . '</li>';

            }


        echo '<button type="submit" onclick="nupuke(this.value)" value="' . $lehekylg['pagination']['urls']['first'] . '" class="btn btn-info btn-sm" id="first">Esimene</button>';
        echo '<button type="submit" onclick="nupuke(this.value)" value="' . $lehekylg['pagination']['urls']['prev'] . '" class="btn btn-info btn-sm" id="prev">Eelmine</button>';
        echo '<button type="submit" onclick="nupuke(this.value)" value="' . $lehekylg['pagination']['urls']['next'] . '" class="btn btn-info btn-sm" id="next">Järgmine</button>';
        echo '<button type="submit" onclick="nupuke(this.value)" value="' . $lehekylg['pagination']['urls']['last'] . '" class="btn btn-info btn-sm" id="last">Viimane</button>';

    }

}





