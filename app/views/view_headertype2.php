<!DOCTYPE html>
<html>
<head>
	<!-- <title>Header</title> -->
	<script src="https://kit.fontawesome.com/1681f9ce3f.js" crossorigin="anonymous"></script>
    

    <style>
*{
    margin: 0;
    padding: 0;
    z-index: 3000;
}

body{
    font-family: Arial, Helvetica, sans-serif;
}
/* 


/*navigation*/
nav{
width: 100%;
height: 80px;
background-color: #184A78;
position: fixed;
text-transform: uppercase;

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
    margin-right: 100px;
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
 text-transform: uppercase;
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 400px;
}
nav ul li a:hover{
    color: #D78B2E;

}
nav ul ul{

    position: absolute;
    top: 60px;
    display: none;
}

 nav ul ul  ul li{
position: relative;
top: -0px;

 }



.dropdown {
    position: relative;
    display: inline-block;
   
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
  background: #184A78;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1000;
    
  }
  
  .dropdown-content a {
    color: rgb(255, 255, 255);
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content a:hover {color: #D78B2E;}
  
  .dropdown:hover .dropdown-content {
    display: block;
  }
  

@media(max-width:700px) {
    
    nav{
          border-bottom:2px white;
    }

   
    nav h1{
    
  
    font-size: 24px;
   margin-left: 16px;
    letter-spacing: 1px;


}
nav h3{

   
    margin-top: 35px;
    color: white;
    font-size: 10px;
    margin-left: 16px;
    letter-spacing: 0px;
    
}

i{
    width: 1px;
    margin-top: 50px;
}
.dropdown-content {
    
    position: absolute;
  background: #184A78;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: rgb(255, 255, 255);
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: small;
  }
  
}

  
  
    </style>
</head>
<body>
<!--Navigation-->
    <nav>
      
        <!-- <h1>Himalee Dairy Produts</h1>
        <h3>Everyone Needs Milk. Dairy always a Good Choice</h3> -->
        <ul>
         
            <li><a href=""><i class="fas fa-arrow-left"></i></a></li>
            
            <li><a href=""><i class="fas fa-home" id="s3"></i></a></li>
            
             
            
                    <li><a href="#"><i class="fas fa-bell fa-large" id="s4"></i></li></a>
        </ul>
        
     </nav>
</body>
</html>