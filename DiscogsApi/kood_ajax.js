

$(document).ready(function () {

    $('#otsi').click(function(e){

        e.preventDefault();

        artist = $('#artist').val();

        getData(artist);

    });

});

function getData(artist) {

    var url = 'https://api.discogs.com/database/search?type=artist&q=' + artist + '&token=NClxarzQEgBvuauvyKkTKpZgeaPPVXcwMsMdRHPC';

    $.get(url, function (data) {

        $('.profiil, ul li, nav').remove();
        var tulemus = data;

        for (i = 0; i < tulemus.results.length; i++) {

            $('ul').append('<li class="list-group-item">' + '<img class="img-rounded" src=" ' + tulemus.results[i].thumb + ' " alt="">' + '<p style="display: inline">' + tulemus.results[i].title + '</p><a class="profiil" href="javascript:void(0);" value="' + tulemus.results[i].resource_url + '"> Link on siin </a></li>');

        }

        lehekyljed(tulemus);



        $('.profiil').hover(function(){
            $(this).css("background-color", "beige");
            $(this).css("text-decoration", "none");
        }, function(){
            $(this).css("background-color", "");
        });


        $('.profiil').click(function () {

            profiil($(this).attr('value'));
        });



    });


}


function lehekyljed (tulemus) {

    var esimene = tulemus.pagination.urls.first;
    var eelmine = tulemus.pagination.urls.prev;
    var jargmine = tulemus.pagination.urls.next;
    var viimane = tulemus.pagination.urls.last;
    var praegune = tulemus.pagination.page;
    var praeguneLink =
    //console.log(tulemus.pagination.urls.next);

    $('.sisu').append(' <nav aria-label="...">\n' +
        '  <ul class="pagination">\n' +
        '    <li ><a class="lk" href="javascript:void(0);" value="' + esimene + '" aria-label="Previous"><span aria-hidden="true">Esimene</span></a></li>\n' +
        '    <li ><a class="lk" href="javascript:void(0);" value="' + eelmine + '" aria-label="Previous"><span aria-hidden="true">Eelmine</span></a></li>\n' +
        '    <li class="disabled" ><a class="lk" href="javascript:void(0);">' + praegune + '<span class="sr-only">(current)</span></a></li>\n' +
        '    <li ><a class="lk" href="javascript:void(0);" value="' + jargmine + '" aria-label="Next"><span aria-hidden="true">Jargmine</span></a></li>\n' +
        '    <li ><a class="lk" href="javascript:void(0);" value="' + viimane + '" aria-label="Next"><span aria-hidden="true">Viimane</span></a></li>\n' +
        '  </ul>\n' +
        '</nav> '
    );

    //
    // $('.lk').click(function () {
    //     history.pushState({}, $(this).attr('value'));
    //     return false;
    // });

    $('.lk').click(function () {
        getDataLehekylg($(this).attr('value'));
    });
}


function getDataLehekylg(lk) {

    $.get(lk, function (data) {

        $('ul li*, nav').remove();
        var tulemus = data;
        for (i = 0; i < tulemus.results.length; i++) {

            $('ul').append('<li class="list-group-item">' + '<img class="img-rounded" src=" ' + tulemus.results[i].thumb + ' " alt="">' + '<p style="display: inline">' + tulemus.results[i].title + '</p><a class="profiil_link" href="javascript:void(0);" value="' + tulemus.results[i].resource_url + '"> Link on siin </a></li>');

        }

        lehekyljed(tulemus);

        $('.profiil_link').hover(function(){
            $(this).css("background-color", "beige");
            $(this).css("text-decoration", "none");
        }, function(){
            $(this).css("background-color", "");
        });

        $('.profiil_link').click(function () {
            profiil($(this).attr('value'));
        });


    });
}



function profiil (profiil) {
    $.get(profiil, function (data) {

        $('ul li*, nav').remove();
        var tulemusProfiil = data;

        var aadress = tulemusProfiil.releases_url;
        $('.sisu').append('<div class="profiil"><div>' + tulemusProfiil.name + '</div><div>'+ tulemusProfiil.profile + '</div><a class="diskogr" href="javascript:void(0);" value="'+ tulemusProfiil.releases_url + '">Diskograafia</a></div>');


        $('.diskogr').hover(function(){
            $(this).css("background-color", "beige");
            $(this).css("text-decoration", "none");
        }, function(){
            $(this).css("background-color", "");
        });

        $('.diskogr').click(function () {
            diskograafia($(this).attr('value'));
        });
    });
}



function diskograafia (diskograafia) {
    $.get(diskograafia, function (data) {
        $('.profiil').remove();
        var disko = data;
        //$('.sisu').append('<div class="diskog">' + data.releases[0].title + '</div>');

        for (i = 0; i < disko.releases.length; i++) {

            $('ul').append('<li class="list-group-item">' + '<img class="img-rounded" src=" ' + disko.releases[i].thumb + ' " alt="">' + '<p style="display: inline">' + disko.releases[i].title + ' - ' + disko.releases[i].year + '</p><a class="laulud" href="javascript:void(0);" value="' + disko.releases[i].resource_url + '"> Laulud </a></li>');

        }

        $('.laulud').hover(function(){
            $(this).css("background-color", "beige");
            $(this).css("text-decoration", "none");
        }, function(){
            $(this).css("background-color", "");
        });

        $('.laulud').click(function () {
            laulud($(this).attr('value'));
        });
    });
}


function laulud (laulud) {

    $.get(laulud, function (data) {
        $('ul li*').remove();
        var laulud = data;
        //$('.sisu').append('<div class="diskog">' + data.releases[0].title + '</div>');

        for (i = 0; i < laulud.tracklist.length; i++) {

            $('ul').append('<li class="list-group-item"><p>' + laulud.tracklist[i].position + ' - ' + laulud.tracklist[i].title + '  :  ' + laulud.tracklist[i].duration + '</p></li>');

        }

    });

}




// EI OLE EESTI KEELES MILLEGIP2RAST

    $('#paring input[type=text]').on('change invalid', function() {
        var textfield = $(this).get(0);

        // 'setCustomValidity not only sets the message, but also marks
        // the field as invalid. In order to see whether the field really is
        // invalid, we have to remove the message first
        textfield.setCustomValidity('');

        if (!textfield.validity.valid) {
            textfield.setCustomValidity('Palun t2itke otsingulahter!');
        }
    });

