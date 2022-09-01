// Shop.html main slides show START
let slide_start = 0;

slideShow();

function slideShow() {
    let i;
    let slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++){
        slides[i].style.display = "none";
    }

    for (i = 0; i <slides.length; i++) {
      slides[i].style.display = "none";
    }

    slide_start++;

    if (slide_start > slides.length) {
      slide_start = 1
    }

    slides[slide_start-1].style.display = "block";
    setTimeout(slideShow, 2500);
}
// Shop.html main slides show END

// Shop.html header course slides show START
let course_slide_start = 0;

courseSlideShow();

function courseSlideShow() {
    let i;
    let slides = document.getElementsByClassName("courseSlide");
    for (i = 0; i < slides.length; i++){
        slides[i].style.display = "none";
    }

    for (i = 0; i <slides.length; i++) {
      slides[i].style.display = "none";
    }

    course_slide_start++;

    if (course_slide_start > slides.length) {
		course_slide_start = 1
    }

    slides[course_slide_start-1].style.display = "block";
    setTimeout(courseSlideShow, 2500);
}
// Shop.html header course slides show END

// Shop.html header merchandise slides show START
let merchandise_slide_start = 0;

merchandiseSlideShow();

function merchandiseSlideShow() {
    let i;
    let slides = document.getElementsByClassName("merchandiseSlide");
    for (i = 0; i < slides.length; i++){
        slides[i].style.display = "none";
    }

    for (i = 0; i <slides.length; i++) {
      slides[i].style.display = "none";
    }

    merchandise_slide_start++;

    if (merchandise_slide_start > slides.length) {
		merchandise_slide_start = 1
    }

    slides[merchandise_slide_start-1].style.display = "block";
    setTimeout(merchandiseSlideShow, 2500);
}
// Shop.html header merchandise show END

// shop.php Course Button start
function showCourse() {
	shopHeaderCourseSlideId.style.display = "";
	shopMainCourseTitleGridId.style.display = "";
	shopMainCourseListGridId.style.display = "";
	shopHeaderMerchandiseSlideId.style.display = "none";
	shopMainMerchandiseTitleGridId.style.display = "none";
	shopMainMerchandiseListGridId.style.display = "none";
	slidesId.style.display = "none";
	shopHeaderUlCourse.style.color = "#1a1aff";
	shopHeaderUlMerchandise.style.color ="#333333";
	shopHeaderUlCourse.style.fontWeight = "bold";
	shopHeaderUlMerchandise.style.fontWeight ="normal";
}
// shop.php Course Button end

// shop.php merchandise Button start
function showMerchandise() {
	shopHeaderCourseSlideId.style.display = "none";
	shopMainCourseTitleGridId.style.display = "none";
	shopMainCourseListGridId.style.display = "none";
	shopHeaderMerchandiseSlideId.style.display = "";
	shopMainMerchandiseTitleGridId.style.display = "";
	shopMainMerchandiseListGridId.style.display = "";
	slidesId.style.display = "none";
	shopHeaderUlCourse.style.color = "#333333";
	shopHeaderUlMerchandise.style.color ="#1a1aff";
	shopHeaderUlCourse.style.fontWeight = "normal";
	shopHeaderUlMerchandise.style.fontWeight ="bold";
}
// shop.php merchandise Button end

// register.html registerImage START
function setImage(input) {
    if (input.files && input.files[0]) {
      let reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('registerImage').src = e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      document.getElementById('registerImage').src = "";
    }
  }
// register.html registerImage END

// register.html compare password start
function checkPassword(){
	let password = document.getElementById('registerPassword').value; //refer value of id under name pass1
	let special_letter = ["!","@","#","$","%"]; //set special letter in Password
	let check_special_letter = 0; // insert when special letter found number will 1, not found number will 0
	if(password.length < 6 || password.length>12){ //if statement for password length
	window.alert('Password must be between 6 to 12');
	document.getElementById('registerPassword').value='';
	}
	for(let i=0;i<special_letter.length;i++){ // compare all of special letter with pass1 value
		if(password.indexOf(special_letter[i]) != -1){
			check_special_letter = 1;
		}
	}
	if(check_special_letter == 0){ // not found so number is 0
		window.alert('Password Must include !,@,#,$,% one of this')
		document.getElementById('registerPassword').value='';
	}
	if(document.getElementById('registerPassword').value !='' && document.getElementById('registerConfirmPassword').value!=''){
		if(document.getElementById('registerPassword').value==document.getElementById('registerConfirmPassword').value){
			document.getElementById('registerPasswordCheck').innerHTML='Password and Confirm Password are Same!'
			document.getElementById('registerPasswordCheck').style.color='blue';
		}
		else{
			document.getElementById('registerPasswordCheck').innerHTML='Password and Confirm Password are Different! Please insert Again!';
			document.getElementById('registerPasswordCheck').style.color='red';
			document.getElementById('registerPassword').value='';
			document.getElementById('registerConfirmPassword').value='';
		}
	}
}
// register.html compare password end

// register.html check overlap for username start
function checkUsername() {
	let check_username = document.getElementById("registerUsername").value;
	if (check_username){
		let url = "/intern_portfolio/checkOverlap/checkUsername.php?registerUsername="+check_username;
		let name = "CheckUsername";
		let css = "width=300, height=100, top=0, left=0, 'center', 'middle', location=no, menubar=no";

		
		window.open(url,name, css);
	}else{
		alert("Please Enter Your Username");
	}
}
// register.html check overlap for username end

// register.html check overlap for email start
function checkEmail() {
	let check_email = document.getElementById("registerEmail").value;
	if (check_email){
		let url = "/intern_portfolio/checkOverlap/checkEmail.php?registerEmail="+check_email;
		let name = "CheckEmail";
		let css = "width=500, height=100, top=0, left=0, 'center', 'middle', location=no, menubar=no";

		
		window.open(url,name, css);
	}else{
		alert("Please Enter Your Email");
	}
}
// register.html check overlap for email end

// individualMerchandise.php add&less quantity start
function add()  {
	const calculate_quantity = document.getElementById('calculate_quantity');
	let quantity = calculate_quantity.value;
	let check_limited_quantity = document.getElementById('check_limited_quantity').innerText;
	let each_price = document.getElementById('each_price').innerText;
	
	if (quantity == check_limited_quantity){
		alert("Limited Quantities are " + check_limited_quantity + " for this PRODUCT(S), now.");
	}else {
		quantity = parseInt(quantity) + 1;
	}
	
	calculate_quantity.value = quantity;

	let sum_product_price = quantity * each_price;
	sum_product_price = sum_product_price.toFixed(2);

	document.getElementById('total_price').innerText = sum_product_price;
}


function less()  {
	const calculate_quantity = document.getElementById('calculate_quantity');
	let quantity = calculate_quantity.value;
	let each_price = document.getElementById('each_price').innerText;
	
	if (quantity > 1) {
		quantity = parseInt(quantity) - 1;
	}else {
		alert("It cannot be less than 1");
	}

	calculate_quantity.value = quantity;
	
	let sum_product_price = quantity * each_price;
	sum_product_price = sum_product_price.toFixed(2);

	document.getElementById('total_price').innerText = sum_product_price;
}
// individualMerchandise.php add&less quantity end

// cart.php check out start
function checkOut() {
	cartMainContainerId.style.display = "none";
	cartMainContainerCheckoutId.style.display = "";
}
// cart.php check out end