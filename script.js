function validarLogin() {
  let c = document.querySelector("[name='correo']").value;
  let p = document.querySelector("[name='password']").value;

  

  if (c === "" || p === "") {
    alert("Completa todos los campos porfavorcito");
    return false;
  }
  
}
