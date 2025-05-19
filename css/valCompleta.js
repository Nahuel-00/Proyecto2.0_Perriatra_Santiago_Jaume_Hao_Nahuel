// Validación Login
function verifEmailLogin(){
    let email= document.getElementById("login-email").value;
    let errorEmail= document.getElementById("errorEmailLogin");

    if(email==null || email==""){
        errorEmail.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email))){
        errorEmail.textContent= "El formato de email no es válido";
        return false;
    }else{
        errorEmail.textContent="";
        return true;
    }
}

function verifContraLogin(){
    let contra= document.getElementById("login-password").value;
    let errorContra= document.getElementById("errorContraLogin");

    if(contra.length==0 || contra=="" || contra==null){
        errorContra.innerHTML= "Este campo no puede estar vacío, por favor ingrese su contraseña";
        return false;
    }else{
        errorContra.innerHTML="";
        return true;
    }
}

// Validación Register
function verifNombreRegister(){
    let usuario= document.getElementById("nombreRegister").value;
    let errorUsuario= document.getElementById("errorUsuarioRegister");

    if(usuario==null || usuario==""){
        errorUsuario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(usuario)){
        errorUsuario.textContent="El campo no puede contener numeros";
        return false;
    }else if(usuario.length<3){
        errorUsuario.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorUsuario.textContent="";
        return true;
    }
}

function verifApellidoRegister1(){
    let apellido1= document.getElementById("apellidoRegister1").value;
    let errorApellido1= document.getElementById("errorApellidoRegister1");

    if(apellido1==null || apellido1==""){
        errorApellido1.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido1)){
        errorApellido1.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido1.length<3){
        errorApellido1.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellido1.textContent="";
        return true;
    }
}

function verifApellidoRegister2(){
    let apellido2= document.getElementById("apellidoRegister2").value;
    let errorApellido2= document.getElementById("errorApellidoRegister2");

    if(apellido2==null || apellido2==""){
        errorApellido2.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido2)){
        errorApellido2.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido2.length<3){
        errorApellido2.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellido2.textContent="";
        return true;
    }
}

function verifEmailRegister(){
    let email= document.getElementById("correoRegister").value;
    let errorEmail= document.getElementById("errorEmailRegister");

    if(email==null || email==""){
        errorEmail.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email))){
        errorEmail.textContent= "El formato de email no es válido";
        return false;
    }else{
        errorEmail.textContent="";
        return true;
    }
}
function verifContraRegister(){
    let contra1= document.getElementById("passwordRegister").value;
    let errorContra= document.getElementById("errorContraRegister");

    if(contra1==null || contra1==""){
        errorContra.textContent= "El campo no puede estar vacío";
        return false;
    }else if(contra1.length<8){
        errorContra.textContent= "La contraseña no puede tener menos de 8 caracteres";
        return false;
    }else if(!/\d/.test(contra1)){
        errorContra.textContent= "La contraseña debe tener al menos un número";
        return false;
    }else if(!/[A-Z]/.test(contra1)){
        errorContra.textContent= "La contraseña debe tener al menos una mayúscula";
        return false;
    }else{
        errorContra.textContent="";
    }
}

function verifConfirmContraRegister(){
    let contra1= document.getElementById("passwordRegister").value;
    let contra2= document.getElementById("confirm-password").value;
    let errorConfirm= document.getElementById("errorConfirmRegister");

        if(contra2==null || contra2==""){
            errorConfirm.textContent= "El campo no puede estar vacío";
            return false;
        }else if(contra1!=contra2){
            errorConfirm.textContent= "Las contraseñas no coinciden";
            return false;
        }else{
            errorConfirm.textContent="";
            return true;
        }
}

// Validación Propietario
function verifNombrePropietario(){
    let usuario= document.getElementById("nombrePropietario").value;
    let errorUsuario= document.getElementById("errorUsuarioPropietario");

    if(usuario==null || usuario==""){
        errorUsuario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(usuario)){
        errorUsuario.textContent="El campo no puede contener numeros";
        return false;
    }else if(usuario.length<3){
        errorUsuario.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorUsuario.textContent="";
        return true;
    }
}

function verifApellidoPropietario1(){
    let apellido1= document.getElementById("apellidoPropietario1").value;
    let errorApellido1= document.getElementById("errorApellidoPropietario1");

    if(apellido1==null || apellido1==""){
        errorApellido1.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido1)){
        errorApellido1.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido1.length<3){
        errorApellido1.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellido1.textContent="";
        return true;
    }
}

function verifApellidoPropietario2(){
    let apellido2= document.getElementById("apellidoPropietario2").value;
    let errorApellido2= document.getElementById("errorApellidoPropietario2");

    if(apellido2==null || apellido2==""){
        errorApellido2.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido2)){
        errorApellido2.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido2.length<3){
        errorApellido2.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellido2.textContent="";
        return true;
    }
}

