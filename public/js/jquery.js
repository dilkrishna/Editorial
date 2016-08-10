$("table").on("click", "tr", function(e) {
    if ($(e.target).is("a,input")) // anything else you don't want to trigger the click
        return;

    location.href = $(this).find("a").attr("href");
});