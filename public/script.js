$(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1
});



var icon1 = document.querySelector ("#icon1");
var icon2 = document.querySelector ("#icon2");
var srch = document.querySelector (".search1");
var sub = document.querySelector (".submenu2");
var open = false;
srch.onclick = function(){
	if(open ==false){

	icon1.style.display = "none";
	icon2.style.display = "block";
	sub.style.display = "block";
	open =true;
	}else {
	icon1.style.display = "block";
	icon2.style.display = "none";
	sub.style.display = "none";
	open =false;
	}
}
