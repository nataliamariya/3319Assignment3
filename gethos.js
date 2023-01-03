window.onload = function() {
prepareListener();
}
function prepareListener() {
var getval = document.getElementByName("hosps");
getval.addEventListener("change",getHos);
}
