<?php 
    session_start();
    if(!isset($_SESSION['incomplete'])){
        $_SESSION['incomplete']['Pay Bills']="Pay Bills";
        $_SESSION['incomplete']['Go Shopping']="Go Shopping";
    }
    if(!isset($_SESSION['complete'])){
        $_SESSION['complete']['See the doctor']="See the doctor";
    }
    if(isset($_POST['delete'])){
        if($_SESSION[$_POST['arr']][$_POST['key']]==""){
            foreach($_SESSION[$_POST['arr']] as $key=>$val){
                if($_POST['key']==$val){
                    unset($_SESSION[$_POST['arr']][$key]);
                    break;
                }
            }
        }
        unset($_SESSION[$_POST['arr']][$_POST['key']]);
        show_HTML();  
    }

    if(isset($_POST['show_data'])){    
        show_HTML();
    }
    if(isset($_POST['add'])){
        $_SESSION['incomplete'][$_POST['key']] = $_POST['key'];
        show_HTML();
    }
    if(isset($_POST['edit'])){
        $arr = $_POST['arr'];
        $inp_val = $_POST['key'];
        $count = 0;
        foreach($_SESSION[$arr] as $key=>$val){
           if($inp_val==$val)   break;
           else $count++;
        }
        $_SESSION['item'] = array($inp_val,$arr,$count);
    }
    if(isset($_POST['update'])){
        $key = $_POST['key'];
        $arr = $_SESSION['item'][1];
        $temp_arr = array($key=>$key);
        $count = $_SESSION['item'][2];
        array_splice($_SESSION[$arr],$count,1,$temp_arr);
        unset($_SESSION['item']);
        show_HTML();
    }
    if(isset($_POST['in_change'])){
        $key = $_POST['key'];
        $_SESSION['complete'][$key]=$key;
        foreach($_SESSION['incomplete'] as $key1=>$val){
            if($val==$key){
                unset($_SESSION['incomplete'][$key1]);
                break;
            }
        }
        show_HTML();
    }
    if(isset($_POST['change'])){
        $key = $_POST['key'];
        $_SESSION['incomplete'][$key]=$key;
        foreach($_SESSION['complete'] as $key1=>$val){
            if($val==$key){
                unset($_SESSION['complete'][$key1]);
                break;
            }
        }
        show_HTML();
    }
    function show_HTML(){
        echo '
            <div class="container">
                <h2>TODO LIST</h2>
                <h3>Add Item</h3>
                <p>
                    <input id="new-task" type="text">
                    <button id="ADD"><span id="btn">ADD</span></button>
                </p>
        
                <h3>Todo</h3>
                <ul id="incomplete-tasks">';
                foreach($_SESSION["incomplete"] as $key=>$val){
                   echo '<li>
                        <input id="incomplete_check" key="'.$val.'"type="checkbox">
                        <label>'.$val.'</label>
                        <input type="text">
                        <button class="edit" id="edit" arr="incomplete" key="'.$val.'">Edit</button>
                        <button class="delete" id="delete" arr="incomplete" key="'.$val.'">Delete</button>
                        </li>';
                }
                    
                echo '</ul>
                <h3>Completed</h3>
                <ul id="completed-tasks">';
                foreach($_SESSION["complete"] as $key=>$val){
                    echo '<li>
                        <input id="complete_check" key="'.$val.'"type="checkbox" checked>
                        <label>'.$val.'</label>
                        <input type="text">
                        <button class="edit" id="edit" arr="complete" key="'.$val.'">Edit</button>
                        <button class="delete" id="delete" arr="complete" key="'.$val.'">Delete</button>
                    </li>';
                }
                echo '</ul>
                     </div>';
    }
    //session_destroy();
?>

