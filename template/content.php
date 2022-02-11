<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link" href="#" onclick="CargarContenido('modules/ventas/listadoVentas.php');" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Realizar una venta
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Facturas</a>
                                    <a class="nav-link" href="#">Contenedores</a>
                                    <a class="nav-link collapsed" href="#" onclick="CargarContenido('modules/clientes/listadoClientes.php');" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Clientes
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Compras
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" onclick="CargarContenido('modules/ingresos/listadoIngresos.php');" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Ingresos
                                    </a>
                                    <a class="nav-link collapsed" href="#" onclick="CargarContenido('modules/proveedores/listadoProveedores.php');" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Proveedores
                                    </a>
                                    </a>
                                    <a class="nav-link collapsed" href="#" onclick="CargarContenido('modules/articulos/listadoArticulos.php');" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Articulos
                                    </a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="#" onclick="CargarContenido('modules/articulos/listadoArticulos.php');">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Inventario
                            </a>
                            <a class="nav-link" href="#" onclick="CargarContenido('modules/usuarios/listadoUsuarios.php');">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Usuarios
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <h3> <?php echo $_SESSION['user'] ?> </h3>
                    </div>
                </nav>
            </div>
            
            
            
            <div id="layoutSidenav_content">  

                <main id = "contenedordepantallas" class="container-fluid px-4">
                    <div id = "contenedorPrincipal">
                        <div class = "separador" style="height: 30px; width: 100%;"></div>
                        <div >
                            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                            <h2>Sistema ABC</h2>
                                <br>
                                <h4> Bienvenido: <?php echo $_SESSION['user'] ?> </h4>
                                <br>
                                <img src="img/exportaciones.jpg" alt="inicio" width="825" height="450">
                            </div>
                        </div>   
                    </div>
                </main>

                <footer class="text-center text-white" style="background-color: #f1f1f1;">
                <!-- Grid container -->
                <div class="container pt-4">
                    <!-- Section: Social media -->
                    <section class="mb-4">
                    <!-- Facebook -->
                    <a
                        class="btn btn-link btn-floating btn-lg text-dark m-1"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-facebook-f"></i
                    ></a>

                    <!-- Twitter -->
                    <a
                        class="btn btn-link btn-floating btn-lg text-dark m-1"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-twitter"></i
                    ></a>

                    <!-- Google -->
                    <a
                        class="btn btn-link btn-floating btn-lg text-dark m-1"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-google"></i
                    ></a>

                    <!-- Instagram -->
                    <a
                        class="btn btn-link btn-floating btn-lg text-dark m-1"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-instagram"></i
                    ></a>

                    <!-- Linkedin -->
                    <a
                        class="btn btn-link btn-floating btn-lg text-dark m-1"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-linkedin"></i
                    ></a>
                    <!-- Github -->
                    <a
                        class="btn btn-link btn-floating btn-lg text-dark m-1"
                        href="#!"
                        role="button"
                        data-mdb-ripple-color="dark"
                        ><i class="fab fa-github"></i
                    ></a>
                    </section>
                    <!-- Section: Social media -->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright:
                    <a class="text-dark" href="https://mdbootstrap.com/">SANTIAGO P.C.</a>
                </div>
                <!-- Copyright -->
                </footer>
            </div>
        </div>
    <script src="js/moduloUsuarios6.js"></script>
    <script src="js/moduloProveedores.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    </body>
</html>