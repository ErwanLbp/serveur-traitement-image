function afficherCacherSaveNew(id1){
	var nvlTransfo = document.getElementById('nvlTransfo');
	var sauvegarde = document.getElementById('sauvegarde');
	var redim = document.getElementById('redim');

	if(id1 == 'nvlTransfo'){
		if(nvlTransfo.style.display == "none")
			nvlTransfo.style.display = "block";
		else
			nvlTransfo.style.display = "none";
		sauvegarde.style.display = "none";
		redim.style.display = "none";		
	}
	if(id1 == 'sauvegarde'){
		if(sauvegarde.style.display == "none")
			sauvegarde.style.display = "block";
		else
			sauvegarde.style.display = "none";
		nvlTransfo.style.display = "none";
		redim.style.display = "none";		
	}
	if(id1 == 'redim'){
		if(redim.style.display == "none")
			redim.style.display = "block";
		else
			redim.style.display = "none";
		nvlTransfo.style.display = "none";
		sauvegarde.style.display = "none";
	}
}

function afficherCacher(id){
	if(document.getElementById(id).style.display == "none")
		document.getElementById(id).style.display = "block";
	else
		document.getElementById(id).style.display = "none";
}