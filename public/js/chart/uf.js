// filtro para solo ingresar caracteres numericos.
$(function () {
    $('.validanumericos').keypress(function (e) {
        if (isNaN(this.value + String.fromCharCode(e.charCode)))
            return false;
    })
        .on("cut copy paste", function (e) {
            e.preventDefault();
        });
});
