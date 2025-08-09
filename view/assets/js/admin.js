function addEvent() {
    const eventName = document.getElementById("eventName").value;
    const eventDate = document.getElementById("eventDate").value;
    const eventImage = document.getElementById("eventImage").value;
    const eventGenre = document.getElementById("eventGenre").value;

    // Aquí debes enviar los datos al servidor para agregar el evento a la base de datos
    // Puedes utilizar Fetch API o cualquier otra biblioteca para hacer la solicitud al servidor

    // Ejemplo de cómo podría ser la solicitud al servidor con Fetch API:
    fetch('/api/addEvent', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ eventName, eventDate, eventImage, eventGenre }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Evento añadido correctamente:', data);
        // Puedes agregar lógica adicional aquí, como limpiar el formulario o mostrar un mensaje de éxito
    })
    .catch(error => {
        console.error('Error al añadir el evento:', error);
    });
}