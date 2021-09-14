<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <title>Footer</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,500;1,600&display=swap');
body{
    line-height: 1.5;
    font-family: 'Poppins',sans-serif ;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container-foot{
    max-width: 1170px;
    background-color: #184A78;
    margin: auto;
}
.row{
    display: flex;
    flex-wrap: wrap;

}

ul{
    list-style: none;
}
.footer{
background-color: #184A78;
padding: 70px 0;
z-index: 1000;

}
.footer-col{
    width: 25%;
    padding: 0 15px;

}
.footer-col  h4{
    font-size: 18px;
    color: #ffffff;
    text-transform: capitalize;
    margin-bottom:30px ;
    font-weight: 500;
    position: relative;
}
.footer-col h4::before{
    content:'' ;
    position: absolute;
    left: 0;
    bottom: -10px;
    background-color: #D78B2E;
    height: 2px;
    box-sizing: border-box;
    width: 50px;
}

.footer-col ul li:not(:last-child)
{
    margin-bottom: 10px;

}
.footer-col ul li a{
    font-size: 16px;
    text-transform: capitalize;
    text-decoration: none;
    color: white;
    font-weight: 300;
    color: #bbbbbb;
    display: block;
}

.footer-col ul li a:hover{
    color: white;
    padding-left: 10px;
}
.footer-col .social a{
    display: inline-block;
    height: 40px;
    width: 40px; 
    background-color: rgba(255,255,255,0.2);
    margin: 0 10px 10px 0;
text-align: center;
line-height: 40px;
border-radius: 50%;
}
.footer-col .social a:hover{
    color: #24262b;
    background-color: white;
}
.design{
    text-align: center;
    margin-top: 20px;
    margin-bottom: -10px;
}
/*respomsive*/
@media(max-width:767px)
{
    .footer-col {
        width: 50%;
        margin-bottom: 30px;

    }

}

@media(max-width:574px) {
    .footer-col{
        width: 100%;
    }
}
    </style>
</head>
<body>
  <div class="footer">

        <div class="container-foot">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="# ">Our Products</a></li>
                        <li><a href="# ">About Us</a></li>
                        <li><a href="# "></a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Covering Areas</h4>
                    <ul>
                        <li><a href="# ">Kurunagala</a></li>
                        <li><a href="# ">Anuradhapura</a></li>
                        <li><a href="# ">Maradankadawala</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Us </h4>
                    <ul>
                        <li><a href="# ">031-2208789</a></li>
                        <li><a href="# ">076-2208789</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social">
                    <a href="# "><i class="fab fa-facebook-f"></i></a>
                    <a href="# "><i class="fab fa-twitter"></i></a>
                    <a href="# "><i class="fab fa-instagram"></i></a>
                    <a href="# "><i class="fab fa-google-plus"></i></a>
                </div>
                </div>
            </div>
        </div>
        <div class="design">
            <p>Copyright &copy;2021 Design by WebExperts</p>
        </div>
    </div>
</body>
</html>
