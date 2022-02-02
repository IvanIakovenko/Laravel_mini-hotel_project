	document.addEventListener("DOMContentLoaded", getPhotos);

	

	var c = 0;
	function carousel() {
		/*el = document.getElementsByClassName("img_roll");
		arr = ['url(images/jonathan-borba-nyqJ_LJVc4U-unsplash.jpg)'];
		console.log(el);
		for(i=0;i<el.length;i++) {
			el[i].style.background = 'url(images/jonathan-borba-nyqJ_LJVc4U-unsplash.jpg)'+'center no-repeat';
		}*/
		arr = ['img_roll', 'img_roll2', 'img_roll3', 'img_roll4'];
		div = document.getElementById("img_roll");
		img = document.getElementById("1");
		//div.className = "img_roll2";
		/*for (var i = 0; i < arr.length; ) {
				div.className = arr[i];
				i= i+1;
				console.log(arr[i]);
		}*/
		//div.className = arr.shift();
		/*let i = 0;
		while (i<4) {
			div.className = arr[i];
			console.log(i);
			i++;
		}*/
		/*switch(c){
			case 0: div.className = 'img_roll2';
			c = 1;
			break;
			case 1: div.className = 'img_roll3';
			c = 2;
			break;
			case 2: div.className = 'img_roll4';
			c = 3;
			break;
			case 3: div.className = 'img_roll';
			c = 0;
			console.log(c);
			break;
		}
		console.log(c);*/
		

		/*switch(c){
			case 0: img.src = 'images/carousel/jonathan-borba-nyqJ_LJVc4U-unsplash.jpg';
			c = 1;
			break;
			case 1: img.src = 'images/carousel/markus-spiske-g5ZIXjzRGds-unsplash.jpg';
			c = 2;
			break;
			case 2: img.src = 'images/carousel/andrea-davis-7Z0Nn04geSY-unsplash.jpg';
			c = 3;
			break;
			case 3: img.src = 'images/carousel/photo-1584091780978-1beeb2bec1b8.jpg';
			c = 0;
			console.log(c);
			break;
		}*/

		switch(c){
			case 0: img.src = arrPhotos[0];
			c = 1;
			break;
			case 1: img.src = arrPhotos[1];
			c = 2;
			break;
			case 2: img.src = arrPhotos[2];
			c = 3;
			break;
			case 3: img.src = arrPhotos[3];
			c = 0;
			console.log(c);
			break;
		}

	


	}
	setInterval(carousel, 5000);

	var arrPhotos = [];
	function renderPhotos(photoId, photoPath) {
		arrPhotos.push(photoPath);
		console.log(arrPhotos);

	}

	function getPhotos() {
		let request = new XMLHttpRequest();

		request.onreadystatechange = function() {
                  if(request.readyState == 4 && request.status == 200) {
                    let allPhotos = request.response;
                    
                    for(onePhoto of allPhotos) {
                        renderPhotos(onePhoto.id, onePhoto.images_path);
                    }
                  }
                }

                /*request.open('POST', '{{ url("/ajax") }}', true);*/
                request.open('GET', '/ajax', true);
                request.responseType = 'json';

                /*request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');*/

                request.send();
    }

    function keepPos() {

    let location = document.getElementById('mainCheck').offsetTop;
    
    window.scrollTo(0, location);  
    console.log(location);
   


    }
  

    
    function checkVal() {
    	$select = document.getElementById('selectDates');
    	if($select.value === " ") return false;
    }
	