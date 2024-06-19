<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INTRANET - CITOBIOLAB</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body >
	<div id="app">		
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fff;">
			<div class="container">
				<a  class="navbar-brand mt-0 py-0" href="http://citobiolab.com/huancayo" title="CITOBIOLAB" class="logo " style="min-width:198px">
					<img src="http://citobiolab.com/huancayo/wp-content/uploads/2018/06/logo-biolab.png" alt="CITOBIOLAB" class="normal-logo" style="padding: 12.5px 0; max-height: 75px;" height="75">
				</a>
			</div>
		</nav>
		<section class="container  ">
			<div class="row  my-2">
				<div class="col-12 col-md-6">
					<p class="fs-3">Lista de análisis clínicos</p>
					<p>Seleccione la letra inicial o número del tipo de análisis que desea consultar.</p>
				</div>
				<div class="col-12 col-md-3">
					<p class="mt-2 mb-0"><i class="bi bi-funnel"></i> Filtro</p>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Buscar término" autocomplete="off" v-model="texto" @keypress.enter="buscarTexto()"> 
						<button class="btn btn-outline-secondary" type="button" id="button-addon1" @click="buscarTexto()"><i class="bi bi-search"></i></button>
					</div>
				</div>
				<div class="col-12 col-md-3 d-grid gap-2 d-flex align-items-center">
					<button class="btn btn-outline-primary" @click="elegirNuevo" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="bi bi-asterisk"></i> Nuevo análisis</button>
				</div>
			</div>
		</section>
		<section class="container listaFiltros justify-content-between d-flex gap-2 d-none d-md-flex">
			<div class="filWord m-1" @click="verMuestra('a')">A</div>
			<div class="filWord m-1" @click="verMuestra('b')">B</div>
			<div class="filWord m-1" @click="verMuestra('c')">C</div>
			<div class="filWord m-1" @click="verMuestra('d')">D</div>
			<div class="filWord m-1" @click="verMuestra('e')">E</div>
			<div class="filWord m-1" @click="verMuestra('f')">F</div>
			<div class="filWord m-1" @click="verMuestra('g')">G</div>
			<div class="filWord m-1" @click="verMuestra('h')">H</div>
			<div class="filWord m-1" @click="verMuestra('i')">I</div>
			<div class="filWord m-1" @click="verMuestra('j')">J</div>
			<div class="filWord m-1" @click="verMuestra('k')">K</div>
			<div class="filWord m-1" @click="verMuestra('l')">L</div>
			<div class="filWord m-1" @click="verMuestra('m')">M</div>
			<div class="filWord m-1" @click="verMuestra('n')">N</div>
			<div class="filWord m-1" @click="verMuestra('ñ')">Ñ</div>
			<div class="filWord m-1" @click="verMuestra('o')">O</div>
			<div class="filWord m-1" @click="verMuestra('p')">P</div>
			<div class="filWord m-1" @click="verMuestra('q')">Q</div>
			<div class="filWord m-1" @click="verMuestra('r')">R</div>
			<div class="filWord m-1" @click="verMuestra('s')">S</div>
			<div class="filWord m-1" @click="verMuestra('t')">T</div>
			<div class="filWord m-1" @click="verMuestra('u')">U</div>
			<div class="filWord m-1" @click="verMuestra('v')">V</div>
			<div class="filWord m-1" @click="verMuestra('w')">W</div>
			<div class="filWord m-1" @click="verMuestra('x')">X</div>
			<div class="filWord m-1" @click="verMuestra('y')">Y</div>
			<div class="filWord m-1" @click="verMuestra('z')">Z</div>
			<div class="filWord m-1" @click="verMuestra('0')">0</div>
			<div class="filWord m-1" @click="verMuestra('1')">1</div>
			<div class="filWord m-1" @click="verMuestra('2')">2</div>
			<div class="filWord m-1" @click="verMuestra('3')">3</div>
			<div class="filWord m-1" @click="verMuestra('4')">4</div>
			<div class="filWord m-1" @click="verMuestra('5')">5</div>
			<div class="filWord m-1" @click="verMuestra('6')">6</div>
			<div class="filWord m-1" @click="verMuestra('7')">7</div>
			<div class="filWord m-1" @click="verMuestra('8')">8</div>
			<div class="filWord m-1" @click="verMuestra('9')">9</div>
		</section>

		<section class="container mt-3 " id="divResultados">
		<div class="d-flex justify-content-between oneTest p-2 pl-3 " v-for="(muestra, index) in muestras" >
			<span class="aNombre text-uppercase me-auto">{{index+1}}. {{muestra.nombre}}</span>
			<button class="btn btn-sm btn-outline-light border-0 mx-1" @click="abrirActualizar(index)" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="bi bi-pencil-square"></i></button>
			<button class="btn btn-outline-secondary btn-sm d-none d-md-block btnDetalles" @click="abrir1Muestra(muestra.id, index)" data-bs-toggle="modal" data-bs-target="#modalDetalles"><i class="bi bi-caret-right-fill"></i> Ver Detalle</button>
			<button class="btn btn-sm btn-outline-danger border-0 mx-1" @click="eliminar(index)"><i class="bi bi-x-circle-fill"></i></button>
		</div>
		</section>

		<!-- Modal para llamar los detalles -->
		<div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="btn btnClose float-end " data-bs-dismiss="modal" aria-label="Close">
						<span><i class="bi bi-x"></i></span>
						</button>
						<h5 class="text-center mt-3" id="modalNombre">{{queMuestra.nombre}}</h5>
						<p class="fw-bold">CÓDIGO: <span class="info">{{queMuestra.codigo}}</span></p>
						<p class="fw-bold">DETALLES: </p>
						<ul>
							<li><span class="fw-bold">Muestra:</span> <span>{{queMuestra.muestra}}</span></li>
							<li><span class="fw-bold">Contenedor:</span> <span>{{queMuestra.contenedor}}</span></li>
							<li><span class="fw-bold">Volúmen:</span> <span>{{queMuestra.volumen}}</span></li>
							<li><span class="fw-bold">Conservación:</span> <span>{{queMuestra.conservacion}}</span></li>
							<li><span class="fw-bold">Metodología:</span> <span>{{queMuestra.metodologia}}</span></li>
							<li><span class="fw-bold">Especialidad:</span> <span>{{queMuestra.especialidad}}</span></li>
						</ul>
						<span class="info">
							<p class="fw-bold">TIEMPO DE ENGREGA: <span class="info fw-normal">{{queMuestra.entrega}}</span></p>
						</span>
						<p class="fw-bold">CONDICIONES PRE-ANALÍTICAS: <span class="info fw-normal">{{queMuestra.condiciones}}</span></p>
						<p class="fw-bold">PRECIO:  <span class="info "> S/{{parseFloat(queMuestra.precio).toFixed(2)}}</span></p>

					</div>
				</div>
			</div>
		</div>
		<!-- Modal para editar los detalles -->
		<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="btn btnClose float-end " data-bs-dismiss="modal" aria-label="Close" style="color:red">
						<span><i class="bi bi-x"></i></span>
						</button>
						<h5 v-if="esNuevo" class="text-center mt-3" id="modalNombre">Creación de análisis</h5>
						<h5 v-else class="text-center mt-3" id="modalNombre">Edición de análisis</h5>
						
						<label for="">Nombre</label>
						<input type="text" class="form-control" v-model="nuevo.nombre">
						<label for="">Código</label>
						<input type="text" class="form-control" v-model="nuevo.codigo">
						<label for="">DETALLES:</label><br>
						<label for="">Muestra</label>
						<input type="text" class="form-control" v-model="nuevo.muestra">
						<label for="">Contenedor</label>
						<input type="text" class="form-control" v-model="nuevo.contenedor">
						<label for="">Volúmen</label>
						<input type="text" class="form-control" v-model="nuevo.volumen">
						<label for="">Conservación</label>
						<input type="text" class="form-control" v-model="nuevo.conservacion">
						<label for="">Metodología</label>
						<input type="text" class="form-control" v-model="nuevo.metodologia">
						<label for="">Especialidad</label>
						<input type="text" class="form-control" v-model="nuevo.especialidad">
						<label for="">Tiempo de entrega</label>
						<input type="text" class="form-control" v-model="nuevo.entrega">
						<label for="">Condiciones Pre-Analíticas</label>
						<input type="text" class="form-control" v-model="nuevo.condiciones">
						<label for="">Precio</label>
						<input type="text" class="form-control" v-model="nuevo.precio">
						<div class="mt-2 d-grid d-flex justify-content-center">
							<button v-if="!esNuevo" class="btn btn-outline-primary " @click="actualizar()" data-bs-dismiss="modal"><i class="bi bi-pencil-square"></i> Actualizar análisis</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
	const { createApp, ref } = Vue

	createApp({
		setup() {
			const servidor = ref('http://localhost/citolab/php/')
			var texto = ref('')
			var indexGlobal = ref(-1)
			var muestras = ref([]);
			var queMuestra = ref([])
			var esNuevo = false
			var nuevo = ref({nombre: '', codigo: '', muestra: '', contenedor: '', volumen: '', conservacion: '', metodologia: '', especialidad: '', entrega: '', condiciones: '', precio: 0, id:-1})
			
			async function verMuestra(letra){
				let datos = new FormData()
				datos.append('texto', letra)
				const serv = await fetch(servidor.value +'buscarLetra.php',{
					method:'POST', body:datos
				})
				muestras.value = await serv.json()
			}
			async function buscarTexto(){
				let datos = new FormData()
				datos.append('texto', texto.value)
				const serv = await fetch(servidor.value +'buscarTexto.php',{
					method:'POST', body:datos
				})
				muestras.value = await serv.json()
			}
			function abrir1Muestra(id, index){
				indexGlobal.valeu = index
				queMuestra.value = muestras.value[index]
			}
			async function actualizar(){
				let datos = new FormData()
				datos.append('muestra', JSON.stringify(nuevo.value))
				const serv = await fetch(servidor.value +'updateAnalisis.php',{
					method:'POST', body:datos
				})
				const resp = await serv.text()
				if(resp == 'ok'){
					muestras.value[indexGlobal.value] = nuevo.value
					nuevo.value.id=-1
				}
			}
			async function eliminar(index){
				if(confirm(`¿Desea eliminar el registro de ${muestras.value[index].nombre}?`)){
					let datos = new FormData()
					datos.append('id', muestras.value[index].id)
					const serv = await fetch(servidor.value +'eliminarAnalisis.php',{
						method:'POST', body:datos
					})
					const resp = await serv.text()
					if(resp == 'ok')
						muestras.value.splice(index,1)
				}
			}
			function abrirActualizar(index){
				nuevo.value.nombre = muestras.value[index].nombre
				nuevo.value.codigo = muestras.value[index].codigo
				nuevo.value.muestra = muestras.value[index].muestra
				nuevo.value.contenedor = muestras.value[index].contenedor
				nuevo.value.volumen = muestras.value[index].volumen
				nuevo.value.conservacion = muestras.value[index].conservacion
				nuevo.value.metodologia = muestras.value[index].metodologia
				nuevo.value.especialidad = muestras.value[index].especialidad
				nuevo.value.entrega = muestras.value[index].entrega
				nuevo.value.condiciones = muestras.value[index].condiciones
				nuevo.value.precio = muestras.value[index].precio
				nuevo.value.id = muestras.value[index].id
				indexGlobal.value = index
				esNuevo.value = false
			}
			function elegirNuevo(){
				esNuevo.value = true
			}

			return {
				servidor, texto, muestras, indexGlobal,queMuestra, nuevo, esNuevo,
				verMuestra, buscarTexto, abrir1Muestra, eliminar, abrirActualizar, actualizar, elegirNuevo
			}
		}
	}).mount('#app')

