
// Obtener una referencia al elemento canvas del DOM
const $graficareading = document.querySelector("#graficareading");
// Las etiquetas son las que van en el eje X. 
const etiquetasreading = ["Basic", "Intermediate", "Advanced"]
// Podemos tener varios conjuntos de datos. Comencemos con uno
const datosReading = {
    label: "Puntaje de progreso acumulado",
    data: [100, 30, 70], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($graficareading, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetasreading,
        datasets: [
            datosReading,
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