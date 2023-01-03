window.onload = function() {
prepareListener();
}
function prepareListener() {
var getval = document.getElementById("pickspec");
getval.addEventListener("change",getSpec);
}