function verifTelefonoPropietario(){
    let telefono= document.getElementById("telefono").value;
    let errorTelefono= document.getElementById("errorTelefono");

    if(telefono==null || telefono==""){
        errorTelefono.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^\d{8}$/.test(telefono))){
        errorTelefono.textContent= "El formato de teléfono no es válido";
        return false;
    }else{
        errorTelefono.textContent="";
        return true;
    }
}

function verifEmailPropietario(){
    let email= document.getElementById("correoPropietario").value;
    let errorEmail= document.getElementById("errorEmailPropietario");

    if(email==null || email==""){
        errorEmail.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email))){
        errorEmail.textContent= "El formato de email no es válido";
        return false;
    }else{
        errorEmail.textContent="";
        return true;
    }
}

function verifDireccionPropietario(){
    let direccion= document.getElementById("direccion").value;
    let errorDireccion= document.getElementById("errorDireccion");

    if(direccion==null || direccion==""){
        errorDireccion.textContent= "El campo no puede estar vacío";
        return false;
    }else if(direccion.length<3){
        errorDireccion.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorDireccion.textContent="";
        return true;
    }
}

// Validación Mascota
function verifChip(){
    let chip= document.getElementById("chip").value;
    let errorChip= document.getElementById("errorChip");

    if(chip==null || chip==""){
        errorChip.textContent= "El campo no puede estar vacío";
        return false;
    }else if(chip.length!=15){
        errorChip.textContent= "El número de chip debe tener exactamente 15 caracteres";
        return false;
    }else{
        errorChip.textContent="";
        return true;
    }
}

function verifNombreMascota(){
    let usuario= document.getElementById("nombreMascota").value;
    let errorUsuario= document.getElementById("errorUsuarioMascota");

    if(usuario==null || usuario==""){
        errorUsuario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(usuario)){
        errorUsuario.textContent="El campo no puede contener numeros";
        return false;
    }else if(usuario.length<3){
        errorUsuario.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorUsuario.textContent="";
        return true;
    }
}

function verifSexo(){
    let sexo= document.getElementById("sexo").value;
    let errorSexo= document.getElementById("errorSexo");

    if (sexo === "") {
      errorSexo.textContent = "Por favor, selecciona un sexo válido.";
      return false;
    } else {
      errorSexo.textContent = "";
      return true;
    }
}

function verifFecha() {
  let fecha = document.getElementById("fecha_nacimiento").value;
  let errorFecha = document.getElementById("errorFecha");

  if (fecha === "") {
    errorFecha.textContent = "Por favor selecciona una fecha.";
    return false;
  }

  let fechaIngresada = new Date(fecha);
  let hoy = new Date();

  if (fechaIngresada > hoy) {
    errorFecha.textContent = "La fecha no puede ser posterior a hoy.";
    return false;
  }

  errorFecha.textContent = "";
  return true;
}

function verifPeso() {
  let peso = document.getElementById("peso").value;
  let errorPeso = document.getElementById("errorPeso");

  if (peso === "") {
    errorPeso.textContent = "El campo no puede estar vacío";
    return false;
  }

  if (peso <= 0) {
    errorPeso.textContent = "El peso debe ser mayor que cero.";
    return false;
  }

  errorPeso.textContent = "";
  return true;
}

function verifVacunado() {
  let vacunado = document.getElementById("vacunado").value;
  let errorVacunado = document.getElementById("errorVacunado");

  if (vacunado === "") {
    errorVacunado.textContent = "Por favor, indica si está vacunado.";
    return false;
  }

  errorVacunado.textContent = "";
  return true;
}

function verifIdEspecie() {
    let numeroIdEspecie= document.getElementById("id_especie").value;
    let errorIdEspecie= document.getElementById("errorIdEspecie");

    if(numeroIdEspecie==null || numeroIdEspecie==""){
        errorIdEspecie.textContent= "El campo no puede estar vacío";
        return false;
    }else if(numeroIdEspecie!=isNaN){
        errorIdEspecie.textContent="El campo solo puede contener numeros";
        return false;
    }
}

function verifIdPropietario() {
    let numeroIdPropietario= document.getElementById("id_propietario").value;
    let errorIdPropietario= document.getElementById("errorIdPropietario");

        if(numeroIdPropietario==null || numeroIdPropietario==""){
        errorIdPropietario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(numeroIdPropietario!=isNaN){
        errorIdPropietario.textContent="El campo solo puede contener numeros";
        return false;
    }
}

// Validacion modificacion Popietario
function verifNombrePropietarioMod(){
    let usuario= document.getElementById("nombrePropietarioMod").value;
    let errorUsuario= document.getElementById("errorUsuarioPropietarioMod");

    if(usuario==null || usuario==""){
        errorUsuario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(usuario)){
        errorUsuario.textContent="El campo no puede contener numeros";
        return false;
    }else if(usuario.length<3){
        errorUsuario.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorUsuario.textContent="";
        return true;
    }
}

function verifApellidoPropietarioMod1(){
    let apellido1= document.getElementById("apellidoPropietarioMod1").value;
    let errorApellido1= document.getElementById("errorApellidoPropietarioMod1");

    if(apellido1==null || apellido1==""){
        errorApellido1.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido1)){
        errorApellido1.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido1.length<3){
        errorApellido1.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellido1.textContent="";
        return true;
    }
}

