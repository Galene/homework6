$(document).ready(function() {
    modalW();
});

function modalW(){
    $("#boxes .window").fadeOut('slow');
    $("#boxes .window").fadeIn('slow');

    var styles = {
        top: "40%",
        left: "40%",
        border: "1px solid green"
    };
    $("#boxes .window").css(styles)

    $(".window .close").click(function (){
        $("#boxes").remove();
    })
}