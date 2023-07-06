let  tblProductos, tblCategorias, tblClientes, tblUsuarios;

document.addEventListener("DOMContentLoaded", function(){
  if (document.getElementById('tblUsuarios')){  
  tblUsuarios = $('#tblUsuarios').DataTable( {
    ajax: {
        url: base_url + "Usuarios/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      {
        'data' : 'nom_usuario'
      },
    {
        'data' : 'nombres'
    },
    {
        'data' : 'apellido'
    },
    {
        'data' : 'correo'
    },
    {
        'data' : 'Rol'
    },
    {
        'data' : 'Estado'
    },
    {
        'data' : 'acciones'
    }
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
   //fin de Usuarios
   if (document.getElementById('tblCategorias')){ 
   tblCategorias = $('#tblCategorias').DataTable( {
    ajax: {
        url: base_url + "Categorias/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      
      {
        'data' : 'nombre'
      },
    {
        'data' : 'descripcion'
    },
    {
        'data' : 'estado'
    },
    {
        'data' : 'acciones'
    }
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
   //fin productos
   if (document.getElementById('tblProductos')){ 
   tblProductos = $('#tblProductos').DataTable( {
    ajax: {
        url: base_url + "Productos/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      {
        'data' : 'nombre'
      },
      {
        'data' : 'descripcion'
      },
      {
          'data' : 'precio'
      },
      {
        'data' : 'stock'
      },
      {
          'data' : 'disponibilidad'
      },
      {
          'data' : 'estado'
      },
      {
          'data' : 'nombre_c'
      },
      {
          'data' : 'acciones'
      }
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
   //fin categoria productos
   if (document.getElementById('tblClientes')){ 
   tblClientes = $('#tblClientes').DataTable( {
    ajax: {
        url: base_url + "Clientes/listar",
        dataSrc: ''
    },
    columns: [ {
         'data' : 'id'
      },
      {
        'data' : 'ci'
      },
      {
        'data' : 'nombre'
      },
    {
        'data' : 'apellido'
    },
    {
        'data' : 'telefono'
    },
    {
      'data' : 'direccion'
    },
    {
        'data' : 'estado'
    },
    {
        'data' : 'acciones'
    }
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
          "<'row'<'col-sm-12'tr>>"+ 
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-file fa-2x"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel fa-2x"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text fa-2x"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                titleAttr: 'PDF'
            }
        ]
   }); }
   //fin Clientes
    $('#t_historial_r').DataTable( {
     ajax: {
         url: base_url + "Ventas/listar_Ventas",
         dataSrc: ''
     },
     columns: [ {
          'data' : 'id'
       },
       {
         'data' : 'fecha_compra'
       },
       {
         'data' : 'total'
       },
       {
        'data' : 'ci'
        },
        {
            'data' : 'nombre'
        },
        {
            'data' : 'apellido'
        },
        {
          'data' : 'nom_usuario'
         },
        {
            'data' : 'nombre_u'
        },
        {
            'data' : 'apellido_u'
        },
        {
            'data' : 'acciones'
        }
    
      ],
      language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
      },
      dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>"+
            "<'row'<'col-sm-12'tr>>"+ 
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
              {
                  extend:    'copyHtml5',
                  text:      '<i class="fa fa-file fa-2x"></i>',
                  titleAttr: 'Copy'
              },
              {
                  extend:    'excelHtml5',
                  text:      '<i class="fa fa-file-excel fa-2x"></i>',
                  titleAttr: 'Excel'
              },
              {
                  extend:    'csvHtml5',
                  text:      '<i class="fa fa-file-text fa-2x"></i>',
                  titleAttr: 'CSV'
              },
              {
                  extend:    'pdfHtml5',
                  text:      '<i class="fa fa-file-pdf fa-2x"></i>',
                  titleAttr: 'PDF'
              }
          ]
    }); 
})
function frmLogin(e) {
  e.preventDefault();
  const usuario = document.getElementById("usuarioL");
  const clave = document.getElementById("claveL");
  console.log(usuario);
  if (usuario.value == "") {
      clave.classList.remove("is-invalid");
      usuario.classList.add("is-invalid");
      usuario.focus();
  } else if(clave.value == ""){
      usuario.classList.remove("is-invalid");
      clave.classList.add("is-invalid");
      clave.focus();
  } else{
      const url = base_url + "Usuarios/validar";
      const frm = document.getElementById("frmLogin");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
              const res= JSON.parse(this.responseText);
              
              if(res == "ok") {
                  window.location = base_url + "Home";
              }else{
                  document.getElementById("alerta").classList.remove("d-none");
                  document.getElementById("alerta").innerHTML = res;
              }
          }
      }
  }
}
function frmCambiarPass(e){
  e.preventDefault();
  const actual = document.getElementById('clave_actual').value;
  const nueva = document.getElementById('clave_nueva').value;
  const confirmar = document.getElementById('confirmar_clave').value;
  if(actual == '' || nueva == '' || confirmar == ''){
    alertas('Todos los campos son obligatorios', 'warning');
  } else {
    if(nueva != confirmar){
      alertas('Las contraseñas no no coinciden', 'warning');
    }else{
      
      const url = base_url + "Usuarios/cambiarPass";
    const frm = document.getElementById("frmCambiarPass");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
            const res= JSON.parse(this.responseText);
            $("#cambiarPass").modal("hide");
            alertas(res.msg, res.icono);
         }
    }
  }
  }
}

function frmNuevoCliente() {
  document.getElementById("title").innerHTML = "Nuevo Usuario";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("claves").classList.remove("d-none");
  document.getElementById("frmUsuarios").reset();
  $("#registro_cliente").modal("show");
  document.getElementById("id").value = "";
}

function frmUsuario() {
    document.getElementById("title").innerHTML = "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("claves").classList.remove("d-none");
    document.getElementById("frmUsuarios").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value = "";
}
function registrarUserCli(e) {
  e.preventDefault();
document.getElementById("alertaU").classList.add("d-none");
document.getElementById("alertaC").classList.add("d-none");
document.getElementById("alertaL").classList.add("d-none");
  const usuario = document.getElementById("usuario");
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const correo= document.getElementById("correo");
  const rol = document.getElementById("rol");
  const estado = document.getElementById("estado");
  if (usuario.value == "" || nombre.value == ""|| apellido.value == "" || correo.value == ""  || rol.value == "" || estado.value == "") {
      alertas('Todos los campos son obligatorios', 'warning');
  } else{
      const url = base_url + "Usuarios/registrar";
      const frm = document.getElementById("frmUsuarios");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res= JSON.parse(this.responseText);
              if(res == "usuario"){
                document.getElementById("alertaU").classList.remove("d-none");
              } else if(res == "letras"){
                document.getElementById("alertaL").classList.remove("d-none");
              } else if(res == "correo"){
                document.getElementById("alertaC").classList.remove("d-none");
              }else{alertas(res.msg, res.icono);
                $("#registro_cliente").modal("hide");}
              
          }
      }
  }

}
function registrarUser(e) {
    e.preventDefault();
  document.getElementById("alertaU").classList.add("d-none");
  document.getElementById("alertaC").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const apellido = document.getElementById("apellido");
    const correo= document.getElementById("correo");
    const rol = document.getElementById("rol");
    const estado = document.getElementById("estado");
    if (usuario.value == "" || nombre.value == ""|| apellido.value == "" || correo.value == ""  || rol.value == "" || estado.value == "") {
        alertas('Todos los campos son obligatorios', 'warning');
    } else{
        const url = base_url + "Usuarios/registrar";
        const frm = document.getElementById("frmUsuarios");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res= JSON.parse(this.responseText);
                tblUsuarios.ajax.reload();
                if(res == "usuario"){
                  document.getElementById("alertaU").classList.remove("d-none");
                } else if(res == "letras"){
                  document.getElementById("alertaL").classList.remove("d-none");
                } else if(res == "correo"){
                  document.getElementById("alertaC").classList.remove("d-none");
                }else{alertas(res.msg, res.icono);
                  $("#nuevo_usuario").modal("hide");}
                
            }
        }
    }

}

