<x-app-layout>
    
        <link rel="stylesheet" href="{{ asset('css/principal/calculator.css') }}">
        <div class="container-fluid">
            
            <div class="row">
                    
                @include('modules/tools/barraNav')
                
                    <!-- Contenido Principal -->
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        <div class="text-center pt-3 border-bottom">
                            <h1 class="center">Calculadora</h1>
                        </div>
                    <!-- Aquí va el contenido principal -->
                        <div class="container-c">
                            <div class="calculadora">
                                <div class="display">
                                    <div id="valor-anterior"></div>
                                    <div id="valor-actual"></div>
                                </div>
                                <button class="botones boton-2c" onclick="display.borrarTodo()">C</button>
                                <button class="botones" onclick="display.borrar()">&larr;</button>
                                <button class="botones operador" value="dividir">/</button>
                                <button class="botones numero">7</button>
                                <button class="botones numero">8</button>
                                <button class="botones numero">9</button>
                                <button class="botones operador" value="multiplicar">X</button>
                                <button class="botones numero">4</button>
                                <button class="botones numero">5</button>
                                <button class="botones numero">6</button>
                                <button class="botones operador" value="restar">-</button>
                                <button class="botones numero">1</button>
                                <button class="botones numero">2</button>
                                <button class="botones numero">3</button>
                                <button class="botones operador" value="sumar">+</button>
                                <button class="botones boton-2c numero">0</button>
                                <button class="botones numero">.</button>
                                <button class="botones operador" value="igual">=</button>
                            </div>
                        </div>
                    </main>
            </div>       
        </div>            
                    <script>
                        class Calculadora {
                            sumar(num1, num2) {
                                return num1 + num2;
                            }
            
                            restar(num1, num2) {
                                return num1 - num2;
                            }
            
                            dividir(num1, num2) {
                                return num1 / num2;
                            }
            
                            multiplicar(num1, num2) {
                                return num1 * num2;
                            }
                        }
            
                        class Display {
                            constructor(displayValorAnterior, displayValorActual) {
                                this.displayValorAnterior = displayValorAnterior;
                                this.displayValorActual = displayValorActual;
                                this.calculadora = new Calculadora();
                                this.tipoOperacion = undefined;
                                this.valorActual = '';
                                this.valorAnterior = '';
                                this.signos = {
                                    sumar: '+',
                                    dividir: '/',
                                    multiplicar: 'X',
                                    restar: '-'
                                }
                            }
            
                            borrar() {
                                this.valorActual = this.valorActual.toString().slice(0, -1);
                                this.imprimirValores();
                            }
            
                            borrarTodo() {
                                this.valorActual = '';
                                this.valorAnterior = '';
                                this.tipoOperacion = undefined;
                                this.imprimirValores();
                            }
            
                            computar(tipo) {
                                this.tipoOperacion !== 'igual' && this.calcular();
                                this.tipoOperacion = tipo;
                                this.valorAnterior = this.valorActual || this.valorAnterior;
                                this.valorActual = '';
                                this.imprimirValores();
                            }
            
                            agregarNumero(numero) {
                                if(numero === '.' && this.valorActual.includes('.')) return
                                this.valorActual = this.valorActual.toString() + numero.toString();
                                this.imprimirValores();
                            }
            
                            imprimirValores() {
                                this.displayValorActual.textContent = this.valorActual;
                                this.displayValorAnterior.textContent = `${this.valorAnterior} ${this.signos[this.tipoOperacion] || ''}`;
                            }
            
                            calcular() {
                                const valorAnterior = parseFloat(this.valorAnterior);
                                const valorActual = parseFloat(this.valorActual);
            
                                if(isNaN(valorActual) || isNaN(valorAnterior) ) return
                                this.valorActual = this.calculadora[this.tipoOperacion](valorAnterior, valorActual);
                            }
                        }
            
                        
                            const displayValorAnterior = document.getElementById('valor-anterior');
                            const displayValorActual = document.getElementById('valor-actual');
                            const botonesNumeros = document.querySelectorAll('.numero');
                            const botonesOperadores = document.querySelectorAll('.operador');
            
                            const display = new Display(displayValorAnterior, displayValorActual);
            
                            botonesNumeros.forEach(boton => {
                                boton.addEventListener('click', () => display.agregarNumero(boton.innerHTML));
                            });
            
                            botonesOperadores.forEach(boton => {
                                boton.addEventListener('click', () => display.computar(boton.value));
                            });
                        
                    </script>
                
    
</x-app-layout>