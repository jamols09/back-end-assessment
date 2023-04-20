<script setup>
import { Link, router } from "@inertiajs/vue3";
import { reactive } from "vue";

const props = defineProps({
    policy: String,
    template: {
        type: Object,
    },
});

const form = reactive({
    title: props.template?.title ?? null,
    body: props.template?.body ?? null,
});

const submit = () => {
    router.post("/template", form);
};

const update = () => {
    router.put(`/template/${props.template.id}`, form);
};
</script>
<template>
    <form @submit.prevent="template == null ? submit() : update()">
        <h2>Create Template</h2>
        <p class="text-sm">"[name]" "[email]" - two wildcards only</p>
        <div class="my-2">
            <label
                for="price"
                class="block text-sm font-medium leading-6 text-gray-900"
            >
                Title
            </label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input
                    v-model="form.title"
                    type="text"
                    name="title"
                    id="title"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
            </div>
        </div>
        <div class="my-2">
            <label
                for="price"
                class="block text-sm font-medium leading-6 text-gray-900"
            >
                Body
            </label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <textarea
                    v-model="form.body"
                    type="text"
                    name="body"
                    id="body"
                    rows="10"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                />
            </div>
        </div>

        <div class="mt-7">
            <button
                class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded mr-2"
            >
                {{ template == null ? "Create" : "Update" }}
            </button>
            <Link
                class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-2 rounded mr-2"
                href="/dashboard"
            >
                Back
            </Link>
        </div>
    </form>
</template>
