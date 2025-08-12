(function () {
  const tagsInput = document.querySelector("#tags_input");

  if (tagsInput) {
    let tags = [];

    /* Escuchar los cambios en el input */
    tagsInput.addEventListener("keypress", guardarTag);

    function guardarTag(e) {
      // Al precionar la coma (,), pasará esto:
      if (e.keyCode === 44) {
        // Evita dejar espacios en blanco
        if (e.target.value.trim() === "" || e.target.value < 1) {
          return;
        }

        e.preventDefault(); // Previene la acción por defecto

        tags = [...tags, e.target.value.trim()]; // Agrega el tag al arreglo

        tagsInput.value = ""; // Limpia la entrada
        console.log(tags);
      }
    }
  }
})();
