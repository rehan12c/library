<template>
  <div className="m-5 border border-radius p-5">
    <h1 className="mb-4">Tambah Buku</h1>
    <input
        className="form-control"
        type="text"
        v-model="kode"
        placeholder="Kode Buku"
        aria-label="default input example"
    /><br/>
        <select class="form-control" v-model="kode_kategori">
          <option v-for="a in kategori" :value="a.kode">{{a.kategori}}</option>
        </select>
<!--    <input-->
<!--        className="form-control"-->
<!--        type="text"-->
<!--        v-model="kode_kategori"-->
<!--        placeholder="Kode Kategori"-->
<!--        aria-label="default input example"-->
<!--    /> -->
<br/>
    <input
        className="form-control"
        type="text"
        v-model="judul"
        placeholder="Judul Buku"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="pengarang"
        placeholder="Pengarang Buku"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="penerbit"
        placeholder="Penerbit Buku"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="tahun"
        placeholder="Tahun Terbit"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="harga"
        placeholder="Harga Buku"
        aria-label="default input example"
    /><br/>
    <div className="mb-3">
      <input className="form-control" type="file" ref="file_cover"/>
      <img :src="file_cover" alt="cover" style="width: 120px; margin-top: 10px"/>
    </div>

    <div className="mt-5">
      <router-link to="/buku" className="btn btn-secondary me-5">Back</router-link>
      <button type="button" className="btn btn-primary" v-on:click="insertBuku()">Tambah Buku</button>
    </div>
  </div>
</template>

<script>
import {RouterLink} from 'vue-router';
import axios from 'axios';
import {ref} from 'vue';

const urlInsert = 'https://mhdrmaulana.my.id/library/insert_buku.php';

export default {
  data() {
    return {
      kategori:[],
      kode: '',
      kode_kategori: '',
      judul: '',
      pengarang: '',
      penerbit: '',
      tahun: '',
      harga: '',
      file_cover: '',
    };
  },
  mounted() {
    this.getKategori();
  },
  methods: {
    getKategori(){
      axios
          .get('https://mhdrmaulana.my.id/library/select_kategori.php')
          .then(response => {
            this.kategori = response.data;
          })
          .catch(error => {
            console.log(error);
          });
    },
    insertBuku() {
      this.file_cover = this.$refs.file_cover.files[0];
      let formData = new FormData();

      formData.append('kode', this.kode);
      formData.append('kode_kategori', this.kode_kategori);
      formData.append('judul', this.judul);
      formData.append('pengarang', this.pengarang);
      formData.append('penerbit', this.penerbit);
      formData.append('tahun', this.tahun);
      formData.append('harga', this.harga);
      formData.append('file_cover', this.file_cover);

      axios
          .post(urlInsert, formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          })
          .then((resp) => {
            console.log(resp.data);
            this.$router.push('/buku');
            // Tambahkan pengarahan ke halaman dashboard atau halaman lain yang sesuai
          })
          .catch((err) => {
            console.log(err);
          });
    },
  },
};
</script>
