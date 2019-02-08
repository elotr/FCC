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
                <div class="vastus1" id="vastus1">
                </div>
            </div>

            <div class="form-group">
                <button id="next" class="btn btn-info btn-sm">J2rgmine</button>
            </div>
        </div>
    </div>


    <script type="text/javascript" language="javascript">

        $(document).ready(function () {


            if ($('#vastus1').children().length === 0)
            //if ($('#vastus1').is(':empty'))
            {
                $('#next').hide();
            }
            else {
                $('#next').show();
            }

            //document.getElementById('paring').addEventListener('submit', vastus);

            $('.btn').click(
            function vastus(e) {

                e.preventDefault();

                //var artist = document.getElementById('artist').value;
                var artist = $('#artist').val();

                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'discog_localdb.php?artist=' + artist, true);

                xhr.onload = function () {

                    //var tulemus = JSON.parse(this.responseText);
                    //console.log(this.responseText);
                    //window.alert(this.responseText);

                    //document.getElementById('vastus').innerHTML = this.responseText;


                    $('#vastus1').html(this.responseText);
                }

                xhr.send();


                // et v6taks jsoniga saadetud lingi ja teeks p2ringu nagu discog_localdb.php failis m22ratud. see koodiblokk on
                // vist vales kohas. proovisin mitut moodi.


            });


            /*

                document.getElementById('nupp').addEventListener('click', lehekylg);


            //$('.btn-sm').click(
                    function lehekylg(b){

                        b.preventDefault();

                        var leht = $('.btn-sm').getAttribute('value');

                        alert(leht);

                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'discog_localdb1.php?leht=' + leht, true);

                        xhr.onload = function() {

                            //var tulemus = JSON.parse(this.responseText);
                            //console.log(this.responseText);
                            //window.alert(this.responseText);

                            document.getElementById('vastus1').innerHTML = this.responseText;
                        }

                        xhr.send();

                    }

            //);
            */

        });


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


</body>
</html>