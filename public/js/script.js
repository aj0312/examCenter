$(document).ready(function () {
    $('input[name=correct_option]').change(function() {
        alert("asdsad");
        let optionVal = $(this).closest('div.form-group').find('div.col-md-6 input').val();
        $(this).val(optionVal);
    });
});

var i = 0;

const addOptions = (obj) => {


    let option = '<div class="form-group row">'+
    '<div class="col-md-3 text-md-right">'+
        '<label for="correct_option">Option ' + ++i + '</label>' +
    '</div>'+
    '<div class="col-md-3 text-md-right">'+
        '<input type=radio name="correct_option" value="option_' + i +'" />' +
    '</div>';

    option += '<div class="col-md-6">' +
            '<input type="text" name="options[option_' + i +']" />'
        '</div>' +
    '</div>';

    $(option).insertAfter($(obj).closest('.form-group'));
}
