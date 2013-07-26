$(document).ready(function()
{
setInterval('getMessages()',1000);
$('#form_message').submit(function(event)
{
         event.preventDefault();
sentMessage();
});
});
function sentMessage()
{username=document.forms['form_message'].elements['username'].value;
if (username.length ==0)
{
alert('введите имя');
return false;
}
message =document.forms['form_message'].elements['message'].value;
if (message.length ==0)
{
alert('введите сообщение');
return false;
}
$('#message').val('');
$('#username').val('');
var a=$.getJSON('/index/sentmessage',{username: username,message: message})
.success(function()
{
alert('all god');
});

}

function getMessages()
{
var lastmessage =$('tr:last > td:first').text();
if (lastmessage.length == 0)
var lastmessage ='0000-00-00 00:00:00';
$.getJSON('/index/getmessage', {lastmessage: lastmessage},
function(results)
{
if (results != null)
$.each(results,function(key,value)
{

$('#tMessages').append('<tr><td>'+value.date+'</td><td>'+value.username+': </td><td>'+value.message+'</td></tr>');
});
}
);

}