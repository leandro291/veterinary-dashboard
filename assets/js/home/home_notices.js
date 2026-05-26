const total_pacientes = document.querySelector("#total_pacientes")
const citas_totales = document.querySelector("#total_citas")
const paciente_critico = document.querySelector("#total_criticos")
const hora_actual = document.querySelector("#hora_actual")

hora_actual.innerHTML = ""
total_criticos.innerHTML = ""
citas_totales.innerHTML = ""
paciente_critico.innerHTML = ""

hora_actual.innerHTML = `Ultima actualizacion ${HORA_ACTUAL}`
total_pacientes.innerHTML = TOTAL_PACIENTES
citas_totales.innerHTML = TOTAL_CITAS
paciente_critico.innerHTML = TOTAL_CRITICOS