<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Bhakti<span> Laksa</span>
        </a>
        <div class="sidebar-toggler">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav" id="sidebarNav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="<?=base_url('dashboard')?>" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('penilaian')?>" class="nav-link">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="link-title">Penilaian</span>
                </a>
            </li>
            <li class="nav-item nav-category">Master Data</li>
            <li class="nav-item">
            <a href="<?=base_url('program-studi')?>" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Program Studi</span>
                </a>
            </li>
            <li class="nav-item">
            <a href="<?=base_url('dosen')?>" class="nav-link">
                    <i class="link-icon" data-feather="slack"></i>
                    <span class="link-title">Dosen</span>
                </a>
            </li>
            <li class="nav-item">
            <a href="<?=base_url('mahasiswa')?>" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Mahasiswa</span>
                </a>
            </li>
            <li class="nav-item">
            <a href="<?=base_url('mata-kuliah')?>" class="nav-link">
                    <i class="link-icon" data-feather="bookmark"></i>
                    <span class="link-title">Mata Kuliah</span>
                </a>
            </li>
            <li class="nav-item nav-category">Personal</li>
            <li class="nav-item">
            <a href="<?=base_url('profile')?>" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Profile</span>
                </a>
            </li>
            <li class="nav-item">
            <a href="<?=base_url('logout')?>" class="nav-link">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>