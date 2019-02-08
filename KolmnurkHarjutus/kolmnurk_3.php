<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<div class="container">

    <h2 style="text-align: center; margin-bottom: 50px; margin-top: 60px">LAHENDA KOLMNURK</h2>
    <div class="row">
        <form action="" method="post" class="form-inline">
            <blockquote style="display: inline">SSS</blockquote>

            <div class="form-group">
                <label for="">Sisesta kolmnurga külgede pikkused:</label>
                <input type="text" class="form-control" name="a" id="" placeholder="külg a">
                <input type="text" class="form-control" name="b" id="" placeholder="külg b">
                <input type="text" class="form-control" name="c" id="" placeholder="külg c">

                <button type="submit" class="btn btn-primary" name="sss" value="sss">Arvuta</button>
            </div>
        </form>

        <form action="" method="post" class="form-inline">
            <blockquote style="display: inline">SAS</blockquote>

            <div class="form-group">
                <label for="">Sisesta küljed a ja b ning nurk C:</label>
                <input type="text" class="form-control" name="a" id="" placeholder="külg a">
                <input type="text" class="form-control" name="b" id="" placeholder="külg b">
                <input type="text" class="form-control" name="C" id="" placeholder="nurk C">

                <button type="submit" class="btn btn-primary" name="sas" value="sas">Arvuta</button>
            </div>
        </form>

        <form action="" method="post" class="form-inline">
            <blockquote style="display: inline">SSA</blockquote>

            <div class="form-group">
                <label for="">Sisesta küljed a ja b ning nurk B:</label>
                <input type="text" class="form-control" name="a" id="" placeholder="külg a">
                <input type="text" class="form-control" name="b" id="" placeholder="külg b">
                <input type="text" class="form-control" name="B" id="" placeholder="nurk B">

                <button type="submit" class="btn btn-primary" name="ssa" value="ssa">Arvuta</button>
            </div>
        </form>

        <form action="" method="post" class="form-inline">
            <blockquote style="display: inline">ASA</blockquote>

            <div class="form-group">
                <label for="">Sisesta nurgad B ja A ning külg c:</label>
                <input type="text" class="form-control" name="B" id="" placeholder="nurk B">
                <input type="text" class="form-control" name="c" id="" placeholder="külg c">
                <input type="text" class="form-control" name="A" id="" placeholder="nurk A">

                <button type="submit" class="btn btn-primary" name="asa" value="asa">Arvuta</button>
            </div>
        </form>

        <form action="" method="post" class="form-inline">

            <blockquote style="display: inline">AAS</blockquote>

            <div class="form-group">
                <label for="">Sisesta külg a ning nurgad B ja A:</label>
                <input type="text" class="form-control" name="a" id="" placeholder="kylg a">
                <input type="text" class="form-control" name="B" id="" placeholder="nurk B">
                <input type="text" class="form-control" name="A" id="" placeholder="nurk A">

                <button type="submit" class="btn btn-primary" name="aas" value="aas">Arvuta</button>
            </div>

        </form>
    </div>

    <div class="row" style="padding-top: 30px">
        <img src="SSS.png" alt="" style="float: left">


        <div style="float: left">
            <?php

            // SSS
            if (isset($_POST['sss'])) {

                $a = $_POST['a'];
                $b = $_POST['b'];
                $c = $_POST['c'];

                // KONTROLLI, ET KÕIK VÄLJAD OLEKSID TÄIDETUD
                if ($a == null || $b == null || $c == null) {
                    echo "Kõik väljad peavad olema täidetud!";
                    exit();
                }

                // KONTROLLI, ET SISESTATUD VÄÄRTUSED OLEKSID POSITIIVSED
                if ($a <= 0 || $b <= 0 || $c <= 0) {
                    echo "Väärtused ei saa olla negatiivsed.";
                    exit();
                }

                // KONTROLLI, KAS ON KOLMNURK
                if ($a + $b <= $c || $a + $c <= $b || $c + $b <= $a) {
                    echo "Ei ole kolmnurk";
                    exit();
                }


                // ÜMBERMÕÕT
                $ymberm66t = $a + $b + $c;


                // KOLMNURGA PINDALA (HERON'i valem, pindala arvutatakse kolmnurga külgede kaudu)
                $pindala = sqrt(($ymberm66t / 2) * (($ymberm66t / 2) - $a) * (($ymberm66t / 2) - $b) * (($ymberm66t / 2) - $c));


                // NURKADE SUURUSED
                $C_nurk = rad2deg(acos(($a * $a + $b * $b - $c * $c) / (2 * $a * $b))); // a b nurk
                $B_nurk = rad2deg(acos(($a * $a + $c * $c - $b * $b) / (2 * $a * $c))); // a c nurk
                $A_nurk = 180 - $C_nurk - $B_nurk; // b c nurk


                // KONTROLL: TÜÜP KÜLGEDE JÄRGI

                if ($a == $b && $a == $c && $b == $c) {
                    $tyyp_kylg = "Võrdkülgne";
                } else if ($a == $b || $a == $c || $b == $c) {
                    $tyyp_kylg = "Võrdhaarne";
                } else {
                    $tyyp_kylg = "Erikülgne";
                }


                // KOLMNURGA TÜÜP NURKADE JÄRGI
                if ($A_nurk == 90 || $B_nurk == 90 || $C_nurk == 90) {
                    $tyyp_nurk = "Täisnurkne. ";
                } else if ($A_nurk > 90 || $B_nurk > 90 || $C_nurk > 90) {
                    $tyyp_nurk = "Nürinurkne";
                } else if ($A_nurk < 90 && $B_nurk < 90 && $C_nurk < 90) {
                    $tyyp_nurk = "Teravnurkne";
                } else {
                    $tyyp_nurk = "";
                }

            }

            // SAS

            if (isset($_POST['sas'])) {

                $a = $_POST['a'];
                $b = $_POST['b'];
                $C_nurk = $_POST['C'];

                //KONTROLLI, ET KÕIK VÄLJAD OLEKSID TÄIDETUD
                if ($a == null || $b == null || $C_nurk == null) {
                    echo "Kõik väljad peavad olema täidetud!";
                    exit();
                }

                //KONTROLLI, ET SISESTATUD VÄÄRTUSED OLEKSID POSITIIVSED
                if ($a <= 0 || $b <= 0 || $C_nurk <= 0) {
                    echo "Väärtused ei saa olla negatiivsed.";
                    exit();
                }


                //ARVUTA KÜLJED, NURGAD

                $c = sqrt(($a * $a) + ($b * $b) - (2 * $a * $b * cos(deg2rad($C_nurk))));

                $A_nurk = rad2deg(acos((($b * $b) + ($c * $c) - ($a * $a)) / (2 * $b * $c)));
                $B_nurk = 180 - $A_nurk - $C_nurk;

                $ymberm66t = $a + $b + $c;
                $pindala = sqrt(($ymberm66t / 2) * (($ymberm66t / 2) - $a) * (($ymberm66t / 2) - $b) * (($ymberm66t / 2) - $c));


                //KONTROLL: TÜÜP KÜLGEDE JÄRGI

                if ($a == $b && $a == $c && $b == $c) {
                    $tyyp_kylg = "Võrdkülgne";
                } else if ($a == $b || $a == $c || $b == $c) {
                    $tyyp_kylg = "Võrdhaarne";
                } else {
                    $tyyp_kylg = "Erikülgne";
                }


                //KOLMNURGA TÜÜP NURKADE JÄRGI

                if ($A_nurk == 90 || $B_nurk == 90 || $C_nurk == 90) {
                    $tyyp_nurk = "Täisnurkne. ";
                } else if ($A_nurk > 90 || $B_nurk > 90 || $C_nurk > 90) {
                    $tyyp_nurk = "Nürinurkne";
                } else if ($A_nurk < 90 && $B_nurk < 90 && $C_nurk < 90) {
                    $tyyp_nurk = "Teravnurkne";
                } else {
                    $tyyp_nurk = "";
                }

            }


            // SSA      http://www.myweb.ttu.edu/jengwer/past_teaching/MATH1321/notes/ssa_triangles.pdf

            if (isset($_POST['ssa'])) {

                $a = $_POST['a'];
                $b = $_POST['b'];
                $B_nurk = $_POST['B'];

                // KONTROLLI, ET KÕIK VÄLJAD OLEKSID TÄIDETUD
                if ($a == null || $b == null || $B_nurk == null) {
                    echo "Kõik väljad peavad olema täidetud!";
                    exit();
                }

                // KONTROLLI, ET SISESTATUD VÄÄRTUSED OLEKSID POSITIIVSED
                if ($a <= 0 || $b <= 0 || $B_nurk <= 0) {
                    echo "Väärtused ei saa olla negatiivsed.";
                    exit();
                }


                // ESIMENE KOLMNURK, LAHEND (KUI ON OLEMAS)
                // siinusteoreemi j2rgi

                // Here's a useful mnemonic device: MADES = ' Mystery Angle Displaced from Established Side'
                // If upon using the [sin−1] calculator button you get a DOMAIN ERROR then NO TRIANGLE EXISTS -- DONE! (falls outside the range of sine [−1,1])

                $A_nurk_MADES = $a * sin(deg2rad($B_nurk)) / $b;
                if ($A_nurk_MADES >= 1 || $A_nurk_MADES <= -1) {
                    echo "Sellist kolmnurka pole olemas.";
                    exit();
                } else {
                    $A_nurk = rad2deg(asin($a * sin(deg2rad($B_nurk)) / $b));
                    $C_nurk = 180 - $A_nurk - $B_nurk;
                    $c = sqrt(($a * $a) + ($b * $b) - (2 * $a * $b * cos(deg2rad($C_nurk))));

                    $ymberm66t = $a + $b + $c;
                    $pindala = sqrt(($ymberm66t / 2) * (($ymberm66t / 2) - $a) * (($ymberm66t / 2) - $b) * (($ymberm66t / 2) - $c));

                    // KONTROLL: TÜÜP KÜLGEDE JÄRGI

                    if ($a == $b && $a == $c && $b == $c) {
                        $tyyp_kylg = "Võrdkülgne";
                    } else if ($a == $b || $a == $c || $b == $c) {
                        $tyyp_kylg = "Võrdhaarne";
                    } else {
                        $tyyp_kylg = "Erikülgne";
                    }

                    //KOLMNURGA TÜÜP NURKADE JÄRGI

                    if ($A_nurk == 90 || $B_nurk == 90 || $C_nurk == 90) {
                        $tyyp_nurk = "Täisnurkne. ";
                    } else if ($A_nurk > 90 || $B_nurk > 90 || $C_nurk > 90) {
                        $tyyp_nurk = "Nürinurkne";
                    } else if ($A_nurk < 90 && $B_nurk < 90 && $C_nurk < 90) {
                        $tyyp_nurk = "Teravnurkne";
                    } else {
                        $tyyp_nurk = "";
                    }
                }


                // TEINE KOLMNURK, LAHEND (KUI ON OLEMAS)

                //Now, find the supplement of the unknown angle opposite the known side.
                //If MADES + (the given angle) ≥ 180°, then NO 2ND TRIANGLE EXISTS -- DONE!

                $A_nurk = rad2deg(asin($a * sin(deg2rad($B_nurk)) / $b));
                $A_nurk_2 = 180 - $A_nurk;


                if (($A_nurk_2 + $B_nurk) < 180) {
                    //on teine lahend ka olemas

                    $C_nurk_2 = 180 - $A_nurk_2 - $B_nurk;
                    $c_2 = sqrt(($a * $a) + ($b * $b) - (2 * $a * $b * cos(deg2rad($C_nurk_2))));

                    $ymberm66t_2 = $a + $b + $c_2;
                    $pindala_2 = sqrt(($ymberm66t_2 / 2) * (($ymberm66t_2 / 2) - $a) * (($ymberm66t_2 / 2) - $b) * (($ymberm66t_2 / 2) - $c_2));


                    // KONTROLL: TÜÜP KÜLGEDE JÄRGI

                    if ($a == $b && $a == $c_2 && $b == $c_2) {
                        $tyyp_kylg_2 = "Võrdkülgne";
                    } else if ($a == $b || $a == $c_2 || $b == $c_2) {
                        $tyyp_kylg_2 = "Võrdhaarne";
                    } else {
                        $tyyp_kylg_2 = "Erikülgne";
                    }

                    //KOLMNURGA TÜÜP NURKADE JÄRGI

                    if ($A_nurk_2 == 90 || $B_nurk == 90 || $C_nurk_2 == 90) {
                        $tyyp_nurk_2 = "Täisnurkne. ";
                    } else if ($A_nurk_2 > 90 || $B_nurk > 90 || $C_nurk_2 > 90) {
                        $tyyp_nurk_2 = "Nürinurkne";
                    } else if ($A_nurk_2 < 90 && $B_nurk < 90 && $C_nurk_2 < 90) {
                        $tyyp_nurk_2 = "Teravnurkne";
                    } else {
                        $tyyp_nurk_2 = "";
                    }

                    print("<br/>KOLMNURGAL ON KAKS LAHENDUST!<br/>");
                    print("<br/>");
                    print("<br/>Esimene lahendus:");
                    print("<br/>");

                    printf("<br/>Nurkade suurused: A = %.2f, B = %.2f, C = %.2f", $A_nurk_2, $B_nurk, $C_nurk_2);
                    printf("<br/>Külgede pikkused: a = %.2f, b = %.2f, c = %.2f", $a, $b, $c_2);
                    printf("<br/>Kolmnurga ümbermõõt: %.2f", $ymberm66t_2);
                    printf("<br/>Kolmnurga pindala: %.2f", $pindala_2);
                    print("<br/>Kolmnurga tüüp külgede järgi: " . $tyyp_kylg_2);
                    print("<br/>Kolmnurga tüüp nurkade järgi: " . $tyyp_nurk_2);
                    print("<br/>");

                    print("<br/>Teine lahendus:");

                }


                // KONTROLL: TÜÜP KÜLGEDE JÄRGI

                if ($a == $b && $a == $c && $b == $c) {
                    $tyyp_kylg = "Võrdkülgne";
                } else if ($a == $b || $a == $c || $b == $c) {
                    $tyyp_kylg = "Võrdhaarne";
                } else {
                    $tyyp_kylg = "Erikülgne";
                }

                //KOLMNURGA TÜÜP NURKADE JÄRGI

                if ($A_nurk == 90 || $B_nurk == 90 || $C_nurk == 90) {
                    $tyyp_nurk = "Täisnurkne. ";
                } else if ($A_nurk > 90 || $B_nurk > 90 || $C_nurk > 90) {
                    $tyyp_nurk = "Nürinurkne";
                } else if ($A_nurk < 90 && $B_nurk < 90 && $C_nurk < 90) {
                    $tyyp_nurk = "Teravnurkne";
                } else {
                    $tyyp_nurk = "";
                }


            }


            // ASA

            if (isset($_POST['asa'])) {

                $B_nurk = $_POST['B'];
                $c = $_POST['c'];
                $A_nurk = $_POST['A'];

                // KONTROLLI, ET KÕIK VÄLJAD OLEKSID TÄIDETUD
                if ($B_nurk == null || $c == null || $A_nurk == null) {
                    echo "Kõik väljad peavad olema täidetud!";
                    exit();
                }

                // KONTROLLI, ET SISESTATUD VÄÄRTUSED OLEKSID POSITIIVSED
                if ($A_nurk <= 0 || $c <= 0 || $B_nurk <= 0) {
                    echo "Väärtused ei saa olla negatiivsed.";
                    exit();
                }


                // ARVUTA KÜLJED a JA b
                $A_nurk_rad = deg2rad($A_nurk);
                $B_nurk_rad = deg2rad($B_nurk);

                $a = $c * (sin($A_nurk_rad) / ((sin($A_nurk_rad) * cos($B_nurk_rad)) + (sin($B_nurk_rad) * cos($A_nurk_rad))));
                $b = $c * (sin($B_nurk_rad) / ((sin($A_nurk_rad) * cos($B_nurk_rad)) + (sin($B_nurk_rad) * cos($A_nurk_rad))));

                //  C NURK
                $C_nurk = 180 - $A_nurk - $B_nurk;

                $ymberm66t = $a + $b + $c;
                $pindala = sqrt(($ymberm66t / 2) * (($ymberm66t / 2) - $a) * (($ymberm66t / 2) - $b) * (($ymberm66t / 2) - $c));


                // KONTROLL: TÜÜP KÜLGEDE JÄRGI

                if ($a == $b && $a == $c && $b == $c) {
                    $tyyp_kylg = "Võrdkülgne";
                } else if ($a == $b || $a == $c || $b == $c) {
                    $tyyp_kylg = "Võrdhaarne";
                } else {
                    $tyyp_kylg = "Erikülgne";
                }

                //KOLMNURGA TÜÜP NURKADE JÄRGI

                if ($A_nurk == 90 || $B_nurk == 90 || $C_nurk == 90) {
                    $tyyp_nurk = "Täisnurkne. ";
                } else if ($A_nurk > 90 || $B_nurk > 90 || $C_nurk > 90) {
                    $tyyp_nurk = "Nürinurkne";
                } else if ($A_nurk < 90 && $B_nurk < 90 && $C_nurk < 90) {
                    $tyyp_nurk = "Teravnurkne";
                } else {
                    $tyyp_nurk = "";
                }


            }


            // AAS

            if (isset($_POST['aas'])) {

                $a = $_POST['a'];
                $B_nurk = $_POST['B'];
                $A_nurk = $_POST['A'];

                // KONTROLLI, ET KÕIK VÄLJAD OLEKSID TÄIDETUD
                if ($a == null || $B_nurk == null || $A_nurk == null) {
                    echo "Kõik väljad peavad olema täidetud!";
                    exit();
                }

                // KONTROLLI, ET SISESTATUD VÄÄRTUSED OLEKSID POSITIIVSED
                if ($a <= 0 || $B_nurk <= 0 || $A_nurk <= 0) {
                    echo "Väärtused ei saa olla negatiivsed.";
                    exit();
                }

                // NURK C
                $C_nurk = 180 - $A_nurk - $B_nurk;

                // KYLJED
                $c = $a * (sin(deg2rad($C_nurk)) / sin(deg2rad($A_nurk)));
                $b = $a * (sin(deg2rad($B_nurk)) / sin(deg2rad($A_nurk)));

                $ymberm66t = $a + $b + $c;
                $pindala = sqrt(($ymberm66t / 2) * (($ymberm66t / 2) - $a) * (($ymberm66t / 2) - $b) * (($ymberm66t / 2) - $c));


                // KONTROLL: TÜÜP KÜLGEDE JÄRGI

                if ($a == $b && $a == $c && $b == $c) {
                    $tyyp_kylg = "Võrdkülgne";
                } else if ($a == $b || $a == $c || $b == $c) {
                    $tyyp_kylg = "Võrdhaarne";
                } else {
                    $tyyp_kylg = "Erikülgne";
                }


                //KOLMNURGA TÜÜP NURKADE JÄRGI

                if ($A_nurk == 90 || $B_nurk == 90 || $C_nurk == 90) {
                    $tyyp_nurk = "Täisnurkne. ";
                } else if ($A_nurk > 90 || $B_nurk > 90 || $C_nurk > 90) {
                    $tyyp_nurk = "Nürinurkne";
                } else if ($A_nurk < 90 && $B_nurk < 90 && $C_nurk < 90) {
                    $tyyp_nurk = "Teravnurkne";
                } else {
                    $tyyp_nurk = "";
                }

            }


            print("<br/>");
            printf("<br/>Nurkade suurused: A = %.2f, B = %.2f, C = %.2f", $A_nurk, $B_nurk, $C_nurk);
            printf("<br/>Külgede pikkused: a = %.2f, b = %.2f, c = %.2f", $a, $b, $c);
            printf("<br/>Kolmnurga ümbermõõt: %.2f", $ymberm66t);
            printf("<br/>Kolmnurga pindala: %.2f", $pindala);
            print("<br/>Kolmnurga tüüp külgede järgi: " . $tyyp_kylg);
            print("<br/>Kolmnurga tüüp nurkade järgi: " . $tyyp_nurk);

            ?>
        </div>
    </div>

    <div class="row" style="padding-top: 50px">
        <a target="_blank" href="kolmnurk_3.png">
            <img src="kolmnurk_3.png" alt="kolmurga algoritm" class="img-thumbnail"
                 style="width:500px; margin-bottom: 20px;">
        </a>
    </div>

</div>