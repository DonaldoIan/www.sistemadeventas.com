// Obtener una referencia al elemento canvas del DOM
const $graficapromedioprep = document.querySelector("#graficapromedioprep");
// Las etiquetas son las que van en el eje X. 
const etiquetaspromedioprep = ["Basic", "Intermediate", "Advanced"]
// Podemos tener varios conjuntos de datos
const datospromediopreplistening = {
    label: "Calf.Promedio AE Listening",
    data: [10,80,40], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(63, 191, 127, 0.16)', // Color de fondo
    borderColor: 'rgba(63, 191, 127, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde
};
const datospromedioprepreading = {
    label: "Calf.Promedio AE Reading",
    data: [50,100,85], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    backgroundColor: 'rgba(50, 29, 154, 0.16)',// Color de fondo
    borderColor: 'rgba(50, 29, 154,  1)',// Color del borde
    borderWidth: 1,// Ancho del borde
};

new Chart($graficapromedioprep, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetaspromedioprep,
        datasets: [
            datospromediopreplistening,
            datospromedioprepreading,
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