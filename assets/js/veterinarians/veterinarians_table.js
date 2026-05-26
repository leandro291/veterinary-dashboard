const table = document.querySelector("#table-veterinarians");

const renderTable = () => {

    table.innerHTML  = "";

    DATA.forEach((veterinario) => {
        const tr = document.createElement("tr")
        tr.classList.add("hover:bg-gray-50")
        tr.classList.add("transition")
        tr.classList.add("duration-150")

        tr.innerHTML = `
            <td class="px-4 py-3">
                <div class="flex items-center gap-3 justify-center">
                    <p class="font-semibold text-center">${veterinario.nombre}</p>
                </div>
            </td>
            <td class="px-4 py-3 text-gray-600 text-center">${veterinario.apellido}</td>
            <td class="px-4 py-3 text-gray-400 text-center">${veterinario.dni}</td>
            <td class="px-4 py-3">
                <p class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-600 text-center">
                    ${veterinario.especialidad}
                </p>
            </td>
            <td class="px-4 py-3 text-gray-500 text-center">+51 ${veterinario.telefono}</td>
            <td class="px-4 py-3 text-gray-500 text-center">${veterinario.correo}</td>
            <td class="px-4 py-3">
                <button class="cursor-pointer hover:bg-gray-100 p-2 rounded-lg transition duration-150 btn-accion" data-id="${veterinario.id_veterinario}">💬</button>
                <button class="cursor-pointer hover:bg-gray-100 p-2 rounded-lg transition duration-150 btn-alert" data-delete="${veterinario.id_veterinario}">🗑️</button>
            </td>
        `
        table.append(tr)
    })
}

renderTable()