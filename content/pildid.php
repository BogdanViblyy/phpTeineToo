<h2>
    <a href="https://www.metshein.com/unit/php-pildifailidega-ulesanne-14/"></a>
</h2>
<form method="post" action="">
    <select name="pildid">
        <option value="">Vali pilt</option>
        <?php
        $kataloog = 'content/img';
        $asukoht = opendir($kataloog);
        $pildidMassiiv = array();
        while($rida = readdir($asukoht)){
            if($rida!='.' && $rida!='..'){
                echo "<option value='$rida'>$rida</option>\n";
                array_push($pildidMassiiv,$rida);
            }
        }
        ?>
    </select>
    <input type="submit" value="Vaata">
    <input name="random" type="submit" value="random picture">
</form>
<?php
if(!empty($_POST['pildid'])){
    $pilt = $_POST['pildid'];
    $pildi_aadress = 'content/img/'.$pilt;
} else {
    $random = random_int(0, count($pildidMassiiv)-1);
    $pildi_aadress = 'content/img/'.$pildidMassiiv[$random];
}
$pildi_andmed = getimagesize($pildi_aadress);
$laius = $pildi_andmed[0];
$korgus = $pildi_andmed[1];
$formaat = $pildi_andmed[2];
$max_laius = 120;
$max_korgus = 90;

//suhtearvu leidmine
if($laius <= $max_korgus && $korgus<=$max_korgus){
    $ratio = 1;
} elseif($laius>$korgus){
    $ratio = $max_laius/$laius;
} else {
    $ratio = $max_korgus/$korgus;
}

//uute mõõtmete leidmine
$pisi_laius = round($laius*$ratio);
$pisi_korgus = round($korgus*$ratio);

echo '<h3>Originaal pildi andmed</h3>';
echo "Laius: $laius<br>";
echo "Kõrgus: $korgus<br>";
echo "Formaat: $formaat<br>";

echo '<h3>Uue pildi andmed</h3>';
echo "Arvutamse suhe: $ratio <br>";
echo "Laius: $pisi_laius<br>";
echo "Kõrgus: $pisi_korgus<br>";
echo "<br><img width='$pisi_laius' src='$pildi_aadress'><br>";
?>






