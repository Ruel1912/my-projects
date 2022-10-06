function checkPassword() {
    let pass = document.querySelector("input[name='password']").value;
    let rPass = document.querySelector("input[name='repeatPassword']").value;
    if (pass !== rPass) return  alert("Пароли не совпадают!");
    document.location.replace("https://breakover.ru/u/m.vesel/magic/magic.php");
}
