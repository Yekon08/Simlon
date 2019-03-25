// Flash Message
document.addEventListener('DOMContentLoaded', function() {
    let errorMessage = document.querySelector('.error');
    let successMessage = document.querySelector('.success');
    
    if (errorMessage.innerHTML !== '' || successMessage.innerHTML !== '' ){
        setTimeout(function(){
            errorMessage.innerHTML == '';
            successMessage.innerHTML == '';
        }, 3000);
    }
});