<?php


if (empty($_GET['artist'])) {
    //stop(400, 'Sisesta kasutaja');

    //echo "<script> alert('Sisesta artisti nimi!'); </script>";
    echo "Sisesta artisti nimi!";
} else {

    function file_get_contents_curl($url)
    {

        $ch = curl_init($url);

        //curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
        //curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt( $ch, CURLOPT_URL, $url );
        //curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);   // <<<<<<<================ kuidas seda normaalseks saab, et m88da ei hiiliks turvalisusest
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67");

        $data = curl_exec($ch);

        curl_close($ch);
        //print "data iiiz: data: " . $data . "<br>";

        return $data;

    }

    $music_url = 'https://api.discogs.com/database/search?artist=' . rawurlencode($_GET['artist']) . '&token=NClxarzQEgBvuauvyKkTKpZgeaPPVXcwMsMdRHPC';


    $music_json = file_get_contents_curl($music_url);
    //$music_json = file_get_contents($music_url);
    $music_jada_formaadis = json_decode($music_json, true);

    //echo "data iiiz: music_jada_formaadis:" . $music_jada_formaadis . "<br>";

    if (!empty($music_jada_formaadis)) {


        $i = 0;

        //JADA
        foreach ($music_jada_formaadis['results'] as $tulemus) {
            echo '<div>' . ($i += 1) . '<img src=" ' . $tulemus['thumb'] . ' " alt="">' . $tulemus['title'] . '  --  ' . $tulemus['year'] . '</div>';


        }

        //OBJEKT
        /*foreach ($music_jada_formaadis->results as $tulemus) {
            echo   '<div>' . ($i += 1) . '<img src=" ' . $tulemus->thumb . ' " alt="">' . $tulemus->title . '  --  ' . $tulemus->year . '</div>';

        }*/

    }


    // LEHEKYLJED
    // lehekylgede echod on pooleli ja mitmes kohas laiali, tean-tean


    echo '<a id="first" href=" ' . $music_jada_formaadis['pagination']['urls']['first'] . ' ">Esimene</a>';
    echo '<a id="prev" href=" ' . $music_jada_formaadis['pagination']['urls']['prev'] . ' ">\<< Eelmine</a>';
    //echo '<a id="next" onClick="return lehekylg()" href=" ' . $music_jada_formaadis['pagination']['urls']['next'] . ' ">\>> Jargmine </a><button onClick=" return lehekylg( ' . $music_jada_formaadis['pagination']['urls']['next'] . ' )" class="btn btn-info btn-sm">J2rgmine</button>';
    echo '<a id="next" href="' . $music_jada_formaadis['pagination']['urls']['next'] . '">\>> Jargmine </a><button type="submit" value="' . $music_jada_formaadis['pagination']['urls']['next'] . '" class="btn btn-info btn-sm" id="nupp">J2rgmine</button>';
    echo '<a id="last" href=" ' . $music_jada_formaadis['pagination']['urls']['last'] . ' ">Viimane</a>';


}



    if (!empty($_GET['leht'])) {

    echo "POLE TYHI !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";

        /*function file_get_contents_curl( $url ) {

            $ch = curl_init($url);

            //curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
            //curl_setopt( $ch, CURLOPT_HEADER, 0 );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
            //curl_setopt( $ch, CURLOPT_URL, $url );
            //curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );   // <<<<<<<================ kuidas seda normaalseks saab, et m88da ei hiiliks turvalisusest
            curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67" );

            $data = curl_exec( $ch );

            curl_close( $ch );
            //print "data iiiz: data: " . $data . "<br>";

            return $data;

        }*/

        $lk = $_GET['leht'];

        $lehekylg_tulemus = file_get_contents_curl($lk);
        $lehekylg = json_decode($lehekylg_tulemus, true);

        if (!empty($lehekylg)) {


            $i = 0;

            //JADA
            foreach ($lehekylg['results'] as $tulemus) {
                echo '<div>' . ($i += 1) . '<img src=" ' . $tulemus['thumb'] . ' " alt="">' . $tulemus['title'] . '  --  ' . $tulemus['year'] . '</div>';


            }

            //OBJEKT
            /*foreach ($music_jada_formaadis->results as $tulemus) {
                echo   '<div>' . ($i += 1) . '<img src=" ' . $tulemus->thumb . ' " alt="">' . $tulemus->title . '  --  ' . $tulemus->year . '</div>';

            }*/

        }

        echo '<a id="first" href=" ' . $lehekylg['pagination']['urls']['first'] . ' ">Esimene</a>';
        echo '<a id="prev" href=" ' . $lehekylg['pagination']['urls']['prev'] . ' ">\<< Eelmine</a>';
        //echo '<a id="next" href=" ' . $lehekylg['pagination']['urls']['next'] . ' ">\>> Jargmine </a>';
        echo '<a id="next" href="discog_localdb.php?leht=' . $music_jada_formaadis['pagination']['urls']['next'] . '">\>> Jargmine </a><button onClick=" return lehekylg( ' . $music_jada_formaadis['pagination']['urls']['next'] . ' )" class="btn btn-info btn-sm">J2rgmine</button>';
        echo '<a id="last" href=" ' . $lehekylg['pagination']['urls']['last'] . ' ">Viimane</a>';


    }





