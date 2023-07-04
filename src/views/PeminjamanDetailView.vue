<template>
 <div class="row">
   <div class="col-lg-4 col-md-6" v-if="peminjaman">
     <div class="m-5 border border-radius p-5">
       <div class="card mb-3">
         <div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Status: {{ peminjaman.status_peminjaman }}</li>
             <li class="list-group-item">Nama Anggota: {{ peminjaman.nomor_anggota}}</li>
             <li class="list-group-item">Tanggal Peminjaman: {{ peminjaman.tanggal_peminjaman }}</li>
           </ul>
         </div>
       </div>
       <div class="card mb-3">
         <div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Tanggal Pengembalian: {{ peminjaman.tanggal_pengembalian }}</li>
             <li class="list-group-item">Durasi Keterlambatan: {{ peminjaman.durasi_keterlambatan }}</li>
             <li class="list-group-item">

             </li>

           </ul>
         </div>
       </div>
     </div>
   </div>
   <div class="col-lg-4 col-md-6" v-if="detail">
     <div class="m-5 border border-radius p-5">
       <div class="card mb-3">
         <div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item"><strong>Daftar Buku Yang Dipinjam</strong></li>
             <li v-for="a in detail" class="list-group-item">{{ a.judul }}</li>


           </ul>
         </div>
       </div>

     </div>
   </div>
 </div>
  <router-link class="button button-back" :to="`/peminjaman`">Kembali</router-link>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';

export default {
  data() {
    return {
      peminjaman: ref ([]),
      detail: ref ([]),

    };
  },
  mounted() {
    this.getPeminjamanDetail(this.$route.params.id);
    this.getPeminjaman(this.$route.params.id);

  },
  methods: {
    getPeminjamanDetail(id) {
      axios
          .get('http://mhdrmaulana.my.id/library/select_peminjaman_detail.php?id='+id)
          .then(response => {
            this.detail = response.data;
          })
          .catch(error => {
            console.log(error);
          });
    },
    getPeminjaman(id) {
      axios
          .get('http://mhdrmaulana.my.id/library/select_peminjaman_master_id.php?id='+id)
          .then(response => {
            this.peminjaman = response.data.data;
          })
          .catch(error => {
            console.log(error);
          });
    }
  }
};
</script>

<style scoped>

</style>
