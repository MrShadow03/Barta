let user_list = document.querySelector("#chatContactTab");
setInterval(() => {
	let xhr = new XMLHttpRequest();
	xhr.open("GET", "./assets/php/Users.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				user_list.innerHTML = data;
			}
		}
	};

	xhr.send();
}, 500);
