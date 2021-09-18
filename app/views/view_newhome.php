<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive coffee shop website design</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="../../public/styles/view_newhome.css">

</head>
<body>
    
<!-- header section starts  -->
<div class="header">
<header class="header">

    <a href="#" class="logo">
        <img src="logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        
        <a href="#contact">contact</a>
      
    </nav>

    
    
    
        
</header>
</div>


<section class="home" id="home">

    <div class="content">
        <h3>Himalee Dairy Products</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat labore, sint cupiditate distinctio tempora reiciendis.</p>
        <a href="login" class="btn">Get started</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="../../public/images/milk.jpg" alt="">
        </div>

        <div class="content">
            <h3>Why Our Dairy Prodcuts Special?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus qui ea ullam, enim tempora ipsum fuga alias quae ratione a officiis id temporibus autem? Quod nemo facilis cupiditate. Ex, vel?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit amet enim quod veritatis, nihil voluptas culpa! Neque consectetur obcaecati sapiente?</p>
           
        </div>

    </div>

</section>




<section class="contact" id="contact">

    <h1 class="heading"> <span>contact</span> us </h1>

    <div class="row">

       

        <form action="">
            <h3>get in touch</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="name">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <span class="fas fa-phone"></span>
                <input type="number" placeholder="number">
            </div>
            <input type="submit" value="contact now" class="btn">
        </form>

    </div>

</section>
<?php
include 'view_footer.php';
?>





</body>
</html>