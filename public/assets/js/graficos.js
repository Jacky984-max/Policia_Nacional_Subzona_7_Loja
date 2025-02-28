
   document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("graficoReportes").getContext("2d");

    // Obtener los datos del canvas (debe tener el atributo data-json con los datos desde el backend)
    var jsonData = document.getElementById("graficoReportes").dataset.json;
    var data = JSON.parse(jsonData);

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Personal", "Mantenimientos", "Solicitudes", "Registros de Asistencia"],
            datasets: [{
                label: "Cantidad",
                data: [data.totalPersonal, data.totalMantenimientos, data.totalSolicitudes, data.totalAsistencias],
                backgroundColor: ["blue", "red", "orange", "green"]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});