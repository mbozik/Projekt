
function register(buttonId) {

    var xhr = new XMLHttpRequest();

    registerResult(xhr, buttonId);

    var email = $("#email").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();

    if (password === password2) {
        var data = '{"email":"' + email + '","password":"' + password + '"}';
        xhr.open('POST', 'http://localhost:8080/registration', true);
        xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhr.send(data);
    } else {
        var responseError = document.getElementsByClassName("alert alert-danger");
        responseError[0].style.display = 'block';
        responseError[0].innerHTML = "Error: passwords are not the same.";
    }
}