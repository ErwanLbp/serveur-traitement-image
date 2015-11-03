function afficher(divAafficher){
		divRedim = document.getElementById("redim");
divCustom = document.getElementById('masqueCustom');

	if(divAafficher == "redimensionnement"){
			divRedim.style.display = "block";
			divCustom.style.display = "none";
	}
	if(divAafficher == "masqueCustom"){
		div = document.getElementById('masqueCustom');
		if(div.style.display == "none")
			div.style.display = "block";
		else
			div.style.display = "none";
	}
}