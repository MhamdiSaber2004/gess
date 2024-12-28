$(document).ready(function() {
  $('#listeBenefique').DataTable();
} );


function checkInputsBenefiqueAEP(){
  var nom = document.getElementById("nom").value;
  var dateN = document.getElementById("dateN").value;
  var CIN = document.getElementById("CIN").value;
  var dateCIN = document.getElementById("dateCIN").value;
  var address = document.getElementById("address").value;
  var tel = document.getElementById("tel").value;
  var numPlace = document.getElementById("numPlace").value;
  var aire = document.getElementById("aire").value;
  var numDiviseur = document.getElementById("numDiviseur").value;
  var numCompteur = document.getElementById("numCompteur").value;
  var donneesCompteur = document.getElementById("donneesCompteur").value;
  var email = document.getElementById("email").value;
  var mdp1 = document.getElementById("mdp1").value;
  var mdp2 = document.getElementById("mdp2").value;
  var dette = document.getElementById("dette").value;

  var erreur = document.getElementById("erreur");

  if(nom=="" || dateN=="" || CIN=="" || dateCIN=="" || address=="" || tel=="" || numPlace=="" || aire=="" || numDiviseur=="" || numCompteur=="" || donneesCompteur=="" || email=="" || mdp1=="" || mdp2=="" || dette=="" )
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }

  if(nom.length < 5 )
  {
    erreur.innerHTML="الإسم واللقب يجب أن يكون أكثر من 5 أحرف"
    return false;

  }

  if(mdp1!=mdp2)
  {
    erreur.innerHTML="كلمات السر غير مطابقة"
    return false;

  }

  if(CIN < 1000000 || CIN > 19999999  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if((tel < 20000000 || tel > 29999999) && (tel < 40000000 || tel > 59999999) && (tel < 70000000 || tel > 79999999 ) && (tel < 90000000 || tel > 99999999)   )
  {
    erreur.innerHTML="رقم الهاتف خاطئ"
    return false;

  }

  if(dette < 0)
  {
    erreur.innerHTML="الرجاء الثثبت من الديون المتخلدة بذمة المنتفع"
    return false;

  }

  if(Number(dateN.substring(0,4)) < 1940 && Number(dateN.substring(0,4)) > 2000)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ الولادة";
    return false;

  }

  if(mdp1.length < 8)
  {
    erreur.innerHTML="كلمة السر يجب أن تكون أكثر من 8 أحرف وأرقام"
    return false;

  }

  if(Number(dateCIN.substring(0,4)) < 1960 && Number(dateCIN.substring(0,4)) > 2010)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ بطاقات التعريف";
    return false;

  }
  

  return true;
  
  }


/*
function checkInputsParametre(){
  var prixM3 = document.getElementById("prixM3").value;
  var prixFixe = document.getElementById("prixFixe").value;
  var autrePrix = document.getElementById("autrePrix").value;


  var erreur = document.getElementById("erreur");


  if(prixM3 < 1 || String(prixM3)==""  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if(prixFixe < 1  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if(autrePrix < 1  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  

return false;

}*/


function checkInputsPompiste(){
  var nom = document.getElementById("nom").value;
  var dateN = document.getElementById("dateN").value;
  var CIN = document.getElementById("CIN").value;
  var dateCIN = document.getElementById("dateCIN").value;
  var travail = document.getElementById("travail").value;
  var address = document.getElementById("address").value;
  var tel = document.getElementById("tel").value;
  var email = document.getElementById("email").value;
  var mdp1 = document.getElementById("mdp1").value;
  var mdp2 = document.getElementById("mdp2").value;
  var file1 = document.getElementById("file1").value;

  var erreur = document.getElementById("erreur");

  if(nom=="" || dateN=="" || CIN=="" || dateCIN=="" || travail=="" || address=="" || tel=="" || email=="" || mdp1=="" || mdp2=="")
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }

  if(nom.length < 5 )
  {
    erreur.innerHTML="الإسم واللقب يجب أن يكون أكثر من 5 أحرف"
    return false;

  }

  if(file1 == "" )
  {
    erreur.innerHTML="عقد العمل ضروري"
    return false;

  }

  if(mdp1!=mdp2)
  {
    erreur.innerHTML="كلمات السر غير مطابقة"
    return false;

  }

  if(CIN < 1000000 || CIN > 19999999  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if((tel < 20000000 || tel > 29999999) && (tel < 40000000 || tel > 59999999) && (tel < 70000000 || tel > 79999999 ) && (tel < 90000000 || tel > 99999999)   )
  {
    erreur.innerHTML="رقم الهاتف خاطئ"
    return false;

  }

  if(mdp1.length < 8)
  {
    erreur.innerHTML="كلمة السر يجب أن تكون أكثر من 8 أحرف وأرقام"
    return false;

  }

  if(Number(dateN.substring(0,4)) < 1940 && Number(dateN.substring(0,4)) > 2000)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ الولادة";
    return false;

  }

  if(Number(dateCIN.substring(0,4)) < 1960 && Number(dateCIN.substring(0,4)) > 2010)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ بطاقات التعريف";
    return false;

  }
  

