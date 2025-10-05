@include('layout.headerApp')
<!-- Main Content -->
@if (Auth::check() && (Auth::user()->role == '1' || Auth::user()->role == '2'))
    <div class="main-content shadow-lg" id="divMain">
        <section class="section">
            <div class="section-header">
                <h1 id="txtTitlePage"> Manajemen {{ $namaTahfiz }} - @{{ titleSection }}</h1>
            </div>

            <div id="divUtama"></div>
        </section>

    </div>
    </div>
@endif
@include('layout.footerApp')
