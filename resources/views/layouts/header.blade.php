<style>
    .modal-content {
        background-color: #2c3e50;
        color: white;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .modal-content button {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .modal-content #confirmLogout {
        background-color: #3498db;
        color: white;
    }

    .modal-content #cancelLogout {
        background-color: #e74c3c;
        color: white;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>

<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
    data-class="c-sidebar-show">
    <i class="bi bi-list" style="font-size: 2rem;"></i>
</button>

<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
    data-class="c-sidebar-lg-show" responsive="true">
    <i class="bi bi-list" style="font-size: 2rem;"></i>
</button>

<ul class="c-header-nav ml-auto">

</ul>
<ul class="c-header-nav ml-auto mr-4">
    @can('show_notifications')
        <li class="c-header-nav-item dropdown d-md-down-none mr-2">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="bi bi-bell" style="font-size: 20px;"></i>
                <span class="badge badge-pill badge-danger">
                    3
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                <div class="dropdown-header bg-light">
                    <strong> Notifikasi</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="bi bi-hash mr-1 text-primary"></i> Product: "Laptop" is low in quantity!
                </a>
                <a class="dropdown-item" href="#">
                    <i class="bi bi-hash mr-1 text-primary"></i> Product: "Mouse" is low in quantity!
                </a>
                <a class="dropdown-item" href="#">
                    <i class="bi bi-hash mr-1 text-primary"></i> Product: "TV" is low in quantity!
                </a>
            </div>
        </li>
    @endcan

    <li class="c-header-nav-item dropdown">
        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">
            <div class="c-avatar mr-2">
                <img class="c-avatar rounded-circle" src="{{ asset('images/adminrpl.jpg') }}" alt="Profile Image">
            </div>
            <div class="d-flex flex-column">
                <span class="font-weight-bold">Admin</span>
                <span class="font-italic">Aktif <i class="bi bi-circle-fill text-success"
                        style="font-size: 11px;"></i></span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
            <div class="dropdown-header bg-light py-2"><strong>Akun</strong></div>
            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                <i class="mfe-2  bi bi-person" style="font-size: 1.2rem;"></i> Profil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" id="logoutButton">
                <i class="mfe-2  bi bi-box-arrow-left" style="font-size: 1.2rem;"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <div id="logoutModal"
            style="display:none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
            <div class="modal-content"
                style="background-color: #2c3e50; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; max-width: 350px; text-align: center; border-radius: 10px;">
                <span class="close" id="closeModal"
                    style="color: white; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
                <p style="color: white;">Yakin ingin logout?</p>
                <div style="display: flex; justify-content: center;">
                    <button id="confirmLogout"
                        style="background-color: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin: 10px; min-width: 110px;">Ya</button>
                    <button id="cancelLogout"
                        style="background-color: #e74c3c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin: 10px; min-width: 110px;">Tidak</button>
                </div>
            </div>
        </div>
    </li>
</ul>

<script>
    document.getElementById('logoutButton').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logoutModal').style.display = 'block';
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('logoutModal').style.display = 'none';
    });

    document.getElementById('cancelLogout').addEventListener('click', function() {
        document.getElementById('logoutModal').style.display = 'none';
    });

    document.getElementById('confirmLogout').addEventListener('click', function() {
        document.getElementById('logout-form').submit();
    });
</script>
