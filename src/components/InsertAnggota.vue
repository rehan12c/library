<template>
  <div class="m-5 border border-radius p-5">
    <h1 class="mb-4">Tambah Anggota</h1>
    <input
        class="form-control"
        type="text"
        v-model="nomor"
        placeholder="nomor"
        aria-label="default input example"
    /><br />
    <input
        class="form-control"
        type="text"
        v-model="nama"
        placeholder="Nama"
        aria-label="default input example"
    /><br />
    <select class="form-control" v-model="jenis_kelamin">
      <option value="">Pilih jenis kelamin</option>
      <option value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
    </select>
    <br />
    <input
        class="form-control"
        type="text"
        v-model="alamat"
        placeholder="Alamat"
        aria-label="default input example"
    /><br />
    <input
        class="form-control"
        type="text"
        v-model="no_hp"
        placeholder="Nomor Telepon"
        aria-label="default input example"
    /><br />

    <div class="mt-5">
      <router-link to="/anggota" class="btn btn-secondary me-5">Back</router-link>
      <button type="button" class="btn btn-primary" v-on:click="insertAnggota()">Tambah Anggota</button>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import axios from 'axios';
import { ref } from 'vue';

const urlInsert = 'https://mhdrmaulana.my.id/library/insert_anggota.php';

export default {
  data() {
    return {
      nomor: '',
      nama: '',
      jenis_kelamin: '',
      alamat: '',
      no_hp: '',
      tanggal_terdaftar: '',
    };
  },

  methods: {
    insertAnggota() {
      let formData = new FormData();

      formData.append('nomor', this.nomor);
      formData.append('nama', this.nama);
      formData.append('jenis_kelamin', this.jenis_kelamin); // Fix typo here
      formData.append('alamat', this.alamat);
      formData.append('no_hp', this.no_hp);
      formData.append('tanggal_terdaftar', this.tanggal_terdaftar);

      axios
          .post(urlInsert, formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          })
          .then((resp) => {
            console.log(resp.data);
            this.$router.push('/anggota');
            // Tambahkan pengarahan ke halaman dashboard atau halaman lain yang sesuai
          })
          .catch((err) => {
            console.log(err);
          });
    },
  },
};
</script>
