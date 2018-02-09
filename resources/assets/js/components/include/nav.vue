<template>
<nav class="navbar is-fixed-top has-shadow is-black" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item">
          System name
        </a>

      <div class="navbar-burger" data-target="navMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="navbar-menu" id="navMenu">
      <div class="navbar-end">
        @guest
        <a href="{{ route('login') }}" class="navbar-item">
             Login
           </a>
        <a href="{{ route('register') }}" class="navbar-item">
             Register
           </a> @else
        <div class="navbar-item has-dropdown is-hoverable">
          <a href="" class="navbar-link">
                {{ Auth::user()->name }}
              </a>

          <div class="navbar-dropdown">
            <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </div>
        @endguest
      </div>
    </div>
  </div>
</nav>
</template>

<script>
export default {

}
</script>

<style>

</style>
