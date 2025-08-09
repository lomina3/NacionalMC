document.addEventListener("DOMContentLoaded", function () {
    const upcomingEventsContainer = document.getElementById("upcoming-events");
    const allEventsContainer = document.getElementById("all-events");

    // Supongamos que tienes una lista de eventos en formato JSON
    const events = [
        { name: "Fiesta Electrónica", date: "2023-01-01", image: "electronic.jpg", genre: "Electrónica" },
        // ... Otros eventos ...
    ];

    // Función para agregar eventos a su contenedor correspondiente
    function addEventToContainer(event, container) {
        const card = document.createElement("div");
        card.classList.add("event-card");

        const currentDate = new Date();
        const eventDate = new Date(event.date);

        if (eventDate < currentDate) {
            card.classList.add("past-event");
        }

        const image = document.createElement("img");
        image.src = event.image;
        image.alt = event.name;

        const eventName = document.createElement("h3");
        eventName.textContent = event.name;

        const eventDateElem = document.createElement("p");
        eventDateElem.textContent = event.date;

        card.appendChild(image);
        card.appendChild(eventName);
        card.appendChild(eventDateElem);

        container.appendChild(card);
    }

    // Separar eventos por tipo y agregar a los contenedores
    events.forEach(event => {
        if (event.genre === "Electrónica") {
            addEventToContainer(event, upcomingEventsContainer);
        } else {
            addEventToContainer(event, allEventsContainer);
        }
    });

    // Agregar encabezado a eventos próximos
    const upcomingHeader = document.createElement("div");
    upcomingHeader.classList.add("upcoming-header");
    upcomingHeader.textContent = "Próximos Eventos";
    upcomingEventsContainer.insertBefore(upcomingHeader, upcomingEventsContainer.firstChild);
});