<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=""></script>

    <title>DiscoApi</title>

</head>
<body>

<div class="container">
    <div class="row">

        <form id="paring">
        <div class="form-group">
            <label for="otsi" class="control-label">Otsi artisti</label>
            <div class="">
                <input type="text" class="form-control" id="artist" name="artist" placeholder="Otsi">
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info btn-lg">Otsi</button>
        </div>

        </form>

        <div class="row">
            <div class="vastus" id="vastus">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript">



    document.getElementById('paring').addEventListener('submit', vastus);

    //$('.btn').click(function() {
    function vastus(e) {

        e.preventDefault();

        var artist = document.getElementById('artist').value;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'discog_localdb.php?artist=' + artist, true);

        xhr.onload = function() {

            //var tulemus = JSON.parse(this.responseText);
            //console.log(this.responseText);
            //window.alert(this.responseText);

            document.getElementById('vastus').innerHTML = this.responseText;

        }

        xhr.send();


        // et v6taks jsoniga saadetud lingi ja teeks p2ringu nagu discog_localdb.php failis m22ratud. see koodiblokk on
        // vist vales kohas. proovisin mitut moodi.
        $('#next').click(

            function lehekylg(b){

                //b.preventDefault();

                var leht = $('#next').getAttribute('href');

                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'discog_localdb.php?', leht, true);

                xhr.onload = function() {

                    //var tulemus = JSON.parse(this.responseText);
                    //console.log(this.responseText);
                    //window.alert(this.responseText);

                    document.getElementById('vastus').innerHTML = this.responseText;
                }

                xhr.send(leht);
            }
        );



    }
    //}



    //document.getElementsByTagName('a').addEventListener('click', lehekylg);



    /*$('#next').click(

        function lehekylg(b){

            b.preventDefault();

            var leht = $('#next').getAttribute('href');

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'discog_localdb.php?' + leht, 'true');

            xhr.onload = function() {

                //var tulemus = JSON.parse(this.responseText);
                //console.log(this.responseText);
                //window.alert(this.responseText);

                document.getElementById('vastus').innerHTML = this.responseText;
            }

            xhr.send();
        }
    );*/


/*

    $('.btn').click(function(){

       var artist = $('#artist').val();
       $('.vastus').load("discog_localdb.php/database", {
           artist: artist
       });




        $('discog_localdb.php', {artist: $('#artist').val()}, function(r){

            var vastus = JSON.parse(r);
            $('.vastus').html(vastus);

        });



    });
*/

</script>


<?php
/*

if (!empty($_GET['artist'])) {

    function file_get_contents_curl( $url ) {

        $ch = curl_init($url);

        //curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
        //curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        //curl_setopt( $ch, CURLOPT_URL, $url );
        //curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67" );

        $data = curl_exec( $ch );

        curl_close( $ch );
        print "data iiiz: data: " . $data . "<br>";

        return $data;

    }

    $music_url = 'https://api.discogs.com/database/search?artist=' . $_GET['artist'] . '&token=NClxarzQEgBvuauvyKkTKpZgeaPPVXcwMsMdRHPC';


    $music_json = file_get_contents_curl($music_url);
    //$music_json = file_get_contents($music_url);
    $music_jada_formaadis = json_decode($music_json, true);

    echo "data iiiz: music_jada_formaadis:" . $music_jada_formaadis . "<br>";

    if (!empty($music_jada_formaadis)) {
            //echo "pask";
        echo "data iiiz if lauses music_jada_formaadis: " .$music_jada_formaadis . "<br>"; // 1



    }
    else {
        echo "tyhi";
    }

}

*/?>


</body>
</html>