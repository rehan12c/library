<script setup>
import {RouterLink, RouterView} from 'vue-router'

</script>

<template>
  <header>
    <ul class="nav-links">
      <li><a href="/Home">Home</a></li>
      <li class="center"><a href="/buku">Buku</a></li>
      <li class="upward"><a href="/kategori">Kategori</a></li>
      <li class="forward"><a href="/anggota">Anggota</a></li>
      <li class="center"><a href="/peminjaman">Peminjaman</a></li>

    </ul>

  </header>
  <RouterView/>
</template>

<style scoped>
@import 'components/font/font-navbar.css';

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.nav-links {
  display: flex;
  align-items: center;
  background: #fff;
  padding: 20px 15px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.nav-links li {
  list-style: none;
  margin: 0 12px;
}

.nav-links li a {
  position: relative;
  color: #333;
  font-size: 20px;
  font-weight: 500;
  padding: 6px 0;
  text-decoration: none;
}

.nav-links li a:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3px;
  width: 0%;
  background: #34efdf;
  border-radius: 12px;
  transition: all 0.4s ease;
}

.nav-links form {
  list-style: none;
  margin: 0 12px;
}

.nav-links form button {
  position: relative;
  color: #333;
  font-size: 15px;
  font-weight: 500;
  padding: 6px 0;
  text-decoration: none;
}

.nav-links form button:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3px;
  width: 0%;
  background: #34efdf;
  border-radius: 12px;
  transition: all 0.4s ease;
}

.nav-links li a:hover:before {
  width: 100%;
}

.nav-links li.center a:before {
  left: 50%;
  transform: translateX(-50%);
}

.nav-links li.upward a:before {
  width: 100%;
  bottom: -5px;
  opacity: 0;
}

.nav-links li.upward a:hover:before {
  bottom: 0px;
  opacity: 1;
}

.nav-links li.forward a:before {
  width: 100%;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.4s ease;
}

.nav-links li.forward a:hover:before {
  transform: scaleX(1);
  transform-origin: left;
}

.nav-links form.d-flex button:before {
  width: 100%;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.4s ease;
}

.nav-links form.d-flex button:hover:before {
  transform: scaleX(1);
  transform-origin: left;
}
</style>
