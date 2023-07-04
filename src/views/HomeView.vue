<template>
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6" v-for="(data, index) in buku" :key="data.id">
      <div class="card mb-3">
        <div class="card">
          <img :src="data.file_cover" alt="File Cover" class="img">
          <div class="card-body">
            <h5 class="card-title">{{ data.judul }}</h5>
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
      buku: ref([])
    };
  },
  mounted() {
    this.getBukuList();
  },
  methods: {
    getBukuList() {
      axios
          .get('http://mhdrmaulana.my.id/library/select_buku.php')
          .then(response => {
            this.buku = response.data;
          })
          .catch(error => {
            console.log(error);
          });
    }
  }
};
</script>

<style>
.justify-content-center {
  margin-top: 50px;
  margin-bottom: 50px;
  margin-left: 50px;
  margin-right: 50px;
}

.img{
  width: auto;
  height: 400px;
}

</style>
