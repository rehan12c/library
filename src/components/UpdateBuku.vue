<template>
  <form  @submit.prevent="editBuku">
  <div className="m-5 border border-radius p-5">
    <h1 className="mb-4">Tambah Buku</h1>
    <select class="form-control" v-model="buku.kode_kategori">
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
        v-model="buku.judul"
        placeholder="Judul Buku"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="buku.pengarang"
        placeholder="Pengarang Buku"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="buku.penerbit"
        placeholder="Penerbit Buku"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="buku.tahun"
        placeholder="Tahun Terbit"
        aria-label="default input example"
    /><br/>
    <input
        className="form-control"
        type="text"
        v-model="buku.harga"
        placeholder="Harga Buku"
        aria-label="default input example"
    /><br/>
    <div className="mb-3">
      <input className="form-control" type="file" ref="file_cover"/>
      <img :src="buku.file_cover" alt="cover" style="width: 120px; margin-top: 10px"/>
    </div>

    <div className="mt-5">
      <button class="button button-upload" type="submit" >Simpan Perubahan</button>
    </div>
  </div>
  </form>
</template>

<script>
import {RouterLink} from 'vue-router';
import axios from 'axios';
import {ref} from 'vue';

const urlUpdate = 'https://mhdrmaulana.my.id/library/update_buku.php?';

export default {
  data() {
    return {
      buku: ref([]),
      kategori:[],
    };
  },
  mounted() {
    this.getKategori();
    this.getBuku(this.$route.params.id);
  },
  methods: {
    getKategori(){
      axios
          .get('https://mhdrmaulana.my.id/library/select_kategori.php?')
          .then(response => {
            this.kategori = response.data;
          })
          .catch(error => {
            console.log(error);
          });
    },
    getBuku(id) {
      axios
          .get('https://mhdrmaulana.my.id/library/select_buku_kode.php?id='+id)
          .then(response => {
            this.buku = response.data.data[0];
          })
          .catch(error => {
            console.log(error);
          });
    },
    editBuku() {
      this.buku.file_cover = this.$refs.file_cover.files[0];
      let formData = new FormData();

      formData.append('kode', this.buku.kode);
      formData.append('kode_kategori', this.buku.kode_kategori);
      formData.append('judul', this.buku.judul);
      formData.append('pengarang', this.buku.pengarang);
      formData.append('penerbit', this.buku.penerbit);
      formData.append('tahun', this.buku.tahun);
      formData.append('harga', this.buku.harga);
      formData.append('file_cover',this.buku.file_cover);

      axios
          .post(urlUpdate, formData, {
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
