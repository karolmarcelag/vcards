function copiar(_texto)
{
    navigator.clipboard.writeText(_texto)
    console.log(_texto)
}

function mensaje()
{
    $(".mensaje").css({"display":"block"})
    setTimeout(ocultar, 2000)
}

function ocultar()
{
    $(".mensaje").css({"display":"none"})
}