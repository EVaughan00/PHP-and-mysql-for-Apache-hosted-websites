<?php
    echo "CustomerDB profile information";
    $DBNAME = "CustomerDB";
    $DBHOST = "localhost";
    $DBUSER = "Evdb";
    $DBPASSWORD = "password";
    
    $LINK = mysqli_connect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);

    if(mysqli_connect_errno()){
        echo "<br>Connection refused: " . mysqli_connect_error();
        
        return false;
    }
    echo "<br>Connected<br>";

    $query = "SELECT * FROM profile";
    
    $RESULT = mysqli_query($LINK, $query) or die("Retrieval error: " .          mysqli_error());

    //print_r($RESULT);

    $rows = mysqli_num_rows($RESULT);
    printf("<br>Rows Retrieved %s\n", $rows);
  
    printf("<br><table border=1>\n");
    while($LINE = mysqli_fetch_array($RESULT)){
        //print_r($LINE);
        printf("<tr>");
        for($i = 0; $i<sizeof($LINE)/2; $i++){
            if(strstr($LINE[$i], "images")==true){

            continue;
            }
            printf("<td>%s</td>", $LINE[$i]);
            
        }
        printf("<td> <img src=%s width=440 height=300></td>", $LINE["Image"]);
        printf("</tr>\n");

    }
    
    printf("</table>\n");
    //Free Results
    mysqli_free_result($RESULT);
    mysqli_close($LINK);
?>
