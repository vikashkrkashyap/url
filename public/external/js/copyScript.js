var CopyButton =document.querySelector('#copy');

CopyButton.addEventListener('click',function(){

    var Urlfiled = document.querySelector('#msg');

    Urlfiled.select();

    document.execCommand('copy');
},false );

function confirmExit()
{
    alert("exiting");
    window.location.href='index.html';
    return true;
}
//window.onbeforeunload = confirmExit;