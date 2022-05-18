<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                
                $("#res").on("click",".delete",function(){
                    var arr = $(this).attr('arr');
                    var key = $(this).attr('key');
                    $.ajax({
                        type:'post',
                        url:'store_item.php',
                        data:{
                            delete: "delete",
                            arr: arr,
                            key: key   
                        },
                        success:function(response) {
                            document.getElementById("res").innerHTML=response;
                        }
                    });
                });
                $("#res").on("click","#ADD",function(){
                    var key = document.getElementById('new-task').value;
                    if(key!=""){
                        $.ajax({
                            type:'post',
                            url:'store_item.php',
                            data:{
                                add: "add",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                    }            
                });
                $("#res").on("click","#edit",function(){
                    var key = $(this).attr('key');
                    var arr = $(this).attr('arr');
                    document.getElementById("btn").innerHTML="Update";
                    document.getElementById("new-task").value=key;
                    document.getElementById("ADD").id="update";
                    $.ajax({
                        type:'post',
                        url:'store_item.php',
                        data:{
                            edit: "edit",
                            key: key,
                            arr: arr   
                        },
                        success:function(response) {
                            document.getElementById("res").value=response;
                        }
                    });
                });
                $("#res").on("click","#update",function(){
                    var key = document.getElementById('new-task').value;
                    if(key!=""){
                        document.getElementById("btn").innerHTML="ADD";
                        document.getElementById("new-task").value="";
                        document.getElementById("update").id="ADD";
                        $.ajax({
                            type:'post',
                            url:'store_item.php',
                            data:{
                                update: "update",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                    }
                                
                });
                $("#res").on("click","#incomplete_check",function(){
                    var key = $(this).attr('key');
                    $.ajax({
                            type:'post',
                            url:'store_item.php',
                            data:{
                                in_change: "complete",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                });
                $("#res").on("click","#complete_check",function(){
                    var key = $(this).attr('key');
                    $.ajax({
                            type:'post',
                            url:'store_item.php',
                            data:{
                                change: "complete",
                                key: key   
                            },
                            success:function(response) {
                                document.getElementById("res").innerHTML=response;
                            }
                        });
                });
                show();
                    
            });


            function show(){
                $.ajax({
                    type:'post',
                    url:'store_item.php',
                    data:{
                        show_data:"show"
                    },
                    success:function(response) {
                        document.getElementById("res").innerHTML=response;
                    }
                });

            }
            
        </script>
        <title>TODO List</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        </head>
        <body>
            <div id="res"></div>
        </body>
    </html>