$(document).ready(function() {
  $('#listeBenefique').DataTable();
  $('#listeBenefiquee').DataTable();
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


function checkInputsParametrePompiste(){
  var nom = document.getElementById("nom").value;
  var dateN = document.getElementById("dateN").value;
  var CIN = document.getElementById("CIN").value;
  var dateCIN = document.getElementById("dateCIN").value;
  var travail = document.getElementById("travail").value;
  var address = document.getElementById("address").value;
  var tel = document.getElementById("tel").value;
  var email = document.getElementById("email").value;
  var mdpN1 = document.getElementById("mdpN1").value;
  var mdpN2 = document.getElementById("mdpN2").value;
  var mdp = document.getElementById("mdp").value;

  var erreur = document.getElementById("erreur");

  if(nom=="" || dateN=="" || CIN=="" || dateCIN=="" || travail=="" || address=="" || tel=="" || email=="" || mdp=="")
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }

  if(nom.length < 5 )
  {
    erreur.innerHTML="الإسم واللقب يجب أن يكون أكثر من 5 أحرف"
    return false;

  }

  if(mdpN1!="")
  {
    if(mdpN1!=mdpN2)
    {
      erreur.innerHTML="كلمات السر الجديدة غير مطابقة"
      return false;
  
    }
    if(mdpN1.length < 8)
    {
      erreur.innerHTML="كلمات السر الجديدة يجب أن تكون أكثر من 8 أحرف وأرقام"
      return false;
  
    }


  }

  if( mdp.length < 8)
  {
    erreur.innerHTML="كلمة السر يجب أن تكون أكثر من 8 أحرف وأرقام"
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

function checkInputsProbleme(){
  var idProbleme = document.getElementById("idProbleme").value;
  var numCompteur = document.getElementById("numCompteur").value;
  var detail = document.getElementById("detail").value;
  var typeProbleme = document.getElementById("typeProbleme").value;
  var typeBenefique = document.getElementById("typeBenefique").value;

  var prix = document.getElementById("prix").value;
  var elementAchete = document.getElementById("elementAchete").value;


  var erreur = document.getElementById("erreur");

  if( typeBenefique==="الرجاء إختيار نوع المنتفع" )
  {
    erreur.innerHTML="الرجاء إختيار نوع المنتفع"
    return false;
  }

  if( typeProbleme==="الرجاء إختيار طبيعة التدخل" )
  {
    erreur.innerHTML="الرجاء إختيار طبيعة التدخل"
    return false;
  }



  if(prix < 0 || prix > 999999 )
  {
    erreur.innerHTML="الرجاء التثبت من صحة مصاريف الاصلاح"
    return false;

  }
  if(numCompteur < 100000 || numCompteur > 999999 )
  {
    erreur.innerHTML="الرجاء التثبت من صحة رقم العداد"
    return false;

  }

  if(idProbleme=="" || numCompteur=="" || detail=="" || prix=="" || elementAchete=="" || tel=="" || email=="" || mdp1=="" || mdp2=="")
  {
    erreur.innerHTML="الرجاء التثبت من أن كل المعطيات كاملةٌ";
    return false;
  }


return true;

}



function checkInputsConsommation(){
  var numConsomme = document.getElementById("numConsomme").value;
  var numCompteur = document.getElementById("numCompteur").value;
 

  var erreur = document.getElementById("erreur");


  if(numCompteur < 100000 || numCompteur > 999999 )
  {
    erreur.innerHTML="الرجاء التثبت من صحة رقم العداد"
    return false;

  }

  if(numConsomme < 1 )
  {
    erreur.innerHTML="الرجاء التثبت من صحة رقم الرقم المستهلك"
    return false;

  }

return true;

}


function checkInputsConsommationPrise(){
  var numConsomme = document.getElementById("numConsomme").value;
  var numPrise = document.getElementById("numPrise").value;
 

  var erreur = document.getElementById("erreur");


  if(numPrise < 1 )
  {
    erreur.innerHTML="الرجاء التثبت من صحة رقم المأخذ"
    return false;

  }

  if(numConsomme < 1 )
  {
    erreur.innerHTML="الرجاء التثبت من صحة رقم الرقم المستهلك"
    return false;

  }

return true;

}



function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}







