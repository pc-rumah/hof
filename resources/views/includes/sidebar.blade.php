<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            @if (Auth::user()->hasRole('admin'))
                <a class="nav-link {{ Request::is('admin') ? '' : 'collapsed' }}" href="/admin">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            @else
                <a class="nav-link {{ Request::is('pengguna') ? '' : 'collapsed' }}" href="/pengguna">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            @endif
        </li><!-- End Dashboard Nav -->

        @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('muser*') ? '' : 'collapsed' }}" href="{{ route('muser.index') }}">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li><!-- End User Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('mfile*') ? '' : 'collapsed' }}" href="{{ route('mfile.index') }}">
                    <i class="bi bi-archive"></i>
                    <span>File</span>
                </a>
            </li><!-- End File Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('mfoto*') ? '' : 'collapsed' }}" href="{{ route('mfoto.index') }}">
                    <i class="bi bi-image"></i>
                    <span>Foto</span>
                </a>
            </li><!-- End Foto Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('mvidio*') ? '' : 'collapsed' }}" href="{{ route('mvidio.index') }}">
                    <i class="bi bi-file-earmark-play"></i>
                    <span>Vidio</span>
                </a>
            </li><!-- End Vidio Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Request::is('kategori*') ? '' : 'collapsed' }}"
                    href="{{ route('tambahkategori.index') }}">
                    <i class="bi bi-bookmarks"></i>
                    <span>Kategori</span>
                </a>
            </li><!-- End Vidio Page Nav -->

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('editabout*') ? '' : 'collapsed' }}"
                    href="{{ route('editabout.index') }}">
                    <i class="bi bi-file-person-fill"></i>
                    <span>About</span>
                </a>
            </li><!-- End Profile Page Nav -->

            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('pages-faq*') ? '' : 'collapsed' }}" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>F.A.Q</span>
                </a>
            </li><!-- End F.A.Q Page Nav --> --}}

            <li class="nav-item">
                <a class="nav-link {{ Request::is('editkontak*') ? '' : 'collapsed' }}"
                    href="{{ route('editkontak.index') }}">
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
