window.onscroll = function() { scroll2() };
button = document.getElementById('upBtn');

function scroll2() {
	if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		button.style.display = "block";
	}
	else {
		button.style.display = "none";
	}
}

function upTop() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}

function showImg(e) {
	
	bigImg = document.getElementById('big_img1');
	let x = e.target.parentNode.parentNode.parentNode.parentNode.parentNode;

	let y = document.getElementById(x.childNodes[1].childNodes[1].childNodes[1].id);
	console.log(y);
	console.log(e.target.src);
	//bigImg.src = e.target.src;
	y.src = e.target.src;

}

function showImgEven(e) {
	
	bigImg = document.getElementById('big_img1');
	let x = e.target.parentNode.parentNode.parentNode.parentNode.parentNode;

	let y = document.getElementById(x.childNodes[3].childNodes[1].childNodes[1].id);
	//let y = x.childNodes[3].childNodes[1];
	console.log(y);
	console.log(e.target.src);
	//bigImg.src = e.target.src;
	y.src = e.target.src;

}