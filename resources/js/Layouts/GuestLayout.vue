<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const appName = computed(() => {
    return page.props.appName;
});
</script>

<template>
    <div class="container mx-auto pt-10">
        <div class="my-6 text-center text-7xl">
            <Link href="/">
                <h3>
                    {{ appName }}
                </h3>
            </Link>
        </div>

        <!-- <div
            class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg"
        > -->
        <div class="min-h-screen py-10">
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
