<?php 
if ($rol == "1") 
{ ?>
  <li class="nav-item">
            <a href="consultar-usuarios.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="consultar-cursos.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Cursos
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="solicitudes.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Solicitudes
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="tipos-trabajo.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tipos de trabajo
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="listado-materias.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Materias
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="niveles-educativos.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Niveles educativos
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="niveles-educativos.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="administrar-logotipo.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Logotipo
                
              </p>
            </a>
          </li>
<?php }

elseif ($rol == "2") 
{ ?>
  <li class="nav-item">
            <a href="solicitudes.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Solicitudes
                
              </p>
            </a>
          </li>
<?php }

elseif ($rol == "3") 
{ ?>
  <li class="nav-item">
            <a href="listado-cursos.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Mis cursos
                
              </p>
            </a>
          </li>
  <li class="nav-item">
            <a href="solicitudes.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Solicitudes
                
              </p>
            </a>
          </li>

<?php }
?>
