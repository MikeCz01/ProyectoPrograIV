document.addEventListener("DOMContentLoaded", function () {
  var formNota = document.querySelector("#formNota");
  formNota.onsubmit = function (e) {
    e.preventDefault();

    var ideventregada = document.querySelector("#ideventregada").value;
    var nota = document.querySelector("#nota").value;

    if (nota.trim() == "") {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP");
    var url = "./models/nota/ajax-nota.php";
    var form = new FormData(formNota);

    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        debugger;
        var data = JSON.parse(request.responseText);
        if (data.status) {
          swal(
            {
              title: data.msg,
              type: "success",
              confirmButtonText: "Aceptar",
              closeOnConfirm: true,
            },
            function (confirm) {
              if (confirm) {
                $("#modalNota").modal("hide");
                location.reload();
                formContenido.reset();
              }
            }
          );
        } else {
          swal("Atencion", data.msg, "error");
        }
      }
    };
  };
});

function modalNota() {
  console.log('Aqui toy')
  $("#modalNota").modal("show");
}
