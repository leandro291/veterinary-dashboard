const table = document.querySelector("#citas_table")

const renderTable = () => {

    table.innerHTML = "";

    DATA.forEach((citas) => {

        const tr = document.createElement("tr")
        tr.classList.add("hover:bg-gray-50")
        tr.classList.add("transition")
        tr.classList.add("duration-150")

        tr.innerHTML = `
            <td class="px-4 py-3 text-center">
                <div class="flex items-center justify-center flex-col ">
                    <p class="font-semibold">${citas.hora}</p>
                </div>
            </td>
            <td class="px-4 py-3 text-center">
                <p class="font-medium">${citas.nombre_mascota}</p>
                <p class="text-xs text-gray-400">${citas.nombre_dueño} ${citas.apellido_dueño}</p>
            </td>
            <td class="px-4 py-3 text-center">
                <p class="font-medium">${citas.tipo}</p>
            </td>
            <td class="px-4 py-3 text-center">
                <p class="font-medium">Dr. ${citas.nombre_veterinario}</p>
            </td>
            <td class="px-4 py-3 text-center">
                <span class="px-2 py-1 rounded-full text-xs ${
                    citas.estado === 'Completada' ? 'bg-green-100 text-green-600'  :
                    citas.estado === 'Pendiente'  ? 'bg-yellow-100 text-yellow-600' :
                    citas.estado === 'Cancelada'  ? 'bg-red-100 text-red-600'      :
                                                'bg-gray-100 text-gray-600'
                }">
                    ${citas.estado}
                </span>
            </td>
            <td class="px-4 py-3 text-gray-500 text-center">${citas.duracion}</td>
            <td class="px-4 py-3 text-gray-500 text-center">${citas.notas}</td>
            <td class="px-4 py-3">
                <button class="cursor-pointer hover:bg-gray-100 p-2 rounded-lg transition duration-150 btn-accion" data-id="${citas.id_cita}">💬</button>
            </td>
        `
        table.append(tr)
    })
}

renderTable()