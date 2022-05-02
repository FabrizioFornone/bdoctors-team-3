<template>
    <main>
        <div class="container ms_infos">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Back Arrow -->
                    <a href="javascript:history.back()">
                        <i
                            class="fa-solid fa-arrow-left ms_back-arrow mt-3"
                        ></i>
                    </a>
                    <!-- Profile Card -->
                    <div class="card my-3">
                        <!-- Card Header -->
                        <div class="card-header text-center">
                            <h4 class="mb-0 fw-bold">Doctor's Profile</h4>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row my-2">
                                <div class="col-6">
                                    <div class="photo-box">
                                        <img
                                            :src="info.photo"
                                            class="card-img"
                                            alt="..."
                                        />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="py-2">
                                        <i
                                            class="fa-solid fa-user-doctor icon-size"
                                        ></i>
                                        {{ info.user.surname }}
                                        {{ info.user.name }}
                                    </h5>
                                    <h5 class="py-2">
                                        <i
                                            class="fa-solid fa-location-dot icon-size"
                                        ></i>
                                        {{ info.user.business_address }}
                                    </h5>
                                    <h5 class="py-2">
                                        <i
                                            class="fa-solid fa-phone icon-size"
                                        ></i>
                                        {{ info.phone }}
                                    </h5>
                                    <h5 class="py-2">
                                        <i
                                            class="fa-solid fa-stethoscope icon-size"
                                        ></i>
                                        {{ info.performances }}
                                    </h5>

                                    <h5>
                                        <i
                                            class="fa-solid fa-briefcase-medical icon-size"
                                        ></i>
                                        <strong>Specializations:</strong>
                                        <li class="mt-2">
                                            <ul
                                                v-for="specialization of info.specializations"
                                                :key="specialization.id"
                                            >
                                                <li>
                                                    {{
                                                        specialization.specialization_name
                                                    }}
                                                </li>
                                            </ul>
                                        </li>
                                    </h5>
                                </div>
                                <div class="text-center pt-3">
                                    <h4 class="fw-bold">Contact this healthcare professional</h4>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <!-- Message Button -->
                                <div>
                                    <router-link
                                        class="btn btn-primary rounded-5 text-white fw-bold mx-3"
                                        :to="{
                                            name: 'message.index',
                                            params: { result: info.id },
                                        }"
                                    >
                                        Message
                                    </router-link>
                                </div>
                                <!-- Review Buttton -->
                                <div>
                                    <router-link
                                        class="btn btn-primary rounded text-white fw-bold mx-3"
                                        :to="{
                                            name: 'review.index',
                                            params: { result: info.id },
                                        }"
                                    >
                                        Review
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            info: [],
        };
    },

    methods: {
        async getInfo() {
            try {
                const response = await axios.get(
                    "/api/specializations/" + this.$route.params.result
                );
                this.info = response.data;
            } catch (er) {
                this.$router.replace({
                    name: "error",
                });
            }
        },
    },

    mounted() {
        this.getInfo();
    },
};
</script>

<style lang="scss" scoped>
main {
    background-color: #59a7b8;

}
</style>
