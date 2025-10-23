<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import api from '../../api/index'

const router = useRouter()

const id = ref('')
const nim = ref('')
const ttl = ref('')
const gender = ref('')
const alamat = ref('')
const errors = ref([])

const storeMhsData = async () => {
  const formMhsData = new FormData()

  formMhsData.append('id', id.value)
  formMhsData.append('nim', nim.value)
  formMhsData.append('ttl', ttl.value)
  formMhsData.append('gender', gender.value)
  formMhsData.append('alamat', alamat.value)

  try {
    await api.post('/api/mahasiswa', formMhsData)
    router.push({ path: '/mahasiswa' })
  } catch (error) {
    errors.value = error.response.data
  }
}
</script>

<template>
  <div class="container mx-auto px-4 py-8">
    <form
      @submit.prevent="storeMhsData()"
      class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6"
    >
      <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Tambah Mahasiswa</h2>

      <div class="mb-4">
        <label for="id" class="block text-gray-700 font-medium mb-2">ID</label>
        <input
          v-model="id"
          type="text"
          id="id"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan ID"
        />
        <!-- <div
          v-if="errors.id"
          class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-2 animate-pulse"
        >
          <span class="block sm:inline font-semibold">{{ errors.id[0] }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
            <svg
              class="fill-current h-6 w-6 text-red-500"
              role="button"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <title>Error</title>
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
              />
            </svg>
          </span>
        </div> -->
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
        <!-- <div
          v-if="errors.nim"
          class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-2 animate-pulse"
        >
          <span class="block sm:inline font-semibold">{{ errors.nim[0] }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
            <svg
              class="fill-current h-6 w-6 text-red-500"
              role="button"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <title>Error</title>
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
              />
            </svg>
          </span>
        </div> -->
      </div>

      <div class="mb-4">
        <label for="ttl" class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
        <input
          v-model="ttl"
          type="date"
          id="ttl"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <!-- <div
          v-if="errors.ttl"
          class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-2 animate-pulse"
        >
          <span class="block sm:inline font-semibold">{{ errors.ttl[0] }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
            <svg
              class="fill-current h-6 w-6 text-red-500"
              role="button"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <title>Error</title>
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
              />
            </svg>
          </span>
        </div> -->
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
        <!-- <div
          v-if="errors.gender"
          class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-2 animate-pulse"
        >
          <span class="block sm:inline font-semibold">{{ errors.gender[0] }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
            <svg
              class="fill-current h-6 w-6 text-red-500"
              role="button"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <title>Error</title>
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
              />
            </svg>
          </span>
        </div> -->
      </div>

      <div class="mb-4">
        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
        <textarea
          v-model="alamat"
          id="alamat"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan Alamat"
        ></textarea>
        <!-- <div
          v-if="errors.alamat"
          class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mt-2 animate-pulse"
        >
          <span class="block sm:inline font-semibold">{{ errors.alamat[0] }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
            <svg
              class="fill-current h-6 w-6 text-red-500"
              role="button"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <title>Error</title>
              <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
              />
            </svg>
          </span>
        </div> -->
      </div>

      <!-- <div v-if="Object.keys(errors).length" class="mb-4 text-red-600">
        <p v-for="(errorList, field) in errors" :key="field">
          {{ errorList[0] }}
        </p>
      </div> -->

      <button
        type="submit"
        class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300"
      >
        Tambah Mahasiswa
      </button>
    </form>
  </div>
</template>
