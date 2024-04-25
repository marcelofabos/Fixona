const form = document.querySelector("#form");
const emailInput = document.querySelector("#email");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = emailInput.value;

    if (!almacenarCorreoEnLocalStorage(email)) {
        alert("No se almaceno");
        return;
    }
    
    setTimeout(() => {
        enviarCorreoAlServidor(email).then(() => {
                localStorage.removeItem("correoValores");
            }).catch((err) => {
                console.error("Error al enviar el correo:", err);
            });
        }, 1000);
});

function almacenarCorreoEnLocalStorage(correo) {
    const obj = {
        "correo": correo,
        "tiempo": Date.now()
    };
    localStorage.setItem("correoValores", JSON.stringify(obj));
    return true; // Devuelve true si se almacena correctamente
}

function enviarCorreoAlServidor(email) {
    const body = new FormData();
    const id_ser = 1; // Aquí se debería obtener el ID del servidor de alguna manera

    body.append("id_ser", id_ser);
    body.append("email", email);

    console.log(email);
    return fetch("./message/Controller/process.php", {
        method: "POST",
        body: body,
    })
    .then((response) => response.text())
    .then(console.log)
    .catch((err) => {
        console.error("Error en la solicitud fetch:", err);
        throw err; // Rechazar la promesa para manejar el error externamente
    });
}
