<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head } from "@inertiajs/vue3";
import BookForm from "@/Components/BookForm.vue";

defineProps<{
    statusList: string[];
    book: any;
}>();
</script>

<template>
    <GuestLayout>
        <Head title="Edit Book" />
        <div class="flex justify-center gap-4">
            <div class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3">
                <div class="card w-full shadow-xl">
                    <div class="card-body">
                        <div class="card-title py-5">
                            <div>
                                <span class="text-2xl"> Edit Book </span>
                                <a
                                    :href="route('books.index')"
                                    class="btn btn-sm ml-3"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="size-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"
                                        />
                                    </svg>

                                    <span class="hidden md:inline-flex">
                                        Books List
                                    </span>
                                </a>
                            </div>
                        </div>
                        <BookForm
                            :status-list="statusList"
                            :book="book"
                        ></BookForm>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
