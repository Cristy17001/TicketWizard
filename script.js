function checkPassword(form) {
    password1 = form.password.value;
    password2 = form.confirmpassword.value; 
    if (password1.length<8){
        alert("Password should be atleast 8 characters!")
        return false;
    }
    if (password1 != password2) {
        alert('Password do not match: Please try again...')
        return false;
    }
}