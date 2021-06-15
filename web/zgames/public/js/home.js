
const cargarMarcas = async()=>{
    //Ir a buscar las marcas a la api
    let resultado = await axios.get("api/marcas/get");
    let marcas = resultado.data;

    let marcaSelect = document.querySelector("#marca-select");
    marcas.forEach(m=>{
        let option = document.createElement("option");
        option.innerText = m;
        marcaSelect.appendChild(option);
    });
    //Cargar las marcas dentro del select
};

cargarMarcas();