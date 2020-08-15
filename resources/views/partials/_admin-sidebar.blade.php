<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- Optionally, you can add icons to the links -->
      <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">

        <a href="#"><i class="fa fa-edit"></i> <span>Profil</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/visi-misi') }}">Visi dan Misi</a></li>
          <li><a href="{{ url('/admin/structure-organization') }}">Struktur Organisasi</a></li>
        </ul>
      </li>
      <li class="treeview">

        <a href="#"><i class="fa fa-file"></i> <span>Berita</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/news') }}">List Berita</a></li>
          <li><a href="{{ url('/admin/news/create') }}">Tulis Berita</a></li>
        </ul>
      </li>
      <li class="treeview">

        <a href="#"><i class="fa fa-briefcase"></i> <span>Program Kerja</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/work-program') }}">List Proker</a></li>
          <li><a href="{{ url('/admin/cooperation') }}">List Kerja Sama</a></li>
        </ul>
      </li>
      <li class="treeview">

        <a href="#"><i class="fa fa-cogs"></i> <span>Layanan</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/services') }}">List Layanan</a></li>
          <li><a href="{{ url('/admin/services/create') }}">Tambah Layanan</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-photo"></i> <span>Galeri</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/gallery') }}">List Photo</a></li>
          <li><a href="{{ url('/admin/gallery/create?type=image') }}">Tambah Photo</a></li>
          <li><a href="{{ url('/admin/gallery/create?type=video') }}">Tambah Video</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-home"></i> <span>Beranda</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/welcome') }}">Ucapan Selamat Datang</a></li>
          <li><a href="{{ url('/admin/overview') }}">Selayang Pandang Organisasi</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>Administrator</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/admin/users') }}">Lihat Admin</a></li>
          <li><a href="{{ url('/admin/users/create') }}">Tambah Admin</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>