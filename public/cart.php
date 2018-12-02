<?php require_once("../resource/config.php"); ?>

<?php
    if(isset($_GET['id'])){
        $query = query("SELECT * FROM produit WHERE produit_id=" . escape_string($_GET['id']) . " ");
        confirm($query);
        $row = fetch_array($query);
        if($row['produit_disponible'] == 1){
            $query2 = query("UPDATE produit SET produit_disponible = '0' WHERE produit_id = " . escape_string($_GET['id']) . " ");
            $_SESSION['produit_' . $_GET['id']] = 1;
            redirect("checkout.php");
        }
        else{
            set_message("La salle " . $row['produit_titre'] . " n est pas disponible");
            redirect("checkout.php");
        }


    }

    if(isset($_GET['remove'])){
        $query2 = query("UPDATE produit SET produit_disponible = '1' WHERE produit_id = " . escape_string($_GET['remove']) . ";");
        $_SESSION['produit_' . $_GET['remove']] = 0;
        redirect("checkout.php");
    }



?>
