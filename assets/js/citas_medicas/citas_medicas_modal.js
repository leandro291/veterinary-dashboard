const toggleModal = document.querySelector("#modal")
const btnOpen = document.querySelector("#btn-open")
const btnClose = document.querySelector("#btn-close")
const hora_actual = document.querySelector("#hora_actual")

hora_actual.innerHTML = ""
hora_actual.innerHTML = `Ultima actualizacion ${HORA_ACTUAL}`

btnOpen.addEventListener("click", () => {
    toggleModal.classList.remove("hidden")
    toggleModal.classList.add("flex")
})

btnClose.addEventListener("click", () => {
    toggleModal.classList.add("hidden")
    toggleModal.classList.remove("flex")
})


