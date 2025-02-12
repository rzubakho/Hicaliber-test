<template>
    <div class="property-data-page">
        <el-row :gutter="18">
            <el-col :span="6">
                <div class="filters-column">
                    <property-data-filters
                        ref="propertyDataFilters"
                        @update-filters="fetchData"
                    />
                </div>
            </el-col>
            <el-col :span="14">
                <Property-data-list
                    :items="items"
                    :meta="meta"
                    :loading="loading"
                    @load-more="fetchNextPageDebounce"
                />
            </el-col>
        </el-row>
    </div>
</template>

<script>
import PropertyDataList from "@modules/PropertyData/components/PropertyDataList.vue";
import PropertyDataFilters from "@modules/PropertyData/components/PropertyDataFilters.vue";
import PropertyDataService from "@/services/property-data.service";
import { debounce } from 'lodash';
export default {
    name: "PropertyDataPage",

    components: {PropertyDataFilters, PropertyDataList },

    data() {
        return {
            items: [],
            errors: [],
            meta: {
                page: 1,
                per_page: 10
            },
            loading: false,
            filters: {}
        };
    },

    computed: {
        params() {
            return {...this.filters, page: this.meta.page, per_page: this.meta.per_page};
        }
    },

    methods: {
        fetchData(filters = {}) {
            this.errors = [];
            this.items = [];
            this.filters = { ...filters };
            this.meta.current_page = 1;
            this.fetchNextPageDebounce();
        },

        fetchNextPageDebounce: debounce(function fetchNextPage(page = this.meta.current_page || 1) {
            this.loading = true;
            this.meta.page = page;

            PropertyDataService.getList(this.params)
                .then(({ data, ...meta }) => {
                    this.items = [...this.items, ...data];
                    this.meta = meta;
                })
                .catch(error => {
                    try {
                        const parsedError = JSON.parse(error.message);
                        this.errors = parsedError.errors || {};

                        this.$refs.propertyDataFilters.setErrors({ errors: this.errors });
                    } catch (e) {
                        this.errors = ['An unexpected error occurred'];
                        console.error('Error parsing server response:', e);
                    }
                })
                .finally(() => {
                    this.loading = false;
                });
        }, 300),
    },
    created() {
        this.fetchData();
    }
};
</script>
<style scoped>
.property-data-page {
    padding: 20px;
}

.filters-column {
    height: 100%;
    display: flex;
    flex-direction: column;
}

</style>
