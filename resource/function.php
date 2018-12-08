<?php

function redirect($location){
    header("Location: $location");
}

function query($query){
    global $connection;
    return mysqli_query($connection, $query);
}

function confirm($result){
    global $connection;
    if (!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

function get_product(){
    $query =query("SELECT * FROM produit");
    confirm($query);
    while ($data = fetch_array($query)){
        $prod=<<<DELIMETER
        <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="items.php?id= {$data['produit_id']}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="items.php?id= {$data['produit_id']}">{$data['produit_titre']}</a>
                  </h4>
                  <h5>{$data['produit_prix']} dinar</h5>
                  <p class="card-text">{$data['produit_desc']}</p>
                </div>
                <div class="card-footer">
                 <a class="btn btn-primary pull-right"target="_self" href="items.php?id={$data['produit_id']} ">view more</a>
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
DELIMETER;
            echo $prod;
    }
}

// get catagory 


function get_product_in_cat_page(){
    $query =query("SELECT * FROM produit WHERE produit_categorie_id =".escape_string($_GET['id'])."");
    confirm($query);
    while ($data = fetch_array($query)){
        $prod=<<<DELIMETER
        <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="items.php?id= {$data['produit_id']}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="items.php?id= {$data['produit_id']}">{$data['produit_titre']}</a>
                  </h4>
                  <h5>{$data['produit_prix']} dinar</h5>
                  <p class="card-text">{$data['produit_desc']}</p>
                </div>
                <div class="card-footer">
                 <a class="btn btn-primary pull-right"target="_self" href="items.php?id={$data['produit_id']} ">view more</a>
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
DELIMETER;
            echo $prod;
    }
}


 function get_catagories(){
    $query =query("SELECT * FROM categorie");
    confirm($query);
    while ($data = fetch_array($query)){
        $cat=<<<DELIMETER
<a href='category.php?id={$data['id_categorie']}' class='list-group-item list-group-item-action'>{$data['titre_categorie']}</a>
DELIMETER;
            echo $cat;
    }
}


function login(){
    if ((isset($_GET['id']))&&(escape_string($_GET['id']) == "0")){
        unset($_SESSION['user_id']);
        redirect("../public/index.php");
    }
    if(isset($_POST['submit'])){
        $name = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        $admin = $_POST['admin'];
        if ($admin == "on"){
            $query = query("SELECT * FROM admin WHERE admin_name = '{$name}' AND admin_password = '{$password}'");
            confirm($query);

            if(mysqli_num_rows($query) == 0){
                set_message("Wrong!");
                redirect("../public/login.php");

            }
            else{
                $data = mysqli_fetch_array($query);
                $_SESSION['admin_id']=$data['admin_id'];
                redirect("../public/admin/index.php");
            }
        }
        else{
            $query = query("SELECT * FROM users WHERE user_name = '{$name}' AND user_password = '{$password}'");
            confirm($query);

            if(mysqli_num_rows($query) == 0){
            set_message("Wrong!");
            redirect("../public/login.php");

        }
        else{
            $data = mysqli_fetch_array($query);
            $_SESSION['user_id']=$data['user_id'];
            redirect("index.php");
        }
    }
    }
}

function checkReservation(){
        $produit_id = $_GET['id'];
        if (isset($_POST['submit'])){
            $date = date('Y-m-d', strtotime($_POST['date']));
            date_default_timezone_set('Africa/Tunis');
            $cDate = date('Y-m-d', time());
            if($date > $cDate){
                $query = query("SELECT * FROM reservation WHERE (date_reservation ='{$date}' AND produit_id = '{$produit_id}')");
                confirm($query);

                if (mysqli_num_rows($query )!=0){
                    set_message("La salle est deja reservé à cette date");
                    redirect("../public/items?id={$produit_id}");
                }
                else{
                    $query2 =query("INSERT INTO reservation(user_id, produit_id, date_reservation) 
                                            VALUES ('{$_SESSION['user_id']}','{$produit_id}','{$date}')");
                    confirm($query2);
                    set_message("La reservation est faite avec succes!");
                    redirect("../public/items?id={$produit_id}");
                }
            }
            else{
                set_message("Veuillez saisir une date valide!");
                redirect("../public/items?id={$produit_id}");
            }
    }
}

function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message']=$msg;
    }else{
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function send_message(){
    if(isset($_POST['submit'])){
        $to = "fakherbourray@gmail.com";
        $from_name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $headers = "From: {$from_name} {$email}";
        $result = mail($to, $subject, $message, $headers);
        
        if(!$result){
            set_message("try again");
            redirect("contact.php");
        }else{
            set_message("message sent successfully");
            redirect("contact.php");
        }
    }
}

function cart(){
    $_SESSION['item_quantity'] =0;
    $_SESSION['item_total'] = 0;
    $query = query("SELECT * FROM reservation,produit WHERE reservation.user_id = {$_SESSION['user_id']} AND produit.produit_id = reservation.produit_id;");
    confirm($query);
    while ($row = fetch_array($query)){
        $_SESSION['item_quantity'] +=1;
        $_SESSION['item_total'] += $row['produit_prix'];
            $produit = <<<DELIMETER
            <tr>
                <td>{$row['reservation_id']}</td>
                <td><a href="../public/items.php?id= {$row['produit_id']}"> {$row['produit_titre']}</a></td>
                <td>{$row['date_reservation']}</td>
                <td>{$row['produit_prix']}</td>
                <td><a class="btn btn-danger" href="../public/checkout.php?remove={$row['reservation_id']}">
                <span class="glyphicon glyphicon-remove" >X</span> </a> </td>
            </tr>
DELIMETER;
            echo $produit;
    }
    if(isset($_GET['remove'])){
        $query2 = query("DELETE FROM reservation WHERE reservation_id = " . escape_string($_GET['remove']) . ";");
        $_SESSION['produit_' . $_GET['remove']] = 0;
        redirect("../public/checkout.php");
    }
}

function show_paypal(){

}


?>