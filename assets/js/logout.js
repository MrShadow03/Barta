const logout_button = document.querySelector("#logout_button");

logout_button.onclick = () => {
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./assets/php/logout.php", true);
	xhr.onload = () => {
		alert("hi");
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
			}
		}
	};
};
