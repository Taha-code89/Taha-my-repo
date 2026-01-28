function validateForm() {
    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();

    if (username === "" || email === "") {
        alert("All fields are required");
        return false;
    }

    return true;
}
