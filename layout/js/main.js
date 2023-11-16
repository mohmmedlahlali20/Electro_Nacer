const email = Document.getElementById(form2Example1);
function regex(){
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    ;
    return re.test(String(email).toLowerCase());
}
const password = Document.getElementById(form2Example2);
function regexpassword(){
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    return re.test(String(password).toLowerCase());
}