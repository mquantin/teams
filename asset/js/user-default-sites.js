window.addEventListener("load", function () {
    $("#update_default_sites").click(function() {
        if($(this).is(":checked"))
        {
            $("#default_sites_chosen").attr("hidden",true);
        }
        else
        {
            $("#default_sites_chosen").attr("hidden",false);

        }
    });
});





$("#update_default_sites").click(function() {
    if($(this).is(":checked"))
    {
        $("#default_sites_chosen").attr("hidden",true);
    }
    else
    {
        $("#default_sites_chosen").attr("hidden",false);

    }
});
