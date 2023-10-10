<script setup>
import { Head } from '@inertiajs/vue3';
import {onMounted, ref} from 'vue'
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import FavoriteButton from "@/Components/FavoriteButton.vue";

const photos = ref({});
const pageMeta = ref({});
const isLoading = ref(true);

function getPage(pageUrl) {
    photos.value = {};
    isLoading.value = true;
    fetch(pageUrl)
        .then(response => response.json())
        .catch(error => {
            isLoading.value = false;
        })
        .then((data) => {
            photos.value = data.data;
            pageMeta.value = data.meta;
            isLoading.value = false;
        });
}

onMounted(() => {
    getPage(route('photos.gallery') + '?page=1');
})

</script>

<template>

    <Head title="Gallery"/>

    <DefaultLayout>
        <div v-if="isLoading"
             class="rounded-md h-12 w-12 border-4 border-t-4 border-blue-500 animate-spin absolute"></div>
        <h3 v-else-if="!photos.length" class="text-center">No photos available!</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 p-4">
            <div v-for="photo in photos" class="group cursor-pointer relative">
                <img
                    :src="photo.url"
                    :alt="photo.title"
                    @error="photo.url = 'https://picsum.photos/id/26/600/600'"
                    class="w-full h-48 object-cover rounded-lg transition-transform transform scale-100 group-hover:scale-105"
                />
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <FavoriteButton :isFavorited="false"/>
                </div>
            </div>
        </div>
        <Pagination :pageMeta="pageMeta" :onPageChange="getPage"/>
    </DefaultLayout>
</template>
