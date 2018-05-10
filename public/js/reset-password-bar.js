var newpassword = document.getElementById('password');
var passwordmeter = document.getElementById('reset-password-strength-meter');

var newpasswordconfirm = document.getElementById('password_confirmation');
var passwordconfirmmeter = document.getElementById('reset-passwordconfirmation-strength-meter');


newpassword.addEventListener('input', function() {
           
           var valeur = newpassword.value;
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
                document.getElementById('notermotdepasse').innerHTML = "Le mot de passe doit contenir 12 caractères minimum !";
            }
            if(special > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasse').innerHTML = "Ajoutez un caractère spécial (@ ! ? ) !";
            }
            if(chiffre > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasse').innerHTML = "Ajoutez un chiffre !";
            }
            if(minuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasse').innerHTML = "Ajoutez une minuscule !";
            }
            if(majuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasse').innerHTML = "Ajoutez une majuscule !";
            }
    
    
            if(result == 5){
                document.getElementById('notermotdepasse').innerHTML = "Génial !";
                if(newpassword.value == newpasswordconfirm.value){
                    document.getElementById('notermotdepasseconfirm').innerHTML = "Génial";
                    passwordconfirmmeter.value = 5;
                }
            }
            if(newpassword.value == 0){
                document.getElementById('notermotdepasse').innerHTML = "";
                document.getElementById('notermotdepasseconfirm').innerHTML = "";
                document.getElementById('password_confirmation').value = "";
                passwordconfirmmeter.value = 0;
            }
    
            if(newpassword.value !== newpasswordconfirm.value){
                    document.getElementById('notermotdepasseconfirm').innerHTML = "";
                }
            
            // Update the newpassword strength meter
            passwordmeter.value = result;
            document.getElementById('error-msg').innerHTML = "";

});

newpasswordconfirm.addEventListener('input', function() {
            
            var valeur = newpasswordconfirm.value;
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
                document.getElementById('notermotdepasseconfirm').innerHTML = "Le mot de passe doit contenir 12 caractères minimum !";
            }
            if(special > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasseconfirm').innerHTML = "Ajoutez un caractère spécial (@ ! ? ) !";
            }
            if(chiffre > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasseconfirm').innerHTML = "Ajoutez un chiffre !";
            }
            if(minuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasseconfirm').innerHTML = "Ajoutez une minuscule !";
            }
            if(majuscule > 0 ){
                result = result + 1;
            }else{
                document.getElementById('notermotdepasseconfirm').innerHTML = "Ajoutez une majuscule !";
            }
            
        
            if(result == 5){
                if(newpassword.value == newpasswordconfirm.value){
                    document.getElementById('notermotdepasseconfirm').innerHTML = "Génial";
                }else{
                    document.getElementById('notermotdepasseconfirm').innerHTML = "Le mot de passe ne correspond pas à celui entré au dessus";
                    result = 4;
                }    
            }
            if(newpasswordconfirm.value == 0){
                document.getElementById('notermotdepasseconfirm').innerHTML = "";
            }
            
    
            // Update the newpassword strength meter
            passwordconfirmmeter.value = result;
            document.getElementById('error-msgconfirm').innerHTML = "";

});
