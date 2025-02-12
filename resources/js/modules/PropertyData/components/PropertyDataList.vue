<template>
    <div class="property-data-list" style="height: 400px; overflow-y: auto;">
        <el-table
            :data="items"
            v-loading="loading"
            style="width: 100%"
            height="100%"
        >
            <el-table-column prop="name" label="Name" width="200"></el-table-column>
            <el-table-column prop="bedrooms" label="Bedrooms" width="100"></el-table-column>
            <el-table-column prop="bathrooms" label="Bathrooms" width="100"></el-table-column>
            <el-table-column prop="storeys" label="Storeys" width="100"></el-table-column>
            <el-table-column prop="garages" label="Garages" width="100"></el-table-column>
            <el-table-column prop="price" label="Price" width="150"></el-table-column>

            <template #empty>
                <div class="no-data-message">
                    No data available
                </div>
            </template>

            <template #append>
                <div ref="loadTrigger" class="load-trigger"></div>
            </template>
        </el-table>
    </div>
</template>
<script>
export default {
    props: {
        items: {
            type: Array,
            required: true,
            default: () => []
        },
        meta: {
            type: Object,
            required: true,
            default: () => ({})
        },
        loading: {
            type: Boolean,
            required: true
        }
    },
    data() {
        return {
            observer: null
        };
    },
    methods: {
        loadMore() {
            if (this.meta.current_page < this.meta.last_page) {
                this.$emit("load-more", this.meta.current_page + 1);
            }
        },
        initObserver() {
            this.observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            this.loadMore();
                        }
                    });
                },
                {threshold: 0.1}
            );

            const loadTrigger = this.$refs.loadTrigger;
            if (loadTrigger) {
                this.observer.observe(loadTrigger);
            }
        }
    },
    mounted() {
        this.initObserver();
    },
    beforeDestroy() {
        if (this.observer) {
            this.observer.disconnect();
        }
    }
};
</script>
<style scoped>
.load-trigger {
    height: 1px;
    visibility: hidden;
}
</style>
