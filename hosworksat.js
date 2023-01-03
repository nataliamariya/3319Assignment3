window.onload = function() {
prepareListener();
}
function prepareListener() {
var getvalue = document.getElementById("hosworksat");
getvalue.addEventListener("change",getCode);
}
