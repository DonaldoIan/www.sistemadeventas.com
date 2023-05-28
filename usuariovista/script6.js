
// Obtener una referencia al elemento canvas del DOM
const $graficageneralprom = document.querySelector("#graficageneralprom");
// Las etiquetas son las porciones de la gráfica
const etiquetasprom = ["Reading", "Listening"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosIngresos = {
    data: [1500, 400], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
    backgroundColor: [

        'rgba(230,181,102,0.2)',
        'rgba(229,112,126,0.2)',
    ],// Color de fondo
    borderColor: [

        'rgba(230,181,102,1)',
        'rgba(229,112,126,1)',
    ],// Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($graficageneralprom, {
    type: 'pie',// Tipo de gráfica. Puede ser dougnhut o pie
    data: {
        labels: etiquetasprom,
        datasets: [
            datosIngresos,
            // Aquí más datos...
        ]
    },
});