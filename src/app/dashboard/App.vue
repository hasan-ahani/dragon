<template>
    <div id="dashboard" class="h-screen flex w-full"> 
        <sidebar/>
        <div class="flex-1 flex flex-col">
            <div class="h-20 flex items-center px-2">
                <div class="title font-bold text-xl">
                    حسن عزیز خوش آمدی
                </div>
                 <div class="user-actions flex flex-row-reverse flex-1 gap-3">
                    <div class="action flex h-12 justify-center text-danger bg-gray-100 w-12 items-center rounded-lg cursor-pointer hover:bg-danger hover:text-white transition">
                        <i class="dr dr-logout-1 transform rotate-180 text-xl"></i>
                    </div>
                    <div class="action flex h-12 relative justify-center bg-gray-100 w-12 items-center rounded-lg cursor-pointer hover:bg-primary-200 transition">
                        <i class="dr dr-notification text-xl"></i>
                        <span class="bg-danger absolute w-6 h-6 flex justify-center items-center text-white text-xs rounded-full -top-1 -right-1">
                            2
                            <span class="animate-ping absolute inline-flex w-full h-fu rounded-full bg-danger opacity-75"></span>
                        </span>
                    </div>
                    <div class="action flex h-12 relative justify-center bg-gray-100 w-12 items-center rounded-lg cursor-pointer hover:bg-primary-200 transition">
                        <i class="dr dr-bag text-xl"></i>
                    </div>
                </div>

            </div>

            <div class="flex-1 bg-light p-5 rounded-tr-2xl">
                <div class="flex mb-4">
                    <breadcrumb></breadcrumb>
                </div>
                <transition :name="$route.meta.transition || 'fade'" mode="out-in">
                    <router-view :key="$route.name"> </router-view>
                </transition>
            </div>


        </div>
        
    </div>
</template>

<script>
import Sidebar from './layout/Sidebar.vue'
import breadcrumb from './layout/breadcrumb.vue'
export default {
  components: { Sidebar, breadcrumb },
    name: "App"
}
</script>

<style scoped>

</style>
