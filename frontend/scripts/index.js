function adoptPet(id) {
    fetch("http://localhost:8080/pet/adopt/" + id, {
        method: "PUT"
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Error al adoptar la mascota");
        }
        return response.json();
    })
    .then(data => {
        alert("Mascota adoptada correctamente");
        location.reload(); // refresca listado
    })
    .catch(error => alert(error));
}