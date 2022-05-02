<template>
    <div>
        <div class="card my-3 py-2">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Doctor information on left side of card -->
                    <div class="d-flex">
                        <div class="card-img">
                            <img :src="result.photo" alt="..." />
                        </div>
                        <div class="ps-4 fs-5">
                            <div>
                                <i class="fa-solid fa-user-doctor icon-size"></i>
                                <span>{{ result.name }}</span>
                                <span>{{ result.surname }}</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-briefcase-medical icon-size"></i>
                                <span> {{ result.specialization_name }}</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-city icon-size"></i>
                                <span>{{ result.city }}</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-house-chimney-medical icon-size"></i>
                                <span>{{ result.business_address }}</span>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- Details button on right side of card -->
                <div class="d-flex justify-content-center">
                    <router-link
                        class="btn btn-primary rounded text-white fw-bold my-2 me-3"
                        :to="{
                            name: 'results.show',
                            params: { result: result.id },
                        }"
                    >
                        Details
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        result: Object,
    },

    methods: {},
};
</script>

<style lang="scss" scoped>

.card {

    &:hover{
        background-color: #f5f5f5;
    }

    .card-img {
        height: 175px;
        width: 150px;
        border: 0.5px solid #ccc;
        border-radius: 5px;

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
    }
}
</style>
