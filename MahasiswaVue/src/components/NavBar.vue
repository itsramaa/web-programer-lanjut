<template>
  <nav class="bg-gradient-to-r from-blue-500 to-purple-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <h1 class="text-white text-2xl font-bold tracking-wider">
              Mahasiswa App
            </h1>
          </div>
          <div class="ml-10 flex items-baseline space-x-4">
            <router-link 
              to="/" 
              class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out"
            >
              Home
            </router-link>
            <router-link 
              to="/profile" 
              class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out"
            >
              Profile
            </router-link>
            <router-link 
              to="/courses" 
              class="text-white hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out"
            >
              Courses
            </router-link>
          </div>
        </div>
        <div>
          <button 
            @click="logout" 
            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out"
          >
            Logout
          </button>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'NavBar',
  methods: {
    logout() {
      // Implement logout logic
      this.$router.push('/login');
    }
  }
}
</script>

<style scoped>
nav {
  transition: all 0.3s ease;
}
</style>
