function displayAlert() {
    alert("Clicked!");
}

function changeDiv1Color() {
    var newColor = document.getElementById("newColorInput").value;

    document.getElementById("firstDiv").style.backgroundColor = newColor;
}