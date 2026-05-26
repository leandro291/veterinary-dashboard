const btnsDelete = document.querySelectorAll(".btn-alert")
const body = document.querySelector("body")

console.log(btnsDelete)

btnsDelete.forEach((btn) => {
    btn.addEventListener("click", () => {

        btnId = btn.dataset.delete

        Swal.fire({
            title: "¿Estas seguro?",
            text: "¡No podras revertir esto!",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,  
            customClass: {
                confirmButton: 'bg-red-500 hover:bg-red-600 text-white px-10 py-3 border border-red-900/50 rounded-lg text-sm font-semibold mx-2',
                cancelButton: 'bg-gray-100 hover:bg-gray-200 text-gray-800 px-8 py-3 border border-gray-400/50 rounded-lg text-sm font-semibold mx-2'
            },
            scrollbarPadding: false,  
            heightAuto: false          
        }).then((result) => {
        if (result.isConfirmed) {
            
            const form = document.createElement("form")
            form.method = "POST"
            form.action = "?page=patients"

            form.innerHTML = `
                <input type="hidden" name="accion" value="borrar">
                <input type="hidden" name="id" value="${btnId}">
            `

            body.append(form)
            form.submit()
        }});
    })
})