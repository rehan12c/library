<template>
  <div class="m-5 border border-radius p-5">
    <h1 class="mb-4">Tambah Peminjaman</h1>
    <input
        class="form-control"
        type="text"
        v-model="nomor_anggota"
        placeholder="Nomor Anggota"
        aria-label="default input example"
    /><br />
    <br />
    <select class="form-control" v-model="status_peminjaman">
      <option value="">Pilih Status</option>
      <option value="DIPINJAM">DIPINJAM</option>
      <option value="DIKEMBALIKAN">DIKEMBALIKAN</option>
    </select>
    <br />
    <input
        class="form-control"
        type="text"
    v-model="tanggal_pengembalian"
    placeholder="Tanggal Pengembalian"
    aria-label="default input example"/>
    <br/>
    <input
        class="form-control"
        type="text"
        v-model="durasi_keterlambatan"
        placeholder="Durasi Keterlambatan"
        aria-label="default input example"
    /><br />
    <div class="mt-5">
      <router-link to="/peminjaman" class="btn btn-secondary me-5">Back</router-link>
      <button type="button" class="btn btn-primary" v-on:click="insertPeminjaman()">Tambah Anggota</button>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import axios from 'axios';
import { ref } from 'vue';

const urlInsert = 'https://mhdrmaulana.my.id/library/select_peminjaman_master.php';

export default {
  data() {
    return {
      nomor_anggota: '',
      status_peminjaman: '',
      tanggal_pengembalian: '',
      durasi_keterlambatan: '',
    };
  },

  methods: {
    insertPeminjaman() {
      let formData = new FormData();

      formData.append('nomor_anggota', this.nomor_anggota);
      formData.append('status_peminjaman', this.status_peminjaman);
      formData.append('tanggal_pengembalian', this.tanggal_pengembalian);
      formData.append('durasi_keterlambatan', this.durasi_keterlambatan);

      axios
          .post(urlInsert, formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          })
          .then((resp) => {
            console.log(resp.data);
            this.$router.push('/peminjaman');
            // Tambahkan pengarahan ke halaman dashboard atau halaman lain yang sesuai
          })
          .catch((err) => {
            console.log(err);
          });
    },
  },
};
</script>
