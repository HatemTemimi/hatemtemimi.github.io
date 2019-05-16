
function CheckNom() {
    
var nom = document.getElementById("nom").value;
//var prenom = document.getElementById("prenom").value;
var error= document.getElementById("ip");



if ( nom.length != 0 || prenom.length != 0) {

        for (i=0;i<nom.length;i++) {
            
            if ( (nom.charAt(i)<"a" || nom.charAt(i)>"z") && ( nom.charAt(i)<"A" || nom.charAt(i)>"Z") ) {
                //alert("Nom ne doit pas contenir des chiffres.");
                error.innerHTML="Nom ne doit pas contenir des chiffres";
                
                return false;

            }
             error.innerHTML="";
                return true;


        }

}

else
    {
        error.innerHTML="Saisissez votre nom svp!";
            return false ;
    }

}

/*___________________________________________________________________________________________________________________________*/


function CheckPrenom() {
    

var prenom = document.getElementById("prenom").value;
var error= document.getElementById("labelPren");



if ( prenom.length != 0) {


        for (j=0;j<prenom.length;j++) {
            if ( (prenom.charAt(j)<"a" || prenom.charAt(j)>"z") && ( prenom.charAt(j)<"A" || prenom.charAt(j)>"Z") ) {
                error.innerHTML="Prenom ne doit pas contenir des chiffres";
                return false;
            } 
                error.innerHTML="";
                return true;

        }
}

else
    {
        error.innerHTML="Saisissez votre prenom svp!";
            return false ;
    }

}



/*___________________________________________________________________________________________________________________________*/



function CheckPassword2()  {  

var password = document.getElementById("mdp").value;
var password2 = document.getElementById("mdp2").value;
var error= document.getElementById("labelMdp");


if ( password.length < 8 ){

error.innerHTML="Mot de passe trop courte: 8 chiffres min.";
   return false;

} 
if (password2 != password ){

    error.innerHTML="Mots de passe différents";

       return false;
    } 

else {
    error.innerHTML="";
    return true;
}
}


/*___________________________________________________________________________________________________________________________*/


function CheckCin() {


var cin = document.getElementById("cin").value;
var error= document.getElementById("labelCin");

if ( cin.length != 8) {
    
     error.innerHTML="CIN contient 8 chiffres.";
    return false;
} else {
    //alert("CIN contient 8 chiffres.");
   error.innerHTML="";
    return true;
}

}




/*___________________________________________________________________________________________________________________________*/

/*
function CheckNum() {
var num = document.getElementById("num_tel").value;
ch = num.substr(0, 1);

if (num.length ==8 ) {
    for (i=0;i<num.length;i++) {
           
            if ( num.charAt(i)<"0" || num.charAt(i)>"9" )  {
                alert("Tel contient que des chiffres.");
                return false;
            }
            else if ( (ch != "2") && (ch != "5") && (ch != "9") )  {
                alert("Un numéro en tunisie s'il vous plait..");
                return false;
            }
        }
}

else {
    alert("Taper un numéro de tél valide.");
    return false;
}

}
*/


function CheckNum() {

var num = document.getElementById("num_tel").value;
ch = num.substr(0, 1);
var error= document.getElementById("labelNum");


if (num.length ==8 ) {
    for (i=0;i<num.length;i++) {
           
            if ( num.charAt(i)>"0" || num.charAt(i)<"9" )  {
                error.innerHTML="";
                return true;
            }
            else if ( (ch == "2") || (ch == "5") || (ch == "9") )  {
               error.innerHTML="";
                return true;
            }
            else {
                 error.innerHTML="Numéro de tél en tunisie svp.";
                return false;
            }
        }
}

else {
    error.innerHTML="Numéro de tél > 8 ou pas en Tunisie.";
    return false;
}

}

/*___________________________________________________________________________________________________________________________*/


function CheckMail() {

var email = document.getElementById("email").value;
var valide = false;
var error= document.getElementById("labelMail");

    for(j=1;j<(email.length);j++) {

        if(email.charAt(j)=='@') {

            if(j<(email.length-4)) {

                for(var k=j;k<(email.length-2);k++) {

                    if(a.charAt(k)=='.') {
                             error.innerHTML="";
                            valide=true;
                            return valide;
                    }
                }
            }
        }
    }

    if(valide == false) { 
        error.innerHTML="Veuillez saisir une adresse email valide.";
        return;
    }

}







/*___________________________________________________________________________________________________________________________*/

/*
function CheckBd() {


var bd = document.getElementById("date_naissance").value;
var ch = bd.substr(6, 4);
var error= document.getElementById("labelBd");

if (ch > 2000) {
    error.innerHTML="Date de naissance non valide: année 2000 min.";
    return false;
} else {

    error.innerHTML="";
    return true;}

}
*/



/*___________________________________________________________________________________________________________________________*/


function Controle() {

if (CheckPassword2() && CheckCin() && CheckNom() && CheckPrenom()  && CheckNum() && CheckMail()) {

    return true;
}
else {
    return false;
}
    
    /*CheckBd();
    CheckMail();
    CheckPassword();
    CheckNum();*/
}



/*___________________________________________________________________________________________________________________________


function Controle2() {

var password = document.getElementById("mdp").value;
var password2 = document.getElementById("mdp2").value;
var num = document.getElementById("num_tel").value;
ch = num.substr(0, 1);


if (password.length != 0 && password2.length != 0){

    if (password.length < 8) {
        alert("password too short, please enter > 8 caracters.");
        return; 
    }

    else if (password2 != password ) {
        alert("password don't match!");
        return;
    }
}


if (num.length ==8 ) {
    for (i=0;i<num.length;i++) {
            
            if ( num.charAt(i)<"0" || num.charAt(i)>"9" )  {
                alert("Tel contient que des chiffres.");
                return false;
            }
            else if ( (ch != "2") && (ch != "5") && (ch != "9") )  {
                alert("Un numéro en tunisie s'il vous plait..");
                return false;
            }
        }
}

}

*/
