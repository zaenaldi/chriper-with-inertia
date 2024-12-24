<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const form = useForm({
    message: "",
    media: null, // Add media field for image/video
});

const handleFileUpload = (event) => {
    form.media = event.target.files[0];
};

const submitForm = () => {
    form.post(route("chirps.store"), {
        onSuccess: () => {
            console.log("Chirp posted successfully");
            form.reset();
        },
        onError: (errors) => {
            console.error("Errors:", errors);
        },
    });
};
const editing = ref(false);
</script>

<template>
    <Head title="Chirps" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="submitForm">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <!-- File Input for images/videos -->
                <input
                    type="file"
                    @change="handleFileUpload"
                    class="block mt-5"
                    accept="image/*,video/*"
                />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
