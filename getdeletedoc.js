window.onload = function() {
prepareListener();
}
function prepareListener() {
var getval = document.getElementByName("deletedoc");
getval.addEventListener("change",getDel);
}
