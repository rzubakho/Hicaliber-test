<template>
    <div>
        <property-data-filters/>
        <Property-data-list
            :items="items"
            :meta="meta"
            :loading="loading"
            @load-more="fetchNextPageDebounce"
        />
    </div>
</template>

<script>
import PropertyDataList from "@modules/PropertyData/components/PropertyDataList.vue";
import PropertyDataFilters from "@modules/PropertyData/components/PropertyDataFilters.vue";
import PropertyDataService from "@/services/property-data.service";
import {debounce} from "lodash";

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
                    console.log(error);
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