function btnEditarUser(id){
  document.getElementById("alertaU").classList.add("d-none");
  document.getElementById("alertaC").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
    document.getElementById("title").innerHTML = "Modificar Usuario";  
    document.getElementById("btnAccion").innerHTML = "Modificar";
   
        const url = base_url + "Usuarios/editar/"+id;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
              
              document.getElementById("id").value = res.id;
              document.getElementById("usuario").value = res.nom_usuario;
               document.getElementById("nombre").value = res.nombres;
              document.getElementById("apellido").value = res.apellido;
              document.getElementById("correo").value = res.correo;
              document.getElementById("rol").value = res.Rol;
              document.getElementById("estado").value = res.Estado;
              document.getElementById("claves").classList.add("d-none");
              $("#nuevo_usuario").modal("show");
            }
        }
    

}

function btnEliminarUser(id){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El usuario se eliminará de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Usuarios/eliminar/"+id;
            const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                 alertas(res.msg, res.icono);
                 tblUsuarios.ajax.reload();
            }
          }
         
        }
      })

}
function btnDeshabilitarUser(id){
        Swal.fire({
            title: 'Esta seguro de Desactivar?',
            text: "El usuario no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!'
          }).then((result) => {
            if (result.isConfirmed) {
                const url = base_url + "Usuarios/deshabilitar/"+id;
                const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
                }
              }
             
            }
          })
    
}
function btnReingresarUser(id){
        Swal.fire({
            title: 'Esta seguro de reingresar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'No!'
          }).then((result) => {
            if (result.isConfirmed) {
                const url = base_url + "Usuarios/reingresar/"+id;
                const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText); 
                    tblUsuarios.ajax.reload();
                    alertas(res.msg, res.icono);
                }
              }
            }
          })
    
}
//fin Usuarios
function frmProducto() {
  document.getElementById("title").innerHTML = "Nuevo Producto";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmProducto").reset();
  $("#nuevo_producto").modal("show");
  document.getElementById("id").value = "";
}
function registrarProducto(e) {
  e.preventDefault();
  document.getElementById("alertaL").classList.add("d-none");
  document.getElementById("alertaN").classList.add("d-none");
  const nombre = document.getElementById("nombre");
  const descripcion = document.getElementById("descripcion");
  const precio = document.getElementById("precio");
  const disponibilidad = document.getElementById("disponibilidad");
  const estado = document.getElementById("estado");
  const categoria = document.getElementById("categoria");
  
  if (nombre.value == "" || descripcion.value == ""|| precio.value == "" || disponibilidad.value == ""|| estado.value == "" || categoria.value == "" ) {
      Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Todos los campos son obligatorios',
          showConfirmButton: false,
          timer: 3000
        })
  } else{
      const url = base_url + "Productos/registrar";
      const frm = document.getElementById("frmProducto");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res= JSON.parse(this.responseText);
             if(res == "si"){
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Producto registrado con éxito',
                  showConfirmButton: false,
                  timer: 3000
                })
                frm.reset();
                $("#nuevo_producto").modal("hide");
                tblProductos.ajax.reload();
              }else if(res == "modificado"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Producto modificado con éxito',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    $("#nuevo_producto").modal("hide");
                   tblProductos.ajax.reload();
              }else{
                if(res == "letras"){
                  document.getElementById("alertaL").classList.remove("d-none");
                }else if(res == "numeros"){
                  document.getElementById("alertaN").classList.remove("d-none");
                }else {
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 3000
                  })
                }
              
             }
          }
      }
  }

}

