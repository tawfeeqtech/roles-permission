<template>
    <div>
        Welcome to Laravel with Vue 3!
        <button @click="showAlert">Show Alert</button>

    </div>
</template>

<script>
export default {
    name: 'Test',
    methods: {
        showAlert() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Signed in successfully"
            });

        },
    },

};
</script>

<style scoped>
/* Your styles here */
</style>
