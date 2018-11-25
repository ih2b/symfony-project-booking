<div class="col-lg-3">

    <div class="list-group">

        <?php
        $requete = "SELECT  * FROM categorie";
        $resultat = mysqli_query($connection,$requete);
        if(!$resultat){
            die("query failed ".mysqli_error($connection));
        }
        while (($data=mysqli_fetch_array($resultat))!=null)
        {
            echo "<a href='' class='list-group-item'>{$data['titre_categorie']}</a>";
        }
        ?>
    </div>

</div>