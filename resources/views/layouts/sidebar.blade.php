<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="background-color: #D3D8DF !important;">
  <div class="position-sticky pt-4">

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
          <span class="m-2"><i class="bi bi-calculator"></i> Calculate</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('criteria') ? 'active' : '' }}" aria-current="page" href="/criteria">
          <span class="m-2"><i class="bi bi-app-indicator"></i> Assessment Criteria</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('alternative') ? 'active' : '' }}" aria-current="page" href="/alternative">
          <span class="m-2"><i class="bi bi-person-lines-fill"></i> Alternative Data</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" aria-current="page" href="/profile">
          <span class="m-2"><i class="bi bi-people-fill"></i> Group Profile</span>
        </a>
      </li>
    </ul>

  </div>
</nav>
