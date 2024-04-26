var count = 0;
document.getElementById("myButton").onclick = function() {
    count++;
    if (count % 2 == 0) { 
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://static.tildacdn.com/tild6430-3164-4033-b934-333364323265/Frame_34656143.svg";
        document.getElementById("demo").appendChild(img);
    }
}
