let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});

function validateForm() {
  // Validation pour le matricule
  var matricule = document.getElementById("matricule").value;
  var matriculePattern = /^[0-9]+$/;
  if (!matriculePattern.test(matricule)) {
    alert("Matricule invalide. Veuillez entrer uniquement des chiffres.");
    return false;
  }

  // Validation pour le nom et le prénom
  var nom = document.getElementById("nom").value;
  var prenom = document.getElementById("prenom").value;
  var alphabetPattern = /^[a-zA-Z]+$/;
  if (!alphabetPattern.test(nom) || !alphabetPattern.test(prenom)) {
    alert("Nom et prénom invalides. Veuillez entrer uniquement des lettres de l'alphabet.");
    return false;
  }
}