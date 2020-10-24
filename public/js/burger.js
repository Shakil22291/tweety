$(document).ready(function() {
    $(".burger").click(function() {
        $(".sidebar-wrapper").addClass("active");
        $(".sidebar").addClass("active");
    });

    $(window).click(function(event) {
        if (event.target.classList.contains("sidebar-wrapper")) {
            $(".sidebar-wrapper").removeClass("active");
            $(".sidebar").removeClass("active");
        }
    });
});
