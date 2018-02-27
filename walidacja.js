function validate(form) {
	if(form.login.value.length <= 0 || form.email.value.length <= 0 || form.haslo.value.length <= 0){
		alert('Email, login i hasło nie mogą być puste!');
		return false;
	}
	if(form.haslo.value.length < 3 || form.haslo.value.length > 10){
		alert('Długość hasła musi być z zakresu (3 - 10)!');
		return false;
	}
	if(form.haslo.value != form.haslo2.value){
		alert('Podane hasła nie zgadzają się!');
		return false;
	}
	

	return true;
}