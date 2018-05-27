

var password = document.getElementById('new-password');
var meter = document.getElementById('password-strength-meter');

var passwordconfirm = document.getElementById('new-password-confirm');
var confirmmeter = document.getElementById('passwordconfirm-strength-meter');


password.addEventListener('input', function() {
    

           var valeur = password.value;
           var result = 0;
            
            match = valeur.match(/[0-9]/g);
            var chiffre = match ? match.length : 0;
            
            match = valeur.match(/[a-z]/g);
            var minuscule = match ? match.length : 0;
            
            match = valeur.match(/[A-Z]/g);
            var majuscule = match ? match.length : 0;
    
            match = valeur.match(/[?,;.:!§@#$%^&+-]/g);
            var special = match ? match.length : 0;
            
            
            if(valeur.length >= 12){
                result = result + 1;
            }else{
                document.getElementById('notepassword').innerHTML = "Le mot de passe doit contenir 12 caractères minimum !";
            }
            if(special > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepassword').innerHTML = "Ajoutez un caractère spécial (@ ! ? ) !";
            }         
            if(chiffre > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepassword').innerHTML = "Ajoutez un chiffre !";
            }
            if(minuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepassword').innerHTML = "Ajoutez une minuscule !";
            }
            if(majuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepassword').innerHTML = "Ajoutez une majuscule !";
            }
    
    
            if(result == 5){
                document.getElementById('notepassword').innerHTML = "Génial !";
                if(password.value == passwordconfirm.value){
                    document.getElementById('notepasswordconfirm').innerHTML = "Génial !";
                    confirmmeter.value = 5;
                }
            }
            if(password.value == 0){
                document.getElementById('notepassword').innerHTML = "";
                document.getElementById('notepasswordconfirm').innerHTML = "";
                document.getElementById('new-password-confirm').value = "";
                confirmmeter.value = 0;
            }
    
            if(password.value !== passwordconfirm.value){
                    document.getElementById('notepasswordconfirm').innerHTML = "";
                }
            
            // Update the password strength meter
            meter.value = result;
            document.getElementById('error-msg').innerHTML = "";

    


});

passwordconfirm.addEventListener('input', function() {
    
            
            var valeur = passwordconfirm.value;
            var result = 0;
    
            
            match = valeur.match(/[0-9]/g);
            var chiffre = match ? match.length : 0;
            
            match = valeur.match(/[a-z]/g);
            var minuscule = match ? match.length : 0;
            
            match = valeur.match(/[A-Z]/g);
            var majuscule = match ? match.length : 0;
            
            match = valeur.match(/[?,;.:!§@#$%^&+-]/g);
            var special = match ? match.length : 0;
            
    
            if(valeur.length >= 12){
                result = result + 1;
            }else{
                document.getElementById('notepasswordconfirm').innerHTML = "Le mot de passe doit contenir 12 caractères minimum !";
            }
            if(special > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepasswordconfirm').innerHTML = "Ajoutez un caractère spécial (@ ! ? ) !";
            }
            if(chiffre > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepasswordconfirm').innerHTML = "Ajoutez un chiffre !";
            }
            if(minuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepasswordconfirm').innerHTML = "Ajoutez une minuscule !";
            }
            if(majuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notepasswordconfirm').innerHTML = "Ajoutez une majuscule !";
            }
            
        
            if(result == 5){
                if(password.value == passwordconfirm.value){
                    document.getElementById('notepasswordconfirm').innerHTML = "Génial";
                }else{
                    document.getElementById('notepasswordconfirm').innerHTML = "Le mot de passe ne correspond pas à celui entré au dessus";
                    result = 4;
                }    
            }
            if(passwordconfirm.value == 0){
                document.getElementById('notepasswordconfirm').innerHTML = "";
            }
            
    
            // Update the password strength meter
            confirmmeter.value = result;
            if( document.getElementById('error-msgconfirm')) {
                document.getElementById('error-msgconfirm').innerHTML = "";
            }

});