function btnEditarProducto(id){
  document.getElementById("alertaL").classList.add("d-none");
  document.getElementById("title").innerHTML = "Modificar Producto";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Productos/editar/"+id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
         document.getElementById("id").value = res.id;
         document.getElementById("nombre").value = res.nombre;
        document.getElementById("descripcion").value = res.descripcion;
        document.getElementById("precio").value = res.precio;
        document.getElementById("disponibilidad").value = res.disponibilidad;
        document.getElementById("estado").value = res.estado;
        document.getElementById("categoria").value = res.categoria_id;
        $("#nuevo_producto").modal("show");
      }
  }
}

function btnEliminarProducto(id){
  Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "El producto se eliminará de forma permanente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si!',
      cancelButtonText: 'No!'
    }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Productos/eliminar/"+id;
          const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
            if (res == "ok"){
              Swal.fire(
                  'Mensaje!',
                  'Producto eliminado con éxito.',
                  'success'
                )
                
                tblProductos.ajax.reload();
            }else{
              Swal.fire(
                  'Mensaje!',
                  res,
                  'error'
                )
            }
          }
        }
       
      }
    })

}
function btnDeshabilitarProducto(id){
      Swal.fire({
          title: 'Esta seguro de eliminar?',
          text: "El producto no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Productos/deshabilitar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Producto eliminado con éxito.',
                      'success'
                    )
                    
                    tblProductos.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
function btnReingresarProducto(id){
      Swal.fire({
          title: 'Esta seguro de reingresar?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Productos/reingresar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Producto reingresado con éxito.',
                      'success'
                    )
                    
                    tblProductos.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}

//fin Productos
function frmCategoria() {
  document.getElementById("title").innerHTML = "Nueva Categoria";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmCategorias").reset();
  $("#nuevo_categoria").modal("show");
  document.getElementById("id").value = "";
}
function registrarCategoria(e) {
  document.getElementById("alertaL").classList.add("d-none");
  e.preventDefault();
  const nombre = document.getElementById("nombre");
  const descripcion = document.getElementById("descripcion");
  const estado = document.getElementById("estado");
  if (nombre.value == ""|| descripcion.value == "" ||  estado.value == "") {
      Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Todos los campos son obligatorios',
          showConfirmButton: false,
          timer: 3000
        })
  } else{
      const url = base_url + "Categorias/registrar";
      const frm = document.getElementById("frmCategorias");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res= JSON.parse(this.responseText);
             if(res == "si"){
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Categoria registrada con éxito',
                  showConfirmButton: false,
                  timer: 3000
                })
                frm.reset();
                $("#nuevo_categoria").modal("hide");
                tblCategorias.ajax.reload();
              }else if(res == "modificado"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Categoria modificado con éxito',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    $("#nuevo_categoria").modal("hide");
                    tblCategorias.ajax.reload();
              }else{
                if(res == "letras"){
                  document.getElementById("alertaL").classList.remove("d-none");
                } else {
                  document.getElementById("alertaL").classList.add("d-none");
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: res,
                    showConfirmButton: false,
                    timer: 3000
                  })
                }
             
             }
          }
      }
  }

}