return true;

}




function checkInputsBenefique(){
  var nom = document.getElementById("nom").value;
  var dateN = document.getElementById("dateN").value;
  var CIN = document.getElementById("CIN").value;
  var dateCIN = document.getElementById("dateCIN").value;
  var address = document.getElementById("address").value;
  var tel = document.getElementById("tel").value;
  var numPlace = document.getElementById("numPlace").value;
  var aire = document.getElementById("aire").value;
  var numDiviseur = document.getElementById("numDiviseur").value;
  var numPrise = document.getElementById("numPrise").value;
  var flux = document.getElementById("flux").value;
  var numCompteur = document.getElementById("numCompteur").value;
  var numParticipant = document.getElementById("numParticipant").value;
  var email = document.getElementById("email").value;
  var mdp1 = document.getElementById("mdp1").value;
  var mdp2 = document.getElementById("mdp2").value;
  var prixNonPaye = document.getElementById("prixNonPaye").value;

  var erreur = document.getElementById("erreur");

  if(nom=="" || dateN=="" || CIN=="" || dateCIN=="" || address=="" || tel=="" || numPlace=="" || aire=="" || numDiviseur=="" || numPrise=="" || flux=="" || numCompteur=="" || numParticipant=="" || email=="" || mdp1=="" || mdp2=="" || prixNonPaye=="" )
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }

  if(nom.length < 5 )
  {
    erreur.innerHTML="الإسم واللقب يجب أن يكون أكثر من 5 أحرف"
    return false;

  }

  if(mdp1!=mdp2)
  {
    erreur.innerHTML="كلمات السر غير مطابقة"
    return false;

  }

  if(CIN < 1000000 || CIN > 19999999  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if((tel < 20000000 || tel > 29999999) && (tel < 40000000 || tel > 59999999) && (tel < 70000000 || tel > 79999999 ) && (tel < 90000000 || tel > 99999999)   )
  {
    erreur.innerHTML="رقم الهاتف خاطئ"
    return false;

  }

  if(prixNonPaye < 0)
  {
    erreur.innerHTML="الرجاء الثثبت من الديون المتخلدة بذمة المنتفع"
    return false;

  }

  if(Number(dateN.substring(0,4)) < 1940 && Number(dateN.substring(0,4)) > 2000)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ الولادة";
    return false;

  }

  if(mdp1.length < 8)
  {
    erreur.innerHTML="كلمة السر يجب أن تكون أكثر من 8 أحرف وأرقام"
    return false;

  }

  if(Number(dateCIN.substring(0,4)) < 1960 && Number(dateCIN.substring(0,4)) > 2010)
  {
    erreur.innerHTML="الرجاء التثبت من تاريخ بطاقات التعريف";
    return false;

  }
  

return true;

}




/*
function checkInputsParametre(){
  var prixM3 = document.getElementById("prixM3").value;
  var prixFixe = document.getElementById("prixFixe").value;
  var autrePrix = document.getElementById("autrePrix").value;


  var erreur = document.getElementById("erreur");


  if(prixM3 < 1 || String(prixM3)==""  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if(prixFixe < 1  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  if(autrePrix < 1  )
  {
    erreur.innerHTML="رقم بطاقات التعريف خاطئ"
    return false;

  }

  

return false;

}*/





function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}







