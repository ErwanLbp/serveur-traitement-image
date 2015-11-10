function afficherCacher(id1,id2){
	if(id1 = 'redim'){
		if(document.getElementById(id1).style.display == "none"){
			document.getElementById(id1).style.display = "block";
			document.getElementById('transfoDroite').style.display= "none";
			document.getElementById(id2).style.display = "none";
		}
		else{
			document.getElementById(id1).style.display = "none";
			document.getElementById('transfoDroite').style.display= "block";
			document.getElementById(id2).style.display = "block";
		}
	}
	if(id1='masqueCustom'){
		if(document.getElementById(id1).style.display == "none"){
			document.getElementById(id1).style.display = "block";
			document.getElementById('transfoDroite').style.display= "none";
			document.getElementById(id2).style.display = "none";
		}
		else{
			document.getElementById(id1).style.display = "none";
			document.getElementById('transfoDroite').style.display= "block";
			document.getElementById(id2).style.display = "block";
		}
	}
}