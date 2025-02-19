document.addEventListener("DOMContentLoaded", function () {
    let selectTipoMantenimiento = document.getElementById("tipo_mantenimiento");

    if (selectTipoMantenimiento) {
        selectTipoMantenimiento.addEventListener("change", function () {
            let tipo = this.value;
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

            fetch("/mantenimientos/calcular-costo", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ tipo_mantenimiento: tipo })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Error en la respuesta del servidor");
                }
                return response.json();
            })
            .then(data => {
                document.getElementById("subtotal").value = data.subtotal;
                document.getElementById("iva").value = data.iva;
                document.getElementById("total").value = data.total;
            })
            .catch(error => console.error("Error en el cálculo de costos:", error));
        });
    }
});