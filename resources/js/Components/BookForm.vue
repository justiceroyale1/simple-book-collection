<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

const props = defineProps<{
    statusList: string[];
    book?: any;
}>();

const form = useForm({
    title: "",
    author: "",
    description: "",
    published_year: "",
    status: "available",
});

const submit = () => {
    if (props.book) {
        form.put(route("books.update", props.book.id));
    } else {
        form.post(route("books.store"));
    }
};

if (props.book) {
    form.title = props.book.title;
    form.author = props.book.author;
    form.description = props.book.description;
    form.published_year = props.book.published_year;
    form.status = props.book.status;
}
</script>
<template>
    <form @submit.prevent="submit">
        <label class="mb-5 form-control w-full">
            <div class="label">
                <span class="label-text">Title</span>
            </div>
            <div class="input input-bordered flex items-center gap-2">
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
                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"
                    />
                </svg>
                <input
                    v-model="form.title"
                    type="text"
                    class="grow"
                    placeholder="What is the book's title?"
                />
            </div>
            <div class="label" v-if="form.errors.title">
                <span class="label-text text-error">
                    {{ form.errors.title }}
                </span>
            </div>
        </label>
        <label class="mb-5 form-control w-full">
            <div class="label">
                <span class="label-text">Author</span>
            </div>
            <div class="input input-bordered flex items-center gap-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70"
                >
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"
                    />
                </svg>
                <input
                    v-model="form.author"
                    type="text"
                    class="grow"
                    placeholder="What is the author's name?"
                />
            </div>
            <div class="label" v-if="form.errors.author">
                <span class="label-text text-error">
                    {{ form.errors.author }}
                </span>
            </div>
        </label>
        <label class="mb-5 form-control">
            <div class="label">
                <span class="label-text">Description</span>
            </div>
            <textarea
                v-model="form.description"
                class="textarea textarea-bordered textarea-lg"
                placeholder="What is the book about?"
            ></textarea>
            <div class="label" v-if="form.errors.description">
                <span class="label-text text-error">
                    {{ form.errors.description }}
                </span>
            </div>
        </label>
        <label class="mb-5 form-control w-full">
            <div class="label">
                <span class="label-text">Published Year</span>
            </div>
            <div class="input input-bordered flex items-center gap-2">
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
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"
                    />
                </svg>

                <input
                    v-model="form.published_year"
                    type="text"
                    class="grow"
                    placeholder="What year was it published?"
                />
            </div>
            <div class="label" v-if="form.errors.published_year">
                <span class="label-text text-error">
                    {{ form.errors.published_year }}
                </span>
            </div>
        </label>
        <label class="mb-5 form-control w-full">
            <div class="label">
                <span class="label-text">Status</span>
            </div>

            <label
                v-for="status in statusList"
                :key="status"
                class="cursor-pointer flex justify-content-start items-center py-3"
            >
                <input
                    v-model="form.status"
                    type="radio"
                    name="status"
                    class="radio"
                    :value="status"
                />
                <span class="label-text ml-2 capitalize">
                    {{ status }}
                </span>
            </label>
        </label>
        <button class="btn btn-wide block mx-auto" type="submit">Save</button>
    </form>
</template>
