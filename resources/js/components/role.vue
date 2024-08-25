<template>
    <div>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roleModal">
            Create Role
        </button>

        <!-- Bootstrap Modal -->
        <div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleModalLabel">Create Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="createRole">
                            <div class="mb-3">
                                <label for="roleName" class="form-label">Role Name:</label>
                                <input type="text" v-model="roleName" id="roleName" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="permissions" class="form-label">Permissions:</label>
                                <select v-model="selectedPermissions" id="permissions" multiple class="form-select">
                                    <option v-for="permission in permissions" :key="permission.id"
                                        :value="permission.id">
                                        {{ permission.name }}
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Role</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Created Role -->
        <div v-if="role">
            <h4>Role Created:</h4>
            <p>Name: {{ role.name }}</p>
            <p>Permissions: {{ role.permissions.map(p => p.name).join(', ') }}</p>
        </div>
    </div>
</template>

<script>

import axios from 'axios';

export default {

    data() {
        return {
            roleName: '',
            permissions: [],
            selectedPermissions: [],
            role: null,
        };
    },

    // data: () => ({
    //     permissions: [],
    //     form: new Form({
    //         username: '',
    //         password: ''
    //     })
    // }),

    mounted() {
        this.fetchPermissions();
    },

    methods: {
        async createRole() {
            axios.post('/api/roles', {
                name: this.roleName,
                permissions: this.selectedPermissions,
            })
                .then(response => {
                    this.role = response.data;
                    this.roleName = '';
                    this.selectedPermissions = [];

                    Swal.fire({
                        icon: "success",
                        title: "Role Created",
                        text: "Your Role has been created!",
                    });

                    // Hide the modal
                    const modalElement = document.getElementById('roleModal');
                    const modal = bootstrap.Modal.getInstance(modalElement);
                    modal.hide();

                })
                .catch(error => {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                });
        },
        fetchPermissions() {
            axios.get('/api/roles')
                .then(response => {
                    this.permissions = response.data;
                })
                .catch(error => {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        footer: '<a href="#">Why do I have this issue?</a>'
                    });

                });
        }
    }
};

</script>

<style scoped>
/* Your styles here */
</style>
