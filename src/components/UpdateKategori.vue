<template>
  <form  @submit.prevent="editAnggota">
    <div className="m-5 border border-radius p-5">
      <h1 className="mb-4">Edit Kategori</h1>
      <input
          className="form-control"
          type="text"
          v-model="category.kode"
          placeholder="Kategori"
          aria-label="default input example"
      /><br/>
      <input
          className="form-control"
          type="text"
          v-model="category.kategori"
          placeholder="kategori"
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
      category: ref([])
    };
  },
  mounted() {
    this.getKategori(this.$route.params.id);
  },
  methods: {
    getKategori(id) {
      axios
          .get('https://mhdrmaulana.my.id/library/select_kategori_kode.php?id='+id)
          .then(response => {
            this.category = response.data.data[0];
          })
          .catch(error => {
            console.log(error);
          });
    },
    editAnggota(){
      axios
          .post('https://mhdrmaulana.my.id/library/update_kategori.php',
              this.category, {
                headers: {
                  'Content-Type': 'multipart/form-data'
                }})
          .then(response => {
            console.log(response.data);
            this.$router.push('/kategori');
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