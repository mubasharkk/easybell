<script setup>

import { Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
});
</script>


<template>
    <div class="grid grid-cols-2 gap-4 p-6">
        <div class="grid-cols-2">
            <ApplicationLogo class="w-12"/>
        </div>
        <div class="text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900">
                Dashboard
            </Link>

            <Link
                :href="route('login')"
                v-if="!$page.props.auth.user"
                class="font-semibold text-gray-600 hover:text-gray-900">
                Log in
            </Link>

            <Link
                v-if="!$page.props.auth.user"
                :href="route('register')"
                class="ml-4 font-semibold text-gray-600 hover:text-gray-900">
                Register
            </Link>
        </div>
    </div>
    <div class="min-h-screen sm:pt-0 bg-gray-100">
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <slot/>
            </div>
        </main>
    </div>
</template>
