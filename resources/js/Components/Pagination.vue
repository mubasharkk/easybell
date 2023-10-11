<script setup>

defineProps({
    pageMeta: {
        type: Object,
        required: true
    },
    displayFavs: {
        type: Boolean,
        required: true
    },
    onPageChange: {
        type: Function,
        required: true
    }
})

</script>

<template>
    <div class="flex justify-center items-center mt-6" v-if="pageMeta.last_page > 1">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#"
               v-for="link in pageMeta.links"
               v-html="link.label"
               @click="link.url && !link.active ? onPageChange(link.url + '&favorites=' + (displayFavs ? '1' : '0')) : null"
               :class="link.active ? 'bg-indigo-500 text-white' : 'hover:bg-gray-50 text-gray text-gray-700 bg-gray-50'"
               class="relative inline-flex   items-center px-4 py-2 border border-gray-300 text-sm font-medium "/>
        </nav>
    </div>
</template>
