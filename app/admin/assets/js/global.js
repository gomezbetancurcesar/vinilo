$(document).ready(function() {
  $('#send').click(function(e){
    e.preventDefault();
    validate = true;
    //Toma los valores ingresados en el formulario y los recorre uno a una para validar que no esten vacios.
    $.each($(this).closest('form').serializeArray(), function(i, item){
        if(item['value'] == ""){
          validate = false;
        }
        //En el caso del email ve si es correcta su escritura.
        if(item['name'] == "mail"){
          validate = validateEmail(item['value']);
        }
    });
    if(validate){
      $(this).closest('form').submit();
    }else{
      alert('Debe llenar todos los campos y/o su correo esta mal ingresado.');
    }
  });
  //Validate el correo con una expresión regular, la cual regresa un true o false
  function validateEmail(val){
    var exp = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    return exp.test(val);
  }
});
