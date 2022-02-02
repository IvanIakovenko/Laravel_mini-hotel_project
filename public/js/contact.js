var letters = /^[А-Яа-яЁё]+$/;

	function checkForm(e) {
		var name = document.getElementById("name").value;
		var email = document.getElementById("email").value;
		var phone = document.getElementById("phone").value;
		var message = document.getElementById("message").value;
		
		/*имя*/
		if(name.length >= 3 && name.length <= 11 ) {
			let res = letters.test(name);
			if(res === true) return true;
			else return alert('bad');
		} else {
			return alert('bad2');
		}
		
		/*почта*/
		if("@ @ OR '' * ! /".includes(email)) {
			return false;
		} else if(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
			return alert('email correct');
		}

		//var phCh = /^\+{1}[^@!\/OR,%*]+/;

		/*телефон*/
		if("/^\+{1}[^@!\/OR,%*]+/".includes(phone)) {
			return alert("so bad");
		}

		var map = {
		    '&': '&amp;',
		    '<': '&lt;',
		    '>': '&gt;',
		    '"': '&quot;',
		    "'": '&#039;'
		  };

		if(message != '') {
			return message.replace(/[&<>"']/g, function(m) { return map[m]; });
		} 
		
	}