function btnEditarCategoria(id){
  document.getElementById("alertaL").classList.add("d-none");
  document.getElementById("title").innerHTML = "Modificar Categoria";
  
  document.getElementById("btnAccion").innerHTML = "Modificar";
 
      const url = base_url + "Categorias/editar/"+id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            
            document.getElementById("id").value = res.id;
             document.getElementById("nombre").value = res.nombre;
            document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("estado").value = res.estado;
            $("#nuevo_categoria").modal("show");
          }
      }
  

}

function btnEliminarCategoria(id){
  Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "La categoria se eliminará de forma permanente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si!',
      cancelButtonText: 'No!'
    }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Categorias/eliminar/"+id;
          const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
            if (res == "ok"){
              Swal.fire(
                  'Mensaje!',
                  'Categoria eliminada con éxito.',
                  'success'
                )
                
                tblCategorias.ajax.reload();
            }else{
              Swal.fire(
                  'Mensaje!',
                  res,
                  'error'
                )
            }
          }
        }
       
      }
    })

}
function btnDeshabilitarCategoria(id){
      Swal.fire({
          title: 'Esta seguro de eliminar?',
          text: "La categoria no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Categorias/deshabilitar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Categoria eliminada con éxito.',
                      'success'
                    )
                    
                    tblCategorias.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
function btnReingresarCategoria(id){
      Swal.fire({
          title: 'Esta seguro de reingresar?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Categorias/reingresar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Categoria reingresada con éxito.',
                      'success'
                    )
                    
                    tblCategorias.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
 
//fin Categorias
function frmCliente() {
  document.getElementById("title").innerHTML = "Nuevo Cliente";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmClientes").reset();
  $("#nuevo_cliente").modal("show");
  document.getElementById("ci").value = "";
}
function registrarCliente(e) {
  e.preventDefault();
  document.getElementById("alertaCi").classList.add("d-none");
  document.getElementById("alertaN").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
  const ci = document.getElementById("ci");
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const telefono= document.getElementById("telefono");
  const direccion= document.getElementById("direccion");
  const estado = document.getElementById("estado");
  if (ci.value == ""||nombre.value == ""|| apellido.value == "" || telefono.value == ""  || estado.value == "") {
      Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Todos los campos son obligatorios',
          showConfirmButton: false,
          timer: 3000
        })
  } else{
      const url = base_url + "Clientes/registrar";
      const frm = document.getElementById("frmClientes");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res= JSON.parse(this.responseText);
             if(res == "si"){
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Cliente registrado con éxito',
                  showConfirmButton: false,
                  timer: 3000
                })
                window.location.href = base_url + "Usuarios/salir";
                frm.reset();
                $("#nuevo_cliente").modal("hide");
                tblClientes.ajax.reload();
              }else if(res == "modificado"){
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Cliente modificado con éxito',
                      showConfirmButton: false,
                      timer: 3000
                    })
                    window.location.href = base_url + "Usuarios/salir";
                    $("#nuevo_cliente").modal("hide");
                    tblClientes.ajax.reload();
              }else{
                if(res == "ci"){
                  document.getElementById("alertaCi").classList.remove("d-none");
                } else if(res == "letras"){
                  document.getElementById("alertaL").classList.remove("d-none");
                } else if(res == "numeros"){
                  document.getElementById("alertaN").classList.remove("d-none");
                }else {
              Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: res,
                showConfirmButton: false,
                timer: 3000
              })
                }
             }
          }
      }
  }

}

