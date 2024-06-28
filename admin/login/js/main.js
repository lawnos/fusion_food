const inputs = document.querySelectorAll(".input");


function addcl() {
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl() {
	let parent = this.parentNode.parentNode;
	if (this.value == "") {
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

document.querySelector('form').addEventListener('submit', function (e) {
	const emailInput = document.querySelector('input[type="text"]').value;
	const passwordInput = document.querySelector('input[type="password"]').value;
	const validationMessage = document.getElementById('validation-message');

	if (!emailInput || !passwordInput) {
		e.preventDefault();
		validationMessage.textContent = 'Please check your phone number or password again!';
	}
});
