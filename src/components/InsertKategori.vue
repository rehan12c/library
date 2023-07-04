<template>
  <div class="m-5 border border-radius p-5">
    <h1 class="mb-4">Tambah Kategori</h1>
    <input
        class="form-control"
        type="text"
        v-model="kode"
        placeholder="Kode"
        aria-label="default input example"
    />


    <br />
    <input
        class="form-control"
        type="text"
        v-model="kategori"
        placeholder="Kategori"
        aria-label="default input example"
    /><br />

    <div class="mt-5">
      <router-link to="/kategori" class="btn btn-secondary me-5">Back</router-link>
      <button type="button" class="btn btn-primary" v-on:click="insertKategori()">Tambah Kategori</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';

const urlInsert = 'https://mhdrmaulana.my.id/library/insert_kategori.php';

export default {
  data() {
    return {
      kode: '',
      kategori: '',
      // kode_kategori: [],

    };
  }, mounted() {
    // this.getKategoriBuku();
  },


  methods: {

    insertKategori() {
      let formData = new FormData();

      formData.append('kode', this.kode);
      formData.append('kategori', this.kategori);

      axios
          .post(urlInsert, formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          })
          .then((resp) => {
            console.log(resp.data);
            this.$router.push('/kategori');
            // Tambahkan pengarahan ke halaman dashboard atau halaman lain yang sesuai
          })
          .catch((err) => {
            console.log(err);
          });
    },
  },
};
</script>
