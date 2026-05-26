const citas_totales = document.querySelector("#citas_totales")
const citas_completadas = document.querySelector("#citas_completadas")
const citas_pendientes = document.querySelector("#citas_pendientes")
const citas_canceladas = document.querySelector("#citas_canceladas")

citas_canceladas.innerHTML =  "";
citas_completadas.innerHTML = ""
citas_pendientes.innerHTML = ""
citas_canceladas.innerHTML = ""

citas_totales.innerHTML = TOTAL_CITAS
citas_completadas.innerHTML = CITAS_COMPLETADAS
citas_pendientes.innerHTML = CITAS_PENDIENTES
citas_canceladas.innerHTML = CITAS_CANCELADAS 