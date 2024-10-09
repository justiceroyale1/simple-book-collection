<script setup lang="ts">
import { useHelpers } from "@/Composables";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, router, useForm } from "@inertiajs/vue3";

const props = defineProps<{
    books: any;
    statusList: string[];
    publishedYearList: string[];
    selectedStatus: string;
    selectedPublishedYear: string;
}>();

const { getStatusBagde } = useHelpers();

const form = useForm({
    filter: {
        status: "",
        published_year: "",
    },
});

const submit = () => {
    form.get(route("books.index"));
};

const deleteBook = (book: any) => {
    form.reset();
    router.delete(route("books.destroy", book.id));
};
</script>

<template>
    <GuestLayout>
        <Head title="Books" />
        <div class="grid grid-cols-12 gap-4">
            <div class="col-start-2 col-span-10">
                <div class="card w-full shadow-xl">
                    <div class="card-body">
                        <div
                            class="card-title py-5 flex flex-col md:flex-row items-start lg:items-center justify-start md:justify-between"
                        >
                            <div>
                                <span class="text-3xl"> Books </span>
                                <a
                                    :href="route('books.create')"
                                    class="btn btn-sm"
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
                                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                        />
                                    </svg>

                                    <span class="hidden lg:inline-flex">
                                        Add New Book
                                    </span>
                                </a>
                            </div>
                            <div
                                class="flex justify-between items-center gap-2"
                            >
                                <div class="hidden md:inline-flex">Filters</div>
                                <div>
                                    <select
                                        v-model="form.filter.status"
                                        class="select select-bordered select-sm w-fit capitalize"
                                        @change="submit"
                                    >
                                        <option value="" selected>
                                            Status
                                        </option>
                                        <option
                                            v-for="status in statusList"
                                            :key="status"
                                            :value="status"
                                        >
                                            {{ status }}
                                        </option>
                                    </select>
                                </div>
                                <div>
                                    <select
                                        v-model="form.filter.published_year"
                                        class="select select-bordered select-sm w-fit capitalize"
                                        @change="submit"
                                    >
                                        <option value="" selected>
                                            Published Year
                                        </option>
                                        <option
                                            v-for="publishedYear in publishedYearList"
                                            :key="publishedYear"
                                            :value="publishedYear"
                                        >
                                            {{ publishedYear }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="books.data.length == 0">
                                        <td
                                            colspan="4"
                                            class="text-center py-5"
                                        >
                                            No books found
                                        </td>
                                    </tr>
                                    <tr
                                        v-for="book in books.data"
                                        :key="book.id"
                                    >
                                        <td>
                                            <a
                                                class="btn btn-link"
                                                :href="
                                                    route('books.show', book.id)
                                                "
                                            >
                                                {{ book.title }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ book.author }}
                                        </td>
                                        <td>
                                            <div
                                                :class="[
                                                    'text-white',
                                                    'uppercase',
                                                    'p-3',
                                                    'font-bold',
                                                    'badge',
                                                    'gap-2',
                                                    getStatusBagde(book.status),
                                                ]"
                                            >
                                                {{ book.status }}
                                            </div>
                                        </td>
                                        <td class="flex xl:table-cell">
                                            <a
                                                :href="
                                                    route('books.edit', book.id)
                                                "
                                                class="btn btn-sm btn-warning btn-outline my-2"
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
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                                                    />
                                                </svg>

                                                <span
                                                    class="hidden lg:inline-flex"
                                                >
                                                    Edit Book
                                                </span>
                                            </a>
                                            <button
                                                @click.prevent="
                                                    deleteBook(book)
                                                "
                                                class="btn btn-sm btn-error btn-outline ml-2 my-2"
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
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                                    />
                                                </svg>
                                                <span
                                                    class="hidden lg:inline-flex"
                                                >
                                                    Delete Book
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-actions justify-center">
                            <div class="flex flex-col items-center py-5">
                                <div class="py-3">
                                    {{
                                        `Showing ${books.from} - ${books.to} of ${books.total}`
                                    }}
                                </div>
                                <div class="join">
                                    <a
                                        :href="books.first_page_url"
                                        :class="[
                                            'join-item',
                                            'btn',
                                            'btn-sm',
                                            books.current_page == 1
                                                ? 'btn-disabled'
                                                : '',
                                        ]"
                                        title="First Page"
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
                                                d="M21 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061A1.125 1.125 0 0 1 21 8.689v8.122ZM11.25 16.811c0 .864-.933 1.406-1.683.977l-7.108-4.061a1.125 1.125 0 0 1 0-1.954l7.108-4.061a1.125 1.125 0 0 1 1.683.977v8.122Z"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        :href="books.prev_page_url"
                                        :class="[
                                            'join-item',
                                            'btn',
                                            'btn-sm',
                                            books.prev_page_url
                                                ? ''
                                                : 'btn-disabled',
                                        ]"
                                        title="Previous Page"
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
                                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        class="join-item btn btn-sm btn-active cursor-not-allowed"
                                    >
                                        Page {{ books.current_page }}
                                    </a>
                                    <a
                                        :href="books.next_page_url"
                                        :class="[
                                            'join-item',
                                            'btn',
                                            'btn-sm',
                                            books.next_page_url
                                                ? ''
                                                : 'btn-disabled',
                                        ]"
                                        title="Next Page"
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
                                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"
                                            />
                                        </svg>
                                    </a>
                                    <a
                                        :href="books.last_page_url"
                                        :class="[
                                            'join-item',
                                            'btn',
                                            'btn-sm',
                                            books.current_page ==
                                            books.last_page
                                                ? 'btn-disabled'
                                                : '',
                                        ]"
                                        title="Last Page"
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
                                                d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
