<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #184A78;
        }
        body{
            background-color: #fff;
        }
        .header{
            z-index: 3000;
        }
        h1{
            position:relative;
            top: 120px;
            z-index: 1;
            padding-left:10px;
        }
        .container{
            padding:20px;
            position: relative;
            top: 150px;
            width: 95%;
            display: flex;
            flex-direction: column;
            z-index: 1;
        }
        .subcontainer1{
            width: 100%;
            height: 60px;
            border: 1px solid black;
            display: flex;
            justify-content: space-evenly;
            background:#184A78;
            
        }
        .category{ 
            text-align: center;
          
           
        }
        .category p{
            margin-top: 8px;
            color:#fff;
        }
        .subcontainer2{
            display: flex;
            flex-direction: column;
        }
        .notification{
            width: 100%;
            height: 40px;
            border: 1px solid black;
            display:flex;
        }
        .from{
            width:60px;
            margin-top:10px;
            margin-bottom:10px;
            margin-left:150px;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
        }
        .header_notification{
            width:250px;
            margin-top:10px;
            margin-bottom:10px;
            margin-left:30px;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
        }
        .message_notification{
            width:800px;
            margin-top:10px;
            margin-bottom:10px;
            overflow:hidden;
            text-overflow:ellipsis;
            margin-left:30px;
            white-space: nowrap; 
        }
        .delete{
            margin-top:10px;
            margin-left:30px;
        }
    </style>
</head>
<body>
        <div class="header">
            <?php require 'view_headerType2.php'; ?>
        </div>
        

    <h1>NOTIFICATIONS</h1>
    <div class="container">
        <div class="subcontainer1">
            <div class="category">
                <p>PAYMENTS</p>
                <p>10</p>
            </div>
            <div class="category">
                <p>BILLS</p>
                <p>10</p>
            </div>
            <div class="category">
                <p>OTHER</p>
                <p>10</p>
            </div>
        </div>
        <div class="subcontainer2">
            <?php
            
            for($i = 0 ; $i < 100 ; $i++){
                echo "<div class='notification'>

                        <div class='from'>
                            admin1
                        </div>
                        <div class='header_notification'>
                            header of the notinnnnnnnnnnnnnnnnnnnnnnnnnnnnfication
                        </div>
                        <div class='message_notification' id='message_notification'>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                            Odio sit deleniti, nostrum repudiandae ullam perspiciatis 
                            facilis quaerat eligendi omnis animi enim similique in porro 
                            necessitatibus dolor sed error quo qui cumque inventore! Quasi 
                            atque repellat a laborum incidunt nostrum reprehenderit dolorum, 
                            adipisci nulla neque quisquam magnam quia enim sunt, culpa soluta 
                            voluptate? Temporibus modi dolorum eius. Veritatis, id cumque labore
                             nihil neque harum non quia aliquam debitis ad porro incidunt delectus
                              aperiam laborum. Nulla corrupti laudantium incidunt possimus iure, 
                              iste nemo quis architecto, quia cumque pariatur debitis facere 
                              corporis officiis recusandae culpa mollitia sapiente, animi cupiditate? 
                              Debitis laudantium perspiciatis unde.
                        </div>
                        <div class='delete'>
                       <a> <i class='fas fa-trash'></i></a>
                        
                        </div>
                      </div>";
            }
            
            ?>
            
            
        </div>
    </div>
    


   
</body>
</html>

