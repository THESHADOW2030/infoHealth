<?php
//$conn = pg_connect("host=localhost port=5432 dbname=InfoHealth user=postgres password=password");
$conn = pg_connect("host=localhost port=5432 dbname=InfoHealth user=postgres password=THEDARK2030");



if(!$conn)
{

}
else {
    session_start();

    if (isset($_SESSION['user']))
        $user = $_SESSION['user'];
    if (isset($_POST["dateAllenamento"]))
        $date = $_POST['dateAllenamento'];


    if (isset($_POST['attivita']))
        $attivita = $_POST['attivita'];


    if (isset($_POST['calorie_bruciateInput']))
        $calorie_bruciateInput = $_POST['calorie_bruciateInput'];


    if (isset($_POST['passiInput']))
        $passiInput = $_POST['passiInput'];

    if (isset($_POST['durata']))
        $durata = $_POST['durata'];

    if (isset($_POST['orarioAllenamento']))
        $orarioAllenamento = $_POST['orarioAllenamento'];

    // echo $user;
    // echo $date;
    // echo $attivita;
    // echo $calorie_bruciateInput;
    // echo $passiInput;

    //insert into user_activity(username, activity, calorie_bruciate, durata_minuti, data, passi ) values ('$user', '$attivita', $calorie_bruciateInput, $durata, '$date', $passiInput);

    $query = "INSERT INTO public.user_activity (username, activity, calorie_bruciate, durata_minuti, data, passi, ora ) VALUES ('$user', '$attivita', '$calorie_bruciateInput', '$durata', '$date', '$passiInput', '$orarioAllenamento')";

    $result = pg_query($conn, $query);
    if (!$result) {
        // echo "Errore: impossibile inserire i dati nel database";
    } else {
        // echo "Inserimento avvenuto con successo";
    }
}
?>
