$(document).ready(function(e)
{
    var $regionFilter = $('#ec-filter-region-form').find('button[type="submit"]');
    
    $regionFilter.click(function(e)
    {
        var city = $('select[name="city"]').val();
        var data = {
            region: city,
            type:'normal'
        };
        $.post(urlChart,data,function(d)
        {
            $result.find('.uk-grid').html(d);
        });
        e.preventDefault();
    });
});