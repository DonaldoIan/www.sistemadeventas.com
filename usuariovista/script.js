// Obtener una referencia al elemento canvas del DOM
const $graficalistening = document.querySelector("#graficalistening");
// Las etiquetas son las que van en el eje X. 
const etiquetaslistening = ["Basic", "Intermediate", "Advanced"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosListening = {
    label: "Puntaje de progreso acumulado",
    data: [10, 20, 75], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(232, 27, 31, 0.16)', // Color de fondo
    borderColor: 'rgba(232, 27, 31, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($graficalistening, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetaslistening,
        datasets: [
            datosListening,
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



