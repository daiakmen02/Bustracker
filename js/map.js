// Initialize the map
const map = L.map('map').setView([28.6139, 77.2090], 13); // Centered on Delhi

// Add OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Fetch bus locations from API
fetch('api/buses.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(bus => {
            L.marker([bus.latitude, bus.longitude])
                .addTo(map)
                .bindPopup(`<strong>Bus No:</strong> ${bus.bus_no}<br><strong>Route:</strong> ${bus.route}`);
        });
    })
    .catch(error => console.error('Error fetching bus data:', error));
