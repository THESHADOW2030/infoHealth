<?php
    $conn = pg_connect("host=localhost port=5432 dbname=InfoHealth user=postgres password=THEDARK2030");
    if(!$conn)
    {
        echo "Errore: impossibile raggiungere i nostri database";
    }
    else
    {
        if (isset($_POST['userLogin']))
            $user = $_POST['userLogin'];
        if (isset($_POST['passwordLogin']))
            $password = $_POST['passwordLogin'];
        if(isset($_SESSION['user']))
            header("Location: homepage/index.html");

        $q1 = "SELECT * FROM public.users WHERE username = $1 AND password = $2";

        $result = pg_query_params($conn, $q1, array($user, $password));

        if ($line = pg_fetch_array($result, null, PGSQL_ASSOC))
        {
            //If user and password found 
            echo "1";
            //Start session
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;

            //Redirect to homepage
            //("Location: ../homepage/boh.html");
        }
        else
        {
            //Else not found
            echo "0";
        }
    }














?>