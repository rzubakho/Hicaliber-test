<template>
    <div class="property-data-filters">
        <el-form
            ref="filtersForm"
            :model="filters"
            label-width="100px"
        >

            <el-form-item label="Name" :error="errors.name?.[0]">
                <el-input
                    v-model="filters.name"
                    placeholder="Enter name"
                    @input="clearError('name')"
                ></el-input>
            </el-form-item>

            <el-form-item label="Bedrooms" :error="errors.bedrooms?.[0]">
                <el-input
                    v-model="filters.bedrooms"
                    type="number"
                    placeholder="Bedrooms"
                    min="0"
                    @input="clearError('bedrooms')"
                ></el-input>
            </el-form-item>

            <el-form-item label="Bathrooms" :error="errors.bathrooms?.[0]">
                <el-input
                    v-model="filters.bathrooms"
                    type="number"
                    placeholder="Bathrooms"
                    min="0"
                    @input="clearError('bathrooms')"
                ></el-input>
            </el-form-item>

            <el-form-item label="Storeys" :error="errors.storeys?.[0]">
                <el-input
                    v-model="filters.storeys"
                    type="number"
                    placeholder="Storeys"
                    min="0"
                    @input="clearError('storeys')"
                ></el-input>
            </el-form-item>

            <el-form-item label="Garages" :error="errors.garages?.[0]">
                <el-input
                    v-model="filters.garages"
                    type="number"
                    placeholder="Garages"
                    min="0"
                    @input="clearError('garages')"
                ></el-input>
            </el-form-item>

            <el-form-item label="Price Range">
                <el-row>
                    <el-col :span="11">
                        <el-form-item :error="errors.min_price?.[0]">
                            <el-input
                                v-model="filters.min_price"
                                type="number"
                                placeholder="Min"
                                min="0"
                                @input="() => {clearError('max_price'); clearError('min_price');}"
                            ></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="2" style="text-align: center">-</el-col>
                    <el-col :span="11">
                        <el-form-item :error="errors.max_price?.[0]">
                            <el-input
                                v-model="filters.max_price"
                                type="number"
                                placeholder="Max"
                                min="0"
                                @input="() => {clearError('max_price'); clearError('min_price');}"
                            ></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
            </el-form-item>
        </el-form>
        <div class="filters-actions">
            <el-button type="primary" @click="applyFilters">Apply Filters</el-button>
            <el-button @click="resetFilters">Reset Filters</el-button>
        </div>
    </div>


</template>

<script>
import ErrorHandlingMixin from '@/mixins/error-handling.mixin';

export default {
    name: "PropertyDataFilters",

    mixins: [ErrorHandlingMixin],

    data() {
        return {
            filters: {
                name: null,
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
                min_price: null,
                max_price: null
            }
        };
    },
    methods: {
        applyFilters() {
            this.$emit("update-filters", this.filters);
        },

        resetFilters() {
            this.filters = {
                name: null,
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
                min_price: null,
                max_price: null
            };

            this.resetErrors();

            this.applyFilters();
        }
    }
};
</script>

<style scoped>
.property-data-filters {
    padding: 20px;
    background-color: #f9fafb;
    border: 1px solid #ebeef5;
    border-radius: 4px;
}

.el-form-item {
    margin-bottom: 15px;
}

.price-range {
    display: flex;
    align-items: center;
}

.price-range .el-col {
    margin-bottom: 0;
}

.filters-actions {
    margin-top: auto;
    text-align: center;
}
</style>
