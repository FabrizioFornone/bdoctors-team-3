<template>
    <main>
        <div class="container ms_review">
            <!-- Back Arrow -->
            <a href="javascript:history.back()">
                <i class="fa-solid fa-arrow-left ms_back-arrow mt-3"></i>
            </a>
            <h1 class="pt-2 text-white">Write a review of the healthcare professional.</h1>
            <div v-if="!formSubmitted">
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label text-white fw-bold">
                        Full Name *
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="exampleFormControlInput2"
                        placeholder="Es. Mario Rossi"
                        v-model="formData.full_name"
                        required
                    />
                    <span class="text-danger fw-bold" v-if="formValidationErrors && formValidationErrors.full_name">
                        {{ formValidationErrors.full_name }}
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-white fw-bold">
                        Email address *
                    </label>
                    <input
                        type="email"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Es. name@example.com"
                        v-model="formData.email"
                        required
                    />
                    <span class="text-danger fw-bold" v-if="formValidationErrors && formValidationErrors.email">
                        {{ formValidationErrors.email }}
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-white fw-bold">
                        Review *
                    </label>
                    <textarea
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        v-model="formData.text"
                        placeholder="Write here your review..."
                        required
                    >
                    </textarea>
                    <span class="text-danger fw-bold" v-if="formValidationErrors && formValidationErrors.text">
                        {{ formValidationErrors.text }}
                    </span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-white fw-bold">
                        Vote *
                    </label>
                    <input
                        class="form-control"
                        id="exampleFormControlTextarea1"
                        v-model="formData.vote"
                        placeholder="Es. 1-5"
                        required
                    />
                    <span class="text-danger fw-bold" v-if="formValidationErrors && formValidationErrors.vote">
                        {{ formValidationErrors.vote }}
                    </span>
                </div>
                <div>
                    <button
                        type="submit"
                        class="btn btn-success text-white mb-3"
                        @click="formSubmit"
                    >
                        Submit
                    </button>
                </div>
            </div>
            <div v-else class="alert alert-success py-5">
                <h4>Your review was sent successfully.</h4>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            formSubmitted: false,
            formData: {
                full_name: "",
                email: "",
                text: "",
                vote: "",
                user_id: this.$route.params.result,
            },
            formValidationErrors: null,
        };
    },
    methods: {
        async formSubmit() {
            try {
                this.formValidationErrors = null;
                const formDataInstance = new FormData();
                formDataInstance.append("full_name", this.formData.full_name);
                formDataInstance.append("email", this.formData.email);
                formDataInstance.append("text", this.formData.text);
                formDataInstance.append("vote", this.formData.vote);
                formDataInstance.append("user_id", this.formData.user_id);
                await axios.post("/api/reviews", formDataInstance);
                this.formSubmitted = true;
            } catch (error) {
                if (error.response.status === 422) {
                    this.formValidationErrors = error.response.data.errors;
                }
                // alert("Try again! Your review wasn't sent successfully or the fields are not compiled correctly.");
            }
        },
    },
};
</script>

<style lang="scss" scoped>
main {
    background-color: #59A7B8;
    height: calc(100vh - 47px); 
}
</style>
