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

        paciente = DATA.find((paciente) => paciente.id_mascota == btnId)
        console.log(paciente)

        document.querySelector("#paciente_nombre").value = paciente.nombre
        document.querySelector("#paciente_especie").value = paciente.especie
        document.querySelector("#paciente_raza").value = paciente.raza
        document.querySelector("#paciente_edad").value = paciente.edad
        document.querySelector("#paciente_estado").value = paciente.estado

        document.querySelector("#dueno_dni").value = paciente.dni
        document.querySelector("#dueno_nombre").value = paciente.nombre_dueño
        document.querySelector("#dueno_apellido").value = paciente.apellido
        document.querySelector("#dueno_telefono").value = paciente.telefono
        document.querySelector("#dueno_direccion").value = paciente.direccion
        document.querySelector("#dueno_correo").value = paciente.correo

        document.querySelector("#edit_id").value = paciente.id_mascota
    })
})