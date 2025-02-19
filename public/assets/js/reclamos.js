

document.addEventListener("DOMContentLoaded", function () {
    let selectDependencia = document.getElementById("dependencia_id");

    if (selectDependencia) {
        selectDependencia.addEventListener("change", function () {
            let selectedOption = this.options[this.selectedIndex];

            if (selectedOption.value) {
                document.getElementById("nombre_circuito").value = selectedOption.getAttribute("data-circuito");
                document.getElementById("nombre_sub_circuito").value = selectedOption.getAttribute("data-subcircuito");
            } else {
                document.getElementById("nombre_circuito").value = "";
                document.getElementById("nombre_sub_circuito").value = "";
            }
        });
    }
});