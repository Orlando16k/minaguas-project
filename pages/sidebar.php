<?php
//echo $currentPage = basename($_SERVER['PHP_SELF']);
$page = isset($_GET['page']) ? $_GET['page'] : "";
?>
<!-- AGREGADO Orlando-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
<!-- FIN AGREGADO Orlando-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-2" href="#">
            <!-- <img src="./assets/img/logos/logo_sima.png" class="navbar-brand-img" style="width: 60px; height: 100px;" alt="main_title"> -->
            <!--<img src="./assets/img/logos/letras_sima_juntos.png" class="navbar-brand-img " style="width: 220px;" alt="main_title">-->
            <img src="./assets/img/logos/logo1.png" class="navbar-brand-img " style="width: 220px; " alt="main_title">
        </a>
    </div>

    <style>
        /* Estilos para pantallas con altura menor a 740px */
        @media (max-height: 750px) {
            .navbar-nav {
                height: auto;
            }

            li.nav-item {
                height: 40px;
                font-size: 12px;
            }
        }

        /* El menú desplegable debe ocupar espacio en el flujo del documento */
        .dropdown-menu {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            min-width: 200px;
            background-color: #EFF3F7;
            border: none;
            margin-left: 5px;
            z-index: 1001;
            padding: 0.5rem 0;
        }

        /* Asegura que el contenedor del menú desplegable esté en el flujo del documento */
        .dropdown-container {
            position: relative;
            list-style: none;
        }

        .navbar-nav>.dropdown-container>.dropdown-menu {
            left: 0;
            top: 100%;
            margin-top: 8px;

        }

        .dropdown-container.open>.dropdown-menu {
            display: block;
        }

        .dropdown-toggle {
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dropdown-container>.dropdown-toggle::after {
            content: "\f107";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
            border: none !important;
            background: none !important;
            width: auto;
            height: auto;
            vertical-align: baseline;
            opacity: 1;
            color: inherit;
            font-size: 1rem;
            line-height: 1;
            display: inline-block !important;
        }

        /* Animación para los submenús */
        .dropdown-menu .dropdown-container>.dropdown-toggle i {
            transition: transform 0.3s ease;
            font-size: 0.8rem;
        }

        /* Rotación cuando está abierto */
        .dropdown-container.open>.dropdown-toggle::after {
            transform: rotate(180deg);
        }

        .dropdown-menu .dropdown-container.open>.dropdown-toggle i {
            transform: rotate(90deg);
        }

        /* Submenús anidados */
        .dropdown-menu .dropdown-menu {
            top: -8px;
            left: calc(100% - 15px);
        }

        .dropdown-menu .nav-link {
            padding: 0.5rem 1.5rem;
            white-space: nowrap;
        }

        .dropdown-menu .nav-link:hover {
            background-color: #f1f1f1;
        }

        /* Ajusta el contenedor inferior para que no se superponga */
        .d-flex.flex-column.col-12 {
            position: relative;
            /* Cambia de absolute a relative */
            margin-top: auto;
            /* Añade un margen superior para evitar superposición */
            padding-bottom: 20px;
        }

        /* Indentación para submenús */
        .dropdown-menu .dropdown-menu .nav-link {
            padding-left: 32px;
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
            const toggleDropdown = (event) => {
                event.preventDefault();
                event.stopPropagation();
                const container = event.currentTarget.closest('.dropdown-container');

                // Cerrar submenús hermanos
                container.parentElement.querySelectorAll('.dropdown-container').forEach(other => {
                    if (other !== container) other.classList.remove('open');
                });

                // Alternar estado actual
                container.classList.toggle('open');
            };

            // Delegación de eventos para todos los dropdowns
            document.querySelectorAll('.dropdown-container .dropdown-toggle').forEach(toggle => {
                toggle.addEventListener('click', toggleDropdown);
            });

            // Cerrar al hacer clic fuera
            document.addEventListener('click', () => {
                document.querySelectorAll('.dropdown-container').forEach(container => {
                    container.classList.remove('open');
                });
            });
        });
    </script>


    <hr class="horizontal dark mt-0">
    <div class="">
        <ul class="navbar-nav d-flex flex-column" style="height: 100vh; overflow-y: auto;">
            <div class="d-flex flex-column">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page == '') ? 'active' : ''; ?>" href="?page=">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Inicio</span>
                    </a>
                </li>

                <?php
                if ($_SESSION["Tipo"] == "Admin" || $_SESSION["Tipo"] == "SuperAdmin" || $_SESSION["Tipo"] == "Visitante") {
                ?>

                    <li class="nav-item dropdown-container">
                        <a href="#" class="nav-link dropdown-toggle" onclick="toggleDropdown(event)">
                            <span class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-chart-bar text-info text-sm opacity-10"></i>
                            </span>
                            <span class="nav-label ms-1">Embalses</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link" <?php echo ($page == 'embalses') ? "active" : ''; ?> " href="?page=embalses" class="dropdown-item">
                                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-chart-bar text-info text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text">Embalses</span>   
                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" <?php echo ($page == 'datos')? "active": ''; ?> " href="?page=datos" class="nav-link dropdown-link">
                                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-calendar-grid-58 text-success text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text">Carga de Datos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" <?php echo ($page == 'reportes')? "active": ''; ?> " href="?page=reportes" class="nav-link dropdown-link">
                                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-bullet-list-67 text-warning text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Reportes</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-link"  <?php echo ($page == 'grafica_embalse')? "active": ''; ?> " href="?grafica_embalse">
                                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-chart-area text-info text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Gráficas</span>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item dropdown-container">
                        <a href="#" class="nav-link dropdown-toggle">
                            <span class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-chart-line text-info text-sm opacity-10"></i>
                            </span>
                            <span class="nav-label ms-1">Calidad</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link"  href="?page=monitoreo">Monitoreo Nacional</a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=situacion" class="nav-link">Situación por Embalses</a>
                            </li>
                            <li class="nav-item dropdown-container">
                                <a href="#" class="nav-link dropdown-toggle">
                                    <span>Seguimiento y Monitoreo</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="?page=graficas_seguimiento" class="nav-link">Gráficos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=consultas_reportes" class="nav-link">Consultas y Reportes</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <?php
                    if ($_SESSION["Tipo"] != "Visitante") {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page == 'backup') ? "active" : ''; ?>" href="?page=backup">
                                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="fa fa-hdd-o text-body text-sm opacity-10"></i>
                                </div>
                                <span class="nav-link-text ms-1">Respaldo del Sistema</span>
                            </a>
                        </li>

                <?php
                    }
                }
                ?>

            </div>

            <!-- Contenedor inferior pegado a la parte inferior -->
            <div class="d-flex flex-column col-12">
                <hr class="horizontal dark mt-0">
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cuenta</h6>
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-8"><?php echo $_SESSION["Correo"]; ?></h6>
                </li>
                <?php if ($_SESSION["Tipo"] == "Admin" || $_SESSION["Tipo"] == "SuperAdmin" || $_SESSION["Tipo"] == "Visitante") { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'usuarios') ? "active" : ''; ?>" href="?page=usuarios">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Usuarios</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION["Tipo"] != "Visitante") { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'perfil') ? "active" : ''; ?>" href="?page=perfil">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fas fa-edit text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Editar Perfil</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($_SESSION["Tipo"] == "SuperAdmin") { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'configuraciones') ? "active" : ''; ?>" href="?page=configuraciones">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-cog text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Configuraciones</span>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link off <?php echo ($page == 'cerrar_sesion') ? "active" : ''; ?>" href="">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-button-power text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Salir</span>
                    </a>
                </li>
            </div>
    </div>
    </ul>
    </div>
</aside>