</script>
	
<style>
	.btnClose, .modal ul, .info{color:white;}	
	#rowArriba{
		color: #D7E9F4;background-color: #F0F0F0; font-size: 15px;height: 33px;
	}
	#modalEdit label{padding-top:1rem;}
	#spanNumber{font-size: 12px;}
	nav{box-shadow: 0 2px 4px 0 rgba(0,0,0,0.09);}
	.navbar{color: #3E4043;}
	.nav-link{font-size: 0.91rem; font-weight: 500;color: #dbd5d5!important;}
	.nav-link:hover{color:#10BAF2!important;}
	.dropdown-menu.show{padding: 10px; border: 0; border-radius: 5px; box-shadow: 0 2px 4px 2px rgba(0,0,0,0.09);}
	.dropdown-item{font-size: 12px; padding: .6em 10px;transition: all .3s;}
	.dropdown-item:hover{background: #3695EB;color:white;transition: all .3s;
			transition: all .3s;
			border-radius: 4px;}
	#contenedorPadre{color: #515151;font-size: 0.9rem;}
	.active a{color: #3695EB !important;}
	.filWord{background: #fafafa;}
	.oneTest{background-color: #0e51a5;border-bottom: 1px solid #f3f3f3; color:#D7E9F4}
	.oneTest:hover, .aHover{background: #fafafa; color:#0e51a5!important;}
	.oneTest:hover .btn-outline-light{color:#123263!important}
	.btnDetalles{background-color: #ffffffe6;
	color: #0e51a5;}
	#modalDetalles .modal-dialog{max-width: 600px!important;}
	#modalDetalles .modal-content{background: #123263;}
	#modalDetalles .modal-content h5{color:#fff;}
	#modalDetalles .modal-content p{display: block;color: #939393;}
	#modalDetalles .modal-content i{font-size: 20px;}
	/*.pCodigo{font-size: 13px;display: block;}*/
	.modal-backdrop{background-color: #fff!important;}
	.btnEditar{background-color: #ffffffe6;}
	#modalDetalles .close{color: #fff;}
	#modalDetalles .close:focus, #modalDetalles .close:hover {color:#40d5fa}
	#modalDetalles .ptitulo{color: #40d5fa!important;font-size: 14px;}
	.pCodigo,.pInfo{padding-left: 2rem;font-size: 13px; }
	#imgFirma{-webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
		filter: grayscale(100%);opacity: 0.3;}
	#btnAccederxModal{background: white;}
	#modalInicioSes .modal-content{background-color: #e2e2e2;}
	#modalEditarAnalisis .ptitulo{color: #545556!important;font-size: 14px;}
	#modalEditarAnalisis input, #modalEditarAnalisis textarea {font-size: 0.8rem;color: #0e51a5}
	#modalEditarAnalisis p{margin-top: 1rem; margin-bottom: 0;}
	.spanError, .pError{color: #da2b2b;}
	.mayuscula{text-transform: capitalize;}
	footer{background: #f4f3f3;color: #939393;}
	footer .container{font-size: 10px;}
	a{text-decoration-line: none;}
	.filWord, .aNombre{cursor:pointer;}
</style>
</body>
</html>