function btnEditarCliente(id){
  document.getElementById("title").innerHTML = "Modificar Cliente";
  document.getElementById("btnAccion").innerHTML = "Modificar";
 
  document.getElementById("alertaCi").classList.add("d-none");
  document.getElementById("alertaN").classList.add("d-none");
  document.getElementById("alertaL").classList.add("d-none");
      const url = base_url + "Clientes/editar/"+id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            
            document.getElementById("id").value = res.id;
            document.getElementById("ci").value = res.ci;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("apellido").value = res.apellido;
            document.getElementById("telefono").value = res.telefono;
            document.getElementById("direccion").value = res.direccion;
            document.getElementById("estado").value = res.estado;
            $("#nuevo_cliente").modal("show");
          }
      }
  

}

function btnEliminarCliente(id){
  Swal.fire({
      title: 'Esta seguro de eliminar?',
      text: "El Cliente se eliminará de forma permanente!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si!',
      cancelButtonText: 'No!'
    }).then((result) => {
      if (result.isConfirmed) {
          const url = base_url + "Clientes/eliminar/"+id;
          const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
              const res = JSON.parse(this.responseText);
            if (res == "ok"){
              Swal.fire(
                  'Mensaje!',
                  'Cliente eliminada con éxito.',
                  'success'
                )
                
                tblClientes.ajax.reload();
            }else{
              Swal.fire(
                  'Mensaje!',
                  res,
                  'error'
                )
            }
          }
        }
       
      }
    })

}
function btnDeshabilitarCliente(id){
      Swal.fire({
          title: 'Esta seguro de eliminar?',
          text: "El cliente no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Clientes/deshabilitar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Cliente eliminado con éxito.',
                      'success'
                    )
                    
                    tblClientes.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
function btnReingresarCliente(id){
      Swal.fire({
          title: 'Esta seguro de reingresar?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si!',
          cancelButtonText: 'No!'
        }).then((result) => {
          if (result.isConfirmed) {
              const url = base_url + "Clientes/reingresar/"+id;
              const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                if (res == "ok"){
                  Swal.fire(
                      'Mensaje!',
                      'Cliente reingresada con éxito.',
                      'success'
                    )
                    
                    tblClientes.ajax.reload();
                }else{
                  Swal.fire(
                      'Mensaje!',
                      res,
                      'error'
                    )
                }
              }
            }
           
          }
        })
  
}
//Tabla Detalle
if (document.getElementById('tblDetalle')){
  cargarDetalle();
}
//Informacion de la empresa
function modificarEmpresa(){
  const frm = document.getElementById("frmEmpresa");
  const url = base_url + "Administracion/modificar";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(frm));
  http.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         const res = JSON.parse(this.responseText);
          alertas(res.msg, res.icono);
      }
  }   

}
//Fin Informacion de la empresa
function saltar(e,id)
{
	(e.keyCode)?k=e.keyCode:k=e.which;
	if(k==13)
	{
		// Si la variable id contiene "submit" enviamos el formulario
		if(id=="submit")
		{
			document.forms[0].submit();
		}else{
			// nos posicionamos en el siguiente input
      document.getElementById(id).removeAttribute('disabled');
			document.getElementById(id).focus();
		}
	}
}

