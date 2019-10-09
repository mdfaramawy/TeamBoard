<ul class="sidebar navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Support / UR</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="<?php
                                      $admin_yn = $_SESSION['admin_ind'];
                                      if ($admin_yn == 1) {
                                        echo " manage-support-admin.php";
                                      } else {
                                        echo "manage-support.php";
                                      }
                                      ?>">Manage </a>
      <a class="dropdown-item" href="<?php
                                      $admin_yn = $_SESSION['admin_ind'];
                                      if ($admin_yn == 1) {
                                        echo "#";
                                      } else {
                                        echo "add-support.php";
                                      }
                                      ?>">Add </a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Modifications</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="<?php
                                      $admin_yn = $_SESSION['admin_ind'];
                                      if ($admin_yn == 1) {
                                        echo "manage-mod-admin.php";
                                      } else {
                                        echo "manage-mod.php";
                                      }
                                      ?>">Manage</a>
      <a class="dropdown-item" href="<?php
                                      $admin_yn = $_SESSION['admin_ind'];
                                      if ($admin_yn == 1) {
                                        echo "#";
                                      } else {
                                        echo "add-mod.php";
                                      }
                                      ?>">Add </a>

    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Updates</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="<?php
                                      $admin_yn = $_SESSION['admin_ind'];
                                      if ($admin_yn == 1) {
                                        echo "manage-updates-admin.php";
                                      } else {
                                        echo "manage-updates.php";
                                      }
                                      ?>">Manage </a>
      <a class="dropdown-item" href="<?php
                                      $admin_yn = $_SESSION['admin_ind'];
                                      if ($admin_yn == 1) {
                                        echo "#";
                                      } else {
                                        echo "add-updates.php";
                                      }
                                      ?>">Add </a>
    </div>
    <div align=center>
      <img src="../img/logo.png" height=75 width=75>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a class="nav-link" href="search-mod.php">
      <i class="fas fa-fw fa-search"></i>
      <span>Search </span>
    </a>

  </li>
</ul>