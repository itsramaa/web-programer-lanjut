<script setup lang="ts">
// Import ref & onMounted
import { onMounted, ref } from 'vue'
import { toast, type ToastOptions } from 'vue3-toastify'

// Import Api Client
import api from '../../api/index'

// Define State
const listMhs = ref([])

// Method Fetch Data
const fetchDataMhs = async () => {
  await api.get('/api/mahasiswa').then((response) => {
    listMhs.value = response.data.data.data
  })
}

onMounted(() => {
  fetchDataMhs()
})

const deleteMhsData = async (id) => {
  await api.delete(`/api/mahasiswa/${id}`).then(() => {
    fetchDataMhs()
    toast("🎉 Mahasiswa Berhasil Dihapus!", {
      autoClose: 2000,
      type: toast.TYPE.SUCCESS,
      position: toast.POSITION.BOTTOM_RIGHT,
      theme: 'colored',
      icon: '✅'
    } as ToastOptions)
  }).catch((error) => {
    toast("Gagal menghapus mahasiswa", {
      autoClose: 1000,
      position: toast.POSITION.BOTTOM_RIGHT,
    } as ToastOptions)
  })
}


</script>
<template>
  <div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
      <table class="w-full">
        <thead class="bg-linear-to-r from-blue-500 to-purple-600 text-white">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">No</th>
            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">NIM</th>
            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nama</th>
            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">
              Prodi
            </th>
            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr
            v-for="(mahasiswa, index) in listMhs"
            :key="mahasiswa.id"
            class="hover:bg-gray-50 transition duration-200 ease-in-out"
          >
            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ index + 1 }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ mahasiswa.nim }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ mahasiswa.nama }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ mahasiswa.prodi }}</td>
            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
              <div class="flex space-x-2">
                <router-link
                  :to="{ name: 'edit', params: { id: mahasiswa.id } }"
                  class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded-md transition duration-300 ease-in-out"
                >
                  Edit
                </router-link>
                <button
                  @click.prevent="deleteMhsData(mahasiswa.id)"
                  class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded-md transition duration-300 ease-in-out"
                >
                  Hapus
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
