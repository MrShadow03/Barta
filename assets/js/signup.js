let signup_form = document.querySelector("#signup_form");
let signup_btn = document.querySelector("#signup_btn");
let error_div = document.querySelector("#error_text");
let error_msg = document.querySelector("#error_msg");

signup_form.onsubmit = (e) => {
	e.preventDefault();
};

signup_btn.onclick = (e) => {
	//start AJAX
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./assets/php/SignupControl.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (data == "success") {
					error_msg.textContent = data;
					location.href = "chat.php";
				} else {
					error_div.style.display = "block";
					error_msg.textContent = data;
				}
			}
		}
	};

	//new formdata object

	let formData = new FormData(signup_form);
	xhr.send(formData);
};
