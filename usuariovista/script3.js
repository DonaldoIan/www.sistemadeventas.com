// Obtener una referencia al elemento canvas del DOM
const $grafica = document.querySelector("#graficageneral");
// Las etiquetas son las que van en el eje X. 
const etiquetas = ["Basic", "Intermediate", "Advanced"]
// Podemos tener varios conjuntos de datos
const datosVentas2020 = {
    label: "Progreso Listening",
    data: [10, 20, 70], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
const datosVentas2021 = {
    label: "Progreso Reading",
    data: [100, 30, 70], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(232, 27, 31, 0.16)',// Color de fondo
    borderColor: 'rgba(232, 27, 31, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
};

new Chart($grafica, {
    type: 'line',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            datosVentas2020,
            datosVentas2021,
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