function buscarCi(e){
  e.preventDefault();
  const num = document.getElementById("ciV").value;
   if(num != '' ){
    if(e.which == 13){
      const ci = document.getElementById("ciV").value;
      const url = base_url + "Ventas/buscarCi/"+ci;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if(res){
            const cant = document.getElementById("cantidad").value;
            if(cant == ''){
            document.getElementById("categoria").removeAttribute('disabled');
            document.getElementById("categoria").focus();
            } else {
            document.getElementById("add").removeAttribute('disabled');
            document.getElementById("add").focus();
            }
            document.getElementById("nombreV").value = res.nombre;
            document.getElementById("apellidoV").value = res.apellido;
            document.getElementById("id_cli").value = res.id;
            document.getElementById("telefonoV").value = res.telefono;
            document.getElementById("direccionV").value = res.direccion;
          } else {
            alertas('El cliente no existe', 'warning');
            document.getElementById("ci").value = '';
            document.getElementById("ci").focus();
            document.getElementById("nombre").value = '';
            document.getElementById("apellido").value = '';
            document.getElementById("id_cli").value = '';
            document.getElementById("telefono").value = '';
            document.getElementById("direccion").value = '';
          }
        }
      }
    }
  } else{
    alertas('Ingrese el C.I.', 'warning');
  }
}
function buscarProducto(e){
  e.preventDefault();
  const num = document.getElementById("producto").value;
   if(num != '' ){
      const num = document.getElementById("producto").value;
      const url = base_url + "Ventas/buscarProducto/"+num;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
            document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("precio_unidad").value = res.precio_unidad;
            document.getElementById("stock").value = res.stock;
            document.getElementById("id_pro").value = res.id;
            /*var options = document.querySelectorAll('#producto option');
            options.forEach(o => o.remove());*/
            document.getElementById("cantidad").removeAttribute('disabled');
            document.getElementById("cantidad").focus();
        }
      }
  } else{
    alertas('Ingrese el prdocto', 'warning');
  }
}
function seleccionarProducto(num){
   if(num != '' ){
      const url = base_url + "Ventas/buscarProducto/"+num;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
            document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("precio_unidad").value = res.precio_unidad;
            document.getElementById("stock").value = res.stock;
            document.getElementById("id_pro").value = res.id;
            console.log(document.getElementById("id_pro").value);
            document.getElementById("producto").value = num;
            document.getElementById("cantidad").removeAttribute('disabled');
            document.getElementById("cantidad").focus();
        }
      }
  } else{
    alertas('Ingrese el prdocto', 'warning');
  }
}


function calcularPrecTotal(e){
  e.preventDefault();
  const stock = document.getElementById("stock").value;
  if(e.which == 13){
    const cant = document.getElementById("cantidad").value;
    const cant2 = stock-cant;
    if( cant2<0){ 
      alertas('Sólo quedan '+stock+' productos', 'warning');
      document.getElementById("cantidad").value = stock;
    }
      if(cant > 0){
        const cant = document.getElementById("cantidad").value;
        const precio_unidad = document.getElementById("precio_unidad").value;
        var preTot =  cant*precio_unidad;
        var rPreTot = preTot.toFixed(2);
        var decimal = rPreTot - Math.trunc(rPreTot);
          if(decimal == 0.0 || decimal == 0.50 ){
            document.getElementById("precio_total").value =  rPreTot;
          }else{
            if(decimal > 0.50 ){
              document.getElementById("precio_total").value = Math.trunc(rPreTot)+1;
            } else{
              document.getElementById("precio_total").value = Math.trunc(rPreTot);
            }
          }
          if(decimal == 0.0 || decimal == 0.50 ){
            document.getElementById("precio_total").value =  rPreTot;
          }else{
            if(decimal > 0.50 ){
              document.getElementById("precio_total").value = Math.trunc(rPreTot)+1;
            } else{
              document.getElementById("precio_total").value = Math.trunc(rPreTot);
            }
          }
        document.getElementById("add").removeAttribute('disabled');
        document.getElementById("add").focus();
      }
    
  }
}
function ingresar(){
  const ci = document.getElementById("ciV").value;
  const cant = document.getElementById("cantidad").value;
  if(ci!=''){
    if(cant > 0){
      const url = base_url + "Ventas/ingresar";
      const frm = document.getElementById("frmVenta");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
           const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            document.getElementById("producto").value = '';
            document.getElementById("categoria").value = '';
            document.getElementById("precio_unidad").value = '';
            document.getElementById("id").value = '';
            document.getElementById("descripcion").value = '';
            document.getElementById("stock").value = '';
            document.getElementById("cantidad").value = '';
            document.getElementById("precio_total").value = '';
            cargarDetalle();
            document.getElementById('producto').setAttribute('disabled', 'disabled');
            document.getElementById('descripcion').setAttribute('disabled', 'disabled');
            document.getElementById('precio_unidad').setAttribute('disabled', 'disabled');
            document.getElementById('stock').setAttribute('disabled', 'disabled');
            document.getElementById('cantidad').setAttribute('disabled', 'disabled');
            document.getElementById('categoria').focus();
        }
      }
     }
  }else{
    alertas('Ingrese un cliente', 'warning');
  }
    
}
//cargarDetalle();
function cargarDetalle(){
  const url = base_url + "Ventas/listar";
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          const res = JSON.parse(this.responseText);
          let html = '';
          res.detalle.forEach(row => {
            html += `<tr>
            <td>${row['producto_id']}</td> 
            <td>${row['nombre']}</td>
            <td>${row['descripcion']}</td>
            <td>${row['precio']}</td>
            <td>${row['nombre_c']}</td>
            <td>${row['cantidad']}</td>
            <td>${row['sub_total']}</td>
            <td>
            <button class="btn btn-danger" type="button" onclick="deleteDetalle(${row['producto_id']})">
            <i class="fas fa-trash-alt"></i></button>
            </td>
           </tr>`;
          });
          document.getElementById("tblDetalle").innerHTML = html;
          document.getElementById("total").value = res.total_pagar.total;
         }
      }
}
function deleteDetalle(id){
  const url = base_url + "Ventas/delete/"+id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
            cargarDetalle();
        }
      }
}
function generarVenta(){
  Swal.fire({
    title: 'Esta seguro de registar?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si!',
    cancelButtonText: 'No!'
  }).then((result) => {
    const id_cliente = document.getElementById("id_cli").value ;
    if (result.isConfirmed) {
        const url = base_url + "Ventas/registrarVenta/"+id_cliente;
        const http = new XMLHttpRequest();
          http.open("GET", url, true);
          http.send();
          http.onreadystatechange = function(){
            console.log(this.responseText);
              if (this.readyState == 4 && this.status == 200) {
                  const res = JSON.parse(this.responseText);
                  if(res.icono == "success"){
                    Swal.fire(
                      'Mensaje!',
                      'Registro generado.',
                      'success'
                    )
                    const ruta = base_url + "Ventas/generarPdf/"+ res.id_venta;
                    window.open(ruta);
                    setTimeout(() =>{
                      window.location.reload();
                    }, 300);
                  } else {
                    Swal.fire(
                      'Mensaje!',
                      res.msg,
                      'error'
                    )
                  }
        }

      }
     
    }
  })

}

