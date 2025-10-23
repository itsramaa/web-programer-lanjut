<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import api from '../../api/index'

const router = useRouter()

const nim = ref('')
const nama = ref('')
const ttl = ref('')
const gender = ref('')
const alamat = ref('')
const errors = ref([])

const storeMhsData = async () => {
  const mahasiswaData = {
    nim: nim.value,
    nama: nama.value,
    ttl: ttl.value,
    gender: gender.value,
    alamat: alamat.value
  }

  try {
    console.log('Creating mahasiswa data response:', await api.post('/api/mahasiswa', mahasiswaData))
    router.push({ path: '/mahasiswa' })
  } catch (error) {
    errors.value = error.response?.data || error
  }
}
</script>

<template>
  <div class="bg-black min-h-screen flex items-center justify-center px-4 py-8">
    <form
      @submit.prevent="storeMhsData()"
      class="w-full max-w-md bg-gradient-to-br from-green-600 to-black rounded-lg p-6 shadow-xl"
    >
      <h2 class="text-2xl font-bold mb-6 text-center text-white">Tambah Mahasiswa</h2>

      <div class="mb-4">
        <label for="nama" class="block text-white font-medium mb-2">Nama</label>
        <input
          v-model="nama"
          type="text"
          id="name"
          class="w-full px-3 py-2 bg-black text-white border border-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="Masukkan Nama"
        />
      </div>

      <div class="mb-4">
        <label for="nim" class="block text-white font-medium mb-2">NIM</label>
        <input
          v-model='nim'
          type="text"
          id="nim"
          class="w-full px-3 py-2 bg-black text-white border border-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="Masukkan NIM"
        />
      </div>

      <div class="mb-4">
        <label for="ttl" class="block text-white font-medium mb-2">Tanggal Lahir</label>
        <input
          v-model="ttl"
          type="date"
          id="ttl"
          class="w-full px-3 py-2 bg-black text-white border border-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

      <div class="mb-4">
        <label for="gender" class="block text-white font-medium mb-2">Jenis Kelamin</label>
        <select
          v-model="gender"
          id="gender"
          class="w-full px-3 py-2 bg-black text-white border border-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
        >
          <option value="" class="bg-black">Pilih Jenis Kelamin</option>
          <option value="Laki-laki" class="bg-black">Laki-laki</option>
          <option value="Perempuan" class="bg-black">Perempuan</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="alamat" class="block text-white font-medium mb-2">Alamat</label>
        <textarea
          v-model="alamat"
          id="alamat"
          class="w-full px-3 py-2 bg-black text-white border border-green-700 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="Masukkan Alamat"
        ></textarea>
      </div>

      <button
        type="submit"
        class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition duration-300"
      >
        Tambah Mahasiswa
      </button>
    </form>
  </div>
</template>
