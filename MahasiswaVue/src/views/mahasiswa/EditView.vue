<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import api from '../../api/index'

const router = useRouter()
const route = useRoute()

const id = ref('')
const nim = ref('')
const ttl = ref('')
const gender = ref('')
const alamat = ref('')
const errors = ref([])

const fetchMhsData = async () => {
  try {
    const response = await api.get(`/api/mahasiswa/${route.params.id}`)
    const mahasiswa = response.data.data

    id.value = mahasiswa.id
    nim.value = mahasiswa.nim
    ttl.value = mahasiswa.ttl
    gender.value = mahasiswa.gender
    alamat.value = mahasiswa.alamat
  } catch (error) {
    console.error('Error fetching mahasiswa data:', error)
  }
}

onMounted(() => {
  fetchMhsData()
})

const updateMhsData = async () => {
  const formMhsData = new FormData()

  formMhsData.append('id', id.value)
  formMhsData.append('nim', nim.value)
  formMhsData.append('ttl', ttl.value)
  formMhsData.append('gender', gender.value)
  formMhsData.append('alamat', alamat.value)

  try {
    await api.put(`/api/mahasiswa/${route.params.id}`, formMhsData)
    router.push({ path: '/mahasiswa' })
  } catch (error) {
    errors.value = error.response.data
  }
}
</script>

<template>
  <div class="container mx-auto px-4 py-8">
    <form
      @submit.prevent="updateMhsData()"
      class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6"
    >
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Mahasiswa</h2>

      <div class="mb-4">
        <label for="id" class="block text-gray-700 font-medium mb-2">ID</label>
        <input
          v-model="id"
          type="text"
          id="id"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan ID"
        />
      </div>

      <div class="mb-4">
        <label for="nim" class="block text-gray-700 font-medium mb-2">NIM</label>
        <input
          v-model="nim"
          type="text"
          id="nim"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan NIM"
        />
      </div>

      <div class="mb-4">
        <label for="ttl" class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
        <input
          v-model="ttl"
          type="date"
          id="ttl"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div class="mb-4">
        <label for="gender" class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
        <select
          v-model="gender"
          id="gender"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
        <textarea
          v-model="alamat"
          id="alamat"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan Alamat"
        ></textarea>
      </div>

      <button
        type="submit"
        class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300"
      >
        Update Mahasiswa
      </button>
    </form>
  </div>
</template>
