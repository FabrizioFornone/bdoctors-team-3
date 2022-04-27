<template>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <img :src="result.photo" class="card-img" alt="..." />
                    </div>
                    <div>
                        <span> {{ result.name }} </span>
                        <span> {{ result.surname }}</span>
                        <span> {{ result.specialization_name }}</span>
                    </div>
                </div>
                <router-link :to="{ name:'message.index', params: { result: result.id } }">Message</router-link>
                <router-link :to="{ name:'review.index', params: { result: result.id } }">Review</router-link>
                <router-link :to="{ name:'results.show', params: { result: result.id } }">Details</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        result: Object,
    },

    methods: {
    
    },
};
</script>

<style lang="scss" scoped>

.card-img {
    max-width: 120px;
}
</style>
