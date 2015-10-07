var CopyButton =document.querySelector('#copy_button');

CopyButton.addEventListener('click',function(){

    var Urlfiled = document.querySelector('#url_input');

    Urlfiled.select();

    document.execCommand('copy');
},false );

function confirmExit()
{
    alert("exiting");
    window.location.href='index.html';
    return true;
}
window.onbeforeunload = confirmExit;