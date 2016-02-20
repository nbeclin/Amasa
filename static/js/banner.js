function slide(cpt){
	for (i=1 ; i<31;i++){
		if(eval(cpt)+i <= 30){
			document.getElementById('img' + i).src = 'img/bandeau/img' + (eval(cpt)+i) + '.jpg'; 
		}
		else {
			document.getElementById('img' + i).src = 'img/bandeau/img' + (eval(cpt)+i-30) + '.jpg'; 
		}
	}
	if(eval(cpt)<30){
		document.getElementById('cpt').value = eval(cpt) + 1;
	}
	else {
		document.getElementById('cpt').value = 1;
	}
}