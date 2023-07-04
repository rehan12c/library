<template>
  <div>
    <h1 class="ListBuku">
      List Buku
    </h1>
   <div class="container">
     <div class="row">
       <div class="col-12">
         <form class="d-flex" role="search">
           <input class="form-control me-2" v-model="q" type="search" placeholder="Search" aria-label="Search">
           <button type="button" @click="cariBuku" class="btn btn-light me-3">Pencarian</button>
           <router-link class="button button-add" :to="`/insert-buku/`">Tambah Buku</router-link>
         </form>
       </div>
     </div>
   </div>
    <div>

    </div>
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6" v-for="(data, index) in buku" :key="data.id">
        <div class="card mb-3">
          <div class="card-body">
            <img :src="data.file_cover" alt="File Cover"
                 class="img-fluid" style="width: 150px">
            <h5 class="card-title">{{ data.judul }}</h5>
            <p class="card-text">Diupload tanggal: {{ data.tanggal_input }}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Pengarang: {{ data.pengarang }}</li>
            <li class="list-group-item">Kategori: {{ data.kode_kategori }}</li>
            <li class="list-group-item">Penerbit: {{ data.penerbit }}</li>
            <li class="list-group-item">Harga: {{ data.harga }}</li>
          </ul>
          <div class="card-body">
            <router-link class="button-edit" :to="`/edit-buku/`+data.id">Edit</router-link>
            <button class="button button-delete" role="button" @click="hapusBuku(data.id)">Delete</button>
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
      buku: ref([]),
      q: ref(""),
    };
  },
  mounted() {
    this.getBukuList();
  },
  methods: {
    cariBuku(){
      axios
          .get('http://mhdrmaulana.my.id/library/select_buku.php?q='+this.q)
          .then(response => {
            this.buku = response.data;
          })
          .catch(error => {
            console.log(error);
          });
    },
    getBukuList() {
      axios
          .get('http://mhdrmaulana.my.id/library/select_buku.php')
          .then(response => {
            this.buku = response.data;
          })
          .catch(error => {
            console.log(error);
          });
    },
    hapusBuku(id) {
      axios
          .delete(`http://mhdrmaulana.my.id/library/delete_buku.php?id=${id}`)
          .then(response => {
            console.log(response.data);
            this.getBukuList();
          })
          .catch(error => {
            console.log(error);
          });
    },
  }
};
</script>

<style>

.ListBuku{
   margin-bottom: 50px;
   margin-top: 50px;
   text-align: center;
 }
.justify-content-center {
  margin-top: 50px;
  margin-bottom: 50px;
  margin-left: 50px;
  margin-right: 50px;
}

.button-edit {
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
  float: left; /* Menambahkan float left */
}

.button-edit:hover {
  box-shadow: #121212 0 0 0 3px, transparent 0 0 0 0;
}

.button-delete {
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
  float: right; /* Menambahkan float right */
}

.button-delete:hover {
  box-shadow: #121212 0 0 0 3px, transparent 0 0 0 0;
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
  float: right; /* Menambahkan float right */
}

.button-add:hover {
  box-shadow: #121212 0 0 0 3px, transparent 0 0 0 0;
}

</style>
