<template>
  <form  @submit.prevent="editAnggota">
    <div className="m-5 border border-radius p-5">
      <h1 className="mb-4">Edit Anggota</h1>
      <input
          className="form-control"
          type="text"
          v-model="anggota.nama"
          placeholder="Kode Kategori"
          aria-label="default input example"
      /><br/>
      <select class="form-control" v-model="anggota.jenis_kelamin">
        <option value="">Pilih jenis kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
      <br />
      <input
          className="form-control"
          type="text"
          v-model="anggota.alamat"
          placeholder="Pengarang Buku"
          aria-label="default input example"
      /><br/>
      <input
          className="form-control"
          type="text"
          v-model="anggota.no_hp"
          placeholder="Penerbit Buku"
          aria-label="default input example"
      /><br/>
      <input
          className="form-control"
          type="text"
          v-model="anggota.tanggal_terdaftar"
          placeholder="Tahun Terbit"
          aria-label="default input example"
      /><br/>

      <button class="button button-upload" type="submit" >Simpan perubahan</button>
    </div>
  </form>


</template>

<script>
import axios from 'axios';
import {ref} from 'vue';
export default {
  data() {
    return {
      anggota: ref([])
    };
  },
  mounted() {
    this.getAnggota(this.$route.params.id);
  },
  methods: {
    getAnggota(id) {
      axios
          .get('https://mhdrmaulana.my.id/library/select_anggota_nomor.php?id='+id)
          .then(response => {
            this.anggota = response.data.data[0];
          })
          .catch(error => {
            console.log(error);
          });
    },
    editAnggota(){
      axios
          .post('https://mhdrmaulana.my.id/library/update_anggota.php',
              this.anggota, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }})
          .then(response => {
            console.log(response.data);
            this.$router.push('/anggota');
          })
          .catch(error => {
            console.log(error);
          });
    }
  }
}
</script>

<style scoped>

</style>