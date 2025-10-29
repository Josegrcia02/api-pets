function adoptPet(id) {
    console.log("URL adopt:", API_BASE_URL + "pet/adopt/" + id);

    fetch(API_BASE_URL + "pet/adopt/" + id, { method: "PUT" })
        .then(response => {
            if (!response.ok) throw new Error("Error al adoptar mascota: " + response.statusText);
            return response.json();
        })
        .then(data => {
            alert("Mascota adoptada correctamente");
            location.reload();
        })
        .catch(error => alert(error));
}
