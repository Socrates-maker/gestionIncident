const enregistrer = document.getElementById('enregistrer');
const incidentForm = document.getElementById('incident-form')
const annuler = document.getElementById('annuler');
const ouiChecked = document.getElementById('oui');
const nonChecked = document.getElementById("non");
const solution = document.getElementById("solution");


enregistrer.addEventListener("click",function(){
	incidentForm.style.display = "block";
})

annuler.addEventListener("click",function(e){
	e.preventDefault();
	incidentForm.style.display = "none";
})

ouiChecked.addEventListener("click",function(){
	solution.style.display = "block";
})

nonChecked.addEventListener("click",function(){
	solution.style.display = "none";
})