function cargarProd(){
  const categoria = document.getElementById("categoria").value;
  if(categoria == ""){
    alertas("Seleccione una categoria", "error");
  } else {
    document.getElementById('producto').removeAttribute('disabled');
    document.getElementById('producto').focus();
    const url = base_url + "Ventas/disponibles";
    const frm = document.getElementById("frmVenta");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        var options = document.querySelectorAll('#producto option');
        options.forEach(o => o.remove());
        if(res){
          var selectElement = document.getElementById('producto');
            option = document.createElement( 'option' );
            option.value = '';
            option.text = 'Seleccione';
            selectElement.add( option );
          res.forEach(row => {
            option = document.createElement( 'option' );
            option.value = row['id'];
            option.text = row['producto'];
            selectElement.add( option );
        });
        
 var selectedValue2 = localStorage.getItem("selectedValue2");
 if( selectedValue2 > 0){
  seleccionarProducto(selectedValue2);
}
       }else {
          alertas('No existen productos diponibles', 'warning');
          document.getElementById("categoria").focus();
          document.getElementById("categoria").value = '';
        }
        
      }    
    }
  }
  
}

//fin Ventas

function alertas(mensaje, icono){
  Swal.fire({
    position: 'top-end',
    icon: icono,
    title: mensaje,
    showConfirmButton: false,
    timer: 3000
  })
}

//fin alertas

//actualizar();
//actualizarNo();
//actualizar No disponibles
function actualizarNo(){
  const url = base_url + "Ventas/actualizarNo";
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          console.log(this.responseText);
         }
      }
}
//actualizar
function actualizar(){
  const url = base_url + "Ventas/actualizar";
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          console.log(this.responseText);
         }
      }
}
//estados
function togglePopup() {
  var popup = document.getElementById("popup");
  if (popup.style.display === "none") {
    popup.style.display = "block";
  } else {
    popup.style.display = "none";
  }
}
//Hora fin
function HoraFin(e, cuarto_id){
  
  e.preventDefault();
  const url = base_url + "Administracion/obtenerHoraFin/"+cuarto_id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) { 
          const res = JSON.parse(this.responseText);
         document.getElementById("hora_fin"+cuarto_id).value = res.hora_fin;
         }
      }
}
//Reporte grafico
if (document.getElementById('masVendido')){
  reporteVendidos();
}

