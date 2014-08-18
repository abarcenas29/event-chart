$(document).ready(function()
{
    $eventForm.ajaxForm({
        beforeSubmit:function(arr)
        {
            $.UIkit.notify('Sending Data ... ',{status:'info'});
            $eventForm.find("button[type='submit']").attr('disabled','');
        },
        success:function(d)
        {
            if(d.success == true)
            {
                $.UIkit.notify(d.response,{status:'success'});
            }
            else
            {
                $.UIkit.notify(d.response,{status:'danger'});
            }
            $eventForm.find("button[type='submit']").removeAttr('disabled');
        }
    });
});