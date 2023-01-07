function validacija() {
    let x = document.forms["forma"]["brTel"].value;
    let y = document.forms["forma"]["brRez"].value;
    let len = {min: 6, max: 60}
    if (x == "" || y == "") {
        alert("Molimo vas da popunite sva polja!");
    }
}