function reporteVendidos(){
  const url = base_url + "Administracion/reporteVendido";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send();
  http.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         const res = JSON.parse(this.responseText);
         let nombre = [];
          let cantidad = [];
         for(let i = 0; i< res.length; i++){
           nombre.push('Nro.:'+res[i]['numero']);
           cantidad.push(res[i]['veces_vendido']) ;
         }
         var ctx = document.getElementById("masVendido");
          var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
              labels: nombre,
              datasets: [{
                data: cantidad,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#33FFEC','#A533FF' , '#FFDA45','#B7FF33', '#33FFA5','#FF3397'],
              }],
            },
          });
      }
  }
}
function convertirNumeroAMes(numeroMes) {
  const nombresMeses = [
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
  ];
  const indiceMes = numeroMes - 1;if (indiceMes >= 0 && indiceMes < nombresMeses.length) {
    return nombresMeses[indiceMes];
  } else {
    return 'Mes inválido';
  }
}
if (document.getElementById('VentasPorMes')){
  reporteVentas();
}

function reporteVentas(){
  const url = base_url + "Administracion/reporteVentas";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send();
  http.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         const res = JSON.parse(this.responseText);
         let mes = [];
          let cantidad = [];
         for(let i = 0; i< res.length; i++){
           mes.push(convertirNumeroAMes(res[i]['mes']));
           cantidad.push(res[i]['monto_vendido']) ;
         }
         var ctx = document.getElementById("VentasPorMes");
         var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: mes,
            datasets: [{
              label: "Total en Bs.",
              lineTension: 0.3,
              backgroundColor: "rgba(2,117,216,0.2)",
              borderColor: "rgba(2,117,216,1)",
              pointRadius: 5,
              pointBackgroundColor: "rgba(2,117,216,1)",
              pointBorderColor: "rgba(255,255,255,0.8)",
              pointHoverRadius: 5,
              pointHoverBackgroundColor: "rgba(2,117,216,1)",
              pointHitRadius: 50,
              pointBorderWidth: 2,
              data: cantidad,
            }],
          },
          options: {
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false
                },
                ticks: {
                  maxTicksLimit: 7
                }
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 40000,
                  maxTicksLimit: 5
                },
                gridLines: {
                  color: "rgba(0, 0, 0, .125)",
                }
              }],
            },
            legend: {
              display: false
            }
          }
        });
      }
  }
}

if (document.getElementById('VentasPorSemana')){
  reporteVendidosSemana();
}

function reporteVendidosSemana(){
  const url = base_url + "Administracion/reporteVentasSemana";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send();
  http.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         const res = JSON.parse(this.responseText);
          let dia = [];
          let cantidad = [];
         for(let i = 0; i< res.length; i++){
          dia.push(res[i]['dia']);
           cantidad.push(res[i]['monto_vendido']) ;
         }
         var ctx = document.getElementById("VentasPorSemana");
         var myLineChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: dia,
            datasets: [{
              label: "Total en Bs.",
              backgroundColor: "rgba(2,117,216,1)",
              borderColor: "rgba(2,117,216,1)",
              data: cantidad,
            }],
          },
          options: {
            scales: {
              xAxes: [{
                time: {
                  unit: 'month'
                },
                gridLines: {
                  display: false
                },
                ticks: {
                  maxTicksLimit: 6
                }
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 15000,
                  maxTicksLimit: 5
                },
                gridLines: {
                  display: true
                }
              }],
            },
            legend: {
              display: false
            }
          }
        });
        
      }
  }
}
// Validar hora
function validarHora() {
  var inputHora = document.getElementById("hora_inicio");
  var horaIngresada = inputHora.value;

  var options = { hour12: false, hour: '2-digit', minute: '2-digit', timeZone: 'America/La_Paz' };
  var horaActual = new Date().toLocaleTimeString('es-BO', options);

  if (horaIngresada < horaActual) {
    alert("La hora ingresada no puede ser menor a la hora actual.");
    inputHora.value = horaActual;
  }
}

function funSor() {
  const url = base_url + "Administracion/sortear";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send();
  http.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         const res = JSON.parse(this.responseText);
         alertas(res.msg, res.icono);
      }
  }
}
