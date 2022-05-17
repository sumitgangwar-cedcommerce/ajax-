<?php
    session_start();
    if(isset($_POST['name'])){
        $t=1;
        foreach($_SESSION as $key=>$val){
            if($_POST['name']==$key){
                $_SESSION[$key]['quantity']+=1;
                $t=0;
                break;
            }
        }
        if($t==1){   
            $arr = array(
                'name' => $_POST['name'],
                'image' => $_POST['image'],
                'price' => $_POST['price'],
                'quantity' => 1
            );
            $_SESSION[$_POST['name']]=$arr;
        }
        // echo count($_SESSION['name']);
        // exit();
    }

    if(isset($_POST['showcart'])){

       // print_r($_SESSION);
        echo "<h1>Cart</h1>";
        echo "<table id='table'><tr>
            <th id='tab'>Name</th>
            <th id='tab'>Image</th>
            <th id='tab'>Price</th>
            <th id='tab'>Quantity</th>
        </tr>";
        foreach($_SESSION as $key=>$key2){
            echo "<tr><td id='tab'>".$key2['name']."</td>
                    <td id='tab'><img id='img' src=".$key2['image']."></td>
                    <td id='tab'>".$key2['price']."</td>
                    <td id='tab'>".$key2['quantity']."</td>
                </tr>";
        }
        echo "</table>";
        
        //print_r($_SESSION);
       //session_destroy();
    // exit();	
    }
?>