function ajaxFunc(str, id) {

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();

    } else {

        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById(id).innerHTML += xmlhttp.responseText;

        }

    }

    xmlhttp.open("GET", str, true);

    xmlhttp.send(null);


}