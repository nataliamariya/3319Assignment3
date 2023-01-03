gwindow.onload = function() {
prepareListener();
}
function prepareListener() {
var getval = document.getElementByName("selectpat");
getval.addEventListener("change",getPat);
}
