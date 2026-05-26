const btnCloseEditModal = document.querySelector("#btn-closeEdit")
const toggleEditModal = document.querySelector("#modal_editar")
const btnsEdit = document.querySelectorAll(".btn-accion")

btnCloseEditModal.addEventListener("click", () => {
    toggleEditModal.classList.remove("flex")
    toggleEditModal.classList.add("hidden")
})

btnsEdit.forEach((btn) => {
    btn.addEventListener("click", () => {
        const btnId = btn.dataset.id

        const cita = DATA.find(c => c.id_cita == btnId)

        document.querySelector("#cita_paciente").value = cita.nombre_mascota
        document.querySelector("#cita_veterinario").value = cita.nombre_veterinario
        document.querySelector("#cita_tipo").value = cita.tipo
        document.querySelector("#cita_estado").value = cita.estado
        document.querySelector("#edit_id").value = cita.id_cita

        toggleEditModal.classList.remove("hidden")
        toggleEditModal.classList.add("flex")
    })
})