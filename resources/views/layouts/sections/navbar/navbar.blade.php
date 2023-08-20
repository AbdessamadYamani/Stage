@php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');

@endphp

<!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
<nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme" id="layout-navbar">
  @endif
  @if(isset($navbarDetached) && $navbarDetached == '')
  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="{{$containerNav}}">
      @endif

      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
      @if(isset($navbarFull))
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{url('/')}}" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            @include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])
          </span>
          <span class="app-brand-text demo menu-text fw-bolder">{{config('variables.templateName')}}</span>
        </a>
      </div>
      @endif

      <!-- ! Not required for layout-without-menu -->
      @if(!isset($navbarHideToggle))
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      @endif

      <!-- search.blade.php -->

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
    <!-- Search -->
    <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" id="searchInput" placeholder="Search..." aria-label="Search...">
        </div>
        <!-- Dropdown for search results -->
        <div id="searchResults" class="position-absolute top-100 start-0 mt-2 w-100 bg-white border rounded" style="display: none;"></div>
    </div>
    <!-- /Search -->
</div>

<!-- Add the provided script here -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', async function() {
            const searchTerm = searchInput.value.trim();

            if (searchTerm === '') {
                searchResults.style.display = 'none';
                searchResults.innerHTML = '';
                return;
            }

            try {
                // Use the current view context to determine the appropriate search route
                const currentView = window.location.pathname.split('/').pop();
                const searchRoute = `/search/${currentView}?q=${searchTerm}`;
                
                const response = await fetch(searchRoute);
                const data = await response.json();

                if (data.results.length > 0) {
                    const resultItems = data.results.map(result => `<div class="search-result">${result.name}</div>`).join('');
                    searchResults.innerHTML = resultItems;
                    searchResults.style.display = 'block';
                } else {
                    searchResults.style.display = 'none';
                    searchResults.innerHTML = '';
                }
            } catch (error) {
                console.error('Error fetching search results:', error);
            }
        });
    });
</script>



      @if(!isset($navbarDetached))
    </div>
    @endif
  </nav>
  <!-- / Navbar -->
