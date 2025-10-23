<template>
  <nav class="bg-gradient-to-r from-green-800 to-black shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="shrink-0">
            <h1 class="text-green-400 text-2xl font-bold tracking-wider">
              Mahasiswa App
            </h1>
          </div>
          <div class="ml-10 flex items-baseline space-x-4">
            <router-link
              to="/"
              class="text-green-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out"
            >
              Home
            </router-link>
            <router-link
              to="/mahasiswa"
              class="text-green-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out"
            >
              Mahasiswa
            </router-link>
            <router-link
              to="/mahasiswa/create"
              class="text-green-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out"
            >
              Create
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
nav {
  transition: all 0.3s ease;
}
</style>
