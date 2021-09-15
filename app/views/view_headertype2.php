<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
    <style>


  
*{
    margin: 0;
    padding: 0;
}

body{
    font-family:Arial, Helvetica, sans-serif;
   
   
}
/* 


/*navigation*/
nav{
    width: 100%;
height: 80px;
background-color: #184A78;
position: fixed;
z-index: 1000;

}
nav h1{
    position: absolute;
    width: 400px;
    top: 10px;

    color: white;
    columns: black;
    text-transform: uppercase;
    font-family:logo;
  
    font-size: 25px;
   margin-left: 16px;
    letter-spacing: 3px;


}
nav h3{

    position: absolute;
    margin-top: 35px;
    color: white;
    font-size: 15px;
    margin-left: 16px;
    letter-spacing: 1px;
    font-family: 'Playball', cursive;
}
nav ul{
    float: right;
    margin-right: 25px;
    list-style: none;
   
}
nav ul li{
   display: inline-block;
    line-height: 60px;
    margin: 0 15px;
  text-transform: uppercase;
  list-style: none;
position: relative;
}


nav ul li a{
    position: relative;
    padding: 5px 0;
    color: rgb(151, 129, 129) transparent;
    font-size:18px;
    text-decoration: none;
    color: white;
    font-size: 18px;
display: block;
 
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 400px;
}
nav ul li a:hover{
    color: blanchedalmond;

}
nav ul ul{

    position: absolute;
    top: 60px;
    display: none;
}
nav ul li:hover>ul{
    display: block ;
}  
nav ul ul li{
position: relative;
display:list-item;
float: none;
width: 200px;
background-color: rgb(4, 30, 92);

margin-left: 10px;

}
 nav ul ul  ul li{
position: relative;
top: -0px;

 }
label #s1,label #s2{
    font-size: 30px;
    color: black;
    float: right;
    line-height: 60px;
    margin-right: 30px;
    cursor:pointer;
    display: none;
}

#res-menu{
    display: none;

}

/
@media(max-width:800px) {
    
    /* nav{
          border-bottom:2px white;
    } */
    nav h1{
        font-size:20px;

    letter-spacing: 2px;

    }
    nav h3{
        font-size: 10px;
        letter-spacing: 0;

    }
} 





    </style>
</head>
<body>
<!--Navigation-->
    <nav>
        <input type="checkbox" id="res-menu">
        
        <h1>Himalee Dairy Produts</h1>
        <h3>Everyone Needs Milk. Dairy always Good Choice</h3>
        <ul>
          <li><a href=""><i class="fas fa-home"></i></a> </li>
            <li><a href=""><i class="fas fa-bell"></i></a> </li>
            <li><a href=""><i class="fas fa-user-circle"></i></a> </li>
           
        </ul>
        
     </nav>
</body>
</html>
