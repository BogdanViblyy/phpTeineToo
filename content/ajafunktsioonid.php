<?php
echo "<h1>Ajafunktsioonid</h1>";
echo "<div id='kuupaev'>";
echo "Täna on ".date("d.m.Y")."<br>";
date_default_timezone_set("Europe/Tallinn");//mm.dd.yyyy h:mm
echo "<strong>";
echo "Tänane Tallinna kuupäev ja kellaeg on ".
    date("d.m.Y")."<br>";
echo "</strong>";
echo "date('d.mY G:i:s', time())";
echo "d - kuubäev 1-31";
echo "<br>";
echo "m - kuu numbrina 1-12";
echo "<br>";
echo "Y - aasta neljakohane";
echo "<br>";
echo "G - tunniformaat 0-24";
"<br>";
echo "i -minutid 0-59";
echo "</div>";
?>
<div id="hooaeg">
    <h2>Väljasta vastavalt hooajale pilt
        (kevad/suvi/sügis/talv)</h2>
    <?php
    $today =new DateTime();
    echo "Täna on ".$today->format("3-30-2024");
    //hooaja punktid -season
    $spring= new DateTime('March 20');
    $summer= new DateTime('June 21');
    $fall=new DateTime('September 22');
    $winter=new DateTime('December 22');

    switch(true){
        case ($today>=$spring && $today<$summer):
            echo "Kevad";
            $pildi_aadress='content/img/spring.jpg';
            break;
        //suvi
        case ($today>=$summer && $today<$fall):
            echo "Suvi";
            $pildi_aadress='content/img/summer.jpg';
            break;
        //sügis
        case ($today>=$fall && $today<$winter):
            echo "Sügis";
            $pildi_aadress='content/img/fall.jpg';
            break;
        //talv
        case ($today>=$winter && $today<$spring):
            echo "Talv";
            $pildi_aadress='content/img/winter.jpg';


    }
    ?>
    <img src="<?=$pildi_aadress?>" alt='hooaja pilt' width="450">

</div>
<div id="koolivaheaeg">
    <h2>Mitu päeva on koolivaheajani 23.12.2024</h2>
    <?php
    $kdate=date_create_from_format('d.m.Y', '23.12.2024');
    $date=date_create();
    $diff=date_diff($kdate,$date);
    echo "jääb ". $diff->format("%a")." päeva";
    echo "<br>";
    echo "jääb ". $diff->days." päeva";
    ?>

</div>
<div id="sunnipaev">
    <h2>Mitu päeva on minu sünnipäevani 07.09.2025</h2>
    <?php
    $sdate=date_create_from_format('d.m.Y', '07.09.2025');
    $date=date_create();
    $diff=date_diff($sdate,$date);
    echo "jääb ". $diff->days." päeva";
    ?>

</div>
<div id="vanus">
    <h2>Kasutaja vanuse leidmine</h2>
    <form method="post" action="">
        Sisesta oma sünnikuupäev
        <input type="date" name="synd" placeholder="dd.mm.yyyy">
        <input type="submit" value="OK">
    </form>
    <?php
    if(isset($_REQUEST["synd"])){
        if(empty($_REQUEST["synd"])){
            echo "sisesta oma Sunnipäeva kuupäev";
        }
        else{
            $adate=date_create($_REQUEST["synd"]);
            $date=date_create();
            $diff=date_diff($adate,$date);
            echo "Sa oled ". $diff->format("%a")." aastat vana";
        }
    }
    ?>

</div>
<div id="kuu">
    <h2>Massivi abil näida kuu nimega.</h2>
    <?php

    $kuud_array = [
        1 => 'Jaanuar',
        2 => 'Veebruar',
        3 => 'Märts',
        4 => 'Aprill',
        5 => 'Mai',
        6 => 'Juuni',
        7 => 'Juuli',
        8 => 'August',
        9 => 'September',
        10 => 'Oktoober',
        11 => 'November',
        12 => 'Detsember'
    ];
    $month = date('n');
    $year = date('Y');
    echo $kuud_array[$month];
    ?>
</div>

