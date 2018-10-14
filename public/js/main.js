var updateField = function(text)
{
    $('#target').val(
        $('#target').val() + text);
}

$("#niveau ").click(function () {
    updateField($(this).find(':selected').val() + ", ");
}).trigger("change");

$("#travail").click(function () {
    updateField($(this).find(':selected').val() + ", ");
}).trigger("change");

$("#comportement").click(function () {
    updateField($(this).find(':selected').val() + ", ");
}).trigger("change");

$("#conseils").click(function () {
    updateField($(this).find(':selected').val() + ", ");
}).trigger("change");

$("#sentences").click(function () {
    updateField($(this).find(':selected').val());
}).trigger("change");