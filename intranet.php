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
				<div class="col-12 col-md-6">
					<p class="mt-2 mb-0"><i class="bi bi-funnel"></i> Filtro</p>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Buscar término" autocomplete="off" v-model="texto" @keypress.enter="buscarTexto()"> 
						<button class="btn btn-outline-secondary" type="button" id="button-addon1" @click="buscarTexto()"><i class="bi bi-search"></i></button>
					</div>
				</div>
			</div>
		</section>
		<section class="container listaFiltros justify-content-between d-flex gap-2">
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
			<span class="aNombre text-uppercase me-auto">{{muestra.nombre}}</span>
			<button class="btn btn-outline-secondary btn-sm d-none d-md-block btnDetalles" @click="abrir1Muestra(muestra.id, index)" data-bs-toggle="modal" data-bs-target="#modalDetalles"><i class="bi bi-caret-right-fill"></i> Ver Detalle</button>
		</div>
		</section>

		<!-- Modal para llamar los detalles -->
		<div class="modal fade" id="modalDetalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="btnClose float-end " data-bs-dismiss="modal" aria-label="Close">
						<span><i class="bi bi-x"></i></span>
						</button>
						<h5 class="text-center mt-3" id="modalNombre">{{queMuestra.nombre}}</h5>
						<p class="fw-bold">CÓDIGO: </p>
						<p class="fw-bold">DETALLES: </p>
						<ul>
							<li><span class="fw-bold">Muestra</span> <span>XX</span></li>
						</ul>
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
			
			function verMuestra(letra){
				console.log(letra)
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

			return {
				servidor, texto, muestras, indexGlobal,queMuestra,
				verMuestra, buscarTexto, abrir1Muestra
			}
		}
	}).mount('#app')

</script>
	
<style>
	.btnClose, .modal ul{color:white;}	
	#rowArriba{
		color: #D7E9F4;background-color: #F0F0F0; font-size: 15px;height: 33px;
	}
	#spanNumber{font-size: 12px;}
	nav{box-shadow: 0 2px 4px 0 rgba(0,0,0,0.09);}
	.navbar{color: #3E4043;}
	.nav-link{font-size: 0.91rem; font-weight: 500;color: #939393!important;}
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