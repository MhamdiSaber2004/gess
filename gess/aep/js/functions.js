/* switches
document.addEventListener('DOMContentLoaded', function() {
    // Get all switch elements
    const switchInputs = document.querySelectorAll('.switch-input');

    // Add event listener to each switch
    switchInputs.forEach(function(switchInput) {
        switchInput.addEventListener('change', function() {
            if (this.checked) {
                alert('lol');
            }
            if (!this.checked) {
                alert('loool');
            }
        });
    });
});*/




function chargerAccreditations() {
    var etatId = document.getElementById('etat').value;
    var selectAccreditation = document.getElementById('accreditation');

    // Efface toutes les options existantes dans la liste déroulante des accréditations
    selectAccreditation.innerHTML = '';

    if (etatId !== '') {
        // Effectuer une requête AJAX ou PDO pour obtenir les accréditations correspondant à l'ID de l'état sélectionné
        // en utilisant PHP pour interagir avec la base de données
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var accreditations = JSON.parse(xhr.responseText);

                // Créer les options pour les accréditations
                for (var i = 0; i < accreditations.length; i++) {
                    var option = document.createElement('option');
                    option.value = accreditations[i].nom_accreditation;
                    option.text = accreditations[i].nom_accreditation;
                    selectAccreditation.appendChild(option);
                    console.log("accreditations")
                }
            }
        };
        xhr.open('GET', 'controllers/get_accreditations.php?etat_id=' + etatId, true);
        xhr.send();
    }
}




function selected(selected) {
    const selectElement = document.getElementById(selected.id);
    
    // Get the selected option's text content
    const selectedOption = selectElement.options[selectElement.selectedIndex].value;
    
    // Show an alert with the selected option
}


function switchChanged(checkbox) {
    var loading = document.getElementById (Array.from(checkbox.id)[0]+"_file"+Array.from(checkbox.id)[checkbox.id.length-1]) ;
    if (checkbox.checked) {
loading.classList.remove('visually-hidden')
    } else {
loading.classList.add('visually-hidden')
    }
}


function loadFile (id, checked)
{
  var loading = document.getElementById ("3_file1" ) ;

  // when connecting to server
  if ( checked )
  //alert('on')
     // loading.style.visibility = "visible" ;

      if ( !checked )
      //alert('off')
      loading.classList.remove('visually-hidden')
      //loading.style.visibility = "visible" ;

}



function calculateSum() {
    // Get the input values
    var num1 = parseFloat(document.getElementById("num1").value);
    var num2 = parseFloat(document.getElementById("num2").value);

    // Calculate the sum
 var ratio = (((num2 - num1) / num2) * 100).toFixed(2);

    // Set the sum value in the result input field
    document.getElementById("result").value = ratio;
}


