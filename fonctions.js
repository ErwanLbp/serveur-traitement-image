function afficherCacherRedimCustom(id1){
	var redim = document.getElementById('redim');
	var masqueCustom = document.getElementById('masqueCustom');

	if(id1 == 'redim'){
		if(redim.style.display == "none")
			redim.style.display = "block";
		else
			redim.style.display = "none";
		masqueCustom.style.display = "none";
	}
	if(id1 == 'masqueCustom'){
		if(masqueCustom.style.display == "none")
			masqueCustom.style.display = "block";
		else
			masqueCustom.style.display = "none";
		redim.style.display = "none";
	}
}

function afficherCacher(id){
	if(document.getElementById(id).style.display == "none")
		document.getElementById(id).style.display = "block";
	else
		document.getElementById(id).style.display = "none";
}