// Obtener una referencia al elemento canvas del DOM
const $graficapromedioeva = document.querySelector("#graficapromedioeva");
// Las etiquetas son las que van en el eje X. 
const etiquetaspromedioeva = ["Basic", "Intermediate", "Advanced"]
// Podemos tener varios conjuntos de datos
const datospromedioevalistening = {
    label: "Calf.Promedio E Listening",
    data: [10,90,100], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(114, 140, 127, 0.3)', // Color de fondo
    borderColor: 'rgba(114, 140, 127, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
const datospromedioevareading = {
    label: "Calf.Promedio E Reading",
    data: [50,100,85], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(191, 127, 63, 0.2)',// Color de fondo
    borderColor: 'rgba(191, 127, 63, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
};

new Chart($graficapromedioeva, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetaspromedioeva,
        datasets: [
            datospromedioevalistening,
            datospromedioevareading,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});