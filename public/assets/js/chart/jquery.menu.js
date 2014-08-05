$(document).ready(function(e)
{
    $('a[href="#ec-menu-archive"]').click(function(e)
    {
        var data = {
            region:region,
            type:'archive'
        };
        $.post(urlChart,data,function(d){$result.html(d);});
        e.preventDefault();
    });
    $('a[href="#ec-menu-main"]').click(function(e)
    {
        var data = {
            region:region,
            type:'normal'
        };
        $.post(urlChart,data,function(d){$result.html(d);});
        e.preventDefault();
    });
});