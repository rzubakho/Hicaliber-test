export default {
    data() {
        return {
            errors: {}
        };
    },
    methods: {
        setErrors(serverErrors) {
            if (serverErrors && serverErrors.errors) {
                this.errors = serverErrors.errors;
            } else {
                this.errors = {};
            }
        },

        clearError(field) {
            if (this.errors[field]) {
                delete this.errors[field];
            }
        },

        resetErrors() {
            this.errors = {};
        }
    }
};
