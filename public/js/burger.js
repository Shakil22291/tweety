$(document).ready(function() {
    $(".burger").click(function() {
        $(".sidebar-wrapper").fadeIn();
        $(".sidebar").addClass("active");
    });

    $(window).click(function(event) {
        if (event.target.classList.contains("sidebar-wrapper")) {
            $(".sidebar-wrapper").fadeOut();
            $(".sidebar").removeClass("active");
        }
    });
});
