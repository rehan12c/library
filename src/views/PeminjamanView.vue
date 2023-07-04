<template>
  <div>
    <h1 class="card-header">Status Peminjaman</h1>

    <div class="container">

      <div class="row">
        <div>
          <router-link class="button button-add" :to="`/peminjaman-master/`">Tambah Peminjaman Buku</router-link>
        </div>
        <div class="col-12">
          <select class="form-control" @change="getPeminjamanList" v-model="status">
            <option value="DIPINJAM">DIPINJAM</option>
            <option value="DIKEMBALIKAN">DIKEMBALIKAN</option>


          </select>
        </div>
      </div>
    </div>
    <div class="row mt-5 justify-content-center">
      <div class="col-lg-4 col-md-6" v-for="(data, index) in peminjaman" :key="data.id">
        <div class="card mb-3">
          <div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Status: {{ data.status_peminjaman }}</li>
              <li class="list-group-item">Nama Anggota: {{ data.nomor_anggota}}</li>
              <li class="list-group-item">Tanggal Peminjaman: {{ data.tanggal_peminjaman }}</li>
            </ul>
          </div>
        </div>
        <div class="card mb-3">
        <div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Tanggal Pengembalian: {{ data.tanggal_pengembalian }}</li>
            <li class="list-group-item">Durasi Keterlambatan: {{ data.durasi_keterlambatan }}</li>
            <li class="list-group-item">
              <router-link class="button-edit" :to="`/detail-pinjaman/`+data.id">Detail</router-link>

            </li>

          </ul>
        </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import axios from 'axios';
import {ref} from 'vue';

export default {
  data() {
    return {
      peminjaman: ref([]),
      status: ref('DIPINJAM'),
    };
  },
  mounted() {
    this.getPeminjamanList();
  },
  methods: {
    getPeminjamanList() {
      axios
          .get('http://mhdrmaulana.my.id/library/daftar_peminjaman_buku.php?status='+this.status)
          .then(response => {
            this.peminjaman = response.data;
          })
          .catch(error => {
            console.log(error);
          });
    }
  }
}
</script>

<style scoped>
.card-header{
  text-align: center;
  margin-bottom: 50px;
  margin-top: 50px;
  text-align: center;
}

.button-add {
  align-items: center;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: transparent 0 0 0 3px, rgba(18, 18, 18, .1) 0 6px 20px;
  box-sizing: border-box;
  color: #121212;
  cursor: pointer;
  display: inline-flex;
  flex: 1 1 auto;
  font-family: Inter, sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  justify-content: center;
  line-height: 1;
  margin: 0;
  outline: none;
  padding: 1rem 1.2rem;
  text-align: center;
  text-decoration: none;
  transition: box-shadow .2s, -webkit-box-shadow .2s;
  white-space: nowrap;
  border: 0;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  float: right;
  margin-bottom: 20px;
}

.button-add:hover {
  box-shadow: #121212 0 0 0 3px, transparent 0 0 0 0;
}
</style>