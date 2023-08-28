function proveraNaziv() {
	var naziv = document.getElementById("naziv");
	var regExpNaziv = /^[A-Z][a-z]*\s[A-Z][a-z]*$/;
				
	if (regExpNaziv.test(naziv.value)) {
		naziv.style.borderColor = "green";
	}
	else {
		naziv.style.borderColor = "red";
	}
}

function proveraAdresa() {
	var adresa = document.getElementById("adresa");
	var regExpAdresa = /^[A-Z][a-z]*\s[A-Z]*[a-z]*\s*[1-9]{1}[0-9]{0,2}$/;
				
	if (regExpAdresa.test(adresa.value)) {
		adresa.style.borderColor = "green";
	}
	else {
		adresa.style.borderColor = "red";
	}
}

function proveraTelefon() {
	var telefon = document.getElementById("telefon");
	var regExpTelefon = /^06[0-6 8-9][0-9]{6,7}$/;
				
	if (regExpTelefon.test(telefon.value)) {
		telefon.style.borderColor = "green";
	}
	else {
		telefon.style.borderColor = "red";
	}
}

function proveraEmail() {
	var email = document.getElementById("email");
	var regExpEmail = /^[A-z 0-9]*\@[A-z 0-9]*\.[a-z]*$/;
				
	if (regExpEmail.test(email.value)) {
		email.style.borderColor = "green";
	}
	else {
		email.style.borderColor = "red";
	}
}

function proveraKreditna() {
	var kreditna = document.getElementById("kreditna");
	var regExpKreditna = /^[1-9][0-9]{15}$/;
				
	if (regExpKreditna.test(kreditna.value)) {
		kreditna.style.borderColor = "green";
	}
	else {
		kreditna.style.borderColor = "red";
	}
}

function proveraKod() {
	var kod = document.getElementById("kod");
	var regExpKod = /^[1-9][0-9]{2}$/;
				
	if (regExpKod.test(kod.value)) {
		kod.style.borderColor = "green";
	}
	else {
		kod.style.borderColor = "red";
	}
}

function proveraDatum() {
	var datum = document.getElementById("datum");
	var regExpDatum = /^(1[0-2]|[1-9])\/[2][2-7]$/;
				
	if (regExpDatum.test(datum.value)) {
		datum.style.borderColor = "green";
	}
	else {
		datum.style.borderColor = "red";
	}
}

function toggleVisibility() {
	var kartica = document.getElementById("kartica");
	var kreditna = document.getElementById("kreditna");
	
	if (kartica.checked) {
		kreditna.style.display = 'inline';
		kod.style.display = 'inline';
		datum.style.display = 'inline';
	}
	else {
		kreditna.style.display = 'none';
		kod.style.display = 'none';
		datum.style.display = 'none';
	}
}