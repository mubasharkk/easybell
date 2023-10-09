<script setup>
import GuestLayout from "@/Layouts/GuestLayout";
import { Head } from '@inertiajs/vue3';

defineProps({
    photos: {
        type: Array,
    },
});

</script>

<template>

    <Head title="Gallery" />

    <GuestLayout>
        {{photos}}
    </GuestLayout>
</template>
