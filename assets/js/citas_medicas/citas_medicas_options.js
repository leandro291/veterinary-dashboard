const select_dueño = document.querySelector("#select_dueno");
const select_mascota = document.querySelector("#select_mascota");
const select_veterinario = document.querySelector("#select_veterinario");

const renderDueño = () => {

    select_dueño.innerHTML = ""
    select_dueño.innerHTML = '<option value="">Selecciona un dueño</option>'

    DUEÑOS.forEach((dueño) => {
        const option = document.createElement("option")
        option.value = dueño.id_dueño
        option.textContent = `${dueño.nombre} ${dueño.apellido}`
        select_dueño.append(option)
    })
}

select_dueño.addEventListener('change', (e) => {
    const idDueño = e.target.value

    if (!idDueño) {
        select_mascota.disabled = true
        return
    }

    const mascotasFiltradas = MASCOTAS.filter(m => m.id_dueño == idDueño)

    select_mascota.disabled = false
    select_mascota.innerHTML = 
        '<option value="">Selecciona una mascota</option>' +
        mascotasFiltradas.map(m => `
            <option value="${m.id_mascota}">${m.nombre}</option>
        `).join('');
})

renderDueño()

const renderVeterinario = () => {

    select_veterinario.innerHTML = ""
    select_veterinario.innerHTML = '<option value="">Selecciona un veterinario</option>'

    VETERINARIOS.forEach((veterinario) => {
        const option = document.createElement("option")
        option.value = veterinario.id_veterinario
        option.textContent = `${veterinario.nombre} ${veterinario.apellido}`
        select_veterinario.append(option)
    })
}

renderVeterinario()