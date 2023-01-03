window.onload = function() {
prepareListener();
}
function prepareListener() {
var getval = document.getElementByName("assigndoc");
getval.addEventListener("change",getAss);
}
