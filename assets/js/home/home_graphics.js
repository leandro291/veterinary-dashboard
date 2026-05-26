new Chart(document.getElementById('miGrafico'), {
    type: 'doughnut',
    data: {
        labels: CITAS_TIPO.map((citas) => citas.tipo),
        datasets: [{
            data: CITAS_TIPO.map((citas) => citas.total),
        }]
    }
});

new Chart(document.getElementById('linear'), {
    type: 'bar',
    data: {
        labels: MASCOTAS_ESPECIE.map((mascota) => mascota.especie),
        datasets: [{
            label: 'Mascotas',
            data: MASCOTAS_ESPECIE.map((mascota) => mascota.total),
        }]
    }
});