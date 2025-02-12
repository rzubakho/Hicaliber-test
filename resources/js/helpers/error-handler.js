export default {
    handleErrors(error) {
        let errors = [];
        try {

            if (typeof error === 'string') {
                const parsedError = JSON.parse(error);
                if (parsedError.errors) {

                    errors = parsedError.errors;
                } else {

                    errors = [parsedError.message || 'An unexpected error occurred'];
                }
            }

            else if (error && error.errors) {
                errors = error.errors;
            }

            else {
                errors = [error.message || 'An unexpected error occurred'];
            }
        } catch (e) {
            errors = ['An unexpected error occurred'];
        }
        return errors;
    }
};
