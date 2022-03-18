<!DOCTYPE html>
<html>
<head>
    <title>skip ad</title>
    
	<style>



/* 1 */
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: sans-serif;
}
/* header{
    height: 60px;
    width: 100%;
    position: absolute;
    top: 0;
	z-index: 2;
} */


.home .slider{
	position: relative;
	width: 100%;
    height: 100vh;
	background: #2c3e50; /* darckblue */
}
.home .myslide{
    width: 100%;
	height: 800px;
	display: none;
	overflow: hidden;
}
 .next{
	position: absolute;
	top: 50%;
	transform: translate(0, -50%);
	font-size: 50px;
	padding: 15px;
	cursor: pointer;
	color: #fff;
	transition: 0.1s;
	user-select: none;
}
.home .prev:hover, .next:hover{
	color: #00a7ff; /* blue */
}
.home .next{
	right: 0;
}
.home .dotsbox{
	position: absolute;
	left: 50%;
	transform: translate(-50%);
	bottom: 20px;
	cursor: pointer;
}
.home .dot{
	display: inline-block;
	width: 15px;
	height: 15px;
	border: 3px solid #fff;
	border-radius: 50%;
	margin: 0 10px;
	cursor: pointer;
}
/* /2 */

/* javascript */
.active, .dot:hover{
	border-color: #00a7ff; /* blue */
}
/* /javascript */

/* muslide add fade */
.home .fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: 0.8}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: 0.8}
  to {opacity: 1}
}
/* /muslide add fade */

/* 3 */
.txt{
	position: absolute;
	color: #fff;
	letter-spacing: 2px;
	line-height: 35px;
	top: 40%;
	left: 15%;
	-webkit-animation-name: posi;
  	-webkit-animation-duration: 2s;
  	animation-name: posi;
  	animation-duration: 2s;
	z-index: 1;
}

@-webkit-keyframes posi {
  from {left: 25%;}
  to {left: 15%;}
}


@keyframes posi {
  from {left: 25%;}
  to {left: 15%;}
}

.txt h1{
	color: #184A78; /* blue */
	font-size: 60px;
	margin-bottom: 20px;
}
.txt p{
	font-weight: bold;
	font-size: 40px;
    color:#2c3e50;
    font-style: italic;
}
/* /3 */

/* 4 */
.home img{
	transform: scale(1.5, 1.5);
	-webkit-animation-name: zoomin;
  	-webkit-animation-duration: 40s;
  	animation-name: zoomin;
  	animation-duration: 40s;
}
@-webkit-keyframes zoomin {
  from {transform: scale(1, 1);}
  to {transform: scale(1.5, 1.5);}
}


@keyframes zoomin {
  from {transform: scale(1, 1);}
  to {transform: scale(1.5, 1.5);}
}
/* /4 */



/* 5 */
@media screen and (max-width: 800px){
	.myslide{
		height: 500px;
	}
	.txt{
		letter-spacing: 2px;
		line-height: 25px;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		-webkit-animation-name: posi2;
		-webkit-animation-duration: 2s;
		animation-name: posi2;
		animation-duration: 2s;
	}

	@-webkit-keyframes posi2 {
	  from {top: 35%;}
	  to {top: 50%;}
	}


	@keyframes posi2 {
	  from {top: 35%;}
	  to {top: 50%;}
	}

	.txt h1{
		font-size: 40px;
	}
	.txt p{
		font-size: 13px;
	}

}
/* /5 */

/* 6 */
@media screen and (max-width: 520px){
	.txt h1{
		font-size: 30px;
		margin-bottom: 20px;
	}
	.sign{
		margin-right: 20px;
	}
	.sign a{
		font-size: 12px;
	}
}
/* /6 */

















	</style>
</head>
<body style="height: 2000px;">
	
	
    <div class="slider">
		<!-- fade css -->
		<div class="myslide fade">
			<div class="txt">
				<h1>Himalee Dairy Products</h1>
				<p>Everyone needs milk...Dairy always a Good Choice</p>
                
			</div>

			<img src="../../public/images/homes.jpg" style="width: 100%; height: 100%;">
		</div>
		
		<div class="myslide fade">
			<div class="txt">
            <h1>Himalee Dairy Products</h1>
				<p>Himalee is your one stop shop for all your dairy products.</p>
               
			</div>
			<img src="../../public/images/h_freshmilk.jpg" style="width: 100%; height: 100%;">
		</div>
		
		<div class="myslide fade">
			<div class="txt">
            <h1>Himalee Dairy Products</h1>
				<p>We distribute clean, affordable and nutritious dairy products island wide.</p>
                
			</div>
			<img src="../../public/images/cheese.jpg" style="width: 100%; height: 100%;">
		</div>
		
		<div class="myslide fade">
			<div class="txt">
            <h1>Himalee Dairy Products</h1>
				<p>Everyone needs milk...Dairy always a Good Choice</p>
               
			</div>
			<img src="../../public/images/h_icecream.jpg" style="width: 100%; height: 100%;">
		</div>
		
		<div class="myslide fade">
			<div class="txt">
            <h1>Himalee Dairy Products</h1>
				<p>Everyone needs milk...Dairy always a Good Choice</p>
               
			</div>
			<img src="../../public/images/milk_beve.jpg style="width: 100%; height: 100%;">
		</div>
		<div class="myslide fade">
			<div class="txt">
            <h1>Himalee Dairy Products</h1>
				<p>Everyone needs milk...Dairy always a Good Choice</p>
                
			</div>
			<img src="../../public/images/h_icecream.jpg" style="width: 100%; height: 100%;">
		</div>
		<div class="myslide fade">
			<div class="txt">
            <h1>Himalee Dairy Products</h1>
				<p>Everyone needs milk...Dairy always a Good Choice</p>
               
			</div>
			<img src="../../public/images/cheese.jpg" style="width: 100%; height: 100%;">
		</div>
		<div class="myslide fade">
			<div class="txt">
            <h1>Himalee Dairy Products</h1>
				<p>Everyone needs milk...Dairy always a Good Choice</p>
                
			</div>
			<img src="../../public/images/cheese.jpg" style="width: 100%; height: 100%;">
		</div>
		<!-- /fade css -->
		
		<!-- onclick js -->
		<!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  		<a class="next" onclick="plusSlides(1)">&#10095;</a> -->
		
		<div class="dotsbox" style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
			<span class="dot" onclick="currentSlide(3)"></span>
			<span class="dot" onclick="currentSlide(4)"></span>
			<span class="dot" onclick="currentSlide(5)"></span>
			<span class="dot" onclick="currentSlide(6)"></span>
		</div>
		<!-- /onclick js -->
	</div>
	
<script>
	const myslide = document.querySelectorAll('.myslide'),
	  dot = document.querySelectorAll('.dot');
let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 8000);
function autoSlide() {
	counter += 1;
	slidefun(counter);
}
function plusSlides(n) {
	counter += n;
	slidefun(counter);
	resetTimer();
}
function currentSlide(n) {
	counter = n;
	slidefun(counter);
	resetTimer();
}
function resetTimer() {
	clearInterval(timer);
	timer = setInterval(autoSlide, 8000);
}

function slidefun(n) {
	
	let i;
	for(i = 0;i<myslide.length;i++){
		myslide[i].style.display = "none";
	}
	for(i = 0;i<dot.length;i++) {
		dot[i].className = dot[i].className.replace(' active', '');
	}
	if(n > myslide.length){
	   counter = 1;
	   }
	if(n < 1){
	   counter = myslide.length;
	   }
	myslide[counter - 1].style.display = "block";
	dot[counter - 1].className += " active";
}
</script>
</body>
</html>


