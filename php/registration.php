<?php
    $conn = pg_connect("host=localhost port=5432 dbname=InfoHealth user=postgres password=THEDARK2030");
    if(!$conn)
    {
        //echo "Not connected to database<br>";
    }
    else
    {
        //echo "Connected to database<br>";

        if (isset($_POST['email']))
            $email = $_POST['email'];
        if (isset($_POST['userRegistration']))
            $user = $_POST['userRegistration'];
        if (isset($_POST['passwordRegistration']))
            $password = $_POST['passwordRegistration'];

        $q1 = " SELECT *
                FROM public.users
                WHERE username = $1";

        $q3 = " SELECT *
                FROM public.users
                WHERE email = $1";

        $result = pg_query_params($conn, $q1, array($user));
        $result1 = pg_query_params($conn, $q3, array($email));
        if($line = pg_fetch_array($result,null,PGSQL_ASSOC))
        {
            echo "0";
            $q2 = "INSERT INTO public.users (username, password,email) VALUES ($1, $2,$3);";
            $data = pg_query_params($conn, $q2, array($user, $password,$email));
            if ($data)
            {
                echo "1";
            }
            else
            {
                echo "Errore Interno!";
            }

            $q3 = "INSERT INTO public.user_info (username) VALUES ($1)";
            $data = pg_query_params($conn, $q3, array($user));





            header("Location: ../login.html");
        }
        elseif($line = pg_fetch_array($result1,null,PGSQL_ASSOC))
        {
            echo "-1";

        }
        else
        {
            $q2 = "INSERT INTO public.users (username, password,email) VALUES ($1, $2,$3);";
            $data = pg_query_params($conn, $q2, array($user, $password,$email));
            if ($data)
            {
                echo "1";
            }
            else
            {
                echo "Errore Interno!";
            }
        }
    }

?>