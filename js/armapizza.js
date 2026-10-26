
const pizza = document.getElementById("pizza");
const tamaños = document.querySelectorAll('input[name="tamaño"]');
const extras = document.querySelectorAll(".extra");
const total = document.getElementById("total");
const descripcion = document.getElementById("descripcionpizza");

function calcularTotal() {
    let precio = 0;

    const opcion = pizza.options[pizza.selectedIndex];
    const diferencia = Number(opcion.dataset.diferencia);

    descripcion.textContent = opcion.dataset.descripcion;

    tamaños.forEach(function(tamaño) {
        const precioBase = Number(tamaño.dataset.base);

        document.getElementById("precio" + tamaño.value).textContent =
            "L " + (precioBase + diferencia).toFixed(2);

        if (tamaño.checked) {
            precio = precioBase + diferencia;
        }
    });

    extras.forEach(function(extra) {
        if (extra.checked) {
            precio = precio + Number(extra.dataset.precio);
        }
    });

    total.textContent = "L " + precio.toFixed(2);
}

pizza.addEventListener("change", calcularTotal);

tamaños.forEach(function(tamaño) {
    tamaño.addEventListener("change", calcularTotal);
});

extras.forEach(function(extra) {
    extra.addEventListener("change", calcularTotal);
});

calcularTotal();