function verifApellidoPropietarioMod2(){
    let apellido2= document.getElementById("apellidoPropietarioMod2").value;
    let errorApellido2= document.getElementById("errorApellidoPropietarioMod2");

    if(apellido2==null || apellido2==""){
        errorApellido2.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido2)){
        errorApellido2.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido2.length<3){
        errorApellido2.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellido2.textContent="";
        return true;
    }
}

function verifTelefonoPropietario(){
    let telefono= document.getElementById("telefonoMod").value;
    let errorTelefono= document.getElementById("errorTelefonoMod");

    if(telefono==null || telefono==""){
        errorTelefono.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^\d{8}$/.test(telefono))){
        errorTelefono.textContent= "El formato de teléfono no es válido";
        return false;
    }else{
        errorTelefono.textContent="";
        return true;
    }
}

function verifEmailPropietario(){
    let email= document.getElementById("correoPropietarioMod").value;
    let errorEmail= document.getElementById("errorEmailPropietarioMod");

    if(email==null || email==""){
        errorEmail.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email))){
        errorEmail.textContent= "El formato de email no es válido";
        return false;
    }else{
        errorEmail.textContent="";
        return true;
    }
}

function verifDireccionPropietario(){
    let direccion= document.getElementById("direccionMod").value;
    let errorDireccion= document.getElementById("errorDireccionMod");

    if(direccion==null || direccion==""){
        errorDireccion.textContent= "El campo no puede estar vacío";
        return false;
    }else if(direccion.length<3){
        errorDireccion.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorDireccion.textContent="";
        return true;
    }
}

// Validacion modificacion Mascota
function verifChipMod(){
    let chip= document.getElementById("chipMod").value;
    let errorChip= document.getElementById("errorChipMod");

    if(chip==null || chip==""){
        errorChip.textContent= "El campo no puede estar vacío";
        return false;
    }else if(chip.length!=15){
        errorChip.textContent= "El número de chip debe tener exactamente 15 caracteres";
        return false;
    }else{
        errorChip.textContent="";
        return true;
    }
}

function verifNombreMascotaMod(){
    let usuario= document.getElementById("nombreMascotaMod").value;
    let errorUsuario= document.getElementById("errorUsuarioMascotaMod");

    if(usuario==null || usuario==""){
        errorUsuario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(usuario)){
        errorUsuario.textContent="El campo no puede contener numeros";
        return false;
    }else if(usuario.length<3){
        errorUsuario.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorUsuario.textContent="";
        return true;
    }
}

function verifSexoMod(){
    let sexo= document.getElementById("sexoMod").value;
    let errorSexo= document.getElementById("errorSexoMod");

    if (sexo === "") {
      errorSexo.textContent = "Por favor, selecciona un sexo válido.";
      return false;
    } else {
      errorSexo.textContent = "";
      return true;
    }
}

function verifFechaMod() {
  let fecha = document.getElementById("fecha_nacimientoMod").value;
  let errorFecha = document.getElementById("errorFechaMod");

  if (fecha === "") {
    errorFecha.textContent = "Por favor selecciona una fecha.";
    return false;
  }

  let fechaIngresada = new Date(fecha);
  let hoy = new Date();

  if (fechaIngresada > hoy) {
    errorFecha.textContent = "La fecha no puede ser posterior a hoy.";
    return false;
  }

  errorFecha.textContent = "";
  return true;
}

function verifPesoMod() {
  let peso = document.getElementById("pesoMod").value;
  let errorPeso = document.getElementById("errorPesoMod");

  if (peso === "") {
    errorPeso.textContent = "El campo no puede estar vacío";
    return false;
  }

  if (peso <= 0) {
    errorPeso.textContent = "El peso debe ser mayor que cero.";
    return false;
  }

  errorPeso.textContent = "";
  return true;
}

function verifVacunadoMod() {
  let vacunado = document.getElementById("vacunadoMod").value;
  let errorVacunado = document.getElementById("errorVacunadoMod");

  if (vacunado === "") {
    errorVacunado.textContent = "Por favor, indica si está vacunado.";
    return false;
  }

  errorVacunado.textContent = "";
  return true;
}

function verifIdEspecieMod() {
    let numeroIdEspecie= document.getElementById("id_especieMod").value;
    let errorIdEspecie= document.getElementById("errorIdEspecieMod");

    if(numeroIdEspecie==null || numeroIdEspecie==""){
        errorIdEspecie.textContent= "El campo no puede estar vacío";
        return false;
    }else if(numeroIdEspecie!=isNaN){
        errorIdEspecie.textContent="El campo solo puede contener numeros";
        return false;
    }
}

function verifIdPropietarioMod() {
    let numeroIdPropietario= document.getElementById("id_propietarioMod").value;
    let errorIdPropietario= document.getElementById("errorIdPropietarioMod");

        if(numeroIdPropietario==null || numeroIdPropietario==""){
        errorIdPropietario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(numeroIdPropietario!=isNaN){
        errorIdPropietario.textContent="El campo solo puede contener numeros";
        return false;
    }
}