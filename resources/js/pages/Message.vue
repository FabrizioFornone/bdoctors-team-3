<template>
<div>
    <div class="container">
        <h1>Send a message to your doctor.</h1>
        <div v-if="!formSubmitted">
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">
                    Full Name
                </label>
                <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Mario Rossi" v-model="formData.full_name"/>
                <span class="text-danger" v-if="formValidationErrors && formValidationErrors.full_name">
                    {{ formValidationErrors.full_name }}
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">
                    Email address
                </label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" v-model="formData.email"/>
                <span class="text-danger" v-if="formValidationErrors && formValidationErrors.email">
                    {{ formValidationErrors.email }}
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">
                    Message
                </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="formData.message"></textarea>
                <span class="text-danger" v-if="formValidationErrors && formValidationErrors.message">
                    {{ formValidationErrors.message }}
                </span>
            </div>  
        <div>
            
        </div>
            <button type="submit" class="btn btn-primary text-white mb-3" @click="formSubmit">
                Submit
            </button>
        </div>

        <div v-else class="alert alert-success py-5">
            <h4>Your message was sent successfully.</h4>
        </div>
    </div>
</div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            formSubmitted: false,
            formData: {
                full_name: '',
                email: '',
                message: '',
                user_id: this.$route.params.result,
            },
            formValidationErrors: null
        }
    },
    methods: {
        async formSubmit() {
            try {
                this.formValidationErrors = null;
                const formDataInstance = new FormData();
                formDataInstance.append('full_name', this.formData.full_name);
                formDataInstance.append('email', this.formData.email);
                formDataInstance.append('message', this.formData.message);
                formDataInstance.append('user_id', this.formData.user_id);
                await axios.post('/api/messages', formDataInstance);
                this.formSubmitted = true;
            } catch (error) {
                alert("Try again! Your message wasn't sent successfully or the fields are not compiled correctly.");
            }
        },
    },
}
</script>

<style lang="scss" scoped>

</style>