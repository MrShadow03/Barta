let signin_form = document.querySelector("#signin_form");
let signin_btn = document.querySelector("#signin_btn");
let error_div = document.querySelector("#error_text");
let error_msg = document.querySelector("#error_msg");

signin_form.onsubmit = (e) => {
	e.preventDefault();
};

signin_btn.onclick = () => {
	let formdata = new FormData(signin_form);
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "./assets/php/SigninControl.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				//alert(data);
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

	xhr.send(formdata);
};
