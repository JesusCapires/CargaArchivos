const estilosValidate = {
    errorElement: 'span',
    errorPlacement: (error, element) => {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
        highlight: (element) => {
        $(element).addClass('is-invalid').removeClass('is-valid');
    },
        unhighlight: (element) => {
        $(element).removeClass('is-invalid').addClass('is-valid');
    }
}

$(document).ready(function() {
    $.validator.addMethod("ValidarRFC", function(value, element) {
        var re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
        return this.optional(element) || re.test(value);
    }, "RFC mal escrito, por favor, ingresa un RFC válido");

    $.validator.addMethod("validaCriterio", (value, element) => $(element).find('option:selected').length === 0 ? false: true);


});


const rfcChange =  () => {
    $('#rfc').on('change', function(){
        console.log('RFC');
        $(this).val($(this).val().toUpperCase());
    });
}

const validarSoloNums = () => {
    const input = event.target;
    input.value = input.value.replace(/[^0-9]/g, '');
}


const construyeSelect = (elemento) => {
    $("#"+elemento).select2({
        placeholder: "Criterios de calidad",
        dropdownParent: $("#modalBase"),
        language: {
            noResults: () =>  "No hay resultado",
            searching: () => "Buscando..",
        }
    });
}


