
 // -- validacion login --
 function verifdnilogin() {
    let dni = document.getElementById("dni_login").value.trim();
    let errorDni = document.getElementById("errordni_login");

    if (dni === "") {
        errorDni.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s/.test(dni)) {
        errorDni.textContent = "El DNI no puede contener espacios";
        return false;
    } else if (!/^[0-9]{8}[A-Za-z]$/.test(dni)) {
        errorDni.textContent = "El formato de DNI no es válido (Ej: 12345678A)";
        return false;
    } else {
        errorDni.textContent = "";
        return true;
    }
  }

  function verifContraLogin() {
    let contra = document.getElementById("password").value.trim();
    let errorContra = document.getElementById("errorContra");

    if (contra === "") {
      errorContra.textContent = "Por favor, ingrese su contraseña.";
      return false;
    } else {
      errorContra.textContent = "";
      return true;
    }
  }







// -- Validación Register --
// DNI
function verifDNIVeterinario() {
    let dni = document.getElementById("dni_veterinario").value.trim();
    let error = document.getElementById("errorDNIVeterinario");

    if (dni === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s/.test(dni)) {
        error.textContent = "El DNI no puede contener espacios";
        return false;
    } else if (!/^[0-9]{8}[A-Za-z]$/.test(dni)) {
        error.textContent = "El formato de DNI no es válido (Ej: 12345678A)";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

// Nombre
function verifNombreVeterinario() {
    let nombre = document.getElementById("nombreVeterinario").value.trim();
    let error = document.getElementById("errorNombreVeterinario");

    if (nombre === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s{2,}/.test(nombre)) {
        error.textContent = "El nombre no debe tener espacios múltiples";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

// Primer apellido
function verifApellidoVeterinario1() {
    let apellido = document.getElementById("apellidoVeterinario1").value.trim();
    let error = document.getElementById("errorApellidoVeterinario1");

    if (apellido === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

// Segundo apellido
function verifApellidoVeterinario2() {
    let apellido = document.getElementById("apellidoVeterinario2").value.trim();
    let error = document.getElementById("errorApellidoVeterinario2");

    if (apellido === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

// Teléfono
function verifTelefonoVeterinario() {
    let telefono = document.getElementById("telefonoVeterinario").value.trim();
    let error = document.getElementById("errorTelefonoVeterinario");

    if (telefono === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s/.test(telefono)) {
        error.textContent = "El teléfono no puede contener espacios";
        return false;
    } else if (!/^[0-9]{9}$/.test(telefono)) {
        error.textContent = "El teléfono debe tener 9 dígitos";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

// Email
function verifEmailVeterinario() {
    let email = document.getElementById("emailVeterinario").value.trim();
    let error = document.getElementById("errorEmailVeterinario");

    if (email === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s/.test(email)) {
        error.textContent = "El correo no puede contener espacios";
        return false;
    } else if (!/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email)) {
        error.textContent = "El formato de email no es válido";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

// Fecha de contratación
function verifFechaContratacion() {
    let fecha = document.getElementById("fechaContratacion").value;
    let error = document.getElementById("errorFechaContratacion");

    if (fecha === "") {
        error.textContent = "Debes seleccionar una fecha";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

function veriSueldo() {
  let Sueldo = document.getElementById("sueldo").value;
  let errorSueldo = document.getElementById("errorSueldo");

  if (Sueldo === "") {
    errorSueldo.textContent = "El campo no puede estar vacío";
    return false;
  }else if(Sueldo <= 0) {
    errorSueldo.textContent = "El sueldo debe ser mayor que cero.";
    return false;
  }else if(/\s/.test(Sueldo)) {
    errorSueldo.textContent = "El campo no puede contener espacios";
    return false;
  }else{
    errorSueldo.textContent = "";
    return true;
  }
}


function veriActivo(){
    let activo= document.getElementById("activo").value;
    let errorActivo= document.getElementById("errorActivo");

    if (activo === "") {
      errorActivo.textContent = "Por favor, selecciona un sexo válido.";
      return false;
    } else {
      errorActivo.textContent = "";
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








// -- validacion propietario --

function verifDNI() {
    let dni = document.getElementById("dni_propietario").value.trim();
    let errorDni = document.getElementById("errorDNI");

    if (dni === "") {
        errorDni.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s/.test(dni)) {
        errorDni.textContent = "El DNI no puede contener espacios";
        return false;
    } else if (!/^[0-9]{8}[A-Za-z]$/.test(dni)) {
        errorDni.textContent = "El formato de DNI no es válido (Ej: 12345678A)";
        return false;
    } else {
        errorDni.textContent = "";
        return true;
    }
}


function verifNombrePropietario(){
    let usuario= document.getElementById("nombrePropietario").value;
    let errorUsuarioPropietario= document.getElementById("errorUsuarioPropietario");

    if(usuario ==""){
        errorUsuarioPropietario.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(usuario)){
        errorUsuarioPropietario.textContent="El campo no puede contener numeros";
        return false;
    }else if(usuario.length<3){
        errorUsuarioPropietario.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorUsuarioPropietario.textContent="";
        return true;
    }
}

function verifApellidoPropietario1(){
    let apellido1= document.getElementById("apellidoPropietario1").value;
    let errorApellidoPropietario1= document.getElementById("errorApellidoPropietario1");

    if(apellido1==null || apellido1==""){
        errorApellidoPropietario1.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido1)){
        errorApellidoPropietario1.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido1.length<3){
        errorApellidoPropietario1.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellidoPropietario1.textContent="";
        return true;
    }
}

function verifApellidoPropietario2(){
    let apellido2= document.getElementById("apellidoPropietario2").value;
    let errorApellidoPropietario2= document.getElementById("errorApellidoPropietario2");

    if(apellido2==null || apellido2==""){
        errorApellidoPropietario2.textContent= "El campo no puede estar vacío";
        return false;
    }else if(/\d/.test(apellido2)){
        errorApellidoPropietario2.textContent="El campo no puede contener numeros";
        return false;
    }else if(apellido2.length<3){
        errorApellidoPropietario2.textContent= "El campo no puede tener menos de 3 caracteres";
        return false;
    }else{
        errorApellidoPropietario2.textContent="";
        return true;
    }
}


// Teléfono
function veriTelepe() {
    let telefono = document.getElementById("telefono").value.trim();
    let error = document.getElementById("errorTelefono");

    if (telefono === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s/.test(telefono)) {
        error.textContent = "El teléfono no puede contener espacios";
        return false;
    } else if (!/^[0-9]{9}$/.test(telefono)) {
        error.textContent = "El teléfono debe tener 9 dígitos";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}


function veriEmailpr() {
    let email = document.getElementById("correoPropietario").value.trim();
    let error = document.getElementById("errorEmailPropietario");

    if (email === "") {
        error.textContent = "El campo no puede estar vacío";
        return false;
    } else if (/\s/.test(email)) {
        error.textContent = "El correo no puede contener espacios";
        return false;
    } else if (!/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email)) {
        error.textContent = "El formato de email no es válido";
        return false;
    } else {
        error.textContent = "";
        return true;
    }
}

function veriDirepr(){
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








// -- Validación Mascota --
function verifChip(){
    let chip = document.getElementById("chip").value;
    let errorChip = document.getElementById("errorChip");

    if(chip == null || chip === ""){
        errorChip.textContent = "El campo no puede estar vacío";
        return false;
    } else if(chip.length != 15){
        errorChip.textContent = "El número de chip debe tener exactamente 15 caracteres";
        return false;
    } else if(/\s/.test(chip)) {
        errorChip.textContent = "El campo no puede contener espacios";
        return false;
    } else {
        errorChip.textContent = "";
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
  }else{
    errorFecha.textContent = "";
    return true;
  }
}

function verifPeso() {
  let peso = document.getElementById("peso").value;
  let errorPeso = document.getElementById("errorPeso");

  if (peso === "") {
    errorPeso.textContent = "El campo no puede estar vacío";
    return false;
  }else if(peso <= 0) {
    errorPeso.textContent = "El peso debe ser mayor que cero.";
    return false;
  }else if(/\s/.test(peso)) {
    errorPeso.textContent = "El campo no puede contener espacios";
    return false;
  }else{
    errorPeso.textContent = "";
    return true;
  }
}


function verifVacunado() {
  let vacunado = document.getElementById("vacunado").value;
  let errorVacunado = document.getElementById("errorVacunado");

  if (vacunado === "") {
    errorVacunado.textContent = "Por favor, indica si está vacunado.";
    return false;
  }else{
    errorVacunado.textContent = "";
    return true;
  }
}


function verifEpecie() {
    let numEspecie = document.getElementById("especie").value;
    let errorE = document.getElementById("errorEspecie");

    if (numEspecie === "") {
      errorE.textContent = "Por favor, selecciona un especie válido.";
      return false;
    } else {
      errorE.textContent = "";
      return true;
    }
}


function veriDnipr() {
    let dni = document.getElementById("propietario").value;
    let error = document.getElementById("errorDNIPropietario");

    if (dni === "") {
      error.textContent = "Por favor, selecciona un dni válido.";
      return false;
    } else {
      error.textContent = "";
      return true;
    }
}



function veriDnive() {
    let dni = document.getElementById("dni_veterinario").value;
    let error = document.getElementById("errorDNIVeterinario");

   
    if (dni === "") {
      error.textContent = "Por favor, selecciona un dni válido.";
      return false;
    } else {
      error.textContent = "";
      return true;
    }

}






// -- Validacion editar Popietario --
function veriNompre(){
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
    }else if(/\s/.test(telefono)) {
        errorTelefono.textContent = "El campo no puede contener espacios";
        return false;
    }else{
        errorTelefono.textContent="";
        return true;
    }
}

function verifModEmailPropietario(){
    let email= document.getElementById("correoPropietarioMod").value;
    let errorEmail= document.getElementById("errorEmailPropietarioMod");

    if(email==null || email==""){
        errorEmail.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email))){
        errorEmail.textContent= "El formato de email no es válido";
        return false;
    }else if(/\s/.test(email)) {
        errorEmail.textContent = "El campo no puede contener espacios";
        return false;
    }else{
        errorEmail.textContent="";
        return true;
    }
}

function verifModDireccionPropietario(){
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













// -- Validacion editar Mascota --


function veriNomMasEdi(){
    let usuario= document.getElementById("nombreMascotaEdi").value;
    let errorUsuario= document.getElementById("errorMasEdi");

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

function veriSexoMasEdi(){
    let sexo= document.getElementById("sexoMasEdi").value;
    let errorSexo= document.getElementById("errorSexoEdi");

    if (sexo === "") {
      errorSexo.textContent = "Por favor, selecciona un sexo válido.";
      return false;
    } else {
      errorSexo.textContent = "";
      return true;
    }
}

function verifFechaEdi() {
  let fecha = document.getElementById("fechaEdi").value;
  let errorFecha = document.getElementById("errorFechaedi");

  if (fecha === "") {
    errorFecha.textContent = "Por favor selecciona una fecha.";
    return false;
  }

  let fechaIngresada = new Date(fecha);
  let hoy = new Date();

  if (fechaIngresada > hoy) {
    errorFecha.textContent = "La fecha no puede ser posterior a hoy.";
    return false;
  }else{
    errorFecha.textContent = "";
    return true;
  }
}

function verifPesoEdi() {
  let peso = document.getElementById("pesoEdi").value;
  let errorPeso = document.getElementById("errorPesoEdi");

  if (peso === "") {
    errorPeso.textContent = "El campo no puede estar vacío";
    return false;
  }else if(peso <= 0) {
    errorPeso.textContent = "El peso debe ser mayor que cero.";
    return false;
  }else if(/\s/.test(peso)) {
    errorPeso.textContent = "El campo no puede contener espacios";
    return false;
  }else{
    errorPeso.textContent = "";
    return true;
  }
}


function verifVacunadoEdi() {
  let vacunado = document.getElementById("vacunadoEdi").value;
  let errorVacunado = document.getElementById("errorVacunadoEdi");

  if (vacunado === "") {
    errorVacunado.textContent = "Por favor, indica si está vacunado.";
    return false;
  }else{
    errorVacunado.textContent = "";
    return true;
  }
}


function verifEpecieEdi() {
    let numEspecie = document.getElementById("especieEdi").value;
    let errorE = document.getElementById("errorEspecieEdi");

    if (numEspecie === "") {
      errorE.textContent = "Por favor, selecciona un especie válido.";
      return false;
    } else {
      errorE.textContent = "";
      return true;
    }
}


function veriDniprEdi() {
    let dni = document.getElementById("propietarioEdi").value;
    let error = document.getElementById("errorDNIPropietarioEdi");

    if (dni === "") {
      error.textContent = "Por favor, selecciona un dni válido.";
      return false;
    } else {
      error.textContent = "";
      return true;
    }
}



function veriDniveEdi() {
    let dni = document.getElementById("dni_veterinarioEdi").value;
    let error = document.getElementById("errorDNIVeterinarioEdi");

   
    if (dni === "") {
      error.textContent = "Por favor, selecciona un dni válido.";
      return false;
    } else {
      error.textContent = "";
      return true;
    }

}






// -- Validacion editar Popietario --
function veriNompre(){
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
    }else if(/\s/.test(telefono)) {
        errorTelefono.textContent = "El campo no puede contener espacios";
        return false;
    }else{
        errorTelefono.textContent="";
        return true;
    }
}

function verifModEmailPropietario(){
    let email= document.getElementById("correoPropietarioMod").value;
    let errorEmail= document.getElementById("errorEmailPropietarioMod");

    if(email==null || email==""){
        errorEmail.textContent= "El campo no puede estar vacío";
        return false;
    }else if(!(/^[\w.-]+@[\w.-]+\.\w{2,10}$/.test(email))){
        errorEmail.textContent= "El formato de email no es válido";
        return false;
    }else if(/\s/.test(email)) {
        errorEmail.textContent = "El campo no puede contener espacios";
        return false;
    }else{
        errorEmail.textContent="";
        return true;
    }
}

function verifModDireccionPropietario(){
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






// -- Validacion de agregar medicamento --

function veriNomMedi() {
    let valor = document.getElementById('nombre').value.trim();
    let error = document.getElementById('errorNomMedi');
    if (valor === "") {
        error.textContent = "Este campo es obligatorio.";
        return false;
    }
    error.textContent = "";
    return true;
}


function veriDesMedi() {
    let valor = document.getElementById('descripcion').value.trim();
    let error = document.getElementById('errorDesMedi');
    if (valor === "") {
        error.textContent = "Este campo es obligatorio.";
        return false;
    }
    error.textContent = "";
    return true;
}


function veriDosisMedi() {
    let valor = document.getElementById('dosis').value.trim();
    let error = document.getElementById('errorDosis');
    if (valor === "") {
        error.textContent = "Este campo es obligatorio.";
        return false;
    }
    error.textContent = "";
    return true;
}


function veriEspecieMedi() {
    let valor = document.getElementById('id_especie').value;
    let error = document.getElementById('errorEspeMedi');
    if (valor === "") {
        error.textContent = "Selecciona una opción.";
        return false;
    }
    error.textContent = "";
    return true;
}


function veriImaMedi() {
    let archivo = document.getElementById('imagen').files.length;
    let error = document.getElementById('errorImgMedi');
    if (archivo === 0) {
        error.textContent = "Debes subir una imagen.";
        return false;
    }
    error.textContent = "";
    return true;
}

