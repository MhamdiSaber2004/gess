$(document).ready(function() {
  $('#listeBenefique').DataTable();
} );



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






function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}







