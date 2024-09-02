<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('pengguna') ? '' : 'collapsed' }}" href="/pengguna">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users-profile*') ? '' : 'collapsed' }}" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li><!-- End User Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('files*') ? '' : 'collapsed' }}" href="users-profile.html">
                    <i class="bi bi-archive"></i>
                    <span>File</span>
                </a>
            </li><!-- End File Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('fotos*') ? '' : 'collapsed' }}" href="users-profile.html">
                    <i class="bi bi-image"></i>
                    <span>Foto</span>
                </a>
            </li><!-- End Foto Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('vidios*') ? '' : 'collapsed' }}" href="users-profile.html">
                    <i class="bi bi-file-earmark-play"></i>
                    <span>Vidio</span>
                </a>
            </li><!-- End Vidio Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('kategori*') ? '' : 'collapsed' }}"
                    href="{{ route('kategori.index') }}">
                    <i class="bi bi-bookmarks"></i>
                    <span>Kategori</span>
                </a>
            </li><!-- End Vidio Page Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('users-profile*') ? '' : 'collapsed' }}" href="users-profile.html">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('pages-faq*') ? '' : 'collapsed' }}" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('pages-contact*') ? '' : 'collapsed' }}" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li><!-- End Contact Page Nav -->
        @else
            <li class="nav-item">
                <a class="nav-link {{ Request::is('tambahfoto*') ? '' : 'collapsed' }}"
                    href="{{ route('tambahfoto.index') }}">
                    <i class="bi bi-image"></i>
                    <span>Tambah Foto</span>
                </a>
            </li><!-- End Tambah Foto Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('tambahvidio*') ? '' : 'collapsed' }}"
                    href="{{ route('tambahvidio.index') }}">
                    <i class="bi bi-file-earmark-play"></i>
                    <span>Tambah Vidio</span>
                </a>
            </li><!-- End Tambah Vidio Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('tambahfile*') ? '' : 'collapsed' }}"
                    href="{{ route('tambahfile.index') }}">
                    <i class="bi bi-archive"></i>
                    <span>Tambah File</span>
                </a>
            </li><!-- End Tambah File Page Nav -->
        @endif
    </ul>
</aside><!-- End Sidebar-->
