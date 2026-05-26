const btnCloseEditModal = document.querySelector("#btn-closeEdit")
const toggleEditModal = document.querySelector("#modal_editar")
const btnsEdit = document.querySelectorAll(".btn-accion")

btnCloseEditModal.addEventListener("click", () => {
    toggleEditModal.classList.remove("flex")
    toggleEditModal.classList.add("hidden")
})

btnsEdit.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        btnId = btn.dataset.id

        toggleEditModal.classList.remove("hidden")
        toggleEditModal.classList.add("flex")

        veterinario = DATA.find((veterinario) => veterinario.id_veterinario == btnId)

        document.querySelector("#vet_nombre").value = veterinario.nombre
        document.querySelector("#vet_apellido").value = veterinario.apellido
        document.querySelector("#vet_dni").value = veterinario.dni
        document.querySelector("#vet_especialidad").value = veterinario.especialidad
        document.querySelector("#vet_telefono").value = veterinario.telefono
        document.querySelector("#vet_correo").value = veterinario.correo

        document.querySelector("#edit_id").value = veterinario.id_veterinario
    })
})