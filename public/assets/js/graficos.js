document.addEventListener("DOMContentLoaded", function () {

    //var ctx = document.getElementById("graficoUsuarios").getContext("2d");

   // Obtener los datos del atributo data-json del canvas
   //var jsonData = document.getElementById("graficoUsuarios").dataset.json;
   //var data = JSON.parse(jsonData);


   var ctx = document.getElementById("graficoUsuarios").getContext("2d");

   // Obtener los datos del atributo data-json del canvas
   var jsonData = document.getElementById("graficoUsuarios").dataset.json;
   var data = JSON.parse(jsonData);

   new Chart(ctx, {
       type: "bar",
       data: {
           labels: data.labels,
           datasets: [{
               label: "Cantidad",
               data: data.cantidad,
               backgroundColor: data.colores
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