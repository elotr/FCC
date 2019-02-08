function koko() {
    //
    // $.get("getDataData.php", {artist: artist}, function (data) {
    //     //console.log(data);
    //     var tulemus = JSON.parse(data);
    //     //var tule = tulemus.results[0].title;
    //     //alert(tule);
    //
    //     //document.getElementById("vastus").innerHTML = tulemus;
    //
    //     for (i = 0; i < tulemus.results.length; i++) {
    //
    //         $('ul').append('<li class="list-group-item">' + '<img class="img-rounded" src=" ' + tulemus.results[i].thumb + ' " alt="">' + '<p style="display: inline">' + tulemus.results[i].title + '</p><a href="' + tulemus.results[i].resource_url + '"> Link on siin </a></li>');
    //
    //     }
    //
    // });



    $.get("getDataData.php", {artist: artist}, function (data) {
        //console.log(data);
        var tulemus = JSON.parse(data);
        //var tule = tulemus.results[0].title;
        //alert(tule);

        //document.getElementById("vastus").innerHTML = tulemus;

        for (i = 0; i < tulemus.results.length; i++) {

            $('ul').append('<li class="list-group-item">' + '<img class="img-rounded" src=" ' + tulemus.results[i].thumb + ' " alt="">' + '<p style="display: inline">' + tulemus.results[i].title + '</p><a href="' + tulemus.results[i].resource_url + '"> Link on siin </a></li>');

        }

    });

}