const tablaPacientes = document.querySelector("#tabla-pacientes")
const renderTable = () => {

    tablaPacientes.innerHTML = "";

    DATA.forEach((paciente) => {
        const tr = document.createElement("tr")
        tr.classList.add("hover:bg-gray-50")
        tr.classList.add("transition")
        tr.classList.add("duration-150")
        

            tr.innerHTML = `
                <td class="px-4 py-3 text-center">
                    <div class="flex items-center justify-center flex-col">
                        <p class="font-semibold">${paciente.nombre}</p>
                        <p class="text-xs text-gray-400">P${(paciente.id_mascota).padStart(3, '0')}</p>
                    </div>
                </td>
                <td class="px-4 py-3 text-center">
                    <p class="font-medium">${paciente.especie}</p>
                    <p class="text-xs text-gray-400">${paciente.raza}</p>
                </td>
                <td class="px-4 py-3 text-center">
                    <p class="font-medium">${paciente.nombre_dueño}</p>
                    <p class="text-xs text-gray-400">+51 ${paciente.telefono}</p>
                </td>
                <td class="px-4 py-3 text-center">${paciente.edad} años</td>
                <td class="px-4 py-3 text-center">
                    <span class="px-2 py-1 rounded-full text-xs ${
                        paciente.estado === 'Saludable'      ? 'bg-green-100 text-green-600' :
                        paciente.estado === 'En tratamiento' ? 'bg-yellow-100 text-yellow-600' :
                        paciente.estado === 'Critico'        ? 'bg-red-100 text-red-600' :
                                                                'bg-gray-100 text-gray-600'
                    }">
                    ${paciente.estado}
                </span>
                </td>
                <td class="px-4 py-3 text-gray-500 text-center">${paciente.fecha_registro}</td>
                <td class="px-4 py-3">
                    <button class="cursor-pointer hover:bg-gray-100 p-2 rounded-lg transition duration-150 btn-accion" data-id="${paciente.id_mascota}">💬</button>
                    <button class="cursor-pointer hover:bg-gray-100 p-2 rounded-lg transition duration-150 btn-alert" data-delete="${paciente.id_mascota}" >🗑️</button>
                </td>
        `

        tablaPacientes.append(tr)
    })
}

renderTable()
