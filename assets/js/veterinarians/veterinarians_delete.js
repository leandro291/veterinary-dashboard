const btnsDelete = document.querySelectorAll(".btn-alert")
const body = document.querySelector("body")

btnsDelete.forEach((btn) => {
    btn.addEventListener("click", () => {
        const btnId = btn.dataset.delete

        Swal.fire({
            title: "¿Estas seguro?",
            text: "¡No podras revertir esto!",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            customClass: {
                confirmButton: 'bg-red-500 text-white px-5 py-2 rounded-lg text-sm mx-2',
                cancelButton: 'bg-gray-100 text-gray-800 px-5 py-2 rounded-lg text-sm mx-2'
            },
            scrollbarPadding: false,
            heightAuto: false
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement("form")
                form.method = "POST"
                form.action = "?page=veterinarians"

                form.innerHTML = `
                    <input type="hidden" name="accion" value="borrar">
                    <input type="hidden" name="id" value="${btnId}">
                `

                body.append(form)
                form.submit()
            }
        });
    })
})